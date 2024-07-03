<?php
 require_once 'login.class.php';
class loginContr extends loginUser {

  private $email;
  
  private $password;

  private $set_remember;
  public function __construct($email,$password,$set_remember){

    $this->email = $email;
    $this->password = $password; 
    $this->set_remember=$set_remember;
  }
 
  public function showLoginUser(){

     $this->selectlogUser($this->email, $this->password, $this->set_remember);

    echo $this->email .'has been succesfully logged in';
     // redirect logged in user to homepage
     header('Location:home.php');
  }

}