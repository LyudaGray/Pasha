@extends('admin.layouts.layout')

@section('content')

    <table id="order_table" border="1" bgcolor="#f0f8ff">
        <thead>
        <th>№пп</th>
        <th>№ заказа</th>
        <th>Имя клиента</th>
        <th>Email</th>
        <th>Телефон заказчика</th>
        <th>Дата создания заказа</th>
        <th>Дата изменения заказа</th>
        <th>Изменить статус заказа</th>


        </thead>
        <tbody>
        @foreach($orders as $k => $order)

            <tr id="row_{{$order['id']}}">

                <td>{{$k+1}}</td>

                <td>{{$order['id']}}</td>

                <td>{{$order['client_name']}}</td>

                <td>{{$order['email']}}</td>

                <td>{{$order['phone']}}</td>

                <td> {{$order['created_at']}}</td>

                <td> {{$order['updated_at']}}</td>

                @if($order['status']==0)
                    <td> <button type="button" onclick="changeOrderStatus({{$order['id']}});">Оплачено</button></td>
                @endif


        @endforeach

        </tbody>

    </table >



    {{--@foreach($orders as $order)--}}
        {{--{{$order['id']}}<br>--}}
        {{--{{$order['client_name']}}<br>--}}
        {{--{{$order['email']}}<br>--}}
        {{--{{$order['phone']}}<br>--}}
        {{--{{$order['created_at']}}<br>--}}
        {{--{{$order['updated_at']}}<br>--}}
        {{--_____________________________<br>--}}

        {{--@foreach($purchases as $purchase)--}}
            {{--@if($purchase['order_id'] == $order['id'])--}}

                {{--@foreach($products as $product)--}}
                    {{--@if($purchase['product_id'] == $product['id'])--}}

                        {{--товар -{{$product['product_name']}};--}}
                        {{--количество - {{$purchase['count']}}<br>--}}

                    {{--@endif--}}
                {{--@endforeach--}}
            {{--@endif--}}
        {{--@endforeach--}}
        {{--@if($order['status']==0)--}}
            {{--<button type="button" onclick="changeOrderStatus({{$order['id']}});">Оплачено</button><br>--}}
        {{--@endif--}}
        {{--___________________________________________<br>--}}
        {{--___________________________________________<br>--}}

    {{--@endforeach--}}
@endsection