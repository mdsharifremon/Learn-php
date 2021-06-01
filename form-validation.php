<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
            .container{display:flex;align-items:center;justify-content:center;min-height:100vh;}
            .login-form{width:450px;background:#eee; overflow: hidden; border-radius:5px;
                box-shadow: -5px 5px 33px 1px rgb(71 70 70 / 22%), 6px 7px 34px 1px rgb(70 70 70 / 19%);}
            h2{width:100%; background:#0069D9;color:#fff; line-height:50px;font-size:30px; text-align:center;}
            form{padding:30px 20px;}
            .invalid{width:100%; background:#fff; color:red; margin-top:5px; padding-left:10px;}
    </style>
    <title>Document</title>
</head>
<body>

<?php
$server   = 'localhost';
$user     = 'root';
$pass     = '';
$database = 'cms_form'; 
$conn = mysqli_connect($server, $user, $pass, $database) or die(mysqli_connect_error());
if(isset($_POST['save'])):
?>
<?php 
        // Validation

        // name field
        if(empty($_POST['name'])){
            $errName = "Name field must to be filled";
        }else{
            if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST['name'])) {
                $errName = "Only letters and white space allowed";
            }else{
                $name = $_POST['name'];
                $name = filter_var($name, FILTER_SANITIZE_STRING);
                $name = htmlspecialchars($name);
                $name = trim($name);
                $name = mysqli_real_escape_string($conn,$name);
            }
        };
            // Email fields
        if(empty($_POST['email'])){
            $errEmail = "Email field must to be filled";
        }else{
                $email = $_POST['email'];
                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                $email = filter_var($email, FILTER_VALIDATE_EMAIL);
                if($email){
                    $sql4 = "SELECT email FROM user WHERE email = '{$email}'";
                    $result4 = mysqli_query($conn, $sql4) or die('query failed: ' . mysqli_error($conn));
                    if(mysqli_num_rows($result4) > 0):
                        $row4 = mysqli_fetch_assoc($result4);
                        if($email == $row4['email']){
                            $errEmail = 'This email is already used';
                        }else{
                        $email = mysqli_real_escape_string($conn, $email);
                        }
                    endif;
                }else{
                    $errEmail = "Enter a valid email";
                }       
        };
        // Phone field
        if(empty($_POST['phone'])){
            $errPhone = "phone field must to be filled";
        }else{
            if (!preg_match("/^[0-9 +']*$/",$_POST['phone'])) {
                $errPhone = "Only numbers and  (+) sign allowed";
            }else{
                $phone = $_POST['phone'];

                $phone = filter_var($phone, FILTER_SANITIZE_STRING);
                $phone = htmlspecialchars($phone);
                $phone = trim($phone);
                    $sql3 = "SELECT phone FROM user WHERE phone = '{$phone}'";
                    $result3 = mysqli_query($conn, $sql3) or die('filed ' . mysqli_error($conn));
                    if(mysqli_num_rows($result3) > 0):
                        $row3 = mysqli_fetch_assoc($result3);
                        if($phone== $row3['phone']){
                            $errPhone = 'This number is already used';
                        }else{
                        $phone = mysqli_real_escape_string($conn,$phone);
                        }
                   endif;
            };
        };

                // username field
                if(empty($_POST['username'])){
                    $errUsername = "username field must to be filled";
                }else{
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST['username'])) {
                        $errUsername = "Only letters allowed";
                    }else{
                        $username = $_POST['username'];

                            $username = filter_var($username, FILTER_SANITIZE_STRING);
                            $username = htmlspecialchars($username);
                            $username = trim($username);
                                $sql2 = "SELECT username FROM user WHERE username = '{$username}'";
                                $result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
                                if(mysqli_num_rows($result2) > 0):
                                    $row2 = mysqli_fetch_assoc($result2);

                                    if($username == $row2['username']){
                                        $errUsername = 'username taken. try another one.';
                                    }else{
                                        $username = mysqli_real_escape_string($conn,$username);
                                    }    
                                endif;
                    }
                };

                 // age field
                 if(empty($_POST['age'])){
                    $errAge = "age field must to be filled";
                }else{
                    if (!is_numeric($_POST['age'])) {
                        $errAge = "Only numbers allowed";
                    }else{
                        $age = $_POST['age'];
                        $age = filter_var($age, FILTER_SANITIZE_NUMBER_INT);
                        $age = htmlspecialchars($age);
                        $age = trim($age);
                    }
                };

                // Password

                if(empty($_POST['password'])){
                    $errPass = "Password Filed must to be filled";
                }else{
                    $pass = $_POST['password'];
                    $pass = password_hash($pass, PASSWORD_DEFAULT);
                }

         
                if(empty($errName) && empty($errAge) && empty($errEmail) && empty($errPhone) && empty($errUsername) && empty($errPass)){
                    $sql = "INSERT INTO user (name, email, phone, age, username, password)
                    VALUES('{$name}','{$email}', '{$phone}', {$age}, '{$username}', '{$pass}')"; 
                    $result = mysqli_query($conn, $sql) or die('query failed: ' . mysqli_error($conn));
                }

?>




   <div class="container">
        <div class="login-form">
            <h2>Registration Form</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="needs-validation" novalidate>
              <div class="form-group">
                     <label for="name">Name:</label>
                     <input type="text" class="form-control" id="name" placeholder="Enter fullname" name="name">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid">
                        <?php if(!empty($errName)){echo $errName;}  ?>
                    </div>
                </div>
                <div class="form-group">
                     <label for="email">Email:</label>
                     <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid">
                      <?php if(!empty($errEmail)){echo $errEmail;}  ?>
                    </div>
                </div>
                <div class="form-group">
                     <label for="phone">Phone:</label>
                     <input type="text" class="form-control" id="phone" placeholder="Enter phone number" name="phone">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid">
                      <?php if(!empty($errPhone)){echo $errPhone;}  ?>
                    </div>
                </div>
                <div class="form-group">
                     <label for="age">Age:</label>
                     <input type="number" class="form-control" id="age" placeholder="Enter your age" name="age">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid">
                      <?php if(!empty($errAge)){echo $errAge;}  ?>
                    </div>
                </div>
                <div class="form-group">
                     <label for="uname">Username:</label>
                     <input type="text" class="form-control" id="uname" placeholder="Enter username" name="username" >
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid">
                      <?php if(!empty($errUsername)){echo $errUsername;}  ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid">
                      <?php if(!empty($errPass)){echo $errPass;}  ?>
                    </div>
                </div>
                <div class="form-group form-check">
                    <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="remember" required> I agree on terns & conditions.
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Check this checkbox to continue.</div>
                    </label>
                </div>
                <button type="submit" name="save" class="btn btn-primary">Submit</button>
             </form>
        </div>
   </div>

<?php endif;?>
</body>
</html>