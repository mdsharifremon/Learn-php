<?php

    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'cms_form';
    $conn = new mysqli($db_host, $db_user,$db_pass,$db_name);
    if($conn->connect_error){
        die($conn->connect_error);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            box-sizing:border-box;
            padding:0;
            margin:0;
        }
        .container{
            max-width:700px;
            margin:20px auto;
            padding:20px;
            border:2px solid #eee;
            
        }
        input{
            padding:8px 15px;
            margin:6px auto;
            display:block;
            border:1px solid #eee;
            outline:none;
            min-width:350px;
            
        }
        input[type="submit"]{
            background:aqua;
            color: #000;;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="form">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" >
                <input type="text" placeholder="username" name="uname">
                <input type="password" placeholder="password" name="pass">
                <input type="submit" value="save" name='save'>
            </form>
            <?php
                if(isset($_POST['save'])){
                    $name = $_POST['uname'];
                    $pass = $_POST['pass'];

                //   $sql = $conn->prepare("SELECT * FROM security WHERE uname = ? AND pass = ?");
                //   $sql->bind_param("ss", $name, $pass);
                //   $sql->execute();
                /**
                 * Fetch Data
                 */
                // $myCity = 'Dhaka';
                // $sql = $conn->prepare("SELECT * FROM user WHERE city = ?");
                // $sql->bind_param("s", $myCity);
                // $sql->execute();
                // $sql->bind_result($id, $fname, $lname, $age, $city,$dob);
                // while($sql->fetch()){
                //     echo "$id - $fname - $lname - $age - $city - $dob" . "<br>";
                // }

                // Fetch Data From DataBase
                

                //  $result = $sql->get_result();
                //  while($row = $result_fetch_assoc()){
                //      print_r($row);
                //  }

                //  $result = $sql->get_result();
                //  while($row = $result->fetch_object()){ // Convert To Object
                //     $arr = get_object_vars($row); // Convert Object to array
                //      print_r($arr);
                //  }

                //   $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
                //   if(count($result) > 0){
                //             session_start();
                //             $session['id'] = $result[0]['id'];
                //             $session['uname'] = $result[0]['uname'];
                //             header("Location: dashboard.php"); 
                //   }else{
                //         echo "<script>alert('Email or Password Not Matched')</script>";
                //   }
                  $sql->close();
                }
           ?>

        </div>
    </div>
</body>
</html>

