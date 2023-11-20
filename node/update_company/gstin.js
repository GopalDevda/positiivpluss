const puppeteer = require('puppeteer');
const mysql = require('mysql');
const axios = require('axios');
const fs = require('fs');
const { promisify } = require('util');
const Tesseract = require('tesseract.js');

const dbConfig = {
  host: 'localhost',
  user: 'root',
  password: 'POS2022',
  database: 'positiiv_db',
};

const dbPool = mysql.createPool(dbConfig);

// Convert fs.readFile into a Promise-based function
const readFile = promisify(fs.readFile);

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

async function extractTextFromCaptchaImage(imageUrl) {
  try {
    // Download the image from the URL using Axios
    const response = await axios.get(imageUrl, { responseType: 'arraybuffer' });
    const imageData = response.data;

    // Save the image to a temporary file
    await fs.promises.writeFile('captcha.png', imageData);

    // Use Tesseract.js to extract text from the image
    const { data: { text } } = await Tesseract.recognize('captcha.png', 'eng');

    // Delete the temporary image file
    await fs.promises.unlink('captcha.png');

    return text.trim();
  } catch (error) {
    console.error('Error during CAPTCHA text extraction:', error);
    return null;
  }
}

async function scrapeAndUpdateData() {
  try {
    const companies = await executeQuery('SELECT gst_no FROM company_details');

    const browser = await puppeteer.launch({
      headless: "new", // Set to true for headless mode, false for visible mode
      args: ['--no-sandbox', '--disable-setuid-sandbox'],
    });

    const page = await browser.newPage();
    await page.goto('https://services.gst.gov.in/services/searchtp');

    for (const company of companies) {
      const gstin = company.gst_no;

      await page.waitForSelector('input[name="for_gstin"]');
      await page.evaluate((gstin) => {
        document.querySelector('input[name="for_gstin"]').value = gstin;
      }, gstin);

      // Click the search button
      // Wait for the CAPTCHA image to appear
      await page.waitForSelector('#imgCaptcha');
      const captchaImage = await page.$('#imgCaptcha');

      if (captchaImage) {
        const captchaImageUrl = await page.evaluate((captchaImage) => {
          return captchaImage.getAttribute('src');
        }, captchaImage);

        if (captchaImageUrl) {
          // Extract text from the CAPTCHA image
          const captchaText = await extractTextFromCaptchaImage('https://services.gst.gov.in' + captchaImageUrl);

          if (captchaText) {
            await page.type('#fo-captcha', captchaText);

            // Click the search button again to submit the CAPTCHA
            // await page.click('#searchtp');
            await page.keyboard.press('Enter');

            await page.waitForSelector('div[ng-if="!goodServErrMsg"]');
            const resultHTML = await page.evaluate(() => {
              return document.querySelector('div[ng-if="!goodServErrMsg"]').outerHTML;
            });

            console.log(resultHTML);

            // Update the HTML in the database where gst_no matches
            // await executeQuery('UPDATE scraped_html SET html = ? WHERE gst_no = ?', [resultHTML, gstin]);
          } else {
            console.error('CAPTCHA text extraction failed.');
          }
        } else {
          console.error('CAPTCHA image URL not found.');
        }
      } else {
        console.error('CAPTCHA image not found on the page.');
      }
    }

    await browser.close();
  } catch (error) {
    console.error('Error during scraping and updating data:', error);
  }
}

scrapeAndUpdateData();
