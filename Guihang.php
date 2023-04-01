<?php
    include_once 'connection.php';

    $id = $_GET['id'];
    print_r($id);
    $post_data = array();
      
    $post_data['TTguihang'] = "Đơn hàng đang giao"; 
    $post_data['TTdonhang'] = "Đã gửi hàng cho khách";
   

    $result =  $HoaDon->updateOne(['id'=>$id],['$set'=>$post_data]);
    $post_data = array();
    $_POST = array();
   



    header("location: http://localhost:3000/HoaDon.php"); //reroute to home page
?>