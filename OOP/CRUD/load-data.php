<?php

require_once 'database.php';

$conn = new Database();
// $conn->sql("SELECT * FROM USER WHERE age > 30");
$conn->select('user', 'fname, lname', 'age > 30', 'age DESC', 5);
echo '<pre>';
print_r($conn->get_result());
echo '</pre>';

?>