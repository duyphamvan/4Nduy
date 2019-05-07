<h1> Homes Booking </h1>
<div class="bg-agile">
    <div class="book-appointment">
        <h2>Choice For
            Holiday Homes</h2>
        <div class="book-form agileits-login">
            <form action="#" method="post">
                @csrf
                <div class="name">
                    <label>Full name : </label>
                    <div class="form-text">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input type="text" name="name" placeholder="" required="" value="{{ $user->name }}" >
                    </div>
                </div>
                <div class="email">
                    <label>Email : </label>
                    <div class="form-text">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <input type="email" name="email" placeholder="" required="" value="{{ $user->email }}" >
                    </div>
                </div>
                <div class="phone">
                    <label>Phone number : </label>
                    <div class="form-text">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <input type="text" name="phone" placeholder="" required="" value="{{ $user->phone }}">
                    </div>
                </div>
                <div class="address">
                    <label>Address : </label>
                    <div class="form-text">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <input type="text" name="address" placeholder="" required="" value="{{ $user->address }}">
                    </div>
                </div>
                <div class="clear"></div>
                <div class="agileits_reservation_grid">
                    <div class="span1_of_1">
                        <label>Departure Date : </label>
                        <div class="book_date">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            <input  id="datepicker" name="Text" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="" value="{{$booking->date_from}}">

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
                    <div class="house_id">
                        <label>House Booking Name </label>
                        <div class="form-text">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <input type="text" name="house_name" placeholder="" required="" value="{{$house_name}}" >
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>

                <input type="submit" value="Reservation">
            </form>
        </div>

    </div>
</div>
