<?php
require_once "database.php";

if ($row = $db->fetch('city')) {
    echo json_encode($row);
} else {
    echo json_encode(['empty' => 'empty']);
}

?>