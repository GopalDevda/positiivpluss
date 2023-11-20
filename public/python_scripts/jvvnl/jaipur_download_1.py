import mysql.connector
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from PIL import Image
from pytesseract import pytesseract
from selenium.webdriver.chrome.options import Options
import glob
import time
import os.path
import os
from selenium.webdriver.support.ui import Select
from selenium.webdriver import ActionChains
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
query = "SELECT username, password ,kn_no FROM sensors WHERE provider_type = '75' AND login_status = '2';"  # Modify the query as per your table structure and conditions

# Execute the query
cursor.execute(query)

# Fetch all rows from the result
rows = cursor.fetchall()
print(rows)
# Check if the query returned any rows with data
url='https://www.bijlimitra.com/custumerLoginPage'
if rows:
    options = webdriver.ChromeOptions()
    options.add_argument('--headless')
    options.add_argument('--no-sandbox')
    options.add_argument('--disable-dev-shm-usage')
    options.add_argument('--disable-gpu')

    options.add_experimental_option('prefs', {
        "download.default_directory": "/var/www/html/public/python_scripts/jvvnl/download",
        # # "download.default_directory": r"D:\Utopiic\AWS-ELECTRICITY\download",
        # "download.default_directory": r"D:\company\E_bill",
        "download.prompt_for_download": False,
        "download.directory_upgrade": True,
        "plugins.always_open_pdf_externally": True
    })
    
    # Loop through the rows and process each record
    for row in rows:
        Username, password,kn_no = row  # Unpack the values from the row

        driver = webdriver.Chrome(options=options)
        time.sleep(1)
        driver.get(url)
        time.sleep(1)
# driver.find_element(by=By.XPATH, value='//*[@id="urLoginName"]').send_keys (Account_no.value)
# driver.find_element(by=By.XPATH, value='//*[@id="password"]').send_keys (Password.value)
 

        count = 0

        while(True):
            try:
                count += 1
                driver.find_element(by=By.XPATH, value='//*[@id="refresh"]').click()
                element = driver.find_element(by=By.XPATH, value='//*[@id="mainCaptcha1"]')
                # element.screenshot('D:\\Dikshant_Electricity_data\\Electricity_Data\\JAIPURVVNL\\captcha1\\captcha1.png')
                # image = Image.open("D:\\Dikshant_Electricity_data\\Electricity_Data\\JAIPURVVNL\\captcha1\\captcha1.png")
                # element.screenshot(r'D:\company\E_bill\captcha1.png')
                # image = Image.open(r"D:\company\E_bill\captcha1.png")
                # path_to_tesseract = r'C:/Program Files/Tesseract-OCR/tesseract.exe'
                # path_to_image = 'D:\company\E_bill\captcha1.png'


                element.screenshot('/var/www/html/public/python_scripts/jvvnl/download/captcha1.png')
                image = Image.open("/var/www/html/public/python_scripts/jvvnl/download/captcha1.png")
                path_to_tesseract = '/usr/local/bin/tesseract'
                path_to_image = '/var/www/html/public/python_scripts/jvvnl/downloadcaptcha1.png'
                #Point tessaract_cmd to tessaract.exe
                pytesseract.tesseract_cmd = path_to_tesseract
                #Open image with PIL
                img = Image.open(path_to_image)
                #Extract text from image
                text = pytesseract.image_to_string(img)
                print(text)
                print('step 1')
                time.sleep(2)
                driver.find_element(by=By.XPATH, value='//*[@id="txtInput"]').clear()
                driver.find_element(by=By.XPATH, value='//*[@id="urLoginName"]').send_keys (Username)
                driver.find_element(by=By.XPATH, value='//*[@id="password"]').send_keys (password)
                driver.find_element(by=By.XPATH, value='//*[@id="txtInput"]').send_keys (text)
                time.sleep(1)
                driver.find_element(by=By.XPATH, value='//*[@id="checkout-form1"]/div[5]/button').click()
                print('step 2')
                break
            except :
                
                if count == 100:
                    break
                continue
        try:
            driver.find_element(by=By.XPATH, value='//*[@id="bot1-Msg1"]').click()
            # driver.find_element(by=By.XPATH, value='//*[@id="s2id_knumber1"]').click()
            print('step 3')
            driver.switch_to.window(driver.window_handles [0])
            driver.find_element(by=By.XPATH, value='//*[@id="s2id_knumber"]/a/span[2]').click()
            time.sleep(2)
            driver.find_element(by=By.XPATH, value='//*[@id="s2id_autogen1_search"]').send_keys (kn_no)
            action = ActionChains(driver)
            action.send_keys(Keys.TAB).perform()
            time.sleep(5)
            # Select(driver.find_element(by=By.XPATH, value='//*[@id="s2id_knumber"]/a/span[2]/b')).select_by_visible_text('210113042044')
            print('step 3')
            driver.find_element(by=By.XPATH, value='//*[@id="customer-view"]/fieldset/div[2]/table/tbody/tr[1]/td[3]/button').click()
            driver.switch_to.window(driver.window_handles [1])
            time.sleep(5)
            # driver.find_element(by=By.XPATH, value='//*[@id="proceed-button"]').click()
            # time.sleep(5)
            print('step 4')
            driver.switch_to.window(driver.window_handles [0])
            driver.close()
        except:
            print("not able to  download")


    print("The bills are downloaded for jaipur")



