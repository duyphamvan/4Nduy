@extends('home.index')
@section('content')
    @include('home.nav')
{{--    @include('home.slides')--}}
    <div class="container-fluid" style="background-image: url({{asset('storage/images/slider-1.jpg')}});
            background-position: center;
            background-attachment: fixed;
            background-size: cover; width: 100%; height: 100%">

    </div>

    <div class="container ">
        <div class="row">
            @if(count($houses)==0)
                <h5 class="text-capitalize text-center mt-5">Hiện tại chưa có nhà nào được </h5>
            @else
{{--                <div class="col-sm-12">--}}
{{--                    <h3 class="text-center mt-2">Các điểm đến có căn hộ nổi bật</h3>--}}
{{--                </div>--}}
                <div class="card-group contenthouse">
                    @foreach($houses as $key =>$house)
                        <div class="col-sm-4  pb-3">
                            <div class="card house">
                                <a href="{{route('show',$house->id)}}" class="houselist">

                                    <img src="{{asset("storage/$house->images")}}" class="card-img-top img-fluid"
                                         alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$house->name}}</h5>
                                        <p class="card-text">{{$house->description}}</p>
                                        <p class="card-text">
                                            <small class="price text-muted">{{$house->price}}$</small>
                                        </p>
                                    </div>
                                </a>

                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection




