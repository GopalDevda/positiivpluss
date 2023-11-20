import pdfquery
import glob
import os.path 
from pathlib import Path
import datetime
import time
import re
import mysql.connector

# Connect to the MySQL database
db = mysql.connector.connect(
    host ="13.233.1.73" ,
    user = "remote",
    password = "PositiivPlus@01",
    database = "positiiv_db"

)

cursor = db.cursor()

folder_path = '/var/www/html/public/python_scripts/MSEDCL/download'
# folder_path=r'D:\company\E_bill\maharastra final bills'
months = {
        'JAN': '["1"]', 'FEB': '["2"]', 'MAR': '["3"]', 'APR': '["4"]',
        'MAY': '["5"]', 'JUN': '["6"]', 'JUL': '["7"]', 'AUG': '["8"]',
        'SEP': '["9"]', 'OCT': '["10"]', 'NOV': '["11"]', 'DEC': '["12"]',
        '01':'JAN','02':'FEB','03':'MAR','04':'APR','05':'MAY','06':'JUN',
        '07':'JUL','08':'AUG','09':'SEP','10':'OCT','11':'NOV','12':'DEC'
    }
count=1
for F_path in Path(folder_path).glob("*.pdf"):
# for F_path in Path(folder_path).glob("001741451782.pdf"):
    pdf = pdfquery.PDFQuery(F_path)
    pdf.load(0)    
                                          
    Acc_no = pdf.pq('LTTextLineHorizontal:overlaps_bbox("208.136, 43.021, 254.436, 49.959")').text()
    Acc_no1 = pdf.pq('LTTextLineHorizontal:overlaps_bbox("70.041, 610.337, 175.691, 617.97")').text() 
    Acc_no=Acc_no1 or Acc_no
    Acc_no=re.findall(r'\d{12}',Acc_no)
    
    if(Acc_no):
        try:
           
            Acc_no=Acc_no[0] 
            # print(Acc_no)
            # # Bill_month        = pdf.pq('LTTextLineHorizontal:overlaps_bbox("34.978, 737.325, 307.348, 749.28")').text()
            Bill_date          = pdf.pq('LTTextLineHorizontal:overlaps_bbox("496.176, 608.687, 540.786, 617.706")').text()
            # Bill_date          =Bill_month.replace('-','_')
            month               =Bill_date[3:6]
            month_numeric       =months.get(month,0)
            year               ='20'+Bill_date[7:]
            
            Bill_month         =month+'_'+year

            check={
                'JAN': '01', 'FEB': '02', 'MAR': '03', 'APR': '04',
            'MAY': '05', 'JUN': '06', 'JUL': '07', 'AUG': '08',
            'SEP': '09', 'OCT': '10', 'NOV': '11', 'DEC': '12'
            }
            
            Bill_date          =year+''+check.get(month)+''+Bill_date[0:2]
                                                                            #314.675, 756.202, 345.549, 763.141
            Bill_amount      = pdf.pq('LTTextLineHorizontal:overlaps_bbox("501.813, 588.225, 541.949, 607.247")').text()
            # # (old coordinates) San_load        =  pdf.pq('LTTextLineHorizontal:overlaps_bbox("111.07, 491.565, 149.948, 500.419")').text()
            San_load        =  pdf.pq('LTTextLineHorizontal:overlaps_bbox("280.981, 545.849, 371.806, 553.48")').text()
            
            San_load        =re.findall(r'Sanct. Load:\s*\.(\d+\.\d*)\s*KW',San_load)[0]
            D_load = '0'   #not available   365.793, 459.823, 382.77, 467.454
            C_units          = pdf.pq('LTTextLineHorizontal:overlaps_bbox("70.044, 554.104, 200.444, 561.737")').text()
            C_units          =re.findall(r'Billing Unit:\s+(\d+)',C_units)[0]
            Power_factor='0' #not available
            
            print(Acc_no)
            print(Bill_month)
            print(Bill_date)
            print(month_numeric)
            print(year)
            print(Bill_amount)
            print(C_units)
            print(San_load)
            print('>>>>>>>>>>>>>',count)
            count+=1
        except:
            print('problem with pdf 1')
           
        
        # Bill_month        = pdf.pq('LTTextLineHorizontal:overlaps_bbox("243.133, 703.02, 352.855, 711.135")').text() 396.163, 618.665, , 627.81
    else:
        try:
            Acc_no            = pdf.pq('LTTextLineHorizontal:overlaps_bbox("44.467, 635.131, 177.493, 644.277")').text()
            Acc_no            =re.findall(r"\d{12}",Acc_no)[0]
            Bill_date         = pdf.pq('LTTextLineHorizontal:overlaps_bbox("396.163, 616.600, 442.946, 627.81")').text()
            Bill_date          =Bill_date.replace('-','_')
            month_numeric     =[str(Bill_date[3:5])]
            year              =Bill_date[6:]
            Bill_month         =months.get(str(Bill_date[3:5]))+'_'+year
            Bill_date         =year+''+Bill_date[3:5]+''+Bill_date[0:2]
            Bill_amount      = pdf.pq('LTTextLineHorizontal:overlaps_bbox("79.683, 55.148, 168.667, 95.294")').text()
            Bill_amount      =re.findall(r'Bill Amount:(.*?\.\d{2})',Bill_amount)[0]
            San_load   = pdf.pq('LTTextLineHorizontal:overlaps_bbox("112.778, 420.334, 152.938, 465.48")').text()
            try:
                San_load   =re.findall(r'(\d+\.\d{2})\s*KW',San_load)[0]
            except: ## for San_load in HP
                San_load   =re.findall(r'(\d+\.\d{2})\s*HP',San_load)[0]
            pdf.load(1)
            # # (old coordinates) Start_date       = pdf.pq('LTTextLineHorizontal:overlaps_bbox("272.549, 544.413, 377.632, 552.528")').text()
                                                                        #165.094, 259.142, 175.267, 268.288
            
            Power_factor    = pdf.pq('LTTextLineHorizontal:overlaps_bbox("327.273, 240.887, 350.16, 276.033")').text()
            Power_factor    =re.findall(r'\d+\.\d{3}',Power_factor)[0]
            
            D_load          = pdf.pq('LTTextLineHorizontal:overlaps_bbox("165.094, 253.865, 180.267, 295.01")').text()
            
            D_load          =re.findall(r'\d+',D_load)[-1]
            

            C_units          = pdf.pq('LTTextLineHorizontal:overlaps_bbox("142.735, 340.79, 200.881, 355.935")').text()
            C_units          =re.findall(r'\d+\.\d+',C_units)[-1]

            print(Acc_no)
            print(Bill_month)
            print(Bill_date)
            print(month_numeric)
            print(year)
            print(Bill_amount)
            print(D_load)
            print(C_units)
            print(San_load)
            print('**',count)
            count+=1
        except :
            print('problem with pdf 2')
           

    original_filename = "/var/www/html/public/python_scripts/MSEDCL/download/{}.pdf".format(Acc_no)
    while not os.path.exists(original_filename):
        time.sleep(1)

    current_datetime = datetime.datetime.now().strftime("%Y-%m-%d_%H-%M-%S")
    new_filename = '/var/www/html/public/uploads/pdfElectricity/{}{}{}.pdf'.format('MSCDEL',Acc_no, Bill_month)
    if not os.path.exists(new_filename):
        # Rename the downloaded PDF file
        os.rename(original_filename, new_filename)
    else:
        print("File with new filename already exists. Skipping renaming.")


    pdf_name ='MSCDEL_'+ Acc_no + '_'+Bill_month+'.pdf'
    print(pdf_name)
    bill_no =Acc_no + '_'+Bill_month
    print(bill_no)


    current_date = datetime.datetime.now().strftime("%Y-%m-%d %H:%M:%S")

    # Query to fetch Acc_no and password from the database table
    query = "SELECT id FROM sensors WHERE provider_type = '16' AND login_status = '2' AND username ={} ;".format(Acc_no)

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
