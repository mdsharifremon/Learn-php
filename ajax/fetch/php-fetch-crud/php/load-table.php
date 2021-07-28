<?php

$conn = mysqli_connect("localhost", "root", "", "cms_form") or die("Connection Failed.");
$sql = "SELECT s.sid,s.fname,s.lname,class.class_name, city.city_name FROM student s JOIN class ON s.class = class.class_id JOIN city ON s.city = city.city_id";
$result = mysqli_query($conn, $sql) or die("SQL Failed");
$output = [];

if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
    $output[] = $row;
  }
}else{
    $output['empty'] = ['empty'];
}
mysqli_close($conn);
echo json_encode($output);

?>