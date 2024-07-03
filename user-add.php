<?php
include 'header.php';

if(!isset($_SESSION['Email'])){
    header ('location:index.php'); 
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width", intial-scale="1.0">
        <title>Tickets</title>
        <link rel="stylesheet"  href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <script src="script.js" defer></script>
   
    </head>
    <body>
    <div class="card2">
<div class="card-header">
        <h2>Add User
        <span class="error"><?php  $nameErr; ?></span>
        <span class="error"><?php  $emailErr; ?></span>
        </h2>
    <form action=" <?php echo
    htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
         <?php if(isset($_GET['error'])){?>
            <p class="error"><?php echo $_GET ['error'];?></p> 
       <?php  } ?>  
            
        <input type="text" name="Name" placeholder="Name" class="input-style">
          
        
        <input type="email" name="Email"  placeholder="Email" class="input-style">
        <span class="error"><?php  $emailErr; ?></span>

        <button  type="submit" name="add-user"  class="button">Add User
        
        </button>
    </body>
</html>

<?php
$servername = "localhost";
$dbname = "courier";
$dbusername = "charlie";
$dbpassword = "root123@";
 
$conn =new mysqli($servername,$dbusername,$dbpassword,$dbname);

//check connection
if(!$conn){
    die("connection failed:" .mysqli_connect_error());
}

if(isset($_POST['add-user'])){


//define varibles
    $name= $_POST['Name'];
    $email= $_POST['Email'];
    

    $sql ="SELECT * FROM user";
    $query = mysqli_query($conn,$sql);

//include necessary files
include 'dbh.class.php';
include 'user-operation.class.php';
include 'user-add.classes.php';
 
    //create an object 
    $adduser = new addusercontr($name, $email);
    $adduser->adduser();

    $sql ="SELECT * FROM user";
    $query1 = mysqli_query($conn,$sql);
    
    if($query1 > $query ){
        echo 'New user added successfully';
    }else{
        echo 'Failed to add new user!';
    }
//redirect to the next page
header ('Location:users.php');
  
    exit();


}


?>