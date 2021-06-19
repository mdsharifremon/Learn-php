<?php 
require_once 'config.php';
$search = $_POST['search'];
$sql = "SELECT * FROM user WHERE fname LIKE '%{$search}%' OR lname LIKE '%{$search}%'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
if(mysqli_num_rows($result) > 0){
    $output = '';
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= " <tr>
                        <td>$row[id]</td>
                        <td>$row[fname]</td>
                        <td>$row[lname]</td>
                        <td>$row[age]</td>
                        <td>$row[city]</td>
                        <td>$row[dob]</td>
                        <td width='220px'>
                            <button id='edit' data-id='$row[id]'>Edit</button>
                            <button id='delete' data-id='$row[id]'>Delete</button>
                        </td>
                    </tr>";
    };
    mysqli_close($conn);
    echo $output;
}else{
    echo "<tr><td colspan='5'><h3 class='alert danger'>No Search Found</h3></td></tr>";
};