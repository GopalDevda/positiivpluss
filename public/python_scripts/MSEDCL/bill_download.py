
## maharastra ##
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
import base64

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
query = "SELECT consumer_no FROM sensors WHERE provider_type = '16' and login_status ='2' ;"  # Modify the query as per your table structure and conditions

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
    options.add_argument("window-size=1920,1080")
    options.add_argument("--start-maximized")

    options.add_experimental_option('prefs', {
        "download.default_directory": "/var/www/html/public/python_scripts/MSEDCL/download",
        # "download.default_directory": r"D:\Utopiic\AWS-ELECTRICITY\download",
        # "download.default_directory": r"D:\company\E_bill",
        "download.prompt_for_download": False,
        "download.directory_upgrade": True,
        "plugins.always_open_pdf_externally": True
    })
    settings = {
       "recentDestinations": [{
            "id": "Save as PDF",
            "origin": "local",
            "account": "",
        }],
        "selectedDestinationId": "Save as PDF",
        "version": 2
    }
    prefs = {'printing.print_preview_sticky_settings.appState': json.dumps(settings), 'savefile.default_directory': r'D:\company\E_bill'}
    options.add_experimental_option('prefs', prefs)
    options.add_argument('--kiosk-printing')
    # Loop through the rows and process each record
    for row in rows:
        driver = webdriver.Chrome(options=options)
        consumer_no=row
        url='https://wss.mahadiscom.in/wss/wss?uiActionName=getViewPayBill'
        driver.get(url)
        # driver.find_element(by=By.XPATH, value='//*[@id="consumerNo"]').send_keys (row)
        count = 0
        
        while(True):
            count += 1
            try:
                # count += 1
                driver.find_element(by=By.XPATH, value='//*[@id="consumerNo"]').send_keys (consumer_no)
                time.sleep(2)

                element = driver.find_element(by=By.XPATH, value='//*[@id="captcha"]')

                # element.screenshot(r'D:\company\E_bill\captcha.png')
                # image = Image.open(r"D:\company\E_bill\captcha.png")
                # path_to_tesseract = r'C:/Program Files/Tesseract-OCR/tesseract.exe'
                # path_to_image = 'D:\company\E_bill\captcha.png'

                #                             ####Dikshant PC #####
                # element.screenshot(r'D:\Utopiic\AWS-ELECTRICITY\download\cap.png')
                # image = Image.open(r'D:\Utopiic\AWS-ELECTRICITY\download\cap.png')
                # path_to_tesseract = r'C:/Program Files/Tesseract-OCR/tesseract.exe'
                # path_to_image = r'D:\Utopiic\AWS-ELECTRICITY\download\cap.png'
                                                            #####AWS SERVER#####
                element.screenshot('/var/www/html/public/python_scripts/MSEDCL/download/cap.png')
                image = Image.open("/var/www/html/public/python_scripts/MSEDCL/download/cap.png")
                path_to_tesseract = '/usr/local/bin/tesseract'
                path_to_image ="/var/www/html/public/python_scripts/MSEDCL/download/cap.png"
                
                #Point tessaract_cmd to tessaract.exe
                pytesseract.tesseract_cmd = path_to_tesseract
                #Open image with PIL
                img = Image.open(path_to_image)
                #Extract text from image
                text = pytesseract.image_to_string(img)
                print(text)
                
                driver.find_element(by=By.XPATH, value='//*[@id="txtInput"]').send_keys(text)
                time.sleep(3)
                driver.find_element(by=By.XPATH, value='//*[@id="submitButton"]').click()
                a = driver.find_element(by=By.XPATH, value='//*[@id="billingTable"]/tbody')
                break
                 ## Bill table, check if it exists
                # driver.find_element(by=By.XPATH, value='//*[@id="ddlLanguage"]').select_by_visible_text('Banana')
            except :
                print("Wrong Captcha")
                driver.find_element(by=By.XPATH, value='//*[@id="btnCaptchaRefViewpaybill"]/img').click()   #captcha refresh 
                continue
                # break
            
       
        driver.find_element(by=By.XPATH, value='//*[@id="Img1"]').click()                                              ##bill click                 
        time.sleep(3)
        try:
            driver.find_element(by=By.XPATH, value='//*[@id="HTEnergyBillForm"]/table[1]/tbody/tr/td/a').click()     ##bill view
            driver.switch_to.window(driver.window_handles [1])
            driver.find_element(by=By.XPATH, value='/html/body/div/div/div/button').click()  ###bill download

            pdf_data = driver.execute_cdp_cmd("Page.printToPDF", settings)
            with open(f'/var/www/html/public/python_scripts/MSEDCL/download/{consumer_no[0]}.pdf', 'wb') as file:
                file.write(base64.b64decode(pdf_data['data']))
            driver.switch_to.window(driver.window_handles [0])
            print(1)
            
        except:
            wait = WebDriverWait(driver, 20)  # Wait for up to 10 seconds

            # Wait for the element with the given XPath to become clickable
            element = wait.until(EC.element_to_be_clickable((By.XPATH, '//*[@id="ddlLanguage"]')))

            # Once the element is clickable, create a Select object and select 'English'
            select = Select(element)
            select.select_by_visible_text('English')

            time.sleep(2)
            driver.find_element(by=By.XPATH, value='//*[@id="lbllTitle"]').click()     ##bill view
            driver.switch_to.window(driver.window_handles [1])
            time.sleep(3)

            pdf_data = driver.execute_cdp_cmd("Page.printToPDF", settings)
            with open(f'/var/www/html/public/python_scripts/MSEDCL/download/{consumer_no[0]}.pdf', 'wb') as file:
                file.write(base64.b64decode(pdf_data['data']))
            driver.switch_to.window(driver.window_handles [0])

            # except:
            #     print('problem with',consumer_no)


            # driver.find_element(by=By.XPATH, value='//*[@id="leftnav_viewPayBill"]').click()
            # time.sleep(5)
            # original_filename = r"D:\company\E_bill\LT E-Bill.pdf"
        # while not os.path.exists(original_filename):
        #     time.sleep(1)

        # new_filename =  r"D:\company\E_bill\{}.pdf".format(int(consumer_no[0]))
        # if not os.path.exists(new_filename):
        #     # Rename the downloaded PDF file
        #     print(consumer_no)
        #     os.rename(original_filename, new_filename)
        # else:
        #     print("File with new filename already exists. Skipping renaming.")
        driver.close()
    db.close()
        
    

