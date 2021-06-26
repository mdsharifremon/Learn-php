<?php 

$db_name = "mysql:host=localhost;dbname=cms_form";
$conn = new PDO($db_name, 'root', '');
$sql = $conn->query("SELECT * FROM user");

$result = $sql->fetchAll(PDO::FETCH_ASSOC);

if(count($result)){
    foreach($result as list('id' => $id, 'fname' => $fname, 'lname' => $lname, 'age' => $age, 'city' => $city, 'dob' => $dob )){
        echo "$id - $fname $lname = $age = $city = $dob" . '<br>';
    }
}

// echo '<pre>'; 
// print_r($result);
// echo  '</pre>';


// while($row = $sql->fetch(PDO::FETCH_ASSOC)){
//     echo "$row[id] - $row[fname] $row[lname] - $row[age] - $row[city] - $row[dob]" . '<br>';
// }


?>