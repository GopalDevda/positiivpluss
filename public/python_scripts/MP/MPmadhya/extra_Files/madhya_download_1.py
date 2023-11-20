import pdfquery
import glob
import os.path 
from pathlib import Path
from datetime import datetime
import shutil
import json
import re 
import mysql.connector
import time
# folder_path = r'D:\Dikshant_Electricity_data\Electricity_Data\MPmadhya\download'
# folder_path = r'D:\company\E_bill'
folder_path = '/var/www/html/public/python_scripts/MP/MPmadhya/download/'
for F_path in Path(folder_path).glob("*.pdf"):
    # print(F_path)
    pdf = pdfquery.PDFQuery(F_path)
    pdf.load(0)

    Acc_no            = pdf.pq('LTTextLineHorizontal:overlaps_bbox("108.0, 779.96, 151.974, 786.96")').text()
    M_phase     = pdf.pq('LTTextLineHorizontal:overlaps_bbox("301.0, 691.96, 324.702, 698.96")').text()
    
    Bill_month        = pdf.pq('LTTextLineHorizontal:overlaps_bbox("477.5, 757.96, 510.554, 764.96")').text()
    rename_month = Bill_month.replace('-','_')
    # Input date string in the format "JUN-2023"
    input_string = Bill_month

    # Split the string using '_' as the separator
    parts = input_string.split('-')

    # Extract month and year
    month = parts[0].capitalize()  # Capitalize the first letter for consistency
    year = parts[1]

    months = {
        'Jan': '["1"]', 'Feb': '["2"]', 'Mar': '["3"]', 'Apr': '["4"]',
        'May': '["5"]', 'Jun': '["6"]', 'Jul': '["7"]', 'Aug': '["8"]',
        'Sep': '["9"]', 'Oct': '["10"]', 'Nov': '["11"]', 'Dec': '["12"]'
     }

    month_numeric = months.get(month, '00')
    

    Bill_date         = pdf.pq('LTTextLineHorizontal:overlaps_bbox("301.0, 746.96, 342.237, 753.96")').text()
    Bill_date1, Bill_date2, Bill_date3 = Bill_date.split('-')
    Bill_date         =Bill_date3 + '-' + Bill_date2 + '-' +Bill_date1

    Bill_amount1     = pdf.pq('LTTextLineHorizontal:overlaps_bbox("337.5, 394.96, 414.098, 401.96")').text()
    Bill_amount2    =  pdf.pq('LTTextLineHorizontal:overlaps_bbox("520.82, 394.96, 550.003, 401.96")').text()
    Bill_amount3    =  pdf.pq('LTTextLineHorizontal:overlaps_bbox("337.5, 368.96, 550.003, 370.501")').text()
   
    

    # Start_date       = pdf.pq('LTTextLineHorizontal:overlaps_bbox("141.55, 400.96, 180.449, 407.96")').text()
    # End_date         = pdf.pq('LTTextLineHorizontal:overlaps_bbox("108.0, 669.96, 149.629, 676.96")').text()
    C_units          = pdf.pq('LTTextLineHorizontal:overlaps_bbox("477.5, 746.96, 500.838, 753.96")').text()
    San_load = pdf.pq('LTTextLineHorizontal:overlaps_bbox("301.0, 680.96, 327.813, 687.96")').text()
    S_l = re.findall(r"[0-9\W]+",San_load)
    S_load1 = ''.join(str(x) for x in S_l)
    D_load = pdf.pq('LTTextLineHorizontal:overlaps_bbox("301.0, 658.96, 318.507, 665.96")').text()
    pf = pdf.pq('LTTextLineHorizontal:overlaps_bbox("213.19, 609.96, 226.805, 616.96")').text()
    pf1 = re.findall(r"[0-9\W]+",pf)
    pf2 =  ''.join(str(x) for x in pf1)
    text = (Bill_amount1 + " "+ Bill_amount2 + " "+ Bill_amount3)
    pattern = r"Current Payable Amount\s+(\d+(?:\.\d+)?)"   ### for bill amount

    match = re.search(pattern, text)
    Bill_amount=''
    if match:
        Bill_amount = match.group(1)
        
    
    pdf.file.close()
   
   
    original_filename = "/var/www/html/public/python_scripts/MP/MPmadhya/download/{}.pdf".format(Acc_no)
    while not os.path.exists(original_filename):
        time.sleep(1)
    new_filename = '/var/www/html/public/uploads/pdfElectricity/{}_{}_{}.pdf'.format('mpMadhya',Acc_no,rename_month)
    bill_no =(Acc_no + '_'+ Bill_month)
    print(bill_no)
    pdf_file = ('mpMadhya_'+ Acc_no+'_' +rename_month)


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
    query = "SELECT id FROM sensors WHERE provider_type = '15' AND login_status = '2' AND account_no ='{}' ;".format(Acc_no)

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
    cursor.execute(insert_query, (id_value,bill_no, Bill_date, Bill_amount, C_units,pdf_file, D_load,year, S_load1,month_numeric,current_date,'1'))
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



print ("MP_madhya_EB work is commpleted successfully")

