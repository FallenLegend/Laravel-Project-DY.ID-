@extends('layout')

@section('content')
<div class="container mx-auto card p-3" style="padding-top: 50px; width:50rem;">
    <h2>Join With Us</h2>
    <form method="POST" action="{{ route('store.account') }}">
        @csrf

        <div class="form-group p-2">
            <div>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Full Name">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group p-2">
            <label for="gender">{{ __('Gender') }}</label>
            <div class="custom-control @error('gender') is-invalid @enderror" name="gender">
                <input type="radio" name="gender" value="Male" id="male"> Male
                <input type="radio" name="gender" value="Female" id="female"> Female
                @error('gender')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            
        </div>
        <div class="form-group p-2">
            <div>
                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus placeholder="Address">
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group p-2">
            <div>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        
        <div class="form-group p-2">
            <div>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group p-2">
            <input id="confirmPassword" type="password" class="form-control @error('confirmPassword') is-invalid @enderror" name="confirmPassword" required autocomplete="confirmPassword" placeholder="Confirm Password">
            @error('confirmPassword')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group p-2 d-flex inline">
            <input type="checkbox" class="form-check @error('TermAndCondition') is-invalid @enderror" name="TermAndCondition" >I Agree to Terms & Conditions
            @error('TermAndCondition')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror

        </div>
        <div class="d-flex justify-content-end"><button type="submit" class="btn btn-warning">Register Now</button></div>
    </form>
</div>
@endsection
