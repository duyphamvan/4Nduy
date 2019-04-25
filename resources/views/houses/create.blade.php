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
<<<<<<< HEAD
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Name House</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name ="name"  placeholder="Enter name House " required value="{{ old('name') }}" >
                            <p class="help text-danger">{{ $errors->first('name') }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="address"  placeholder="Enter Address" required value="{{ old('address') }}" >
                            <p class="help text-danger">{{ $errors->first('address') }}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Bedroom</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="bedroom"  placeholder="Enter Bedroom Numbers" required value="{{ old('bedroom') }}">
                            <p class="help text-danger">{{ $errors->first('bedroom') }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Bathroom</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="bathroom"  placeholder="Enter Bathroom Numbers" required value="{{ old('bathroom') }}">
                            <p class="help text-danger">{{ $errors->first('bathroom') }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file" name="image[]"   >
                            <p class="help text-danger">{{ $errors->first('image[]') }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="description" placeholder="Enter Description" required value="{{ old('description') }}" >
                            <p class="help text-danger">{{ $errors->first('description')}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="price" placeholder="Enter Price" required value="{{ old('price') }}" >
                            <p class="help text-danger">{{ $errors->first('price') }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Date From</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="date_from"  required>
                            {{--<p class="help text-danger">{{ $errors->first('price') }}</p>--}}
                        </div>
=======
                    <div class="form-group">
                        <label>Name House</label>
                        <input type="text" class="form-control" name="name"  placeholder="Enter name" required>
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address"  placeholder="Enter name" required>
                    </div>
                    <div class="form-group">
                        <label>Bedroom</label>
                        <input type="text" class="form-control" name="bedroom"  placeholder="Enter name" required>
                    </div>
                    <div class="form-group">
                        <label>Bathroom</label>
                        <input type="text" class="form-control" name="bathroom"  placeholder="Enter name" required>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image[]"  placeholder="Enter name" required multiple>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description"  required>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" name="price"  required>
                    </div>

                    <div class="form-group">


                    <div class="form-group">
                        <label>Date From</label>
                        <input type="date" class="form-control" name="date_from"  required>
>>>>>>> b0e5aeaa021087824e0f3c214ad8d17984bbbbb6
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Date To</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="date_to"  required>
                            {{--<p class="help text-danger">{{ $errors->first('price') }}</p>--}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-outline-primary">Add New</button>
                    <button class="btn btn-outline-info" onclick="window.history.go(-1); return false;">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
