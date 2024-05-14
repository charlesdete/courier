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
   

$conn =new mysqli($servername,$dbusername,$dbpassword,$dbname);

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
 
<button type="submit" name="submit" class="btn btn-primary my-5"><a href="user-add.php" class= "text-light">Add user</a></button>
 

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>



  <?php
$sql="SELECT *FROM user";
$result=mysqli_query($conn,$sql);
if($result){
    while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $name =$row['Name'];
        $email =$row['Email'];
        
        echo'<tr>
        <th scope="row">'.$id.'</th>
        <td>'.$name.'</td>
        <td>'.$email.'</td>
        
        <td>
        <button class="btn btn-primary"><a href="user-update.php?id='.$id.'" class="text-light">Update</a></button>
        <button class="btn btn-danger"><a href="user-delete.php?id='.$id.'" class="text-light">Delete</a></button>
     </td>
       </tr>';
    }
}


  ?>
 
  </tbody>
</table>

 </div>

</body>
</html>