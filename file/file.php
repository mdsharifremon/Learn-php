<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>.container{max-width:1000px;margin:0 auto; border:2px solid #eee; padding:20px;}</style>
</head>
<body>
<div class="container">
<?php
    
   $file = fopen('newfile.txt', 'a+');
   $txt = 'remove the old line';

   fwrite($file, $txt);


?>  
</div>
</body>
</html>