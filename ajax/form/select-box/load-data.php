<?php 

$conn = mysqli_connect('localhost','root','','cms_form') or die(mysqli_connect_error());

if(!isset($_POST['type'])){
    // Fetch Data From Country

    $sql = "SELECT * FROM country";
    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    if(mysqli_num_rows($result) > 0){
        $output = '';
        while($row = mysqli_fetch_assoc($result)){
            $output .= "<option value='$row[id]'>$row[country]</option>";
        }
        echo $output;
    }else{
        echo 'No country found';
    }

}else if($_POST['type'] == 'cityData'){
    // Fetch Data From Country

    $country = $_POST['category_id'];
    $sql = "SELECT * FROM city WHERE code = {$country}";
    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

    if(mysqli_num_rows($result) > 0){
        $output = '';
        while($row = mysqli_fetch_assoc($result)){
            $output .= "<option value='$row[sid]'>$row[city]</option>";
        }
        echo $output;
    }else{
        echo 'No city Found';
    };
};
mysqli_close($conn);