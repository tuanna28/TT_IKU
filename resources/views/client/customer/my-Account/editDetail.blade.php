@extends('client.customer.my-Account')
@section('title', 'Edit Account')
@section('myaccount')
    <form action="{{ route('my.account.detail.post') }}" method="POST">
        @csrf
        <div class="account__form row">
            <div class="input__box col-12">
                <label class="fs-5">User Name</label>
                <input class="bg-secondary text-white fw-bold" name="username" type="text" value="{{ $user->username }}"
                    disabled>
            </div>
            <div class="input__box col-12 col-md-6">
                <label class="fs-5">Full Name <span>*</span></label>
                <input name="name" id="name" type="text" value="{{ $user->name }}" disabled>
                @error('name')
                    <p class="d-flex justify-content-start ps-3 text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="input__box col-12 col-md-6">
                <label class="fs-5">Email <span>*</span></label>
                <input name="email" id="email" type="text" value="{{ $user->email }}" disabled>
                @error('email')
                    <p class="d-flex justify-content-start ps-3 text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="input__box col-12 col-md-6">
                <label class="fs-5">Address</label>
                <input name="address" id="address" type="text" value="{{ $user->address }}" disabled>
            </div>
            <div class="input__box col-12 col-md-6">
                <label class="fs-5">Number Phone</label>
                <input name="phone" id="phone" type="text" value="{{ $user->phone }}" disabled>
            </div>
            <div class="form__btn">
                <button class="btn btn-primary d-none" type="submit" id="oke">Xác
                    Nhận</button>
                <a href="{{ route('my.account.detail') }}" class="btn btn-primary d-none" id="cancel">Hủy</a>
                <p class="btn btn-primary" id="edit">Chỉnh Sửa</p>
            </div>
        </div>
    </form>
@endsection
