<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}



$name=validate($_POST['Name']);
$email=validate($_POST['Email']);
$phone =validate($_POST['Phone']);
$password=validate($_POST['Password']);
$role =validate($_POST['Role']);

include 'dbh.class.php';
include 'register.class.php';
include 'register.contr.class.php';

$register= new registerContr($name,$email,$phone,$password,$role);
$register->registerUser();

}
           