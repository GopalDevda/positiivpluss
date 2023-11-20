import fastapi
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.options import Options
import PyPDF2
import re
import time
from fastapi import FastAPI
import os

profile = {
    'download.prompt_for_download': False,
    #  'download.default_directory': './view-bill.pdf',
     'download.default_directory': '/path/to/download/the/pdf',
    'download.directory_upgrade': True,
    'plugins.always_open_pdf_externally': True,
}
 
app = FastAPI()
options = webdriver.ChromeOptions() 
options.add_experimental_option('prefs', profile)

@app.get("/getUnits")
def getunits(ID,password):
    driver=webdriver.Chrome (ChromeDriverManager ().install(), options=options)
    url='https://www.dhbvn.org.in/web/portal/view-bill'
    #accountNo =input("Enter your Account No : ")
    #password=input("Enter your Password  : ")
    accountNo = ID
    password = password

    driver.get(url)
    driver.find_element(by=By.XPATH, value='//*[@id="accountNo"]').send_keys (accountNo)
    driver.find_element(by=By.XPATH, value='//*[@id="password"]').send_keys (password)
    driver.find_element(by=By.XPATH, value='//*[@id="submit"]').click()


    #driver.find_element(by=By.XPATH, value='//*[@id="viewBillForm"]/table[2]/tbody/tr[2]/td[5]/a/img').click()--for last bill
    #for latest bill
    driver.find_element(by=By.XPATH, value='//*[@id="viewBillForm"]/table[2]/tbody/tr[2]/td[5]/a/img').click()


    
    driver.switch_to.window(driver.window_handles [1])
    pdf_path = "public_html/user.positiivplus.io/python/DHBVN/view-bill.pdf"
    time.sleep(10)
    driver.quit()
    import glob
    pdf = glob.glob('*.pdf')
    print(pdf)
    pdffile = open(pdf_path,'rb')
    pdf_reader = PyPDF2.PdfFileReader(pdffile)
    view = pdf_reader.getPage(0)
    data =view.extract_text()
    pattern = re.compile(r'[A-Za-z]{3}[-]\d\d\d\d\s[0-9]{3,4}[.]?\d?')
    match = pattern.findall(data)
    print (match)
    pdffile.close()
    os.remove(pdf_path)

    return match
    os.remove('public_html/user.positiivplus.io/python/DHBVN/view-bill.pdf')