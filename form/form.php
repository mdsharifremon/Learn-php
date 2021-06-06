<?php 
$fname = $lname = $age = $phone = $web = $email = $uname = $pass = $cpass = '';
$err_fname = $err_lname = $err_age = $err_phone = $err_web = $err_email = $err_uname = $err_pass = $err_cpass = '';
$errors = [];
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
  *,:before,:after{box-sizing:border-box;padding:0; margin:0;}
    .container{display: flex;justify-content: center;align-items: center; min-height:100vh;}
    .form{width:100%;max-width:450px; border-radius:6px; overflow:hidden;
           border:2px solid #eee;}
    .form h2{background:blue; color:#fff; line-height:60px; text-align:center; width:100%;}
    .form form{padding:30px;}
    .form form input[type="submit"]{width:100%; display:block;}
    span.invalid{display:block;width:100%; color:red; }
  </style>
</head>
<body>

<div class="container">
    <div class="form">
        <h2>Registration Form</h2>

      <?php require_once 'validate.php';?>

        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
           <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-user-o"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="First Name" name="fname">
                <span class="invalid"><?php echo $err_fname; ?></span>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-user-circle-o"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Last Name" name="lname">
                <span class="invalid"><?php echo $err_lname; ?></span>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                </div>
                <input type="number" class="form-control" placeholder="Age" name="age">
                <span class="invalid"><?php echo $err_age; ?></span>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-phone"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Phone" name="phone">
                <span class="invalid"><?php echo $err_phone; ?></span>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                   <span class="input-group-text"><i class="fa fa-desktop"></i></span>
                </div>
                <input type="url" class="form-control" placeholder="Website" name="website">
                <span class="invalid"><?php echo $err_web; ?></span>
             </div>

             <div class="input-group mb-3">
                <div class="input-group-prepend">
                   <span class="input-group-text"><i class="fa fa-envelope-o"></i></span>
                </div>
                <input type="email" class="form-control" placeholder="Email" name="email">
                <span class="invalid"><?php echo $err_email; ?></span>
             </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                   <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Username" name="username">
                <span class="invalid"><?php echo $err_uname; ?></span>
             </div>

             <div class="input-group mb-3">
                <div class="input-group-prepend">
                   <span class="input-group-text"><i class="fa fa-unlock-alt"></i></span>
                </div>
                <input type="password" class="form-control" placeholder="Password" name="password">
                <span class="invalid"><?php echo $err_pass; ?></span>
             </div>

             <div class="input-group mb-3">
                <div class="input-group-prepend">
                   <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                <input type="password" class="form-control" placeholder="Confirm Password" name="cpass">
                <span class="invalid"><?php echo $err_cpass; ?></span>
             </div>
             <input type="submit" class="btn btn-primary" name="submit" value="SUBMIT">
        </form> 

        <?php     
               echo $fname . '<br>';
               echo $lname . '<br>';
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


</body>
</html>