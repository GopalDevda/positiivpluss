import pandas as pd 
import re
import time
import os as os
import openpyxl
import pdfquery
import glob
import os.path 
from PIL import Image
from pytesseract import pytesseract
from pathlib import Path
import shutil
import logging 
from logging import *
import json

folder_path = r'C:\Users\ANUBH\OneDrive\Desktop\share utopiic\Uttar Gujrat'
for F_path in Path(folder_path).glob("**\*.pdf"):
    pdf = pdfquery.PDFQuery(F_path)
    pdf.load()


    Acc_no_1 = pdf.pq('LTTextLineHorizontal:overlaps_bbox("75.285, 470.44, 160.203, 600.44")').text()
    Acc_no_2 = re.findall( r'Consumer No (\d+)', Acc_no_1) 
    Acc_no         =''.join(Acc_no_2)

    Bill_month        = pdf.pq('LTTextLineHorizontal:overlaps_bbox("200.684, 727.644, 240.324, 737.394")').text()

    Bill_date_1         = pdf.pq('LTTextLineHorizontal:overlaps_bbox("290.332, 600.07, 365.672, 670.07")').text()
    Bill_date_2 = re.findall( r'Bill Date: (\d{2}-\d{2}-\d{4})', Bill_date_1) 
    Bill_date         =''.join(Bill_date_2)

    # Bill_amount_1     = pdf.pq('LTTextLineHorizontal:overlaps_bbox("339.25, 259.82, 500.664, 268.82")').text()
    # Bill_amount_2     = pdf.pq('LTTextLineHorizontal:overlaps_bbox("463.984, 259.82, 500.664, 268.82")').text()
    # Bill_amount_3     = pdf.pq('LTTextLineHorizontal:overlaps_bbox("339.25, 239.57, 370.223, 248.57")').text()
    # Bill_amount_4     = pdf.pq('LTTextLineHorizontal:overlaps_bbox("445.176, 239.57, 500.664, 248.57")').text()
    # Bill_amount_5     = pdf.pq('LTTextLineHorizontal:overlaps_bbox("339.25, 219.32, 388.526, 228.32")').text()
    # Bill_amount_6     = pdf.pq('LTTextLineHorizontal:overlaps_bbox("468.062, 219.32, 500.664, 228.32")').text()
    # Bill_amount_7     = pdf.pq('LTTextLineHorizontal:overlaps_bbox("339.25, 199.07, 360.713, 208.07")').text()
    # Bill_amount_8     = pdf.pq('LTTextLineHorizontal:overlaps_bbox("445.176, 199.07, 500.664, 208.07")').text()
    
    # Acc_no_2 = re.findall( r'A/C No.:\s+(\d+)', Acc_no_1) 
    # Acc_no         =''.join(Acc_no_2)

    C_units          = pdf.pq('LTTextLineHorizontal:overlaps_bbox("166.75, 298.82, 189.637, 307.82")').text()
    # Acc_no_2 = re.findall( r'A/C No.:\s+(\d+)', Acc_no_1) 
    # Acc_no         =''.join(Acc_no_2)

    San_load   = pdf.pq('LTTextLineHorizontal:overlaps_bbox("341.5, 551.57, 386.967, 560.57")').text()
    # Acc_no_2 = re.findall( r'A/C No.:\s+(\d+)', Acc_no_1) 
    # Acc_no         =''.join(Acc_no_2)

    # D_load   = pdf.pq('LTTextLineHorizontal:overlaps_bbox("185.835, 352.039, 201.93, 361.043")').text()
    # pdf.file.close()

    print(Acc_no)
    print(Bill_month)
    print(Bill_date)
    # print('Bill_amount: '+Bill_amount_1)
    # print(Bill_amount_2)
    # print(Bill_amount_3)
    # print(Bill_amount_4)
    # print(Bill_amount_5)
    # print(Bill_amount_6)
    # print(Bill_amount_7)
    # print(Bill_amount_8)
    print(C_units)
    print(San_load)
    # print(D_load)
    # print(pf)
    print("-----------------------------------")
