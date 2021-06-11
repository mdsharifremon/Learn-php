<?php 
$search = $_POST['search'];
$conn = mysqli_connect('localhost', 'root', '', 'cms_form') or die(mysqli_connect_error());
$sql = "SELECT * FROM user WHERE fname LIKE '%{$search}%' OR lname LIKE '%{$search}%'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$output = '';
if(mysqli_num_rows($result) > 0){

    $output = "<table class='inner' 
                    <tr>
                        <th>Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Age</th>
                        <th>Action</th>
                    </tr>";
    while($row = mysqli_fetch_assoc($result)){

            $output .= "<tr>
                            <td>$row[id]</td> 
                            <td>$row[fname]</td> 
                            <td>$row[lname]</td> 
                            <td>$row[age]</td> 
                            <td width='180px'>
                               <a id='edit' data-eid='$row[id]'>Edit</a>
                               <a id='delete' data-id='$row[id]'>Delete</a>
                            </td> 
                       </tr>";
    };

    $output .= '</table>';
    mysqli_close($conn);
    echo $output;

}else{
    echo "<h3>No Search Found</h3>";
}