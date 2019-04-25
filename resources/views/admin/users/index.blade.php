
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
                        <a href="{{ route('users.create') }}" class="btn btn-primary">Create</a>
                    </div>
                    @if(\Illuminate\Support\Facades\Session::has('success'))
                        <div class="alert alert-success">{{ \Illuminate\Support\Facades\Session::get('success') }}</div>
                    @endif
                    @if(\Illuminate\Support\Facades\Session::has('error'))
                        <div class="alert alert-danger">{{ \Illuminate\Support\Facades\Session::get('error') }}</div>
                    @endif
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($users) == 0)
                            <tr>
                                <td colspan="4">No data</td>
                            </tr>
                        @else
                            @foreach($users as $key => $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $user->image ) }}" alt="" width="100">
                                    </td>
                                    <td>
                                        <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger"
                                           onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i
                                                    class="fas fa-trash-alt"></i></a>
                                        <a href="{{ route('users.update', $user->id) }}" class="btn btn-primary"><i
                                                    class="far fa-edit"></i></a>
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
