@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @forelse($products as $product)
                <div class="col-4">
                    <div class="thumbnail">
                        <a href="{{route('product.show',$product)}}}"><img src="{{$product->getPicture()}}"
                                                                           style="width: 100%" alt=""></a>
                        <div class="pull-left">${{$product->price}}</div>
                    </div>
                </div>
            @empty
                There are currently no products
            @endforelse

        </div>
        <div class="row justify-content-center">
            {{$products->links()}}
        </div>
    </div>

@endsection
