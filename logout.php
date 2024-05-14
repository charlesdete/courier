<?php

session_start();
session_unset();
session_destroy();

//Going back to the front page

//Should handle the logout logic
$email=$_SESSION['Email'];
 if(empty($_SESSION['Email'])){
    header('location:index.php');
    exit();
}

// Clear the session and destroy it
session_unset();
session_destroy();


 if(empty($_SESSION['Email ']))
 {
    
  setcookie('user_id', md5($result['id']),time()-3600);
  
 }
 header('Location:index.php');  





?>