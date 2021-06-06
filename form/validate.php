<?php 

if($_SERVER["REQUEST_METHOD"] == 'POST'):

         function validate ($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
         return $data;
         };

// fname
         if(empty($_POST['fname'])):
            $err_fname = 'This field must to be filled';
         else:
            $fname = validate($_POST['fname']);
         endif;

// lname
         if(empty($_POST['lname'])):
            $err_lname = 'This field must to be filled';
         else:
            $fname = validate($_POST['fname']);
         endif;

// age
         if(empty($_POST['age'])):
            $err_age = 'This field must to be filled';
         else:
            $age   = validate($_POST['age']);
         endif;

// phone
         if(empty($_POST['pone'])):
            $err_phone = 'This field must to be filled';
         else:
            $phone = validate($_POST['phone']);
         endif;

// web
         if(empty($_POST['website'])):
            $err_web = 'This field must to be filled';
         else:
            $web   = validate($_POST['website']);
         endif;

// email
         if(empty($_POST['email'])):
            $err_email = 'This field must to be filled';
         else:
            $email = validate($_POST['email']);
         endif;

// username
         if(empty($_POST['username'])):
            $err_uname = 'This field must to be filled';
         else:
            $uname = validate($_POST['username']);
         endif;

// pass
         if(empty($_POST['password'])):
            $err_pass = 'This field must to be filled';
         else:
            $password  = $_POST['password'];
            $pass  =  password_hash($password, PASSWORD_DEFAULT);
         endif;

// confirm password
         if(empty($_POST['cpass'])):
            $err_cpass = 'This field must to be filled';
         else:
            $cpassword  = $_POST['cpass'];
                if($password == $cpassword):
                    $cpass =  password_hash($cpassword, PASSWORD_DEFAULT);
                else: 
                    $err_cpass = "Password doesn't match";
                endif;
         endif;
          
endif;
?>