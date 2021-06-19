<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Range slider</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link rel="stylesheet" href="../dist/style.css">
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

            <p style="padding:20px">
                <label for="age">Age range:</label>
                <input type="text" id="age" readonly>
                <div id="slider-range"></div>
            </p>



            <div id="records">
                <table>
                    <thead>
                        <tr>
                            <th>User Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Age</th>
                            <th>City</th>
                        </tr>
                    </thead>

                    <tbody id='table-data'>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
 
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  jQuery(document).ready(function($) {

        let min = 22;
        let max = 40;
        $( "#slider-range" ).slider({
        range: true,
        min: 16,
        max: 80,
        values: [ min, max ],
        slide: function( event, ui ) {
            $( "#age" ).val( "" + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
            min = ui.values[ 0 ];
            max = ui.values[ 1 ];
            loadData(min,max);
        }
        });
        $( "#age" ).val( "" + $( "#slider-range" ).slider( "values", 0 ) +
        " - " + $( "#slider-range" ).slider( "values", 1 ));

        function loadData(min,max){
            $.ajax({
                url : 'load-table.php',
                type : 'POST',
                data : {min : min, max : max },
                success : function(data){
                    $('#table-data').html('');
                    $('#table-data').append(data);
                }
            })
        };
        loadData(min,max);



  });
  </script>
</body>
</html>
