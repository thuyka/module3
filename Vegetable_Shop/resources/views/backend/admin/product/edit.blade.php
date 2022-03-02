@extends('backend.layouts.index')
@section('content')
<div id="layoutSidenav_content">
@if (Session::has('error'))
<p class="text-danger">
    <i class="fas fa-exclamation" aria-hidden="true"></i>{{ Session::get('error') }}
</p>
@endif
    <div class="container-fluid px-4">
        <h1 class="text-center text-warning">Edit Product</h1>
        <a href="{{route('products.index')}}" class="btn btn-success">Back</a>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <form action="{{route('products.update', $products->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" value="{{$products->name}}" name="name" class="form-control">
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('name') }}</p>
                        @endif
                    </div> <br>
                    <div class="form-group">
                        <label>image</label>
                        <img src="{{asset('public/upload/'.$products->image)}}" width="100px">
                        <input type="file" id="upload_file_input" name="image" class="form-control" value="{{ asset('public/upload/'.$products->image) }}">
                    </div> <br>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" value="{{$products->price}}" name="price" class="form-control">
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('price') }}</p>
                        @endif
                    </div> <br>
                    <div class="form-group">
                        <label>Description</label>
                        <input value="{{$products->description}}" name="description" class="form-control">
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('description') }}</p>
                        @endif
                    </div> <br>
                    <div class="form-group">
                        <label>Quantity</label>
                        <input value="{{$products->quantity}}" name="quantity" class="form-control">
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('quantity') }}</p>
                        @endif
                    </div> <br>
                    <label>Category</label>
                    <select class="form-select form-control" name="category_id">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <br>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection