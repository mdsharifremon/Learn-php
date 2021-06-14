<?php 

require_once '../CRUD/config.php';

$fname = $_GET['fname'];
$lname = $_GET['lname'];
$age = $_GET['age'];
//$gender = $_POST['gendeGET

$sql = "INSERT INTO user(fname, lname, age)
        VALUES('{$fname}','{$lname}',{$age})";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
if($result){
    echo "Hello $fname";
}else{
    echo $result;
};