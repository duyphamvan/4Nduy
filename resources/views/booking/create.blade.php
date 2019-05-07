<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Travel Booking Room</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/booking.css') }}" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        html, body {
            height: 100%;
            background: url(http://thuthuatphanmem.vn/uploads/2018/05/18/hinh-nen-full-hd-1080-bai-bien-dep_022853660.jpg) fixed;
            background-size: cover;
        }
    </style>
</head>
<body>
<div id="booking" class="section">
    <div class="section-center">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-md-push-5">
                    <div class="booking-cta">
                        <h1>Make your reservation</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi facere, soluta magnam consectetur molestias itaque
                            ad sint fugit architecto incidunt iste culpa perspiciatis possimus voluptates aliquid consequuntur cumque quasi.
                            Perspiciatis.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 col-md-pull-7">
                    <div class="booking-form">
                        <form>
                            <div class="form-group">
                                <span class="form-label">Full Hotel Name</span>
                                <input class="form-control" type="text" placeholder="Enter a destination or hotel name"  name="name" required="" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <span class="form-label">Email</span>
                                <input class="form-control" type="text" placeholder="Email"  name="email" required="" value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <span class="form-label">Phone Number</span>
                                <input class="form-control" type="text" placeholder="Enter a phone number" name="phone" required="" value="{{ $user->phone }}">
                            </div>
                            <div class="form-group">
                                <span class="form-label">Address</span>
                                <input class="form-control" type="text" placeholder="Address"  name="address" required="" value="{{ $user->address }}">
                            </div>
                            <div class="form-group">
                                <span class="form-label">House Booking Name</span>
                                <input class="form-control" type="text" name="house_name" placeholder="" required="" value="{{$house_name}}" >
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <span class="form-label">Check In</span>
                                        <input   class="form-control" id="datepicker" name="Text" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="" value="{{$booking->date_from}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <span class="form-label">Check out</span>
                                        <input  class="form-control" id="datepicker1" name="Text" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
                                    </div>
                                </div>
                            </div>

                            <div class="form-btn">
                                <button class="submit-btn">Check availability</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>






