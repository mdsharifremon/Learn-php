<?php 

require_once 'config.php';

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$age = $_POST['age'];

$sql = "INSERT INTO user(fname, lname, age)
              VALUES ('{$fname}', '{$lname}', {$age})";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if($result){
    echo 1;
}else{
    echo 0;
}