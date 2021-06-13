<?php 
require_once '../CRUD/config.php';
$page = (isset($_POST['page']))? $_POST['page'] : 0;
$limit = 4;
$offset = $page;
$sql = "SELECT * FROM user LIMIT {$offset}, {$limit}";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
if(mysqli_num_rows($result) > 0){
    $output = '';
    while ($row = mysqli_fetch_assoc($result)) {
        $page_id = $row['id'];
        $output .= " <tr>
                        <td>$row[id]</td>
                        <td>$row[fname]</td>
                        <td>$row[lname]</td>
                        <td>$row[age]</td>
                        <td width='220px'>
                            <button id='edit' data-id='$row[id]'>Edit</button>
                            <button id='delete' data-id='$row[id]'>Delete</button>
                        </td>
                    </tr>";
    };
    // Pagination 
    $output .=  "<tr id='load-more-con'><td colspan='5'>";

    $output .= "<button id='load-more' data-page='$page_id'>Load More</button>";
    $output .= "</td></tr>";
                                



    mysqli_close($conn);
    echo $output;
};