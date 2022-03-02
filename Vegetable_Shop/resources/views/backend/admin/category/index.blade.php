@extends('backend.layouts.index')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="text-center" style="color:blue">Categories List</h1>
            <a href="{{route('categories.create')}}" class="btn btn-success">Add Category</a>
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $key => $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a href="{{route('categories.edit', $category->id)}}" class="btn btn-primary">Edit</a>
                                    <form method="post" action="{{route('categories.destroy', $category->id)}}" style="display:inline" method="post">
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