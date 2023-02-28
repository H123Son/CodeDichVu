function GetInfo() {
    var newName = document.getElementById("cityInput");
    var cityName = document.getElementById("cityName");
    cityName.innerHTML = "--"+newName.value+"--";
    fetch('https://api.openweathermap.org/data/2.5/forecast?q='+newName.value +'&appid=4e95afb5851df21e092bff64721d2fa9') .then(response => response.json())
.then(data => {
//Tạo giá trị nhở nhất và lớn nhất trong mỗi ngày
for(i = 0; i<7; i++){
document.getElementById("day" + (i+1) + "Min").innerHTML = "Min:" + Number(data.list[i].main.temp_min - 273.15).toFixed(1)+ "°";

//Number(1.3450001).toFixed(2); // 1.35
}
for(i = 0; i<7; i++){
document.getElementById("day" + (i+1) + "Max").innerHTML = "Max:" + Number(data.list[i].main.temp_max - 273.15).toFixed(2) + "°";

}
//------------------------------------------------------------
//Tạo cac biểu tượng Icon
for(i = 0; i<7; i++){
document.getElementById("img" + (i+1)).src =
"http://openweathermap.org/img/wn/"+
data.list[i].weather[0].icon
+".png";
}
//------------------------------------------------------------
console.log(data)
})
.catch(err => alert("Lỗi kết nối mạng internet!"))
}
function DefaultScreen(){
document.getElementById("cityInput").defaultValue = "Hanoi";
GetInfo();
}
//Hiển thị lên màn hình các ngày trong tuần
var d = new Date();
var weekday = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday",
"Saturday","Saturday","Sunday"];
function CheckDay(day){
if(day + d.getDay() > 6){
return day + d.getDay() - 7;
}
else{
return day + d.getDay();
}
}
for(i = 0; i<7; i++){
document.getElementById("day" + (i+1)).innerHTML =
weekday[CheckDay(i)];
}