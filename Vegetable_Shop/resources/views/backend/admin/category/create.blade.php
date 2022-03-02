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
        <h1 class="text-center text-warning">Add New Category</h1>
        <a href="{{route('categories.index')}}" class="btn btn-success">Back</a> 
        <br>
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{route('categories.store')}}" method="post">
                    @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input value="" name="name" class="form-control">
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