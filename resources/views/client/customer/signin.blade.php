@extends('layout.layout')

@section('title', 'Sign In')
@section('content')
    <div class="login-box">
        <div class="login-cart">
            <h2>Sign In</h2>
            <h3>Enter your credentials</h3>
            <form class="login-form" action="{{ route('signin.post') }}" method="POST">
                @csrf
                <input type="text" placeholder="Username" name="username" value="{{ old('username') }}">
                @error('username')
                    <p class="d-flex justify-content-start ps-3 text-danger">{{ $message }}</p>
                @enderror
                <input type="password" placeholder="Password" name="password" value="{{ old('password') }}">
                @error('password')
                    <p class="d-flex justify-content-start ps-3 text-danger">{{ $message }}</p>
                @enderror
                @if (session('loginError'))
                    <p class="d-flex justify-content-start ps-3 text-danger">{{ session('loginError') }}</p>
                @endif
                @if (session('success'))
                    <p class="d-flex justify-content-start ps-3 text-primary">{{ session('success') }}</p>
                @endif
                <a href="{{ route('forget.password') }}">Forget your password?</a>
                <button type="submit">Sign In</button>
                <p>Create new Account? <a Style="color:blue" href="/signup">Sign Up</a></p>
            </form>
        </div>
    </div>
@endsection
