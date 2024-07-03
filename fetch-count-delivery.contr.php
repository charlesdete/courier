 <?php
require_once 'fetch-count-delivery.class.php';

class fetch_deliveryCount extends fetch_delivery{
 public function show_delivery(){
     $results=$this->fetch_deliveries();
     echo $results;
 }
}