<?php


header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Header, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$get = file_get_contents('php://input');
$data = json_decode($get, true);
$id = $data['id'];
$fname = $data['fname'];
$lname = $data['lname'];
$age = $data['age'];

require_once 'config.php';
$sql = "UPDATE user SET fname ='{$fname}', lname = '{$lname}', age = {$age} WHERE id = {$id}";
$result = mysqli_query($conn, $sql);
if($result){
    $success = [
        'message' => 'Updated Successfully',
        'status'  => true
    ];
    $json_success = json_encode($success, JSON_PRETTY_PRINT);
    echo $json_success;
}else{
    $error = [
        'message' => 'Update failed',
        'status'  => false
    ];
    echo $json_error = json_encode($error, JSON_PRETTY_PRINT); 
};



?>