import pandas as pd
import openpyxl
import pdfquery
import glob
import os.path
from pathlib import Path
import shutil
import json
from datetime import datetime

import re
import mysql.connector
import time
import os as os
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.chrome.options import Options


folder_path = '/var/www/html/public/python_scripts/MP/mp_paschim/download/'
# folder_path = r'D:\Dikshant_Electricity_data\Electricity_Data\MPpaschim\pdf_mp_paschim'
for F_path in Path(folder_path).glob("*.pdf"):
    # print(F_path)
    pdf = pdfquery.PDFQuery(F_path)
    pdf.load(0)

    Acc_no            = pdf.pq('LTTextLineHorizontal:overlaps_bbox("108.0, 781.521, 151.974, 788.521")').text()
    Bill_month        = pdf.pq('LTTextLineHorizontal:overlaps_bbox("118.0, 161.021, 150.291, 168.021")').text()
    rename_month = Bill_month.replace('-','_')
    # Input date string in the format "JUN-2023"
    input_string = Bill_month

    # Split the string using '_' as the separator
    parts = input_string.split('-')

    # Extract month and year
    month = parts[0].capitalize()  # Capitalize the first letter for consistency
    year = parts[1]



    # Dictionary to map month abbreviations to month numbers
    months = {
        'Jan': '["1"]', 'Feb': '["2"]', 'Mar': '["3"]', 'Apr': '["4"]',
        'May': '["5"]', 'Jun': '["6"]', 'Jul': '["7"]', 'Aug': '["8"]',
        'Sep': '["9"]', 'Oct': '["10"]', 'Nov': '["11"]', 'Dec': '["12"]'
     }

    month_numeric = months.get(month, '00')
    print(month_numeric ,type(month_numeric))
# Extract month abbreviation and year from input string
    # month_abbr, year = input_date_string.split("-")
    # month = months_dict[month_abbr]

    # Output month and year
    print("Month:", month)
    print("Year:", year)
    print("Data type of Month:", type(month))
    print("Data type of Year:", type(year))

    Bill_date         = pdf.pq('LTTextLineHorizontal:overlaps_bbox("301.0, 748.521, 339.906, 755.521")').text()
    input_date = datetime.strptime(Bill_date, "%d-%b-%Y")

# Convert the date to the desired format "2023-06-26"
    output_date= input_date.strftime("%Y-%m-%d")

    # print(output_date_string)

    Bill_amount      = pdf.pq('LTTextLineHorizontal:overlaps_bbox("520.81, 726.521, 550.0, 733.521")').text()
    # M_phase          = pdf.pq('LTTextLineHorizontal:overlaps_bbox("301.0, 693.521, 324.723, 700.521")').text()
    Start_date       = pdf.pq('LTTextLineHorizontal:overlaps_bbox("140.97, 407.521, 181.038, 414.521")').text()
    End_date         = pdf.pq('LTTextLineHorizontal:overlaps_bbox("108.0, 671.521, 148.068, 678.521")').text()
    C_units          = pdf.pq('LTTextLineHorizontal:overlaps_bbox("477.5, 748.521, 500.852, 755.521")').text()
    San_load         = pdf.pq('LTTextLineHorizontal:overlaps_bbox("301.0, 682.521, 327.847, 689.521")').text()
    San_load1 = San_load.split()[0]

    print(San_load1)

    D_load           = pdf.pq('LTTextLineHorizontal:overlaps_bbox("301.0, 660.521, 318.514, 667.521")').text()
    P_F              =pdf.pq('LTTextLineHorizontal:overlaps_bbox("213.19, 616.521, 226.812, 623.521")').text()

    print(Acc_no)
    print(rename_month)
    print(output_date)

    print(Bill_amount)
    # print(M_phase)
    # print(Start_date)
    # print(End_date)
    print(C_units)
    # print(San_load)
    print(D_load)
    print(P_F)
    print("-----------------------------------")

    print("San_load1:", San_load1, "Data Type:", type(San_load1))
    print("Acc_no:", Acc_no, "Data Type:", type(Acc_no))
    print("rename_month:", rename_month, "Data Type:", type(rename_month))
    print("output_date:", output_date, "Data Type:", type(output_date))
    print("Bill_amount:", Bill_amount, "Data Type:", type(Bill_amount))
    print("C_units:", C_units, "Data Type:", type(C_units))
    print("D_load:", D_load, "Data Type:", type(D_load))
    print("P_F:", P_F, "Data Type:", type(P_F))

    original_filename = "/var/www/html/public/python_scripts/MP/mp_paschim/download/{}.pdf".format(Acc_no)
    while not os.path.exists(original_filename):
        time.sleep(1)

    # current_datetime = datetime.datetime.now().strftime("%Y-%m-%d_%H-%M-%S")
    print("step 3")
    # Rename the downloaded PDF file
    new_filename = '/var/www/html/public/uploads/pdfElectricity/{}_{}_{}.pdf'.format('mpPaschim',Acc_no,rename_month)
    bill_no =(Acc_no + '_'+ Bill_month)
    print(bill_no)
    pdf_file = ('mpPaschim_'+ Acc_no+'_' +rename_month)
    print(pdf_file)
    print("-----------------------------------")

    current_date = datetime.now().strftime("%Y-%m-%d %H:%M:%S")

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
    query = "SELECT id FROM sensors WHERE provider_type = '58' AND login_status = '2' AND account_no ='{}' ;".format(Acc_no)

    # Execute the query
    cursor.execute(query)

    # Fetch all rows from the result
    rows = cursor.fetchone()
    print(rows)

    if rows:
    # Extract the id value as a string from the row
        id_value = str(rows[0])
        print("ID:", id_value)

    insert_query = """
    INSERT INTO data_electricity (electricity_id,bill_no, bill_date, amount, consume_unit,pdf_file, demand_load,year, power_load,monthly_name,currentdatetime,frequency )
    VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s);
    """
    cursor.execute(insert_query, (id_value,bill_no, output_date, Bill_amount, C_units,pdf_file, D_load,year, San_load1,month_numeric,current_date,'1'))
    db.commit()
    try:
        # Rename the file
        os.rename(original_filename, new_filename)
        print(f"File '{original_filename}' renamed to '{new_filename}'.")

    # Remove the original file
        os.remove(original_filename)
        print(f"Original file '{original_filename}' removed.")
    except FileNotFoundError:
        print(f"File '{original_filename}' not found.")
    cursor.close()
db.close()

