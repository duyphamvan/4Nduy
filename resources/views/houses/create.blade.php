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
                        <label>Date From</label>
                        <input type="date" class="form-control" name="date_from"  required>
                    </div>
                    <div class="form-group">
                        <label>Date To</label>
                        <input type="date" class="form-control" name="date_to"  required>
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
