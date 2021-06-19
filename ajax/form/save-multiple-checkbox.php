<?php 

$conn = mysqli_connect('localhost', 'root', '', 'cms_form') or die(mysqli_connect_error());
$lang = $_POST['lang'];
$name = $_POST['name'];
$sql = "INSERT INTO checkbox(name,lang) VALUES('{$name}', '{$lang}')";
if(mysqli_query($conn,$sql)){
    echo 'Data inserted successfully';
}else{
    echo 'Data insert failed';
}


?>