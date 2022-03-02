@extends('backend.layouts.index')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="text-center" style="color:blue">Orders List</h1>
            <a href="{{route('order.create')}}" class="btn btn-success">Add Order</a>
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
                                <th>Status</th>
                                <th>Code</th>
                                <th>Customer_id</th>
                                <th style="width:150px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->status }}</td>
                                <td>{{ $order->code }}</td>
                                <td>{{ $order->customer_id }}</td>
                                <td>
                                    <a href="{{route('order.edit', $order->id)}}" class="btn btn-primary">Edit</a>
                                    <form method="post" action="{{route('order.destroy', $order->id)}}" style="display:inline" method="post">
                                           @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
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