<?php
    include_once 'connection.php';

    $id = $_GET['id'];
    print_r($id);
  
    $cursor1 = $HoaDon->find();
    $cursor2 =  $Product->find();
    // $cursor =  $HoaDon->find(["idnguoiban"=>$_SESSION["idnguoimua"]]); 
    // $listSP = $cursor1['ListSP'];
    // print_r($listSP);
    $students = array();

    foreach ($cursor1 as $document){
    //     // $students=$document['ListSP'];
    if($document['id']==$id){
        // print_r($document['diachi']);
        $students=$document['ListSP'];
    }
    // echo "<script>console.log('fdsf');</script>";
       
    }


    foreach ($cursor2 as $document){
        foreach ($students as $document1) {
            // echo $my_array[$i] . " ";
            if($document['id']==$document1['id']){
                // echo "Số lượng phần tử có id khác nhau trong mảng là:";
                $post_data1 = array();
                $post_data1['id'] = $document1['id'];
            
                $post_data1['soluong'] = (int)$document['soluong']+ (int)$document1['soluong'];
         
                $result = $Product->updateOne(['id'=>$post_data1['id']],['$set'=>$post_data1]);
                $post_data1 = array();
                $_POST = array();
            
            }
        }
    }

    $post_data = array();
      
    $post_data['TThoanthanh'] = "Đơn bom"; 
 
   

    $result =  $HoaDon->updateOne(['id'=>$id],['$set'=>$post_data]);
    $post_data = array();
    $_POST = array();



    header("location: http://localhost:3000/HoaDon.php"); //reroute to home page
?>