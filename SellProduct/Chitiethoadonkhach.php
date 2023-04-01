<?php
  include_once '../connection.php';
    error_reporting(0);
    $id = $_GET['id'];
    // print_r($id);
    $cursor = $HoaDon->find();
    $cursor1 = $HoaDon->find();

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
    // echo "<script>console.log('dfgfeg);</script>";


    // print_r($students);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="./FE/Admin/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <style>
        .float{
            position:fixed;
            width:60px;
            height:60px;
            bottom:40px;
            right:40px;
            background-color:#0C9;
            color:#FFF;
            border-radius:50px;
            text-align:center;
            box-shadow: 2px 2px 3px #999;
        }

        .my-float{
            margin-top:22px;
        }
    </style>
    <title>Page PRODUCT</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

<!-- Bootstrap CDN -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
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

    <div class="container" >
       
        <div class="card mt-3 mb-3 bg-light">
            <div class="card-header text-center">
                <h5>All PRODUCT Details</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive" style="overflow-y:scroll;">
                    <table class="table table-hover mt-0">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Gia</th>
                                <th scope="col">So Luong</th>
                               
                                <th scope="col" style="text-align:right"></th>
                            </tr>
                        </thead>
                        <tbody  >
                            <?php foreach($students as $document) {?>
                                <tr>
                                    <th scope="row"><?php echo $document['id']; ?></th>
                                    <td> <img src="../IMG/<?php echo $document['img']; ?>"  width=150 height=130></td>
                                    <td><?php echo $document['name']; ?></td>
                                    <td><?php echo $document['gia']; ?></td>
                                    <td><?php echo $document['soluong']; ?></td>
                                    <!-- Delete Button -->
                                   
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
     
      
    </div>
    





</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>