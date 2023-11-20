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
import json
download_dir = r"D:\Dikshant_Electricity_data\Electricity_Data\MSCDEL_maharastra\download_msdcl_lt"
# options = webdriver.ChromeOptions()
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

url='https://wss.mahadiscom.in/wss/wss?uiActionName=getViewPayBill'
Acc_no = '174221745351'
driver = webdriver.Chrome(options=Options)
driver.get(url)
driver.refresh()
time.sleep(5)
driver.find_element(by=By.XPATH, value='//*[@id="consumerNo"]').send_keys (Acc_no)
time.sleep(2)
            # download_path = 'D:\\Dikshant_Electricity_data\\Utopiic\\downoad_bills\\Download\\'
            # filelist = glob.glob(os.path.join(download_path, "*"))
            # for f in filelist:
            #     os.remove(f)
try:
    element = driver.find_element(by=By.XPATH, value='//*[@id="captcha"]')
    element.screenshot('D:\\Dikshant_Electricity_data\\Electricity_Data\\MSCDEL_maharastra\\captcha\\cap.png')
    image = Image.open("D:\\Dikshant_Electricity_data\\Electricity_Data\\MSCDEL_maharastra\\captcha\\cap.png")
    path_to_tesseract = r'C:/Program Files/Tesseract-OCR/tesseract.exe'
    path_to_image = 'D:\\Dikshant_Electricity_data\\Electricity_Data\MSCDEL_maharastra\\captcha\\cap.png'
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
        
driver.find_element(by=By.XPATH, value='//*[@id="Img1"]').click()

