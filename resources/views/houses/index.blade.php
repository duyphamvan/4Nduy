@extends('admin.admin')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6>List Houses</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <div class="btn ">
                        <a class="btn btn-primary" href="{{route('house.create')}}">Add New House</a>
                    </div>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Name House</th>
                            <th scope="col">Address</th>
                            <th scope="col">Category</th>
                            <th scope="col">Bed Room</th>
                            <th scope="col">Bath Room</th>
                            <th scope="col">Description</th>
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
                                    <th scope="row">{{ ++$key }}</th>
                                    <td>{{ $house->name }}</td>
                                    <td>{{ $house->address }}</td>
                                    <td>{{ $house->category->name}}</td>
                                    <td>{{ $house->bedroom }}</td>
                                    <td>{{ $house->bathroom }}</td>
                                    <td>{{ $house->description }}</td>
                                    <td>{{ $house->price }}</td>
                                    <td>
                                       {{count($house->images)}}
                                    </td>
                                    <td>{{ $house->date_from }}</td>
                                    <td>{{ $house->date_to }}</td>
                                    <td>
                                        <a class="btn btn-outline-info"
                                           href="{{route('house.edit', $house->id)}}">Edit</a>
                                        <a href="{{route('house.delete',$house->id)}}" class="btn btn-outline-danger"
                                           onclick="return confirm('Bạn chắc chắn muốn xóa?')">Delete</a>

                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
