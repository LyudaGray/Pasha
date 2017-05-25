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
        @foreach($errors->all() as $error)
            <div class="info-error">
                {{$error}}
            </div>
        @endforeach
    @endif

@endsection

@section('categories')

    <form id="orderForm" method="post" action="/cart/saveorder">

        <div>
            @if(!count($cart)==0)
                <table id="cart_table" border="1" bgcolor="#f0f8ff">
                    <thead>
                    <th>№</th>
                    <th>Наименование</th>
                    <th>количество</th>
                    <th>цена за единицу</th>
                    <th>Удалить из корзины</th>
                    <th></th>
                    </thead>
                    <tbody>
                    @foreach($cart as $k => $item)
                        <tr id="row_{{$item['id']}}">
                            <td>{{$k+1}}</td>
                            <td>{{$item['product_name']}}</td>

                            <td><input onchange="calculateSumm();" id="ProductId_{{$item['id']}}" min="1" size="3" type="number" value="1" name="countOfProductId_{{$item['id']}}"></td>

                            <td><input id="priceOfProductId_{{$item['id']}}" type="text" value="{{$item['price']}}" name="priceOfProductId_{{$item['id']}}"></td>

                            <td><button class="btn" type="button" onclick="removeFromCart({{$item['id']}})">Удалить</button> </td>

                            <td><input type="hidden" value="{{$item['id']}}" name="ProductId_{{$item['id']}}"></td>

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

        <div id="submit_order" class="{{(count($errors)>0) ? "" : 'hide'}}">

                <div>
                    <label>ФИО:</label>
                    <input type="text" name="name" value="{{old('name')}}"required>
                </div>

                <div>
                    <label>Email address:</label>
                    <input type="email" name="email" value="{{old('email')}}" required>
                </div>

                <div>
                    <label>Phone:</label>
                    <input type="tel" name="phone" value="{{old('phone')}}" required>
                </div>



                {{--капча--}}

                <div class="">
                    <label for=""></label>
                    <img src="{{ captcha_src() }}" alt="captcha" class="captcha-img" data-refresh-config="default"><a href="#" id="refresh"><span class="glyphicon glyphicon-refresh">refresh</span></a></p>
                </div>
                <div class="">
                    <label>Капча</label>
                    <input class="form-control" type="text" name="captcha" required>
                </div>

            {{csrf_field()}}

                <button type="submit" class="btn btn-default">Подтвердить </button><br><br><br>

        </div>

    </form>


@endsection

@section('categories_grafica')

@endsection