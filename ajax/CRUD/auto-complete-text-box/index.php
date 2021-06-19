<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../dist/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
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
                <h2 class="txt-center">Search By City</h2>
                <div class="form">
                    <div class="search-box">
                        <input type="text" id='city-search' value="" placeholder="Enter Your City" autocomplete="off">
                        <button type='submit' id='search-submit'><i class='fa fa-search'></i></button>
                    </div>
                    <div id="city-list">

                    </div>

                </div>
            </div>

            <div id="records">
                
            </div>
        </div>
    </div>
    <script src="../../dist/jQuery.js"></script>
    <script>
    jQuery(document).ready(($) => {

        $('#city-search').keyup(function(e) {
            let city = $(this).val();
            if (city.length > 0) {
                $.ajax({
                    url: 'load-city.php',
                    type: 'POST',
                    data: {
                        city: city
                    },
                    success: function(data) {
                        $('#city-list').html('');
                        $('#city-list').append(data).slideDown('fast');
                    }
                })
            } else {
                $('#city-list').html('').slideUp('fast');
            };
        });

        $(document).on('click', '#city-list p', function() {

            let value = $(this).data('city');
            $('#city-search').val(value);
            $('#city-list').html('').slideUp('fast');

        });

        $('#search-submit').click(function(e) {
            e.preventDefault();
            let city = $('#city-search').val();
            if (city == '') {
                alert('Enter a city name');
            } else {
                $.ajax({
                    url: 'load-data.php',
                    type: 'POST',
                    data: {
                        city: city
                    },
                    success: function(data) {
                        $('#records').html('');
                        $('#records').append(data);
                    }
                })
            };
        })

    });
    </script>
</body>

</html>