<?php

require_once "database.php";
$input = file_get_contents("php://input");
$decode = json_decode($input, true);
$fname = $decode['fname'];
$lname = $decode['lname'];
$city = $decode['city'];
$class = $decode['class'];

$sql = "INSERT INTO student(fname, lname, class,city) VALUES('{$fname}', '{$lname}', $class, $city)";
if($db->conn->query($sql)){
    echo json_encode(['insert'=>'success']);
};



?>