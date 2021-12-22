
@extends('layout')
@section('content')
    <div class="text-center">
        <h3>Welcome Back</h3>
    </div>
    <div class="card p-3 mx-auto" style="width: 18rem;">
        <form action="{{route('login')}}" method="POST">
            @csrf
            <div class="form-group p-2">
                <label>Email</label>
                <input type="email" class="form-control @error('email')" is-invalid @enderror"" name="email" placeholder="Email">
                @error('email')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
                <div class="form-group p-2">
                    <label>Password</label>
                    <input type="password" class="form-control @error('password')" is-invalid @enderror"" name="password" placeholder="Password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            <div class="form-group p-2">
                <input type="checkbox" name="remember-me"> Remember Me
            </div>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-warning p-2">Login</button>
            </div>
        </form>
    </div>
@endsection