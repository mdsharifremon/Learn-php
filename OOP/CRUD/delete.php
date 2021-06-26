<?php 

require_once 'database.php';
$conn = new Database();
$conn->delete('user', 'id=25');
print_r($conn->get_result());



?>