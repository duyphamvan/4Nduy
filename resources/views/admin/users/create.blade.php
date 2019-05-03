<<<<<<< HEAD

<h2><center> Create User </center></h2>
=======
@extends('admin.admin')
@section('content')
    <div class="col-12 col-md-12">
        <form method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
>>>>>>> a4b2f69c67dd5febbb35e773cae0d59333c02e08

<div class="col-12 col-md-12">
    <form method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" required value="{{ old('name') }}">
                <p class="help text-danger">{{ $errors->first('name') }}</p>
            </div>
        </div>
        <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="email" required value="{{ old('email') }}">
                <p class="help text-danger">{{ $errors->first('email') }}</p>
            </div>
        </div>
        <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="password" >
                <p class="help text-danger">{{ $errors->first('password') }}</p>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="address" required value="{{ old('address') }}">
                <p class="help text-danger">{{ $errors->first('address') }}</p>
            </div>
        </div>
        <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="phone" required value="{{ old('phone') }}">
                <p class="help text-danger">{{ $errors->first('phone') }}</p>
            </div>
        </div>
        <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-10">
                <input type="file" class="form-control-file" name="image">
                <p class="help text-danger">{{ $errors->first('image') }}</p>
            </div>
        </div>
        <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Role</label>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role"  value="{{ \App\Http\Controllers\RoleConstant::ADMIN }}" checked>
                    <label class="form-check-label">
                        Admin
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" value="{{ \App\Http\Controllers\RoleConstant::MEMBER }}">
                    <label class="form-check-label">
                        Member
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary mb-2">Create</button>
            </div>
        </div>
    </form>
</div>

