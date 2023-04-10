<?php 
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
require ('./Models/phpMailer.config.php');

$email = $_SESSION['email'];
$username = $_SESSION['username'];
$activation_code = rand(100000,999999);
$_SESSION['otp'] = $activation_code;
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
    $mail->setFrom('ne-pas-repondre@gmail.com', 'ne-pas-repondre@gmail.com');
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
        <p>'.$activation_code.'</p>
    </body>
    </html>';
        
    $mail->send();
    echo 'Email sent successfully';
    } 
    catch (Exception $e) {
    echo 'Email coulds not be sent. Error: ', $mail->ErrorInfo;
    } 

    try{
        require ('authentification.php');
        $insert_code = insert_otp($activation_code);
    }catch(PDOException $e)
    {
        print_r($e);
    }
    

    ?>
   