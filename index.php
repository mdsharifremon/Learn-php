<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon1.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>PHP</title>
</head>
<body>
<h1 class="heading">Learning PHP & JavaScript</h1>
<div class="box">

<div class="php">
<span>PHP<hr/></span>
<?php
       $a = array('one', 'two', 'three');
       $b = array('three', 'four', 5);
       $d = array(5, 'six', 5);
       $c = array_merge($a, $b, $d);

echo "<pre>";
print_r($c);
echo "</pre>";

?>
</div>
<div class="js"><span>Javascript<hr/></span><div id="output"></div></div>
</div>
<script src="learn.js"></script>
</body>
</html>
