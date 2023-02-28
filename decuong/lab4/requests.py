import tkinter as tk 
import requests 
import time
def getWeather (canvas):
    city = textField.get() 
api="https://api.openweathermap.org/data/2.5/weather?q="+city+"&appid=4e95afb5851df21e092bff64721d2fa9" 
#Đăng ký tài khoản trang web để lấy key (https://api.openweathermap.org) 
json_data = requests.get (api).json () 
condition = json_data['weather'][0]['main'] 
temp = int(json_data['main']['temp'] - 273.15) 
min_tomp - int (json_data['main']['temp_min'] - 273.15) 
max_temp = int(json_data['main']['temp max'] - 273.15) 
pressure - json_data['main']['pressure']
humidity = json_data['main']['humidity']
wind = json_data['wind']['speed'] 
sunrise = time.strftime ('$1:$M:&S', time.gmtime (json_data['sys']['sunrise'] - 21600))
sunset = time.strftime ('$1:$M:%S', time.gmtime (json_data['sys']['sunset'] - 21600))

final_info = condition + "\n" + str(temp) + "C" 
final_data = "\n"; "Nhiệt độ thấp nhất: " + str (min_temp) + "°C" + "\n" + "Nhiệt độ cao nhất: " + str (max_temp) 
labell.config(text = final_info) 
label2.config(text = final_data)
canvas = tk.Tk() 
canvas.geometry ("600x500") 
canvas.title("Web thời tiết") 
f = ("poppins", 15, "bold") 
t = ("poppins", 35, "bold")
textField = tk.Entry (canvas, justify='center', width = 20, font = t) 
textField.pack (pady = 20) 
textField. focus() 
textField.bind('<Return>', getWeather)
labell = tk. Label (canvas, font=t) 
labell.pack() 
label2 = tk. Label (canvas, font=f) 
label2.pack() 
canvas.mainloop()
