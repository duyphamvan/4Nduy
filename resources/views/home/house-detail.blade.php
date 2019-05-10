@extends('home.index')
@section('content')
    @include('home.nav-bg')
    <style>
        * {
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            background-color: #ffffff;
        }

        body {
            margin: 0;
            padding: 0;

        }

        .detaillist {
            position: relative;
            display: none;
            height: 350px;
            margin-bottom: 10px
        }

        .detaillist img {
            height: 100%;
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
            width: 100%;
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
            margin-top: 100px;
        }

        .description {
            color: rgba(0, 0, 0, 0.69);
        }

        .display-comment .display-comment {
            margin-left: 40px
        }


        .display {
            visibility: hidden;
        }

        .list-house-detail .column {
            float: left;
            height: 150px;
            width: 25%;
            padding: 10px;
        }

        .list-house-detail .column img {
            opacity: 0.8;
            cursor: pointer;
            width: 100%;
            height: 100%;
        }

        .list-house-detail .column img:hover {
            opacity: 1;
        }

        .list-house-detail .row.image {
            text-align: center;
            border: 2px solid gainsboro;
            max-width: 100%;
            margin: 0;
        }

        .list-house-detail .row.image:after {
            content: "";
            display: table;
            clear: both;
        }

        .list-house-detail .container {
            position: relative;
            display: none;
            max-width: 100%;
        }

        .list-house-detail .container img {
            height: 400px;
        }

        .list-house-detail .closebtn {
            position: absolute;
            top: 10px;
            right: 15px;
            color: white;
            font-size: 35px;
            cursor: pointer;
        }

        button.btn.btn-secondary.comment-button {
            background-color: white;
            color: #757373;
        }

        .col-sm-6.iconleft.pl-0 ul li a i, .col-sm-6.text-right.iconright ul li a, .col-sm-6.text-right.iconright ul li a i {
            color: #484848;
        }


    </style>

    <!-- The four columns -->
    <div class="container list-house-detail">
        <div class="row houses">
            <div class="col-sm-7" style="display: block">
                <div style="text-align:center">
                    <h1 class="mb-5 ">{{$houseDetail->name}}</h1>
                </div>
                <div>
                    <div class="container pl-0 pr-0">
                        <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
                        <img id="expandedImg" style="width:100%">
                    </div>
                    <div class="row image">
                        @foreach($houses as $house)
                            <div class="column">
                                <img class="thumbnail" src="{{asset('storage/'.$house->img)}}" alt=""
                                     onclick="setThumbnailImage(this);">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-sm-5 desc">
                <p class="mt-1 font-weight-bold">${{$houseDetail->price}}&nbsp;<span class="small">per night</span></p>
                <div style="color: #ff7626c7; font-size: 13px;margin-top: -15px;margin-bottom: 7px;">
                    <span class="review-no float-left">{{ $houseDetail->ratings->groupBy('user_id')->count('user_id') }}&nbsp; Reviews,&nbsp;  </span>&nbsp;
                    <span class="float-left">Average: </span> {!! str_repeat('<i class="fa fa-star" aria-hidden="true"></i>', $houseDetail->averageRating ) !!}

                </div>
                <hr class="mt-0 mb-0">
                <form method="post" enctype="multipart/form-data" action="{{route('booking.store',$houseDetail->id)}}">
                    @csrf
                    <h5 class="">
                        Dates
                    </h5>
                    <div class="row">
                        <div class="col-sm-5 small"><span>From: {{\Carbon\Carbon::parse($houseDetail->date_from)->format('d-m-Y')}}</span> </div>
                        <div class="col-sm-2 text-center"><i class="fas fa-long-arrow-alt-right"></i></div>
                        <div class="col-sm-5 small text-right"><span>To: {{\Carbon\Carbon::parse($houseDetail->date_to)->format('d-m-Y')}}</span></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5 pr-0">
                            <input name="date_from" placeholder="Check in" type="date" class="form-control date "
                                   style="font-size: 11px" >
                            <p style="font-size: 13px; color: red;word-wrap: break-word">
                                <strong>{{$errors->first('date_from')}}</strong>
                            </p>
                        </div>

                        <div class="col-sm-2 pl-0 pr-0">
                            <div class="input-group-addon to" style="height: 43px"><i class="fas fa-long-arrow-alt-right"></i></div>
                        </div>
                        <div class="col-sm-5 pl-0">
                            <input name="date_to" placeholder="Check out" type="date" class="form-control date"
                                   style="font-size: 11px" >
                            <input name="house_id" type="hidden" value="{{$houseDetail->id}}">
                            <p style="font-size: 13px; color: red;word-wrap: break-word">
                                <strong>{{$errors->first('date_to')}}</strong>
                            </p>
                        </div>
                    </div>
                    <hr class="mt-0 mb-0">
                    <h5>Gues</h5>
                    <hr class="mb-0">
                    <div class="col-sm-12 pl-0 pt-4">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Adults</label>
                                    <select name="adults" class="form-control" id="exampleFormControlSelect1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Childs</label>
                                    <select name="child" class="form-control" id="exampleFormControlSelect1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(auth()->check())
                        <button type="submit" class="add-to-cart d-block">Booking</button>
                    @else
                        <button onclick="return confirm('You need to be logged in to perform this operation')"
                                type="submit" class="add-to-cart d-block">Booking
                        </button>
                    @endif
                </form>
                <p class="small text-center mt-1" style="font-size: 10px">You won’t be charged yet</p>
                <hr>
                <div class="row">
                    <div class="col-sm-9">
                        <span class="small "
                              style="font-size: 12px">It’s been viewed 500+ times in the past week.</span>
                    </div>
                    <div class="col-sm-3">
                        <img src="https://a0.muscache.com/airbnb/static/page3/icon-uc-light-bulb-b34f4ddc543809b3144949c9e8cfcc8d.gif"
                             class="img-fluid rounded-circle" alt="">
                    </div>

                </div>
            </div>

        </div>
    </div>

    {{--    List star--}}
    <div class="container">
        <div class="col-sm-7 " style="max-width: 100%; word-wrap: break-word;">
            <h3 class=" ">{{$houseDetail->name}}</h3>
            <div class="description" style="word-wrap: break-word;text-align: justify">
                {{$houseDetail->description}}
            </div>
            <section id="reviews" class="mt-5">
                <h2>Reviews</h2>
                <div class="reviews-container">
                    <div class="row">
                        <div class="col-lg-3">
                            <div id="review_summary">
                                <strong>8.5</strong>
                                <em>Superb</em>
                                <small>Based on 4 reviews</small>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-lg-10 col-9">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 90%"
                                             aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-3">
                                    <small><strong>5 stars</strong></small>
                                </div>
                            </div>
                            <!-- /row -->
                            <div class="row">
                                <div class="col-lg-10 col-9">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 95%"
                                             aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-3">
                                    <small><strong>4 stars</strong></small>
                                </div>
                            </div>
                            <!-- /row -->
                            <div class="row">
                                <div class="col-lg-10 col-9">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 60%"
                                             aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-3">
                                    <small><strong>3 stars</strong></small>
                                </div>
                            </div>
                            <!-- /row -->
                            <div class="row">
                                <div class="col-lg-10 col-9">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 20%"
                                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-3">
                                    <small><strong>2 stars</strong></small>
                                </div>
                            </div>
                            <!-- /row -->
                            <div class="row">
                                <div class="col-lg-10 col-9">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 0" aria-valuenow="0"
                                             aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-3">
                                    <small><strong>1 stars</strong></small>
                                </div>
                            </div>
                            <!-- /row -->
                        </div>
                    </div>
                    <!-- /row -->
                </div>
                <div class="rating">
                    <h3>Leave a Review</h3>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <form action="{{ route('rate') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="rating">
                                    <input id="input-1" name="rate" class="rating rating-loading" data-min="0"
                                           data-max="5"
                                           data-step="1" value="{{ $houseDetail->averageRating }}" data-size="xs">
                                    <input type="hidden" name="id"  value="{{ $houseDetail->id }}">
                                    <br/>
                                    @if(auth()->check())
                                        <button class="btn btn-success rate mb-3" style="margin-top: -34px">Review</button>
                                    @else
                                        <button onclick="return confirm('You need to be logged in to perform this operation')"
                                                class="btn btn-success rate mb-3" style="margin-top: -34px">Review
                                        </button>

                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <hr>

                <!-- /review-container -->
            </section>
            <div class="row comment mr-0 ml-0">
                <div class="col-sm-12 pl-0 pr-0">
                    @include('home.replies', ['comments' => $houseDetail->comments, 'post_id' => $houseDetail->id])
                </div>
            </div>

            <div class="add-review">

                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group ">
                            <h3>Your Review</h3>

                            <form method="post" action="{{ route('comment.add') }}">
                                @csrf
                                <div class="form-group">
                                    <textarea style="height:130px; word-wrap: break-word;" type="text"
                                              name="comment_body" class="form-control">

                                    </textarea>
                                    <input type="hidden" name="post_id" value="{{$houseDetail->id }}"/>
                                </div>
                                <div class="form-group col-md-12 pl-0 add_top_20">
                                    @if(auth()->check())
                                        <input type="submit" class="btn btn-info" value="Comment"/>
                                    @else
                                        <input onclick="return confirm('You need to be logged in to perform this operation')" type="submit" class="btn btn-info" value="Comment"/>
                                    @endif
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @include('home.services')
    <script>
        let thumbnails = $('.thumbnail');
        if (thumbnails.length >= 0) {
            setThumbnailImage(thumbnails.get(0));
        }

        function setThumbnailImage(imgs) {
            var expandImg = document.getElementById("expandedImg");
            expandImg.src = imgs.src;
            expandImg.parentElement.style.display = "block";
        }


        $("#input-id").rating();
        $(document).ready(function () {
            $(window).scroll(function () {
                $('.desc').toggleClass("booking", ($(window).scrollTop() > 1000));
            });
        });

    </script>
@endsection
