@extends('admin.admin')
@section('content')
    <div class="col-md-6 offset-md-3">
        <div class="row">
            <div class="col-12">
                <h1>Edit House</h1>
            </div>
            <div class="col-12">
                <form method="post" enctype="multipart/form-data" action="{{ route('house.update', $house->id) }}">
                    @csrf
                    <div class="form-group">
                        <label>Name House</label>
                        <input value="{{$house->name}}" type="text" class="form-control" name="name"  placeholder="Enter name" required>
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <input value="{{$house->address}}" type="text" class="form-control" name="address"  placeholder="Enter name" required>
                    </div>

                    <div class="form-group">
                        <label>Bedroom</label>
                        <input   value="{{$house->bedroom}}" type="text" class="form-control" name="bedroom"  placeholder="Enter name" required>
                    </div>

                    <div class="form-group">
                        <label>Bathroom</label>
                        <input  value="{{$house->bathroom}}" type="text" class="form-control" name="bathroom"  placeholder="Enter name" required>
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <input value="{{$house->images}}" type="file" class="form-control" name="images"  placeholder="Enter name">
                        <img src="{{asset("storage/$house->images")}}" alt="" width="200px" height="150px">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input value="{{$house->description}}" type="text" class="form-control" name="description"  required>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input value="{{$house->price}}" type="text" class="form-control" name="price"  required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Category</label>
                        <select  class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
