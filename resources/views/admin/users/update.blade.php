@extends('admin.admin')
@section('content')
    <div class="col-12 col-md-12">
        <form method="post" action="{{ route('users.edit',$user->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" required value="{{ $user->name }}">
                    <p class="help text-danger">{{ $errors->first('name') }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" disabled value="{{ $user->email  }}">
                    <p class="help text-danger">{{ $errors->first('email') }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="address" required value="{{ $user->address }}">
                    <p class="help text-danger">{{ $errors->first('address') }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="phone" required value="{{ $user->phone }}">
                    <p class="help text-danger">{{ $errors->first('phone') }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control-file" name="image">
                    <p class="help text-danger">{{ $errors->first('image') }}</p>

                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Role</label>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role"
                               value="{{ \App\Http\Controllers\RoleConstant::ADMIN }}"
                               @if($user->role == \App\Http\Controllers\RoleConstant::ADMIN)
                               checked
                                @endif>
                        <label class="form-check-label">
                            Admin
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role"
                               value="{{ \App\Http\Controllers\RoleConstant::MEMBER }}"
                               @if($user->role == \App\Http\Controllers\RoleConstant::MEMBER)
                               checked
                                @endif>
                        <label class="form-check-label">
                            Member
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary mb-2">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection
