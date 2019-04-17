@extends('home.index')
@section('content')
    @include('home.nav')
    <div class="container-fluid" style="background-image: url({{asset('storage/images/slider-1.jpg')}});
            background-position: center;
            background-attachment: fixed;
            background-size: cover; width: 100%; height: 100%">

    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="card house">
                        <img src="{{asset("storage/$house->images")}}" class="card-img-top img-fluid"
                             alt="...">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card-body detail">
                    <h5 class="card-title">Name: {{$house->name}}</h5>
                    <p class="card-text">Bedroom: {{$house->bedroom}}</p>
                    <p class="card-text">Bathroom: {{$house->bathroom}}</p>
                    <p class="card-text">Address: {{$house->address}}</p>
                    <p class="card-text">
                        <small class="price text-muted">Price: {{$house->price}}$</small>
                    </p>
                    <p class="card-text">Description: {{$house->description}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
