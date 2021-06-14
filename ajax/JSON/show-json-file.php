<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dist/style.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="content-box">
            <div class="header">
                <h1>AJAX JSON WITH JQUERY</h1>
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
                    <tbody id="data">
                      <?php
                          $file = 'new.json';
                          $json_data = file_get_contents($file);
                          $decode = json_decode($json_data,true);
                          foreach($decode as list("id" => $id, "fname" => $fname, "lname" => $lname, "age" => $age)){
                              echo "<tr>
                                          <td>{$id}</td>
                                          <td> {$fname}</td>
                                          <td> {$lname}</td>
                                          <td> {$age}</td>
                                      </tr>";
                          };
                       ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>

</html>