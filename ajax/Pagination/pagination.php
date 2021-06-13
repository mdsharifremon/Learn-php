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
                            <th>User Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Age</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id='table-data'> 
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="../dist/jQuery.js"></script>
    <script>
jQuery(document).ready(($)=>{

    /**
     * Load User Data Table
     */
    function loadData(page){
        $.ajax({
                url : 'load-data.php',
                type : 'POST',
                data : {page : page},
                success: function(data){
                    if(data){
                        $('#load-more-con').remove();
                        $('#table-data').append(data);
                    }else{
                        $('#load-more').prop('disabled',true);
                        $('#load-more').html('Finished');
                        
                    }
                },
        });
    };
    loadData();

    $(document).on('click', '#load-more', function(e){
            e.preventDefault();
            let page = $(this).data('page');
            loadData(page);
    });

});

    </script>
</body>

</html>