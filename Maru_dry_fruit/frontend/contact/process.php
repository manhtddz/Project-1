<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
if(isset($_POST['send'])){
    $mail = new PHPMailer(true);
    $mail -> isSMTP();
    $mail -> Host = "smtp.gmail.com";
    $mail -> SMTPAuth = true;
    $mail -> Username = "nguyenphanbaolong1402@gmail.com";
    $mail -> Password = "agqyndlbbfozhvhc";
    $mail -> SMTPSecure = "tls";
    $mail -> Port = 587;
    $mail -> setFrom($_POST['email'], $_POST['email']);
    $mail -> addAddress("nguyenphanbaolong1402@gmail.com");
    $mail -> isHTML(true);
    $mail -> Subject =$_POST["subject"];
    $mail -> Body = $_POST["message"];
    $mail -> send();
}

header('location: ../index.php');
?>