<?php

require_once 'database.php';

$conn = new Database();
// $conn->sql("SELECT * FROM USER WHERE age > 30"); // By sql command
// $conn->select('user', 'fname, lname', 'age > 30', 'age DESC', 5);
// Pagination
$conn->sql("SELECT * FROM user LIMIT 0,3");
echo '<pre>';
print_r($conn->get_result());
echo '</pre>';

?>