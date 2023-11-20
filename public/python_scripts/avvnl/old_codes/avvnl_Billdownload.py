from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.options import Options
import PyPDF2
import re
import time
import os as os
import pandas as pd
import openpyxl
import pdfquery
import glob
import os.path
from PIL import Image
from pytesseract import pytesseract
from pathlib import Path
import shutil
import logging
from logging import *
import mysql.connector
import os
os.environ['TESSDATA_PREFIX'] = '/usr/local/share/tessdata'
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
query = "SELECT username, password,kn_no FROM sensors WHERE provider_type = '73' AND login_status = '2';"  # Modify the query as per your table structure and conditions

# Execute the query
cursor.execute(query)

# Fetch all rows from the result
rows = cursor.fetchall()
print(rows)
# Check if the query returned any rows with data
# chromedriver_path = "/usr/local/bin/chromedriver"

if rows:
    options = webdriver.ChromeOptions()
    options.add_argument('--headless')
    options.add_argument('--no-sandbox')
    options.add_argument('--disable-dev-shm-usage')
    options.add_argument('--disable-gpu')

    options.add_experimental_option('prefs', {
        "download.default_directory": "/var/www/html/public/python_scripts/avvnl/download/",
        # "download.default_directory": r"D:\Utopiic\AWS-ELECTRICITY\download",
        "download.prompt_for_download": False,
        "download.directory_upgrade": True,
        "plugins.always_open_pdf_externally": True
    })




    for row in rows:
        Username, Password,kn_no = row
        driver = webdriver.Chrome(options=options)
        driver.maximize_window()
        url='http://wss.rajdiscoms.com/avvnl_web/'
        
        # try:
        driver.get(url)
        time.sleep(3)
        driver.find_element(by=By.XPATH, value='//*[@id="txtUserName"]').send_keys (Username)
        driver.find_element(by=By.XPATH, value='//*[@id="txtPassword"]').send_keys (Password)
        # except:
        #     print("check user credencials")
        count = 0

        while(True):
            try:
                count += 1
                # driver.refresh()
                element = driver.find_element(by=By.XPATH, value='//*[@id="Image1"]')
                element.screenshot('/var/www/html/public/python_scripts/avvnl/download/captcha.png')
                image = Image.open('/var/www/html/public/python_scripts/avvnl/download/captcha.png')
                # element.screenshot(r'D:\Utopiic\AWS-ELECTRICITY\download\captcha.png')
                # image = Image.open(r'D:\Utopiic\AWS-ELECTRICITY\download\captcha.png')
                print('captcha image downloaded')
                path_to_tesseract = '/usr/local/bin/tesseract'
                # path_to_tesseract = r'C:/Program Files/Tesseract-OCR/tesseract.exe'
                path_to_image = '/var/www/html/public/python_scripts/avvnl/download/captcha.png'
                # path_to_image =r'D:\Utopiic\AWS-ELECTRICITY\download\captcha.png'
                #Point tessaract_cmd to tessaract.exe
                pytesseract.tesseract_cmd = path_to_tesseract
                #Open image with PIL
                img = Image.open(path_to_image)
                #Extract text from image
                text = pytesseract.image_to_string(img)
                print(text)
                time.sleep(2)
                driver.find_element(by=By.XPATH, value='//*[@id="txtSecurityCode"]').send_keys (text)
                driver.find_element(by=By.XPATH, value='//*[@id="btnLogin"]').click()
                break
            except Exception as e:
                print(e)
                if count == 10:
                    break
                continue
        time.sleep(3)
        try:
            # Check if the element for successful login exists
            # login_success_element = wait.until(EC.presence_of_element_located((By.XPATH, '//*[@id="DivMaster"]/table[2]/tbody/tr/td/table/tbody/tr[1]/td/fieldset/legend')))
            time.sleep(5) 

            for i in range(0, 26):
                xpath = '//*[@id="cphWSS_grdAccounts_lnkKNO_{}"]'.format(i)
                element = driver.find_element(By.XPATH, xpath)
                text = element.text
                # print(text)
                if text == kn_no:
                    # Click on the element if there is a match
                    element.click()
                    time.sleep(5)
                    
                    # Perform additional actions as needed
                    driver.find_element(By.XPATH, '//*[@id="MenuActivitiesn4"]').click()
                    time.sleep(5)
                    driver.close()
                    found=True
                    break
            
        except Exception as e:
            print('An error occurred:', str(e))

        original_filename = "/var/www/html/public/python_scripts/avvnl/download/CurrentBill.pdf"
        # original_filename = r"D:\Utopiic\AWS-ELECTRICITY\download\CurrentBill.pdf"
        while not os.path.exists(original_filename):
            time.sleep(1)

        # current_datetime = datetime.datetime.now().strftime("%Y-%m-%d_%H-%M-%S")
        print("step 3")
        # Rename the downloaded PDF file
        new_filename = '/var/www/html/public/python_scripts/avvnl/download/{}.pdf'.format(kn_no)
        # new_filename = r'D:\Utopiic\AWS-ELECTRICITY\download\{}.pdf'.format(kn_no)
        if not os.path.exists(new_filename):
            # Rename the downloaded PDF file
            os.rename(original_filename, new_filename)
            print("File renamed to:", kn_no)
        else:
            print("File already exists with the desired name. Skipped renaming.")
            os.remove(original_filename)
   

        # Close the WebDriver
        driver.quit()

                  
