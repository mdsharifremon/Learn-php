<?php
require_once "database.php";
if($row = $db->fetch('class')){
    echo json_encode($row);
}else{
    echo json_encode(['empty' => 'empty']);
}




?>