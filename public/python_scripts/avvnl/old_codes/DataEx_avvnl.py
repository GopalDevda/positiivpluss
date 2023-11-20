


import time
import os as os
import mysql.connector
import pdfquery
import glob
import os.path
from PIL import Image
import datetime
from pathlib import Path


folder_path = '/var/www/html/public/python_scripts/avvnl/download'

for F_path in Path(folder_path).glob("*.pdf"):

    pdf = pdfquery.PDFQuery(F_path)
    pdf.load()
    Acc_no            = pdf.pq('LTTextLineHorizontal:overlaps_bbox("127.51, 661.965, 160.87, 666.965")').text()

    Bill_month        = pdf.pq('LTTextLineHorizontal:overlaps_bbox("127.51, 601.965, 149.465, 606.965")').text()
    Bil_month3       =Bill_month.replace('/','_')
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

    D_load           = pdf.pq('LTTextLineHorizontal:overlaps_bbox("251.63, 496.965, 269.7, 501.965")').text()

    San_load         = pdf.pq('LTTextLineHorizontal:overlaps_bbox("127.51, 556.965, 149.465, 561.965")').text().split(' ')[0]

    print(Acc_no)
    print(Bil_month3)
    print(month)
    print(month_numeric)
    print(year)
    print(Bill_date)
    print(Bill_amount)
    print(Start_date)
    print(End_date)

    # print(M_phase)
    print(C_units)
    print(San_load)
    print(D_load)
    # print(power_factor)
    print("-----------------------------------")

    original_filename = "/var/www/html/public/python_scripts/avvnl/download/{}.pdf".format(Acc_no)
    while not os.path.exists(original_filename):
        time.sleep(1)

    current_datetime = datetime.datetime.now().strftime("%Y-%m-%d_%H-%M-%S")

    # Rename the downloaded PDF file
    new_filename = '/var/www/html/public/uploads/pdfElectricity/{}_{}_{}.pdf'.format('AVVNL',Acc_no, Bil_month3)
    if not os.path.exists(new_filename):
        # Rename the downloaded PDF file
        os.rename(original_filename, new_filename)
    else:
        print("File with new filename already exists. Skipping renaming.")
        os.remove(original_filename)

    pdf_name ='AVVNL_'+ Acc_no + '_'+Bil_month3+'.pdf'
    print(pdf_name)
    bill_no =Acc_no + '_'+Bil_month3
    print(bill_no)
    current_date = datetime.datetime.now().strftime("%Y-%m-%d %H:%M:%S")


        # Connect to the MySQL database
    db = mysql.connector.connect(
        host ="localhost" ,
        user = "root",
        password = "PositiivPlus@01",
        database = "positiiv_db"
    )
    cursor = db.cursor()


    # Query to fetch Acc_no and password from the database table
    query = "SELECT id FROM sensors WHERE provider_type = '73' AND login_status = '2' AND kn_no ={} ;".format(Acc_no)

    # Execute the query
    cursor.execute(query)

    # Fetch all rows from the result
    rows = cursor.fetchone()
    print(rows)

    if rows:
    # Extract the id value as a string from the row
        id_value = str(rows[0])
        print("ID:", id_value)

    check_query = "SELECT * FROM data_electricity WHERE bill_no ={} ;".format(bill_no)
    cursor.execute(check_query)
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


