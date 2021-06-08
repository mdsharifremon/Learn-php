<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
            *{padding:0; margin:0; box-sizing:border-box;}
            .container{max-width:1000px;margin-left:auto;margin-right:auto;}
            header{display:flex;justify-content:space-between;padding:30px 0;}
    </style>
</head>
<body>
<div class="container">
    <header>
        <div class="brand">
            Welcome To Website
        </div>
        <div class="logout">
            <a href="logout.php">Logout</a>
        </div>
    </header>

    <h1><?php if(isset($_SESSION['name'])){
        echo $_SESSION['name'];
    }; ?></h1>
</div>    
</body>
</html>