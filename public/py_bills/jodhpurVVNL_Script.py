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
options = webdriver.ChromeOptions()
options.add_experimental_option('prefs', {
"download.default_directory": "D:\\Dikshant_Electricity_data\\Electricity_Data\\JODHPURVVNL\\download", #Change default directory for downloads
"download.prompt_for_download": False, #To auto download the file
"download.directory_upgrade": True,
"plugins.always_open_pdf_externally": True #It will not show PDF directly in chrome
})
driver = webdriver.Chrome(options=options)
driver.maximize_window()

login_path = r"D:\Dikshant_Electricity_data\Electricity_Data\JODHPURVVNL\Jodhpur_login.xlsx"
df = pd.read_excel(login_path)
for row in df.iterrows():
    url='http://wss.rajdiscoms.com/jdvvnl_web/'
    try:   
        Account_no = row[1][0]
        Password = row[1][1]
        driver.get(url)
        driver.find_element(by=By.XPATH, value='//*[@id="txtUserName"]').send_keys (Account_no)  
        driver.find_element(by=By.XPATH, value='//*[@id="txtPassword"]').send_keys (Password)
    except:
        print("check user credencials")
    count = 0
    while(True):
        try:
            driver.switch_to.window(driver.window_handles [0])
            # count += 1
            # driver.refresh()
            element = driver.find_element(by=By.XPATH, value='//*[@id="Image1"]')
            element.screenshot('D:\\Dikshant_Electricity_data\\Electricity_Data\\JODHPURVVNL\\captcha\\captcha.png')
            image = Image.open("D:\\Dikshant_Electricity_data\\Electricity_Data\\JODHPURVVNL\\captcha\\captcha.png")
            path_to_tesseract = r'C:/Program Files/Tesseract-OCR/tesseract.exe'
            path_to_image = 'D:\\Dikshant_Electricity_data\\Electricity_Data\\JODHPURVVNL\\captcha\\captcha.png'
            #Point tessaract_cmd to tessaract.exe
            pytesseract.tesseract_cmd = path_to_tesseract
            #Open image with PIL
            img = Image.open(path_to_image)
            #Extract text from image
            text = pytesseract.image_to_string(img)
            print(text)
            time.sleep(5)
            driver.find_element(by=By.XPATH, value='//*[@id="txtSecurityCode"]').send_keys (text)
            driver.find_element(by=By.XPATH, value='//*[@id="btnLogin"]').click()

            break
        except Exception as e:
            print(e)
            if count == 3:
                break
            continue
    try:
        driver.switch_to.window(driver.window_handles [0])
        driver.find_element(by=By.XPATH, value='//*[@id="cphWSS_grdAccounts_lnkKNO_0"]').click()
        time.sleep(5)
        
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn4"]').click()
        time.sleep(5)
        if len(driver.window_handles) > 1:
            driver.switch_to.window(driver.window_handles[1])
            driver.close()
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()

        else:
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
    except:
        print("check kno")

    try:
        driver.switch_to.window(driver.window_handles [0])
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="cphWSS_grdAccounts_lnkKNO_1"]').click()
        time.sleep(5)
        
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn4"]').click()
        time.sleep(5)
        if len(driver.window_handles) > 1:
            driver.switch_to.window(driver.window_handles[1])
    
            driver.close()
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
        else:
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
    except:
        
        print("check")
    try:
        driver.switch_to.window(driver.window_handles [0])
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="cphWSS_grdAccounts_lnkKNO_2"]').click()
        time.sleep(5)
        
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn4"]').click()
        time.sleep(5)
        if len(driver.window_handles) > 1:
            driver.switch_to.window(driver.window_handles[1])
    
            driver.close()
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
        else:
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
    except:
        
        print("check")

    try:
        driver.switch_to.window(driver.window_handles [0])
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="cphWSS_grdAccounts_lnkKNO_3"]').click()
        time.sleep(5)
        
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn4"]').click()
        time.sleep(5)
        if len(driver.window_handles) > 1:
            driver.switch_to.window(driver.window_handles[1])
        
            driver.close()
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
        else:
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
    except:
        
        print("check")

    try:
        driver.switch_to.window(driver.window_handles [0])
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="cphWSS_grdAccounts_lnkKNO_4"]').click()
        time.sleep(5)
        
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn4"]').click()
        time.sleep(5)
        if len(driver.window_handles) > 1:
            driver.switch_to.window(driver.window_handles[1])
        
            driver.close()
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
        else:
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
    except:
        
        print("check")



    try:
        driver.switch_to.window(driver.window_handles [0])
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="cphWSS_grdAccounts_lnkKNO_5"]').click()
        time.sleep(5)
        
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn4"]').click()
        time.sleep(5)
        if len(driver.window_handles) > 1:
            driver.switch_to.window(driver.window_handles[1])
        
            driver.close()
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
        else:
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
    except:
        
        print("check")


    try:
        driver.switch_to.window(driver.window_handles [0])
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="cphWSS_grdAccounts_lnkKNO_6"]').click()
        time.sleep(5)
        
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn4"]').click()
        time.sleep(5)
        if len(driver.window_handles) > 1:
            driver.switch_to.window(driver.window_handles[1])
        
            driver.close()
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
        else:
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
    except:
        
        print("check")


    try:
        driver.switch_to.window(driver.window_handles [0])
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="cphWSS_grdAccounts_lnkKNO_7"]').click()
        time.sleep(5)
        
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn4"]').click()
        time.sleep(5)
        if len(driver.window_handles) > 1:
            driver.switch_to.window(driver.window_handles[1])
        
            driver.close()
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
        else:
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
    except:
        
        print("check")


    try:
        driver.switch_to.window(driver.window_handles [0])
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="cphWSS_grdAccounts_lnkKNO_8"]').click()
        time.sleep(5)
        
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn4"]').click()
        time.sleep(5)
        if len(driver.window_handles) > 1:
            driver.switch_to.window(driver.window_handles[1])
        
            driver.close()
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
        else:
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
    except:
        
        print("check")


    try:
        driver.switch_to.window(driver.window_handles [0])
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="cphWSS_grdAccounts_lnkKNO_9"]').click()
        time.sleep(5)
        
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn4"]').click()
        time.sleep(5)
        if len(driver.window_handles) > 1:
            driver.switch_to.window(driver.window_handles[1])
        
            driver.close()
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
        else:
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
    except:
        
        print("check")


    try:
        driver.switch_to.window(driver.window_handles [0])
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="cphWSS_grdAccounts_lnkKNO_10"]').click()
        time.sleep(5)
        
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn4"]').click()
        time.sleep(5)
        if len(driver.window_handles) > 1:
            driver.switch_to.window(driver.window_handles[1])
        
            driver.close()
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
        else:
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
    except:
        
        print("check")


    try:
        driver.switch_to.window(driver.window_handles [0])
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="cphWSS_grdAccounts_lnkKNO_11"]').click()
        time.sleep(5)
        
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn4"]').click()
        time.sleep(5)
        if len(driver.window_handles) > 1:
            driver.switch_to.window(driver.window_handles[1])
        
            driver.close()
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
        else:
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
    except:
        
        print("check")


    try:
        driver.switch_to.window(driver.window_handles [0])
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="cphWSS_grdAccounts_lnkKNO_12"]').click()
        time.sleep(5)
        
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn4"]').click()
        time.sleep(5)
        if len(driver.window_handles) > 1:
            driver.switch_to.window(driver.window_handles[1])
        
            driver.close()
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
        else:
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
    except:
        
        print("check")


    try:
        driver.switch_to.window(driver.window_handles [0])
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="cphWSS_grdAccounts_lnkKNO_13"]').click()
        time.sleep(5)
        
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn4"]').click()
        time.sleep(5)
        if len(driver.window_handles) > 1:
            driver.switch_to.window(driver.window_handles[1])
        
            driver.close()
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
        else:
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
    except:
        
        print("check")


    try:
        driver.switch_to.window(driver.window_handles [0])
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="cphWSS_grdAccounts_lnkKNO_14"]').click()
        time.sleep(5)
        
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn4"]').click()
        time.sleep(5)
        if len(driver.window_handles) > 1:
            driver.switch_to.window(driver.window_handles[1])
        
            driver.close()
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
        else:
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
    except:
        
        print("check")


    try:
        driver.switch_to.window(driver.window_handles [0])
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="cphWSS_grdAccounts_lnkKNO_15"]').click()
        time.sleep(5)
        
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn4"]').click()
        time.sleep(5)
        if len(driver.window_handles) > 1:
            driver.switch_to.window(driver.window_handles[1])
        
            driver.close()
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
        else:
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
    except:
        
        print("check")


    try:
        driver.switch_to.window(driver.window_handles [0])
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="cphWSS_grdAccounts_lnkKNO_16"]').click()
        time.sleep(5)
        
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn4"]').click()
        time.sleep(5)
        if len(driver.window_handles) > 1:
            driver.switch_to.window(driver.window_handles[1])
        
            driver.close()
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
        else:
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
    except:
        
        print("check")


    try:
        driver.switch_to.window(driver.window_handles [0])
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="cphWSS_grdAccounts_lnkKNO_17"]').click()
        time.sleep(5)
        
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn4"]').click()
        time.sleep(5)
        if len(driver.window_handles) > 1:
            driver.switch_to.window(driver.window_handles[1])
        
            driver.close()
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
        else:
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
    except:
        
        print("check")


    try:
        driver.switch_to.window(driver.window_handles [0])
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="cphWSS_grdAccounts_lnkKNO_18"]').click()
        time.sleep(5)
        
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn4"]').click()
        time.sleep(5)
        if len(driver.window_handles) > 1:
            driver.switch_to.window(driver.window_handles[1])
        
            driver.close()
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
        else:
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
    except:
        
        print("check")


    try:
        driver.switch_to.window(driver.window_handles [0])
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="cphWSS_grdAccounts_lnkKNO_19"]').click()
        time.sleep(5)
        
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn4"]').click()
        time.sleep(5)
        if len(driver.window_handles) > 1:
            driver.switch_to.window(driver.window_handles[1])
        
            driver.close()
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
        else:
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
    except:
        
        print("check")


    try:
        driver.switch_to.window(driver.window_handles [0])
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="cphWSS_grdAccounts_lnkKNO_20"]').click()
        time.sleep(5)
        
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn4"]').click()
        time.sleep(5)
        if len(driver.window_handles) > 1:
            driver.switch_to.window(driver.window_handles[1])
        
            driver.close()
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
        else:
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
    except:
        
        print("check")


    try:
        driver.switch_to.window(driver.window_handles [0])
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="cphWSS_grdAccounts_lnkKNO_21"]').click()
        time.sleep(5)
        
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn4"]').click()
        time.sleep(5)
        if len(driver.window_handles) > 1:
            driver.switch_to.window(driver.window_handles[1])
        
            driver.close()
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
        else:
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
    except:
        
        print("check")


    try:
        driver.switch_to.window(driver.window_handles [0])
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="cphWSS_grdAccounts_lnkKNO_22"]').click()
        time.sleep(5)
        
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn4"]').click()
        time.sleep(5)
        if len(driver.window_handles) > 1:
            driver.switch_to.window(driver.window_handles[1])
        
            driver.close()
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
        else:
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
    except:
        
        print("check")


    try:
        driver.switch_to.window(driver.window_handles [0])
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="cphWSS_grdAccounts_lnkKNO_23"]').click()
        time.sleep(5)
        
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn4"]').click()
        time.sleep(5)
        if len(driver.window_handles) > 1:
            driver.switch_to.window(driver.window_handles[1])
        
            driver.close()
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
        else:
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
    except:
        
        print("check")

    try:
        driver.switch_to.window(driver.window_handles [0])
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="cphWSS_grdAccounts_lnkKNO_24"]').click()
        time.sleep(5)
        
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn4"]').click()
        time.sleep(5)
        if len(driver.window_handles) > 1:
            driver.switch_to.window(driver.window_handles[1])
        
            driver.close()
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
        else:
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
    except:
        
        print("check")

    try:
        driver.switch_to.window(driver.window_handles [0])
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="cphWSS_grdAccounts_lnkKNO_25"]').click()
        time.sleep(5)
        
        time.sleep(5)
        driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn4"]').click()
        time.sleep(5)
        if len(driver.window_handles) > 1:
            driver.switch_to.window(driver.window_handles[1])
        
            driver.close()
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
        else:
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="MenuActivitiesn27"]').click()
    except:
        
        print("check")
   
print("jodhpur work is done successfully")
