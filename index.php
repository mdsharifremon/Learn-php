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

$marks = array(

   array('Karim', 80, 60, 70),
   array('Rahim',90, 89, 69),
   array('Zabbar', 89, 50, 59),
   array('Kamrul', 98, 90, 89),
   array('Akter', 69, 58, 57),
   array('Rafiqul', 79, 60, 99)
);


echo count($marks[1], 1) . "<br>";
echo sizeof($marks[0], 1) . "<br>";

echo "<table border='2px'>";

echo "<tr><th>Name</th><th>Physicis</th><th>Eng</th><th>Math</th></tr>";

foreach ($marks as list($n, $a, $b, $c)){

    echo "<tr>
                <td>$n</td>
                <td>$a</td>
                <td>$b</td>
                <td>$c</td>
          </tr>";
};
echo "</table>";
?>
</div>
<div class="js"><span>Javascript<hr/></span><div id="output"></div></div>
</div>
<script src="learn.js"></script>
</body>
</html>
