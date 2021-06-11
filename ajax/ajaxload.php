<?php 
$conn = mysqli_connect('localhost', 'root', '', 'cms_form') or die(mysqli_connect_error());
$page = (isset($_POST['page']))? $_POST['page'] : 1;
$limit = 5;
$offset = ($page - 1) * $limit;
$sql = "SELECT * FROM user ORDER BY id DESC LIMIT {$offset}, {$limit}";
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
    $output .= "<div id='pagination'>";

    $sql2 = "SELECT * FROM user";
    $result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
    $total_records = mysqli_num_rows($result2);
    $total_page = ceil($total_records / $limit);

        for($i = 1; $i <= $total_page; $i++){
            $active = ($page == $i)? "active" : '';;
            $output .= "<a href='#' data-tid='$i' class='$active'>$i</a>";   
        };   

    $output .= "</div>";
    mysqli_close($conn);
    echo $output;

}else{
    echo "<h3>No Data Found</h3>";
}