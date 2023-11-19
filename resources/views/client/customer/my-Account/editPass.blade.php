@extends('client.customer.my-Account')
@section('title', 'Edit Account')
@section('myaccount')
    <form action="{{ route('my.account.pass.post') }}" method="POST">
        @csrf
        <div class="account__form row">
            <div class="input__box col-12 col-md-4">
                <label class="fs-5">Password <span>*</span></label>
                <input name="password" id="password" type="password" disabled value="{{ old('password') }}">
                @error('password')
                    <p class="d-flex justify-content-start ps-3 text-danger">{{ $message }}</p>
                @enderror
                @if (session('Errorpass1'))
                    <p class="d-flex justify-content-start ps-3 text-danger">{{ session('Errorpass1') }}</p>
                @endif
                @if (session('success'))
                    <p class="d-flex justify-content-start ps-3 text-danger">{{ session('success') }}</p>
                @endif
            </div>
            <div class="input__box col-12 col-md-4">
                <label class="fs-5">New Password <span>*</span></label>
                <input name="newpassword" id="newpass" type="password" disabled value="{{ old('newpassword') }}">
                @error('newpassword')
                    <p class="d-flex justify-content-start ps-3 text-danger">{{ $message }}
                    </p>
                @enderror
            </div>
            <div class="input__box col-12 col-md-4">
                <label class="fs-5">Comfirm Password <span>*</span></label>
                <input name="cfpassword" id="confirmpass" type="password" disabled value="{{ old('cfpassword') }}">
                @error('cfpassword')
                    <p class="d-flex justify-content-start ps-3 text-danger">{{ $message }}
                    </p>
                @enderror
                @if (session('Errorpass2'))
                    <p class="d-flex justify-content-start ps-3 text-danger">{{ session('Errorpass2') }}</p>
                @endif
            </div>
            <div class="form__btn">
                <button class="btn btn-primary d-none" type="submit" id="okepass">Xác
                    Nhận</button>
                <a href="{{ route('my.account.pass') }}" class="btn btn-primary d-none" id="cancelpass">Hủy</a>
                <p class="btn btn-primary" id="editpass">Chỉnh Sửa</p>
            </div>
        </div>
    </form>
@endsection
