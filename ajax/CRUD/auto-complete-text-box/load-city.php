  <?php 
    $conn = mysqli_connect('localhost','root','','cms_form')or die(mysqli_connect_error());
    $city = $_POST['city'];
    $sql = "SELECT distinct(city) FROM user WHERE city LIKE '%{$city}%'";
    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    if(mysqli_num_rows($result) > 0){
        $output = '';
        while($row = mysqli_fetch_assoc($result)){
            $output .= "<p data-city='$row[city]'>$row[city]</p>";
        }
       echo $output;
    }else{
        echo "<p>No Data Found</p>";
    }