<?php 

header('Content-type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: POST');
$get = file_get_contents('php://input');
$data = json_decode($get, true);
$id = $data['id'];

require_once "config.php";
$sql = "SELECT * FROM user WHERE id = {$id}";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $json = json_encode($row, JSON_PRETTY_PRINT);
    echo $json;

}else{
    $error = [
        'message' => 'No record found',
        'status'  => false
    ];
    $json_error = json_encode($error, JSON_PRETTY_PRINT);
    echo $json_error;
}