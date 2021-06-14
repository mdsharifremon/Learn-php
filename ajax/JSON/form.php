<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../dist/style.css">
    <title>PHP & AJAX</title>
</head>

<body>
    <div class="container">
        <div class="content-box">
            <div class="header">
                <h1>JSON FROM FORM DATA</h1>
                <div class="search">
                    <input type="text" name="search" placeholder="search" id="search">
                </div>
            </div>
            <div class="insert">
                <h2 class="txt-center">Insert User</h2>
                <div class="form">
                    <form action="save.php" method="POST">
                        <input type="text" name="fname" id="fname" placeholder="First Name">
                        <input type="text" name="lname" id="lname" placeholder="Last Name">
                        <input type="number" name="age" id="age" placeholder="Age" autocomplete="off">
                        <input type="submit" name="save" id="save" value="Submit">
                    </form>
                    <p id="error">Error</p>
                    <p id="success">Success</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>