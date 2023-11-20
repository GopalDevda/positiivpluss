const puppeteer = require('puppeteer');
const path = require('path');
const fs = require('fs');
const mysql = require('mysql');
const pdf = require('pdf-parse');
const ExcelJS = require('exceljs');
const moment = require('moment');
const { promisify } = require('util');

(async () => {
  const downloadDirectory = 'downloaded_bills';

  const connection = mysql.createConnection({
    host: "127.0.0.1",
    user: "root",
    password: "POS2022",
    database: "positiiv_db"
  });

  var month = moment().month() + 1;
  console.log(month);

  connection.connect(async (err) => {
    if (err) {
      console.error('Error connecting to the database:', err);
      return;
    }
    console.log('Connected to the database');
    const sqlQuery = "SELECT sensors.id,sensors.username, sensors.password, sensors.provider_type, electricity_board.abbrevation FROM sensors LEFT JOIN electricity_board ON sensors.provider_type = electricity_board.id WHERE electricity_board.abbrevation = 'DHBVN' AND sensors.current_status = 2"; // Your SQL query here
    try {
      const results = await promisify(connection.query).call(connection, sqlQuery);

      for (const row of results) {
        console.log(row);
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
            const dataElectricity = `UPDATE sensors
                  SET current_status = 3
                  WHERE id = ${row.id}`;
            connection.query(dataElectricity, (err, result) => {
              if (err) {
                console.error('Error executing SQL query:', err);
              } else {
                console.log('Inserted successfully:', result);
              }
            });


          } else {
            console.log('Cell not found.');
          }
        } catch (error) {
          console.log('Invalid Credentials')
        } finally {
          await browser.close();
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
