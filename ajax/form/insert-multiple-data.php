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
                        <input type="text" name="name" id="name" placeholder="Name">
                 
                        <div class="checkbox" style="padding:15px;">
                            <label>Language</label>
                                <br><br>
                            <input type="checkbox" class="lang" id="php" value="php">
                            <label for='php'>PHP</label>  <br>
                          
                            <input type="checkbox" class="lang" id="Sql" value="Sql">
                            <label for='Sql'>Sql</label>  <br>

                            <input type="checkbox" class="lang" id="Ruby" value="Ruby">
                            <label for='Ruby'>Ruby</label>  <br>

                            <input type="checkbox" class="lang" id="JavaScript" value="JavaScript">
                            <label for='JavaScript'>JavaScript</label>  <br>

                            <input type="checkbox" class="lang" id="Python" value="Python">
                            <label for='Python'>Python</label>  <br>

                            <input type="checkbox" class="lang" id="C++" value="C++">
                            <label for='C++'>C++</label>  <br>

                            <input type="checkbox" class="lang" id="Java" value="Java">
                            <label for='Java'>Java</label>  <br>

                            <input type="checkbox" class="lang" id="Go" value="Go">
                            <label for='Go'>Go</label>  <br>

                            <input type="checkbox" class="lang" id="Swift" value="Swift">
                            <label for='Swift'>Swift</label>   <br>
                        </div>
                        <input type="submit" name="save" id="save" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../dist/jQuery.js"></script>
    <script>
    jQuery(document).ready(($)=>{

        $(document).on('click','#save',function(e){
            e.preventDefault();

            let name = $('#name').val();
            let lang = [];
            
            $('.lang').each(function(){
                   if($(this).is(":checked")){
                        lang.push($(this).val());
                   }
            });
            if(lang.length > 0){
                let language = lang.toString();
                $.ajax({
                    url : 'save-multiple-checkbox.php',
                    type : 'POST',
                    data : {name : name, lang : language},
                    success : function(data){
                            alert(data);
                            $('#submit-form').trigger('reset');
                    }
                })     
            }else{
                alert('Please select at least one language');
            }
        });
    })

    </script>

</body>
</html>