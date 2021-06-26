<?php
require_once 'database.php';

$conn = new Database();
// $conn->sql("SELECT * FROM USER WHERE age > 30"); // By sql command
// $conn->select('user', 'fname, lname', 'age > 30', 'age DESC', 5);

$url = basename($_SERVER['PHP_SELF']);
// Pagination
$conn->select('user', '*', null,null,3, null, null, null);
$result = $conn->get_result();
$output = '';
foreach($result as list('id' => $id, 'fname' => $fname, 'lname' => $lname, 'age' => $age, 'city' => $city, 'dob' => $dob)){
    $output .= "<tr>
                    <td>$id</td>
                    <td>$fname</td>
                    <td>$lname</td>
                    <td>$age</td>
                    <td>$city</td>
                    <td>$dob</td>
               </tr>";
}
echo $output;

// $conn->pagination($url,'user', null,3,null,null,null);

?>