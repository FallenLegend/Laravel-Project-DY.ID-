@extends('layout')
@section('content')
    <div class="card mx-auto p-3">
        <h1>Insert New Product</h1>
        <form action="{{route('store.product')}}" method="POST" enctype='multipart/form-data'>
            @csrf
            <div class="form-group p-2">
                <input type="text" class="form-control @error('name')" is-invalid @enderror"
                id="name" name="name" value="{{old('name')}}" placeholder="Product Name">
                @error('name')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group p-2">
                <input type="text" class="form-control @error('description')" is-invalid @enderror"
                id="description" name="description" value="{{old('description')}}" placeholder="Product Description">
                @error('description')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group p-2">
                <input type="text"
                class="form-control @error('price')" is-invalid @enderror"
                id="price" name="price" value="{{old('price')}}" placeholder="Product Price">
                @error('price')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group px-2 py-1">
                <label for="category">Product Category</label>
                <select class="form-control" name="category" id="category" aria-placeholder="Choose One">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->categoryName}}</option>
                    @endforeach
                    </select>
                    @error('category')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
            </div>
            <div class="form-group px-2 py-1">
                <label for="file">Product Image</label>
                <input type="file" class="form-control file" id="file" name="file">
                @error('file')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="d-flex justify-content-end"><button type="submit" class="btn btn-warning my-2">Add</button></div>
        </form>
    </div>
@endsection