@extends('layouts_views.layout')
@section('slider')

    <div id="bread-banner">
        <div id="bread-banner-inner">
            <h3>Контакты</h3>
            <h5 class="bread-here"></h5>
            <h5 class="bread-phone"></h5>
        </div>
    </div>
<br>

    @if(count($errors)>0)
        @foreach($errors->all() as $error)
            <div class="info-error">
                {{$error}}
            </div>


        @endforeach
    @endif

@endsection

@section('categories')
    @include('contact_content')
@endsection

@section('categories_grafica')

@endsection





