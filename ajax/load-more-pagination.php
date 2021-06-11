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
            <tr>
                <td id="table-data">
                    <table class="inner" id="load-data">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Age</th>
                            </tr>
                        </thead>
                        <!-- Load Table Data --->
                        <!-- <tbody id="table-body">
                            <tr>
                                <td align="center">1</td>
                                <td align="center">Sharif</td>
                                <td align="center">Uddin</td>
                                <td align="center">27</td>
                            </tr>
                        </tbody>
                        <tbody id='table-pagination'>
                            <tr>
                                <td colspan='4'>
                                    <button id="load-more-btn" data-id=''>Load More</button>
                                </td>
                            </tr>
                        </tbody> -->
                        <!-- End Load Table Data ---->
                    </table>
                </td>
            </tr>
        </table>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="src/load-more-pagination.js"></script>
</body>

</html>