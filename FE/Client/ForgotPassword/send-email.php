<?php
$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

require "./vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

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

$mail->Subject = $subject;
$mail->Body = $message;

$mail->send();

// header("Location: sent.html");