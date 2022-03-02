@extends('backend.layouts.index')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="text-center mt-3">Order Edit</h1>
            <form method="post" action="{{route('order.update',$order->id)}}">
                @csrf
                @method('put')
                <div class="form-group">
                    <label>Order List</label>
                    <input type="text" name="name" class="form-control" value="{{$order->name}}">
                    @if ($errors->any())
                    <p style="color:red">{{$errors->first('name')}}</p>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update</button>

                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
                <div>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Back</button>
                </div>

                @if (Session::has('error'))
                <p class="text-danger">
                    <i class="fas fa-exclamation" aria-hidden="true"></i>{{ Session::get('error') }}
                </p>
                @endif
            </form>
        </div>
    </main>
</div>










@endsection