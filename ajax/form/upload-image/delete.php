<?php
if(isset($_POST['path'])){
    $img = $_POST['path'];
    if(unlink($img)){
        echo 1;
    }else{
        echo 'File In not deleted';
    };  
}else{
    echo 'No such file exist';
}
