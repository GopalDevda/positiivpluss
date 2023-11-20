const puppeteer = require('puppeteer');
const path = require('path');
const fs = require('fs');
const mysql = require('mysql');
const pdf = require('pdf-parse');
const ExcelJS = require('exceljs');
const pdfjs = require('pdfjs-dist/es5/build/pdf');
const moment = require('moment');
const { promisify } = require('util');

(async () => {
  const downloadDirectory = 'https://positiivplus.com/public/uploads/pdfElectricity/';

  const connection = mysql.createConnection({
    host: "127.0.0.1",
    user: "root",
    password: "POS2022",
    database: "positiiv_db"
  });

  // var month = moment().month() + 1;
  // console.log(month);

  // console.log(moment().year());

  connection.connect(async (err) => {
    if (err) {
      console.error('Error connecting to the database:', err);
      return;
    }
    console.log('Connected to the database');
    const sqlQuery = "SELECT sensors.id,sensors.username, sensors.password, sensors.provider_type, electricity_board.abbrevation, data_electricity.bill_date FROM sensors LEFT JOIN data_electricity ON sensors.id = data_electricity.electricity_id LEFT JOIN electricity_board ON sensors.provider_type = electricity_board.id WHERE electricity_board.abbrevation = 'DHBVN' AND sensors.current_status = 3"; // Your SQL query here

    try {
      const results = await promisify(connection.query).call(connection, sqlQuery);
      for (const row of results) {
        if (row.bill_date == null || moment(row.bill_date).format("YYYY-MM-DD") > moment().format("YYYY-MM-DD")) {
          try {
            const browser = await puppeteer.launch({
              headless: true,
              defaultViewport: null,
              args: [
                `--disable-extensions-except=${path.resolve(downloadDirectory)}`,
                `--load-extension=${path.resolve(downloadDirectory)}`,
              ],
            });
            const page = await browser.newPage();
            const ua =
              "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36";
            await page.setUserAgent(ua);
            try {
              await page.goto('https://dhbvn.org.in/web/portal/auth');
              await page.type('#accountNo', row.username);
              await page.type('#password', row.password);
              await page.click('#submit');
              await page.waitForNavigation();

              await page.goto('https://dhbvn.org.in/web/portal/view-bill');

              const cellSelectorName = '#viewBillForm table:nth-child(4) tbody tr:nth-child(2) td:nth-child(1)';
              const cellName = await page.waitForSelector(cellSelectorName);

              const cellSelector = '#viewBillForm table:nth-child(4) tbody tr:nth-child(2) td:nth-child(5) a';
              const cell = await page.waitForSelector(cellSelector);

              if (cell) {
                const text = await cellName.evaluate(element => element.textContent.trim());
                await cell.click();
                await cell._client.send('Page.setDownloadBehavior', {
                  behavior: 'allow',
                  downloadPath: downloadDirectory,
                });
                await page.waitForTimeout(5000);
                const downloadedFilePath = path.join(downloadDirectory, 'view-bill.pdf');
                const fileName = 'bill_' + text + '.pdf';
                const newFilePath = path.join(downloadDirectory, fileName);
                await fs.promises.rename(downloadedFilePath, newFilePath);



                const pdfFilePath = downloadDirectory + '/' + fileName;
                const excelFilePath = 'worksheets/bill_' + text + '.xlsx';

                async function extractDataFromPDF(pdfFilePath) {
                  try {


                    const data = new fs.readFileSync(pdfFilePath);
                    const pdfData = await pdf(data);
                    const text = pdfData.text;
                    const accountNumberRegex = /Account No: (\d+)/;
                    const accountNumberMatch = text.match(accountNumberRegex);
                    const accountNumber = accountNumberMatch ? accountNumberMatch[1] : 'Not found';

                    // Extract Bill Month
                    const billMonthRegex = /Bill Month:\s+(\w+\/\d{4})/;
                    const billMonthMatch = text.match(billMonthRegex);
                    const billMonth = billMonthMatch ? billMonthMatch[1] : 'Not found';

                    // Extract Issue Date
                    const issueDateRegex = /Issue Date: (\d{2}\/\d{2}\/\d{4})/;
                    const issueDateMatch = text.match(issueDateRegex);
                    const issueDate = issueDateMatch ? issueDateMatch[1] : 'Not found';

                    // Extract Net Payable Amount on or before Due Date
                    const netPayableAmountRegex = /Net Payable Amount on or before Due Date \(`\):\s*([\d.]+)/;
                    const netPayableAmountMatch = text.match(netPayableAmountRegex);
                    const netPayableAmount = netPayableAmountMatch ? parseFloat(netPayableAmountMatch[1]) : 'Not found';

                    // Extract Due Date
                    const dueDateRegex = /Due Date:\s*(\d{2}\/\d{2}\/\d{4})/;
                    const dueDateMatch = text.match(dueDateRegex);
                    const dueDate = dueDateMatch ? dueDateMatch[1] : 'Not found';

                    // Extract Slab Calculation Unit
		    const words = text.match(/[\w-]+/g);
                    const wordsWithLineBreaks = words.join('\n');
                    
		    const slabCalculationUnitRegex = /Slab\s+Calculation\s+UnitRate\s+Amount\s+(\d+)/;
                    const slabCalculationUnitMatch = wordsWithLineBreaks.match(slabCalculationUnitRegex);
                    const slabCalculationUnit = slabCalculationUnitMatch ? parseFloat(slabCalculationUnitMatch[1]) : 'Not found';

                    // Extract Sanction Load
                    const sanctionLoadRegex = /Sanctioned Load \(Kw\/CD\)(\d+\.\d+)/;
                    const sanctionLoadMatch = text.match(sanctionLoadRegex);
                    const sanctionLoad = sanctionLoadMatch ? parseFloat(sanctionLoadMatch[1]) : 'Not found';

                    // Extract Mid in KW/KVA
                    const midRegex = /(\d+\.\d+)\s*(kWh|\(KVA\))/g;
                    const midMatches = [...text.matchAll(midRegex)];
                    const midValues = midMatches.map(match => ({ value: parseFloat(match[1]), unit: match[2] }));
		   console.log(midValues);
                    const extractedData = {
                      AccountNumber: accountNumber,
                      BillMonth: billMonth,
                      BillDate: issueDate,
                      BillAmount: netPayableAmount,
                      StartDate: issueDate,
                      EndDate: dueDate,
                      CUnits: slabCalculationUnit,
                      SanLoad: sanctionLoad,
                      DLoad: midValues[0]?midValues[0].value :null,
                    };
                    console.log(extractedData);
                   return extractedData; 
		 } catch (error) {
                    console.error('Error extracting data from PDF:', error);
                    return null;
                  }
                }

                async function createExcelAndAddData(extractedData) {

                  const dataElectricity = `INSERT INTO data_electricity (electricity_id, bill_no, bill_date, amount, consume_unit, pdf_file, demand_load, senstion, year, frequency, monthly_name, currentdatetime) VALUES (${row.id}, ${extractedData.AccountNumber}, '${moment(extractedData.BillDate, "DD/MM/YYYY").format("YYYY-MM-DD")}', ${extractedData.BillAmount}, ${extractedData.CUnits}, '${fileName}', ${extractedData.DLoad ?? null}, ${extractedData.SanLoad}, '${moment(extractedData.BillDate, "DD/MM/YYYY").year()} - ${moment(extractedData.BillDate, "DD/MM/YYYY").year() + 1}', 1, '["${moment(extractedData.BillDate, "DD/MM/YYYY").month() + 1}"]', '${moment().format("YYYY-MM-DD HH:mm:ss")}')`;
                  console.log(dataElectricity);
                  connection.query(dataElectricity, (err, result) => {
                    if (err) {
                      console.error('Error executing SQL query:', err);
                    } else {
                      console.log('Inserted successfully:', result);
                    }
                  });

                }

                async function main() {
                  const extractedData = await extractDataFromPDF(pdfFilePath);
                  if (extractedData) {
                    await createExcelAndAddData(extractedData);
                  }
                }

                main();

                console.log('PDF downloaded and saved.');
              } else {
                console.log('Cell not found.');
              }
            } catch (error) {
              console.error('An error occurred:', error);
            } finally {
              await browser.close();
            }
          } catch (error) {
            console.error('An error occurred during Puppeteer:', error);
          }
        }
      }
    } catch (err) {
      console.error('Error executing SQL query:', err);
    } finally {
      connection.end((err) => {
        if (err) {
          console.error('Error closing connection:', err);
        } else {
          console.log('Connection closed');
        }
      });
    }
  });
})();
