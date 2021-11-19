<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
        <script src="leaflet.ajax.min.js"></script>

        <style>
            html, body {
                height: 100%;
                margin: 0;
            }

            #map {
                height: 100%;
            }
        </style>
    </head>

    <body>
        <div id="map">
            <!-- Map disini -->
        </div>
    </body>

    <script>
        var mymap = L.map('map').setView([-6.523598784711379, 107.38833670906958], 10);
        var geojsonLayer = new L.GeoJSON.AJAX("purwakarta.geojson",{style:mystyle});

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            maxZoom: 18,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1IjoieW9nYWl3IiwiYSI6ImNrdzRleXRyYzBlcjcyeWxqbmZ1OXU2MDAifQ.k_15Xu10uLIhW9C_Ila4ig'
        }).addTo(mymap);

        geojsonLayer.addTo(mymap);

        function getColor(d) {
            return d == 'Plered' ? '#800026':'#FFEDA0';
        };

        function mystyle(feature) {
            return {
                fillColor: getColor(feature.properties.WADMKC),
                weight: 2,
                opacity: 1,
                color: 'white',
                dashArray: '3',
                fillOpacity: 0.7
            };
        };
    </script>

</html>