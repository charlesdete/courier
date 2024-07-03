<?php

class fetch_courier extends Dbh {
    protected  function  fetch_couriers(){
 $conn= $this->connect();
 $sql= 'SELECT COUNT(id) AS courier_count FROM courier_details';
 $result = $conn->query($sql);
 $row = $result->fetch_assoc();
 
 return $row['courier_count'];
 
    }
 }