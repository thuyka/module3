@extends('backend.layouts.index')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="text-center" style="color:blue">Customers List</h1>
            <a href="{{route('customers.create')}}" class="btn btn-success">Add Customer</a>
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
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($customers as $customer)
                            <tr>
                                <td>{{ $customer->id }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->address }}</td>
                                <td>{{ $customer->phone }}</td>
                                <td>
                                    <form method="post" action="{{route('customers.destroy', $customer->id)}}">
                                        <a href="{{route('customers.edit', $customer->id)}}" class="btn btn-primary">Edit</a>
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