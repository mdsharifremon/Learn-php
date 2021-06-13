<?php 


require_once 'config.php';

$id    = $_POST['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$age   = $_POST['age'];

$sql = "UPDATE user set fname = '{$fname}', lname = '{$lname}',age = {$age} WHERE id = {$id}";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
if($result){
    echo 1;
}else{
    echo 0;
};