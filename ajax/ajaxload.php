<?php 
$conn = mysqli_connect('localhost', 'root', '', 'cms_form') or die(mysqli_connect_error());
$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$output = '';
if(mysqli_num_rows($result) > 0){

    $output = "<table class='inner' 
                    <tr>
                        <th>Id</th>
                        <th>First Name</th>
                        <th>LastName</th>
                        <th>Age</th>
                    </tr>";
    while($row = mysqli_fetch_assoc($result)){

            $output .= "<tr>
                            <td>$row[id]</td> 
                            <td>$row[fname]</td> 
                            <td>$row[lname]</td> 
                            <td>$row[age]</td> 
                       </tr>";
    };

    $output .= '</table>';
    mysqli_close($conn);
    echo $output;

}else{
    echo "<h3>No Data Found</h3>";
}