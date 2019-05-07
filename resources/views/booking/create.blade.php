<!DOCTYPE html>
<html lang="en">
<header>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Travel Booking Room</title>
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/booking.css') }}"/>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</header>
<body>
<div id="booking" class="section">
    <div class="section-center">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-md-push-5">
                    <div class="booking-cta">
                        <h1>Choice For Holiday Homes</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi facere, soluta magnam
                            consectetur molestias itaque
                            ad sint fugit architecto incidunt iste culpa perspiciatis possimus voluptates aliquid
                            consequuntur cumque quasi.
                            Perspiciatis.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-md-pull-6">
                    <div class="booking-form agileits-login">
                        <form action="{{route('booking.store', $house_id)}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <span class="form-label">User Name</span>
                                        <input class="form-control" type="text"
                                               placeholder="Enter a destination or hotel name" name="name" required=""
                                               value="{{ $user->name }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <span class="form-label">Email</span>
                                        <input class="form-control" type="text" placeholder="Email" name="email"
                                               required="" value="{{ $user->email }}" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <span class="form-label">Address</span>
                                        <input class="form-control" type="text" placeholder="Address" name="address"
                                               required="" value="{{ $user->address }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <span class="form-label">Phone Number</span>
                                        <input class="form-control" type="text" placeholder="Enter a phone number"
                                               name="phone" required="" value="{{ $user->phone }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <span class="form-label">Departure Date </span>
                                        <div class="date-form">
                                            <input class="form-control" readonly id="datepicker" name="date_from"
                                                   type="text" value="{{$house_date_from}}"
                                                   onfocus="this.value = '';"
                                                   onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}"
                                                   required="" value="{{$booking->date_from}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <span class="form-label">Arrival Date </span>
                                        <div class="date-form">
                                            <input class="form-control" readonly id="datepicker1" name="date_to"
                                                   type="text" value="{{$house_date_to}}" onfocus="this.value = '';"
                                                   onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}"
                                                   required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Bedroom </label>
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <input class="form-control" readonly type="text" name="house_bedroom"
                                               placeholder="" required="" value="{{$house_bedroom}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Bathroom </label>
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <input class="form-control" readonly type="text" name="house_bathroom"
                                               placeholder="" required="" value="{{$house_bathroom}}">
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <span class="form-label">House Booking Name</span>
                                        <input class="form-control" type="text" name="house_name" placeholder=""
                                               required=""
                                               value="{{$house_name}}">
                                    </div>
                                    <div class="form-btn">
                                        <button class="submit-btn" value="Reservation">Check availability</button>
                                    </div>
                                </div>
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




