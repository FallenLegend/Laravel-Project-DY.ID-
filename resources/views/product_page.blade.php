@extends('layout')
@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-12"> 
                <div class="py-4">
                    <h2>Manage Product</h2>
                </div>
                <table class="table table-striped table-sm table-bordered">
                    <thead>
                        <tr class="table-warning">
                            <th>No</th>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Product Description</th>
                            <th>Product Price</th>
                            <th>Product Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr class="table-warning">
                                <th>{{$loop->iteration}}</th>
                                <td><img src="{{asset('storage/img/'.$product->image)}}" width="100px" height="75px"></td>
                                <td>{{$product->name}}</td>
                                <td style="word-wrap:break-word; min-width:50px; max-width:250px">{{$product->description}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->categoryName}}</td>
                                <td>
                                    <div class="d-flex inline mx-1">
                                        <a href="{{url('/editProduct', $product->id)}}"><button class="btn btn-warning mx-1">Update</button></a>
                                        <form action="{{url('/delete-Product', $product->id)}}" method="POST">
                                            @csrf
                                            <button class="btn btn-danger" type="submit">Delete</button></a>
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