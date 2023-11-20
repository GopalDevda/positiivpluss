const mysql = require('mysql');
const puppeteer = require('puppeteer');
const stringSimilarity = require('string-similarity');
const { promisify } = require('util');
// const { chunkArray } = require('./utils'); // Define a utility function for chunking the data

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
    // const query = 'SELECT id, corporate_identification_number, company_name FROM all_company_data';
    const results = await executeQuery(query);
    return results;
  } catch (error) {
    console.error('Error executing database query:', error);
    throw error;
  }
}

async function searchCompanyOnWebsite(id, companyName) {
  const browser = await puppeteer.launch({
    args: ['--no-sandbox', '--disable-setuid-sandbox'],
    headless: "new",// Set headless mode to "new"
    timeout: 0,
  });

  try {
    const page = await browser.newPage();
    await page.goto(`https://tikshare.com/?gstsearch=${encodeURIComponent(companyName)}`);
    await page.waitForSelector('.resultdiv');

    const pTagData = await page.evaluate(() => {
      const resultDiv = document.querySelector('.resultdiv');
      const pTags = resultDiv.querySelectorAll('p');
      return Array.from(pTags).map(p => p.textContent);
    });

    if (pTagData[0] !== "No results found. Please check your query again.") {
      const textBeforeRegistered = pTagData[0].match(/(.*?)(?= registered)/)[0].trim();
      const gstinMatch = pTagData[0].match(/GSTIN (\w+)/);
      const textAfterGSTIN = gstinMatch ? gstinMatch[1] : '';

      if (textBeforeRegistered) {
        const similarity = stringSimilarity.compareTwoStrings(companyName, textBeforeRegistered);
        console.log(`Similarity between company_name and textBeforeRegistered: ${similarity * 100}%`);

        if (similarity >= 0.95) {
          console.log('Company name matches with the text by at least 95%.');
          const companyExists = await checkCompanyExists(id);
          const modifiedPAn = remove2FromFrontAnd3FromBack(textAfterGSTIN);

          if (companyExists) {
            await updateCompanyGST(id, textAfterGSTIN, modifiedPAn);
            console.log(`Updated GST number for company with id ${id}`);
          } else {
            await insertCompanyDetail(id, textAfterGSTIN, modifiedPAn);
            console.log(`Inserted GST number for company with id ${id}`);
          }
        } else {
          console.log('Company name does not match with the text by at least 95%.');
        }
      }
    }
  } catch (error) {
    console.error('Error during web scraping:', error);
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

async function updateCompanyGST(id, gstNo, panNo) {
  try {
    const query = 'UPDATE company_details SET gst_no = ?, pan_no = ? WHERE company_id = ?';
    await executeQuery(query, [gstNo, panNo, id]);
  } catch (error) {
    console.error('Error updating company GST:', error);
    throw error;
  }
}

function remove2FromFrontAnd3FromBack(text) {
  if (text.length >= 5) {
    text = text.substring(2, text.length - 3).toUpperCase();
  }
  return text;
}

async function insertCompanyDetail(id, gstNo, panNo) {
  try {
    const query = 'INSERT INTO company_details (company_id, gst_no, pan_no) VALUES (?, ?, ?)';
    await executeQuery(query, [id, gstNo, panNo]);
  } catch (error) {
    console.error('Error inserting company detail:', error);
    throw error;
  }
}

function chunkArray(array, chunkSize) {
  const chunks = [];
  for (let i = 0; i < array.length; i += chunkSize) {
    chunks.push(array.slice(i, i + chunkSize));
  }
  return chunks;
}

async function main() {
  try {
    const data = await fetchDataFromDatabase();
    const batchSize = 5; // Number of parallel tasks to run
    const dataChunks = chunkArray(data, batchSize);

    for (const chunk of dataChunks) {
      const parallelTasks = chunk.map((record) => searchCompanyOnWebsite(record.id, record.company_name));
      await Promise.all(parallelTasks);
    }

  } catch (error) {
    console.error('Error:', error);
  }
}

main();
