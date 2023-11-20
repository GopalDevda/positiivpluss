from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.options import Options
import pandas as pd
import openpyxl
import pdfquery
import glob
import os.path 
from pathlib import Path
import shutil
import json
import time
options = webdriver.ChromeOptions()
options.add_experimental_option('prefs', {
"download.default_directory": "D:\\Dikshant_Electricity_data\\Electricity_Data\\MPmadhya\\download", #Change default directory for downloads
"download.prompt_for_download": False, #To auto download the file
"download.directory_upgrade": True,
"plugins.always_open_pdf_externally": True #It will not show PDF directly in chrome
})
driver = webdriver.Chrome(options=options)

url="https://services.mpcz.in/Consumer/#/last6-month-bill-history"
driver.maximize_window()
List = [
'N2413013700',
'N2178005886',
'N2317030656',
'N2317040560',
'N2468018963',
'N2443015634',
'N2821001667',
'N2541001920',
'N2775018175',
'N2400016517',
'N2730004527',
'N2730015194',
'N2945019777',
'N2945028727',
'N2508024198',
'N2251021724',
'N2603003181',
'N2433023122',
'N2775021933',
'N2419059151',
'N2203028278',
'N2628023780'
]
driver.get(url)
for i in List:
    driver.find_element(by=By.XPATH, value='//*[@id="mat-input-0"]').clear()
    driver.find_element(by=By.XPATH, value='//*[@id="mat-input-0"]').send_keys(i)
    time.sleep(3)
    driver.find_element(by=By.XPATH, value='//*[@id="billForm"]/mat-card/mat-card-content/div[2]/div[2]/div/mat-card-actions/button[1]').click()
    time.sleep(3)
    driver.find_element(by=By.XPATH, value='//*[@id="manageAccountTable"]/tbody/tr[1]/td[7]/a').click()
    time.sleep(5)
    
driver.close()