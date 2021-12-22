@extends('layout')
@section('content')
    <div class="card mx-auto p-3">
        <h2>Insert New Category</h2>
        <form action="{{route('store.category')}}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text"
                class="form-control @error('name')" is-invalid @enderror"
                id="name" name="name" value="{{old('name')}}" placeholder="Category Name">
                @error('name')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="d-flex justify-content-end pt-3"><button type="submit" class="btn btn-warning mb-2">Add</button></div>
        </form>
    </div>
@endsection