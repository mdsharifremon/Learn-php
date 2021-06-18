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

           <button id="delete" class="check">Delete</button>
            <div id="records">
                <table id='checkbox-table'>
                    <thead>
                        <tr>
                            <th width='30px'></th>
                            <th width='50px'>Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Age</th>
                        </tr>
                    </thead>
                    <tbody id='table-data'>
                       
                    </tbody>
                </table>
            </div>

            <div class="check-response">
                <p id="error"></p>
                 <p id="success"></p>
            </div>

        </div>
    </div>
    <script src="../../dist/jQuery.js"></script>
    <script>
    
    jQuery(document).ready(($)=>{

        function loadData(){
            $.ajax({
                    url : 'load-data.php',
                    type : 'POST',
                    success : function(data){
                        $('#table-data').html(data);
                    }
            })
        }
        loadData();

        $('#delete').on('click', ()=>{
            if(confirm('Are you sure to delete these records?')){
                let id = [];
                $(':checkbox:checked').each(function(key){
                    id[key] = $(this).val();
                })
                if(id.length == 0){
                    alert('Please Select at least one checkbox')
                }else{
                   $.ajax({
                       url : 'delete-data.php',
                       type : 'POST',
                       data : {id : id},
                       success : function(data){
                           console.log(data);
                           if(data == 1){
                             $('#success').html('Data Deleted Successfully').stop(true,true).slideDown(500);
                             setTimeout(() => {
                                  $('#success').stop(true,true).slideUp(300);
                                  loadData();
                             }, 3000);   
                           }else{
                               $('#error').html('Delete Failed').stop(true,true).slideDown(500);
                                setTimeout(() => {
                                  $('#error').stop(true,true).slideUp(300);
                             }, 3000); 
                           }
                            
                       }
                   }) 
                }
            }
        });
    })

    </script>
</body>
</html>