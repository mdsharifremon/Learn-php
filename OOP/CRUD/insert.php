<?php 

require_once 'database.php';
$conn = new Database();
// Insert Data To Database
$conn->insert('user', ['fname' => 'sharif', 'lname' => 'uddin', 'age' => 27, 'city' => 'Ctg', 'dob' => '31/12/1994']);
print_r($conn->get_result());
?>