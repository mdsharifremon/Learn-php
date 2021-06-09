<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax - PHP</title>
    <style>
    *,
    :before,
    :after {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    .container {
        margin: 30px auto;
        max-width: 900px;
        border: 2px solid #eee;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 60vh;
        padding: 20px;
        /* border-radius:5px;
                box-shadow: -1px -1px 25px 1px rgb(0 0 0 / 14%), 1px 1px 28px 1px rgb(0 0 0 / 12%); */
    }

    h1 {
        background: aqua;
        color: #000;
        text-align: center;
        line-height: 50px;
    }

    table {
        width: 100%;
        box-shadow: -1px -1px 25px 1px rgb(0 0 0 / 14%), 1px 1px 28px 1px rgb(0 0 0 / 12%);
    }

    table tr.btn {
        width: 100%;
        background: purple;
        color: #fff;
        display: flex;
        justify-content: center;
    }

    button.btn {
        padding: 10px 30px;
        outline: none;
        background: #fff;
        color: purple;
        border: none;
        margin: 10px 0;
        text-transform: uppercase;
        font-size: 16px;
        font-weight: 700;
        border-radius: 3px;
    }

    table.inner {
        background: purple;
        border-width: 1px;
    }

    .inner td,
    .inner th {
        padding: 5px;
        background: #eee;
        align: center;
        text-align: center;
    }

    .form {
        width: 450px;
    }

    .form input {
        width: 100%;
        padding: 8px 15px;
        margin: 5px 0;
        outline: none;
        border: none;
    }

    .form input[type="submit"] {
        width: 100%;
        background: aqua;
        color: #000;
        text-align: center;
        padding: 10px;
        text-transform: uppercase;
        font-weight: 700;
    }
    </style>
</head>

<body>
    <div class="container">
        <table cellpadding="0" cellspacing="0">
            <tr>
                <td>
                    <h1>Ajax with PHP</h1>
                </td>
            </tr>
            <tr class='btn' id="table-load">
                <td>
                    <div class="form">
                        <input type="text" name="fname" id="fname" placeholder="First Name">
                        <input type="text" name="lname" id="lname" placeholder="Last Name">
                        <input type="number" name="age" id="age" placeholder="Age">
                        <input type="submit" name="save" id="save" value="save">
                    </div>
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
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    $(document).ready(()=> {

        function loadTable(){
                $.ajax({
                    url : 'ajaxload.php',
                    type: 'POST',
                    success: (data) => {
                        $('#table-data').html(data);
                    }
                });
        };
        loadTable();

        $('#save').on('click', (e) => {
            e.preventDefault();
            let fname = $('#fname').val();
            let lname = $('#lname').val();
            let age = $('#age').val();
            //console.log(fname, lname, age);

            $.ajax({
                    url : 'ajax-insert.php',
                    type : 'POST',
                    data : {
                            first_name : fname,
                            last_name : lname,
                            age : age
                          },
                    success: (data) => {
                        if(data == 1){
                            loadTable();
                        }else{
                            alert('Insert Failed');
                        };
                    },
            });
        });
    });

    </script>
</body>

</html>