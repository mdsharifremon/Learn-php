<?php 

require_once 'database.php';
$conn = new Database();
$conn->update('user', ['fname' => 'Karim', 'lname' => 'miah', 'age' => 27, 'city' => 'Ctg', 'dob' => '31/12/1994'], 'id=26');
print_r($conn->get_result());
?>