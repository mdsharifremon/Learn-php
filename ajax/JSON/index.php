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
                     
                     </tbody>
                </table>
                <p id="error"></p>
            </div>
        </div>
    </div>
</body>
<script src="../dist/jQuery.js"></script>
<script>

jQuery(document).ready(function($){

    function loadData (){

        $.ajax({
                url : 'json-parse.php',
                type : 'POST',
                dataType : 'JSON',
                success : function(data){
                  if(data){
                        $.each(data, (key, value)=>{
                            $('#tableData').append(`<tr>
                                                        <td>${value.id}</td>
                                                        <td>${value.fname}</td>
                                                        <td>${value.lname}</td>
                                                        <td>${value.age}</td>
                                                  </tr>`);
                        });
                  }else{
                        $('#error').html('No data Found').slideDown(500);
                  };
                    
                },
        });
    };
    loadData();

});

</script>
</html>