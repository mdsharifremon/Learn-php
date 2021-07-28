<?php
require_once "database.php";
$input = file_get_contents("php://input");
$decode = json_decode($input, true);

$id = $decode['id'];

if($row = $db->fetch("student", "sid = {$id}")){
    echo json_encode($row);
}else{
    echo json_encode(['empty' => 'empty']);
}
