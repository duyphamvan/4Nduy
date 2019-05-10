@extends('home.index')
@section('content')
    @include('home.nav')
    <style>
        html, body {
            height: 100%;
            background: url(http://thuthuatphanmem.vn/uploads/2018/05/18/hinh-nen-full-hd-1080-bai-bien-dep_022853660.jpg) fixed;
            background-size: cover;
        }


        img {
            max-width: 100%;
            height: auto;
        }

        ul li {
            list-style: none
        }

        a, a:hover {
            text-decoration: none;
            box-shadow: none;
            outline: none;
            -moz-transition: all 0.2s ease-in;
            -o-transition: all 0.2s ease-in;
            -webkit-transition: all 0.2s ease-in;
            transition: all 0.2s ease-in;
        }

        h1 {
            text-align: center;
            margin: 30px 0;
            color: #fff;
        }

        .hls_sol li {
            width: 25%;
            max-width: 100%;
            display: inline-block;
            float: left;
            text-align: center;
            overflow: hidden;
            position: relative;
            height: 400px;
        }

        .hls_sol li img {
            height: 100%;
        }

        .hls_sol ul {
            padding: 0;
            display: flow-root;
        }

        .hls_sol li:hover img {
            -moz-transform: scale(1.1);
            -webkit-transform: scale(1.1);
            -ms-transform: scale(1.1);
            -o-transform: scale(1.1);
            transform: scale(1.1);
        }

        .hls_sol li img {
            -webkit-transition: transform 0.5s ease;
            -o-transition: transform 0.5s ease;
            transition: transform 0.5s ease;
        }

        .hls_sol .hls_sol_data {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            top: 0;
            transition: 0.3s ease-in-out;
            background: rgba(0, 0, 0, 0.28);
            visibility: hidden
        }

        .hls_sol ul li:hover .hls_sol_data {
            background: rgba(0, 0, 0, 0.51);
            transition: 0.3s ease-in-out;
            visibility: visible
        }

        .hls_data {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            padding: 60px 20px;
        }

        .hls_data a {
            display: block;
        }

        .hls_title {
            text-align: right;
            font-size: 22px;
            border-bottom: 2px solid #7db4ff;
            padding: 10px 0;
            margin: 10px 0;
            color: #fff;
        }

        .hls_title:hover {
            color: #fff;
        }

        .hls_sol_data h3 {
            color: #fff;
            transition: 0.5s
        }

        .hls_sol_data:hover h3 {
            transition: 0.5s ease;
            margin-top: 100px;
        }

        .btn-pro {
            border-radius: 0;
            color: #222;
            background: #fff;
            display: inline-block !important;
            float: right;
        }

        .btn-pro:hover {
            color: #fff;
            background: #355c79;
        }

        .sec_title {
            text-align: center;
            margin: 30px 0 30px;
        }

        .hls_data {
            left: unset;
            right: -310px;
            transition: 1s ease
        }

        .hls_sol_data:hover .hls_data {
            left: 0;
            right: 0;
            transition: 1s ease
        }

        .house-detail {
            margin-top: 200px;
        }
    </style>

    <div class="house-detail">
        @if(count($houses)==0)
            <h5 class="text-capitalize text-center mt-5">Hiện tại chưa có nhà nào được tạo </h5>
        @else
            {{--                <div class="col-sm-12">--}}
            {{--                    <h3 class="text-center mt-2">Các điểm đến có căn hộ nổi bật</h3>--}}
            {{--                </div>--}}
            <div class="house-detail">
                <h1>{{$category->name}}</h1>
                <div class="hls_sol">
                    <ul>
                        @foreach($houses as $key =>$house)
                            @if($house->status == '1')
                                <a href="{{route('show',$house->id)}}" class="houselist">
                                    <li>

                                        <img src="{{asset("storage/" . $house->images->first()['img'])}}"
                                             class="card-img-top img-fluid"
                                             alt="...">
                                        <div class="hls_sol_data">
                                            <h3>{{$house->name}}</h3>
                                            <div class="hls_data">
                                                <p href="#" class="hls_title">{{$house->address}}</p>
                                                <p href="#" class="btn btn-pro">
                                                    {{$house->price}}$</p>
                                                <div>
                                                    <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-show-caption="false" data-step="0.1" value="{{$house->averageRating }}" data-size="xs" disabled="">
                                                </div>
                                            </div>
                                        </div>

                                    </li>
                                </a>
                            @endif

                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>
    @include('home.services')
    <script type="text/javascript">
        $("#input-id").rating();
    </script>
@endsection

