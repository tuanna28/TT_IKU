@extends('layout.layout')
@section('content')
    <!-- Start breadcrumb area -->
    <div class="ht__breadcrumb__area bg-image--4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__inner text-center">
                        <h2 class="breadcrumb-title">Shop Single</h2>
                        <nav class="breadcrumb-content">
                            <a class="breadcrumb_item" href="{{ route('books.show') }}}">Home</a>
                            <span class="brd-separator">/</span>
                            <span class="breadcrumb_item active">Shop Single</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End breadcrumb area -->
    <!-- Start main Content -->
    <div class="maincontent bg--white pt--80 pb--55">
        @if (session('message'))
            <h2 style="color:red; width:100%;text-align:center">{{ session('message') }}</h2>
        @endif
        <div class="container">
            <form action="{{ route('client.carts.add') }}" method="POST">
                @csrf
                <input type="hidden" name="book_id" value="{{ $book->id }}">
                <div class="row">
                    <div class="col-lg-9 col-12">
                        <div class="wn__single__product">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="wn__fotorama__wrapper">
                                        <div class="fotorama wn__fotorama__action" data-nav="thumbs">
                                            @foreach ($image as $image)
                                                <a href="1.html"><img
                                                        src="{{ asset('public/storage/images/'.$image->image_path) }}"
                                                        alt=""></a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="product__info__main">
                                        <h1>{{ $book->title_book }}</h1>
                                        <div class="product-reviews-summary d-flex">
                                            <ul class="rating-summary d-flex">
                                                <li><i class="zmdi zmdi-star-outline"></i></li>
                                                <li><i class="zmdi zmdi-star-outline"></i></li>
                                                <li><i class="zmdi zmdi-star-outline"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star-outline"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star-outline"></i></li>
                                            </ul>
                                        </div>
                                        <div class="price-box">
                                            <span>${{ $book->price }}</span>
                                        </div>
                                        <div class="product__overview">
                                            @php
                                                echo $book->description;
                                            @endphp
                                        </div>
                                        <div class="box-tocart d-flex">
                                            <span>Qty</span>
                                            @if ($book->quantity > 0)
                                                <input id="qty" class="input-text qty" name="qty" min="1"
                                                    max="{{ $book->quantity }}" value="1" title="Qty"
                                                    type="number">
                                            @else
                                                <p>Hết Hàng</p>
                                            @endif

                                            <div class="addtocart__actions">
                                                <button class="tocart" type="submit" title="Add to Cart"><i
                                                        class="fa fa-shopping-cart mr-1"></i> Add to
                                                    Cart
                                                </button>
                                            </div>
                                            <div class="product-addto-links clearfix">
                                                <a class="wishlist" href="#"></a>
                                                <a class="compare" href="#"></a>
                                            </div>
                                        </div>
                                        <div class="product_meta">
                                            <span class="posted_in">Categories:
                                                <a href="#">Adventure</a>,
                                                <a href="#">Kids' Music</a>
                                            </span>
                                        </div>
                                        <div class="product-share">
                                            <ul>
                                                <li class="categories-title">Share :</li>
                                                <li>
                                                    <a href="#">
                                                        <i class="icon-social-twitter icons"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="icon-social-tumblr icons"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="icon-social-facebook icons"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="icon-social-linkedin icons"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            </form>
            <div class="product__info__detailed">
                <div class="pro_details_nav nav justify-content-start" role="tablist">
                    <a class="nav-item nav-link active" data-bs-toggle="tab" href="#nav-details" role="tab">Details</a>
                    <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-review" role="tab">Reviews</a>
                </div>
                <div class="tab__container tab-content">
                    <!-- Start Single Tab Content -->
                    <div class="pro__tab_label tab-pane fade show active" id="nav-details" role="tabpanel">
                        <div class="description__attribute">
                            <p>Ideal for cold-weather training or work outdoors, the Chaz Hoodie promises
                                superior warmth with every wear. Thick material blocks out the wind as
                                ribbed cuffs and bottom band seal in body heat.Ideal for cold-weather
                                training or work outdoors, the Chaz Hoodie promises superior warmth with
                                every wear. Thick material blocks out the wind as ribbed cuffs and bottom
                                band seal in body heat.Ideal for cold-weather training or work outdoors, the
                                Chaz Hoodie promises superior warmth with every wear. Thick material blocks
                                out the wind as ribbed cuffs and bottom band seal in body heat.Ideal for
                                cold-weather training or work outdoors, the Chaz Hoodie promises superior
                                warmth with every wear. Thick material blocks out the wind as ribbed cuffs
                                and bottom band seal in body heat.</p>
                            <ul>
                                <li>• Two-tone gray heather hoodie.</li>
                                <li>• Drawstring-adjustable hood.</li>
                                <li>• Machine wash/dry.</li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Single Tab Content -->
                    <!-- Start Single Tab Content -->
                    <div class="pro__tab_label tab-pane fade" id="nav-review" role="tabpanel">
                        <div class="review__attribute">
                            <h1>Customer Reviews</h1>
                            <h2>Hastech</h2>
                            <div class="review__ratings__type d-flex">
                                <div class="review-ratings">
                                    <div class="rating-summary d-flex">
                                        <span>Quality</span>
                                        <ul class="rating d-flex">
                                            <li><i class="zmdi zmdi-star"></i></li>
                                            <li><i class="zmdi zmdi-star"></i></li>
                                            <li><i class="zmdi zmdi-star"></i></li>
                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                        </ul>
                                    </div>

                                    <div class="rating-summary d-flex">
                                        <span>Price</span>
                                        <ul class="rating d-flex">
                                            <li><i class="zmdi zmdi-star"></i></li>
                                            <li><i class="zmdi zmdi-star"></i></li>
                                            <li><i class="zmdi zmdi-star"></i></li>
                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                        </ul>
                                    </div>
                                    <div class="rating-summary d-flex">
                                        <span>value</span>
                                        <ul class="rating d-flex">
                                            <li><i class="zmdi zmdi-star"></i></li>
                                            <li><i class="zmdi zmdi-star"></i></li>
                                            <li><i class="zmdi zmdi-star"></i></li>
                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="review-content">
                                    <p>Hastech</p>
                                    <p>Review by Hastech</p>
                                    <p>Posted on 11/6/2018</p>
                                </div>
                            </div>
                        </div>
                        <div class="review-fieldset">
                            <h2>You're reviewing:</h2>
                            <h3>Chaz Kangeroo Hoodie</h3>
                            <div class="review-field-ratings">
                                <div class="product-review-table">
                                    <div class="review-field-rating d-flex">
                                        <span>Quality</span>
                                        <ul class="rating d-flex">
                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                        </ul>
                                    </div>
                                    <div class="review-field-rating d-flex">
                                        <span>Price</span>
                                        <ul class="rating d-flex">
                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                        </ul>
                                    </div>
                                    <div class="review-field-rating d-flex">
                                        <span>Value</span>
                                        <ul class="rating d-flex">
                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="review_form_field">
                                <div class="input__box">
                                    <span>Nickname</span>
                                    <input id="nickname_field" type="text" name="nickname">
                                </div>
                                <div class="input__box">
                                    <span>Summary</span>
                                    <input id="summery_field" type="text" name="summery">
                                </div>
                                <div class="input__box">
                                    <span>Review</span>
                                    <textarea name="review"></textarea>
                                </div>
                                <div class="review-form-actions">
                                    <button>Submit Review</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Tab Content -->
                </div>
            </div>
            <div class="wn__related__product pt--80 pb--50">
                <div class="section__title text-center">
                    <h2 class="title__be--2">Related Products</h2>
                </div>
                <div class="row mt--60">
                    <div class="productcategory__slide--2 arrows_style owl-carousel owl-theme">
                        @foreach ($same as $same)
                            <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="product__thumb">
                                    <a class="first__img" href="{{ route('book.detail', $same->id) }}"><img
                                            style="height: 250px; object-fit: cover"
                                            src="{{ asset('storage/images/' . $same->book_image) }}"
                                            alt="product image"></a>
                                    <a class="second__img animation1" href="{{ route('book.detail', $same->id) }}"><img
                                            src="images/books/2.jpg" alt="product image"></a>
                                    <div class="hot__box">
                                        <span class="hot-label">BEST SALLER</span>
                                    </div>
                                </div>
                                <div class="product__content content--center">
                                    <h4><a href="{{ route('book.detail', $same->id) }}">{{ $same->title_book }}</a></h4>
                                    <ul class="price d-flex">
                                        <li>${{ $same->price }}</li>
                                        <li class="old_price">${{ $same->original_price }}</li>
                                    </ul>
                                    <div class="action">
                                        <div class="actions_inner">
                                            <ul class="add_to_links">
                                                <li><a class="cart" href="cart.html"><i
                                                            class="bi bi-shopping-bag4"></i></a></li>
                                                <li><a class="wishlist" href="wishlist.html"><i
                                                            class="bi bi-shopping-cart-full"></i></a></li>
                                                <li><a class="compare" href="#"><i
                                                            class="bi bi-heart-beat"></i></a></li>
                                                <li><a data-bs-toggle="modal" title="Quick View"
                                                        class="quickview modal-view detail-link" href="#productmodal"><i
                                                            class="bi bi-search"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product__hover--content">
                                        <ul class="rating d-flex">
                                            <li class="on"><i class="fa fa-star-o"></i></li>
                                            <li class="on"><i class="fa fa-star-o"></i></li>
                                            <li class="on"><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="wn__related__product">
                <div class="section__title text-center">
                    <h2 class="title__be--2">upsell products</h2>
                </div>
                <div class="row mt--60">
                    <div class="productcategory__slide--2 arrows_style owl-carousel owl-theme">
                        <!-- Start Single Product -->
                        <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="product__thumb">
                                <a class="first__img" href="single-product.html"><img src="images/books/1.jpg"
                                        alt="product image"></a>
                                <a class="second__img animation1" href="single-product.html"><img
                                        src="images/books/2.jpg" alt="product image"></a>
                                <div class="hot__box">
                                    <span class="hot-label">BEST SALLER</span>
                                </div>
                            </div>
                            <div class="product__content content--center">
                                <h4><a href="single-product.html">robin parrish</a></h4>
                                <ul class="price d-flex">
                                    <li>$35.00</li>
                                    <li class="old_price">$35.00</li>
                                </ul>
                                <div class="action">
                                    <div class="actions_inner">
                                        <ul class="add_to_links">
                                            <li><a class="cart" href="cart.html"><i
                                                        class="bi bi-shopping-bag4"></i></a></li>
                                            <li><a class="wishlist" href="wishlist.html"><i
                                                        class="bi bi-shopping-cart-full"></i></a></li>
                                            <li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a>
                                            </li>
                                            <li><a data-bs-toggle="modal" title="Quick View"
                                                    class="quickview modal-view detail-link" href="#productmodal"><i
                                                        class="bi bi-search"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product__hover--content">
                                    <ul class="rating d-flex">
                                        <li class="on"><i class="fa fa-star-o"></i></li>
                                        <li class="on"><i class="fa fa-star-o"></i></li>
                                        <li class="on"><i class="fa fa-star-o"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Start Single Product -->
                        <!-- Start Single Product -->
                        <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="product__thumb">
                                <a class="first__img" href="single-product.html"><img src="images/books/3.jpg"
                                        alt="product image"></a>
                                <a class="second__img animation1" href="single-product.html"><img
                                        src="images/books/4.jpg" alt="product image"></a>
                                <div class="hot__box color--2">
                                    <span class="hot-label">HOT</span>
                                </div>
                            </div>
                            <div class="product__content content--center">
                                <h4><a href="single-product.html">The Remainng</a></h4>
                                <ul class="price d-flex">
                                    <li>$35.00</li>
                                    <li class="old_price">$35.00</li>
                                </ul>
                                <div class="action">
                                    <div class="actions_inner">
                                        <ul class="add_to_links">
                                            <li><a class="cart" href="cart.html"><i
                                                        class="bi bi-shopping-bag4"></i></a></li>
                                            <li><a class="wishlist" href="wishlist.html"><i
                                                        class="bi bi-shopping-cart-full"></i></a></li>
                                            <li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a>
                                            </li>
                                            <li><a data-bs-toggle="modal" title="Quick View"
                                                    class="quickview modal-view detail-link" href="#productmodal"><i
                                                        class="bi bi-search"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product__hover--content">
                                    <ul class="rating d-flex">
                                        <li class="on"><i class="fa fa-star-o"></i></li>
                                        <li class="on"><i class="fa fa-star-o"></i></li>
                                        <li class="on"><i class="fa fa-star-o"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Start Single Product -->
                        <!-- Start Single Product -->
                        <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="product__thumb">
                                <a class="first__img" href="single-product.html"><img src="images/books/7.jpg"
                                        alt="product image"></a>
                                <a class="second__img animation1" href="single-product.html"><img
                                        src="images/books/8.jpg" alt="product image"></a>
                                <div class="hot__box">
                                    <span class="hot-label">HOT</span>
                                </div>
                            </div>
                            <div class="product__content content--center">
                                <h4><a href="single-product.html">Lando</a></h4>
                                <ul class="price d-flex">
                                    <li>$35.00</li>
                                    <li class="old_price">$50.00</li>
                                </ul>
                                <div class="action">
                                    <div class="actions_inner">
                                        <ul class="add_to_links">
                                            <li><a class="cart" href="cart.html"><i
                                                        class="bi bi-shopping-bag4"></i></a></li>
                                            <li><a class="wishlist" href="wishlist.html"><i
                                                        class="bi bi-shopping-cart-full"></i></a></li>
                                            <li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a>
                                            </li>
                                            <li><a data-bs-toggle="modal" title="Quick View"
                                                    class="quickview modal-view detail-link" href="#productmodal"><i
                                                        class="bi bi-search"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product__hover--content">
                                    <ul class="rating d-flex">
                                        <li class="on"><i class="fa fa-star-o"></i></li>
                                        <li class="on"><i class="fa fa-star-o"></i></li>
                                        <li class="on"><i class="fa fa-star-o"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Start Single Product -->
                        <!-- Start Single Product -->
                        <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="product__thumb">
                                <a class="first__img" href="single-product.html"><img src="images/books/9.jpg"
                                        alt="product image"></a>
                                <a class="second__img animation1" href="single-product.html"><img
                                        src="images/books/10.jpg" alt="product image"></a>
                                <div class="hot__box">
                                    <span class="hot-label">HOT</span>
                                </div>
                            </div>
                            <div class="product__content content--center">
                                <h4><a href="single-product.html">Doctor Wldo</a></h4>
                                <ul class="price d-flex">
                                    <li>$35.00</li>
                                    <li class="old_price">$35.00</li>
                                </ul>
                                <div class="action">
                                    <div class="actions_inner">
                                        <ul class="add_to_links">
                                            <li><a class="cart" href="cart.html"><i
                                                        class="bi bi-shopping-bag4"></i></a></li>
                                            <li><a class="wishlist" href="wishlist.html"><i
                                                        class="bi bi-shopping-cart-full"></i></a></li>
                                            <li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a>
                                            </li>
                                            <li><a data-bs-toggle="modal" title="Quick View"
                                                    class="quickview modal-view detail-link" href="#productmodal"><i
                                                        class="bi bi-search"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product__hover--content">
                                    <ul class="rating d-flex">
                                        <li class="on"><i class="fa fa-star-o"></i></li>
                                        <li class="on"><i class="fa fa-star-o"></i></li>
                                        <li class="on"><i class="fa fa-star-o"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Start Single Product -->
                        <!-- Start Single Product -->
                        <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="product__thumb">
                                <a class="first__img" href="single-product.html"><img src="images/books/11.jpg"
                                        alt="product image"></a>
                                <a class="second__img animation1" href="single-product.html"><img
                                        src="images/books/2.jpg" alt="product image"></a>
                                <div class="hot__box">
                                    <span class="hot-label">BEST SALER</span>
                                </div>
                            </div>
                            <div class="product__content content--center content--center">
                                <h4><a href="single-product.html">Animals Life</a></h4>
                                <ul class="price d-flex">
                                    <li>$50.00</li>
                                    <li class="old_price">$35.00</li>
                                </ul>
                                <div class="action">
                                    <div class="actions_inner">
                                        <ul class="add_to_links">
                                            <li><a class="cart" href="cart.html"><i
                                                        class="bi bi-shopping-bag4"></i></a></li>
                                            <li><a class="wishlist" href="wishlist.html"><i
                                                        class="bi bi-shopping-cart-full"></i></a></li>
                                            <li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a>
                                            </li>
                                            <li><a data-bs-toggle="modal" title="Quick View"
                                                    class="quickview modal-view detail-link" href="#productmodal"><i
                                                        class="bi bi-search"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product__hover--content">
                                    <ul class="rating d-flex">
                                        <li class="on"><i class="fa fa-star-o"></i></li>
                                        <li class="on"><i class="fa fa-star-o"></i></li>
                                        <li class="on"><i class="fa fa-star-o"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Start Single Product -->
                        <!-- Start Single Product -->
                        <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="product__thumb">
                                <a class="first__img" href="single-product.html"><img src="images/books/1.jpg"
                                        alt="product image"></a>
                                <a class="second__img animation1" href="single-product.html"><img
                                        src="images/books/6.jpg" alt="product image"></a>
                                <div class="hot__box">
                                    <span class="hot-label">BEST SALER</span>
                                </div>
                            </div>
                            <div class="product__content content--center content--center">
                                <h4><a href="single-product.html">Olio Madu</a></h4>
                                <ul class="price d-flex">
                                    <li>$50.00</li>
                                    <li class="old_price">$35.00</li>
                                </ul>
                                <div class="action">
                                    <div class="actions_inner">
                                        <ul class="add_to_links">
                                            <li><a class="cart" href="cart.html"><i
                                                        class="bi bi-shopping-bag4"></i></a></li>
                                            <li><a class="wishlist" href="wishlist.html"><i
                                                        class="bi bi-shopping-cart-full"></i></a></li>
                                            <li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a>
                                            </li>
                                            <li><a data-bs-toggle="modal" title="Quick View"
                                                    class="quickview modal-view detail-link" href="#productmodal"><i
                                                        class="bi bi-search"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product__hover--content">
                                    <ul class="rating d-flex">
                                        <li class="on"><i class="fa fa-star-o"></i></li>
                                        <li class="on"><i class="fa fa-star-o"></i></li>
                                        <li class="on"><i class="fa fa-star-o"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Start Single Product -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
            <div class="shop__sidebar">
                <aside class="widget__categories products--cat">
                    <h3 class="widget__title">Product Categories</h3>
                    <ul>
                        <li><a href="#">Biography <span>(3)</span></a></li>
                        <li><a href="#">Business <span>(4)</span></a></li>
                        <li><a href="#">Cookbooks <span>(6)</span></a></li>
                        <li><a href="#">Health & Fitness <span>(7)</span></a></li>
                        <li><a href="#">History <span>(8)</span></a></li>
                        <li><a href="#">Mystery <span>(9)</span></a></li>
                        <li><a href="#">Inspiration <span>(13)</span></a></li>
                        <li><a href="#">Romance <span>(20)</span></a></li>
                        <li><a href="#">Fiction/Fantasy <span>(22)</span></a></li>
                        <li><a href="#">Self-Improvement <span>(13)</span></a></li>
                        <li><a href="#">Humor Books <span>(17)</span></a></li>
                        <li><a href="#">Harry Potter <span>(20)</span></a></li>
                        <li><a href="#">Land of Stories <span>(34)</span></a></li>
                        <li><a href="#">Kids' Music <span>(60)</span></a></li>
                        <li><a href="#">Toys & Games <span>(3)</span></a></li>
                        <li><a href="#">hoodies <span>(3)</span></a></li>
                    </ul>
                </aside>
                <aside class="widget__categories pro--range">
                    <h3 class="widget__title">Filter by price</h3>
                    <div class="content-shopby">
                        <div class="price_filter s-filter clear">
                            <form action="#" method="GET">
                                <div id="slider-range"></div>
                                <div class="slider__range--output">
                                    <div class="price__output--wrap">
                                        <div class="price--output">
                                            <span>Price :</span><input type="text" id="amount" readonly="">
                                        </div>
                                        <div class="price--filter">
                                            <a href="#">Filter</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </aside>
                <aside class="widget__categories products--compare">
                    <h3 class="widget__title">Compare</h3>
                    <ul>
                        <li><a href="#">x</a><a href="#">Condimentum posuere</a></li>
                        <li><a href="#">x</a><a href="#">Condimentum posuere</a></li>
                        <li><a href="#">x</a><a href="#">Dignissim venenatis</a></li>
                    </ul>
                </aside>
                <aside class="widget__categories products--tag">
                    <h3 class="widget__title">Product Tags</h3>
                    <ul>
                        <li><a href="#">Biography</a></li>
                        <li><a href="#">Business</a></li>
                        <li><a href="#">Cookbooks</a></li>
                        <li><a href="#">Health & Fitness</a></li>
                        <li><a href="#">History</a></li>
                        <li><a href="#">Mystery</a></li>
                        <li><a href="#">Inspiration</a></li>
                        <li><a href="#">Religion</a></li>
                        <li><a href="#">Fiction</a></li>
                        <li><a href="#">Fantasy</a></li>
                        <li><a href="#">Music</a></li>
                        <li><a href="#">Toys</a></li>
                        <li><a href="#">Hoodies</a></li>
                    </ul>
                </aside>
                <aside class="widget__categories sidebar--banner">
                    <img src="images/others/banner_left.jpg" alt="banner images">
                    <div class="text">
                        <h2>new products</h2>
                        <h6>save up to <br> <strong>40%</strong>off</h6>
                    </div>
                </aside>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- End main Content -->
    <!-- Start Search Popup -->
    <div class="box-search-content search_active block-bg close__top">
        <form id="search_mini_form--2" class="minisearch"action="{{route('search.key')}}">
            <div class="field__search">
                <input type="text" name="keyword" placeholder="Search entire store here...">
                <div class="action">
                    <button><i class="zmdi zmdi-search"></i></button>
                </div>
            </div>
        </form>
        <div class="close__wrap">
            <span>close</span>
        </div>
    </div>
    <!-- End Search Popup -->
@endsection
