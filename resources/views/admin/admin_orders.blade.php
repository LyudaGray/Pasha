@extends('admin.layouts.layout')

@section('content')
    @foreach($orders as $k => $order)

    <table id="order_table" border="1" bgcolor="#f0f8ff">
        <thead>
            <th>№пп</th>
            <th>№ заказа</th>
            <th>Имя клиента</th>
            <th>Email</th>
            <th>Телефон заказчика</th>
            <th>Дата создания заказа</th>
            <th>Дата изменения заказа</th>

            @if($order['status']==0)
                <th>Изменить статус заказа</th>
            @endif


        </thead>
        <tbody>

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
                </tr>
                <table>
                    <thead>
                        <th>Название товара</th>
                        <th>Количество</th>
                    </thead>
                    <tbody>

                        @foreach($purchases as $purchase)
                            @if($purchase['order_id'] == $order['id'])

                                @foreach($products as $product)
                                    @if($purchase['product_id'] == $product['id'])
                                        <tr>
                                            <td>{{$product['product_name']}}</td>
                                            <td>{{$purchase['count']}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                    </tbody>

                </table>
       -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            @endforeach
        </tbody>
</table >

@endsection