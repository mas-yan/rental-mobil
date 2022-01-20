@extends('layout.auth.index')
@section('title','Login')
@section('content')
<h1 class="auth-title">Log in.</h1>
<p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>

<form action="{{route('login')}}" method="POST">
    @csrf
    <div class="form-group position-relative has-icon-left mb-0">
        <input type="text" name="email" value="{{old('email')}}" class="form-control form-control-xl @error('email') is-invalid @enderror" placeholder="Email">
        <div class="form-control-icon">
            <i class="bi bi-person"></i>
        </div>
    </div>
    @error('email')
        <span class="text-danger">
            <small>{{$message}}</small>
        </span>
    @enderror
    <div class="form-group position-relative has-icon-left mt-3 mb-0">
        <input type="password" name="password" class="form-control form-control-xl" placeholder="Password">
        <div class="form-control-icon">
            <i class="bi bi-shield-lock"></i>
        </div>
    </div>
    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-3">Log in</button>
</form>
<div class="text-center mt-5 text-lg fs-4">
    <p class="text-gray-600">Don't have an account? <a href="/register" class="font-bold">Sign
            up</a>.</p>
</div>

@section('script')
@if (session()->has('success'))

<script>
    Toastify({
        text: "{{session()->get('success')}}",
        duration: 3000,
        close:true,
        gravity:"top",
        position: "left",
        backgroundColor: "#4fbe87",
    }).showToast();
</script>
@endif
@endsection
@endsection
