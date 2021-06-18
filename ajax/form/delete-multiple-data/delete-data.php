<?php

$conn = mysqli_connect('localhost','root','','cms_form')or die(mysqli_connect_error());
$id = $_POST['id'];
$str =  implode(',',$id);

$sql = "DELETE FROM user WHERE id IN ({$str})";
if(mysqli_query($conn,$sql)){
    echo 1;
}else{
    echo 0;
}