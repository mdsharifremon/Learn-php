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
        padding: 30px;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="form">
            <h2>Registration Form</h2>
<?php
$error = [];
$error['fname'] = $error['lname'] = $error['gender'] = $error['age'] = $error['phone'] = $error['web'] = $error['email'] = $error['uname'] = $error['pass'] = $error['cpass'] = $error['file'] = '';


if($_SERVER['REQUEST_METHOD'] == 'POST'):

    // Validate Function 
    function validate($data){
        $data = trim($data);
        $data = filter_var($data, FILTER_SANITIZE_STRING);
        $data = stripslashes($data);
        $data = htmlentities($data);
        return $data;
    };

// First Name 
    if(!empty($_POST['fname'])):
        $tmp_fname = $_POST['fname'];
        if(preg_match("/^[a-zA-Z-]*$/", $tmp_fname)):
            $fname = validate($tmp_fname);
        else:
            $error['fname'] = "Number and special character is not allowed";
        endif;
    else:
        $error['fname'] = 'This field must not be empty';
    endif;

// Last Name 
    if(!empty($_POST['lname'])):
        $tmp_lname = $_POST['lname'];
         if(preg_match("/^[a-zA-Z-]*$/", $tmp_lname)):
            $lname = validate($tmp_lname);
        else:
            $error['lname'] = "Number and special character is not allowed";
        endif;
    else:
        $error['lname'] = 'This field must not be empty';
    endif;

// Gender 
    if(!empty($_POST['gender'])):
        $tmp_gender =$_POST['gender'];
        $sex = ['male', 'female', 'other'];
        if(in_array($tmp_gender, $sex)):
            $gender = $_POST['gender'];
        else:
           $error['gender'] = 'Select a right gender';
        endif;
    else:
        $error['gender'] = 'Any gender must to be checked';
    endif;
// Age
    if(!empty($_POST['age'])):
        $tmp_age = $_POST['age'];
        if(is_numeric($tmp_age)):
            $age = validate($tmp_age);
        else:
            $error['age'] = "Input your age in number";
        endif;

    else:
        $error['age'] = 'This field must not be empty';
    endif;
// Phone 
    if(!empty($_POST['phone'])):
        $tmp_phone = $_POST['phone'];
        if(preg_match("/[\d*\+]{11,14}/",$tmp_phone)):
            $phone = validate($tmp_phone);
        else:
            $error['phone'] = 'Input a valid phone number';
        endif;
    else:
        $error['phone'] = 'This field must not be empty';
    endif;
// Web 
    if(!empty($_POST['website'])):
        $tmp_web = $_POST['website'];
        $tmp_web = filter_var($tmp_web, FILTER_SANITIZE_URL);
        $tmp_web = filter_var($tmp_web, FILTER_VALIDATE_URL);
        if($tmp_web){
            $web = $_POST['website'];
        }else{
            $error['web'] = 'Input a valid url';
        }
    else:
        $error['web'] = 'This field must not be empty';
    endif;
// Email 
    if(!empty($_POST['email'])):
        $tmp_email = $_POST['email'];
        $tmp_email = filter_var($tmp_email, FILTER_SANITIZE_EMAIL);
        $tmp_email = filter_var($tmp_email, FILTER_VALIDATE_EMAIL);
        if($tmp_email){
            $email = $_POST['email'];
        }else{
            $error['email'] = 'Input a valid email';
        }
    else:
        $error['email'] = 'This field must not be empty';
    endif;
// Username 
    if(!empty($_POST['username'])):
         $tmp_uname = $_POST['username'];
        if(preg_match("/^([a-zA-Z])([a-zA-Z0-9])([^\s]){5,20}$/", $tmp_uname)):
            $uname = validate($tmp_uname);
        else:
            $error['uname'] = "Number, special character & spaces are not allowed";
        endif;
    else:
        $error['uname'] = 'This field must not be empty';
    endif;
// Password 
    if(!empty($_POST['password'])):
        $tmp_pass = $_POST['password'];
        if(strlen($tmp_pass) <= 8 && strlen($tmp_pass) >= 20):
           $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
        else:
            $error['pass'] = "Password must be in 8-20 char";
        endif;
    else:
        $error['pass'] = 'This field must not be empty';
    endif;
// Confirm Password 
    if(!empty($_POST['cpass'])):
        if($_POST['cpass'] !== $_POST['password']):
            $error['cpass'] = "Password Doesn't Match";
        else:
            $cpass = password_hash($_POST['cpass'], PASSWORD_DEFAULT);
        endif;
    else:
        $error['cpass'] = 'Password is not confirmed';
    endif;
// Confirm Password 
    if(isset($_POST['file'])):
    else:
        $error['file'] = 'Please choose an image';
    endif;
endif;

?>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">

<!-- First Name --->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user-o"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="First Name" name="fname">
                     <?php if(!empty($error['fname'])): ?>
                       <span class="invalid"><?php echo $error['fname']; ?></span>
                    <?php endif; ?>
                </div>

<!-- Last Name --->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user-circle-o"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Last Name" name="lname">
                    <?php if(!empty($error['lname'])): ?>
                       <span class="invalid"><?php echo $error['lname']; ?></span>
                    <?php endif; ?>
                </div>

<!-- Gender --->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Sex:</span>
                    </div>
                    <div class="box">
                        <div class="option">
                            <input type="radio" value="male" id="male" name="gender" <?php if(!empty($_POST['gender']) && $_POST['gender']  == 'male'){echo "checked='checked'";} ?>>
                            <label for="male">Male</label>
                        </div>
                        <div class="option">
                            <input type="radio" value="female" id="female" name="gender" <?php if(isset($_POST['gender']) && $_POST['gender'] == 'female'){echo "checked='checked'";} ?>>
                            <label for="female">Female</label>
                        </div>
                        <div class="option">
                            <input type="radio" value="other" id="other" name="gender" <?php if(isset($_POST['gender']) && $_POST['gender'] == 'other'){echo "checked='checked'";} ?>>
                            <label for="other">Other</label>
                        </div>
                    </div>
                    <?php if(!empty($error['gender'])): ?>
                       <span class="invalid"><?php echo $error['gender']; ?></span>
                    <?php endif; ?>
                </div>

<!--- Age --->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <input type="number" class="form-control" placeholder="Age" name="age">
                     <?php if(!empty($error['age'])): ?>
                       <span class="invalid"><?php echo $error['age']; ?></span>
                    <?php endif; ?>
                </div>

<!--- Phone --->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Phone" name="phone">
                     <?php if(!empty($error['phone'])): ?>
                       <span class="invalid"><?php echo $error['phone']; ?></span>
                    <?php endif; ?>
                </div>

<!--- Website --->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-desktop"></i></span>
                    </div>
                    <input type="url" class="form-control" placeholder="Website" name="website">
                     <?php if(!empty($error['web'])): ?>
                       <span class="invalid"><?php echo $error['web']; ?></span>
                    <?php endif; ?>
                </div>

<!--- Email ---->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-envelope-o"></i></span>
                    </div>
                    <input type="email" class="form-control" placeholder="Email" name="email">
                     <?php if(!empty($error['email'])): ?>
                       <span class="invalid"><?php echo $error['email']; ?></span>
                    <?php endif; ?>
                </div>

<!---- Username ---->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username" name="username">
                     <?php if(!empty($error['uname'])): ?>
                       <span class="invalid"><?php echo $error['uname']; ?></span>
                    <?php endif; ?>
                </div>

<!---- Password ---->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-unlock-alt"></i></span>
                    </div>
                    <input type="password" class="form-control" placeholder="Password" name="password">
                     <?php if(!empty($error['pass'])): ?>
                       <span class="invalid"><?php echo $error['pass']; ?></span>
                    <?php endif; ?>
                </div>

<!---- Confirm Password ---->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    </div>
                    <input type="password" class="form-control" placeholder="Confirm Password" name="cpass">
                     <?php if(!empty($error['cpass'])): ?>
                       <span class="invalid"><?php echo $error['cpass']; ?></span>
                    <?php endif; ?>
                </div>

 <!--- File ----->               
            <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-file"></i></span>
                    </div>
                    <input type="file" class="form-control" name="file">
                    <?php if(!empty($error['file'])): ?>
                       <span class="invalid"><?php echo $error['file']; ?></span>
                    <?php endif; ?>
                </div>

<!---- Submit Button ---->
                <input type="submit" class="btn btn-primary" name="submit" value="SUBMIT">
            </form>

            <div>
                <h4>Result</h4>
                <?php
                
                echo $fname . '<br>';
                echo $lname . '<br>';
                echo $gender . '<br>';
                echo $age . '<br>';
                echo $phone . '<br>';
                echo $web . '<br>';
                echo $email . '<br>';
                echo $uname . '<br>';
                echo $pass . '<br>';
                echo $cpass . '<br>';          
                ?>
            </div>
        </div>
    </div>
</body>
</html>