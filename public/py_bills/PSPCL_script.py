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
import json
from selenium.webdriver.common.action_chains import ActionChains
from selenium.webdriver.support.ui import Select
import logging 
from logging import *

download_dir = "D:\\Dikshant_Electricity_data\\Electricity_Data\\PUNJAB\\download_punjab"
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
# driver_path = r'C:\\Users\\***\\***\\chromedriver.exe'
driver = webdriver.Chrome(options=Options)

Account_no = "utilitybills@aubank.in"
Password = "Aubank@12345"
url = "https://billpayment.pspcl.in/pgBillPay.aspx?uc=AccountLogin"
driver.get(url)
time.sleep(2)
action = ActionChains(driver)
action.click().perform()

driver.find_element(by=By.XPATH, value='//*[@id="txtbxEmail"]').send_keys (Account_no)
driver.find_element(by=By.XPATH, value='//*[@id="txtbxPassword"]').send_keys (Password)
driver.find_element(by=By.XPATH, value='//*[@id="btnLogIn"]').click()
driver.find_element(by=By.XPATH, value='//*[@id="lnkbtnBillHistory"]').click()

for x in range(50):
    driver.switch_to.window(driver.window_handles [0])
    time.sleep(5)
    Select(driver.find_element(by=By.XPATH, value='//*[@id="ddlSelectAcno"]')).select_by_index(x)
    time.sleep(3)
    driver.find_element(by=By.XPATH, value='//*[@id="imgbtngView"]').click()
    if len(driver.window_handles) > 1:
        driver.switch_to.window(driver.window_handles [1])
        driver.find_element(by=By.XPATH, value='//*[@id="btnPrintBill"]').click()
        driver.close()
    else:
        continue
