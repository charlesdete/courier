<?php
require_once 'fetch-count.class.php';
class fetch_contr extends fetch_count{

    public function show_fetch(){
     $results = $this->fetch_orders();
     echo $results;
    }
}




