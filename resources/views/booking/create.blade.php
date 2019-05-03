<!DOCTYPE HTML>
<html>
<head>
    <title>Booking Form a Responsive Widget</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Holiday Homes Booking Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Custom Theme files -->
    <!-- font-awesome-icons -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome-icons -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <!--fonts
<link href="//fonts.googleapis.com/css?family=Barlow:100,200,300,400,500,600,700,800,900" rel="stylesheet">
<--fonts-->
</head>
<body>
<!--background-->
<h1> Homes Booking </h1>
<div class="bg-agile">
    <div class="book-appointment">
        <h2>Choice For
            Holiday Homes</h2>
        <div class="book-form agileits-login">
            <form action="{{route('booking.store')}}" method="post">
                @csrf
                <div class="phone_email">
                    <label>Full name : </label>
                    <div class="form-text">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input type="text" name="name" placeholder="" required="" >
                    </div>
                </div>
                <div class="phone_email phone_email1">
                    <label>Email : </label>
                    <div class="form-text">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <input type="email" name="email" placeholder="" required="">
                    </div>
                </div>
                <div class="phone_email">
                    <label>Phone number : </label>
                    <div class="form-text">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <input type="text" name="Phone no" placeholder="" required="">
                    </div>
                </div>
                <div class="phone_email phone_email1">
                    <label>Address : </label>
                    <div class="form-text">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <input type="text" name="address" placeholder="" required="" >
                    </div>
                </div>
                <div class="clear"></div>
                <div class="agileits_reservation_grid">
                    <div class="span1_of_1">
                        <label>Departure Date : </label>
                        <div class="book_date">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            <input  id="datepicker" name="Text" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">

                        </div>
                    </div>
                    <div class="span1_of_2">
                        <label>Arrival Date : </label>
                        <div class="book_date">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            <input  id="datepicker1" name="Text" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">

                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="span1_of_1">
                        <label>No.of people : </label>
                        <!-- start_section_room -->
                        <div class="section_room">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
                                <option value="AX"></option>
                                <option value="null">1 People</option>
                                <option value="null">2 People</option>
                                <option value="null">3 People</option>
                                <option value="AX">4 People</option>
                                <option value="AX">More</option>
                            </select>
                        </div>
                    </div>
                    <div class="span1_of_2">
                        <label>Select House </label>
                        <!-- start_section_room -->
                        <div class="section_room">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <select class="form-control" name="house_id">
                                @foreach($houses as $house)
                                    <option value="{{ $house->id }}">{{ $house->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>

                <input type="submit" value="Reservation">
            </form>
        </div>

    </div>
</div>

</body>
</html>
