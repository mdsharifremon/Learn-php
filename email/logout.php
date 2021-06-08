<?php 

require_once 'config.php';
session_unset();
session_destroy();
setcookie('email_cookie', '', -90000);
setcookie('pass_cookie', '', -90000);
if(isset($_SESSION['msg'])){
  $_SESSION['msg'] = 'You are logged out. Login again'; 
};
header('location:login.php');
?>