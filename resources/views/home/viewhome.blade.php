@extends('home.index')
@section('content')
    @include('home.nav')
    @include('home.slides')
    @include('home.date')
    @include('home.houses', ['categories'=>$categories])
    @include('home.services')


{{--    <div class="container">--}}
{{--        <div class="col-sm-12">--}}
{{--            <a href="{{route('profile')}}">ProfileController</a>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection

