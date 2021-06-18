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


            <div class="insert">
                <h2 class="txt-center">Insert User</h2>
                <div class="form">
                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF'])?>" method='POST'>
                        <input type="text" name="name" id="name" placeholder="Name">
                        <select name="country" id='country'>
                            <option disabled='disabled' selected>Select Country</option>
                        </select>
                        <select name="city" id='city'>
                            <option disabled='disabled' selected>Select City</option>
                        </select>
                        <input type="submit" name="save" id="save" value="Submit">
                        <p id="error">Error</p>
                        <p id="success">Success</p>
                    </form>
                </div>
            </div>


        </div>
    </div>
    <script src="../dist/jQuery.js"></script>
    <script>

jQuery(document).ready(($)=>{
    function loadData(type, category_id){    
        $.ajax({
            url : 'load-data.php',
            type : 'POST',
            data : {type : type, category_id : category_id},
            success : function(data){
                if(data){
                    if(type == 'cityData'){
                         $('#city').html(data); 
                    }else{
                        $('#country').append(data); 
                    }   
                } 
            }
        });
    };
    loadData();
    $('#country').on('change',function(){
                    let country = $(this).val();
                    if(country != ''){
                        loadData('cityData',country);
                    }else{
                        $('#country').html('');
                    }
                    
    });

})

    </script>
</body>

</html>