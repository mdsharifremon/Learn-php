<?php 
    require_once 'config.php';
    session_start();

if(isset($_POST['submit'])){
$err_email = $err_pass = '';

    if($_SERVER['REQUEST_METHOD'] == 'POST'):

    // Email 
        if(!empty($_POST['username'])):
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            if(empty($_POST['password'])):
                $err_pass = 'Password is not given';
            else:
                 $password = $_POST['password'];
            endif;
            $sql = "SELECT username, email, pass, status FROM activation WHERE username = '{$username}' OR email = '{$username}'";
            $result = mysqli_query($conn, $sql) or die('Insert failed: ' . mysqli_error($conn));
            if(mysqli_num_rows($result) > 0):
                $row = mysqli_fetch_assoc($result);
                $status = $row['status'];
                $email = $row['email'];
                $uname = $row['username'];
                $pass = $row['pass'];
                if($status == 'active'){
                    if(password_verify($password, $pass)){
                    $_SESSION['name'] = $uname;
                        if(isset($_POST['remember'])){
                            $time = time() + 15552000;
                            setcookie('email_cookie', $email, $time);
                            setcookie('pass_cookie', $password, $time);
                            header('location:home.php');
                        }else{
                            header('location:home.php');
                        };
                    }else{
                        $err_pass = 'Password is incorrect';
                    };
                }else{
                    $err_status = 'Your account is not active.Please active your account';
                };
             
            else:
                $err_email = "No such email or username exist";
            endif;
        else:
            $err_email = "This field can't be empty";
        endif;
    endif;
};
?>

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

a.btn{width: 100%; display:block; margin: 12px auto; text-align:center;}
    a.btn .fa{margin-right:10px;} 

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

    .login-btn p.status {
        border-radius: .25rem;
        background-color: var(--success);
        color: #fff;
        padding: 5px 20px;
        text-align: center;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="form">
            <h2>Log In Form</h2>
            <div class="login-btn">
                <a class="btn btn-primary" href="http://localhost/googleapi/index.php" type="button" name="google">
                   <i class="fa fa-google"></i>Login Via Gmail
                </a>
                <a class="btn btn-danger" type="button" name="facebook">
                   <i class="fa fa-facebook"></i>Login Via Facebook
                </a>

                <?php 
                    if(isset($_SESSION['msg'])){ 
                        $msg = $_SESSION['msg'];
                        echo "<p class='status'>$msg</p>";
                    };
                    if(!empty($err_status)){ 
                            echo "<p class='status'> $err_status </p>";
                    }; 
                 ?>
            </div>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" auto-complete="off">

                <!---- Username ---->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username Or Email" name="username" value="<?php
                    if(isset($_COOKIE['email_cookie'])){echo $_COOKIE['email_cookie'];}?>">
                    <?php if(!empty($err_email)): ?>
                    <span class="invalid"><?php echo $err_email ?></span>
                    <?php endif; ?>
                </div>

                <!---- Password ---->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    </div>
                    <input type="password" class="form-control" placeholder="Password" name="password" value="<?php
                    if(isset($_COOKIE['pass_cookie'])){echo $_COOKIE['pass_cookie'];}?>">
                    <?php if(!empty($err_pass)): ?>
                    <span class="invalid"><?php echo $err_pass; ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-check mb-2 mr-sm-2">
                    <label class="form-check-label">
                        <input class="form-check-input" name="remember" type="checkbox"> Remember me
                    </label>
                </div>

                <!---- Submit Button ---->
                <input type="submit" class="btn btn-primary" name="submit" value="LOG IN">
            </form>
            <div class="have-ac">
                <a href="email.php" class="primary"> Create An Account. </a>
                <a href="recover.php" class="primary"> Forgot Password </a>
            </div>
        </div>
    </div>
</body>

</html>