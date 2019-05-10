@extends('admin.admin')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3>Booking For House</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Check in</th>
                            <th scope="col">Check out</th>
                            <th scope="col">Adults</th>
                            <th scope="col">Child</th>
                            <th scope="col">User</th>
                            <th scope="col">House</th>
                            <th scope="col">Payment</th>
                            <th scope="col">Total</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <th scope="row">{{$booking->id }}</th>
                            <td>{{\Carbon\Carbon::parse($booking->date_from)->format('d.m.Y')}}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->date_to)->format('d.m.Y')}}</td>
                            <td>{{ $booking->adults}}</td>
                            <td>{{ $booking->child }}</td>
                            <td>{{ $booking->user->name }}</td>
                            <td>{{ $booking->house->name }}</td>
                            <td>{{ $booking->payment }}</td>
                            <td>${{ $booking->total_money }}</td>
                            <td>
                                <a class="btn btn-outline-info" href="{{route('house.status', $house->id)}}"  onclick="return confirm('Bạn chắc chắn muốn phê duyệt?')">Approved</a>
                                <a href="{{route('house.destroystatus',$house->id)}}" class="btn btn-outline-danger" onclick="return confirm('Bạn chắc chắn muốn hủy?')">Cancel</a>
                            </td>

                        </tr>
                        </tbody>
                    </table>
                    <a class="btn btn-primary" href="{{route('house.index')}}"> << Back</a>

                </div>
            </div>
        </div>
    </div>
@endsection
