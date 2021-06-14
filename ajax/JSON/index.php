<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../dist/style.css">
    <title>PHP & JSON</title>
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
                    
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
    <script src="../dist/jQuery.js"></script>
    <script>
jQuery(document).ready(($)=>{
    
    
    function loadData(id=1){
        $.ajax({
                url      : 'https://localhost/learning/PHP_learning/ajax/JSON/json-encode.php',
                type     : 'POST',
                data     : {id : id},
                dataType : 'JSON',
                success  :  function(data){  
                    $.each(data,(key,value)=>{
                    $('#data').html(`<tr>
                                          <td>${value.id}</td>
                                          <td> ${value.fname}</td>
                                          <td> ${value.lname}</td>
                                          <td> ${value.age}</td>
                                        </tr>`);
                    });

                },
            });
     };
     loadData();
     $(document).on('keyup', '#search', function(){
         let id = $('#search').val();
         loadData(id);
     });

     
        
});

    </script>
</body>

</html>