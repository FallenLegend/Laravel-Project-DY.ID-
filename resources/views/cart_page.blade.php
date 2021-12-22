@extends('layout')
@section('content')
  @php
  $subtotal = 0;
  $totalPrice = 0;
  @endphp
  <div class="p-3">
    <h2>My Cart</h2>
    @forelse($userProductList as $product)
      @php
      $subtotal = $product->price * $product->quantity;
      $totalPrice = $totalPrice + $subtotal
      @endphp
      <div class="card mx-auto my-3">
        <div class="row no-gutters"> 
          <div class="card-body col-md-4 text-center"><img src="{{asset('storage/img/'.$product->image)}}" width="300px" height="200px"></div>
          <div class="card-header col-md-8">
            <p><b>{{$product->name}}</b> (IDR. {{number_format($product->price)}})</p>
            x{{$product->quantity}} pcs <br><br>
            IDR. {{number_format($subtotal)}} <br><br>
            <div class="d-flex inline">
              <a href="{{url('/editCart', $product->id)}}"><button class="btn btn-warning mx-1">Edit</button></a>
              <form action="{{route('delete.cartItem', $product->id)}}" method="POST">
                @csrf
                <button class="btn btn-danger">Delete</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      @empty
      <div class="card mx-auto text-center" style="width: 50rem; color:red">Oops!! You don't have any items in the cart</div>
      @endforelse
      @if($userProductList->isNotEmpty())
        <b>Total Price:</b>
        <div class="d-flex inline justify-content-between">
          IDR. {{number_format($totalPrice)}}
          <a href="{{route('checkout')}}"><button class="btn btn-warning" type="submit">Checkout</button></a>
        </div>
      @endif
  </div>
@endsection