<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../dist/jq.min.css">
    <link rel="stylesheet" type="text/css" href="../dist/demo.min.css">
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

            <div class="data-range">
                <h2 style="margin-bottom:6px;">Date Range Filter</h2>
                <label for="from">From</label>
                <input type="text" id="from" name="from" autocomplete='off'>
                <label for="to">to</label>
                <input type="text" id="to" name="to" autocomplete='off'>
            </div>

            <div id="records">
                <table>
                    <thead>
                        <tr>
                            <th>User Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Age</th>
                            <th>City</th>
                            <th>Date Of Birth</th>
                        </tr>
                    </thead>

                    <tbody id='table-data'>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    jQuery(document).ready(($) => {
            let min,max;
        var dateFormat = "mm/dd/yy",
            from = $("#from")
            .datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1
            })
            .on("change", function() {
                to.datepicker("option", "minDate", getDate(this));
                min = getDate(this);
                alert(min);
            }),
            to = $("#to").datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1
            })
            .on("change", function() {
                from.datepicker("option", "maxDate", getDate(this));
                max = getDate(this);
                alert(max);
            });

        function getDate(element) {
            var date;
            try {
                date = $.datepicker.parseDate(dateFormat, element.value);
            } catch (error) {
                date = null;
            }

            return date;
        }
        if(min == '' && max == ''){
            alert('Select a date range')
        }else(
            loadTable(min,max)   
        )

        function loadTable(min, max) {
            $.ajax({
                url: 'date-range-search-load.php',
                type: 'POST',
                data: {
                    min: min,
                    max: max
                },
                success: function(data) {
                    $('#table-data').html('');
                    $('#table-data').append(data);
                }
            })
        };
        loadTable();
    });
    </script>
</body>

</html>