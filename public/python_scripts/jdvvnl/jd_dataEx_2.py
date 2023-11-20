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
import os.path
import datetime
import os
import pdfquery
from pathlib import Path
os.environ['TESSDATA_PREFIX'] = '/usr/local/share/tessdata'

folder_path = '/var/www/html/public/python_scripts/jdvvnl/download'
# folder_path = r'D:\company\E_bill'
db = mysql.connector.connect(
    host ="13.233.1.73" ,
    user = "remote",
    password = "PositiivPlus@01",
    database = "positiiv_db"
)

cursor = db.cursor()
months = {
        'Jan': '["1"]', 'Feb': '["2"]', 'Mar': '["3"]', 'Apr': '["4"]',
        'May': '["5"]', 'Jun': '["6"]', 'Jul': '["7"]', 'Aug': '["8"]',
        'Sep': '["9"]', 'Oct': '["10"]', 'Nov': '["11"]', 'Dec': '["12"]'
    }

for F_path in Path(folder_path).glob("**/*.pdf"):

    pdf = pdfquery.PDFQuery(F_path)
    pdf.load()

    Acc_no            = pdf.pq('LTTextLineHorizontal:overlaps_bbox("127.51, 661.965, 160.87, 666.965")').text()

    Bill_month        = pdf.pq('LTTextLineHorizontal:overlaps_bbox("127.51, 601.965, 149.465, 606.965")').text()
    Bill_month        =Bill_month.replace('/','_')
    month,year        =Bill_month.split('_')
    month[0].capitalize()
    month_numeric     =months.get(month,0)

    Bill_date         = pdf.pq('LTTextLineHorizontal:overlaps_bbox("372.2, 316.965, 397.77, 321.965")').text()
    Bill_date1, Bill_date2, Bill_date3 = Bill_date.split('-')
    Bill_date         =Bill_date3 + '-' + Bill_date2 + '-' +Bill_date1

    Bill_amount      = pdf.pq('LTTextLineHorizontal:overlaps_bbox("496.31, 361.965, 517.16, 366.965")').text()
    # M_phase          = pdf.pq('LTTextLineHorizontal:overlaps_bbox("251.63, 451.965, 277.2, 456.965")').text()

    Start_date       = pdf.pq('LTTextLineHorizontal:overlaps_bbox("251.63, 451.965, 277.2, 456.965")').text()
    Start_date       =Start_date.replace('-','/')

    End_date         = pdf.pq('LTTextLineHorizontal:overlaps_bbox("127.51, 451.965, 153.08, 456.965")').text()
    End_date         =End_date.replace('-','/')


    C_units          = pdf.pq('LTTextLineHorizontal:overlaps_bbox("252.93, 301.965, 264.05, 306.965")').text()
    San_load         = pdf.pq('LTTextLineHorizontal:overlaps_bbox("127.51, 556.965, 149.465, 561.965")').text().split(' ')[0]
    D_load           = pdf.pq('LTTextLineHorizontal:overlaps_bbox("251.63, 496.965, 269.7, 501.965")').text()
    power_factor         =pdf.pq('LTTextLineHorizontal:overlaps_bbox("127.51, 496.965, 140.02, 501.965")').text()

    print(Acc_no)
    print(Bill_month)
    print(Bill_date)
    print(Bill_amount)
    # print(M_phase)
    print(Start_date)
    print(End_date)
    print(C_units)
    print(San_load)
    print(D_load)
    print(power_factor)
    print("-----------------------------------")
    pdf.file.close()

    original_filename = "/var/www/html/public/python_scripts/jdvvnl/download/{}.pdf".format(Acc_no)
    # original_filename = "D:\company\E_bill\sample_Jodhpur.pdf"
    while not os.path.exists(original_filename):
        time.sleep(1)

    current_datetime = datetime.datetime.now().strftime("%Y-%m-%d_%H-%M-%S")

    # Rename the downloaded PDF file
    new_filename = '/var/www/html/public/uploads/pdfElectricity/{}_{}_{}.pdf'.format('Jodhpur',Acc_no, Bill_month)
    # new_filename = r'D:\company\E_bill\{}_{}_{}.pdf'.format('Jodhpur',Acc_no, Bill_month)
    if not os.path.exists(new_filename):
        # Rename the downloaded PDF file
        os.rename(original_filename, new_filename)
    else:
        print("File with new filename already exists. Skipping renaming.")


    pdf_name ='Jodhpur_'+ Acc_no + '_'+Bill_month+'.pdf'
    print(pdf_name)
    bill_no =Acc_no + '_'+Bill_month
    print(bill_no)


    current_date = datetime.datetime.now().strftime("%Y-%m-%d %H:%M:%S")

    # Query to fetch Acc_no and password from the database table
    db = mysql.connector.connect(
    host ="13.233.1.73" ,
    user = "remote",
    password = "PositiivPlus@01",
    database = "positiiv_db"
    )

    cursor = db.cursor()
    query = "SELECT id FROM sensors WHERE provider_type = '74' AND login_status = '2' AND  kn_no ={} ;".format(Acc_no)

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
        cursor.execute(check_query, (bill_no,))
        existing_data = cursor.fetchone()

        if not existing_data:
            insert_query = """
            INSERT IGNORE  INTO data_electricity (electricity_id,bill_no, bill_date, amount, consume_unit,pdf_file, demand_load, power_load,year,currentdatetime,frequency,monthly_name )
            VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s);
            """
            cursor.execute(insert_query, (id_value,bill_no, Bill_date, Bill_amount, C_units,pdf_name, D_load, San_load,year,current_date,'1',month_numeric))
            db.commit()
        else:
            print("Data with bill_no '{}' already exists. Skipping insert.".format(pdf_name))

        cursor.close()
        db.close()
print('No more data')
