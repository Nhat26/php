<?php
    include_once 'connection.php';
    error_reporting(0);
    $cursor =  $HoaDon->find();

    if (isset($_POST['guihang'])){
        // echo "<script>alert('Product has been Removed...!')</script>";
      

        $post_data = array();
      
        $post_data['TTguihang'] = "Đơn hàng đang giao"; 
        $post_data['TTdonhang'] = "Đã gửi hàng cho khách";
       
 
        $result =  $HoaDon->updateOne(['id'=>$_POST['txtID']],['$set'=>$post_data],['upsert' => true]);
        $post_data = array();
        $_POST = array();
        header("Refresh:0");
    }

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
    <title>BILLS</title>
</head>
<body>
<?php require_once ("./FE/Admin/Sidebar.php"); ?>

    <div class="container" >
       
        <div class="card mt-3 mb-3 bg-light">
            <div class="card-header text-center">
                <h5>BILLS</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive" style="overflow-y:scroll;">
                    <table class="table table-hover mt-0">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Ngay Bán</th>
                                <th scope="col">Số Lượng Sản Phẩm</th>
                                <th scope="col">Gửi tới</th>
                                <th scope="col">Tổng Giá</th>
                                <th scope="col">Gửi Hàng</th>
                                <th scope="col">Trạng Thái</th>
                               
                               
                                <th scope="col" style="text-align:right"></th>
                            </tr>
                        </thead>
                        <tbody  >
                            <?php foreach($cursor as $document) {?>
                               
                                <tr>
                                    <th  scope="row"><?php echo $document['id']; ?></th>
                                
                                    <td><?php echo $document['ngayban']; ?></td>
                                    <td><?php echo  count($document['ListSP']); ?></td>
                                    <td><?php echo  $document['diachi']; ?></td>
                                    <td><?php echo $document['tongtienhoadon']."VND"; ?></td>
                                    <td><?php echo  $document['TTdonhang']; ?></td>
                                    <td><?php echo  $document['TThoanthanh']; ?></td>
                                    <!-- Delete Button -->
                                    <!-- <form method="POST"> -->
                                    <td style="text-align:right">
                                    <a href="http://localhost:3000/ChitietHoadon.php?id=<?php echo $document['id']; ?>" class="btn btn-danger">Chi Tiết</a>
                                    <!-- <h1 type="hidden"><input name="txtID" type="hidden"  value=<?php echo $document['id']; ?>></h1> -->
                                        <!-- <button type="submit" name="guihang" class="btn btn-warning">Gửi Hàng</button> -->
                                        <a href="http://localhost:3000/Guihang.php?id=<?php echo $document['id']; ?>" class="btn btn-warning">Gửi Hàng</a>
                                        <a href="http://localhost:3000/Guihanght.php?id=<?php echo $document['id']; ?>" class="btn btn-warning">Hoàn Thành</a>
                                        <a href="http://localhost:3000/Hoanve.php?id=<?php echo $document['id']; ?>" class="btn btn-warning">Hủy</a>
                                    </td>
                                    <!-- </form> -->
                                </tr>
                                
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--<div class="card my-2 bg-light">
            <h4 class="card-title mx-auto mt-4">New Student Form</h4>
            <div class="card-body">
                <form method="POST" class="my-3 mx-3">
                    <div class="mb-3">
                        <label for="id" class="form-label">Student Id</label>
                        <input type="text" class="form-control" id="id" name="txtId" aria-describedby="id">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Student Name</label>
                        <input type="text" class="form-control" id="name" name="txtName" aria-describedby="name">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Student Address</label>
                        <input type="text" class="form-control" id="address" name="txtAddress" aria-describedby="address">
                    </div>
                    <div class="mb-3">
                        <label for="contact" class="form-label">Student Contact Number</label>
                        <input type="number" class="form-control" id="contact" name="txtContact" aria-describedby="address">
                    </div>

                    <input type="submit" name="submit" class="btn btn-primary" value="Insert Student"/>
                </form>
            </div>
        </div>-->
        <a href="http://localhost:3000/addProducts.php" class="float">
            <i class="fa fa-plus my-float"></i>
        </a>
    </div>
    





</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="./FE/Admin/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="./FE/Admin/js/datatables-simple-demo.js"></script>
</html>