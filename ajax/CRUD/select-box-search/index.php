<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../dist/style.css">
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

            <div class="insert">
                <h2 class="txt-center">Search By City</h2>
                <div class="form"> 
                    <select id="city">
                        <option disabled="disabled" selected>Select Your City</option>
                    </select>
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
                        </tr>
                    </thead>

                    <tbody id='table-data'>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="../../dist/jQuery.js"></script>
    <script>
jQuery(document).ready(($)=>{

    function loadData(type,id){
        $.ajax({
            url  : 'load-data.php',
            type : 'POST',
            data : {type: type, id : id},
            success : function(data){
                    if(type == 'user'){
                        $('#table-data').html('');
                        $('#table-data').append(data);
                    }else{
                        $('#city').append(data);
                    }
            }
        });
    };
    loadData();

    $('#city').on('change', function(){
        let id = $(this).val();
        loadData('user',id);
    });

});


    </script>
</body>

</html>