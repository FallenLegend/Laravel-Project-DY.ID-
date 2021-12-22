@extends('layout')
@section('content')
    <div class="card mx-auto" style="width: 1080px;">
        <div class="row no-gutters">
            <div class="card-body col-md-4 text-center"><img src="{{asset('storage/img/'.$product->image)}}"></div>
            <div class="card-header col-md-8">
                <b>{{$product->name}}</b> 
                <hr>
                <b>Price:</b> <br>
                IDR. {{number_format($product->price)}}
                <hr>
                <b>Description</b> <br>
                {{$product->description}} <br> <br>
                <div class="form-group">
                    <form action="{{route('edit.cartItem', $product->id)}}" method="POST">
                        <div class="form-group p-2 d-flex inline">
                            @csrf
                            Qty:
                            \<input type="text" class="mx-2 form-control @error('newQuantity') is-invalid @enderror" name="newQuantity" style="width: 100px;">
                            @error('newQuantity')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                            <button class="mx-2 btn btn-warning">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection