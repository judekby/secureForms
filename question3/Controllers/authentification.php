<?php 
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include ('./Views/authentification.php');

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
require ('./Models/phpMailer.config.php');


$email = $_SESSION['email'];
$username = $_SESSION['username'];


$expiration = time() + (5*60);
$code = rand(100000,999999);

$mail = new PHPMailer(true);
try{
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = $smtp_username;     
    $mail->Password   = $smtp_password;
    $mail->SMTPSecure = 'ssl';                                  
    $mail->Port       =  465;  
    $mail->setFrom('ne-pas-repondre@gmail.com', 'admin');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject    = 'Verification code';
    $mail->Body       = '<html>
    <head>
        <style>
            h1 {color: #0066cc; font-size: 24px; font-weight: normal;}
            h2 {color: #333333; font-size: 18px; font-weight: normal;}
            p {color: #666666; font-size: 14px;}
        </style>
    </head>
    <body>
        <h1>Hi, '.$username.'</h1>
        <h2>Please use the following code to confirm your identity:</h2>
        <p>'.$code.'</p>
    </body>
    </html>';
        
    $mail->send();
    echo 'Email sent successfully';
    } 
    catch (Exception $e) {
    echo 'Email coulds not be sent. Error: ', $mail->ErrorInfo;
    } 
    
    try{
        require ('./Models/authentification.php');
        $insert_code = insert_otp($code);
    }catch(Exception $e){
        print_r($e);
    }
   
