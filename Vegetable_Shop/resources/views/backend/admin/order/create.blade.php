@extends('backend.layouts.index')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="text-center text-warning">Add Order</h1>
            <a href="{{route('order.index')}}" class="btn btn-success">Back</a>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{route('order.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Status</label>
                            <input value="" name="status" class="form-control">
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('status') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Code</label>
                            <input value="" name="code" class="form-control">
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('code') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Customer</label>
                            <input value="" name="customer_id" class="form-control">
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('customer_id') }}</p>
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