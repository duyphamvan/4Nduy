@extends('home.index')
@section('content')
    @include('home.nav')
    @yield('content')
    @include('home.slides')
{{--    <div class="container">--}}
{{--        <div class="col-sm-12">--}}
{{--            <a href="{{route('profile')}}">Profile</a>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection

