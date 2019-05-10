@extends('admin.admin')
@section('content')
    <div class="col-md-6 offset-md-3">
        <div class="row">
            <div class="col-12">
                <h1>Add New Category House</h1>
            </div>
            <div class="col-12">
                <form method="post" enctype="multipart/form-data" action="{{route('category.store')}}">
                    @csrf
                    <div class="form-group">
                        <label>Name Category</label>
                        <input type="text" class="form-control" name="name"  placeholder="Enter name">
                        <p style="font-size: 15px; color: red;word-wrap: break-word">
                            <strong>{{$errors->first('name')}}</strong>
                        </p>
                    </div>
                     <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image">
                         <p style="font-size: 15px; color: red;word-wrap: break-word">
                             <strong>{{$errors->first('image')}}</strong>
                         </p>
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Add New</button>
                    <button class="btn btn-outline-info" onclick="window.history.go(-1); return false;">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
