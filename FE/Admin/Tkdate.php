<?php
    include_once '../../connection.php';
    error_reporting(0);
    // $cursor =  $HoaDon->find(["ngayban"=>"2023-03-11 23:41:22"]);
    $cursor =  $HoaDon->find(["TThoanthanh"=>"Đã hoàn thành"]);

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
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tables - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
    <?php require_once ("Sidebar.php"); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Thống Kê Hóa Đơn Th Ngày</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Thống Kê</a></li>
                            <li class="breadcrumb-item active">Khách Hàng</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Bảng khách hàng
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Time</th>
                                            <th>Quantity</th>
                                            <th>Address</th>
                                            <th>Total Price</th>
                                            <th>State</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot>

                                    <?php foreach($cursor as $document) {?>
                               
                               <tr>
                                   <th  scope="row"><?php echo $document['id']; ?></th>
                               
                                   <td><?php echo $document['ngayban']; ?></td>
                                   <td><?php echo  count($document['ListSP']); ?></td>
                                   <td><?php echo  $document['diachi']; ?></td>
                                   <td><?php echo $document['tongtienhoadon']."VND"; ?></td>
                                   <td><?php echo  $document['TTdonhang']; ?></td>
                                  
                                   <!-- Delete Button -->
                                   <!-- <form method="POST"> -->
                                  
                                   <!-- </form> -->
                               </tr>
                               
                           <?php } ?>





                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
