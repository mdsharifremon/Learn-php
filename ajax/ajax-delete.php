<?php 
$id = $_POST['userId'];
$conn = mysqli_connect('localhost', 'root', '', 'cms_form') or die(mysqli_connect_error());
$sql = "DELETE FROM user WHERE id = {$id}";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

/**
 * Change all the id
 * maintain a serial
 */
$sql2 = "SELECT * FROM user WHERE id > {$id}";
$result2 = mysqli_query($conn,$sql2) or die(mysqli_error($conn));
if(mysqli_num_rows($result2) > 0){
    while($row2 = mysqli_fetch_assoc($result2)){
        $old_id = $row2['id'];
        $sql4 = "UPDATE user set id = id - 1 WHERE id = {$old_id}";
        mysqli_query($conn, $sql4) or die(mysqli_error($conn));
    };
};

if($result){
    echo 1;
}else{
    echo 0;
};
