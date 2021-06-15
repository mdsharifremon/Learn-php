<?php 
require_once '../CRUD/config.php';
$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
$json_data = json_encode($row, JSON_PRETTY_PRINT);

$file_name = "json-files/" . 'user' . '.json';

if(file_put_contents($file_name, $json_data)){
    echo $json_data;
}else{
    echo 'JSON file is not parsed';
};