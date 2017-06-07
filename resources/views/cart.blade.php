@extends('layouts_views.layout')
@section('slider')

    <div id="bread-banner">
        <div id="bread-banner-inner">
            <h3>Корзина покупок</h3>
            <h5 class="bread-here"></h5>
            <h5 class="bread-phone"></h5>
        </div>
    </div>

    @if(count($errors)>0)
        <div class="inner-wrapper padding-top">
            @foreach($errors->all() as $error)
                <div class="info-error">
                    {{$error}}
                </div>
            @endforeach
        </div>
    @endif

@endsection

@section('categories')
    <div class="inner-wrapper">
        <form id="orderForm" method="post" action="/cart/saveorder">

            <div>
                @if(!count($cart)==0)
                    <table id="cart_table" border="1" bgcolor="#f0f8ff" class="responsive-table">
                        <thead>
                        <th class="number">№</th>
                        <th class="name">Наименование</th>
                        <th class="amount">Количество</th>
                        <th class="coast">Цена за единицу</th>
                        <th class="del">Удалить из корзины</th>
                        <th class="hidden"></th>
                        </thead>
                        <tbody>
                        @foreach($cart as $k => $item)
                            <tr id="row_{{$item['id']}}">
                                <td class="number" data-label="№">{{$k+1}}</td>
                                <td class="name" data-label="Наименование">{{$item['product_name']}}</td>

                                <td class="amount" data-label="Количество"><input onchange="calculateSumm();" id="ProductId_{{$item['id']}}" min="1" size="3" type="number" value="1" name="countOfProductId_{{$item['id']}}"></td>

                                <td class="coast" data-label="Цена за единицу"><input id="priceOfProductId_{{$item['id']}}" type="text" value="{{$item['price']}}" name="priceOfProductId_{{$item['id']}}" readonly></td>

                                <td class="del" data-label="Удалить из корзины"><button class="btn" type="button" onclick="removeFromCart({{$item['id']}})">Удалить</button> </td>

                                <td class="hidden"><input type="hidden" value="{{$item['id']}}" name="ProductId_{{$item['id']}}"></td>

                            </tr>
                            <div class="hide">{{$summa+=$item['price']}}</div>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="6" align="right">Общая стоимость продукции:<span id="summa_zakaza">{{$summa}},00грн</span></td>
                        </tr>
                        </tfoot>
                    </table >

                    <button id="press_order" class="btn" onclick="showOrderForm();" type="button">Сделать заказ</button><br><br><br>

                @else
                    <div class="info-success">
                        <br>Корзина пустая...
                    </div>

                @endif

            </div>

            <div id="submit_order" class="{{(count($errors)>0) ? "" : 'hide'}} order-form">

                    <div class="formblock">
                        <label for="userName">ФИО:</label>
                        <input id="userName" type="text" name="name" value="{{old('name')}}"required>
                    </div>

                    <div class="formblock">
                        <label for="userEmail">Email address:</label>
                        <input id="userEmail" type="email" name="email" value="{{old('email')}}" required>
                    </div>

                    <div class="formblock">
                        <label for="userPhone">Phone:</label>
                        <input id="userPhone" type="tel" name="phone" value="{{old('phone')}}" required>
                    </div>



                    {{--капча--}}
                    <div class="formblock ">
                        <label for="captchaInput">Captcha</label>
                        <div class="captcha">
                            <input id="captchaInput" type="text" name="captcha" required>
                            {{--<label for=""></label>--}}
                            <img src="{{ captcha_src() }}" alt="captcha" class="captcha-img" data-refresh-config="default"><a href="#" id="refresh"><span class="captcha-loader">Обновить</span></a></p>
                        </div>
                    </div>
                {{csrf_field()}}

                    <button type="submit" class="btn btn-default">Подтвердить </button><br><br><br>

            </div>

        </form>

    </div>
@endsection

@section('categories_grafica')

@endsection