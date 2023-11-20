from selenium import webdriver
from chromedriver_py import binary_path


svc = webdriver.ChromeService(executable_path=binary_path)
driver = webdriver.Chrome(service=svc)

# deprecated but works in older selenium versions
# driver = webdriver.Chrome(executable_path=binary_path)




#driver = webdriver.Chrome()

# Open a website
driver.get("https://www.google.com")


# Perform other interactions as needed

# Close the WebDriver when you're done

