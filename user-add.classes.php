<?php
class addusercontr extends adduser{

private $name;
private $email;

public function __construct($name, $email){

    $this->name = $name;
    $this->email = $email;

}

public function adduser(){
    if($this->emptyInput() == false){
        echo "empty input";
        header('location:user-add.php?error=emptyinput');
        exit();
    }
    $this->setNewUser($this->name, $this->email);
}

private function emptyInput(){
$result =true;
if(empty($this->name) || empty($this->email)){
    $result=false;
}
return $result;
}

}

?>