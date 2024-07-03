<!-- <!DOCTYPE html>
<html>
<head>
    <title>Geolocation from Place Name</title>
    <script>
        function getCoordinates() {
            const place = document.getElementById("place").value;
            const apiKey = 'pk.eyJ1IjoiYnJvbm55amFtZXMiLCJhIjoiY2x4eXFtZ3FpMDJybzJpcXVxbTllc3V5NSJ9.XmAzlD5mHhdGHDvJjClD2A'; // Replace with your Google Maps API key
            const url = `https://api.mapbox.com/search/geocode/v6/forward?q=korogocho&proximity=-73.990593%2C40.740121&access_token=pk.eyJ1IjoiYnJvbm55amFtZXMiLCJhIjoiY2x4eXFtZ3FpMDJybzJpcXVxbTllc3V5NSJ9.XmAzlD5mHhdGHDvJjClD2A`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    if (data.status === "OK") {
                        const location = data.results[0].geometry.location;
                        document.getElementById("latitude").innerText = "Latitude: " + location.lat;
                        document.getElementById("longitude").innerText = "Longitude: " + location.lng;
                    } else {
                        document.getElementById("latitude").innerText = "Latitude: Not found";
                        document.getElementById("longitude").innerText = "Longitude: Not found";
                    }
                })
                .catch(error => {
                    console.error('Error fetching the coordinates:', error);
                    document.getElementById("latitude").innerText = "Latitude: Error";
                    document.getElementById("longitude").innerText = "Longitude: Error";
                });
        }
    </script>
</head>
<body>
    <h1>Geolocation from Place Name</h1>
    <form onsubmit="event.preventDefault(); getCoordinates();">
        <label for="place">Enter a place name:</label><br>
        <input type="text" id="place" name="place" required><br><br>
        <button type="submit">Get Coordinates</button>
    </form>

    <p id="latitude">Latitude: </p>
    <p id="longitude">Longitude: </p>
</body>
</html> -->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Add a geocoder</title>
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
<link href="https://api.mapbox.com/mapbox-gl-js/v3.4.0/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v3.4.0/mapbox-gl.js"></script>
<style>
body { margin: 0; padding: 20px; }
#map { position: absolute; top: 0; bottom: 0; width: 100%; }
</style>
</head>
<body>
<!-- Load the `mapbox-gl-geocoder` plugin. -->
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">

<div id="map"></div>

<script>
	mapboxgl.accessToken = 'pk.eyJ1IjoiYnJvbm55amFtZXMiLCJhIjoiY2x4eXFtZ3FpMDJybzJpcXVxbTllc3V5NSJ9.XmAzlD5mHhdGHDvJjClD2A';
    const map = new mapboxgl.Map({
        container: 'map',
        // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
        style: 'mapbox://styles/mapbox/streets-v12',
        center: [36.817223, -1.286389],
        zoom: 14
    });

    // Add the control to the map.
    map.addControl(
        new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl
        })
    );
</script>

</body>
</html>