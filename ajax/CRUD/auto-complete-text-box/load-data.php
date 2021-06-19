<?php

$conn = mysqli_connect('localhost','root','','cms_form')or die(mysqli_connect_error());
    $city = $_POST['city'];
    $sql = "SELECT * FROM user WHERE city LIKE '%{$city}%'";
    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    if(mysqli_num_rows($result) > 0){
        $output = '';
        $output = "<table>
                    <thead>
                        <tr>
                            <th>User Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Age</th>
                            <th>City</th>
                        </tr>
                    </thead>

                    <tbody id='table-data'>";

        while($row = mysqli_fetch_assoc($result)){
            $output .= "<tr>
                            <td>$row[id]</td>
                            <td>$row[fname]</td>
                            <td>$row[lname]</td>
                            <td>$row[age]</td>
                            <td>$row[city]</td>
                        </tr>";
        }
        $output .= "</tbody></table>";
       echo $output;
    }else{
        echo "<tr><td colspan='5'>No data found</td></tr>";
    }
