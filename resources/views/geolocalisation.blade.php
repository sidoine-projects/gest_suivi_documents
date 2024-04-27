<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.js"></script>
    <style>
        #map {
            height: 80%;
            margin-top: -3em;


            position: relative;
        }

        /* .mapbox-logo {
            display: none;
        }*/

        .mapboxgl-ctrl-logo {
            display: none !important;
        }

        /* Optional: Makes the sample page fill the window. */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

    </style>
</head>

<body>


    <div class="container">
        <h1>How to Get Current User with Laravel - ItSolutionStuff.com</h1>
        <div class="card">
            <div class="card-body">
                @if ($currentUserInfo)
                    <h4>IP: {{ $currentUserInfo->ip }}</h4>
                    <h4>Country Name: {{ $currentUserInfo->countryName }}</h4>
                    <h4>Country Code: {{ $currentUserInfo->countryCode }}</h4>
                    <h4>Region Code: {{ $currentUserInfo->regionCode }}</h4>
                    <h4>Region Name: {{ $currentUserInfo->regionName }}</h4>
                    <h4>City Name: {{ $currentUserInfo->cityName }}</h4>
                    <h4>Zip Code: {{ $currentUserInfo->zipCode }}</h4>
                    <h4>Latitude: {{ $currentUserInfo->latitude }}</h4>
                    <h4>Longitude: {{ $currentUserInfo->longitude }}</h4>
                @endif
            </div>
        </div>
    </div>

    <p>Click the button to get your coordinates.</p>

    <button onclick="getLocation()">Try It</button>
    <div class="container">
        <p id="demo">Mon Map</p>
        <p id="long">Mon Map</p>
        <p id="lag">Mon Map</p>
    </div>

    <br>
    <br>


    <script>
        var x = document.getElementById("demo");

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            x.innerHTML = "Latitude: " + position.coords.latitude +
                "<br>Longitude: " + position.coords.longitude;
        }
    </script>


    <div class="container" id="map"></div>
    <pre id="coordinates" class="coordinates"></pre>

    <script>
        // TO MAKE THE MAP APPEAR YOU MUST
        // ADD YOUR ACCESS TOKEN FROM
        // https://account.mapbox.com
        mapboxgl.accessToken = 'pk.eyJ1Ijoidmlkb2xlIiwiYSI6ImNrd2x1M3F1ZjAyNjgycXF0NTZ5ZjQ0Ym4ifQ._Fcd0M9j2ZMX42kqmwzGag';
        const map = new mapboxgl.Map({
            container: 'map', // container ID
            attributionControl: false,
            style: 'mapbox://styles/mapbox/streets-v11', // style URL
            center: [2.4281088, 6.3700992

            ], // starting position
            zoom: 10 // starting zoom
        });

        var geolocate = new mapboxgl.GeolocateControl({
            positionOptions: {
                enableHighAccuracy: true

            },

            // When active the map will receive updates to the device's location as it changes.
            trackUserLocation: true,
            // Draw an arrow next to the location dot to indicate which direction the device is heading.
            showUserHeading: true
        });

        // Add geolocate control to the map.


        map.addControl(geolocate);
        
        map.addControl(new mapboxgl.FullscreenControl());
   
        geolocate.on('geolocate', function(e) {
            var lon = e.coords.longitude;
            var lat = e.coords.latitude
            var position = [lon, lat];
            document.getElementById("long").innerHTML = lon;
            document.getElementById("lag").innerHTML = lat;
            /* map.addControl(new mapboxgl.AttributionControl({
                 customAttribution: 'Map design by me'
             }));*/

            //console.log(position);
        });

        map.addControl(new mapboxgl.NavigationControl());

        class ToggleControl {

            constructor(options) {
                this._options = Object.assign({}, this._options, options)
            }

            

            onAdd(map, cs) {
                this.map = map;
                this.container = document.createElement('div');
                this.container.className = `${this._options.className}`;

                const button = this._createButton('monitor_button')
                this.container.appendChild(button);
                return this.container;
            }
            onRemove() {
                this.container.parentNode.removeChild(this.container);
                this.map = undefined;
            }
            _createButton(className) {
                const el = window.document.createElement('button')
                el.className = className;
                el.style.color = 'blue';
                el.style.height = "40px";
                el.style.fontSize = "12px";
                el.style.cursor = "pointer";
                el.textContent = 'SE GEOLOCALISER';
                el.addEventListener('click', (e) => {
                    geolocate.trigger();
                }, false)
                return el;
            }
        }
        const toggleControl = new ToggleControl({
            className: 'mapboxgl-ctrl'
        })
        map.addControl(toggleControl, 'top-left')


    </script>


</body>

</html>
