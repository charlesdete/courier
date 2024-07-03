<?php
require_once 'dbh.class.php';
class fetch_count extends Dbh {
    protected function fetch_orders(){
        $conn = $this->connect();
    $sql='SELECT COUNT(order_id) AS order_count  FROM orders';
    $result =$conn->query($sql);
   
    $row = $result->fetch_assoc();
    return $row['order_count'];
    }
}



