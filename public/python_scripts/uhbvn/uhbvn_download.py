import mysql.connector
import time
import os as os
import os.path
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.chrome.options import Options

# Connect to the MySQL database
db = mysql.connector.connect(
    host ="localhost" ,
    user = "root",
    password = "PositiivPlus@01",
    database = "positiiv_db"
)

# Create a cursor to interact with the database
cursor = db.cursor()

# Query to fetch Acc_no and password from the database table
query = "SELECT username, password FROM sensors WHERE provider_type = '8' AND login_status = '2';"  # Modify the query as per your table structure and conditions

# Execute the query
cursor.execute(query)

# Fetch all rows from the result
rows = cursor.fetchall()
print(rows)
# Check if the query returned any rows with data
chromedriver_path = "/usr/local/bin/chromedriver"

if rows:
    options = webdriver.ChromeOptions()
    options.add_argument('--headless')
    options.add_argument('--no-sandbox')
    options.add_argument('--disable-dev-shm-usage')
    options.add_argument('--disable-gpu')

    options.add_experimental_option('prefs', {
        "download.default_directory": "/var/www/html/public/python_scripts/uhbvn/bill_download",
        "download.prompt_for_download": False,
        "download.directory_upgrade": True,
        "plugins.always_open_pdf_externally": True
    })

    # Loop through the rows and process each record
    for row in rows:
        username, password = row  # Unpack the values from the row
        # url ="https://www.uhbvn.org.in/web/portal/view-bill"
        # driver = webdriver.Chrome(options=options)
        # driver.get('https://www.google.com/')
        try:
            driver = webdriver.Chrome(options=options)
            driver.get('https://www.uhbvn.org.in/web/portal/view-bill')
            driver.find_element(by=By.XPATH, value='//*[@id="accountNo"]').send_keys (username)
            driver.find_element(by=By.XPATH, value='//*[@id="password"]').send_keys (password)
            driver.find_element(by=By.XPATH, value='//*[@id="submit"]').click()
            time.sleep(3)
            # driver.find_element(by=By.XPATH, value='//*[@id="subNavigation consumo45"]/ul/li[3]').click()
            # time.sleep(3)
            print("step 1")
            driver.find_element(by=By.XPATH, value='//*[@id="viewBillForm"]/table[2]/tbody/tr[2]/td[5]/a').click()
            time.sleep(8)
            print("step 2")

            original_filename = "/var/www/html/public/python_scripts/uhbvn/bill_download/view-bill.pdf"
            while not os.path.exists(original_filename):
                time.sleep(1)

            # current_datetime = datetime.datetime.now().strftime("%Y-%m-%d_%H-%M-%S")
            print("step 3")
            # Rename the downloaded PDF file
            new_filename = '/var/www/html/public/python_scripts/uhbvn/bill_download/{}.pdf'.format(username)
            os.rename(original_filename, new_filename)
            print("step 4")
            driver.quit()
            print("Download process completed:", username)

        

        except:
            print('error  :')
            print(username)

    print("work done ")
