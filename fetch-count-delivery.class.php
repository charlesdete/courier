<?php
require_once 'dbh.class.php';

class fetch_delivery extends Dbh {
    protected  function  fetch_deliveries(){
 $conn= $this->connect();
 $sql= 'SELECT COUNT(delivery_id) AS delivery_count FROM deliveries';
 $result = $conn->query($sql);
 $row = $result->fetch_assoc();
 
 return $row['delivery_count'];
 
    }
 }