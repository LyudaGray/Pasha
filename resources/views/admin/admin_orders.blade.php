@extends('admin.layouts.layout')

@section('content')
    @foreach($orders as $order)
        {{$order['id']}}<br>
        {{$order['client_name']}}<br>
        {{$order['email']}}<br>
        {{$order['phone']}}<br>
        {{$order['created_at']}}<br>
        {{$order['updated_at']}}<br>
        _____________________________<br>

        @foreach($purchases as $purchase)
            @if($purchase['order_id'] == $order['id'])

                @foreach($products as $product)
                    @if($purchase['product_id'] == $product['id'])

                        товар -{{$product['product_name']}};
                        количество - {{$purchase['count']}}<br>

                    @endif
                @endforeach
            @endif
        @endforeach
        @if($order['status']==0)
            <button type="button" onclick="changeStatus();">Оплачено</button><br>
        @endif
        ___________________________________________<br>
        ___________________________________________<br>

    @endforeach
@endsection