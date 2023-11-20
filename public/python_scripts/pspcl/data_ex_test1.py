import pdfquery
import glob
import os.path 
from pathlib import Path
import datetime
import time
import re
import mysql.connector

os.environ['TESSDATA_PREFIX'] = '/usr/local/share/tessdata'
# Connect to the MySQL database
db = mysql.connector.connect(
    host ="13.233.1.73" ,
    user = "remote",
    password = "PositiivPlus@01",
    database = "positiiv_db"
)


folder_path = '/var/www/html/public/python_scripts/pspcl/download/'
# folder_path=r'D:\company\E_bill'
# folder_path=r'D:\company\E_bill\punjab'
months = {
        'JAN': '["1"]', 'FEB': '["2"]', 'MAR': '["3"]', 'APR': '["4"]',
        'MAY': '["5"]', 'JUN': '["6"]', 'JUL': '["7"]', 'AUG': '["8"]',
        'SEP': '["9"]', 'OCT': '["10"]', 'NOV': '["11"]', 'DEC': '["12"]'
    }
for F_path in Path(folder_path).glob("*.pdf"):
    pdf = pdfquery.PDFQuery(F_path)
    pdf.load(0)
    Ac_no           = pdf.pq('LTTextLineHorizontal:overlaps_bbox("319.957, 597.82, 384.88, 614.57")').text()
    Ac_no1          =re.findall(r'A/C No.:\s+(\d+)',Ac_no)
   
    if Ac_no1:
        try:
            Acc_no          =Ac_no1[0]
            San_load      = pdf.pq('LTTextLineHorizontal:overlaps_bbox("72.613, 470.82, 120.751, 550.57")').text()
            
            San_load      =re.findall(r'Connected Load\(kW\)\s*(\d+\.\d)',San_load)[0]
            Bill_date      = pdf.pq('LTTextLineHorizontal:overlaps_bbox("451.244, 585.645, 550.979, 620.401")').text()
            Bill_date     =re.findall(r'Issue Date:\s+(\d{2}\-[A-Z]{3}\-\d{4})',Bill_date)[0]
            Bill_date        =re.findall(r'\d{2}\-[A-Z]{3}\-\d{4}',Bill_date)[0]
            month               =Bill_date[3:6]
            month_numeric       =months.get(month,0)
            year                =Bill_date[7:]
            Bill_month         =month+'_'+year
            check={
                    'JAN': '01', 'FEB': '02', 'MAR': '03', 'APR': '04',
                'MAY': '05', 'JUN': '06', 'JUL': '07', 'AUG': '08',
                'SEP': '09', 'OCT': '10', 'NOV': '11', 'DEC': '12'
                }
            Bill_date          =year+''+check.get(month)+''+Bill_date[0:2]
            C_units_1      = pdf.pq('LTTextLineHorizontal:overlaps_bbox("409.506, 468.529, 539.795, 475.285")').text()
            C_units_2      = pdf.pq('LTTextLineHorizontal:overlaps_bbox("409.506, 475.529, 539.795, 484.285")').text()
            C_units_3      = pdf.pq('LTTextLineHorizontal:overlaps_bbox("409.506, 460.529, 539.795, 468.285")').text()
            C_units_4      = pdf.pq('LTTextLineHorizontal:overlaps_bbox("409.506, 450.529, 539.795, 460.285")').text()
            C_units_5      = pdf.pq('LTTextLineHorizontal:overlaps_bbox("409.506, 440.529, 539.795, 450.285")').text()
            C_units_6       =C_units_1+" "+C_units_2+" "+C_units_3+" "+C_units_4+" "+C_units_5

            C_units     =re.findall('Total Units Consumed \(kWh\):(\d+)',C_units_6)[0]

            Bill_amount      = pdf.pq('LTTextLineHorizontal:overlaps_bbox("410.605, 114.002, 487.184, 173.01")').text()
            Bill_amount     =re.findall('Rs.(\d+)/',Bill_amount)[0]
            D_load      = pdf.pq('LTTextLineHorizontal:overlaps_bbox("160.267, 360.497, 200.416, 489.253")').text()
            D_load      =re.findall(r'Load\(80%\)\s*(\d+\.\d)',D_load)
            print(Acc_no)
            print(D_load)
            print(Bill_date)
            print(month)
            print(month_numeric)
            print(Bill_month)
            print(year)
            print(Bill_amount)
            print(C_units)
            print(San_load)
            # print(D_load)
            print('########')
        except:
            print('ignoring')
            continue
        
    else:
        try:
            Acc_no_1 = pdf.pq('LTTextLineHorizontal:overlaps_bbox("59.528, 587.645, 125.624, 610.401")').text()
            Acc_no = re.findall( r'A/C No.:\s+(\d{10})', Acc_no_1)[0] 
            Bill_date        = pdf.pq('LTTextLineHorizontal:overlaps_bbox("400.008, 610.415, 450.066, 626.171")').text()
            Bill_date        =re.findall(r'\d{2}\-[A-Z]{3}\-\d{4}',Bill_date)[0]
            month               =Bill_date[3:6]
            month_numeric       =months.get(month,0)
            year                =Bill_date[7:]
            Bill_month         =month+'_'+year
            check={
                    'JAN': '01', 'FEB': '02', 'MAR': '03', 'APR': '04',
                'MAY': '05', 'JUN': '06', 'JUL': '07', 'AUG': '08',
                'SEP': '09', 'OCT': '10', 'NOV': '11', 'DEC': '12'
                }
                
            Bill_date          =year+''+check.get(month)+''+Bill_date[0:2]

            Bill_amount_1      = pdf.pq('LTTextLineHorizontal:overlaps_bbox("480.524, 560.894, 540.093, 589.902")').text()
            Bill_amount = re.findall(r'Rs\.(\d+\.\d)', Bill_amount_1)[0]
            C_units_1          = pdf.pq('LTTextLineHorizontal:overlaps_bbox("490.291, 390.998, 534.32, 460.754")').text()
            C_units = re.findall(r'\d+', C_units_1)[0]
            San_load   = pdf.pq('LTTextLineHorizontal:overlaps_bbox("210.392, 560.624, 255.299, 595.38")').text()
            San_load  =re.findall(r'(\d+\.+\d+)',San_load)[0]
            d_load_1   = pdf.pq('LTTextLineHorizontal:overlaps_bbox("150.839, 300.419, 198.354, 372.175")').text()
            D_load = re.findall(r'\d+', d_load_1)[0]
            print(Acc_no)
            print(Bill_date)
            print(month)
            print(month_numeric)
            print(Bill_month)
            print(year)
            print(Bill_amount)
            print(C_units)
            print(San_load)
            print(D_load)
            print('***')
        except:
            print('ignoring')
            continue
    
    original_filename = "/var/www/html/public/python_scripts/pspcl/download/{}.pdf".format(Acc_no)
    while not os.path.exists(original_filename):
        time.sleep(1)

    current_datetime = datetime.datetime.now().strftime("%Y-%m-%d_%H-%M-%S")
    new_filename = '//var/www/html/public/uploads/pdfElectricity/{}{}{}.pdf'.format('pspcl',Acc_no, Bill_month)
    if not os.path.exists(new_filename):
        # Rename the downloaded PDF file
        os.rename(original_filename, new_filename)
    else:
        print("File with new filename already exists. Skipping renaming.")


    pdf_name ='punjab_'+ Acc_no + '_'+Bill_month+'.pdf'
    print(pdf_name)
    bill_no =Acc_no + '_'+Bill_month
    print(bill_no)
   


    current_date = datetime.datetime.now().strftime("%Y-%m-%d %H:%M:%S")

    # Query to fetch Acc_no and password from the database table
    query = "SELECT id FROM sensors WHERE provider_type = '8' AND login_status = '2' AND username ={} ;".format(Acc_no)

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
            cursor.execute(insert_query, (id_value,bill_no, Bill_date, Bill_amount, C_units,pdf_name, D_load, San_load,year,current_date,'1',month_numeric))
            db.commit()
        else:
            print("Data with bill_no '{}' already exists. Skipping insert.".format(pdf_name))

    cursor.close()
    db.close()
print('No more data')
