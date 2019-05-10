@extends('admin.admin')
@section('content')
    <div class="col-md-6 offset-md-3">
        <div class="row">
            <div class="col-12">
                <h1>Add New House</h1>
            </div>
            <div class="col-12">
                <form method="post" enctype="multipart/form-data" action="{{route('house.store')}}">
                    @csrf
                    <div class="form-group">
                        <label>Name House</label>
                        <input type="text" class="form-control" name="name"  placeholder="Enter name">
                        <p style="font-size: 15px; color: red;word-wrap: break-word">
                            <strong>{{$errors->first('name')}}</strong>
                        </p>
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address"  placeholder="Enter name">
                        <p style="font-size: 15px; color: red;word-wrap: break-word">
                            <strong>{{$errors->first('address')}}</strong>
                        </p>
                    </div>

                    <div class="form-group">
                        <label>Bedroom</label>
                        <input type="text" class="form-control" name="bedroom"  placeholder="Enter name">
                        <p style="font-size: 15px; color: red;word-wrap: break-word">
                            <strong>{{$errors->first('bedroom')}}</strong>
                        </p>
                    </div>

                    <div class="form-group">
                        <label>Bathroom</label>
                        <input type="text" class="form-control" name="bathroom"  placeholder="Enter name" >
                        <p style="font-size: 15px; color: red;word-wrap: break-word">
                            <strong>{{$errors->first('bathroom')}}</strong>
                        </p>
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image[]"  placeholder="Enter name"  multiple>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" class="form-control" name="description"></textarea>
                        <p style="font-size: 15px; color: red;word-wrap: break-word">
                            <strong>{{$errors->first('description')}}</strong>
                        </p>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" name="price">
                        <p style="font-size: 15px; color: red;word-wrap: break-word">
                            <strong>{{$errors->first('price')}}</strong>
                        </p>
                    </div>
                    <div class="form-group">
                        <label>Date From</label>
                        <input type="date" class="form-control" name="date_from">
                        <p style="font-size: 15px; color: red;word-wrap: break-word">
                            <strong>{{$errors->first('date_from')}}</strong>
                        </p>
                    </div>
                    <div class="form-group">
                        <label>Date To</label>
                        <input type="date" class="form-control" name="date_to">
                        <p style="font-size: 13px; color: red;word-wrap: break-word">
                            <strong>{{$errors->first('date_to')}}</strong>
                        </p>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Category</label>
                        <select class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-outline-primary">Add New</button>
                    <button class="btn btn-outline-info" onclick="window.history.go(-1); return false;">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
