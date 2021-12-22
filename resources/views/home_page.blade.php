@extends('layout')
@section('content')
    <div class="row">
        <div class="container-fluid">
            <div class="col-12 text-center"><h1>New Product</h1></div>
        </div>
        @forelse($product as $p)
            <div class="col-sm-6 col-md-4 p-3">
                <div class="card border-warning">
                    <img src="{{asset('storage/img/'.$p->image)}}" width="auto" height="250px">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4>{{$p->name}}</h4>
                            {{$p->categoryName}}
                        </div>
                        <div>
                            Rp. {{number_format($p->price)}}
                        </div>
                        <a href="{{url('/productDetail', ['id'=>$p->id])}}"><button class="btn btn-warning">More Detail</button></a>
                    </div>
                </div>
            </div>
        @empty
            <div class="card mx-auto text-center" style="width: 10rem; color:red;">No product found!</div>
        @endforelse
    </div>
    {{$product->links('pagination::bootstrap-4')}}
@endsection