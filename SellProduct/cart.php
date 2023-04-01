<?php

session_start();

require_once ("php/CreateDb.php");
require_once ("php/component.php");

include_once '../connection.php';
error_reporting(0);
// $db = new CreateDb("Productdb", "Producttb");
$cursor =  $Product->find();
$cursor1 =  $Product->find();
$cursor2 =  $Product->find();
if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["product_id"] == $_GET['id']){
              unset($_SESSION['cart'][$key]);
              echo "<script>alert('Product has been Removed...!')</script>";
              echo "<script>window.location = 'cart.php'</script>";
          }
      }
  }
}


if (isset($_POST['thanhtoan'])){
   
    // foreach ($_SESSION['cart'] as $key => $value){
    //     if($value["product_id"] == $_GET['id']){
    //         unset($_SESSION['cart'][$key]);
    //         echo "<script>alert('Product has been Removed...!')</script>";
    //         echo "<script>window.location = 'cart.php'</script>";
    //     }
    // }


    // if(isset($_POST['myArray'])) {
    //     $myArray = $_POST['myArray'];
    //     print_r($myArray);
    // }


    // get the array object from the request
$myArray = json_decode($_POST['data']);

// do something with the array object
foreach ($myArray as $value) {
    // echo $value . "<br>";
    echo "<script>console.log('dsdsad'+$value);</script>";
}
                echo "<script>console.log('dfdffdf');</script>";
               
   
  }

  $myArrayStrings = $_POST['Products'];

// decode each string to an object and store them in an array
$myArray = array();
foreach ($myArrayStrings as $myArrayString) {
  $myArray[] = json_decode($myArrayString);
}
// $a=count($cursor);
// // display the list of objects
// print_r($a);

$uniqueIds = array();
foreach ($myArray as $item) {
    if (!in_array($item->id, $uniqueIds)) {
        $uniqueIds[] = $item->id;
    }
}
$a=count($myArray);
$b=0;
$tongtienhd=0;
$count = count($uniqueIds);
// Đây là hàm trừ sản phẩm vào data
// foreach ($cursor1 as $document){
//     for ($i = $a ; $i >= $a - $count; $i--) {
//         // echo $my_array[$i] . " ";
//         if($document['id']==$myArray[$i]->id){
//             // echo "Số lượng phần tử có id khác nhau trong mảng là:";
//             $post_data = array();
//             $post_data['id'] = $myArray[$i]->id;
        
//             $post_data['soluong'] = (int)$document['soluong']- (int)$myArray[$i]->soluong;
     
//             $result = $Product->updateOne(['id'=>$post_data['id']],['$set'=>$post_data],['upsert' => true]);
//             $b=1;
//             // $post_data = array();
//             // $_POST = array();
//             header("Refresh:0");
//         }
$students = array();
foreach ($cursor1 as $document){
for ($i = $a ; $i >= $a - $count; $i--) {
    // echo $my_array[$i] . " ";
    if($document['id']==$myArray[$i]->id){
 
        $b=1;
        $tongtienhd=$tongtienhd+((int)$myArray[$i]->soluong)*((int)$document['gia']);
 
        $student4 = array('id' => $myArray[$i]->id, 'name' => $document['name'], 'soluong' => $myArray[$i]->soluong, 'gia' => $document['gia'], 'img' => $document['img']);
        array_push($students, $student4);
    }
    // print_r("% isd là:".$myArray[$i]->id."%");
    // print_r("% sl là: ".$myArray[$i]->soluong."%");
    // echo "so luons sp: $myArray[$i]->soluong";
  }
}
if($b==1){
     date_default_timezone_set('Asia/Ho_Chi_Minh');
    foreach ($cursor2 as $document){
    for ($i = $a ; $i >= $a - $count; $i--) {
        // echo $my_array[$i] . " ";
        if($document['id']==$myArray[$i]->id){
            // echo "Số lượng phần tử có id khác nhau trong mảng là:";
            $post_data1 = array();
            $post_data1['id'] = $myArray[$i]->id;
        
            $post_data1['soluong'] = (int)$document['soluong']- (int)$myArray[$i]->soluong;
     
            $result = $Product->updateOne(['id'=>$post_data1['id']],['$set'=>$post_data1],['upsert' => true]);
            $b=1;
        
        }}}
    $post_data = array();
    $post_data['id'] = strval(time()); 
    $post_data['idnguoiban'] = $_SESSION["idnguoimua"];
    $post_data['ListSP'] = $students; 
    $post_data['ngayban'] = date("Y-m-d H:i:s", time());
    $post_data['diachi'] = $_POST['txtdiachi']; 
    $post_data['tongtienhoadon'] = $tongtienhd;
    $post_data['TTguihang'] = "Đơn hàng chưa được duyệt";
    $post_data['TTdonhang'] = "Chưa gửi hàng";
    $post_data['TThoanthanh'] = "Chưa hoàn thành";
    $HoaDon->insertOne($post_data);
    header("Refresh:0");
    unset($_SESSION['cart']);
}

// echo "Số lượng phần tử có id khác nhau trong mảng là: $count";
// print_r($myArray[0]->id);


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
  <div class="navbar-brand">
    <a href=".././SellProduct/index.php"><img src="../../../IMG/Final_logo.png"  style="height: fit-content; width: 70px;"></a>

  </div>
  <form class="form-inline my-2 my-lg-0" style="position: relative; left: 500px;">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
  <div class="dropdown" style="position: relative; left: 920px;">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="profileDropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-user"></i>
    </button>
    <div class="dropdown-menu" aria-labelledby="profileDropdownMenuButton">
      <a class="dropdown-item" href="http://localhost:3000/SellProduct/Profile.php">Profile</a>
      <a class="dropdown-item" href="http://localhost:3000/SellProduct/ChitietKhach.php">Quản lý đơn hàng</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href=".././FE/Client/login/login.php">Logout</a>
    </div>
  </div>
  <div class="cart-icon" style="position: relative; left: 800px;">
    <a href="cart.php">
      <i class="fas fa-shopping-cart"></i>
      <?php

                        if (isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                        }else{
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                        }

                        ?>
    </a>
  </div>
</nav>

<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h6>My Cart</h6>
                <hr>

                <?php

                $total = 0;
                    if (isset($_SESSION['cart'])){
                        
                        $product_id = array_column($_SESSION['cart'], 'product_id');
                        
                        foreach ($cursor as $document){
                            foreach ($product_id as $id){
                                if ($document['id'] == $id){
                                    $a=(int)$document['soluong'];
                                    cartElement($document['img'], $document['name'],$document['gia'],$document['id'],$a);
                                    $total = $total + (int)$document['gia'];
                                }
                            }
                        }
                    }else{
                        echo "<h5>Cart is Empty</h5>";
                    }

                ?>

            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h6>Hoá Đơn</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if (isset($_SESSION['cart'])){
                                $count  = count($_SESSION['cart']);
                                echo "<h6>Thành Tiền ($count items)</h6>";
                            }else{
                                echo "<h6> Thành Tiền (0 items)</h6>";
                            }
                        ?>
                        <h6>Phí vận chuyển</h6>
                        <hr>
                        <h6>Tổng tiền</h6>
                    </div>
                    <div class="col-md-6">
                        <h6 id="textt">$<?php echo $total; ?></h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6 id="text">$<?php
                            echo $total;
                            ?></h6>
                    </div>

                    <div class="container-fluid">
                        <form action="cart.php" method="post" id="myForm">
                            <input type="text"   name="txtdiachi" aria-describedby="name" placeholder="Nhập địa chỉ" style="position: absolute; bottom: 10px;width: 50%; border-radius: 5px; " />
                            <button type="button" id="myButton" style="position: relative;  bottom:10px;top:75px" class="btn btn-2 btn-sep icon-cart">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                    <button class="text-center  card-img-overlay  btn btn-primary" style="width: 25%; height:20% ; position: absolute; top:5px; left: 350px;" onclick="changeText()">
                        <p style="position: relative; bottom:10px">Làm mới</p>
                    </button>
            </div>

           
        </div>
    </div>
</div>



<script>
    let Products = [];
    var g=0;
 var iprice=document.getElementsByClassName('iprice');
 var iquantity=document.getElementsByClassName('iquantity');
 var itotal=document.getElementsByClassName('itotal');
 var iddd=document.getElementsByClassName('kkk');
var okayy=document.getElementsByClassName('okaay');
function addProducts(id, soluong) {
  // Kiểm tra xem sinh viên đã tồn tại trong mảng hay chưa bằng cách tìm kiếm theo ID
  const existingStudent = Products.find((student) => Products.id === id);

  // Nếu sinh viên đã tồn tại, in ra thông báo và không thêm vào mảng
  if (existingStudent) {
    Products[id].soluong=soluong;
  } 
 
  else {
    Products.push({ id, soluong });
    
  }
}
 function subTotal(){
    g=0;
    for(i=0;i<iprice.length;i++){
        
        itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
        addProducts(iddd[i].value,(iquantity[i].value));
        g=g + (iprice[i].value)*(iquantity[i].value);
    }
    
    console.log(g);
    okayy.innerText=g;

//     $.ajax({
//   type: "POST",
//   url: "cart.php",
//   data: {myArray: Products},
//   success: function(response) {
//     console.log(response);
//   }
// });

var xmlhttp = new XMLHttpRequest();

// specify the PHP file that will receive the data
var url = "cart.php";

// set the request method to POST
xmlhttp.open("POST", url, true);

// set the content type to JSON
xmlhttp.setRequestHeader("Content-Type", "application/json");

// send the data to the server
xmlhttp.send(JSON.stringify(Products));
    console.log(Products);
 } 


 function changeText() {
        document.getElementById("text").innerText = g;
        document.getElementById("textt").innerText = g;
      }
 
 // add an event listener to the button
document.getElementById('myButton').addEventListener('click', function() {
  // create a hidden input field for each object in the array
  for (var i = 0; i < Products.length; i++) {
    var input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'Products[]';
    input.value = JSON.stringify(Products[i]);
    document.getElementById('myForm').appendChild(input);
  }
  console.log("fdfdsfsd".Products);
  // submit the form
  document.getElementById('myForm').submit();
});
 subTotal();
</script>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
