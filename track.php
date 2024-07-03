<?php
include 'header.php';
if(!isset($_SESSION['Email'])){
    header ('location:index.php'); 
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Courier Tracking</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://api.mapbox.com/mapbox-gl-js/v3.4.0/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v3.4.0/mapbox-gl.js"></script>
<style>


</style>


</head>
<body>
    <div class="track">
    <div class="card2">
    <form action="<?php echo
           htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
       <div class="card-header">
      <h2>Track delivery here!</h2>
    </div>
    <div class="form-floating">
         <input type="varchar" name="tracking_id"  class="form-control"  id="floatingTracking"   placeholder="Tracking Id" required>
      
        </br>
        <button type="submit" name="track" class="button" >Track</button>
    </div>
    </form>
    </div>
    
    <div class="track-image">
    <img src="images/82.jpg">

    </div>

    </div>

<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.3.1/mapbox-gl-directions.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.3.1/mapbox-gl-directions.css" type="text/css">
<div class="map" id="map"></div>

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


<?php


if($_SERVER['REQUEST_METHOD'] ==='POST'){


    //database connection
$servername = "localhost";
$dbname = "courier";
$dbusername = "charlie";
$dbpassword = "root123@";


 
$conn =mysqli_connect($servername,$dbusername,$dbpassword,$dbname);

//check connection
if(!$conn){
    die("connection failed:" .mysqli_connect_error());
}


// Get tracking ID from form
$tracking_id = $_POST['tracking_id'];

// Query the database to get delivery status
$query = "SELECT * FROM deliveries WHERE tracking_id = '$tracking_id'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // Display delivery status
    $row = mysqli_fetch_assoc($result);
    

  echo "Delivery Status: " . $row['delivery_status']; 



    // You can display more information about the delivery here
} else {

     echo "No delivery found with the provided tracking ID.";
    
}

}


?>
