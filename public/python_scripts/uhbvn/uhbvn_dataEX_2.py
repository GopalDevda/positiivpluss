import pandas as pd
import openpyxl
import pdfquery
import glob
import os.path
from pathlib import Path
import shutil
import json
import datetime
import re
import mysql.connector
import time
import os as os
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.chrome.options import Options

folder_path ='/var/www/html/public/python_scripts/uhbvn/bill_download/'
for F_path in Path(folder_path).glob("*.pdf"):
    # print(F_path)
    pdf = pdfquery.PDFQuery(F_path)
    pdf.load()
    Ac_no= pdf.pq('LTTextLineHorizontal:overlaps_bbox("290.8, 720.091, 307.165, 760.591")').text()
        # Extract numbers using regular expressions
    # print(Ac_no)
    Acc_no1 = re.findall(r'Account\s*No:\s+(\d+)', Ac_no)
    # print(Acc_no1)
    # Join the extracted numbers into a single string
    Acc_no2= ''.join(Acc_no1)
    print("account no : " + Acc_no2)

    #### Extracting Bill month
    Bil_month        = pdf.pq('LTTextLineHorizontal:overlaps_bbox("122.4, 670.218, 198.658, 700.218")').text()
    pattern = r"Bill Month:\s*([A-Z]+/\d{4})"
    Bil_month1= re.findall(pattern, Bil_month)
    Bil_month2=''.join(Bil_month1)
    Bil_month3 = Bil_month2.replace('/', '_')
    print("Bill month : "+Bil_month3)
    # Input string
    input_string = Bil_month3

    # Split the string using '_' as the separator
    parts = input_string.split('_')

    # Extract month and year
    month = parts[0].capitalize()  # Capitalize the first letter for consistency
    year = parts[1]

    # Convert the month abbreviation to its numeric representation
    months = {
        'Jan': '["1"]', 'Feb': '["2"]', 'Mar': '["3"]', 'Apr': '["4"]',
        'May': '["5"]', 'Jun': '["6"]', 'Jul': '["7"]', 'Aug': '["8"]',
        'Sep': '["9"]', 'Oct': '["10"]', 'Nov': '["11"]', 'Dec': '["12"]'
     }


    # Check if the month abbreviation exists in the dictionary, otherwise, set it to '00' (or handle it as you need)
    month_numeric = months.get(month, '00')

    # Output the results
    print("Month (Abbreviation):", month)
    print("Month (Numeric):", month_numeric)
    print("Year:", year)




    #### Extracting Bil_date
    Bil_date         = pdf.pq('LTTextLineHorizontal:overlaps_bbox("218.8, 680.81, 291.18, 708.81")').text()
    Bil_date1        =re.findall(r'Issue Date:\s*(\d{2}/\d{2}/\d{4})',Bil_date)
    Bil_date2        =''.join(Bil_date1)
    Bil_date3       = Bil_date2.replace('/', '-')
    # print("Bill date : "+Bil_date3)

    original_date = Bil_date3
    parts = original_date.split("-")
    BILL_date = f"{parts[2]}-{parts[1]}-{parts[0]}"
    print(BILL_date)

    ### Bill amount
    Bill_amount      = pdf.pq('LTTextLineHorizontal:overlaps_bbox("349.9, 720.819, 545.032, 731.342")').text()
    Bill_amount1     =re.findall(r"([-+]?\d+\.\d+)",Bill_amount)
    Bill_amount2      =''.join(Bill_amount1)
    print('Bill amount : '+Bill_amount2)

    ### Start Date of the bill
    Start_date       = pdf.pq('LTTextLineHorizontal:overlaps_bbox("65.736, 609.148, 100.764, 626.148")').text()
    Start_date1      =re.findall(r'(\d{2}/\d{2}/\d{4})',Start_date)
    Start_date2      =''.join(Start_date1)
    print('Start date :'+Start_date2)

    ### End date of the bill
    End_date         = pdf.pq('LTTextLineHorizontal:overlaps_bbox("115.236, 609.148, 150.264, 626.148")').text()
    End_date1        =re.findall(r'(\d{2}/\d{2}/\d{4})',End_date)
    End_date2        =''.join(End_date1)
    print('End date : '+End_date2)

    C_units          = pdf.pq('LTTextLineHorizontal:overlaps_bbox("459.851, 609.148, 485.149, 626.148")').text()
    C_units1         =re.findall(r'(\d+\.*\d*)',C_units)
    C_units2         =''.join(C_units1)
    print('C unit : '+C_units2)

    San_load         = pdf.pq('LTTextLineHorizontal:overlaps_bbox("560.14, 520.136, 579.6, 564.136")').text()
    San_load1        =re.findall(r"(\d+\.\d{2})/",San_load)
    San_load2        =''.join(San_load1)
    print('San load : '+San_load2)

    D_load           = pdf.pq('LTTextLineHorizontal:overlaps_bbox("200.493, 585.183, 218.007, 635.183")').text()
    D_load1          =re.findall(r'\d+\.\d+\s*\(KW\)',D_load)
    if not D_load1 :
        D_load1          =re.findall(r'\d+\.\d+\s*\(KVA\)',D_load)
    D_load2          =''.join(D_load1)
    D_load3     = re.search(r'(\d+(?:\.\d+)?)', D_load2)
    D_load4    = D_load3.group(1)
    D_load5   = str(D_load4)
    print('Load :'+D_load5)
    print()
    original_filename = "/var/www/html/public/python_scripts/uhbvn/bill_download/{}.pdf".format(Acc_no2)
    while not os.path.exists(original_filename):
        time.sleep(1)

    # current_datetime = datetime.datetime.now().strftime("%Y-%m-%d_%H-%M-%S")
    print("step 3")
    # Rename the downloaded PDF file
    new_filename = '//var/www/html/public/uploads/pdfElectricity/{}_{}_{}.pdf'.format('UHBVN',Acc_no2, Bil_month3)
    if not os.path.exists(new_filename):
        # Rename the downloaded PDF file
        os.rename(original_filename, new_filename)
    else:
        print("File with new filename already exists. Skipping renaming.")


    pdf_name ='UHBVN_'+ Acc_no2 + '_'+Bil_month3+'.pdf'
    print(pdf_name)
    bill_no =Acc_no2 + '_'+Bil_month3
    print(bill_no)


    current_date = datetime.datetime.now().strftime("%Y-%m-%d %H:%M:%S")

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
    query = "SELECT id FROM sensors WHERE provider_type = '8' AND login_status = '2' AND username ={} ;".format(Acc_no2)

    # Execute the query
    cursor.execute(query)

    # Fetch all rows from the result
    rows = cursor.fetchone()
    print(rows)

    if rows:
    # Extract the id value as a string from the row
        id_value = str(rows[0])
        print("ID:", id_value)

    check_query = "SELECT * FROM data_electricity WHERE bill_no = %s;"
    cursor.execute(check_query, (pdf_name,))
    existing_data = cursor.fetchone()

    if not existing_data:
        insert_query = """
        INSERT IGNORE  INTO data_electricity (electricity_id,bill_no, bill_date, amount, consume_unit,pdf_file, demand_load, power_load,year,currentdatetime,frequency,monthly_name )
        VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s);
        """
        cursor.execute(insert_query, (id_value,bill_no, BILL_date, Bill_amount2, C_units2,pdf_name, D_load5, San_load2,year,current_date,'1',month_numeric))
        db.commit()
    else:
        print("Data with bill_no '{}' already exists. Skipping insert.".format(pdf_name))

    cursor.close()
    db.close()
print('No more data')

