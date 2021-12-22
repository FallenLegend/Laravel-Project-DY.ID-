@extends('layout')
@section('content')
    <div class="card mx-auto" style="width: 1080px;">
        <div class="row no-gutters">
            <div class="card-body col-md-4"><img src="{{asset('storage/img/'.$product[0]->image)}}" width="350px" height="300px"></div>
            <div class="card-header col-md-8">
                 <br><br>
                <b>{{$product[0]->name}}</b> 
                <hr>
                <b>Category:</b> <br>
                {{$product[0]->categoryName}}
                <hr>
                <b>Price</b> <br>
                IDR. {{number_format($product[0]->price)}}
                <hr>
                <b>Description</b> <br>
                {{$product[0]->description}}
                <hr>
                @guest
                    <a href="{{url('/login')}}"><button class="btn btn-warning"> Login to Buy</button></a> <br><br>
                @endguest
                @if(isset(Auth::user()->id) && (Auth::user()->role == 'member'))
                    <form action="{{route('add.cartItem', $product[0]->id)}}" method="POST">
                        <div class="form-group p-2 d-flex inline">
                            Qty:
                            @csrf
                            <input type="text" class="mx-2 form-control @error('quantity')" is-invalid @enderror" id="quantity" name="quantity" style="width: 100px;">
                            @error('quantity')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                            <button class="mx-2 btn btn-warning">Add to Cart</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection