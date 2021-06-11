jQuery(document).ready(($)=>{

    function loadData(page){

        $.ajax({
            url     : 'load-more-pagination-save.php',
            type    : 'POST',
            data    : {page : page},
            success : (data) => {

                if(data){
                    $('#table-pagination').remove();
                    $('#load-data').append(data);
                }else{  
                    $('#load-more-btn').html('Record Finished');    
                    $('#load-more-btn').prop("disabled",true);
                    
                };
                
            },
        });

    }
    loadData();

    // Load More Button

    $(document).on('click', '#load-more-btn', function(){ 
            $('#load-more-btn').html('Loading...'); 
            let id = $(this).data('pid');
            loadData(id);
    });




});