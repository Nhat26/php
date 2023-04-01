<?php
 error_reporting(0);
session_start();
error_reporting(0);
// require_once ('php/CreateDb.php');
require_once ('./php/component.php');
include_once '../connection.php';
error_reporting(0);
session_start();
if($_POST['kii']==""){
  $cursor =  $Product->find();
}else{
  $idddd=$_POST['kii'];
 $idd=$_POST['kii'];
  
$cursor =  $Product->find(["name"=>$idd]); 
}
// $idd="kim tim";
  
// $cursor =  $Product->find(["name"=>$idd]); 


// create instance of Createdb class
// $database = new CreateDb("Productdb", "Producttb");

if (isset($_POST['add'])){
    /// print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'index.php'</script>";
        }else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }

    }else{

        $item_array = array(
                'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        // print_r($_SESSION['cart']);
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>
<body>


<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
  <div class="navbar-brand">
    <a href=".././SellProduct/index.php"><img src="../../../IMG/Final_logo.png"  style="height: fit-content; width: 70px;"></a>

  </div>
  <form method="POST" class="form-inline my-2 my-lg-0" style="position: relative; left: 500px;">
    <input name="kii" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Search</button>
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
<div class="fluid-container">
<div class="banner">
    <img class="home-inner" alt="" src=".././IMG/5993402.jpg" style="width: 100%; height: fit-content" />
</div>
    <!-- Main Content -->
    <div class="container">
    <div class="row">
        <?php foreach($cursor as $document) {?>
        <div class="col-md-3 col-sm-6">
            <div class="card">
                <form method="post">
                    <img src=".././IMG/<?php echo $document['img']; ?>" alt="Item" class="card-img-top" style="display: block; margin: 0 auto;">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?php echo $document['name']; ?></h5>
                        <p class="card-text"><?php echo $document['gia']; ?></p>
                        <button  class="btn btn-primary" style="position: absolute; top:10px; left: 10px;" type="submit" name="add">Buy Now</button>
                        <input type='hidden' name='product_id' value=<?php echo $document['id']; ?>>
                    </div>
                </form>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

  <!-- footer -->
  <footer class="w-100 py-4 flex-shrink-0">
        <div class="container py-4">
            <div class="row gy-4 gx-5">
                <div class="col-lg-4 col-md-6">
                    <h5 class="h1 text-white">Cửa Hàng Y Tế</h5>
                    <p class="small text-muted">Đồ án môn học Phát triển Mã Nguồn Mở, Sử dụng PhP và MongoDB Compass</p>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h5 class="text-white mb-3">Người thực hiện</h5>
                    <ul class="list-unstyled text-muted">
                        <li><a href="#">Đặng Duy Nhật</a></li>
                        <li><a href="#">Hoàng Thị Ngọc</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h5 class="text-white mb-3">Ngôn ngữ và cơ sở dữ liệu</h5>
                    <ul class="list-unstyled text-muted">
                        <li><a href="#">PHP 8.0</a></li>
                        <li><a href="#">HTML5 & CSS3</a></li>
                        <li><a href="#">BootStrap 5 & JQUERY</a></li>
                        <li><a href="#">MongoDB Compass</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h5 class="text-white mb-3">Demo</h5>
                    <p class="small text-muted">Cửa hàng mang tính chất phục vụ đồ án môn học.</p>
                    <form action="#">
                        <div class="input-group mb-3">
                            <input class="form-control" type="text" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-primary" id="button-addon2" type="button"><i class="fas fa-paper-plane"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </footer>




    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
