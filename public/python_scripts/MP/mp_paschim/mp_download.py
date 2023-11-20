

import mysql.connector
import time
import os as os
import os.path
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.chrome.options import Options

db = mysql.connector.connect(
    host ="13.233.1.73" ,
    user = "remote",
    password = "PositiivPlus@01",
    database = "positiiv_db"
)

# Create a cursor to interact with the database
cursor = db.cursor()

# Query to fetch Acc_no and password from the database table
query = "SELECT account_no FROM sensors WHERE provider_type = '58' AND login_status = '2';"  # Modify the query as per your table structure and conditions

# Execute the query
cursor.execute(query)

# Fetch all rows from the result
accounts = cursor.fetchall()
print(accounts)
# Check if the query returned any rows with data
# chromedriver_path = "/usr/local/bin/chromedriver"

if accounts:
    options = webdriver.ChromeOptions()
    options.add_argument('--headless')
    options.add_argument('--no-sandbox')
    options.add_argument('--disable-dev-shm-usage')
    options.add_argument('--disable-gpu')

    options.add_experimental_option('prefs', {
    "download.default_directory": "/var/www/html/public/python_scripts/MP/mp_paschim/download/", #Change default directory for downloads
    # "download.default_directory": r"D:\Utopiic\AWS-ELECTRICITY\download",
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

    for account in accounts:
        try:
            driver.find_element(by=By.XPATH, value='//*[@id="home"]/div[2]/div/form/div[2]/input').clear()
            time.sleep(2)
            driver.find_element(by=By.XPATH, value='//*[@id="home"]/div[2]/div/form/div[2]/input').send_keys(account)
            time.sleep(5)
            driver.find_element(by=By.XPATH, value='//*[@id="home"]/div[2]/div/form/div[3]/input').click()
            time.sleep(5)
            driver.execute_script('window.scrollBy(0, 1000)')
            time.sleep(2)
            print (account) 
            print("is downloading")
            driver.find_element(by=By.XPATH, value='//*[@id="iframe"]/div[1]/div/div/div[2]/div[2]/form/div[2]/div/div[1]/button').click()
            time.sleep(5)
            driver.find_element(by=By.XPATH, value='//*[@id="menutop"]/li[1]/a').click()
            time.sleep(5)
            

            print('bill downloaded :' ,account)

        except:

            driver.close()
            driver = webdriver.Chrome(options=options)
            url='https://mpwzservices.mpwin.co.in/mpeb_english/home'
            driver.maximize_window()
            driver.get(url)
            time.sleep(3)
            driver.find_element(by=By.XPATH, value='//*[@id="menutop"]/li[2]/a').click()
            driver.switch_to.window(driver.window_handles [1])



