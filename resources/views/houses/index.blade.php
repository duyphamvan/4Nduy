@extends('admin.admin')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3>House listings not yet leased</h3>
            </div>
            <div class="card-body">
                <a class="btn btn-primary rounded-0 mb-2 " href="{{route('house.create')}}">Add New</a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr class="bg-info text-white">
                            <th scope="col">ID</th>
                            <th scope="col">Name House</th>
                            <th scope="col">Address</th>
                            <th scope="col">Category</th>
                            <th scope="col">Bed Room</th>
                            <th scope="col">Bath Room</th>
                            <th scope="col">Status</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th scope="col">Date From</th>
                            <th scope="col">Date To</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($houses) == 0)
                            <tr>
                                <td colspan="4">No data</td>
                            </tr>
                        @else
                            @foreach($houses as $key => $house)
                                <tr>
                                    @if($house->status=='1')
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $house->name }}</td>
                                        <td>{{ $house->address }}</td>
                                        <td>{{ $house->category->name}}</td>
                                        <td>{{ $house->bedroom }}</td>
                                        <td>{{ $house->bathroom }}</td>
                                        <td class="text-info">Waiting</td>
                                        <td>{{ $house->price }}</td>
                                        <td>
                                            {{count($house->images)}}
                                        </td>
                                        <td>{{ $house->date_from }}</td>
                                        <td>{{ $house->date_to }}</td>
                                        <td>
                                            <a class="btn btn-outline-info btn-block mb-1 rounded-0"
                                               href="{{route('house.edit', $house->id)}}">Edit</a>
                                            <a href="{{route('house.delete',$house->id)}}"
                                               class="btn btn-outline-danger btn-block mb-1 rounded-0"
                                               onclick="return confirm('Bạn chắc chắn muốn xóa?')">Delete</a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3>List House Waiting Approval</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr class="bg-warning text-white">
                            <th scope="col">ID</th>
                            <th scope="col">Name House</th>
                            <th scope="col">Address</th>
                            <th scope="col">Category</th>
                            <th scope="col">Bed Room</th>
                            <th scope="col">Bath Room</th>
                            <th scope="col">Status</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th scope="col">Check in</th>
                            <th scope="col">Check out</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($houses) == 0)
                            <tr>
                                <td colspan="4">No data</td>
                            </tr>
                        @else
                            @foreach($houses as $key => $house)
                                <tr>
                                    @if($house->status=='2')
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $house->name }}</td>
                                        <td>{{ $house->address }}</td>
                                        <td>{{ $house->category->name}}</td>
                                        <td>{{ $house->bedroom }}</td>
                                        <td>{{ $house->bathroom }}</td>
                                        <td class="text-warning">Pending</td>
                                        <td>{{ $house->price }}</td>
                                        <td>
                                            {{count($house->images)}}
                                        </td>
                                        <td>{{ $house->booking->date_from }}</td>
                                        <td>{{ $house->booking->date_to }}</td>
                                        <td>

                                            <a href="{{route('house.show-pending',$house->id)}}" class="btn btn-outline-info btn-block mb-1 rounded-0">Show</a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3>List of rented houses</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr  class="bg-success text-white">
                            <th scope="col">ID</th>
                            <th scope="col">Name House</th>
                            <th scope="col">Address</th>
                            <th scope="col">Category</th>
                            <th scope="col">Bed Room</th>
                            <th scope="col">Bath Room</th>
                            <th scope="col">Status</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th scope="col">Date From</th>
                            <th scope="col">Date To</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($houses) == 0)
                            <tr>
                                <td colspan="4">No data</td>
                            </tr>
                        @else
                            @foreach($houses as $key => $house)
                                <tr>
                                    @if($house->status=='3')
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $house->name }}</td>
                                        <td>{{ $house->address }}</td>
                                        <td>{{ $house->category->name}}</td>
                                        <td>{{ $house->bedroom }}</td>
                                        <td>{{ $house->bathroom }}</td>
                                        <td class="text-success">Rented</td>
                                        <td>{{ $house->price }}</td>
                                        <td>
                                            {{count($house->images)}}
                                        </td>
                                        <td>{{ $house->date_from }}</td>
                                        <td>{{ $house->date_to }}</td>
                                        <td>
                                            <a href="{{route('house.show',$house->id)}}"
                                               class="btn btn-outline-info btn-block mb-1 rounded-0">Show</a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <h3 class="mb-5">Your current total income is: ${{$total}}</h3>

    </div>



@endsection
