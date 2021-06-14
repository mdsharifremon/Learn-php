<?php 
                    
$conn = mysqli_connect('localhost', 'root', '', 'cms_form')or die(mysqli_connect_error());
$id = (isset($_POST['id']))? $_POST['id'] : 1 ;
$sql = "SELECT * FROM user WHERE id = {$id}";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
 if(mysqli_num_rows($result) > 0){
     $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
     echo $json = json_encode($row);               
};


?>
