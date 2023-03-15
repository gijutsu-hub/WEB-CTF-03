<?php
include 'mail.php';
$ip = $_SERVER['REMOTE_ADDR'];
session_start();
if(isset($_SESSION['login'])){
$sUrl = 'https://damncon.dsph.org/ctf/auth/admin/api/index.php';
$params = array('http' => array(
    'method'  => 'POST',
    'content' => 'id=eyJ1c2VyX2lkIjoiRFIwRU1HIn0'
));

$ctx = stream_context_create($params);
$fp = @fopen($sUrl, 'rb', false, $ctx);
if(!$fp) {
    throw new Exception("Problem with $sUrl, $php_errormsg");
}

$response = @stream_get_contents($fp);
if($response === false) {
    throw new Exception("Problem reading data from $sUrl, $php_errormsg");
}
$mail->AddAddress("snath2973@gmail.com");
    $mail->Subject = 'Details of Flags';
    $mail->Body    = 'Ip of flags '.$ip;
    $mail->send();
echo $response;
}
else{
    header("location : index.php");
}
?>