<?php
include 'header.php';


if(!isset($_SESSION['Email'])){
    header ('location:index.php'); 
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

  
  <div class="card3">
 <form action=" <?php echo
    htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
      <div class="card-header">
      <h2>Enter Courier Details!</h2>
    </div>

    <div class="col-md-8">
   
    <input type="Name" class="form-control" name="Name" id="inputName" placeholder="Name" >
  </div></br>
  <div class="col-md-8">
  
    <input type="email" class="form-control" name="Email" id="inputEmail4" placeholder="Email">
  </div></br>
  <div class="col-md-8">
  
  <input type="phone" class="form-control" name="Phone" id="inputEmail4" placeholder="Phone">
</div></br>
  <div class="col-md-8">
   
    <input type="text" class="form-control" name="County" id="inputCity" placeholder="County">
  </div>
</br>
  <div class="row gy-2 gx-3 align-items-center">
 
  
  <div class="col-auto">
    <label class="visually-hidden" for="autoSizingSelect">Vehicle Type</label>
    <select class="form-select" name="Vehicle_type" id="autoSizingSelect">
      <option selected>Vehicle Type</option>
      <option value="bicycle">Bicyle</option>
      <option value="motorbike">Motorbike</option>
      <option value="car">Car</option>
      <option value="van">Van</option>
      <option value="truck">Truck</option>
    </select>
  </div>

  <div class="col-auto">
    <label class="visually-hidden" for="autoSizingSelect">Vehicle Colour</label>
    <select class="form-select" name="Vehicle_colour" id="autoSizingSelect">
      <option selected>Vehicle Colour</option>
      <option value="red">Red</option>
      <option value="blue">Blue</option>
      <option value="white">White</option>
      <option value="black">Black</option>
    </select>
  </div>
  <div class="col-auto">
    <label class="visually-hidden" for="autoSizingInput">Number Plate</label>
    <input type="varchar" class="form-control" name="Number_plate" id="autoSizingInput" placeholder="Number Plate">
  </div>

</div></br>

<div class="col-md-4">
    <select id="inputState" name="Status" class="form-select">
      <option selected>status</option>
      <option value="active">Active</option>
      <option value="inactive">Inactive</option>
    </select>
  </div></br>
 
  <div class="col-12">
    <button type="submit" class="button">Courier Details</button>
  </div>
 </form>
</div>


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

    $name =$_POST['Name'];
$email = $_POST['Email'];
$phone = $_POST['Phone'];
$county = $_POST['County'];
$vehicle_type = $_POST['Vehicle_type'];
$vehicle_colour =$_POST['Vehicle_colour'];
$number_plate = $_POST['Number_plate'];
$status = $_POST['Status'];



$sql = "INSERT INTO  courier_details (Name, Email, Phone, County, Vehicle_type, Vehicle_colour, Number_plate,Status)
        VALUES ('$name','$email','$phone', '$county', '$vehicle_type', '$vehicle_colour','$number_plate','$status')";

$query = mysqli_query($conn,$sql);

if($query > 0){

    header('location:courier_details.php');
    die();
  }


}