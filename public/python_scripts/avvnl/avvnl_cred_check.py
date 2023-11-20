import mysql.connector
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from PIL import Image
from pytesseract import pytesseract
from selenium.webdriver.chrome.options import Options
import glob
import time
import datetime
import os.path
import os

current_date = datetime.datetime.now()
current_month = current_date.month
print(type(current_month))
print (current_month)

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
query = f"SELECT username, password ,kn_no, login_month FROM sensors WHERE provider_type = '73' AND  login_month  !='{current_month}' ;"  # Modify the query as per your table structure and conditions

# Execute the query
cursor.execute(query)

# Fetch all rows from the result
rows = cursor.fetchall()
print(rows)
# Check if the query returned any rows with data
if rows:
    options = webdriver.ChromeOptions()
    options.add_argument('--headless')
    options.add_argument('--no-sandbox')
    options.add_argument('--disable-dev-shm-usage')
    options.add_argument('--disable-gpu')

    options.add_experimental_option('prefs', {
        "download.default_directory": "/var/www/html/public/python_scripts/avvnl/download/",
        # "download.default_directory": r"D:\Utopiic\AWS-ELECTRICITY\download",
        # "download.default_directory": r"D:\company\E_bill",
        "download.prompt_for_download": False,
        "download.directory_upgrade": True,
        "plugins.always_open_pdf_externally": True
    })

    # Loop through the rows and process each record
    for row in rows:
        Username, password,kn_no,login_month= row  # Unpack the values from the row

        driver = webdriver.Chrome(options=options)
        url = "http://wss.rajdiscoms.com/avvnl_web/"
        driver.maximize_window()

        driver.get(url)
        driver.find_element(by=By.XPATH, value='//*[@id="txtUserName"]').send_keys(Username)
        driver.find_element(by=By.XPATH, value='//*[@id="txtPassword"]').send_keys(password)
        #Add code for capcha
        element = driver.find_element(by=By.XPATH, value='//*[@id="Image1"]')
        element.screenshot('/var/www/html/public/python_scripts/avvnl/download/captcha.png')
        image = Image.open('/var/www/html/public/python_scripts/avvnl/download/captcha.png')

        # element.screenshot(r'D:\Utopiic\AWS-ELECTRICITY\download\captcha.png')
        # image = Image.open(r'D:\Utopiic\AWS-ELECTRICITY\download\captcha.png')

        # element.screenshot(r'D:\company\E_bill\captcha.png')
        # image = Image.open(r'D:\company\E_bill\captcha.png')

        print('captcha image downloaded')

        path_to_tesseract = '/usr/local/bin/tesseract'
        # path_to_tesseract = r'C:/Program Files/Tesseract-OCR/tesseract.exe'
        path_to_image = '/var/www/html/public/python_scripts/avvnl/download/captcha.png'
        # path_to_image =r'D:\Utopiic\AWS-ELECTRICITY\download\captcha.png'
        # path_to_image =r'D:\company\E_bill\captcha.png'
        # Point tessaract_cmd to tessaract.exe
        pytesseract.tesseract_cmd = path_to_tesseract
        #Open image with PIL
        img = Image.open(path_to_image)
        #Extract text from image
        text = pytesseract.image_to_string(img)
        print(text)
        time.sleep(2)
        driver.find_element(by=By.XPATH, value='//*[@id="txtSecurityCode"]').send_keys (text)
        driver.find_element(by=By.XPATH, value='//*[@id="btnLogin"]').click()

        wait = WebDriverWait(driver, 10)

        found=False
        try:
            # Check if the element for successful login exists
            # login_success_element = wait.until(EC.presence_of_element_located((By.XPATH, '//*[@id="DivMaster"]/table[2]/tbody/tr/td/table/tbody/tr[1]/td/fieldset/legend')))
            for i in range(0, 26):  # Iterate over the range of indices
                xpath = '//*[@id="cphWSS_grdAccounts_lnkKNO_{}"]'.format(i)
                element = wait.until(EC.presence_of_element_located((By.XPATH, xpath)))
                text = element.text  # Retrieve the text of the element
                # print("Text at index {}: {}".format(i, text))  # Print the text for verification or further processing
                print('login successfull',text)


                # print(text)
                if text == kn_no:
                    print("Login successful :" , kn_no , Username)
                    update_status_query = "UPDATE sensors SET login_status = '2' , current_status = '3' ,login_month = '{}'  WHERE Username = %s AND password = %s AND kn_no = %s;".format(current_month)
                    cursor.execute(update_status_query, (Username, password,kn_no))
                    db.commit()
                    found=True
                    break


            # Update the status column in the SQL table to "Connected" for this username and password
            # update_status_query = "UPDATE sensors SET login_status = '2' WHERE Username = %s AND password = %s;"
            # cursor.execute(update_status_query, (Username, password))
            # db.commit()

        except Exception as e:
            try:
                # Check if the element for incorrect login exists
                if found==False:
                    print(f"Kn_no {kn_no} not found")
                    update_status_query = "UPDATE sensors SET login_status = '1' , current_status = '2' WHERE Username = %s AND password = %s AND kn_no = %s;"
                    cursor.execute(update_status_query, (Username, password,kn_no))
                    db.commit()
                    continue
                else:
                    incorrect_login_element = driver.find_element(By.XPATH, '//*[@id="lblUserLogin"]')
                    print("Incorrect sensors :" + kn_no + Username)

                # # Update the status column in the SQL table to "Incorrect sensorss" for this username and password
                    update_status_query = "UPDATE sensors SET login_status = '1' WHERE Username = %s AND password = %s AND kn_no = %s;"
                    cursor.execute(update_status_query, (Username, password , kn_no))
                    db.commit()

            except:
                print("You will be updated shortly :" + kn_no + Username)

                # # Update the status column in the SQL table to "Awaited" for this username and password
                update_status_query = "UPDATE sensors SET login_status = '0' WHERE Username = %s AND password = %s AND kn_no = %s;"
                cursor.execute(update_status_query, (Username, password,kn_no))
                db.commit()

        finally:
            driver.quit()

else:
    print("No data found in the database.")

# Close the cursor and database connection
cursor.close()
db.close()


