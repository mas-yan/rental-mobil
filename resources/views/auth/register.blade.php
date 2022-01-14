@extends('layout.auth.index')
@section('title','Register')
@section('content')
<h1 class="auth-title">Sign Up</h1>
<p class="auth-subtitle mb-5">Input your data to register to our website.</p>

<form action="{{route('register')}}" method="POST">
    @csrf
    <div class="form-group mb-0 position-relative has-icon-left">
        <input type="text" name="email" value="{{old('email')}}" class="form-control form-control-xl @error('email') is-invalid @enderror" placeholder="Email">
        <div class="form-control-icon">
            <i class="bi bi-envelope"></i>
        </div>
    </div>
    @error('email')
        <span class="text-danger">
            <small>{{$message}}</small>
        </span>
    @enderror
    <div class="form-group position-relative has-icon-left mt-3 mb-0">
        <input type="text" class="form-control @error('name') is-invalid @enderror form-control-xl" value="{{old('name')}}" name="name" placeholder="name">
        <div class="form-control-icon">
            <i class="bi bi-person"></i>
        </div>
    </div>
    @error('name')
        <span class="text-danger">
            <small>{{$message}}</small>
        </span>
    @enderror
    <div class="form-group position-relative has-icon-left mt-3 mb-0">
        <input type="password" name="password" class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="Password">
        <div class="form-control-icon">
            <i class="bi bi-shield-lock"></i>
        </div>
    </div>
    @error('password')
        <span class="text-danger">
            <small>{{$message}}</small>
        </span>
    @enderror
    <div class="form-group position-relative has-icon-left mt-3 mb-0">
        <input type="password" class="form-control form-control-xl" name="password_confirmation" placeholder="Confirm Password">
        <div class="form-control-icon">
            <i class="bi bi-shield-lock"></i>
        </div>
    </div>
    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Sign Up</button>
</form>
<div class="text-center mt-5 text-lg fs-4">
    <p class='text-gray-600'>Already have an account? <a href="/login" class="font-bold">Log
            in</a>.</p>
</div>
@endsection
