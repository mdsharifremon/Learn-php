<?php 
   $conn = mysqli_connect('localhost','root','','cms_form') or die(mysqli_connect_error());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../dist/style.css">
    <title>PHP & AJAX</title>
</head>

<body>
    <div class="container">
        <div class="content-box">
            <div class="header">
                <h1>PHP CRUD WITH AJAX</h1>
                <div class="search">
                    <input type="text" name="search" placeholder="search" id="search">
                </div>
            </div>
            <div class="insert">
                <h2 class="txt-center">Insert User</h2>
                <div class="form">
                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF'])?>" method='POST'>
                        <input type="text" name="city" id="city" placeholder="City Name">
                        <select name="country" id='select'>
                            <option disabled='disabled' selected>Select Country</option>
                            <?php
                            $sql = "SELECT * FROM 	country";
                            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                            if(mysqli_num_rows($result)){
                                while($row = mysqli_fetch_assoc($result)){
                                    echo "<option value='$row[id]'> $row[country]</option>";
                                }
                            };
                            ?>
                        </select>
                        <input type="submit" name="save" id="save" value="Submit">
                        <p id="error">Error</p>
                        <p id="success">Success</p>
                    </form>
                </div>
            </div>
            <?php 
                if(isset($_POST['save'])){
                    $city = $_POST['city'];
                    $code = $_POST['country'];
                    $sql1 = "INSERT INTO city(city, code) VALUES('{$city}',{$code})";
                    $result1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
                    if($result1){
                        echo "<script>alert('Insert Successful')</script>";
                    }
                }
            ?>
        </div>
    </div>
</body>

</html>