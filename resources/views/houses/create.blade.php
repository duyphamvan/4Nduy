
@extends('admin.admin')
@section('content')
    <div class="col-md-6 offset-md-3">
        <div class="row">
            <div class="col-12">
                <h1>Add New House</h1>
            </div>
            <div class="col-12">
                <form method="post" enctype="multipart/form-data" action="{{ route('house.store') }}">
                    @csrf
                    <div class="form-group row">
                        <label>Name House</label>
                        <input type="text" class="form-control" name ="name"  placeholder="Enter name" required value="{{ old('name') }}" >
                        <p class="help text-danger">{{ $errors->first('name') }}</p>
                    </div>
                    <div class="form-group row">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address"  placeholder="Enter name" required value="{{ old('address') }}" >
                        <p class="help text-danger">{{ $errors->first('address') }}</p>
                    </div>
                    <div class="form-group row">
                        <label>Bedroom</label>
                        <input type="number" class="form-control" name="bedroom"  placeholder="Enter name" required value="{{ old('bedroom') }}">
                        <p class="help text-danger">{{ $errors->first('bedroom') }}</p>
                    </div>
                    <div class="form-group row">
                        <label>Bathroom</label>
                        <input type="number" class="form-control" name="bathroom"  placeholder="Enter name" required value="{{ old('bathroom') }}">
                        <p class="help text-danger">{{ $errors->first('bathroom') }}</p>
                    </div>
                    <div class="form-group row">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image[]"  placeholder="Enter name" >
                        <p class="help text-danger">{{ $errors->first('image[]') }}</p>

                    </div>
                    <div class="form-group row">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" required value="{{ old('description') }}" >
                        <p class="help text-danger">{{ $errors->first('description')}}</p>

                    </div>
                    <div class="form-group row">
                        <label>Price</label>
                        <input type="number" class="form-control" name="price" required value="{{ old('price') }}" >
                        <p class="help text-danger">{{ $errors->first('price') }}</p>

                    </div>

                    <div class="form-group">
                        <label>Date From</label>
                        <input type="date" class="form-control" name="date_from"  required>
                    </div>
                    <div class="form-group">
                        <label>Date To</label>
                        <input type="date" class="form-control" name="date_to"  required>
                    </div>

                    <div class="form-group row">
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
