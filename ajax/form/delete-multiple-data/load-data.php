<?php 

$conn = mysqli_connect('localhost','root', '','cms_form') or die(mysqli_connect_error());
$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
if(mysqli_num_rows($result) > 0){
    $output = "";
    while($row = mysqli_fetch_assoc($result)){
        $output .= "<tr>
                        <td width='50px'><input type='checkbox' value='$row[id]'></td>
                        <td>{$row['id']}</td>
                        <td>{$row['fname']}</td>
                        <td>{$row['lname']}</td>
                        <td>{$row['age']}</td>
                    </tr>";
    }
    echo $output;
}else{
    echo "<tr><td colspan='6'>No data found</td></tr>";
}
mysqli_close($conn);


?>