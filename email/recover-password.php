<?php 
require_once 'config.php';

if(isset($_POST['submit'])){
    if(isset($_GET['token'])){
        $token = $_GET['token'];
        if($_SERVER['REQUEST_METHOD'] == 'POST'):
        $error = [];
        $err_pass = $err_cpass = '';
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
    if(empty($error)):
            echo $sql = "UPDATE activation SET pass = '{$pass}', cpass = '{$cpass}' WHERE token = '{$token}'";
            $result = mysqli_query($conn, $sql) or die('Update failed: '. mysqli_error($conn));
            if($result){
               header('location:login.php');
            }else{echo 'update failed';}; 
        endif;
    }else{
        echo 'else ';
        echo $token = $_GET['token'];
    };
};
?>
<DOCTYPE html>
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
        flex-direction:column;
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
        padding: 20px 30px;
    }

    .form form {
        padding-top: 10px;
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

    .login-btn {
        padding: 10px 30px;
    }

    button.btn {
        width: 100%;
        display: block;
        margin: 12px auto;
        text-align: center;
    }

    button.btn .fa {
        margin-right: 10px;
    }

    .have-ac {
        padding: 0 30px;
        padding-bottom: 30px;
        display: flex;
        justify-content: space-between;
    }

    .have-ac a {
        text-decoration: underline;
        display: block;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="form">
            <h2>Create A New Password</h2>
            
            <form action="" method="post" auto-complete="off">
<!---- Password ---->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-unlock-alt"></i></span>
                    </div>
                    <input type="password" class="form-control" placeholder="New Password" name="password">
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
                <input type="submit" class="btn btn-primary" name="submit" value="UPDATE PASSWORD">
            </form>
            <div class="have-ac">
                <a href="email.php" class="primary"> Create An Account. </a>
                <a href="login.php" class="primary">Log In </a>
            </div>
        </div>
    </div>
</body>

</html>
