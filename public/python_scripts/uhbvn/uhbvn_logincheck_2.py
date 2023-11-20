import mysql.connector
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
query = "SELECT username, password FROM sensors WHERE provider_type = '8' ;"  # Modify the query as per your table structure and conditions

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
        "download.default_directory": "/var/www/html/public/python_scripts/download_bills",
        "download.prompt_for_download": False,
        "download.directory_upgrade": True,
        "plugins.always_open_pdf_externally": True
    })

    # Loop through the rows and process each record
for row in rows:
    username, password = row  # Unpack the values from the row

    driver = webdriver.Chrome(options=options)
    url = "https://www.uhbvn.org.in/web/portal/auth"
    driver.maximize_window()

    driver.get(url)
    driver.find_element(by=By.XPATH, value='//*[@id="accountNo"]').send_keys(username)
    driver.find_element(by=By.XPATH, value='//*[@id="password"]').send_keys(password)
    driver.find_element(by=By.XPATH, value='//*[@id="submit"]').click()

    wait = WebDriverWait(driver, 10)

    try:
        # Check if the element for successful login exists
        login_success_element = wait.until(EC.presence_of_element_located((By.XPATH, '//*[@id="subNavigation consumo45"]/ul/li[2]/a')))
        print("Login successful")

        # Update the login_status column in the SQL table to "Connected" for this username and password
        update_login_status_query = "UPDATE sensors SET login_status = '2' , current_status = '3' WHERE username = %s AND password = %s;"
        cursor.execute(update_login_status_query, (username, password))
        db.commit()

    except Exception as e:
        try:
            # Check if the element for incorrect login exists
            incorrect_login_element = driver.find_element(By.XPATH, '//*[@id="loginForm"]/div[1]/b')
            print("Incorrect Credentials")

            # Update the login_status column in the SQL table to "Incorrect Credentials" for this username and password
            update_login_status_query = "UPDATE sensors SET login_status = '1' WHERE username = %s AND password = %s;"
            cursor.execute(update_login_status_query, (username, password))
            db.commit()

        except:
            # print("You will be updated shortly")

            # Update the login_status column in the SQL table to "Awaited" for this username and password
            update_login_status_query = "UPDATE sensors SET login_status = '0' WHERE username = %s AND password = %s;"
            cursor.execute(update_login_status_query, (username, password))
            db.commit()

    finally:
        driver.quit()

else:
    print("No data found in the database.")

# Close the cursor and database connection
cursor.close()
db.close()
