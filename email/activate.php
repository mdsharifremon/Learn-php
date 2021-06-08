<?php
require_once 'config.php';
session_start();
if(isset($_GET['token'])){
    $token = $_GET['token'];
    $sql = "UPDATE activation SET status = 'active'
            WHERE token = '{$token}'";
    $result = mysqli_query($conn, $sql) or die('Update failed: ' . mysqli_error($conn));
    if($result){
        if(isset($_SESSION['msg'])){
            $_SESSION['msg'] = 'Your account is activated successfully';
             header('location:login.php');
        }else{
           $_SESSION['msg'] = 'You are logged out. Login again.';
            header('location:login.php');  
        }  
     }else{
         $_SESSION['msg'] = 'Your account is not active..';
         header('location:email.php'); 
     };
};


?>