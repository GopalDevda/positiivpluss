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
import json
from selenium.webdriver.support.ui import Select

logging.basicConfig(filename='D:\\Utopiic\\LOGS\\Maha_HT.log', filemode='w',level=INFO, format='%(asctime)s %(name)s %(message)s')
logger = getLogger('--mscdel_ht--')

download_dir = r"D:\\Dikshant_Electricity_data\\Electricity_Data\\MSCDEL_maharastra\\download_ht"
options = webdriver.ChromeOptions()
Options = webdriver.ChromeOptions()
settings = {
       "recentDestinations": [{
            "id": "Save as PDF",
            "origin": "local",
            "account": "",
        }],
        "selectedDestinationId": "Save as PDF",
        "version": 2
    }
prefs = {'printing.print_preview_sticky_settings.appState': json.dumps(settings), 'savefile.default_directory': download_dir}
Options.add_experimental_option('prefs', prefs)
Options.add_argument('--kiosk-printing')
driver_path = r'C:\\Users\\***\\***\\chromedriver.exe'
driver = webdriver.Chrome(options=Options)
url='https://wss.mahadiscom.in/wss/wss?uiActionName=getViewPayBill'

list = [
	'155045560299',
'000487231878',
'000484862575',
'000484862583',
'000484862591',
'000484865990',
'000484865981',
'110014630376',
'110014915222',
'049016708754',
'049018476451',
'049013930791',
'001800654731',
'160220647002',
'049010305127',
'020024310605',
'029470731352',
'091975995688',
'153028818999',
'160240256115',
'160250505903',
'162011200541',
'162014587861',
'170012788242',
'170051156857',
'170051199394',
'170055083188',
'170145793648',
'170567027808',
'172005750445',
'172054972615',
'173210127811',
'176025456841',
'187271986095',
'190564033441',
'210014027445',
'219014787340',
'266514041539',
'266517845329',
'279940258876',
'366474758600',
'370011009192',
'370024173919',
'390010622461',
'410022881942',
'419990020524',
'490010111797',
'490014746525',
'510030710051',
'510030811702',
'550017733583',
'590011060350',
'850710703438'

		]
for i in list:
    driver.get(url)
    driver.find_element(by=By.XPATH, value='//*[@id="consumerNo"]').send_keys (i)
    count = 0

    download_path = 'D:\\Utopiic\\downoad_bills\\Download\\'
    filelist = glob.glob(os.path.join(download_path, "*"))
    for f in filelist:
        os.remove(f)

    while(True):
        count += 1
        try:
            count += 1
            driver.find_element(by=By.XPATH, value='//*[@id="consumerNo"]').send_keys (i)
            time.sleep(2)

            element = driver.find_element(by=By.XPATH, value='//*[@id="captcha"]')
            element.screenshot('D:\\Dikshant_Electricity_data\\Electricity_Data\\MSCDEL_maharastra\\captcha\\cap_ht.png')
            image = Image.open("D:\\Dikshant_Electricity_data\\Electricity_Data\\MSCDEL_maharastra\\captcha\\cap_ht.png")
            path_to_tesseract = r'C:/Program Files/Tesseract-OCR/tesseract.exe'
            path_to_image = 'D:\\Dikshant_Electricity_data\\Electricity_Data\\MSCDEL_maharastra\\captcha\\cap_ht.png'
            #Point tessaract_cmd to tessaract.exe
            pytesseract.tesseract_cmd = path_to_tesseract
            #Open image with PIL
            img = Image.open(path_to_image)
            #Extract text from image
            text = pytesseract.image_to_string(img)
            print(text)
            driver.find_element(by=By.XPATH, value='//*[@id="txtInput"]').send_keys (text)
            driver.find_element(by=By.XPATH, value='//*[@id="submitButton"]').click()
            a = driver.find_element(by=By.XPATH, value='//*[@id="billingTable"]/tbody') ## Bill table, check if it exists
            # driver.find_element(by=By.XPATH, value='//*[@id="ddlLanguage"]').select_by_visible_text('Banana')
        except :
            print("Wrong Captcha")
            driver.find_element(by=By.XPATH, value='//*[@id="btnCaptchaRefViewpaybill"]/img').click()   #captcha refresh 
            continue
            # break
        
        driver.find_element(by=By.XPATH, value='//*[@id="Img1"]').click()                                              ##bill click                 
        time.sleep(3)
        driver.find_element(by=By.XPATH, value='//*[@id="HTEnergyBillForm"]/table[1]/tbody/tr/td/a').click()     ##bill view
        driver.switch_to.window(driver.window_handles [1])
        driver.find_element(by=By.XPATH, value='/html/body/div/div/div/button').click()  ###bill download
        time.sleep(5)
        driver.close()
        driver.switch_to.window(driver.window_handles [0])
        driver.find_element(by=By.XPATH, value='//*[@id="leftnav_viewPayBill"]').click()
        break

print("mscdel_ht work is done")

        try:
            folder_path = 'D:\\Utopiic\\downoad_bills\\Download\\'
            for F_path in Path(folder_path).glob("**/*.pdf"):
                print(F_path)
            time.sleep(3)
            print("Bill Downloaded successfully")
            print(Account_no)
        except:
            logger.info("pdf download path finding error ")
            print(Account_no)

        try:
            new_path = "D:\\Utopiic\\downoad_bills\\Maharastra\\pdfs\\"
            new_name = new_path + i + ".pdf"
            shutil.move(F_path, new_name)
            logger.info("pdf saved successfully")
            logger.info("___________________________________________NEXT_______________________________________________________________________________________")
            logger.info(Account_no)
        except:
            logger.info('File remane error ')
            logger.info("___________________________________________NEXT_______________________________________________________________________________________")
            print(Account_no)
        time.sleep(3)
        driver.close()
        driver.switch_to.window(driver.window_handles [0])
        driver.find_element(by=By.XPATH, value='//*[@id="leftnav_viewPayBill"]').click()
        break
