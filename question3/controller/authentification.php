<?php 
require ('./view/authentificationOtp.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once './Model/phpMailer.config.php';
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require_once('./database/connectDb.php');
require ('gabarit.php');

session_start();


$mail = new PHPMailer(true);
try{
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = $stmp_username;     
    $mail->Password   = $stmp_password;
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
   
