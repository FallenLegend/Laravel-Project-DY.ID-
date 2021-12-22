@extends('layout')
@section('content')
    <div class="card mx-auto p-3">
        <h2>Edit Category</h2>
        <form action="{{url('/edit-Category', $targetCategory->id)}}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text"
                class="form-control @error('categoryName')" is-invalid @enderror" name="categoryName" value="{{$targetCategory->categoryName}}" placeholder="Category Name">
                @error('categoryName')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="d-flex justify-content-end pt-3"><button type="submit" class="btn btn-warning mb-2">Save</button></div>
        </form>
    </div>
@endsection