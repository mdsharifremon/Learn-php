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
                <h2 class="txt-center">Insert User</h2>
                <div class="form">
                    <form id="submit-form">
                        <input type="text" name="name" id="name" placeholder="Name">
                        <input type="file" id='file' name='file'>
                        <span class='info'>Only Less than 1mb jpg,png,jpeg files are allowed .</span>
                        <input type="submit" name="save" id="save" value="Submit">
                        <p id="error">Error</p>
                        <p id="success">Success</p>
                    </form>
                </div>
                <div id='preview'>
                    <h3>Image Preview</h3>
                    <div id="img-preview">
                    </div>
                </div>
            </div>


        </div>
    </div>
    <script src="../../dist/jQuery.js"></script>
    <script>
jQuery(document).ready(($)=>{
    $("#submit-form").on('submit', function(e){
        e.preventDefault();
        let formData = new FormData(this);
        $.ajax({
            url : 'upload.php',
            type : 'POST',
            data : formData,
            contentType : false,
            processData : false,
            success : function(data){
                $('#preview').stop(true,true).fadeIn(2000);
                $('#img-preview').html(data);
                $('#file').val();
            }
        });
    })

    $(document).on('click', '#delete', function(){
        if(confirm('Do you delete this image?')){
            let path = $(this).data('id');
            $.ajax({
                url : 'delete.php',
                type: 'POST',
                data : {path : path},
                success : function(data){
                        if(data == 1){
                        $('#preview').stop(true,true).slideUp(1000);
                         $('#img-preview').html('');
                        }else{
                             alert(data);
                        }
                       
                }
            })
            
        };
    })
   

})
    </script>
</body>

</html>