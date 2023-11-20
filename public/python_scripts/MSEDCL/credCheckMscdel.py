import mysql.connector
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support.ui import Select
from selenium.webdriver.support import expected_conditions as EC
from PIL import Image
from pytesseract import pytesseract
import time
import json
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
query = "SELECT consumer_no FROM sensors WHERE provider_type = '16'  ;"  # Modify the query as per your table structure and conditions

# Execute the query
cursor.execute(query)

# Fetch all rows from the result
rows = cursor.fetchall()
print(rows)
url='https://wss.mahadiscom.in/wss/wss?uiActionName=getViewPayBill'
if rows:
    options = webdriver.ChromeOptions()
    options.add_argument('--headless')
    options.add_argument('--no-sandbox')
    options.add_argument('--disable-dev-shm-usage')
    options.add_argument('--disable-gpu')

    options.add_experimental_option('prefs', {
        "download.default_directory": "/var/www/html/public/python_scripts/MSEDCL/download/",
        # "download.default_directory": r"D:\Utopiic\AWS-ELECTRICITY\download",
        # "download.default_directory": r"D:\company\E_bill",
        "download.prompt_for_download": False,
        "download.directory_upgrade": True,
        "plugins.always_open_pdf_externally": True
    })
    
    driver = webdriver.Chrome(options=options)
for i in rows:
    driver.get(url)
    driver.refresh()
    time.sleep(5)
    driver.find_element(by=By.XPATH, value='//*[@id="consumerNo"]').send_keys (i)
    count = 0

    # download_path = 'D:\Dikshant_Electricity_data\\Utopiic\\downoad_bills\\Download\\'
    # filelist = glob.glob(os.path.join(download_path, "*"))
    # for f in filelist:
    #     os.remove(f)

    while(True):
        count += 1
        try:
            # count += 1
            driver.find_element(by=By.XPATH, value='//*[@id="consumerNo"]').send_keys (i)
            time.sleep(2)
            # download_path = 'D:\\Dikshant_Electricity_data\\Utopiic\\downoad_bills\\Download\\'
            # filelist = glob.glob(os.path.join(download_path, "*"))
            # for f in filelist:
            #     os.remove(f)

            element = driver.find_element(by=By.XPATH, value='//*[@id="captcha"]')
                                        ####Dikshant PC #####
            # element.screenshot(r'D:\Utopiic\AWS-ELECTRICITY\download\cap.png')
            # image = Image.open(r'D:\Utopiic\AWS-ELECTRICITY\download\cap.png')
            # path_to_tesseract = r'C:/Program Files/Tesseract-OCR/tesseract.exe'
            # path_to_image = r'D:\Utopiic\AWS-ELECTRICITY\download\cap.png'
                        #### ANURAG PC  #####
            # element.screenshot(r'D:\company\E_bill\captcha.png')
            # image = Image.open(r"D:\company\E_bill\captcha.png")
            # path_to_tesseract = r'C:/Program Files/Tesseract-OCR/tesseract.exe'
            # path_to_image = 'D:\company\E_bill\captcha.png'
            #Point tessaract_cmd to tessaract.exe
                                                        #####AWS SERVER#####
            element.screenshot('/var/www/html/public/python_scripts/MSEDCL/download/cap.png')
            image = Image.open("/var/www/html/public/python_scripts/MSEDCL/download/cap.png")
            path_to_tesseract = '/usr/local/bin/tesseract'
            path_to_image ="/var/www/html/public/python_scripts/MSEDCL/download/cap.png"
            pytesseract.tesseract_cmd = path_to_tesseract
            #Open image with PIL
            img = Image.open(path_to_image)
            #Extract text from image
            text = pytesseract.image_to_string(img)
            print(text)
            driver.find_element(by=By.XPATH, value='//*[@id="txtInput"]').send_keys(text)
            driver.find_element(by=By.XPATH, value='//*[@id="submitButton"]').click()
            # a = driver.find_element(by=By.XPATH, value='//*[@id="billingTable"]/tbody')
            break
        except :
            print("Wrong Captcha")
            driver.find_element(by=By.XPATH, value='//*[@id="btnCaptchaRefViewpaybill"]/img').click()   #captcha refresh 
            continue
                # break
    try:
        driver.find_element(by=By.XPATH, value='//*[@id="Img1"]').click()                             ##bill click                 
        time.sleep(3)
        print('login successful',i)
        # # Update the status column in the SQL table to "Incorrect sensorss" for this username and password
        update_status_query = "UPDATE sensors SET login_status = '2' WHERE consumer_no = %s;"
        cursor.execute(update_status_query, (i))
        db.commit()
    except:
        print("Else wrong credential",i)
        # # Update the status column in the SQL table to "Incorrect sensorss" for this username and password
        update_status_query = "UPDATE sensors SET login_status = '1' WHERE consumer_no = %s;"
        cursor.execute(update_status_query, (i))
        db.commit()
# driver.switch_to.window(driver.window_handles [1])
# driver.close()
        
