<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="dist/style.css">
    <title>OOP & AJAX</title>
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
            <div class="insert">
                <h2 class="txt-center">Insert User</h2>
                <div class="form">
                    <input type="text" name="" id="fname" placeholder="First Name">
                    <input type="text" name="" id="lname" placeholder="Last Name">
                    <input type="number" name="" id="age" placeholder="Age" autocomplete="off">
                    <input type="text" name="" id="city" placeholder="city" autocomplete="off">
                    <input type="text" name="" id="dob" placeholder="Data Of Birth">
                    <input type="submit" name="" id="save" value="Submit">
                    <p id="error">Error</p>
                    <p id="success">Success</p>
                </div>
            </div>
            <div id="records">
                <table>
                    <thead>
                        <tr>
                            <th>User Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Age</th>
                            <th>City</th>
                            <th>Date Of Birth</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    <tbody id='table-data'>
                       
                    </tbody>
                </table>
            </div>


            <div id="modal">
                <div id="modal-form">
                    <h2 class="txt-center">Update User</h2>
                    <div class="form" id="update-form">
                    </div>
                    <p id="uerror"></p>
                <div id='close'>X</div>
                </div>
            </div>
        </div>
    </div>
    <script src="dist/jQuery.js"></script>
  <script src="dist/ajax.js"></script>
</body>

</html>