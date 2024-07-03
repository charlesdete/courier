<?php
include 'header.php';

if(!isset($_SESSION['Email'])){
    header ('location:index.php'); 
}


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

    $sql = "SELECT * FROM couriers where status = 'Active'  ";
    $query = mysqli_query($conn,$sql);
    $result = mysqli_fetch_assoc($query);

    $sql = "SELECT * FROM orders ";
    $query = mysqli_query($conn,$sql);
    $order = mysqli_fetch_assoc($query);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

  <div class="card2">
  <form class="row g-3"  action=" <?php echo
    htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
  <div class="card-header">
      <h2> Complete Delivery Here!</h2>
    </div>
    


<div class="row">
  <div class="col">
  <input type="hidden" class="form-control" name="courier_id" value="<?php echo $result['courier_id'] ?>" placeholder="<?php  $result['courier_id'] ?>" aria-label="Name">
    <input type="text" class="form-control" name="customer_name" value="<?php $order['recipient_name'] ?>" placeholder="<?php echo $order['recipient_name'] ?>" aria-label="Name">
  </div>
  <div class="col">
    <input type="text" class="form-control" name="customer_address" value="<?php $order['recipient_address'] ?>" placeholder="<?php echo $order['recipient_address'] ?>" aria-label="Address">
  </div>
</div>
<br>

  <br>
  <p>
  <select class="form-select" name="package_status" aria-label="Default select example">
  <option value="good state" >Good state</option>
  <option value="broken" >Broken</option>
  <option value="bad state" >Bad state</option>

  </select>
  <p>
  <select class="form-select" name="delivery_status" aria-label="Default select example">
  <option value="Pending" >Pending</option>
  <option value="In Transit" >In Transit</option>
  <option value="Delivered" >Delivered</option>

  </select>

  <div class="col-12">
   
    <input type="text" class="form-control" name="tracking_id"  placeholder="<?php echo $order['tracking_id'] ?>">
  </div>
  <div class="col-12">
    <button type="submit" class="button">Choose Courier</button>
  </div>
  </form>

  </div>

  <?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

    // Assuming $conn is your database connection object
    $id = mysqli_real_escape_string($conn, $_POST['courier_id']);
    $name = mysqli_real_escape_string($conn, $_POST['customer_name']);
    $address = mysqli_real_escape_string($conn, $_POST['customer_address']);
    $package =  mysqli_real_escape_string($conn, $_POST['package_status']);
    $status = mysqli_real_escape_string($conn, $_POST['delivery_status']);
    $track = mysqli_real_escape_string($conn, $_POST['tracking_id']);

    $sql = "INSERT INTO deliveries (courier_id, customer_name, customer_address, package_status, delivery_status, tracking_id)
            VALUES ($id ,'$name','$address','$package','$status','$track')";

    $query = mysqli_query($conn,$sql);

    if ($query) {
        // Successful insertion
        // Redirect or do any other action
    } else {
        // Error handling
        echo "Error inserting data into deliveries table: " . mysqli_error($conn);
    }
    
}


?>