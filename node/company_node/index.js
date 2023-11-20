const axios = require('axios');
const fs = require('fs');
const xlsx = require('xlsx');
const mysql = require('mysql2/promise'); // You can also use 'mysql' if you prefer callbacks

// Define your MySQL database connection parameters
const dbConfig = {
  host: 'localhost',
  user: 'root',
  password: 'POS2022',
  database: 'positiiv_db',
};

// Create a connection pool for the database
const pool = mysql.createPool(dbConfig);

downloadExcelFile();

async function downloadExcelFile() {
  try {
    const url = 'https://www.mca.gov.in/mcafoportal/companiesRegReport.do';
    const response = await axios.get(url, {
      responseType: 'stream',
    });
    const filePath = 'company/excel.xlsx';
    response.data.pipe(fs.createWriteStream(filePath));
    await new Promise((resolve) => {
      response.data.on('end', () => {
        resolve();
      });
    });

    const excelFilePath = filePath; // Replace with your Excel file path
    const excelData = readExcelFile(excelFilePath);

    if (excelData.length > 0) {
      await insertDataIntoDatabase(excelData);
    }
    console.log(`Downloaded file saved as: ${filePath}`);
  } catch (error) {
    console.error('Error:', error);
  }
}

function readExcelFile(filePath) {
  try {
    const workbook = xlsx.readFile(filePath);
    const sheetName = workbook.SheetNames[0]; // Assuming data is in the first sheet
    const worksheet = workbook.Sheets[sheetName];

    // Convert Excel data to an array of objects
    const excelData = xlsx.utils.sheet_to_json(worksheet);

    return excelData;
  } catch (error) {
    console.error('Error reading Excel file:', error);
    return [];
  }
}

async function insertDataIntoDatabase(data) {
  try {
    const connection = await pool.getConnection();
    const tableName = 'all_company_data'; // Replace with your table name
    for (let i = 0; i < data.length; i++) {
      if (i > 0) {
        const row = data[i];
	console.log(row);
        const keys = Object.keys(row);
        const values_data = keys.map((key) => row[key]);
        const checkSql = 'SELECT * FROM ?? WHERE corporate_identification_number = ?';
        const checkValues = [tableName, values_data[0]];
        const [existingRows] = await connection.query(checkSql, checkValues);
        if (existingRows.length === 0) {
          const insertSql = `INSERT INTO ${tableName} (corporate_identification_number, company_name, date_of_registration, company_class, company_category, company_sub_category, registrar_of_companies, authorized_cap, paidup_capital, registered_state, registered_office_address, principal_bussiness_activity_as_per_cin, company_status, industrial_class, email_addr, latest_year_ar, latest_year_bs, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)`;
          const values = [
            values_data[0],
            values_data[1],
            values_data[2]??'NA',
            values_data[7]??'NA',
            values_data[5]??'NA',
            values_data[6]??'NA',
            values_data[4]??'NA',
            values_data[8]??'NA',
            values_data[9]??'NA',
            values_data[3]??'NA',
            values_data[12]??'NA',
            values_data[11]??'NA',
	    'unknown',
	    '0',
	    'NA',
	    'NA',
	    'NA',
	    '1'
          ];
          await connection.query(insertSql, values);
        }

      }
      // for (const row of data) {
      //const keys = Object.keys(row);
      //console.log(keys);
      //exit;
      //if(keys > 0){
      // const values_data = keys.map((key) => row[key]);
      //         console.log(values_data[1]); 
      // Check if the record already exists based on corporate_identification_number
      // const checkSql = 'SELECT * FROM ?? WHERE corporate_identification_number = ?';
      // const checkValues = [tableName, values_data[0]];
      //const [existingRows] = await connection.query(checkSql, checkValues);

      //if (existingRows.length === 0) {
      // Use placeholders for values in the SQL query to prevent SQL injection
      //const insertSql = `INSERT INTO ${tableName} (corporate_identification_number, company_name, date_of_registration, company_class, company_category, company_sub_category, registrar_of_companies, authorized_cap, paidup_capital, registered_state, registered_office_address, principal_bussiness_activity_as_per_cin) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)`;
      //const values = [
      // values_data[0],
      // values_data[1],
      // values_data[2],
      // values_data[7],
      // values_data[5],
      // values_data[6],
      // values_data[4],
      // values_data[8],
      // values_data[9],
      // values_data[3],
      // values_data[12],
      // values_data[11],
      // ];
      // await connection.query(insertSql, values);
      // }
      //}
    }

    connection.release();
    console.log('Data inserted into the database.');
  } catch (error) {
    console.error('Error inserting data into the database:', error);
  }
}

