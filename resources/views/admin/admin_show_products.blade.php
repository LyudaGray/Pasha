@extends('admin.layouts.layout')

@section('content')

    Приветствуем Вас в меню продуктов
    <table id="cart_table" border="1" bgcolor="#f0f8ff">
        <thead>
        <th>№</th>
        <th>Наименование</th>
        <th>Категория</th>
        <th>цена за единицу</th>
        <th>наличие на складе</th>
        <th>изменить цену</th>

        </thead>
        <tbody>
        @foreach($products as $k => $product)

            <tr id="row_{{$product['id']}}">
                <td>{{$k+1}}</td>

                <td>{{$product['product_name']}}</td>

                <td>{{$product->category['title']}}</td>

                <td><input id="newPrice_{{$product['id']}}" type="text" value="{{$product['price']}}"></td>

                <td><input id="checkBox" type="checkbox" onchange="changeStatus({{($product['id'])}});" {{($product['status']) ? 'checked' : ''}} ></td>

                <td><button type="button" onclick="changePrice('{{($product['id'])}}');">Изменить цену</button></td>
            </tr>
        @endforeach

        </tbody>

    </table >

@endsection

