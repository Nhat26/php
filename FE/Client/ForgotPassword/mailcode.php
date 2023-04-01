<?php



error_reporting(0);

session_start();
$myVar = $_SESSION['codemail'];
if(isset($_POST['submit']))
{
  $a=$_POST['code'];
$myVar = $_SESSION['codemail'];
  if($a==$myVar){
    header("location: http://localhost:3000/FE/Client/ForgotPassword/NewPassword.php");
  }
}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="./QuenMatKhau.css">
  </head>
  <body>
  <div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <img src="../../img/istockphoto-1136667772-612x612.jpg" class="img-fluid" alt="Logo">
        </div>
        <div class="card-body">
          <form method="POST">
            <div class="form-group">
              <label for="text">Email Code:</label>
              <input type="text" name="code" class="form-control" id="text" aria-describedby="text" placeholder="Enter code">
              
            </div>
            <button type="submit" name="submit" class="btn btn-primary ">Xác nhận</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  </body>
</html>