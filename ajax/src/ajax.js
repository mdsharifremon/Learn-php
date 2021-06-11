
jQuery(document).ready(($) => {

        /***
         * @param Load Data from database using AJAX
         */
        function loadTable(page) {
            $.ajax({
                url: 'ajaxload.php',
                type: 'POST',
                data : {page : page},
                success: (data) => {
                    $('#table-data').html(data);
                }
            });
        };
        loadTable();

        /**
         * @param Pagination
         */
        $(document).on('click', '#pagination a', function(e) {
            e.preventDefault();
            let pageId = $(this).data("tid");
            loadTable(pageId);
         });
         
        /***
         * @param Insert data to database via AJAX
         */

        $('#save').on('click', (e) => {
            e.preventDefault();
            // Check Data is filled 
            let fname = $('#fname').val();
            let lname = $('#lname').val();
            let age = $('#age').val();
            if (fname == '' || lname == '' || age == '') {
                $('#error').html('All field must to be filled').fadeIn(400);
            };
            //console.log(fname, lname, age);

            $.ajax({
                url: 'ajax-insert.php',
                type: 'POST',
                data: {
                    first_name: fname,
                    last_name: lname,
                    age: age
                },
                success: (data) => {
                    if (data == 1) {
                        loadTable();
                    } else {
                        $('#error').html('Insert Failed').stop(true, true).fadeIn(500);
                    };
                },
            });
        });

        /**
         * Delete Data From Data With Ajax
         */
        $(document).on('click', '#delete', function() {
            if (confirm('Do you really want to delete your record?')) {
                let id = $(this).data("id");
                //let element = this;
                $.ajax({
                    url: 'ajax-delete.php',
                    type: 'POST',
                    data: {
                        userId: id
                    },
                    success: (data) => {
                        if (data == 1) { 
                            //$(this).closest('tr').stop(true, true).fadeOut(300);
                            loadTable();
                        } else {
                            $('#error').html('Can not delete records').slideDown(400);
                        }
                    },
                });

            };
        });

        /**
         * @param Edit Data and save to database via AJAX
         */

        // Show popup box
         $(document).on('click', '#edit', function(){
            $('#modal').fadeIn(500);
            let st_id = $(this).data("eid");
            $.ajax({
                    url : 'load-update-form.php',
                    type : 'POST',
                    data : {eid :st_id},
                    success: (data)=>{
                        $('#modal-form-fill').html(data);
                    }
            });
        });

        // Modal Form Close Button
         $('#close-btn').on('click', ()=>{
              $('#modal').fadeOut(500);
         });

         /**
          * @param Update data and reload the table data.
          */
         $(document).on('click', '#update-btn',() => {
                let update_id   = $('#update-id').val();
                let update_fname = $('#update-fname').val();
                let update_lname = $('#update-lname').val();
                let update_age = $('#update-age').val();

                $.ajax({
                    url : 'save-update-form.php',
                    type : 'POST', 
                    data : {
                        Uid : update_id,
                        Ufname : update_fname,
                        Ulname : update_lname,
                        Uage : update_age, 
                    },
                    success: (data)=>{
                        if(data == 1){
                            $('#modal').fadeOut(500);
                            loadTable();
                        }else{
                            alert('update failed');
                        };
                    }

                });
         });

          /**
          * @param Live search in the table.
          */
         $('#search').on('keyup', function(){

                let searchTerm = $(this).val();
                $.ajax({
                        url : 'ajax-live-search.php',
                        type : 'POST',
                        data : {search : searchTerm},
                        success: (data)=>{
                            $('#table-data').html(data);
                        }
                });

         });




    });