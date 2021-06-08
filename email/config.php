<?php 
$server = 'localhost';
$user = 'root';
$pass = '';
$database = 'cms_form';
$conn = mysqli_connect($server, $user, $pass, $database) or die('Connection failed ' . mysqli_connect_error($conn));
$location = "location:http://localhost/learning/PHP_learning/email/";
?>