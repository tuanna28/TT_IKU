@extends('layout.layout')

@section('title', 'Sign In')
@section('content')
    <div class="login-box">
        <div class="login-cart">
            <h3>Forget your password.</h3>
            <form class="login-form" action="{{ route('reset.password.post') }}" method="POST">
                @csrf
                <input type="text" name="token" value="{{ $token }}" hidden>
                <input type="text" placeholder="Your Email" name="email" value="{{ old('email') }}">
                @error('email')
                    <p class="d-flex justify-content-start ps-3 text-danger">{{ $message }}</p>
                @enderror
                <input type="text" placeholder="New Password" name="password" value="{{ old('password') }}">
                @error('password')
                    <p class="d-flex justify-content-start ps-3 text-danger">{{ $message }}</p>
                @enderror
                <input type="text" placeholder="Confirm Password" name="password_confirm"
                    value="{{ old('password_confirm') }}">
                @error('password_confirm')
                    <p class="d-flex justify-content-start ps-3 text-danger">{{ $message }}</p>
                @enderror
                @if (session('error'))
                    <p class="d-flex justify-content-start ps-3 text-danger">{{ session('error') }}</p>
                @enderror
                <button type="submit">Submit</button>
                <p>Create new Account? <a Style="color:blue" href="/signup">Sign Up</a></p>
        </form>
    </div>
</div>
@endsection
