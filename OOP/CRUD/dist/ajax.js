jQuery(document).ready(($) => {
    

    // Load Data 
    function loadData() {
        $.ajax({
            url: "load-data.php",
            type: "GET",
            success: function (result) {
                $("#table-data").html('');
                $("#table-data").append(result);
            }
        })
    }
    loadData();


});