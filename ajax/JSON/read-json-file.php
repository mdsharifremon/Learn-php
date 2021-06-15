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
                <h1>PHP CRUD WITH AJAX</h1>
                <div class="search">
                    <input type="text" name="search" placeholder="search" id="search">
                </div>
            </div>
            <div id="records">
                <table>
                     <thead>
                        <tr>
                            <th>Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Age</th>
                        </tr>    
                     </thead>
                     <tbody id="tableData">
                     <?php
                     $file = file_get_contents('json-files/user.json');
                     $data = json_decode($file,true);

                     foreach($data as list('id' => $id, 'fname' => $fname, 'lname' => $lname, 'age' => $age)){
                            echo "<tr>
                                    <td>$id</td>
                                    <td>$fname</td>
                                    <td>$lname</td>
                                    <td>$age</td>
                             </tr>";

                     };
                     
                     
                     ?>
                     </tbody>
                </table>
                <p id="error"></p>
            </div>
        </div>
    </div>
</body>
</html>