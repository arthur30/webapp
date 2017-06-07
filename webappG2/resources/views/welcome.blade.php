<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GoLocal</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <style>
        body, h1, h2, h3, h4, h5, h6 {
            font-family: "Raleway", Arial, Helvetica, sans-serif
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .links > a {
            color: #fff;
            padding: 0 25px;
            font-size: 16px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
<!-- Navigation Bar -->
<div class="w3-bar w3-white w3-border-bottom w3-xlarge">
    <a href="#" class="w3-bar-item w3-button w3-text-red w3-hover-grey"><b><i class="fa fa-map-marker w3-margin-right"></i>GoLocal</b></a>
    @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ url('/register') }}" class="w3-bar-item w3-button w3-right w3-hover-grey w3-text-grey">Register</a>
                <a href="{{ url('/login') }}" class="w3-bar-item w3-button w3-right w3-hover-grey w3-text-grey">Login</a>
                <a href="{{ url('/about') }}" class="w3-bar-item w3-button w3-right w3-hover-grey w3-text-grey">About</a>
            @endif
        </div>
    @endif
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-hide-small" style="max-width:1500px">
    <img class="w3-image" src="/uploads/backgrounds/Beverly.jpg" alt="LasVegas" style="background-size: cover">
    <div class="w3-display-middle" style="width:65%">
        <div class="w3-bar w3-black">
            <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Location');"><i class="fa fa-map-marker w3-margin-right"></i>Location</button>
            <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Flight');"><i class="fa fa-plane w3-margin-right"></i>Flight</button>
            <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Hotel');"><i class="fa fa-bed w3-margin-right"></i>Hotel</button>
        </div>

        <!-- Tabs -->
        <div id="Location" class="w3-container w3-white w3-padding-16 myLink">
            <h3>Visit a city with the help of a local</h3>
            <div class="w3-row-padding" style="margin:0 -16px;">
                <div class="w3-quarter">
                    <label>Who</label>
                    <input class="w3-input w3-border" type="text">
                </div>

                <div class="w3-quarter">
                    <label>Where</label>
                    <input class="w3-input w3-border" type="text" placeholder="City to visit">
                </div>

                <div class="w3-quarter">
                    <label>When</label>
                    <input class="w3-input w3-border" type="text">
                </div>

                <div class="w3-quarter">
                    <label>Preference</label>
                    <input class="w3-input w3-border" type="text">
                </div>
            </div>
            <p><button class="w3-button w3-dark-grey">Search</button></p>
        </div>

        <div id="Flight" class="w3-container w3-white w3-padding-16 myLink">
            <h3>Travel the world with us</h3>
            <p> Want a fast booking for you flight? </p>
            <p><button class="w3-button w3-dark-grey">Search and find dates</button></p>
        </div>

        <div id="Hotel" class="w3-container w3-white w3-padding-16 myLink">
            <h3>Find the best hotels</h3>
            <p>Book a hotel with us and get the best fares and promotions.</p>
            <p><button class="w3-button w3-dark-grey">Search Hotels</button></p>
        </div>
    </div>
</header>

<!-- Scripts -->
<script src="{{ asset('js/openLink.js') }}"></script>

</body>
</html>

