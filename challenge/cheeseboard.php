<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cheeseboard</title>
    <style>
        *{
            padding:0;
            margin:0;
            box-sizing:border-box;
        }
        .container {
            max-width: 1000px;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        form input[type='number'] {
            outline: none;
            padding: 8px 15px;
            display: block;
            width: 240px;
            border: 1px solid #eee;
            margin: 5px 0;
        }

        form input[type="submit"] {
            outline: none;
            padding: 10px;
            text-align: center;
            display: block;
            width: 240px;
            background: #eee;
            border:none;
            color: purple;
        }
        table{border:3px solid #000;}
        td{padding:20px;color:#000;}
        .bg-dark{
            background:#000;
            color:#fff;
        }
        /** Mainly with Css */
        /* tr:nth-child(even) > td:nth-child(even){
            background:#000;
        }
        tr:nth-child(even) > td:nth-child(odd){
            background:#eee;
        }
        tr:nth-child(odd) > td:nth-child(even){
            background:#eee;
        }
        tr:nth-child(odd) > td:nth-child(odd){
            background:#000;
        } */
    </style>
</head>

<body>

    <div class="container">
        <div class="form">
            <form action="" method="post">
                <input type="number" name="cb" id="" placeholder="input field">
                <input type="submit" value="submit" name='submit' required="required">
            </form>
        </div>
        <table cellpadding="0" cellspacing="0">
            <?php 
              if(isset($_POST['submit'])){
                    $data = $_POST['cb'];
                    for($i = 1; $i <= $data; $i++){
                            echo "<tr>";
                                for($col = 1; $col <= $data; $col++){
                                    //echo "<td></td>"; simple way mainly with css.
                                   if(($col + $i) % 2 == 0){ // Mainly with php
                                       echo "<td class='bg-dark'></td>";
                                   }else{
                                       echo "<td></td>";
                                   }
                                }
                            echo "</tr>";
                    }
               }
           ?> 
        </table>
   
    </div>

</body>

</html>