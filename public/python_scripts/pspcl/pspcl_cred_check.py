from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.options import Options
import re
import time
import os as os
import pdfquery
import glob
import mysql.connector
from pathlib import Path
import shutil
import json
from selenium.webdriver.common.action_chains import ActionChains
from selenium.webdriver.support.ui import Select
import logging 
from logging import *

os.environ['TESSDATA_PREFIX'] = '/usr/local/share/tessdata'
db = mysql.connector.connect(
    host ="13.233.1.73" ,
    user = "remote",
    password = "PositiivPlus@01",
    database = "positiiv_db"
)


# Create a cursor to interact with the database
cursor = db.cursor()

# Query to fetch Acc_no and password from the database table
query = "SELECT username, password,Account_no FROM sensors WHERE provider_type = '72' and login_status != '2';"  # Modify the query as per your table structure and conditions

# Execute the query
cursor.execute(query)

# Fetch all rows from the result
rows = cursor.fetchall()
print(rows)
# Check if the query returned any rows with data
# url = "https://billpayment.pspcl.in/pgBillPay.aspx?uc=AccountLogin"
if rows:
    options = webdriver.ChromeOptions()
    options.add_argument('--headless')
    options.add_argument('--no-sandbox')
    options.add_argument('--disable-dev-shm-usage')
    options.add_argument('--disable-gpu')
    options.add_argument("--window-size=1920,1080")
    options.add_argument("--start-maximized")

    options.add_experimental_option('prefs', {
        "download.default_directory": "/var/www/html/public/python_scripts/pspcl/",
        # "download.default_directory": r"D:\Utopiic\AWS-ELECTRICITY\download",
        # "download.default_directory": r"D:\compandownoy\E_bill",
        "download.prompt_for_download": False,
        "download.directory_upgrade": True,
        "plugins.always_open_pdf_externally": True
    })
    settings = {
       "recentDestinations": [{
            "id": "Save as PDF",
            "origin": "local",
            "account": "",
        }],
        "selectedDestinationId": "Save as PDF",
        "version": 2
    }
    prefs = {'printing.print_preview_sticky_settings.appState': json.dumps(settings), 'savefile.default_directory': '/var/www/html/public/python_scripts/pspcl'}
    options.add_experimental_option('prefs', prefs)
    options.add_argument('--kiosk-printing')
    # driver_path = r'C:\\Users\\***\\***\\chromedriver.exe'
    
    # Loop through the rows and process each record
    
    for row in rows:
        driver = webdriver.Chrome(options=options)
        Username, password,account_no = row # Unpack the values from the row

        time.sleep(1)
#         # driver.get(url)
#         # time.sleep(1)
# # driver.find_element(by=By.XPATH, value='//*[@id="urLoginName"]').send_keys (Account_no.value)
# # driver.find_element(by=By.XPATH, value='//*[@id="password"]').send_keys (Password.value)
#         # Account_no = "utilitybills@aubank.in"
#         # Password = "Aubank@12345"
        try:
            print(Username,password,account_no)
            url = "https://billpayment.pspcl.in/pgBillPay.aspx?uc=AccountLogin"
            driver.get(url)
            time.sleep(2)
            action = ActionChains(driver)
            action.click().perform()

            driver.find_element(by=By.XPATH, value='//*[@id="txtbxEmail"]').send_keys (Username)
            driver.find_element(by=By.XPATH, value='//*[@id="txtbxPassword"]').send_keys (password)
            driver.find_element(by=By.XPATH, value='//*[@id="btnLogIn"]').click()
            time.sleep(2)
            driver.find_element(by=By.XPATH, value='//*[@id="lnkbtnBillHistory"]').click()
            time.sleep(2)
            
            # driver.switch_to.window(driver.window_handles [0])
            time.sleep(5)
            te=Select(driver.find_element(by=By.XPATH, value='//*[@id="ddlSelectAcno"]'))
            all_options={}
            for i in te.options:
                all_options[i.text[0:10]]=i.text
            
            if account_no in all_options:
                print('login successful')
                  # Update the status column in the SQL table to "Connected" for this username and password
                update_status_query = "UPDATE sensors SET login_status = '2' WHERE Username = %s AND password = %s;"
                cursor.execute(update_status_query, (Username, password))
                db.commit()
                time.sleep(3)
            
            else:
                print('account no. not found')
                # # Update the status column in the SQL table to "Incorrect sensorss" for this username and password
                update_status_query = "UPDATE sensors SET login_status = '1' WHERE Username = %s AND password = %s;"
                cursor.execute(update_status_query, (Username, password))
                db.commit()
            
            # driver.find_element(by=By.XPATH, value='//*[@id="imgbtngView"]').click()
            # if len(driver.window_handles) > 1:
            #     driver.switch_to.window(driver.window_handles [1])
            #     driver.find_element(by=By.XPATH, value='//*[@id="btnPrintBill"]').click()
            #     driver.close()
            # else:
            #     continue
        except:
            print('wrong password')
            # # Update the status column in the SQL table to "Incorrect sensorss" for this username and password
            update_status_query = "UPDATE sensors SET login_status = '1' WHERE Username = %s AND password = %s;"
            cursor.execute(update_status_query, (Username, password))
            db.commit()
    driver.close()
        
        

