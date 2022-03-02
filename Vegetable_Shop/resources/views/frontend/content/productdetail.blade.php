@extends('frontend.footer')
@extends('frontend.content')
@extends('frontend.header')
@section('content')

<div class="container col-md-12">

    @foreach ($productdetails as $productdetail) 
    <div class="col-12 col-md-12 container">
        <div class="col-12 ">
            <h1 style="text-align: center; margin-top: 30px;margin-left: -100px;">PRODUCT INFORMATION</h1>
        </div>
        <div class="container" style="margin-top:-50px;">
            <form method="post">
                @csrf
                <div class="container rounded bg-white mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-3 border-right" style="margin-top:-70px;">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img style="width:250px;" class="rounded-circle mt-5" src="{{$product->image}}"><span class="font-weight-bold">{{number_format($product->price) }}đ</span><span> </span></div>
                        </div>
                        <div class="col-md-5 border-right">
                            <div class="p-3 py-5">

                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <label class="labels">Product</label>
                                        <input class="form-control" name="name" value="{{$product->name}}" readonly>
                                    </div>
                                    <input class="form-control" name="price" type="hidden" value="{{number_format($product->price)}}">
                                    <div class="col-md-6">
                                        <label class="labels">Quantity</label>
                                        <input class="form-control" name="quantity" value="{{$product->quantity}}" readonly>
                                        <br>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="labels">Descript</label>
                                        <input class="form-control" name="description" value="{{$product->description}}" readonly>
                                    </div>
                                </div>
                                <div class="mt-5 text-center">
                                    <a style="float:left; width: 125px;" href="{{frontend.index}}" class="btn btn-dark">Back</a>
                                    <a style="float:right; width: 140px;" href="{{($product->cart)}} " class="btn btn-danger"><span class="icon-shopping_cart"></span>Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        @endforeach
    </div>
    @endsection