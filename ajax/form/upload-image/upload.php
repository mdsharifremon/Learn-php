<?php 

if($_FILES['file']['name'] != ''){
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $extension = pathinfo($file_name, PATHINFO_EXTENSION);
    $ext = ['jpg', 'jpeg', 'png'];

    if(in_array($extension,$ext)){
        $file = rand() . '.'.$extension;
        $target = 'upload/'. $file;
        if(move_uploaded_file($file_tmp,$target)){
            echo "<img src='$target'> <br><button id='delete' data-id='$target'>Delete</button>";
        };

    }else{
    echo "<script>alert('Invalid file format')</script>";
    };
  
}else{
    echo "<script>alert('Please Upload a file')</script>";
};



?>