<?php 
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Validation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
    *,
    :before,
    :after {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .form {
        width: 100%;
        max-width: 450px;
        border-radius: 6px;
        overflow: hidden;
        border: 2px solid #eee;
    }

    .form h2 {
        background: blue;
        color: #fff;
        line-height: 60px;
        text-align: center;
        width: 100%;
    }

    .form form {
        padding:20px 30px;
    }

    .form form input[type="submit"] {
        width: 100%;
        display: block;
    }

    span.invalid {
        display: block;
        width: 100%;
        color: red;
    }

    .box {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .box .option label {
        margin-bottom: 0;
    }
    .box .option {
        margin-left: 30px;
    }
    .login-btn{padding:10px 30px;}
    a.btn{width: 100%; display:block; margin: 12px auto; text-align:center;}
    a.btn .fa{margin-right:10px;} 
    .have-ac{text-align:center; padding-bottom:30px;}
    .have-ac a{text-decoration:underline;}
    </style>
</head>
<body>
    <div class="container">
        <div class="form">
            <h2>Create Account</h2>
            <div class="login-btn">
                <a class="btn btn-primary" href="http://localhost/googleapi/index.php" type="button" name="google">
                   <i class="fa fa-google"></i>Login Via Gmail
                </a>
                <a class="btn btn-danger" type="button" name="facebook">
                   <i class="fa fa-facebook"></i>Login Via Facebook
                </a>
            </div>
<?php

$error = [];
$err_phone = $er_email = $err_uname = $err_pass = $err_cpass = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'):
    // Validate Function 
    function validate($data){
        $data = trim($data);
        $data = filter_var($data, FILTER_SANITIZE_STRING);
        $data = stripslashes($data);
        $data = htmlentities($data);
        return $data;
    };

// Username 
    if(!empty($_POST['username'])):
         echo $tmp_uname = trim($_POST['username']);
        if(preg_match("/([a-zA-Z0-9])([^\s])/", $tmp_uname)):
                // Fetch Data from database
                $sql1 = "SELECT username FROM activation WHERE username = '{$tmp_uname}'";
                $result1 = mysqli_query($conn, $sql1) or die("Fetch failed: " . mysqli_error($conn) );  
                if(mysqli_num_rows($result1) > 0):
                    $row1 = mysqli_fetch_assoc($result1);
                    if($row1['username'] == $tmp_uname){
                        $err_uname = "Username already exist";
                        array_push( $error,$err_uname);
                    };
                else:
                     $uname = validate($tmp_uname);
                endif;     
        else:
            $err_uname = "Number, special character & spaces are not allowed";
            array_push( $error,$err_uname);
        endif;
    else:
        $err_uname = 'This field must not be empty';
        array_push( $error,$err_uname);
    endif;

// Email 
    if(!empty($_POST['email'])):
        $tmp_email = $_POST['email'];
        $valid_email = filter_var($tmp_email, FILTER_SANITIZE_EMAIL);
        $tmp_email = filter_var($valid_email, FILTER_VALIDATE_EMAIL);
        if($tmp_email):
            // Fetch Email from database
            $sql2 = "SELECT email FROM activation WHERE email = '{$tmp_email}'";
            $result2 = mysqli_query($conn, $sql2) or die("Fetch failed: " . mysqli_error($conn) );
            if(mysqli_num_rows($result2)):
                $row2 = mysqli_fetch_assoc($result2);
                if($row2['email'] == $valid_email){
                        $err_email = "This email is already registered";
                        array_push( $error,$err_email);
                };
            else:
                $email = $valid_email;
            endif;            
        else:
            $err_email = 'Input a valid email';
            array_push($error, $err_email);
        endif;
    else:
        $err_email = 'This field must not be empty';
        array_push($error, $err_email);
    endif;

// Phone 
    if(!empty($_POST['phone'])):
        $tmp_phone = $_POST['phone'];
        if(preg_match("/[\d*\+]{11,14}/",$tmp_phone)):
             // Fetch Email from database
            $sql3 = "SELECT phone FROM activation WHERE phone = '{$tmp_phone}'";
            $result3 = mysqli_query($conn, $sql3) or die("Fetch failed: " . mysqli_error($conn) );
            if(mysqli_num_rows($result3)):
                $row3 = mysqli_fetch_assoc($result3);
                if($row3['phone'] == $tmp_phone){
                        $err_phone = "This number is already been used";
                        array_push( $error,$err_phone);
                };
            else:
                $phone = validate($tmp_phone);
            endif;             
        else:
            $err_phone = 'Input a valid phone number';
             array_push( $error,$err_phone);
        endif;
    else:
        $err_phone = 'This field must not be empty';
        array_push( $error,$err_phone);
    endif;
// Password 
    if(!empty($_POST['password'])):
        $tmp_pass = $_POST['password'];
        // if(strlen($tmp_pass) < 7 && strlen($tmp_pass) > 20):
            $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
        // else:
            //$error['pass'] = "Password must be in 8-20 char";
        //endif;
    else:
        $err_pass = 'This field must not be empty';
       array_push( $error,$err_pass);
    endif;
// Confirm Password 
    if(!empty($_POST['cpass'])):
        if($_POST['cpass'] !== $_POST['password']):
            $err_cpass = "Password Doesn't Match";
             array_push( $error,$err_cpass);
        else:
            $cpass = password_hash($_POST['cpass'], PASSWORD_DEFAULT);
        endif;
    else:
        $err_cpass = 'Password is not confirmed';
         array_push( $error,$err_cpass);
    
    endif;
endif;
?>
  <?php 
        if(isset($_POST['submit'])){
                if(empty($error)){
                    $token = bin2hex(random_bytes(15));
                    $sql = "INSERT INTO activation(username, email,phone, pass, cpass, token, status )
                    VALUES('{$uname}', '{$email}', '{$phone}', '{$pass}', '{$cpass}', '{$token}', 'inactive' )";
                    $result = mysqli_query($conn, $sql) or die('Insert failed: ' . mysqli_error($conn));
                    if($result){

                        $subject = "Account Activation Code";
                        $body = "hi $uname! Click here to activate your account
                        http://localhost/learning/PHP_learning/email/activate.php?token={$token}";
                        $headers = "From: sharifuddinremon@gmail.com";
                        if (mail($email, $subject, $body, $headers)) {
                            $_SESSION['msg'] = "Check Your mail To Activate Your Account $email.";
                            header('location:login.php');
                        } else {
                            echo "Email sending failed...";
                        };
                        
                    };
                };
            };
            ?>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" auto-complete="off">
<!---- Username ---->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username" name="username">
                     <?php if(!empty($err_uname)): ?>
                       <span class="invalid"><?php echo $err_uname; ?></span>
                    <?php endif; ?>
                </div>
<!--- Email ---->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-envelope-o"></i></span>
                    </div>
                    <input type="email" class="form-control" placeholder="Email" name="email">
                     <?php if(!empty($err_email)): ?>
                       <span class="invalid"><?php echo $err_email; ?></span>
                    <?php endif; ?>
                </div>
<!--- Phone --->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Phone" name="phone">
                     <?php if(!empty($err_phone)): ?>
                       <span class="invalid"><?php echo $err_phone; ?></span>
                    <?php endif; ?>
                </div>
<!---- Password ---->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-unlock-alt"></i></span>
                    </div>
                    <input type="password" class="form-control" placeholder="Password" name="password">
                        <?php if(!empty($err_pass)):
                            echo "<span class='invalid'>$err_pass</span>";
                         endif; ?>
                </div>
<!---- Confirm Password ---->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    </div>
                    <input type="password" class="form-control" placeholder="Confirm Password" name="cpass">
                     <?php if(!empty($err_cpass)): ?>
                       <span class="invalid"><?php echo $err_cpass; ?></span>
                    <?php endif; ?>
                </div>
<!---- Submit Button ---->
                <input type="submit" class="btn btn-primary" name="submit" value="SAVE">
            </form>
      
            <div class="have-ac">Have an account? <a href="login.php" class="primary"> Log In </a></div>
        </div>
    </div>
</body>
</html>