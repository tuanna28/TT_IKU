@extends('layout.layout')
@section('title', 'MyAcount')
@section('content')

    <!-- Start breadcrumb area -->
    <div class="ht__breadcrumb__area bg-image--6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__inner text-center">
                        <h2 class="breadcrumb-title">My Account</h2>
                        <nav class="breadcrumb-content">
                            <a class="breadcrumb_item" href="{{ route('home') }}">Home</a>
                            <span class="brd-separator">/</span>
                            <span class="breadcrumb_item active">My Account</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End breadcrumb area -->
    <!-- Start My Account Area -->
    <section class="my_account_area pt--80 pb--55 bg--white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="my__account__wrapper">
                        <nav>
                            <div class="d-flex border-bottom">
                                <button class="nav-link fs-4 fw-bold border-0 bg-white" id="btn-home"><a id="home"
                                        href="{{ route('my.account.detail') }}">Profile</a></button>
                                <button class="nav-link fs-4 fw-bold border-0 bg-white" id="btn-pass"><a class=""
                                        id="pass" href="{{ route('my.account.pass') }}">Change
                                        Password</a></button>
                                <button class="nav-link fs-4 fw-bold border-0 bg-white" id="btn-history"><a class=""
                                        id="history" href="{{ route('my.account.pass') }}">History</a></button>
                            </div>
                        </nav>
                        <div>
                            @yield('myaccount')
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End My Account Area -->
@endsection
