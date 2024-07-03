<?php
 session_start();
 require_once 'dbh.class.php';
class loginUser extends Dbh {

    protected function selectlogUser($email, $password, $set_remember){
        $conn = $this->connect();
        $sql = 'SELECT * FROM user WHERE Email = ?';
       
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc(); 
      
      
    
    
        // User with provided email found, verify password
        $hashedPassword = $user['Password'];
       

        
        if (password_verify($password, $hashedPassword)) {
            // echo 'login success';
            //  login was successfull.. proceed with setting cookies and sessions and redirecting
            
         
            
            if(!empty($_POST['remember'])){
                

                // set session
                $_SESSION['Email'] = $email;
                $role= $user['Role'];
                $_SESSION['Role']=$role;
                
                setcookie('user_id', md5($user['id']),time()+3600);
            }
         
            if(empty($_POST['remember'])){

                //set temporary user email session
                $_SESSION['Email']=$email;
            }


            // // redirect logged in user to homepage
             header('Location:home.php');
        } else {
            echo "Invalid password";
            // header('Location:login.php?error=Wrong credentials');
        }
        
    
    // No user with provided email found

        
   
    }
    }
  
