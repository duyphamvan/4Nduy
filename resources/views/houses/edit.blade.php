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
                        <p style="font-size: 13px; color: red;word-wrap: break-word">
                            <strong>{{$errors->first('name')}}</strong>
                        </p>
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <input value="{{$house->address}}" type="text" class="form-control" name="address"  placeholder="Enter name" required>
                        <p style="font-size: 13px; color: red;word-wrap: break-word">
                            <strong>{{$errors->first('address')}}</strong>
                        </p>
                    </div>

                    <div class="form-group">
                        <label>Bedroom</label>
                        <input   value="{{$house->bedroom}}" type="text" class="form-control" name="bedroom"  placeholder="Enter name" required>
                        <p style="font-size: 13px; color: red;word-wrap: break-word">
                            <strong>{{$errors->first('bedroom')}}</strong>
                        </p>
                    </div>

                    <div class="form-group">
                        <label>Bathroom</label>
                        <input  value="{{$house->bathroom}}" type="text" class="form-control" name="bathroom"  placeholder="Enter name" required>
                        <p style="font-size: 13px; color: red;word-wrap: break-word">
                            <strong>{{$errors->first('bathroom')}}</strong>
                        </p>
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <input value="{{$house->images}}" type="file" class="form-control" name="image[]" multiple  placeholder="Enter name">
                        <img src="{{asset("storage/$house->images")}}" alt="" width="200px" height="150px">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input value="{{$house->description}}" type="text" class="form-control" name="description">
                        <p style="font-size: 13px; color: red;word-wrap: break-word">
                            <strong>{{$errors->first('description')}}</strong>
                        </p>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input value="{{$house->price}}" type="text" class="form-control" name="price" >
                        <p style="font-size: 13px; color: red;word-wrap: break-word">
                            <strong>{{$errors->first('price')}}</strong>
                        </p>
                    </div>
                    <div class="form-group">
                        <label>Date From</label>
                        <input value="{{$house->date_from}}" type="date" class="form-control" name="date_from" >
                        <p style="font-size: 13px; color: red;word-wrap: break-word">
                            <strong>{{$errors->first('date_from')}}</strong>
                        </p>
                    </div>
                    <div class="form-group">
                        <label>Date To</label>
                        <input value="{{$house->date_to}}" type="date" class="form-control" name="date_to" >
                        <p style="font-size: 13px; color: red;word-wrap: break-word">
                            <strong>{{$errors->first('date_to')}}</strong>
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Edit Category: {{ $category->name }}</label>
                        <select  class="form-control" name="category_id" required>
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
