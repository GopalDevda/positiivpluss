from selenium import webdriver
import mysql.connector
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.chrome.options import Options
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.chrome.service import Service as ChromeService
# import pdfquery
import glob
import os.path
from pathlib import Path
import shutil
import json
import time
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
query = "SELECT account_no FROM sensors WHERE provider_type = '15' AND login_status = '2';"  # Modify the query as per your table structure and conditions

# Execute the query
cursor.execute(query)

# Fetch all rows from the result
rows = cursor.fetchall()
print(rows)
if rows:
    options = webdriver.ChromeOptions()
    options.add_argument('--headless')
    options.add_argument('--no-sandbox')
    options.add_argument('--disable-dev-shm-usage')
    options.add_argument('--disable-gpu')
    options.add_experimental_option('prefs', {
    "download.default_directory": "/var/www/html/public/python_scripts/MP/MPmadhya/download/",
    #"download.default_directory": r"D:\Utopiic\AWS-ELECTRICITY\download",
    # "download.default_directory": r"D:\company\E_bill",
    "download.prompt_for_download": False, #To auto download the file
    "download.directory_upgrade": True,
    "plugins.always_open_pdf_externally": True #It will not show PDF directly in chrome
    })
    driver = webdriver.Chrome(options=options)

    url="https://services.mpcz.in/Consumer/#/last6-month-bill-history"
    driver.maximize_window()
    for kn_no_tuple in rows:
        try:
            driver.get(url)
            kn_no = kn_no_tuple[0]
            
            # Wait for the input field to be present and visible
            input_element = WebDriverWait(driver, 10).until(EC.presence_of_element_located((By.XPATH, '//*[@id="mat-input-0"]')))
            input_element.clear()
            input_element.send_keys(kn_no)
            
            # Click the button after waiting for it to be clickable
            search_button = WebDriverWait(driver, 10).until(EC.element_to_be_clickable((By.XPATH, '//*[@id="billForm"]/mat-card/mat-card-content/div[2]/div[2]/div/mat-card-actions/button[1]')))
            search_button.click()
            
            # Wait for the link to be clickable and click it
            download_link = WebDriverWait(driver, 10).until(EC.element_to_be_clickable((By.XPATH, '//*[@id="manageAccountTable"]/tbody/tr[1]/td[7]/a')))
            driver.execute_script("arguments[0].scrollIntoView();", download_link)
            download_link.click()
            
            # Wait for the necessary elements to load (modify the expected_conditions according to your use case)
            # WebDriverWait(driver, 10).until(EC.presence_of_element_located((By.XPATH, '//*[@id="some_element_id"]')))
            print('bill downloaded ',kn_no)

        except :
            
            print('unable to download this time')
            
    driver.close()

