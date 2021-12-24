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
            <!-- Map akan tampil disini -->
        </div>

        <script>
            var mymap = L.map('map').setView([-7.4302745, 109.1994039], 10);
            var geojsonLayer = new L.GeoJSON.AJAX("peta_kec_indo.geojson",{filter:filter_jawa_tengah, onEachFeature:showKecamatanPopUp});

            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                maxZoom: 18,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'pk.eyJ1IjoieW9nYWl3IiwiYSI6ImNrdzRleXRyYzBlcjcyeWxqbmZ1OXU2MDAifQ.k_15Xu10uLIhW9C_Ila4ig'
            }).addTo(mymap);

            function filter_jawa_tengah(feature) {
                if(feature.properties.kode_prop == '33') return true;
            }

            function showKecamatanPopUp(feature, layer) {
                if(feature.properties && feature.properties.Kecamatan) {
                    layer.bindPopup('Nama Kecamatan : ' + feature.properties.Kecamatan);
                }
            }

            geojsonLayer.addTo(mymap);

        </script>
        
    </body>
</html>