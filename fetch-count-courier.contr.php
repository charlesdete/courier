<?php

require_once 'fetch-count-courier.class.php';

class fetch_courierCount extends fetch_courier{
 public function show_courier(){
     $results=$this->fetch_couriers();
     echo $results;
 }
}