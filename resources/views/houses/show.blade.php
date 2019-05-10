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
                        </tr>
                        </thead>
                        <tbody>

                                <tr>
                                        <th scope="row">{{$house->id }}</th>
                                        <td>{{ $house->date_from }}</td>
                                        <td>{{ $house->date_to }}</td>
                                        <td>{{ $house->adults}}</td>
                                        <td>{{ $house->child }}</td>
                                        <td>{{ $house->user->name }}</td>
                                        <td>{{ $house->house->name }}</td>
                                        <td>{{ $house->payment }}</td>
                                        <td>${{ $house->total_money }}</td>

                                </tr>
                        </tbody>
                    </table>
                    <a class="btn btn-primary" href="{{route('house.index')}}"> << Back</a>

                </div>
            </div>
        </div>


    </div>

@endsection
