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
import logging 
from logging import *
logging.basicConfig(filename='D:\\Dikshant_Electricity_data\\Electricity_Data\\MPpaschim\\MP_paschim_logfile.log ', filemode='w',level=INFO, format='%(asctime)s %(name)s %(message)s')
logger = getLogger('--MP_paschim--')
options = webdriver.ChromeOptions()
options.add_experimental_option('prefs', {
"download.default_directory": "D:\\Dikshant_Electricity_data\\Electricity_Data\\MPpaschim\\download_mp", #Change default directory for downloads
"download.prompt_for_download": False, #To auto download the file
"download.directory_upgrade": True,
"plugins.always_open_pdf_externally": True #It will not show PDF directly in chrome
})
driver = webdriver.Chrome(options=options)

url='https://mpwzservices.mpwin.co.in/mpeb_english/home'
driver.maximize_window()
driver.get(url)
time.sleep(3)
driver.find_element(by=By.XPATH, value='//*[@id="menutop"]/li[2]/a').click()


driver.switch_to.window(driver.window_handles [1])
list = [
'N3372044096',
'N3163003629',
'N3163002852',
'N3121009009',
'N3121016746',
'N3315004469',
'N3315008505',
'N3282001571',
'N3327005074',
'N3327005085',
'N3967024725',
'N3541010512',
'N3291021817',
'N3746017031',
'N3837011506',
'N3812023033',
'N3975007516',
'N3796008469',
'N3796012322',
'N3531037606',
'N3262023170',
'N3211005783',
'N3520013516',
'N3243011994',
'N3634020228',
'N3637004931',
'N3472039787',
'N3373012357',
'N3112010394',
'N3244007971',
'N3158007432',
'N3372026761',
'N3372027287',
'N3262031258',
'N3531033090',
'N3971022142',
'N3541023575',
'N3688015700',
'N3109000261',
'N3422007013',
'N3230014616',
'N3733015984',
'N3302010405',
'N3710014628',
'N3131025099',
'N3061023290',
'N3955037211',
'N3431018799'


]
for ivrs in list:
    # download_path = 'D:\\Utopiic\\downoad_bills\\Download\\'
    # filelist = glob.glob(os.path.join(download_path, "*"))
    # for f in filelist:
    #     os.remove(f)
    try:
        driver.find_element(by=By.XPATH, value='//*[@id="home"]/div[2]/div/form/div[2]/input').clear()
        time.sleep(2)
        driver.find_element(by=By.XPATH, value='//*[@id="home"]/div[2]/div/form/div[2]/input').send_keys(ivrs)
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="home"]/div[2]/div/form/div[3]/input').click()
        time.sleep(5)
        driver.execute_script('window.scrollBy(0, 1000)') 
        time.sleep(2)
        driver.find_element(by=By.XPATH, value='//*[@id="iframe"]/div[1]/div/div/div[2]/div[2]/form/div[2]/div/div[1]/button').click()
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="menutop"]/li[1]/a').click()
        time.sleep(5)
        # folder_path = 'D:\\Utopiic\\downoad_bills\\Download\\'
        # for F_path in Path(folder_path).glob("**/*.pdf"):
        #     print(F_path)

        # new_path = "D:\\Utopiic\\downoad_bills\\MP\\pdf\\"
        # shutil.move(F_path, new_path)
        logger.info("pdf saved successfully for account")
        logger.info(ivrs)
        logger.info("___________________________________________NEXT_______________________________________________________________________________________")

    except:
        logger.info("please check the following Acc_no")
        logger.info(ivrs)
        logger.info("___________________________________________NEXT_______________________________________________________________________________________")

        driver.close()
        driver = webdriver.Chrome(options=options)
        url='https://mpwzservices.mpwin.co.in/mpeb_english/home'
        driver.maximize_window()
        driver.get(url)
        time.sleep(3)
        driver.find_element(by=By.XPATH, value='//*[@id="menutop"]/li[2]/a').click()
        driver.switch_to.window(driver.window_handles [1])
