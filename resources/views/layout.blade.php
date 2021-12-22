<!DOCTYPE html>
<html lang="en">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <title>DY.ID</title>
</head>
<body>
    <!-- Header -->
    <div class="bg-warning d-flex inline p-3">
        <img src="{{asset('storage/img/DY-store-logo.png')}}" width="50px" height="50px">
        <h1>DY.ID</h1>
        <form action="{{url('/search')}}" method="GET" role="search">
          @csrf
          <div class="input-group">
              <div class="px-3" style="width: 60rem;"><input type="search" class="form-control" name="search" placeholder="Search Product..."></div>
              <span class="input-group-btn">
              <button type="submit" class="btn btn-default">
                 <img src="{{asset('storage/img/search-icon.png')}}" width="20px" height="20px">
              </button>
              </span>
          </div>
        </form>
    </div>
    <!-- Menu Bar -->
    <div class="bg-primary">
        @guest
            <div class="d-flex justify-content-between p-3">
                <a href="{{url('/home')}}"><button type="submit" class="btn btn-outline-light">Home</button></a>
                <div>
                    <a href="{{url('/login')}}"><button type="submit" class="btn btn-outline-light">Login</button></a>
                    <a href="{{url('/register')}}"><button type="submit" class="btn btn-outline-light">Register</button></a>
                </div>
            </div>
        @endguest
        @if(isset(Auth::user()->id) && (Auth::user()->role == 'member'))
            <div class="d-flex justify-content-between p-3">
                <div>
                    <a href="{{url('/home')}}"><button type="submit" class="btn btn-outline-light"><b>Home</b></button></a> 
                    <a class="mx-2" href="{{ url('/cart') }}" style="text-decoration: none; color:white;">My Cart</a>
                    <a class="mx-2"href="{{ url('/historyTransaction') }}" style="text-decoration: none; color: white;">History Transaction</a>
                </div>
                <a class="btn btn-outline-light" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        @endif      
        @if(isset(Auth::user()->id) && (Auth::user()->role == 'admin'))
        <div class="p-3 d-flex justify-content-between">
            <div class="d-flex inline">
              <a href="{{url('/home')}}"><button type="submit" class="btn btn-outline-light"><b>Home</b></button></a> 
              <div class="px-3 dropdown">
                <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage Product</button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{url('/product')}}">View Product</a>
                  <a class="dropdown-item" href="{{url('/addProduct')}}">Add Product</a>
                </div>
                <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage Category</button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{url('/category')}}">View Category</a>
                  <a class="dropdown-item" href="{{url('/addCategory')}}">Add Category</a>
                </div>
              </div>
            </div>
            <a class="btn btn-outline-light" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
        </div>
        @endif
    </div>
    <!-- Content -->
    <div class="container-fluid bg-info p-5">
        <div class="container">
            @yield('content')
        </div>
    </div>
    <!-- Footer -->
    <div class="container-fluid bg-primary text-white text-center">
        <div class="social-media-icons">
            <img src="{{asset('storage/img/fb-icon.png')}}" width="35px" height="35px">
            <img src="{{asset('storage/img/ig-icon.png')}}" width="40px" height="40px">
            <img src="{{asset('storage/img/help-icon.png')}}" width="30px" height="30px">
        </div>
        <small>@2021 Copyright DY20-1</small>
    </div> 
</body>
</html>