@extends('layout.layout')
@section('content')
<!-- Start breadcrumb area -->
<div class="ht__breadcrumb__area bg-image--4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__inner text-center">
                    <h2 class="breadcrumb-title">Checkout</h2>
                    <nav class="breadcrumb-content">
                        <a class="breadcrumb_item" href="index.html">Home</a>
                        <span class="brd-separator">/</span>
                        <span class="breadcrumb_item active">Checkout</span>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End breadcrumb area -->
<!-- Start Checkout Area -->
<section class="wn__checkout__area section-padding--lg bg__white">
    <div class="container">
        @if (session('success'))
        <h2 style="color:green; width:100%;text-align:center">{{ session('success') }}</h2>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="wn_checkout_wrap">
                    <div class="checkout_info">
                        <span>Returning customer ?</span>
                        <a class="showlogin" href="#">Click here to login</a>
                    </div>
                    <div class="checkout_login">
                        <form class="wn__checkout__form" action="#">
                            <p>If you have shopped with us before, please enter your details in the boxes below.
                                If you are a new customer please proceed to the Billing & Shipping section.</p>

                            <div class="input__box">
                                <label>Username or email <span>*</span></label>
                                <input type="text">
                            </div>

                            <div class="input__box">
                                <label>password <span>*</span></label>
                                <input type="password">
                            </div>
                            <div class="form__btn">
                                <button>Login</button>
                                <label class="label-for-checkbox">
                                    <input id="rememberme" name="rememberme" value="forever" type="checkbox">
                                    <span>Remember me</span>
                                </label>
                                <a href="#">Lost your password?</a>
                            </div>
                        </form>
                    </div>
                    <div class="checkout_info">
                        <span>Have a coupon? </span>
                        <a class="showcoupon" href="#">Click here to enter your code</a>
                    </div>
                    <div class="checkout_coupon">
                        <form action="#">
                            <div class="form__coupon">
                                <input type="text" placeholder="Coupon code">
                                <button>Apply coupon</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <form action="{{route('checkout.proccess')}}" method="POST">
                @csrf

                <div>
                    <div class="col-lg-6 col-12">

                        <div class="customer_details">
                            <h3>Billing details</h3>
                            <div class="customar__field">
                                <div class="margin_between">
                                    <div class="input_box space_between">
                                        <label>Full name <span>*</span></label>
                                        <input type="text" name="customer_name" value="{{$user->name}}">
                                    </div>

                                </div>

                                <div class="input_box">
                                    <label>Address <span>*</span></label>
                                    <input type="text" placeholder="Street address" name="customer_address" value="{{$user->address}}">
                                </div>


                                <div class="margin_between">
                                    <div class="input_box space_between">
                                        <label>Phone <span>*</span></label>
                                        <input type="text" name="customer_phone" value="{{$user->phone}}">
                                    </div>

                                    <div class="input_box space_between">
                                        <label>Email address <span>*</span></label>
                                        <input type="email" name="customer_email" value="{{$user->email}}">
                                    </div>
                                    <div class="input_box">
                                        <label>Note <span>*</span></label>
                                        <input type="text" placeholder="" name="note">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout_login">
                                <form class="wn__checkout__form" action="#">
                                    <p>If you have shopped with us before, please enter your details in the boxes below.
                                        If you are a new customer please proceed to the Billing & Shipping section.</p>

                                    <div class="input__box">
                                        <label>Username or email <span>*</span></label>
                                        <input type="text">
                                    </div>

                                    <div class="input__box">
                                        <label>password <span>*</span></label>
                                        <input type="password">
                                    </div>
                                    <div class="form__btn">
                                        <button>Login</button>
                                        <label class="label-for-checkbox">
                                            <input id="rememberme" name="rememberme" value="forever" type="checkbox">
                                            <span>Remember me</span>
                                        </label>
                                        <a href="#">Lost your password?</a>
                                    </div>
                                </form>
                            </div>


                        </div>
       


                    </div>





                    <div class="create__account">
                        <div class="wn__accountbox">
                            <input class="input-checkbox" name="createaccount" value="1" type="checkbox">
                            <span>Create an account ?</span>
                        </div>
                        <div class="account__field">
                            <form action="#">
                                <label>Account password <span>*</span></label>
                                <input type="text" placeholder="password">
                            </form>
                        </div>
                    </div>

                    <div class="customer_details mt--20">
                        <div class="differt__address">
                            <input name="ship_to_different_address" value="1" type="checkbox">
                            <span>Ship to a different address ?</span>
                        </div>
                        <div class="customar__field differt__form mt--40">
                            <div class="margin_between">
                                <div class="input_box space_between">
                                    <label>full name <span>*</span></label>
                                    <input type="text">
                                </div>

                            </div>

                            <div class="input_box">
                                <label>Address <span>*</span></label>
                                <input type="text" placeholder="Street address">
                            </div>

                            <div class="margin_between  ">
                                <div class="input_box space_between">
                                    <label>Phone <span>*</span></label>
                                    <input type="text">
                                </div>
                                <div class="input_box space_between">
                                    <label>Email address <span>*</span></label>
                                    <input type="email">
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-6 col-12 md-mt-40 sm-mt-40 ">
                        <div class="wn__order__box">
                            <h3 class="order__title">Your order</h3>
                            <ul class="order__total">
                                <li>Product</li>
                                <li>Total</li>
                            </ul>
                            @foreach ( $carts as $cart )
                            <ul class="order_product">
                                <li>{{$cart->title_book}} × {{$cart->quantity}}<span>${{$cart->money * $cart->quantity}}</span></li>

                            </ul>
                            @endforeach
                            <ul class="shipping__method">
                                @php
                                $cart_total = 0;
                                @endphp
                                @foreach ($carts as $cart)
                                @php
                                $cart_total += $cart->money * $cart->quantity;
                                @endphp
                                @endforeach

                                <li>Cart Subtotal <span>
                                        <h6 class="total-price" data-price="{{$cart_total}}">$ {{$cart_total}}</h6>

                                    </span></li>
                                <li>Shipping
                                    <ul>

                                        <li>
                                            <label>
                                                <h6 class="shipping" data-price="10">$10</h6>
                                                <input type="hidden" value="10" name="ship">
                                            </label>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                            <ul class="total__amount">
                                <li>Order Total
                                    <span>
                                        <h5 class="font-weight-bold total-price-all">${{$cart_total + 10}}</h5>
                                        <input type="hidden" id="total" value="{{$cart_total + 10}}" name="total">
                                    </span>
                                </li>
                            </ul>

                        </div>



                        <div id="accordion" class="checkout_accordion mt--30" role="tablist">
                            <h2 class="my-3">
                                Please choose Payment Methods</h2>
                            <div class="payment">
                                <div class="che__header" role="tab" id="headingThree">
                                    <a class="collapsed checkout__title" data-bs-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <span>Cash on Delivery</span>



                                    </a>
                                </div>
                                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-bs-parent="#accordion">
                                    <div class="payment-body">Pay with cash upon delivery.</div>

                                    <button class="btn  btn-primary  my-3 py-3">Place Order </button>
                                </div>
                            </div>



                            <div class="payment">
                                <div class="che__header" role="tab" id="headingOne">
                                    <a class="checkout__title" data-bs-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <span>Direct Bank Transfer</span>
                                    </a>
                                </div>
                                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-bs-parent="#accordion">
                                    <div class="payment-body">Make your payment directly into our bank account. Please
                                        use your Order ID as the payment reference. Your order won’t be shipped until
                                        the funds have cleared in our account.
                                    </div>


                                </div>
                            </div>


                            <div class="payment">
                                <div class="che__header" role="tab" id="headingFour">
                                    <a class="collapsed checkout__title" data-bs-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        <span>PayPal <img src="{{ asset('storage/images/payment.png') }}" alt="" style="width:50px"> </span>
                                    </a>
                                </div>
                                <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour" data-bs-parent="#accordion">
                                    <div class="payment-body">Pay with cash upon delivery.</div>
                                    <form action="{{ route('vnpay_payment') }}" method="POST">
                                        @csrf
                                        <button href="" name="redirect" class="btn btn-primary check_out ">Thanh Toán
                                            VNPAY</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- End Checkout Area -->
@endsection
@section('script')
<script>
    $(function() {
        getToTalValue()

        function getToTalValue() {
            let total = $('.total-price').data('price')

            let shipping = $('.shipping').data('price')
            $('.total-price-all').text(`$${total + shipping}`)
            $('#total').val(total + shipping)
        }
    });
</script>
@endsection