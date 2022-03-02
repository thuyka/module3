@extends('backend.layouts.index')
@section('content')

@if (Session::has('error'))
<p class="text-danger">
    <i class="fas fa-exclamation" aria-hidden="true"></i>{{ Session::get('error') }}
</p>
@endif

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="text-center">Edit Customer</h1>
            <a href="{{route('customers.index')}}" class="btn btn-success">Back</a> 
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{route('customers.update', $customers->id)}}" method="post">
                    @csrf
                    @method('put')

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" value="{{$customers->name}}" name="name" class="form-control" >
                            @if ($errors->any())
                        <p style="color:red">{{ $errors->first('name') }}</p>
                        @endif
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" value="{{$customers->email}}" name="email" class="form-control" >
                            @if ($errors->any())
                        <p style="color:red">{{ $errors->first('email') }}</p>
                        @endif
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" value="{{$customers->address}}" name="address" class="form-control" >
                            @if ($errors->any())
                        <p style="color:red">{{ $errors->first('address') }}</p>
                        @endif
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" value="{{$customers->phone}}" name="phone" class="form-control" >
                            @if ($errors->any())
                        <p style="color:red">{{ $errors->first('phone') }}</p>
                        @endif
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection