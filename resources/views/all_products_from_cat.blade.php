@extends('layouts_views.layout')
@section('slider')
    <!--- Start Bread Crumbs -->
    <div id="bread-banner">
        <div id="bread-banner-inner">
            <h3>{{$cat_name}}</h3>
            <h5 class="bread-here"></h5>
            <h5 class="bread-phone"></h5>
        </div>
    </div>
    <!--- End Bread Crumbs -->
@endsection

@section('categories')
@if(count($products) > 0)
    @foreach($products as $product)

        <div class="clearfix"></div>
        <div id="inner-wrapper">

            <article>
                <!--- Start Animation -->

                <section class="os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0s">

                    <img src={{asset('img/'. $product['img']. '.png')}} class="circle-image" title=""/>

                </section> <!--- End Animation -->
            </article>
            <aside>

                <!--- Start Animation -->
                <section class="os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0s">
                    <h3 class="text-welcome">{{$product['product_name']}}</h3>
                        <br>
                              <div class="line-rule"></div>
                        <br>
                    <p>{{$product['short_description']}}</p>

                </section>
                </section> <!--- End Animation -->
                <div class="button-holder {{(isset(session('cart')['product_'.$product['id']])) ? 'hide' : ''}}">
                    <a id="addCart_{{$product['id']}}" class="btn" href = "javascript:void(0);" onclick="addToCart({{$product['id']}});">Добавить в корзину</a>
                </div>

                <div class="button-holder {{(!isset(session('cart')['product_'.$product['id']])) ? 'hide' : ''}}">
                    <a id="removeCart_{{$product['id']}}" class="btn" href = "javascript:void(0);" onclick="removeFromCart({{$product['id']}});">Удалить из корзины</a>
                </div>

            </aside>

        </div>

    @endforeach
@else

    <div>В данной категории нет товаров</div>

@endif

@endsection

@section('categories_grafica')

@endsection

