<?php
 require_once 'register.class.php';
class registerContr extends registerUser {
    private $name;
    private $email;
    private $phone;
    private $password;
    private $role;

    public function __construct($name, $email, $phone, $password, $role){
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = $password;
        $this->role = $role;
  
    }

    public function  registerUser(){
      $this->addregisterUser($this->name,$this->email,$this->phone,$this->password,$this->role);
     
      echo $this->email .'has succesfully created an account';
  }

   

}
