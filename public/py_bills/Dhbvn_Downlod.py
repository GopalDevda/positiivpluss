from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.options import Options
import re
import time
import os as os
import pandas as pd
import openpyxl
import pdfquery
import glob
import os.path
import logging 
import shutil
from pathlib import Path
from logging import *
import json
# logging.basicConfig(filename='D:\\Dikshant_Electricity_data\\Electricity_Data\\DHBVN\\dhbvn_logfile.log', filemode='w',level=INFO, format='%(asctime)s %(name)s %(message)s')
logger = getLogger('--DHBVN--')

login = "D:\\Dikshant_Electricity_data\\Electricity_Data\\DHBVN\\dhbvn_login.xlsx"
options = webdriver.ChromeOptions()
options.add_experimental_option('prefs', {
"download.default_directory": "D:\\Dikshant_Electricity_data\\Electricity_Data\\DHBVN\\download_dhbvn", #Change default directory for downloads
"download.prompt_for_download": False, #To auto download the file
"download.directory_upgrade": True,
"plugins.always_open_pdf_externally": True #It will not show PDF directly in chrome
})
driver = webdriver.Chrome(options=options)

df= pd.read_excel(login)
url='https://www.dhbvn.org.in/web/portal/view-bill'
for row in df.iterrows():
    try:   
        Account_no = row[1][0]
        Password = row[1][1]
        driver.get(url)
        driver.find_element(by=By.XPATH, value='//*[@id="accountNo"]').send_keys (Account_no)
        driver.find_element(by=By.XPATH, value='//*[@id="password"]').send_keys (Password)
        driver.find_element(by=By.XPATH, value='//*[@id="submit"]').click()
    
        time.sleep(3)
        driver.find_element(by=By.XPATH, value='//*[@id="viewBillForm"]/table[2]/tbody/tr[2]/td[5]/a/img').click()
        time.sleep(7)
        # if len(driver.window_handles) > 1:
        #     driver.switch_to.window(driver.window_handles [1])
        #     driver.close()
        # else:
        driver = webdriver.Chrome(options=options)
        time.sleep(3)
       
    except:
       logger.info("Check user credentials for Account No:")
       logger.info(Account_no)

