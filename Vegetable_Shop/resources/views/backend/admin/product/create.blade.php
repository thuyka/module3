@extends('backend.layouts.index')
@section('content')
<div id="layoutSidenav_content">
@if (Session::has('error'))
<p class="text-danger">
    <i class="fas fa-exclamation" aria-hidden="true"></i>{{ Session::get('error') }}
</p>
@endif
    <div class="container-fluid px-4">
        <h1 class="text-center text-warning">Add New Product</h1>
        <a href="{{route('products.index')}}" class="btn btn-success">Back</a>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input value="" name="name" class="form-control">
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('name') }}</p>
                        @endif
                    </div> <br>
                    <div class="form-group">
                        <label>image</label>
                        <input type="file" name="image" class="form-control">
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('image') }}</p>
                        @endif
                    </div> <br>
                    <div class="form-group">
                        <label>Price</label>
                        <input value="" name="price" class="form-control">
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('price') }}</p>
                        @endif
                    </div> <br>
                    <div class="form-group">
                        <label>Description</label>
                        <input value="" name="description" class="form-control">
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('description') }}</p>
                        @endif
                    </div> <br>
                    <div class="form-group">
                        <label>Quantity</label>
                        <input value="" name="quantity" class="form-control">
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
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>


@endsection