<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container{max-width:1000px; margin: 0 auto;text-align:center;}
    </style>
</head>
<body>
<div class="container">
<?php 

$txt = "php is a server side scripting language. This language is widely used in web scripting. Nearly about 70% of web side is using php by anyhow, directly or indirectly. I am learning php from yahoo baba. Now todays lesson is regular expression or regex.";


$exp = '/[ ]/i';
echo preg_match_all($exp, $txt, $arr);

echo '<pre>';
print_r($arr);
echo '</pre>';


?>
</div>    
</body>
</html>