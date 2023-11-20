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
import logging 
import shutil
from pathlib import Path
from logging import *
logging.basicConfig(filename='D:\\Dikshant_Electricity_data\\Electricity_Data\\UHBVN\\uhbvn_logfile.log ', filemode='w',level=INFO, format='%(asctime)s %(name)s %(message)s')
logger = getLogger('--uhbvn--')

options = webdriver.ChromeOptions()
options.add_experimental_option('prefs', {
"download.default_directory": "D:\\Dikshant_Electricity_data\\Electricity_Data\\UHBVN\\download_uhbvn", #Change default directory for downloads
"download.prompt_for_download": False, #To auto download the file
"download.directory_upgrade": True,
"plugins.always_open_pdf_externally": True #It will not show PDF directly in chrome
})
driver = webdriver.Chrome(options=options)

login = "D:\\Dikshant_Electricity_data\\Electricity_Data\\UHBVN\\uhbvn_login.xlsx"
df= pd.read_excel(login)
url='https://www.uhbvn.org.in/web/portal/view-bill'


for row in df.iterrows():
  
    Account_no = row[1][0]
    Password = row[1][1]

    # url ="https://www.uhbvn.org.in/web/portal/view-bill"
    # driver = webdriver.Chrome(options=options)
    # driver.get('https://www.google.com/')
    try:
        driver.get('https://www.uhbvn.org.in/web/portal/view-bill')
        driver.find_element(by=By.XPATH, value='//*[@id="accountNo"]').send_keys (Account_no)
        driver.find_element(by=By.XPATH, value='//*[@id="password"]').send_keys (Password)
        driver.find_element(by=By.XPATH, value='//*[@id="submit"]').click()
        time.sleep(3)
        # driver.find_element(by=By.XPATH, value='//*[@id="subNavigation consumo45"]/ul/li[3]').click()
        # time.sleep(3)
        driver.find_element(by=By.XPATH, value='//*[@id="viewBillForm"]/table[2]/tbody/tr[2]/td[5]/a').click()
        time.sleep(8)
        driver = webdriver.Chrome(options=options)
        logger.info(Account_no)
        logger.info("Bill download successfully")
        logger.info("___________________________________________NEXT_______________________________________________________________________________________")

    except:
        logger.info("check acc no ")
        logger.info(Account_no)
        logger.info("___________________________________________NEXT_______________________________________________________________________________________")
     

