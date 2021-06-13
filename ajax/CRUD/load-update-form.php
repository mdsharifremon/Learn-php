<?php 
require_once 'config.php';

$id = $_POST['userId'];

$sql = "SELECT * FROM user WHERE id = {$id}";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
if(mysqli_num_rows($result) > 0 ){

    $output = '';
    while($row = mysqli_fetch_assoc($result)){
        $output .= "<input type='hidden' id='uid' value='$row[id]'>
                    <input type='text' id='ufname' placeholder='First Name' value='$row[fname]'>
                    <input type='text' id='ulname' placeholder='Last Name' value='$row[lname]' >
                    <input type='number' id='uage' placeholder='Age' value='$row[age]'>
                    <input type='submit' id='usave' value='Update'>";
    }
    mysqli_close($conn);
    echo $output;
}