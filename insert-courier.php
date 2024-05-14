<?php
include 'header.php';


if(!isset($_SESSION['Email'])){
    header ('location:login.php'); 
}
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
      <h2> Add Courier Here!</h2>
    </div>
  <div class="col-md-6">
    <label for="inputName" class="form-label">Name</label>
    <input type="Name" name="name"  class="form-control" id="inputName" required>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" id="inputEmail" required>
  </div>
  <div class="col-12">
    <label for="inputPhone" class="form-label">Phone</label>
    <input type="phone" name="phone" class="form-control" id="inputPhone" placeholder="Phone Number" required>
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Address</label>
    <input type="text" name="address" class="form-control" id="inputAddress" placeholder="Address" required>
  </div>
  <div class="col-md-4">
    <label for="inputVehicle" class="form-label">Vehicle Type</label>
    <select id="inputVehicle" name="vehicle_type" class="form-select" required>
    <option selected>Choose...</option>
    <option value="Scooter">Scooter</option>
    <option value="Motorcycle">Motorcycle</option>
    <option value="Van">Van</option>
    <option value="Truck">Truck</option>
    <option value="Bicycle">Bicycle</option>
</select>

  </div>

  <div class="col-md-4">
    <label for="inputState" class="form-label">Status</label>
    <select id="inputState" name="status" class="form-select" required>
      <option selected>Choose...</option>
      <option value="Active">Active</option>
      <option value="Inactive">Inactive</option>

    </select>
  </div>
 
 
  <div class="col-12">
    <button type="submit" class="button">Choose Courier</button>
  </div>
</form>
</div>


  </body>
</html>

<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST'){



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


$name =$_POST['name'];
$email= $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$vehicle = $_POST['vehicle_type'];
$status = $_POST['status'];

$sql = "INSERT INTO couriers (name, email, phone, address, vehicle_type, status) 
VALUES ('$name', '$email', '$phone', '$address', '$vehicle', '$status')";

$query =mysqli_query($conn,$sql);

if($query > 0){

    //    header('location:courier.php');
      die();
    }
    


}