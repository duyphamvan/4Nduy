@extends('home.index')
@section('content')
    @include('home.nav')
    @include('home.slides')
    @include('home.date')
    @include('home.houses', ['categories'=>$categories])
    @include('home.services')

@endsection

