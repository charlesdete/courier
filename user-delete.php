<?php
session_start();
if(!isset($_SESSION['Email'])){
    header ('location:login.php'); 
}

$servername = "localhost";
$dbname = "courier";
$dbusername = "charlie";
$dbpassword = "root123@";
 
$conn =new mysqli($servername,$dbusername,$dbpassword,$dbname);

//check connection
if(!$conn){
    die("connection failed:" .mysqli_connect_error());
}


if(isset($_GET['id'])){
 
    $id=$_GET['id'];
    
    $sql="DELETE FROM user WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
      } else {
        echo "Error deleted record: " . mysqli_error($conn);
      }
      
      mysqli_close($conn);
    
      
    
      header('Location:users.php');

}

?>