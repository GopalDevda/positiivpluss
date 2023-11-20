import mysql.connector
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.chrome.options import Options

# Connect to the MySQL database
db = mysql.connector.connect(
    host =" 16.171.196.142",
    user = "sites",
    password = "Utopiic_0055",
    database = "credentials"
)

# Create a cursor to interact with the database
cursor = db.cursor()

# Query to fetch Acc_no and password from the database table
query = "SELECT Username, password FROM credential WHERE Electricity_Board = 'MPPKVVCL' AND Status = 'Awaited';"  # Modify the query as per your table structure and conditions

# Execute the query
cursor.execute(query)

# Fetch all rows from the result
rows = cursor.fetchall()

# Check if the query returned any rows with data
if rows:
    options = webdriver.ChromeOptions()
    options.add_argument('--headless')
    options.add_argument('--no-sandbox')
    options.add_argument('--disable-dev-shm-usage')
    options.add_argument('--disable-gpu')

    options.add_experimental_option('prefs', {
        "download.default_directory": "s3://arn:aws:s3:eu-north-1:596264531156:accesspoint/electricity",
        "download.prompt_for_download": False,
        "download.directory_upgrade": True,
        "plugins.always_open_pdf_externally": True
    })

    # Loop through the rows and process each record
for row in rows:
    Username, password = row  # Unpack the values from the row

    driver = webdriver.Chrome(options=options)
    url = "https://mpwzservices.mpwin.co.in/westdiscom/home"
    driver.maximize_window()

    driver.get(url)
    driver.find_element(by=By.XPATH, value='//*[@id="home"]/div[2]/div/form/div[2]/input').send_keys(Username)
    
    driver.find_element(by=By.XPATH, value='//*[@id="home"]/div[2]/div/form/div[3]/input').click()

    wait = WebDriverWait(driver, 10)

    try:
        # Check if the element for successful login exists
        login_success_element = wait.until(EC.presence_of_element_located((By.XPATH, '//*[@id="iframe"]/div[1]/div/div/div[2]/div[2]/h4')))
        print("Login successful")

        # Update the status column in the SQL table to "Connected" for this username and password
        update_status_query = "UPDATE credential SET Status = 'Connected' WHERE Username = %s AND password = %s;"
        cursor.execute(update_status_query, (Username, password))
        db.commit()

    except Exception as e:
        try:
            # Check if the element for incorrect login exists
            incorrect_login_element = driver.find_element(By.XPATH, '//*[@id="home"]/div[2]/div/form/div[2]/div/div[1]') 
            print("Incorrect Credentials")

            # Update the status column in the SQL table to "Incorrect Credentials" for this username and password
            update_status_query = "UPDATE credential SET Status = 'Incorrect Credencials' WHERE Username = %s AND password = %s;"
            cursor.execute(update_status_query, (Username, password))
            db.commit()

        except:
            print("You will be updated shortly")

            # Update the status column in the SQL table to "Awaited" for this username and password
            update_status_query = "UPDATE credential SET Status = 'Awaited' WHERE Username = %s AND password = %s;"
            cursor.execute(update_status_query, (Username, password))
            db.commit()

    finally:
        driver.quit()

else:
    print("No data found in the database.")

# Close the cursor and database connection
cursor.close()
db.close()  