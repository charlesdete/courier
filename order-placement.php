<?php
include 'header.php';

if(!isset($_SESSION['Email'])){
    header ('location:login.php'); 
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Placement</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
    <div class="card2">
    <form action="<?php echo
    htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
         <div class="card-header">
      <h2>Place Your Order!</h2>
    </div>
    <div class="form-group ">
    <div class="row g-3">
  <div class="col">
    <input type="text" class="form-control" name="sender_name" placeholder="Sender`s Name" aria-label="Sender`s Name">
  </div>
  <div class="col">
    <input type="text" class="form-control" name="sender_address" placeholder="Sender`s Address" aria-label="Sender`s Address">
  </div>
</div>
<br>
<div class="row g-3">
<div class="col">
    <input type="text" class="form-control" name="recipient_name" placeholder="Recipient`s Name" aria-label="Recipient`s Name">
  </div>
  <div class="col">
    <input type="text" class="form-control" name="recipient_address" placeholder="Recipient`s Address" aria-label="Recipient`s Address">
  </div>
</div>
<br>

<div class="col-12">
    
    <input type="text" class="form-control" name="package_weight" id="inputAddress" placeholder="Package Weight">
  </div>
  <br>
        <button type="submit" name="orderbtn"  class="button">Order
               </button>
    </div>
    </form>
    </div>
</body>
</html>


<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){

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

//

  
// Retrieve form data
$sender_name = $_POST['sender_name'];
$sender_address = $_POST['sender_address'];
$recipient_name = $_POST['recipient_name'];
$recipient_address = $_POST['recipient_address'];
$package_weight = $_POST['package_weight'];

// Generate unique tracking ID
$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$max = strlen($characters) - 1;
$tracking_id = '';
$tracking_id_length = 10;


// Function to check if tracking ID is unique
function isTrackingIDUnique($tracking_id, $conn) {
    $query = "SELECT COUNT(*) as count FROM orders WHERE tracking_id = '$tracking_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    return $row['count'] == 0;
}
// Loop until a unique tracking ID is generated
do {
    $tracking_id = '';
    for ($i = 0; $i < $tracking_id_length; $i++) {
        $tracking_id .= $characters[mt_rand(0, $max)];
    }
} while (!isTrackingIDUnique($tracking_id, $conn));

// Insert order into database
$query = "INSERT INTO orders (sender_name, sender_address, recipient_name, recipient_address, package_weight, tracking_id)
          VALUES ('$sender_name', '$sender_address', '$recipient_name', '$recipient_address', '$package_weight', '$tracking_id')";

if (mysqli_query($conn, $query)) {
    echo "Order placed successfully. Tracking ID: $tracking_id";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);

}

?>