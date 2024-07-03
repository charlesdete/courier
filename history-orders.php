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


    $email = $_SESSION['Email'];  


$sql= "SELECT * FROM user where Email = '$email'";
$query= mysqli_query($conn,$sql);
$user=mysqli_fetch_assoc($query);


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

  <div class="card-header">
      <h2> History of Orders</h2>
    </div>

  <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">User Id</th>
      <th scope="col">Sender</th>
      <th scope="col">Recipient</th>
      <th scope="col">Order Date</th>
      <th scope="col">Assigned Courier</th>
    </tr>
  </thead>
  <tbody>

  <?php
$user_id=$user['id'];

$sql = "SELECT * FROM orders where user_id='$user_id' ";
$result = mysqli_query($conn,$sql);

if($result){
    while($row=mysqli_fetch_assoc($result)){
      $id=$row['order_id'];
      $user_id=$row['user_id'];
      $sender_name =$row['sender_name'];
      $recipient_name=$row['recipient_name'];
      $date =$row['order_date'];
      $courier= $row['assigned_courier'];




      echo'<tr>
      <th scope="row">'.$id.'</th>
      <td>'.$user_id.'</td>
      <td>'.$sender_name.'</td>
       <td>'.$recipient_name.'</td>
       <td>'.$date.'</td>
       <td>'.$courier.'</td>
       
     </tr>';
    }
  }
   ?>


  </body>
</html>