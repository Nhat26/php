<?php 
     include_once '../../../connection.php';
     error_reporting(0);
     session_start();
    //  echo $_SESSION["idnguoimua"];
     $cursor = $Account->findOne(["id"=> $_SESSION["idnguoimua"]]); 
    //  echo "skgfhsfkgfh";

    //  $iddd =$_SESSION['idchange1'];
    //  echo $iddd;
    // echo $_SESSION['codemail'];
    // echo $_SESSION['idchange1'];
    //  $cursor = $Account->findOne(["id"=>$iddd]); 
     if (isset($_POST['submit'])) {
        //  $post_data = array();
        //  $post_data['password'] = $_POST['pwd'];
         
        //  $idd = $_SESSION['idchange1'];
        //  $result = $Account->updateOne(["id"=>$idd],['$set'=>$post_data],['upsert' => true]);
  
        //  $post_data = array();
        //  $_POST = array();
        //  header("Refresh:0");
 
        // echo "<script>";
        // echo "window.alert('Đổi mật khẩu thành công')";
        // header("location: http://localhost:3000/SellProduct/Profile.php");    
        // echo "</script>";

        if ($cursor['password']==$_POST['pwd']) {
            $post_data = array();
       
   
            $post_data['password'] = $_POST['pwd1'];
     
            $result = $Account->updateOne(['id'=>$_SESSION["idnguoimua"]],['$set'=>$post_data],['upsert' => true]);
     
            $post_data = array();
            $_POST = array();


            // header("http://localhost:3000/SellProduct/Profile.php"); 
            // echo "dsffsd";
            // echo "<div class='alert alert-danger'> Required fields empty! </div>";
            header("location: http://localhost:3000/FE/Client/login/login.php"); 
           
        }else {
            // $Account->insertOne($post_data);
            echo "<script>";
            echo "window.alert('cc nhập thôi mà cũng sai')";
            echo "</script>";
        }

     }

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Mật Khẩu Mới</title>

    <link rel="stylesheet" href="./Doimatkhau.css">

  </head>
  <body>
    
  
  <section class="Form my-5 mx-5">
        <div class="container ">
            <div class="row no-gutters">
                <div class="col-lg-5" >
                    <img src="../../img/istockphoto-1136667772-612x612.jpg" class="img-fluid" alt="">
                </div>

            <div class="col-lg-7 px-5 pt-5"> 
                <h3 class="font-weight-bold py-3">Mật Khẩu</h3>


                <form method="POST">
                    <div class="form-row">
                        <div class="col-lg-7">
                            <input type="password" placeholder="Nhập mật cũ" name="pwd" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-7" style=" margin-top:15px" >
                            <input type="password" placeholder="Nhập mật mới" name="pwd1" class="form-control">
                        </div>
                    </div>

              
                
                    <div class="form-row">
                        <div class="col-lg-7 pt-3">
                            <button type="submit" name="submit" class="btn1 mt-3 mb-5">Xác nhận</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>      

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>