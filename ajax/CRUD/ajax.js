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
                        $('#table-data').html(data);
                    }else{
                        $('#error').slideDown(300);
                        $('#error'). html('No data Found');
                    }
                },
        });
    };
    loadData();

    // pagination 

    $(document).on('click','#pagination a', function(e){
        e.preventDefault();
        $page = $(this).data('page');
        loadData($page);
    });
    // Insert Data
    $(document).on('click', '#save', function(e){
        e.preventDefault();
        let fname  = $('#fname').val();
        let lname  = $('#lname').val();
        let age  = $('#age').val();
        let city  = $('#city').val();
        console.log(fname,lname,age,city);
        $.ajax({
            url : 'insert.php',
            type : 'POST',
            data : {fname : fname, lname : lname, age : age, city: city},
            success : function(data){
                if (data == 1) {
                     loadData();
                }else{      
                    $('#error'). html(data).slideDown(300);
                }
            },

        });

    });

     /**
     * Delete User Data
     */
    $(document).on('click', '#delete', function(e){
        if(confirm('Do you really want to delete?')){
            let id = $(this).data('id');
            $.ajax({
                    url : 'delete.php',
                    type : 'POST',
                    data : {id : id},
                    success : (data)=>{
                        if (data == 1) {                             
                                loadData();
                            }else{
                                $('#error').slideDown(300);
                                $('#error').html(data);
                            }
                    },
            });

        };
    });

    /**
     * Update User Data
     */
    $(document).on('click', '#edit', function(e){
        // Popup Update Form
       $('#modal').stop(true,true).fadeIn(600);
       let userId = $(this).data('id');

        $.ajax({
            url : 'load-update-form.php',
            type : 'POST',
            data : {userId},
            success : (data) => {
                if(data){
                    $('#update-form').html(data);
                }else{
                    $('#uerror').html('No data found to update');
                };  
            }
            
        })

    });

    $(document).on('click', '#usave', function(e){
            e.preventDefault();
            let id    = $('#uid').val();
            let fname = $('#ufname').val();
            let lname = $('#ulname').val();
            let age   = $('#uage').val();
            let city   = $('#ucity').val();

            $.ajax({
                    url : 'save-update.php',
                    type : 'POST',
                    data : {id : id, fname : fname, lname : lname, age : age, city : city},
                    success : (data) => {
                                if(data==1){
                                    loadData();
                                    $('#modal').stop(true,true).fadeOut(600);
                                }else{
                                     $('#error').slideDown(300);
                                     $('#error'). html('Update data failed');
                                };
                    },

            });
    });
    // Close Modal Update Form
    $('#close').on('click', ()=>{
      $('#modal').stop(true,true).fadeOut(600);  
    });

    $(document).on('keyup', '#search', function(e){
        e.preventDefault();
        let search = $(this).val();
        $.ajax({
                url : 'live-search.php',
                type : 'POST',
                data : {search : search},
                success : (data)=>{
                    if(data){
                        $('#table-data').html(data);
                    }
                }
        });
    });


});