@extends('layout.layout')

@section('title', 'Sign In')
@section('content')
    <div class="login-box">
        <div class="login-cart">
            <h3>Forget your password.</h3>
            @if (session('success'))
                <p class="mt-3 lh-base d-flex justify-content-start ps-3 text-primary fs-4">{{ session('success') }}</p>
            @else
                <form class="login-form" action="{{ route('forget.password.post') }}" method="POST">
                    @csrf
                    <input type="text" placeholder="Your Email" name="email" value="{{ old('email') }}">
                    @error('email')
                        <p class="d-flex justify-content-start ps-3 text-danger">{{ $message }}</p>
                    @enderror

                    <button type="submit">Submit</button>
                    <p>Create new Account? <a Style="color:blue" href="/signup">Sign Up</a></p>
                </form>
            @endif

        </div>
    </div>
@endsection
