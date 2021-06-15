<?php 

if(isset($_POST['save'])){

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    if(empty($fname) || empty($lname) || empty($age)){
        $error = 'all fields are required';
    }else{
        $user_data = [
            'fname' => $fname,
            'lname' => $lname,
            'age' => $age
        ];
        $file_name= 'json-files/form.json';
        $fetch_data = file_get_contents($file_name);
        $arr = json_decode($fetch_data, true);
        $arr[] = $user_data;
        $json_format = json_encode($arr, JSON_PRETTY_PRINT);
        if(file_put_contents($file_name,$json_format)){
        ?>
        <script>alert('Data send to json file');</script>
    
    
    <?php

        }   
    };
}

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
                <h1>JSON FROM FORM DATA</h1>
                <div class="search">
                    <input type="text" name="search" placeholder="search" id="search">
                </div>
            </div>
            <div class="insert">
                <h2 class="txt-center">Insert User</h2>
                <div class="form">
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                        <input type="text" name="fname" id="fname" placeholder="First Name">
                        <input type="text" name="lname" id="lname" placeholder="Last Name">
                        <input type="number" name="age" id="age" placeholder="Age" autocomplete="off">
                        <input type="submit" name="save" id="save" value="Submit">
                    </form>
                    <?php if(!empty($error)): ?>
                    <p class="alert danger"><?php echo $error;  ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>