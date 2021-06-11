<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/style.css">

    <title>Ajax - PHP</title>
</head>

<body>
    <div class="container">
        <table cellpadding="0" cellspacing="0">
            <tr>
                <td>
                    <div class='top'>
                        <h1>Ajax with PHP</h1>
                        <div class="search-box">
                            <input type="text" id="search" placeholder="Search..." autocomplete="off">
                        </div>
                    </div>

                </td>
            </tr>
            <tr class='table-btn' id="table-load">
                <td>
                    <div class="form">
                        <h2>Insert new record</h2>
                        <input type="text" name="fname" id="fname" placeholder="First Name">
                        <input type="text" name="lname" id="lname" placeholder="Last Name">
                        <input type="number" name="age" id="age" placeholder="Age">
                        <input type="submit" name="save" id="save" value="save">
                    </div>
                    <p id="error"></p>
                    <p id="success"></p>
                </td>
            </tr>
            <tr>
                <td id="table-data">
                    <table class="inner">
                        <tr>
                            <th>Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Age</th>
                        </tr>
                        <tr>
                            <td align="center">1</td>
                            <td align="center">Sharif</td>
                            <td align="center">Sharif</td>
                            <td align="center">Sharif</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <div id="modal">
            <div id="modal-form">
                <h2>Edit Data</h2>
                <div id="modal-form-fill">
                    <table width="100%" class="update-form">
                        <tr>
                            <td>First Name: </td>
                            <td><input type="text" id="update-fname"></td>
                        </tr>
                        <tr>
                            <td>Last Name: </td>
                            <td><input type="text" id="update-lname"></td>
                        </tr>
                        <tr>
                            <td>Age: </td>
                            <td><input type="number" id="update-age"></td>
                        </tr>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" id="update-btn" value="Update"></td>
                        </tr>
                    </table>
                </div>
                <div id="close-btn"><span></span><span></span></div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="src/ajax.js"></script>
</body>

</html>