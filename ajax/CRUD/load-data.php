<?php 

require_once 'config.php';
$page = (isset($_POST['page']))? $_POST['page'] : 1;
$limit = 10;
$offset = ($page - 1) * $limit;
$sql = "SELECT * FROM user LIMIT {$offset}, {$limit}";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
if(mysqli_num_rows($result) > 0){
    $output = '';
    while ($row = mysqli_fetch_assoc($result)) {
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
    $output .=  "<tr>
                   <td colspan='5'>
                      <div id='pagination'>";


    $sql2 = "SELECT * FROM user";
    $result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
    $total_records = mysqli_num_rows($result2);
    $total_page = ceil($total_records / $limit);
    

                      for($i = 1; $i <= $total_page; $i++){
                          $active = ($page == $i)? 'active' : '';
                          $output .= "<a href='btn' class='$active' data-page='$i'>$i</a>";
                      };

    $output .= "      </div>
                   </td>
                </tr>";
                                



    mysqli_close($conn);
    echo $output;
};