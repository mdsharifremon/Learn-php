<?php 

require_once 'config.php';

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$age = $_POST['age'];
$city = $_POST['city'];

$sql = "INSERT INTO user(fname, lname, age, city)
              VALUES ('{$fname}', '{$lname}', {$age}, '{$city}')";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if($result){
    echo 1;
}else{
    echo 0;
}