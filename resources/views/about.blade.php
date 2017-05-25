@extends('layouts_views.layout')
@section('slider')

    <div id="bread-banner">
        <div id="bread-banner-inner">
            <h3>О нас</h3>
            <h5 class="bread-here"></h5>
            <h5 class="bread-phone"></h5>


        </div>
    </div>
    <br>

    <div class="info-success">
        @include('flash::message')
    </div>



@endsection

@section('categories')
         @include('categories')
@endsection

@section('categories_grafica')
    @include('about_content')
@endsection