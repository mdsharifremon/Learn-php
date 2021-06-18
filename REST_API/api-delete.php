<?php 


header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$get = file_get_contents('php://input');
$data = json_decode($get,true);
$id = $data['id'];

require_once 'config.php';
$sql = "DELETE FROM user WHERE id = {$id}";

if(mysqli_query($conn, $sql)){
    $success = [
            'message' => 'Data deleted successfully',
            'status' => true,
    ];
    echo $json_success = json_encode($success, JSON_PRETTY_PRINT);
}else{
    $error = [
        'message' => 'Failed to delete data',
        'status' => false,
    ];
    echo $json_error = json_encode($error, JSON_PRETTY_PRINT);
};


?>