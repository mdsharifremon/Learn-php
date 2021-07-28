<?php

require_once "database.php";

$sql = "SELECT s.sid,s.fname,s.lname,class.class_name, city.city_name FROM student s JOIN class ON s.class = class.class_id JOIN city ON s.city = city.city_id ORDER BY s.sid ASC";

$result = $db->conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $row = ['empty' => 'empty'];
}
echo json_encode($row);

?>