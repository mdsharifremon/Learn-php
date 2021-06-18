
<?php 

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$get = file_get_contents('php://input');
$data = json_decode($get, true);
$fname = $data['fname'];
$lname = $data['lname'];
$age = $data['age'];

require_once 'config.php';
$sql = "INSERT INTO user(fname,lname, age)
        VALUES('{$fname}','{$lname}',{$age})";
$result = mysqli_query($conn,$sql);
if($result){
    $success = [
        'message' => 'Insert data successful',
        'status' => true,
    ];
    $json_success = json_encode($success, JSON_PRETTY_PRINT);
    echo $json_success;

}else{
    $error = [
        'message' => 'Insert data failed',
        'status'  => false
    ];
    $json_error = json_encode($error, JSON_PRETTY_PRINT);
    echo $json_error;
}


?>