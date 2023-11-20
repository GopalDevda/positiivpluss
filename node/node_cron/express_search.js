const mysql = require('mysql');

const searchTerm = process.argv[2]; // Get the search term from command-line argument
const page = process.argv[3] || 1; // Get the page number from the command-line argument, default to page 1 if not provided
const perPage = 50; // Number of results per page

if (!searchTerm) {
  console.error('Search parameter is missing');
  process.exit(1);
}

// Calculate the offset based on the page number
const offset = (page - 1) * perPage;

// Create a MySQL database connection
const connection = mysql.createConnection({
  host: '127.0.0.1',
  user: 'root',
  password: 'POS2022',
  database: 'positiiv_db',
});

// Connect to the database
connection.connect((err) => {
  if (err) {
    console.error('Error connecting to the database: ' + err.stack);
    process.exit(1);
  }
  console.log('Connected to the database as ID ' + connection.threadId);

  // Perform the SQL query with pagination to search for the data
  const sql = 'SELECT * FROM madhyapradesh WHERE MATCH(company_name) AGAINST(?) LIMIT ? OFFSET ?';
//const sql = 'SELECT * FROM madhyapradesh WHERE CONTAINS(company_name, ?) LIMIT ? OFFSET ?';
  connection.query(sql, [`%${searchTerm}%`, perPage, offset], (err, results) => {
    if (err) {
      console.error('Error executing SQL query: ' + err.message);
      process.exit(1);
    }

    console.log(JSON.stringify(results));
    // Close the database connection
    connection.end();
   return JSON.stringify(results);
  });
});

