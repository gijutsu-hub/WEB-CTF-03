<?php
include 'mail.php';
session_start();
$_SESSION['error'] = ""; 
$_SESSION['msgs'] = "";
function generateRandomString($length = 20) {
  return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTU', ceil($length/strlen($x)) )),1,$length);
}  
$keyss = generateRandomString();
$con = new mysqli('localhost', 'user', 'pass', 'databse');
if(isset($_POST['login'])){
  $email = stripslashes($_POST['email']);
  $email = mysqli_real_escape_string($con, $email);
  $pass = stripslashes($_POST['pass']);
  $pass = mysqli_real_escape_string($con, $pass);  
  $sql = "select *from user where email = '$email' and pass = '$pass'";  
  $result = mysqli_query($con, $sql);   
  $count = mysqli_num_rows($result); 
  if($count == 1){
    $_SESSION['login'] = $email;
    header("location: flag.php");
  }
  else{
    $_SESSION['error'] = "Invalid email and password";
  }
}
if(isset($_POST['reset'])){
  $email= implode(",", $_POST['email']);
  $user = stripslashes($_POST['user']);
  $user = mysqli_real_escape_string($con, $user);
  $emailarray = explode (",", $email); 
  $result = mysqli_query($con,"select * FROM user WHERE username='$user' AND email LIKE '$emailarray[0]'");  
  $count = mysqli_num_rows($result);
  if($count == 1){
    mysqli_query($con,"UPDATE user SET pass = '$keyss'  WHERE username='$user'"); 
    for ($i = 0; $i < sizeof($emailarray); $i++){
     $mail->AddAddress($emailarray[$i]);
    $mail->Subject = 'Forget Password';
    $mail->Body    = '<h1>Your Secret Code is</h1><h4>'.$keyss.'</h4>';
    $mail->send();
    $_SESSION['msgs'] = "Password email send success";
    }
  }
          
  
  else{
    $_SESSION['msgs'] = "Password failed to reset";
  }
}

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Hind:300' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div id="login-button">
  <img src="https://dqcgrsy5v35b9.cloudfront.net/cruiseplanner/assets/img/icons/login-w-icon.png">
  </img>
</div>
<div id="container">
  <h1>Log In</h1>
  <h6><?php print_r($_SESSION['error']); ?></h6>
  <span class="close-btn">
    <img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-128.png"></img>
  </span>

  <form action="" method="POST">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="pass" placeholder="Password">
    <button type='submit' name='login'>Log in</button>
    <div id="remember-container">
      <span id="forgotten">Forgotten password</span>
    </div>
</form>
</div>

<!-- Forgotten Password Container -->
<div id="forgotten-container">
   <h1>Forgotten</h1>
   <h6><?php print_r($_SESSION['msgs']); ?></h6>
  <span class="close-btn">
    <img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-128.png"></img>
  </span>
  <form action="" method="post">
  <input type="text" name="user" placeholder="username">
    <input type="email" name='email[]' placeholder="Email">
    <button type='submit' name='reset'>Get new password</button>
</form>
</div>
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>

</body>
</html>
