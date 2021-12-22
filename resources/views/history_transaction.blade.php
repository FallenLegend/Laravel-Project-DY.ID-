@extends('layout')
@section('content')
    <h1>My Transaction History</h1>
    @forelse($transactions as $transaction)
        @php
        $transactionid = $transaction->id
        @endphp
        <div class="card p-3 my-3">
            {{$transaction->created_at}}
            @foreach($itemDetails as $itemDetail)
                @if($itemDetail->transactionId == $transaction->id)
                    <div class="card p-3 my-1">
                        <div class="row no-gutters"> 
                            <div class="card-body col-md-4 text-center"><img src="{{asset('storage/img/'.$itemDetail->itemImage)}}" width="300px" height="200px"></div>
                            <div class="card-header col-md-8">
                                <b>{{$itemDetail->itemName}}</b> (IDR. {{number_format($itemDetail->itemPrice)}})
                                <br><br><br>
                                x{{$itemDetail->itemQuantity}} pcs
                                <br><br><br>
                                <div class="d-flex inline justify-content-end">IDR. {{number_format($itemDetail->subTotal)}}</div>

                            </div>
                        </div>
                    </div>
                @endif
    
            @endforeach
            <div class="d-flex justify-content-end"><b>Total Price: IDR. {{number_format($transaction->totalPrice)}}</b></div>
            
        </div>
    @empty
        You haven't purchased any items yet!
    @endforelse
@endsection