
<?php
    include_once '../connection.php';
    error_reporting(0);
    session_start(); 

    $cursor = $Account->find(["id"=> $_SESSION["idnguoimua"]]); 

 
?>




<!DOCTYPE html>
<html>
  <head>
    <title>Shop Home Page</title>
    <!-- Load jQuery from a CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./profile.css">

    
  </head>
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
<div class="container">
<?php foreach($cursor as $document) {?>
  <div class="main">
      <div class="row">
          <div class="col-md-4 mt-1 ">
              <div class="card text-center sidebar">
                  <div class="card-body">
                      <img src="./profile_svg.svg" alt="rounded-circle" width="150">
                      <div class="mt-3">
                          <h3>Tên Đăng Nhập</h3>
                         
                         
                           <a href=" http://localhost:3000/FE/Client/Repass/Doimatkhau.php" class="btncss">Đổi Mật Khẩu</a>
                         
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-8 mt-1">
              <div class="card mb-3 content">
                <div class="hoverbtn">
                <p class="btnSua"><b>Sửa</b><p>
                </div>
                  <h1 class="m-3 pt-3">About</h1>
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-3">
                              <h5>FullName</h5>
                          </div>
                          <div class="col-md-9 text-secondary">
                          <?php echo $document['name']; ?>
                          </div>
                      </div>
                      <hr>
                      <div class="row">
                          <div class="col-md-3">
                              <h5>Email</h5>
                          </div>
                          <div class="col-md-9 text-secondary">
                          <?php echo $document['Email']; ?>
                          </div>
                      </div>
                      <hr>
                      <div class="row">
                          <div class="col-md-3">
                              <h5>Password</h5>
                          </div>
                          <div class="col-md-9 text-secondary">
                          <?php echo md5($document['password']); ?>
                          </div>
                      </div>
                  
                  </div>
              </div>
          </div>
      </div>
  </div>
  <?php } ?>
</div>



    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
