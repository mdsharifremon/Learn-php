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
                    <form id='submit-form'>
                        <input type="text" name="fname" id="fname" placeholder="First Name">
                        <input type="text" name="lname" id="lname" placeholder="Last Name">
                        <input type="number" name="age" id="age" placeholder="Age" autocomplete="off">
                        <div class="gender-box">
                            <label for="gender">Gender</label>

                            <input type="radio" name="gender" id="male" value="male">
                            <label for='male'>Male</label>

                            <input type="radio" name="gender" id="female" value="female">
                            <label for='female'>Female</label>

                            <input type="radio" name="gender" id="other" value="other">
                            <label for="other">Other</label>
                        </div>
                        <input type="submit" name="save" id="save" value="Submit">
                    </form>
                    <p id="error"></p>
                    <p id="success"></p>
                    <p id="loading"></p>
                </div>
            </div>
        </div>
    </div>
    <script src="../dist/jQuery.js"></script>
    <script>
    jQuery(document).ready(function($){

        $('#save').click(function(e){
           e.preventDefault();
           let fname = $('#fname').val();
           let lname = $('#lname').val();
           let age = $('#age').val();

           if(fname == '' || lname == '' || age == '' || !$('input:radio[name=gender]').is(':checked')){
                $('#error').html('All fields are required').stop(true, true).slideDown(300);  
           }else{
               //$('#success').html($('#submit-form').serialize()).stop(true,true).slideDown(300);;

               $.get(
                    'save-form.php',
                    //{fname : fname, lname : lname, age : age},
                    //type : 'POST',

                     $('#submit-form').serialize(),
                    //  function(){
                    //         $('#loading').html('Loading...').stop(true,true).slideDown(300);
                    // },
                    function(data){
                       if(data){
                        $('#submit-form').trigger('reset');
                        $('#error').stop(true, true).slideUp(300);  
                        $('#success').html(data).stop(true,true).slideDown(300);
                        setTimeout(() => {
                             $('#success').stop(true,true).slideUp(300);
                        }, 5000);
                       };
                    },
               );
           };
       

        });

    });

    </script>
</body>

</html>