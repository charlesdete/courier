<?php
include 'header.php';
?>

<!DOCTYPE html>
<html>
    <head> 
        <title>SIGN IN  HERE! </title>
        <link rel="stylesheet" href="style.css">
    </head>
<body>
 

<?php



if(isset($_POST['loginbtn'])){

   
include 'dbh.class.php';



    // clean the data/ remove special characters
    // include 'functions.php';


    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // declare the post variables from form input
    $email=validate($_POST['Email']);
    $password=validate($_POST['Password']);

    

    if (empty($_POST['Email'])) {
        echo "Enter your email address";
        
      } else{
        $email =validate($_POST['Email']);
     if( !filter_var($email, FILTER_VALIDATE_EMAIL)){ ;
        echo "Invalid email format";
    }
      }
    
      if (empty($_POST['Password'])) {
        echo "password is required";
        $error=1;
      } else {
        $password =validate($_POST['Password']);
        if (strlen($password) > 5 || strlen($password) < 12) {
                   $passwordErr = "Password should be between 5 and 12 characters long";
               }
           
               // Check if the password contains at least one alphabet character
               else if (!preg_match("/[a-zA-Z]/", $password)) {
                $passwordErr = "Password must contain at least one alphabet character";
            }
           
                // Check if the password contains at least one numeric character
               else if (!preg_match("/[0-9]/", $password)) {
                $passwordErr = "Password must contain at least one numeric character";
            }
               //        // Check if the password contains at least one symbol character
              else if (!preg_match("/[!@#$%^&*()\-_=+{};:,<.>]/", $password)) {
                $passwordErr = "Password must contain at least one symbol character";
                } 
            }

    $sql="SELECT * FROM user WHERE Email='$email'";
    $query=mysqli_query($conn,$sql);
    $result=mysqli_fetch_assoc($query);
            
            
    if ($result['Role'] == 0 ||$result['Role'] == 1 ) {
                // User with provided email found, verify password
                $hashedPassword = $result['Password'];
               
                if (password_verify($password, $hashedPassword)) {
                    // echo 'login success';
                    //  login was successfull.. proceed with setting cookies and sessions and redirecting
                    
                    
                    
                    if(!empty($_POST['remember'])){
                        $set_remember = $_POST['remember'];
                        
                        // set session
                        $_SESSION['Email'] = $email;
                        $role= $result['Role'];
                        $_SESSION['Role']=$role;
                        

                        //set cookie that will be used to auto login a user.
                        
                        setcookie('user_id', md5($result['id']),time()+3600);
                    }
                 
                    if(empty($_POST['remember'])){

                        //set temporary user email session
                        $_SESSION['Email']=$email;
                    }


                    // redirect logged in user to homepage
                     header('Location:home.php');
                } else {
                    echo "Invalid password";
                    // header('Location:login.php?error=Wrong credentials');
                }
                
            } else {
            
                header('Location:login.php?error=Role is invalid');
            }
            // No user with provided email found
        
}







?>