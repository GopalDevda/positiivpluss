import pandas as pd
import openpyxl
import pdfquery
import glob
import os.path 
from pathlib import Path
import shutil
import json
import re
import mysql.connector
import time
import os as os
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.chrome.options import Options

folder_path = '/var/www/html/public/python_scripts/uhbvn/bill_download/'
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
    print("Bill month : "+Bil_month2)

    #### Extracting Bil_date
    Bil_date         = pdf.pq('LTTextLineHorizontal:overlaps_bbox("218.8, 680.81, 291.18, 708.81")').text()
    Bil_date1        =re.findall(r'Issue Date:\s*(\d{2}/\d{2}/\d{4})',Bil_date)
    Bil_date2        =''.join(Bil_date1)
    print("Bill date : "+Bil_date2)

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
    print('Load :'+D_load2)
    print()


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
    query = "SELECT id,username FROM sensors WHERE provider_type = '8' AND login_status = '2';"  # Modify the query as per your table structure and conditions

    # Execute the query
    cursor.execute(query)

    # Fetch all rows from the result
    rows = cursor.fetchall()
    print(rows)
    




