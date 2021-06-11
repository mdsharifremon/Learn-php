<?php 

$st_id = $_POST['eid'];
$conn = mysqli_connect('localhost', 'root', '', 'cms_form') or die(mysqli_connect_error());
$sql = "SELECT * FROM user WHERE id = {$st_id}";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$output = '';

if(mysqli_num_rows($result) > 0){
    $output = "<table class='update-form'>";
    while($row = mysqli_fetch_assoc($result)){

            $output .= " 

                    <tr>
                        <td>First Name: </td>
                        <td>
                            <input type='hidden' id='update-id' value='$row[id]'>
                            <input type='text' id='update-fname' value='$row[fname]'>
                        </td>
                    </tr>  
                       <tr>
                        <td>Last Name: </td>
                        <td><input type='text' id='update-lname' value='$row[lname]'></td>
                    </tr> 
                       <tr>
                        <td>Age: </td>
                        <td><input type='number' id='update-age' value='$row[age]'></td>
                    </tr> 
                    </tr> 
                       <tr>
                        <td></td>
                        <td><input type='submit' id='update-btn' value='Update'></td>
                    </tr> ";      
    };     
    $output .= "</table>";
    mysqli_close($conn);
    echo $output;
}
