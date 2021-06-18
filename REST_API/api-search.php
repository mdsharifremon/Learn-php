<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Methods:GET');
//header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,   Access-Control-Allow-Methods, Authorization, X-Requested-With');

$search = (isset($_GET['search']))? $_GET['search'] : die();
// $get = file_get_contents('php://input');
// $data = json_decode($get, true);
// $search = $data['search'];


require_once 'config.php';
$sql = "SELECT * FROM user WHERE fname LIKE '%{$search}%' OR lname LIKE '%{$search}%'";
$result = mysqli_query($conn, $sql);


if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $json_data = json_encode($row, JSON_PRETTY_PRINT);
    echo $json_data;
}else{
    $error = [
        'message' => 'No Search Found',
        'status' => false
    ];
    echo $json_error = json_encode($error, JSON_PRETTY_PRINT);
};

?>