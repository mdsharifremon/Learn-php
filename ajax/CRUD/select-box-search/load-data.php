<?php

$conn = mysqli_connect('localhost','root','','cms_form')or die(mysqli_connect_error());

if(isset($_POST['type'])){
    $city = $_POST['id'];
    $sql = "SELECT * FROM user WHERE city = '{$city}'";
    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    if(mysqli_num_rows($result) > 0){
        $output = '';
        while($row = mysqli_fetch_assoc($result)){
            $output .= "<tr>
                            <td>$row[id]</td>
                            <td>$row[fname]</td>
                            <td>$row[lname]</td>
                            <td>$row[age]</td>
                            <td>$row[city]</td>
                        </tr>";
        }
       echo $output;
    }else{
        echo "<tr><td colspan='5'>No data found</td></tr>";
    }
}else{
    $sql = "SELECT distinct(city) FROM user";
    $result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
    $output = '';
    while($row = mysqli_fetch_assoc($result)){
            $output .= "<option value='$row[city]'>$row[city]</option>";
    }
    echo $output;
}