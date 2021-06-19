<?php 


require_once 'config.php';

$id    = $_POST['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$age   = $_POST['age'];
$city   = $_POST['city'];
$dob   = $_POST['dob'];

$sql = "UPDATE user set fname = '{$fname}', lname = '{$lname}',age = {$age}, city='{$city}', dob = '{$dob}' WHERE id = {$id}";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
if($result){
    echo 1;
}else{
    echo $result;
};