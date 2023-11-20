from PIL import Image
import pytesseract

img = Image.open('captcha.png')
img.load()
text = pytesseract.image_to_string(img)
print(text)
