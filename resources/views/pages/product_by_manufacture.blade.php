@extends('layout')

@section('content')
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Features Items</h2>
    @if($product_by_manufacture->count() > 0)
        @foreach($product_by_manufacture as $product)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{URL::to($product->product_image)}}" height=" 300px" alt="" />
                                <h2>{{$product->product_price}}</h2>
                                <p>{{$product->product_name}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>{{$product->product_price}}</h2>
                                    <p>{{$product->product_name}}</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                            </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-plus-square"></i>{{$product->manufacture_name}}</a></li>
                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p class="alert alert-warning" style="text-align: center;">No Item to select.!</p>
    @endif
</div><!--features_items-->
@endsection