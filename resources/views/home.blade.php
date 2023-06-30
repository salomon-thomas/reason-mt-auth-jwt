<!DOCTYPE html>
<html>
<head>
    <title>Weather Forecast</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            text-align: center;
        }

        .weather-icon {
            display: block;
            margin: 20px auto;
            width: 100px;
        }

        .weather-info {
            text-align: center;
        }

        .weather-info p {
            margin: 10px 0;
        }

        .weather-info .label {
            font-weight: bold;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Weather Forecast for {{ $weather['location']['name'] }}, {{ $weather['location']['country'] }}</h1>
        <p class="location">Region: {{ $weather['location']['region'] }}</p>
        <p class="local-time">Local Time: {{ $weather['location']['localtime'] }}</p>

        <h2>Current Weather</h2>
        <div class="weather-info">
            <p class="last-updated">Last Updated: {{ $weather['current']['last_updated'] }}</p>
            <p class="temperature">Temperature: {{ $weather['current']['temp_c'] }}°C / {{ $weather['current']['temp_f'] }}°F</p>
            <p class="condition">Condition: {{ $weather['current']['condition']['text'] }}</p>
            <img class="weather-icon" src="{{ $weather['current']['condition']['icon'] }}" alt="Weather Icon">
            <p class="wind">Wind: {{ $weather['current']['wind_kph'] }} km/h</p>
            <p class="pressure">Pressure: {{ $weather['current']['pressure_mb'] }} mb</p>
            <p class="precipitation">Precipitation: {{ $weather['current']['precip_mm'] }} mm</p>
            <p class="humidity">Humidity: {{ $weather['current']['humidity'] }}%</p>
            <p class="cloud">Cloud Coverage: {{ $weather['current']['cloud'] }}%</p>
            <p class="feels-like">Feels Like: {{ $weather['current']['feelslike_c'] }}°C / {{ $weather['current']['feelslike_f'] }}°F</p>
            <p class="visibility">Visibility: {{ $weather['current']['vis_km'] }} km / {{ $weather['current']['vis_miles'] }} miles</p>
            <p class="uv">UV Index: {{ $weather['current']['uv'] }}</p>
            <p class="gust">Gust Speed: {{ $weather['current']['gust_kph'] }} km/h</p>
        </div>
    </div>

    <div class="footer">
        <p>Weather information provided by Weather API</p>
    </div>
</body>
</html>
