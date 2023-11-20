const fs = require('fs');
const readline = require('readline');

// Replace with your search term
const searchTerm = 'TATA';

const readStream = fs.createReadStream('Maharashtra.json', 'utf8');
const rl = readline.createInterface({
  input: readStream,
  crlfDelay: Infinity,
});

// Function to search for data in each line of the JSON file
rl.on('line', (line) => {
	console.log(line); 
// const jsonData = JSON.parse(fs);

  // Customize your search logic here
  //if (containsData(jsonData, searchTerm)) {
    //console.log('Found data:', jsonData);
  //}
});

rl.on('close', () => {
  console.log('Search completed.');
});

// Function to check if data matches the search term
function containsData(data, searchTerm) {
  // Customize your search logic here
  // For example, check if a specific key or value matches the searchTerm
  if (data && data.someKey === searchTerm) {
    return true;
  }
  return false;
}

