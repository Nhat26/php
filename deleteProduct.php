<?php
    include_once 'connection.php';

    $id = $_GET['id'];
    echo "<div class='alert alert-success'> Record deleted successfully </div>".$id ;
    $cursor = $Product->deleteOne(["id"=>$id]);

    echo "<div class='alert alert-success'> Record deleted successfully </div>";

    header("location: http://localhost:3000/Products.php"); //reroute to home page
?>