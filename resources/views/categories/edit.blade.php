@extends('admin.admin')
@section('content')
    <div class="col-md-6 offset-md-3">
        <div class="row">
            <div class="col-12">
                <h1>Edit Category</h1>
            </div>
            <div class="col-12">
                <form method="post" enctype="multipart/form-data" action="{{ route('category.update', $category->id) }}">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                        <p style="font-size: 15px; color: red;word-wrap: break-word">
                            <strong>{{$errors->first('name')}}</strong>
                        </p>
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control mb-2" name="image" value="{{ $category->image }}">
                        <p style="font-size: 15px; color: red;word-wrap: break-word">
                            <strong>{{$errors->first('image')}}</strong>
                        </p>
                        <img src="{{asset("storage/$category->image")}}" alt="" width="200px" height="150px">
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
