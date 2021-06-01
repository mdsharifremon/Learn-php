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
    </style>
    <title>Document</title>
</head>
<body>

   <div class="container">
        <div class="login-form">
            <h2>Login Form</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="needs-validation" novalidate>
                <div class="form-group">
                     <label for="uname">Username:</label>
                     <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname" >
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group form-check">
                    <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="remember" required> I agree on conditions.
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Check this checkbox to continue.</div>
                    </label>
                </div>
                <button type="submit" name="save" class="btn btn-primary">Submit</button>
             </form>
        </div>
   </div>




<script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script> 
</body>
</html>