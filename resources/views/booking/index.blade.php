@extends('admin.admin')
@section('content')

    <h3><center>Booking List</center></h3>
    <div class="container">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Booking ID</th>
                <th>User Name</th>
                <th>House</th>
                <th>Bedroom</th>
                <th>Category</th>
                <th>Booked At</th>
                <th>Booking End</th>
                <th>Booked By</th>
                <th>Status</th>
                <th>Action</th>
                <button type="button" href="{{route('booking.create')}}"></button>
            </tr>
            </thead>
            <tbody>
            @foreach ($bookings as $key => $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td><a href="users/{{ $booking->user->id }}">{{ $booking->user->name }}</a></td>
                    <td>{{ $booking->house->name }}</td>
                    <td>{{ $booking->house->floor }}</td>
                    <td>{{ $booking->house->beds }}</td>
                    <td>{{ $booking->house->category_id }}</td>
                    <td>{{ $booking->date_from }}</td>
                    <td>{{ $booking->date_to }}</td>
                    <td>{{ $booking->user->name }}</td>
                    <td>
                        @if ($booking->status)
                            <label class="label label-primary text-xs">Booked <i class="fa fa-check"></i></label>
                        @else
                            <label class="label label-warning text-xs">Canceled <i class="fa fa-ban"></i></label>
                        @endif
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>

@endsection
