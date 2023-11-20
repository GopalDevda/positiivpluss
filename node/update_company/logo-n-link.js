const puppeteer = require('puppeteer');
const mysql = require('mysql');
const fs = require('fs');
const path = require('path');

const dbConfig = {
  host: 'localhost',
  user: 'root',
  password: 'POS2022',
  database: 'positiiv_db',
};

const dbPool = mysql.createPool(dbConfig);

async function executeQuery(query, params = []) {
  return new Promise((resolve, reject) => {
    dbPool.getConnection((err, connection) => {
      if (err) {
        reject(err);
        return;
      }

      connection.query(query, params, (err, results) => {
        connection.release();

        if (err) {
          reject(err);
        } else {
          resolve(results);
        }
      });
    });
  });
}

async function fetchDataFromDatabase() {
  try {
    const query = `
      SELECT id, corporate_identification_number, company_name
      FROM all_company_data
      WHERE id NOT IN (SELECT company_id FROM company_details);;
    `;
    const results = await executeQuery(query);
    return results;
  } catch (error) {
    console.error('Error executing database query:', error);
    throw error;
  }
}

async function scrapeCompanyData(Id, CIN) {
  const browser = await puppeteer.launch({
    headless: "new", // Run in headless mode
    args: ['--no-sandbox', '--disable-setuid-sandbox'],
    timeout: 0,
  });

  const page = await browser.newPage();
  const url = 'https://www.thecompanycheck.com/';

  try {
    await page.goto(url, { waitUntil: 'load' });

    await page.waitForSelector('input[id="txtSearch"]');
    await page.type('input[id="txtSearch"]', CIN);
    await page.keyboard.press('Enter');

    await page.waitForNavigation({ waitUntil: 'load' });

    const imageSrc = await page.$eval('.otherompany_bg img', (img) => img.getAttribute('src'));


    // const check = await page.waitFor(() => document.querySelector('.other-com-title a') !== null);
    // if(check){
       const linkHref = await page.$eval('.other-com-title a', (a) => a.getAttribute('href'));
     // }else{
     //  const linkHref = null;
     // }
   


    // const tableData = await page.evaluate(() => {
    //   const table = document.getElementById('viewmoredatacompany');
    //   const thirdTR = table.getElementsByTagName('tr')[2]; // Index 2 represents the third <tr>
    //   const secondTD = thirdTR.getElementsByTagName('td')[1]; // Index 1 represents the second <td>
    //   return secondTD.textContent;
    // });




    const companyExists = await checkCompanyExists(Id);

    if (companyExists) {
      await updateCompanyGST(Id, `https:${imageSrc}`, `https:${linkHref}`);
    } else {
      await insertCompanyDetail(Id, `https:${imageSrc}`, `https:${linkHref}`);
    }

  } catch (error) {
    console.error('Error:', error);
  } finally {
    await browser.close();
  }
}

async function checkCompanyExists(id) {
  try {
    const query = 'SELECT id FROM company_details WHERE company_id = ?';
    const results = await executeQuery(query, [id]);
    return results.length > 0;
  } catch (error) {
    console.error('Error checking company existence:', error);
    throw error;
  }
}

async function updateCompanyGST(id, imageSrc, link) {
  try {
    const query = 'UPDATE company_details SET company_logo = ?, company_web = ? WHERE company_id = ?';
    await executeQuery(query, [imageSrc, link, id]);
  } catch (error) {
    console.error('Error updating company GST:', error);
    throw error;
  }
}

async function insertCompanyDetail(id, imageSrc, link) {
  try {
    const query = 'INSERT INTO company_details (company_id, company_logo, company_web) VALUES (?, ?, ?)';
    await executeQuery(query, [id, imageSrc, link]);
  } catch (error) {
    console.error('Error inserting company detail:', error);
    throw error;
  }
}

async function main() {
  try {
    const data = await fetchDataFromDatabase();
    for (const record of data) {
      await scrapeCompanyData(record.id, record.corporate_identification_number);
    }
  } catch (error) {
    console.error('Error:', error);
  }
}

main();
