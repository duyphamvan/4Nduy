<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <style>
        body {
            margin-top: auto;
            background-color: #f1f1f1;
        }

        .border {
            border-bottom: 1px solid #F1F1F1;
            margin-bottom: 10px;
        }

        .image-section {
            padding: 0px;
        }

        .image-section img {
            width: 100%;
            height: 250px;
            position: relative;
        }

        .user-image {
            position: absolute;
            margin-top: -50px;
        }

        .user-left-part {
            margin: 0px;
            width: 100%;

        }

        .user-image img {
            width: 100px;
            height: 100px;
        }

        .user-profil-part {
            padding-bottom: 30px;
            background-color: #FAFAFA;
            border-right: 4px solid #d0d0d0;
        }

        .follow {
            margin-top: 70px;
        }

        .user-detail-row {
            margin: 0px;
        }

        .user-detail-section2 p {
            font-size: 12px;
            padding: 0px;
            margin: 0px;
        }

        .user-detail-section2 {
            margin-top: 10px;
        }

        .user-detail-section2 span {
            color: #7CBBC3;
            font-size: 20px;
        }

        .user-detail-section2 small {
            font-size: 12px;
            color: #D3A86A;
        }

        .profile-right-section {
            padding: 20px 0px 10px 15px;
            background-color: #FFFFFF;
        }

        .profile-right-section-row {
            margin: 0px;
        }

        .profile-header-section1 h1 {
            text-transform: uppercase;
            font-size: 25px;
            margin: 0px;
            margin-bottom: 10px;
        }

        .profile-header-section1 h5 {
            color: #0062cc;
            margin-bottom: 17px;
        }

        .req-btn {
            height: 30px;
            font-size: 12px;
        }

        .profile-tag {
            padding: 10px;
            border: 1px solid #F6F6F6;
        }

        .profile-tag p {
            font-size: 12px;
            color: black;
        }

        .profile-tag i {
            color: #ADADAD;
            font-size: 20px;
        }

        .image-right-part {
            background-color: #FCFCFC;
            margin: 0px;
            padding: 5px;
        }

        .img-main-rightPart {
            background-color: #FCFCFC;
            margin-top: auto;
        }

        .image-right-detail {
            padding: 0px;
        }

        .image-right-detail p {
            font-size: 12px;
        }

        .image-right-detail a:hover {
            text-decoration: none;
        }

        .image-right img {
            width: 100%;
        }

        .image-right-detail-section2 {
            margin: 0px;
        }

        .image-right-detail-section2 p {
            color: #38ACDF;
            margin: 0px;
        }

        .image-right-detail-section2 span {
            color: #7F7F7F;
        }

        .nav-link {
            font-size: 1.2em;
        }

        .tab-content {
            margin-top: 20px;
        }

        a.btn.btn-primary.edit-profile {
            background-color: white;
            border: 1px solid #000000bd;
            color: #211f1f;
        }

        a.btn.btn-primary.edit-profile:hover {
            background-color: #524f4f;
            color: white;
        }




        input {
            display: none;
            visibility: hidden;
        }
        label {
            display: block;
            padding: 0.5em;
            border-bottom: 1px solid #CCC;
            color: #666;
            font-size: 20px;
        }
        label:hover {
            color: #000;
        }
        label::before {
            font-family: Consolas, monaco, monospace;
            font-weight: bold;
            font-size: 15px;
            content: "+";
            vertical-align: text-top;
            display: inline-block;
            margin-right: 12px;
            text-align: center;
            width: 20px;
            height: 20px;
            background-color: #e6d6d6;
            border-radius: 50%;
            line-height: 20px;
        }
        #expand {
            height: 0px;
            overflow: hidden;
            transition: height 0.5s;
            color: black;
        }
        section {
            padding: 0 20px;
        }
        #toggle:checked ~ #expand {
            height: 250px;
        }
        #toggle:checked ~ label::before {
            content: "-";
        }
    </style>
</head>

<body>
<div class="container main-secction">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 image-section">
            <img src="https://i.pinimg.com/originals/68/08/fc/6808fc4102859fffddeb405232df571a.jpg">
        </div>
        <div class="row user-left-part">
            <div class="col-md-3 col-sm-3 col-xs-12 user-profil-part pull-left">
                <div class="row ">
                    <div class="col-md-12 col-md-12-sm-12 col-xs-12 user-image text-center">
                        <img src="{{asset("storage/".$profileUser->image)}}" class="rounded-circle">
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 user-detail-section1 text-center">
                        <a class="btn btn-outline-info btn-block follow">
                            Rented Houses</a>
                        <button class="btn btn-outline-info btn-block">History</button>
                    </div>
                    <div class="row user-detail-row">
                        <div class="col-md-12 col-sm-12 user-detail-section2 pull-left">
                            <div class="border"></div>
                            <p>FOLLOWER</p>
                            <span>320</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 offset-sm-2">
                    <a href="{{route('viewhome')}}" class="btn btn-info">Back To Home</a>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12 pull-right profile-right-section">
                <div class="row profile-right-section-row">
                    <div class="col-md-12 profile-header">
                        <div class="row">
                            <div class="col-md-8 col-sm-6 col-xs-6 profile-header-section1 pull-left">
                                <h1 class="username">{{$profileUser->name}}</h1>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6 profile-header-section1 text-right pull-rigth">
                                <a href="{{route('user.edit', $profileUser->id)}}" class="btn btn-primary edit-profile">Edit
                                    Profile</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="" role="tab" data-toggle="tab"><i
                                                    class="far fa-user"></i> Info</a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade show active" id="profile">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>ID</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$profileUser->id}}</p>
                                            </div>
                                        </div>
                                        <hr class="mt-0">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>User Name</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$profileUser->name}}</p>
                                            </div>
                                        </div>
                                        <hr class="mt-0">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>Email</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$profileUser->email}}</p>
                                            </div>
                                        </div>
                                        <hr class="mt-0">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>Phone Number</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$profileUser->phone}}</p>
                                            </div>
                                        </div>
                                        <hr class="mt-0">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>Profesion</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$profileUser->role}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mt-0">

                                </div>
                            </div>
                            <main>
                                <input id="toggle" type="checkbox" checked>
                                <label class="text-info" for="toggle">Timelines</label>
                                <div id="expand">
                                    <section>
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">STT</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Check in</th>
                                                <th scope="col">Check out</th>
                                                <th scope="col">Name House</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($bookings as $key=> $booking)
                                                <tr>
                                                    <th scope="row">{{++$key}}</th>
                                                    @if($booking->status == '0')
                                                        <td class="text-info">Waiting</td>
                                                    @elseif($booking->status == '2')
                                                        <td class="text-success">Success</td>
                                                    @elseif($booking->status == '3')
                                                        <td class="text-danger">Fail</td>
                                                    @endif

                                                    <td>{{\Carbon\Carbon::parse($booking->date_from)->format('d-m-Y')}}</td>
                                                    <td>{{\Carbon\Carbon::parse($booking->date_to)->format('d-m-Y')}}</td>
                                                    <td>{{$booking->house->name}}</td>
                                                    <td>{{$booking->house->address}}</td>
                                                    <td>$ {{$booking->total_money}}</td>
                                                    @if(strtotime($booking->date_from)/86400 - $date > 2)
                                                        <td><a onclick="return confirm('Are you sure you want to cancel')" href="{{route('user.cancel',$booking->id)}}" class="btn btn-warning">Cancel</a></td>
                                                    @else
                                                        <td><button type="button" class="btn btn-danger" disabled><del>Cancel</del></button></td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                                <tr>
                                                    @if (Session::has('success'))
                                                        <p class="text-success">
                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                            {{ Session::get('success') }}
                                                        </p>
                                                    @endif
                                                </tr>
                                            </tbody>
                                        </table>

                                    </section>
                                </div>
                            </main>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</body>
</html>
