@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $product->name }}
                        <a href="{{route('product.edit',$product)}}">Edit</a>

                    </div>
                    <form action="{{route('product.delete',$product)}}" method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>
                    <div class="card-body">
                        <div class="row">
                            <a href="" data-toggle="modal" data-target="#myModal"><img src="{{$product->getPicture()}}"
                                                                                       alt=""
                                                                                       style="width: 100%"></a>
                            <div class="col-6">
                                <h6 class="d-inline">{{$product->description}}</h6>
                            </div>

                        </div>
                        <form action="{{route('product.addToCart',$product)}}" method="post">
                            @csrf
                            <button class="btn btn-outline-success pull-right" type="submit">Add to cart</button>

                        </form>

                    </div>
                </div>
            </div>

            <div class="modal" tabindex="-1" role="dialog" id="myModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{$product->name}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <a href="{{$product->getPicture()}}"><img src="{{$product->getPicture()}}" alt=""
                                                                      style="width: 100%"></a>
                        </div>
                        <div class="modal-footer">
                            <form action="{{route('product.updateImage',$product)}}" enctype="multipart/form-data"
                                  method="post">
                                @csrf
                                @method('PATCH')
                                <input type="file" name="image">
                                <button class="btn btn-outline-primary">Upload</button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

@endsection
