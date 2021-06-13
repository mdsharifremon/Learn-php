<?php 

require_once 'config.php';

$id = $_POST['id'];
$sql = "DELETE FROM user WHERE id = {$id}";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
if($result){
    $sql2 = "SELECT * FROM user WHERE id > {$id};"; // Fetch Data rest user after this deleted id
    $result2 = mysqli_query($conn, $sql2)or die(mysqli_error($conn));
    if(mysqli_num_rows($result2)){
        while($row = mysqli_fetch_assoc($result2)){
                $uid = $row['id'];
                $sql3 = "UPDATE user SET id = id - 1 WHERE id = {$uid}"; // Update all user id (minus 1);
                $result3 = mysqli_query($conn,$sql3) or die( mysqli_error($conn));
            };
    };
        $sql5 = "SELECT * FROM user"; // Fetch all data after update user id
        $result5 = mysqli_query($conn, $sql5)or die(mysqli_error($conn));
        if(mysqli_num_rows($result5)){
            while($row5 = mysqli_fetch_assoc($result5)){
                $last_id = $row5['id']; // Find last user id
            };
        $sql4 = "ALTER TABLE user AUTO_INCREMENT = {$last_id}"; // Set auto increment to specific number (the last id)
        mysqli_query($conn,$sql4) or die(mysqli_error($conn));
        };
 echo 1;
}else{
    echo $result;
};;