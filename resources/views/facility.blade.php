@extends('layouts_views.layout')
@section('slider')

    <div id="bread-banner">
        <div id="bread-banner-inner">
            <h3>ОПЛАТА И ДОСТАВКА</h3>
            <h5 class="bread-here"></h5>
            <h5 class="bread-phone"></h5>
        </div>
    </div>

@endsection

@section('categories')
    @include('categories')
@endsection

@section('categories_grafica')
    @include('facility_content')
@endsection