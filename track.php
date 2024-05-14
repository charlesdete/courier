<?php
include 'header.php';

?>

<!DOCTYPE html>
<html>
<head>
    <title>Courier Tracking</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="track">
    <div class="card2">
    <form action="<?php echo
    htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
 <div class="card-header">
      <h2>Track delivery here!</h2>
    </div>
    <div class="form-group ">
        Tracking ID: <input type="int" name="tracking_id"  class="input-style"required>
        <button type="submit" name="track" class="button" >Track</button>
    </div>
    </form>
    </div>
    
    <div class="track-image">
    <img src="images/82.jpg">

    </div>

    </div>
</br></br></br>
   
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
