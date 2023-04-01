<?php
    require 'vendor/autoload.php';

    $client = new MongoDB\Client("mongodb://localhost:27017");
    $db = $client->admin;
    $Usser=$db->usser;
    $Account=$db->Account;
    $Product=$db->Products;
    $HoaDon=$db->HoaDon;
    $Accountaddmin=$db->Accountaddmin;
  //   $b=$colection->find();
  //   foreach($b as $c){
  //       print_r($c);
  //   }
  // echo"thanhcong";

?>