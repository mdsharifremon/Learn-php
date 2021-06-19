<?php
$conn = mysqli_connect('localhost', 'root', '', 'cms_form') or die(mysqli_connect_error());
if(isset($_POST['min']) && isset($_POST['max'])){
    $min = $_POST['min'];
    $max = $_POST['max'];
    $sql = "SELECT * FROM user WHERE dob BETWEEN {$min} AND {$max}";
}else{
    $sql = "SELECT * FROM user";
}

$result = mysqli_query($conn,$sql)or die(mysqli_error($conn));
if(mysqli_num_rows($result) > 0){
    $output = '';
    while($row = mysqli_fetch_assoc($result)){
        $output .= "<tr>
                        <td>$row[id]</td>
                        <td>$row[fname]</td>
                        <td>$row[lname]</td>
                        <td>$row[age]</td>
                        <td>$row[city]</td>
                        <td>$row[dob]</td>
                    </tr>";
    }
    echo $output;
}else{
    echo "<tr colspan='6'><td>No Data Found</td></tr>";
}


?>