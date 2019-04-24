@extends('admin.admin')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6>List Categories Houses</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Name House</th>
                            <th scope="col">Image</th>
                            <th scope="col">Amount Houses</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($categories) == 0)
                            <tr>
                                <td colspan="4">No data</td>
                            </tr>
                        @else
                            @foreach($categories as $key => $category)
                                <tr>
                                    <th scope="row">{{ ++$key }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td><img src="{{asset("storage/$category->image")}}" alt="" width="50px"
                                             height="50px"></td>
                                    <td>{{count($category->houses)}}</td>
                                    <td>
                                        <a class="btn btn-outline-info" href="{{route('category.edit', $category->id)}}">Edit</a>
                                        <a href="{{route('category.delete',$category->id)}}" class="btn btn-outline-danger"
                                           onclick="return confirm('Bạn chắc chắn muốn xóa?')">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    <a class="btn btn-primary" href="{{route('category.create')}}">Add New</a>

                </div>
            </div>
        </div>
    </div>

@endsection
