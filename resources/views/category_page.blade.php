@extends('layout')
@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="py-4">
                    <h2>Manage Category</h2>
                </div>
                <table class="table table-striped table-warning table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td>{{$category->categoryName}}</td>
                                <td>
                                    <div class="d-flex inline">
                                        <a href="{{url('/editCategory', $category->id)}}"><button type="submit" class="btn btn-warning mx-1">Update</button></a>
                                        <form action="{{route('delete.category', $category->id)}}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger mb-2">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>No Data</tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection