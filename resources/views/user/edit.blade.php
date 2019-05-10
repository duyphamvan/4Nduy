@extends('home.index')
@section('content')
    <div class="col-md-6 offset-md-3">
        <div class="row">
            <div class="col-12">
                <h1>Edit Profile</h1>
            </div>
            <div class="col-12">
                <form method="post" enctype="multipart/form-data" action="{{ route('user.update', $profileUser->id) }}">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $profileUser->name }}" >
                        <p style="font-size: 15px; color: red;word-wrap: break-word">
                            <strong>{{$errors->first('name')}}</strong>
                        </p>
                    </div>
                     <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="name" value="{{ $profileUser->email }}" disabled>
                         <p style="font-size: 15px; color: red;word-wrap: break-word">
                             <strong>{{$errors->first('email')}}</strong>
                         </p>
                     </div>

                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" value="{{ $profileUser->address }}" >
                        <p style="font-size: 15px; color: red;word-wrap: break-word">
                            <strong>{{$errors->first('address')}}</strong>
                        </p>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{ $profileUser->phone }}" >
                        <p style="font-size: 15px; color: red;word-wrap: break-word">
                            <strong>{{$errors->first('phone')}}</strong>
                        </p>
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control mb-2" name="image" value="{{ $profileUser->image }}">
                        <p style="font-size: 15px; color: red;word-wrap: break-word">
                            <strong>{{$errors->first('image')}}</strong>
                        </p>
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

