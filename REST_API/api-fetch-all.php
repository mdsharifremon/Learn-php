<?php 

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
require_once "config.php";
$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
if(mysqli_num_rows($result) > 0){
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $json_data = json_encode($output, JSON_PRETTY_PRINT);
    echo $json_data;
}else{
    $error = [
        'message' => 'No record found',
        'status'  => false
    ];
    $error_json = json_encode($error, JSON_PRETTY_PRINT);
    echo $error_json;
};