
const iconElement = document.querySelector(".weather-icon");
const tempElement = document.querySelector(".temperature-value p");
const descElement = document.querySelector(".temperature-description p");
const locationElement = document.querySelector(".location p");
const humidityElement = document.querySelector(".humidity p");
const windspeedElement = document.querySelector(".wind-speed");
const notificationElement = document.querySelector(".notification");


const weather = {};

// Convert from Kelvin to Celsius
weather.temperature = {
    unit : "celsius"
}

const KELVIN = 273;

// Call in API key
const key = "b89b5028278d0c67292f9cc2208094f1";

// Get user's current location
if('geolocation' in navigator){
    navigator.geolocation.getCurrentPosition(setPosition, showError);
    }else{
        notificationElement.style.display = "block";
        notificationElement.innerHTML = "<p> Browser doesn't support geolocation </p>";
    }

    function setPosition(position){
        let latitude = position.coords.latitude;
        let longitude = position.coords.longitude;

        getWeather(latitude, longitude);
    }

    function showError(error){
        notificationElement.style.display = "block";
        notificationElement.innerHTML = `<p> ${error.message}</p>`;
    }

    function getWeather(latitude, longitude){
        let api = `http://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&appid=${key}`;

        fetch(api)
        .then(function(response){
            let data = response.json();
            return data;
        })
        .then(function(data){
            weather.temperature.value = Math.floor(data.main.temp-KELVIN);
            weather.description = data.weather[0].description;
            weather.iconId = data.weather[0].icon;
            weather.city = data.name;
            weather.country = data.sys.country;
        })
        .then(function(){
            displayWeather();
        });
    }

    function displayWeather(){
        iconElement.innerHTML = `<img src ="icons/${weather.iconId}.png"/>`;
        tempElement.innerHTML = `${weather.temperature.value}°<span>C</span>`;
        descElement.innerHTML = weather.description;
        locationElement.innerHTML = `${weather.city}, ${weather.country}`;
    }