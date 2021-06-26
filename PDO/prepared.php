<?php 


$db_name = "mysql:host=localhost;dbname=cms_form";
$conn = new PDO($db_name, 'root', '');
// $sql = $conn->prepare("SELECT * FROM user");
// $sql->execute();
// $result = $sql->fetchAll(PDO::FETCH_ASSOC);
// print_r($result);
// $conn = null;
// $sql1 = $conn->prepare("SELECT * FROM user WHERE city = :city AND age > :age ");
// $city = 'dhaka';
// $age = 30;
// $sql1->bindParam(':city',$city, PDO::PARAM_STR);
// $sql1->bindParam(':age',$age, PDO::PARAM_INT);
// $sql1->execute(); $sql1->execute(array($city,$age))// Shorthand
// $result = $sql1->fetchAll();

// foreach($result as list('city' => $city, 'fname' => $fname, 'age' => $age)){
//     echo "$city - $fname - $age" . '<br>';
//}

$sql = $conn->prepare("SELECT * FROM user");
$sql->execute();
//$result = $sql->fetchAll(PDO::FETCH_COLUMN); // Fetch single Column.
//$result = $sql->fetchAll(PDO::FETCH_GROUP | PDO::FETCH_ASSOC); // Fetch group Column serially.
//$result = $sql->fetchAll(PDO::FETCH_UNIQUE | PDO::FETCH_ASSOC); // Fetch unique Column serially.
//$result = $sql->fetchAll(PDO::FETCH_KEY_PAIR); // Make First column to arr key, second to its value

// echo $sql->rowCount(); // Count Total Rows

$result = $sql->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($result);
echo '</pre>';





?>