@extends('backend.layouts.index')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="text-center" style="color:blue">Products List</h1>
            <a href="{{route('products.create')}}" class="btn btn-success">Add Product</a>
            @if (Session::has('success'))
            <p class="text-success">
                <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
            </p>
            @endif

            @if (Session::has('error'))
            <p class="text-danger">
                <i class="fas fa-exclamation" aria-hidden="true"></i>{{ Session::get('error') }}
            </p>
            @endif

            <div class="row">
                <div class="col-lg-12">
                    <table class="table table">
                        <thead>
                            <tr style="background-color:pink">
                                <th>Id</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Category</th>
                                <th style="width:150px; ">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>

                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td><img src="{{ asset('public/upload/'.$product->image) }}" style="width:60px; height:70px"></td>
                                <td>{{ number_format($product->price) }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->categories->name }}</td>
                                <td>
                                    <form method="post" action="{{route('products.destroy', $product->id)}}">
                                        <a href="{{route('products.edit', $product->id)}}" class="btn btn-primary">Edit</a>
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" onclick="return confirm('Are you sure {{$product->name}} ?')">Delete</button>

                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection