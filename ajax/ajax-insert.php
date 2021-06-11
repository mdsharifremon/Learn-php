<?php 
$conn = mysqli_connect('localhost', 'root', '', 'cms_form') or die(mysqli_connect_error());
$fname = $_POST['first_name'];
$lname = $_POST['last_name'];
$age = $_POST['age'];
$sql = "INSERT INTO user(fname, lname, age)
        VALUES ('{$fname}', '{$lname}', {$age})";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
if($result){
    echo 1;
}else{
    echo 0;
}

