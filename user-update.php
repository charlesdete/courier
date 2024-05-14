<?php
session_start();
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

if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM user WHERE id=$id";
    $result = mysqli_query($conn,$query);
    $user = mysqli_fetch_assoc($result);
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width", intial-scale="1.0">
        <title>Courier</title>
        <link rel="stylesheet"  href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <script src="script.js" defer></script>
   
    </head>
    <body>
    <div class="card2">
<div class="card-header">
        <h2>Update User
        <span class="error"><?php  $nameErr; ?></span>
        <span class="error"><?php  $emailErr; ?></span>
        </h2>
    <form action=" <?php echo
    htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
         <?php if(isset($_GET['error'])){?>
            <p class="error"><?php echo $_GET ['error'];?></p> 
       <?php  } ?>  
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <input type="text" name="Name" placeholder="Name" value="<?= $user['Name'] ?>"  class="input-style">
          
        
        <input type="email" name="Email"  placeholder="Email" value="<?= $user['Email'] ?>" class="input-style">
        <span class="error"><?php  $emailErr; ?></span>

        <button  type="submit" name="update-user"  class="button">Update User
        
        </button>
    </body>
</html>

<?php


if(isset($_POST['update-user'])){

  //define variables
    $id = $_POST['id'];
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    
  $sql = "UPDATE user SET Name='$name', Email='$email' WHERE id=$id";
  
  if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
  
  mysqli_close($conn);

  

  header('Location:users.php');
  exit();

}

?>