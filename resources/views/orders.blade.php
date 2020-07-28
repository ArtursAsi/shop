@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-6">
            <h2>My orders</h2>
            @forelse($orders as $order)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach($order->cart->items as $item)
                                <li class="list-group-item">
                                    <span class="badge">${{$item['price']}}</span>
                                    {{$item['item']['name']}} | {{$item['quantity']}} units
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="panel-footer">
                        <strong>Total price: ${{$order->cart->totalPrice}}</strong>
                    </div>
                </div>
            @empty
                You haven`t ordered anything yet!!!
            @endforelse
        </div>
    </div>
@endsection
