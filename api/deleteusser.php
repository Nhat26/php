<?php
    include_once '..\connection.php';
  
    $id = $_POST['id'];

    $cursor = $Usser->deleteOne(["id"=>$id]);
       
    echo "Delete Success";
   
?>