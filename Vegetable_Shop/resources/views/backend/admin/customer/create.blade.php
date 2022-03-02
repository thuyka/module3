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
        <h1 class="text-center text-warning">Add New customer</h1>
        <a href="{{route('customers.index')}}" class="btn btn-success">Back</a> 
        <br>
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{route('customers.store')}}" method="post">
                    @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input value="" name="name" class="form-control">
                            @if ($errors->any())
                        <p style="color:red">{{ $errors->first('name') }}</p>
                        @endif
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input value="" name="email" class="form-control">
                            @if ($errors->any())
                        <p style="color:red">{{ $errors->first('email') }}</p>
                        @endif
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input value="" name="address" class="form-control">
                            @if ($errors->any())
                        <p style="color:red">{{ $errors->first('address') }}</p>
                        @endif
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input value="" name="phone" class="form-control">
                            @if ($errors->any())
                        <p style="color:red">{{ $errors->first('phone') }}</p>
                        @endif
                        </div>
                        <div class="form-group">
                        <br>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
