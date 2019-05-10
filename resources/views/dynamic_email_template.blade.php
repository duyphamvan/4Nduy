
@if( $data['status']=='2')
    <p>Hi, This is {{ $data['name'] }}</p>
    <p>You have successfully booked a room.</p>
    <p>Thank you!</p>
@else
    <p>Hi, This is {{ $data['name'] }}</p>
    <p>
        You have made a failed reservation</p>
    <p>Thank you!</p>
@endif

