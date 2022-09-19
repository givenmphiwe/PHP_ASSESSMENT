function renderWeather(weather) {
    console.log(weather);

    var resultsContainer = document.querySelector("#weather-result");
    var city = document.createElement("h2");
    city.textContent = weather.name;
    resultsContainer.append(city);

    //humidity, wind, description
    var temp = document.createElement("p");
    temp.textContent = "Temp: " + weather.main.temp + " F";
    resultsContainer.append(temp);

    var humidity = document.createElement("p");
    humidity.textContent = "humidity: " + weather.main.humidity + " %";
    resultsContainer.append(humidity);

    var wind = document.createElement("p");
    wind.textContent = "Wind: " + weather.wind.speed + " mph, " + weather.wind.deg + "";
    resultsContainer.append(wind);

    details.append("")

}
//Function to fetch weather
function fetchWeather(query){
    //add your city name {city name} frm openweather
    //Api key {API KEY} frm openweather
    var url = "https://api.openweathermap.org/data/2.5/weather?q={city name}&appid={API key}";

    fetch(url)
    .then((response) => response.json())
    .then((data) => console.log(data))
}
fetchWeather();