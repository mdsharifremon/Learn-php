<?php 
    require_once 'config.php';
    session_start();

if(isset($_POST['submit'])){
$err_email ='';
    if($_SERVER['REQUEST_METHOD'] == 'POST'):
    // Email 
        if(!empty($_POST['email'])):
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $sql = "SELECT username, token FROM activation WHERE email = '{$email}'";
            $result = mysqli_query($conn, $sql) or die('Insert failed: ' . mysqli_error($conn));
            if(mysqli_num_rows($result) > 0):
                $row = mysqli_fetch_assoc($result);
                $uname = $row['username'];
                $token = $row['token'];
                $subject = "Recover Password";
                $body = "hi $uname! Click here to activate your account
                        http://localhost/learning/PHP_learning/email/recover-password.php?token={$token}";
                        $headers = "From: sharifuddinremon@gmail.com";
                        if (mail($email, $subject, $body, $headers)) {
                            header('location:login.php');
                        } else {
                            echo "Email sending failed...";
                        };
                
            else:
                $err_email = "No such email  is registered.";
            endif;
        else:
            $err_email = "This field can't be empty";
        endif;
    endif;
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
            <h2>Recover Password</h2>
            <p style="padding:0 20px;text-align:center;">A mail will be send to your email.</p>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" auto-complete="off">

                <!---- Username ---->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                    </div>
                    <input type="email" class="form-control" placeholder="Enter your email" name="email">
                    <?php if(!empty($err_email)): ?>
                        <span class="invalid"><?php echo $err_email ?></span>
                    <?php endif; ?>
                </div>

                <!---- Submit Button ---->
                <input type="submit" class="btn btn-primary" name="submit" value="SEND">
            </form>
            <div class="have-ac">
                <a href="email.php" class="primary"> Create An Account. </a>
                <a href="login.php" class="primary">Log In </a>
            </div>
        </div>
    </div>
</body>

</html>
