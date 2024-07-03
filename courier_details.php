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


    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User details</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
 <div class="container"> 
 
<h5>Courier Detail List</h5>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Vehicle</th>
      <th scope="col">Colour</th>
      <th scope="col">Number Plate</th>
    </tr>
  </thead>
  <tbody>



  <?php
$sql="SELECT *FROM courier_details";
$result=mysqli_query($conn,$sql);
if($result){
    while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $name =$row['Name'];
        $email =$row['Email'];
        $phone = $row['Phone'];
        $vehicle = $row['Vehicle_type'];
        $vehicle_colour = $row['Vehicle_colour'];
        $number_plate = $row['Number_plate'];

        echo'<tr>
        <th scope="row">'.$id.'</th>
        <td>'.$name.'</td>
        <td>'.$email.'</td>
         <td>'.$phone.'</td>
         <td>'.$vehicle.'</td>
         <td>'.$vehicle_colour.'</td>
         <td>'.$number_plate.'</td>
        
       </tr>';
    }
}


  ?>
 
  </tbody>
</table>

 </div>
 </br></br></br>
</body>

</html>
