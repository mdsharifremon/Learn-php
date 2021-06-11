<?php 
$conn = mysqli_connect('localhost', 'root', '', 'cms_form') or die(mysqli_connect_error());
$uid = $_POST['Uid'];
$fname = $_POST['Ufname'];
$lname = $_POST['Ulname'];
$age = $_POST['Uage'];
$sql = "UPDATE user SET fname = '{$fname}', lname = '{$lname}', age = {$age} WHERE id = {$uid}";

$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if($result){
    echo 1;
}else{
    echo $result;
}
