@extends('home.index')
@section('content')
    @include('home.nav')
    <style>
        * {
            box-sizing: border-box;
        }
        html, body {
            height: 100%;
            background: url(http://thuthuatphanmem.vn/uploads/2018/05/18/hinh-nen-full-hd-1080-bai-bien-dep_022853660.jpg) fixed;
            background-size: cover;
        }

        body {
            margin: 0;
            padding: 0;
        }

        .column {
            float: left;
            width: 25%;
            max-width: 100%;
            height: 100%;
            overflow: hidden;

        }

        .column .hoverimage{
            opacity: 0.8;
            cursor: pointer;
            height: 100%;
            transition: 1s;
        }

        .column img:hover {
            opacity: 1;
            transform: scale(1.3);
        }

        .row.houses :after {
            content: "";
            display: table;
            clear: both;
        }

        .detaillist {
            position: relative;
            display: none;
            height: 350px;
        }

        .detaillist img {
            height: 100%;
        }

        #imgtext {
            position: absolute;
            bottom: 15px;
            left: 15px;
            color: white;
            font-size: 20px;
        }

        .listhouse {
            height: 200px;
            list-style: none;
            overflow: hidden;
        }

        .closebtn {
            position: absolute;
            top: 10px;
            right: 15px;
            color: white;
            font-size: 35px;
            cursor: pointer;
        }

        .add-to-cart {
            position: relative;
            display: inline-block;
            background: #3e3e3f;
            color: #fff;
            border: none;
            border-radius: 0;
            padding: 15px 20px;
            font-size: 1rem;
            text-transform: uppercase;
            cursor: pointer;
            transform: translateZ(0);
            transition: color 0.3s ease;
            letter-spacing: 0.0625rem;
        }

        .add-to-cart:hover:before {
            transform: scaleX(1);
        }

        .add-to-cart:before {
            position: absolute;
            content: '';
            z-index: -1;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: #565657;
            transform: scaleX(0);
            transform-origin: 0 50%;
            transition: transform 0.3s ease-out;
        }

        .list-house-detail {
            margin-top: 300px;
        }
        .description{
            color: #f8ffe0;
        }

    </style>

    <!-- The four columns -->
    <div class="container list-house-detail">
        <div style="text-align:center">
            <h2  class="mb-5">{{$houseDetail->name}}</h2>
        </div>

        <div class="row houses">
            <div class="col-sm-7">
                <div class="detaillist">
                    <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
                    <img class="" id="expandedImg" style="width:100%" alt="aaa">
                    <div id="imgtext"></div>
                </div>
                <ul class="listhouse">
                    @foreach($houses as $house)
                        <li class="column">
                            <img class="hoverimage" src="{{asset("storage/".$house->img)}}" alt="Nature" style="width:100%"
                                 onclick="myFunction(this);">
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-5">
                <h1>
                    {{$houseDetail->address}}
                </h1>
                <h2>${{$houseDetail->price}}</h2>
                <div class="description">
                    <p>The purposes of bonsai are primarily contemplation for the viewer, and the pleasant exercise of
                        effort and ingenuity for the grower.</p>
                    <p>By contrast with other plant cultivation practices, bonsai is not intended for production of food
                        or for medicine. Instead, bonsai practice focuses on long-term cultivation and shaping of one or
                        more small trees growing in a container.</p>
                </div>
                <button class="add-to-cart">Booking</button>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <h3>You may also like</h3>
        <div class="row">

            <div class="col-sm-3">
                <div class="column-xs-12 column-md-4">
                    <img src="https://source.unsplash.com/miziNqvJx5M" class="img-fluid">
                    <h4>Succulent</h4>
                    <p class="price">$19.99</p>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="column-xs-12 column-md-4">
                    <img src="https://source.unsplash.com/miziNqvJx5M" class="img-fluid">
                    <h4>Succulent</h4>
                    <p class="price">$19.99</p>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="column-xs-12 column-md-4">
                    <img src="https://source.unsplash.com/miziNqvJx5M" class="img-fluid">
                    <h4>Succulent</h4>
                    <p class="price">$19.99</p>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="column-xs-12 column-md-4">
                    <img src="https://source.unsplash.com/miziNqvJx5M" class="img-fluid">
                    <h4>Succulent</h4>
                    <p class="price">$19.99</p>
                </div>
            </div>


        </div>
    </div>
    <script>
        function myFunction(imgs) {
            var expandImg = document.getElementById("expandedImg");
            var imgText = document.getElementById("imgtext");
            expandImg.src = imgs.src;
            imgText.innerHTML = imgs.alt;
            expandImg.parentElement.style.display = "block";
        }
    </script>

@endsection



