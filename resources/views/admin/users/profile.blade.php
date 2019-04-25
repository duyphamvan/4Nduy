@extends('layouts.app')
@section('content')
    <div class="col-12 col-md-12">
        <form method="post" action="{{route('users.update', $user->id)}}" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="container">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="name" required value="{{ $user->name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" name="email" disabled value="{{ $user->email  }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="address" required value="{{ $user->address }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="phone" required value="{{ $user->phone }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control-file" name="image">
                        <img src="{{asset("storage/$user->image")}}" alt="" width="200px" height="150px">
                    </div>
                </div>

            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary mb-2">Update Profile</button>
                </div>
            </div>
        </form>
    </div>

@endsection
