<?php 

require_once '../CRUD/config.php';
$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
$json = json_encode($row,JSON_PRETTY_PRINT);
$file_name = "my-" . date('d-m-Y') . '.json';

if(file_put_contents("dynamic-json/{$file_name}",$json)){
    echo $file_name . ' created';
}else{
    echo "Can't insert json data in file";
};




