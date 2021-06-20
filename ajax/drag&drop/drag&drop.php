<?php 

$conn = mysqli_connect('localhost','root', '', 'cms_form')or die(mysqli_connect_error());

if($_FILES['file']['name'] != ''){
    $file = $_FILES['file']['name'];
    $file_name = '';
    $total = count($file);
    for($i = 0; $i < $total; $i++){
        $fileName = $file[$i];
        $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $valid_ext = ['png','jpg','jpeg','gif'];
        if(in_array($ext, $valid_ext)){
            $new_name = rand() . '.' . $ext;
            move_uploaded_file($_FILES['file']['tmp_name'][$i], 'upload/'.$new_name);
            $file_name .= $new_name . ',';
        }else{
            echo "File format is not supported";
        }
    }
    $sql = "INSERT INTO img(img) VALUES('{$file_name}')";
    if(mysqli_query($conn,$sql)){
        echo 1;
    }else{
        echo 0;
    }
    
}