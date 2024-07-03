<?php
include 'header.php';
?>

<!DOCTYPE html>
<html>
    <head> 
        <title>SIGN UP HERE! </title>
        <link rel="stylesheet" href="style.css">
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
<body>
 
        
 <div class="registration">
 <form action=" <?php echo
    htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
      <div class="card-header">
      <h2>Sign up here!</h2>
    </div>
         
         <div class="form-group ">
         <div class="row">
  <div class="col">
    <input type="text" class="form-control" name="Name" placeholder="Name" aria-label="First name">
  </div>
  
  <div class="col">
    <input type="text" class="form-control" name="Email" placeholder="Email" aria-label="Last name">
  </div>
</div>
<br/>
<div class="col-12">
    
    <input type="phone" class="form-control" id="phone" name="Phone" placeholder="Phone Number">
  </div>
  <br/>
  <div class="col-12">
    
    <input type="password" class="form-control" id="password" name="Password" placeholder="Password">
  </div>    <br/>          
      
  <div class="col-sm-3">
    <label class="visually-hidden" for="specificSizeSelect">Preference</label>
    <select class="form-select" name="Role" id="specificSizeSelect">
      <option selected>Role..</option>
      <option value="1">Courier</option>
      <option value="0">Customer</option>
    
    </select>
</div>
                

               <br/>
        
               </br>
            
               <button type="submit" name="registerbtn"  class="button">Register
               </button>
            
            </div>
          </form> 
         </div> 
      </div>  
    </body>
     
</html>

<?php


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
$confirm_password=validate($_POST['Password']);
$role =validate($_POST['Role']);


//requiring the inputs
if (empty($_POST["Name"])) {
  echo "Name is required";
  die();
} else {
  $name = validate($_POST["Name"]);

  if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
}
if (empty($_POST["Email"])) {
  echo "Email is required";
  die();
} else {
  $email = validate($_POST["Email"]);

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
}





if (empty($_POST["Password"])) {
  echo "Confirm password is required";
  die();
} else {
  $confirm_password = validate($_POST["Password"]);

  if (strlen($confirm_password) < 5 || strlen($confirm_password) > 12) {
      echo "Password should be between 5 and 12 characters long";
  }

  // Check if the password contains at least one alphabet character
  else if (!preg_match("/[a-zA-Z]/", $confirm_password)) {
      echo "Password must contain at least one alphabet character";
}

   // Check if the password contains at least one numeric character
  else if (!preg_match("/[0-9]/", $confirm_password)) {
      echo "Password must contain at least one numeric character";
      exit();
}
  //        // Check if the password contains at least one symbol character
 else if (!preg_match("/[!@#$%^&*()\-_=+{};:,<.>]/", $confirm_password)) {
  echo "Password must contain at least one symbol character";
  exit();
   } 
}


    

// Check if the password and confirm password match
if ($password === $confirm_password) {
  // Passwords match, you can proceed with the registration or password update
  // echo "Passwords match"; //Proceed with registration or password update.";
 } else {
  // Passwords do not match, display an error message
   //echo "Passwords do not match. Please try again.";
  // You might also redirect the user back to the registration form with an error message
}

//hash password
$hashedpassword = password_hash($password, PASSWORD_DEFAULT);


$sql="INSERT INTO user (Name,Email,Phone,Password,Role) VALUES ('$name','$email','$phone','$hashedpassword','$role')";
$query=mysqli_query($conn,$sql);


if($query > 0){

  header('location:index.php');
  die();
}


}



?>