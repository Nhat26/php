<?php
include_once '../../../connection.php';


require "./vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$code = rand(100000, 999999);
session_start();
$_SESSION['codemail'] = $code;


error_reporting(0);
if(isset($_POST['submit']))
{
  session_start();
  $email = $_POST['email'];
  $document = $Account->find(['email' => $email]);
   $cursor = $Account->findOne(["Email"=>$email]); 
  $_SESSION['idchange']=$cursor["id"];
  $a=$cursor["id"];
  
  if($document)
  {

    echo "da vao dc if";
    $mail = new PHPMailer(true);
    $email=$_POST['email'];
    $name="ccc";
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    
    $mail->Host = "mail.smtp2go.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    // $mail->SMTPSecure = 'tls';
    $mail->Port = "2525";
    
    $mail->Username = "smtp_username";
    $mail->Password = "smtp_password";
    
    $mail->setFrom($email, $name);
    $mail->AddAddress("recipient@example.com", "Rachel Recipient");
    $mail->CharSet = 'UTF-8';
    $mail->Subject = "Đây là mã code đề xác thực lại mật khẩu";
    $mail->Body = 'mã xác thực: ' . $code;
    
    $mail->send();
    echo "<script>";
    echo $a;
    echo "window.alert('Đã Gửi Tới Email Của Bạn')";
  
    echo "</script>";
    


}
$email1 = $_POST['email'];
$cursor1 = $Account->findOne(["Email"=>$email1]); 
$_SESSION['idchange1']=$cursor1["id"];
header("location: http://localhost:3000/FE/Client/ForgotPassword/mailcode.php");  
}

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="QuenMatKhau.css">
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
              <label for="email">Email address</label>
              <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
              
            </div>
            <button type="submit" name="submit" class="btn btn-primary ">Gửi</button>
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