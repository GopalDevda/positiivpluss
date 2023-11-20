import mysql.connector
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
import pandas as pd
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC

# Database configuration
db_config = {
    'host': 'localhost',
    'user': 'root',
    'password': 'POS2022',
    'database': 'positiiv_db',
}

# Establish a database connection
db_connection = mysql.connector.connect(**db_config)

def execute_query(query, params=None):
    cursor = db_connection.cursor()
    cursor.execute(query, params)
    db_connection.commit()
    return cursor

def fetch_data_from_database():
    query = "SELECT id, corporate_identification_number, company_name FROM all_company_data WHERE id NOT IN (SELECT company_id FROM company_details);"
    cursor = execute_query(query)
    results = cursor.fetchall()
    return results

def scrape_director_details(id, cin, name):
    # Launch a headless Chrome browser
    options = webdriver.ChromeOptions()
    options.add_argument('--headless')
    options.add_argument('--no-sandbox')
    options.add_argument('--disable-setuid-sandbox')
    browser = webdriver.Chrome(options=options)

    url = 'https://www.zaubacorp.com/'
    browser.get(url)

    try:
        search_input = browser.find_element(By.NAME, 'searchvalue')
        search_input.send_keys(cin)
        search_input.send_keys(Keys.RETURN)

        # Wait for the page to load
        wait = WebDriverWait(browser, 10)
        wait.until(EC.presence_of_element_located((By.CSS_SELECTOR, 'table tbody tr[data-parent="#OrderPackages"]'))

        rows = browser.find_elements(By.CSS_SELECTOR, 'table tbody tr[data-parent="#OrderPackages"]')
        data = []

        for row in rows:
            cells = row.find_elements(By.TAG_NAME, 'td')
            row_data = [cell.text.strip() for cell in cells]
            data.append(row_data)

        print(f'Director Details for CIN {cin}:')
        df = pd.DataFrame(data, columns=['DIN Number', 'Director Name', 'Designation', 'Appointment Date'])
        print(df)

        # Extract the company ownership data
        company_ownership_data = []
        for row in data:
            company_ownership_data.append((id, row[0], row[1], row[2], row[3]))

        # Check if the company_id exists in the database
        company_exists_query = 'SELECT id FROM company_ownership WHERE company_id = %s'
        cursor = execute_query(company_exists_query, (id,))
        existing_company = cursor.fetchone()

        if existing_company:
            # If the company_id exists, delete the existing data
            delete_query = 'DELETE FROM company_ownership WHERE company_id = %s'
            execute_query(delete_query, (id,))

        # Insert the new table data into the company ownership data
        insert_query = 'INSERT INTO company_ownership (company_id, din_no, director_name, designation, appointment_date) VALUES (%s, %s, %s, %s, %s)'
        execute_query(insert_query, company_ownership_data)

    except Exception as e:
        print('Error:', e)
    finally:
        browser.quit()

def main():
    data = fetch_data_from_database()
    for record in data:
        scrape_director_details(record[0], record[1], record[2])

if __name__ == "__main__":
    main()
