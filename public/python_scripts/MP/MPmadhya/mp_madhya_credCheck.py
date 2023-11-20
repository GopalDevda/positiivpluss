import mysql.connector
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from PIL import Image
from pytesseract import pytesseract
from selenium.webdriver.chrome.options import Options
import glob
import time
import os.path
import os

# os.environ['TESSDATA_PREFIX'] = '/usr/local/share/tessdata'
# Connect to the MySQL database
db = mysql.connector.connect(
    host ="13.233.1.73" ,
    user = "remote",
    password = "PositiivPlus@01",
    database = "positiiv_db"
)


# Create a cursor to interact with the database
cursor = db.cursor()

# Query to fetch Acc_no and password from the database table
query = "SELECT account_no FROM sensors WHERE provider_type = '15' AND login_status != '2';"  # Modify the query as per your table structure and conditions

# Execute the query
cursor.execute(query)

# Fetch all rows from the result
rows = cursor.fetchall()
print(rows)


url="https://services.mpcz.in/Consumer/#/last6-month-bill-history"
# url='https://www.youtube.com/'
if rows:
    options = webdriver.ChromeOptions()
    options.add_argument('--headless')
    options.add_argument('--no-sandbox')
    options.add_argument('--disable-dev-shm-usage')
    options.add_argument('--disable-gpu')

    options.add_experimental_option('prefs', {
        "download.default_directory": "/var/www/html/public/python_scripts/MP/MPmadhya/download/",
        # "download.default_directory": r"D:\Utopiic\AWS-ELECTRICITY\download",
        # "download.default_directory": r"D:\company\E_bill",
        "download.prompt_for_download": False,
        "download.directory_upgrade": True,
        "plugins.always_open_pdf_externally": True
    })
    driver = webdriver.Chrome(options=options)
    driver.maximize_window()

    for kn_no_tuple in rows:
        
        try:
            driver.get(url)
            kn_no = kn_no_tuple[0]  
            # Wait for the input field to be present and clear it
            input_field = WebDriverWait(driver, 10).until(EC.presence_of_element_located((By.XPATH, '//*[@id="mat-input-0"]')))
            input_field.clear()
            
            # Input the value and wait for the button to be clickable
            input_field.send_keys(kn_no)
            WebDriverWait(driver, 10).until(EC.element_to_be_clickable((By.XPATH, '//*[@id="billForm"]/mat-card/mat-card-content/div[2]/div[2]/div/mat-card-actions/button[1]'))).click()

            # Wait for the link to be present
            WebDriverWait(driver, 10).until(EC.presence_of_element_located((By.XPATH, '//*[@id="manageAccountTable"]/tbody/tr[1]/td[7]/a')))

            # Wait for additional time if needed (5 seconds in this case)
            time.sleep(5)
            
            print('Login successful',kn_no)

            # Update the status column in the SQL table to "correct sensors" for this username 
            update_status_query = "UPDATE sensors SET login_status = '2', current_status = '3' WHERE account_no = %s;"
            cursor.execute(update_status_query, (kn_no,))
            db.commit()
            
        except Exception as e:
            # Update the status column in the SQL table to "wrong credentials" for this username 
            update_status_query = "UPDATE sensors SET login_status = '1' WHERE account_no = %s;"
            cursor.execute(update_status_query, (kn_no,))
            db.commit()
            print('Wrong credentials for', kn_no)
            # print('Error:', str(e))

