<?php 
header('Content-Type: application/json');
$input = file_get_contents('php://');
$decode = json_decode($input, true);

$sid = $decode['sid'];
$fname = $decode['fname'];
$lname = $decode['lname'];
$city = $decode['city'];
$class = $decode['class'];

$sql = "UPDATE student SET fname='{$fname}', lname='{$lname}', class={$class}, city={$city} WHERE sid ={$sid}";

require_once "database.php";
if($db->conn->query($sql)){
    echo json_encode(array('update' => 'success'));
}else {
    echo json_encode(array('update' => 'failed'));
}