<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];



try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP(true);                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'Yashpawar1007@gmail.com';                     //SMTP username
    $mail->Password   = 'ywzzvcoezcgappaz';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('Yashpawar1007@gmail.com', 'Mailer');
    $mail->addAddress('Myasusyp21@gmail.com', 'Joe User');     //Add a recipient
    $mail->addReplyTo('info@example.com', 'Information');
  
    //Content
    $mail->isHTML(true);  //Set email format to HTML
    $mail->Subject = 'Details of Clint';
    $mail->Body = "<h3> Full Name :- $name<h3/>
                  <h3> Email Addares :- $email</h3>
                  <h3> Subject :- $subject </h3>
                  <h3>  Message From Client:- $message<h3/>";
            

    $mail->send();

    header("Location:video.html");

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}