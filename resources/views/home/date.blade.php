<!DOCTYPE html>
<html>
<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
          rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
</head>
<body>

<div class="container-fluid mb-5 mt-5 bookdate">
    <form method="get" class="bookdate needs-validation"  action="{{route('search')}}"
          enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="col-md-2  pr-0 ">
                <input name="address" value="{{ (isset($_GET['address'])) ? $_GET['address'] : '' }}"
                       placeholder="Where do you want to go ?" type="text" class=" form-control blockdate"
                       id="validationTooltip03"
                       required>
                <span class="text-danger mb-0 small">{{$errors->first('address')}}</span>

            </div>
            <div class="col-md-5 pl-0 pr-0 ">
                <div class="input-group input-daterange">
                    <input name="date_from" placeholder="Check in" type="text" class="form-control blockdate">
                    <div class="input-group-addon to">to</div>
                    <input name="date_to" placeholder="Check out" type="text" class="form-control blockdate">
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-6 pl-0">
                        <span class="text-danger mb-0 small">{{$errors->first('date_from')}}</span>
                    </div>
                    <div class="col-sm-6 pl-5">
                        <span class="text-danger mb-0 small">{{$errors->first('date_to')}}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-1 pl-0 pr-0 blockdate">
                <select  class="custom-select form-control  blockdate " name="bedroom">
                    <option value="" selected>Bedroom</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                {{--                <input type="text" name="bedroom">--}}
            </div>

            <div class="col-md-1 pl-0 pr-0">
                <select class="custom-select form-control  blockdate" name="bathroom">
                    <option value="" selected>Bathroom</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div class="col-md-2 pl-0 pr-0">
                <div class="d-flex">
                    <div class="dropdown w-100 ">
                        <select class=" text-center custom-select form-control  blockdate" name="price">
                            <option value="" selected>Price</option>
                            <option value="1">Under 100</option>
                            <option value="2">100-1000</option>
                            <option value="3">1000-2000</option>
                            <option value="4">2000-3000</option>
                            <option value="5">Up to 3000</option>
                        </select>
                    </div>
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
