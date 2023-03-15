<?php
  
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
  
require 'vendor/autoload.php';
  
$mail = new PHPMailer(true);
  
    $mail->SMTPDebug = 2;                                       
    $mail->isSMTP();                                            
    $mail->Host       = 'SMTP HOST';                    
    $mail->SMTPAuth   = true;                             
    $mail->Username   = 'SMTP USERNAME';                 
    $mail->Password   = 'SMTP PASSWORD';                        
    $mail->SMTPSecure = 'ssl';                              
    $mail->Port       = 465; 
    $mail->SMTPDebug = 0; 
  
    $mail->setFrom('FROM EMAIL ', 'SUBJECT');           
       
    $mail->isHTML(true);                                  
  
?>