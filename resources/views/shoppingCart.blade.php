@extends('layouts.app')
@section('content')
    @if(\Illuminate\Support\Facades\Session::has('cart'))
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Product name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Remove</th>
            </tr>
            </thead>
            @foreach($products as $product)

                <tbody>

                <tr>
                    <td>{{$product['item']['name']}}</td>
                    <td>${{$product['price']}}</td>
                    <th scope="row">{{$product['quantity']}}</th>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('reduceByOne',$product['item']['id'])}}">Reduce by 1</a></li>
                                <li><a href="{{route('removeItem',$product['item']['id'])}}">Remove</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                </tbody>
            @endforeach

        </table>



        <div class="row">
            <div class="col-6">
                <strong>Total: ${{$totalPrice}}</strong>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <a href="{{route('checkout')}}" type="button" class="btn btn-outline-success">Checkout</a>
            </div>
        </div>
    @else
        <div class="row justify-content-center">
            <div class="col-6">
                <h2>No items in Cart!</h2>
            </div>
        </div>
    @endif

@endsection
