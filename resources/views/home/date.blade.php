
<!DOCTYPE html>
<html>
<head>
    <title>Laravel Bootstrap Datepicker</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
          rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
</head>
<body>

<div class="container-fluid mt-5 bookdate">
    <form class="bookdate needs-validation" novalidate>
        <div class="form-row">
            <div class="col-md-4  pr-0 ">
                <input placeholder="Bạn Muốn Đi Đâu ?" type="text" class=" form-control blockdate" id="validationTooltip03"
                       required>
                <div class="invalid-tooltip">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-4 pl-0 pr-0 ">
                <div class="input-group input-daterange">
                    <input placeholder="Nhận phòng" type="text" class="form-control blockdate">
                    <div class="input-group-addon to">to</div>
                    <input placeholder="Trả phòng" type="text" class="form-control blockdate">
                </div>
            </div>
            <div class="col-md-3 pl-0 pr-0">
                <input type="text" class="form-control blockdate" id="validationTooltip05" placeholder="Số người" required>
                <div class="invalid-tooltip">
                    Please provide a valid zip.
                </div>

            </div>
            <div class="col-md-1 pl-0">
                <button class="btn btn-block btn-primary search" type="submit">Search</button>
            </div>

        </div>

    </form>
</div>
<script type="text/javascript">

    $('.input-daterange input').each(function () {
        $(this).datepicker('clearDates');
    });

</script>
</body>
</html>
