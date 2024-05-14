<?php
include 'header.php';


if(!isset($_SESSION['Email'])){
    header ('location:login.php'); 
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


    $sql = "SELECT * FROM orders";
    $query = mysqli_query($conn,$sql);
    $result = mysqli_fetch_assoc($query);
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
      <h2> List of Courier Orders</h2>
    </div>

  <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Sender</th>
      <th scope="col">Recipient</th>
      <th scope="col">Order Date</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td><?php echo $result['sender_name']; ?></td>
      <td><?php echo $result['recipient_name']; ?></td>
      <td><?php echo $result['order_date']; ?></td>
    </tr>
   
  </tbody>
</table>


  </body>
</html>