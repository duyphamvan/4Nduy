@extends('admin.admin')
@section('content')
    <div class="col-md-6 offset-md-3">
        <div class="row">
            <div class="col-12">
                <h1>Users</h1>
            </div>    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="{{ route('users.create') }}" class="btn btn-primary">Create</a>
            </h6>
        </div>
        @if(\Illuminate\Support\Facades\Session::has('success'))
            <div class="alert alert-success">{{ \Illuminate\Support\Facades\Session::get('success') }}</div>
        @endif
        @if(\Illuminate\Support\Facades\Session::has('error'))
            <div class="alert alert-danger">{{ \Illuminate\Support\Facades\Session::get('error') }}</div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>

                    <tbody>
                    @foreach($users as $key => $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $user->image ) }}" alt="" width="50">
                            </td>
                                <td><a href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger"
                                   onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i class="fas fa-trash-alt"></i></a>
                                <a href="{{ route('users.update', $user->id) }}" class="btn btn-primary"><i class="far fa-edit"></i></a>
                                </td>
                        </tr>

{{--                        <tr>--}}
{{--                            <td>{{ 'Không có dữ liệu' }}</td>--}}
{{--                        </tr>--}}
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
