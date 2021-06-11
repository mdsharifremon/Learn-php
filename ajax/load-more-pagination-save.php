<?php 

$conn = mysqli_connect('localhost', 'root', '', 'cms_form') or die(mysqli_connect_error());
$page = (isset($_POST['page']))? $_POST['page'] : 0 ;
$limit = 4;
$offset = ($page) * $limit;
$offset = $page;

// SQL Query

$sql = "SELECT * FROM user LIMIT {$offset},{$limit}";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
if(mysqli_num_rows($result) > 0 ){
    // $output = "<thead>
    //                 <tr>
    //                     <th>Id</th>
    //                     <th>First Name</th>
    //                     <th>Last Name</th>
    //                     <th>Age</th>
    //                 </tr>
    //             </thead>";
    $output = "<tbody id='table-body'>";  

        while($row = mysqli_fetch_assoc($result)){
            $last_id = $row['id'];
            $output .= " <tr>
                            <td align='center'>$row[id]</td>
                            <td align='center'>$row[fname]</td>
                            <td align='center'>$row[lname]</td>
                            <td align='center'>$row[age]</td>
                        </tr>";

        };

    $output .= "</tbody>";

    $output .=  "<tbody id='table-pagination'>
                        <tr>
                            <td colspan='4'>
                                <button id='load-more-btn' data-pid='$last_id'>Load More</button>
                            </td>
                        </tr>
                </tbody>";

    mysqli_close($conn);
    echo $output;
}else {
    echo '';
};