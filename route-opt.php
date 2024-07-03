<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Display navigation directions</title>
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
<link href="https://api.mapbox.com/mapbox-gl-js/v3.4.0/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v3.4.0/mapbox-gl.js"></script>
<style>
body { margin: 20px; padding:20px; }
#map { position: absolute; top:20px; bottom:20px; width: 90%; border-color: 1px black;
        text-align: center; padding: 20px; }
</style>
</head>
<body>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.3.1/mapbox-gl-directions.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.3.1/mapbox-gl-directions.css" type="text/css">
<div id="map"></div>

<script>
	mapboxgl.accessToken = 'pk.eyJ1IjoiYnJvbm55amFtZXMiLCJhIjoiY2x4eXFtZ3FpMDJybzJpcXVxbTllc3V5NSJ9.XmAzlD5mHhdGHDvJjClD2A';
    const map = new mapboxgl.Map({
        container: 'map',
        // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
        style: 'mapbox://styles/mapbox/streets-v12',
        center: [36.817223, -1.286389],
        zoom: 13
    });

    map.addControl(
        new MapboxDirections({
            accessToken: mapboxgl.accessToken
        }),
        'top-left'
    );
</script>

</body>
</html>