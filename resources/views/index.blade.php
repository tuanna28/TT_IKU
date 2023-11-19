@extends('layout.layout')

@section('title','Home')
@section('content')
<!-- Start Search Popup -->
<div class="brown--color box-search-content search_active block-bg close__top">
    <form id="search_mini_form" class="minisearch" action="search" method="get">
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
<!-- Start Slider area -->
<div class="slider-area brown__nav slider--15 slide__activation slide__arrow01 owl-carousel owl-theme">
    <!-- Start Single Slide -->
    <div class="slide animation__style10 bg-image--8 fullscreen align__center--left">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="slider__content">
                        <div class="contentbox">
                            <h3>Boighor_</h3>
                            <h2>The Best <span>Online</span></h2>
                            <h2 class="another">book <span>shop </span></h2>
                            <p>Boighor specifically created for authors and writes to present and sell their
                                books online Soufflé tart sweet. </p>
                            <a class="shopbtn" href="#">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Single Slide -->
    <!-- Start Single Slide -->
    <div class="slide animation__style10 bg-image--9 fullscreen align__center--left">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="slider__content">
                        <div class="contentbox">
                            <h3>Boighor_</h3>
                            <h2>The Best <span>Online</span></h2>
                            <h2 class="another">book <span>shop </span></h2>
                            <p>Boighor specifically created for authors and writes to present and sell their
                                books online Soufflé tart sweet. </p>
                            <a class="shopbtn" href="#">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Single Slide -->
</div>
<!-- End Slider area -->
<!-- Start BEst Seller Area -->
<section class="wn__product__area brown--color pt--80  pb--30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section__title text-center">
                    <h2 class="title__be--2">New <span class="color--theme">Products</span></h2>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                        suffered lebmid alteration in some ledmid form</p>
                </div>
            </div>
        </div>
        <!-- Start Single Tab Content -->
        <div class="furniture--4 border--round arrows_style owl-carousel owl-theme mt--50">
            <!-- Start Single Product -->
            @foreach ($datas as $data )
            <div class="product product__style--3">

                <div class="product__thumb">



                    <a class="first__img" href="{{ route('book.detail', $data->id) }}"><img src="{{asset('storage/images/. $data->book_image')}}" alt="product image"></a>
                    <a class="second__img animation1" href="{{ route('book.detail', $data->id) }}"><img src="{{asset('assets/images/books/2.jpg')}}" alt="product image"></a>
                    <div class="hot__box">
                        <span class="hot-label">BEST SALLER</span>
                    </div>
                </div>
                <div class="product__content content--center">
                    <h4><a href="{{ route('book.detail', $data->id) }}">{{$data->title_book}}</a></h4>
                    <ul class="price d-flex">
                        <li>${{$data->original_price}}</li>
                        <li class="old_price">${{$data->price}}</li>
                    </ul>

                    <div class="action">
                        <div class="actions_inner">
                            <ul class="add_to_links">
                                <li>
                                    <form action="{{ route('client.carts.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="book_id" value="{{ $data->id }}">
                                        <button class="tg-btn tg-btnstyletwo" href="">
                                            <i class="bi bi-shopping-bag4"></i>
                                        </button>
                                    </form>
                                </li>
                                <li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a></li>
                                <li><a data-bs-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal"><i class="bi bi-search"></i></a></li>
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
            <!-- Start Single Product -->
            <!-- Start Single Product -->

        </div>
        <!-- End Single Tab Content -->
    </div>
</section>
<!-- Start BEst Seller Area -->
<!-- Start Testimonial Area -->
<section class="wn__testimonial__area bg--gray ptb--80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="testimonial__container text-center">
                    <div class="tes__img__slide thumb_active">
                        <div class="testimonial__img">
                            <span><img src="{{asset('assets/images/testimonial/1.png')}}" alt="testimonial image"></span>
                        </div>
                        <div class="testimonial__img">
                            <span><img src="{{asset('assets/images/testimonial/2.png')}}" alt="testimonial image"></span>
                        </div>
                        <div class="testimonial__img">
                            <span><img src="{{asset('assets/images/testimonial/3.png')}}" alt="testimonial image"></span>
                        </div>
                        <div class="testimonial__img">
                            <span><img src="{{asset('assets/images/testimonial/2.png')}}" alt="testimonial image"></span>
                        </div>
                    </div>
                    <div class="testimonial__text__slide testext_active">
                        <div class="clint__info">
                            <p>absolutely outstanding. When I needed them they came through in a big way! I know
                                that if you buy this theme, you'll get the one thing we all look for when we buy
                                on.</p>
                            <div class="name__post">
                                <span>Ra Munne</span>
                                <h6>Head Of Project</h6>
                            </div>
                        </div>
                        <div class="clint__info">
                            <p>absolutely outstanding. When I needed them they came through in a big way! I know
                                that if you buy this theme, you'll get the one thing we all look for when we buy
                                on.</p>
                            <div class="name__post">
                                <span>Np Nipa</span>
                                <h6>Head Of Project</h6>
                            </div>
                        </div>
                        <div class="clint__info">
                            <p>absolutely outstanding. When I needed them they came through in a big way! I know
                                that if you buy this theme, you'll get the one thing we all look for when we buy
                                on.</p>
                            <div class="name__post">
                                <span>Kanak Lata</span>
                                <h6>Head Of Project</h6>
                            </div>
                        </div>
                        <div class="clint__info">
                            <p>absolutely outstanding. When I needed them they came through in a big way! I know
                                that if you buy this theme, you'll get the one thing we all look for when we buy
                                on.</p>
                            <div class="name__post">
                                <span>orando BLoom</span>
                                <h6>Head Of Project</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Testimonial Area -->
<!-- Start Best Seller Area -->
<section class="wn__bestseller__area bg--white pt--80  pb--30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section__title text-center">
                    <h2 class="title__be--2">All <span class="color--theme">Products</span></h2>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                        suffered lebmid alteration in some ledmid form</p>
                </div>
            </div>
        </div>
        <div class="row mt--50">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="product__nav nav justify-content-center" role="tablist">
                    <a class="nav-item nav-link active" data-bs-toggle="tab" href="#nav-all" role="tab">ALL</a>
                    <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-biographic" role="tab">BIOGRAPHIC</a>
                    <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-adventure" role="tab">ADVENTURE</a>
                    <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-children" role="tab">CHILDREN</a>
                    <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-cook" role="tab">COOK</a>
                </div>
            </div>
        </div>
        <div class="tab__container tab-content mt--60">
            <!-- Start Single Tab Content -->
            <div class=" single__tab tab-pane fade show active" id="nav-all" role="tabpanel">
                <div class="product__indicator--4 arrows_style owl-carousel owl-theme">
                    <div class="single__product">
                        <!-- Start Single Product -->
                        @foreach ($datas as $data )

                        @endforeach
                        <div class="single__product__inner">
                            <div class="product product__style--3">
                                <div class="product__thumb">
                                    <a class="first__img" href="{{ route('book.detail', $data->id) }}"><img src="{{asset('storage/images/. $data->book_image')}}" alt="product image"></a>
                                    <a class="second__img animation1" href="{{ route('book.detail', $data->id) }}"><img src="{{asset('assets/images/books/2.jpg')}}" alt="product image"></a>
                                    <div class="hot__box">
                                        <span class="hot-label">BEST SALER</span>
                                    </div>
                                </div>
                                <div class="product__content content--center content--center">
                                    <h4><a href="{{ route('book.detail', $data->id) }}">{{$data->title_book}}</a></h4>
                                    <ul class="price d-flex">
                                        <li>${{$data->original_price}}</li>
                                        <li class="old_price">${{$data->price}}</li>
                                    </ul>
                                    <div class="action">
                                        <div class="actions_inner">
                                            <ul class="add_to_links">
                                            <form action="{{ route('client.carts.add') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="book_id" value="{{ $data->id }}">
                                                        <button class="tg-btn tg-btnstyletwo" href="">
                                                            <i class="bi bi-shopping-bag4"></i>
                                                        </button>
                                                    </form>
                                                <li><a class="wishlist" href="wishlist.html"><i class="bi bi-shopping-cart-full"></i></a></li>
                                                <li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a></li>
                                                <li><a data-bs-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal"><i class="bi bi-search"></i></a>
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
                        </div>
                        <!-- Start Single Product -->
                        <!-- Start Single Product -->
                        <div class="single__product__inner">
                            <div class="product product__style--3">
                                <div class="product__thumb">
                                    <a class="first__img" href="{{ route('book.detail', $data->id) }}"><img src="{{asset('storage/images/. $data->book_image')}}" alt="product image"></a>
                                    <a class="second__img animation1" href="{{ route('book.detail', $data->id) }}"><img src="{{asset('assets/images/books/2.jpg')}}" alt="product image"></a>
                                    <div class="hot__box">
                                        <span class="hot-label">BEST SALER</span>
                                    </div>
                                </div>
                                <div class="product__content content--center content--center">
                                    <h4><a href="{{ route('book.detail', $data->id) }}">{{$data->title_book}}</a></h4>
                                    <ul class="price d-flex">
                                        <li>${{$data->original_price}}</li>
                                        <li class="old_price">${{$data->price}}</li>
                                    </ul>
                                    <div class="action">
                                        <div class="actions_inner">
                                            <ul class="add_to_links">

                                                <li>
                                                    <form action="{{ route('client.carts.add') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="book_id" value="{{ $data->id }}">
                                                        <button class="tg-btn tg-btnstyletwo" href="">
                                                            <i class="bi bi-shopping-bag4"></i>
                                                        </button>
                                                    </form>
                                                </li>
                                                <li><a class="wishlist" href="wishlist.html"><i class="bi bi-shopping-cart-full"></i></a></li>
                                                <li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a></li>
                                                <li><a data-bs-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal"><i class="bi bi-search"></i></a>
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
                        </div>
                        <div class="single__product__inner">
                            <div class="product product__style--3">
                                <div class="product__thumb">
                                    <a class="first__img" href="{{ route('book.detail', $data->id) }}"><img src="{{asset('storage/images/. $data->book_image')}}" alt="product image"></a>
                                    <a class="second__img animation1" href="{{ route('book.detail', $data->id) }}"><img src="{{asset('assets/images/books/2.jpg')}}" alt="product image"></a>
                                    <div class="hot__box">
                                        <span class="hot-label">BEST SALER</span>
                                    </div>
                                </div>
                                <div class="product__content content--center content--center">
                                    <h4><a href="{{ route('book.detail', $data->id) }}">{{$data->title_book}}</a></h4>
                                    <ul class="price d-flex">
                                        <li>${{$data->original_price}}</li>
                                        <li class="old_price">${{$data->price}}</li>
                                    </ul>
                                    <div class="action">
                                        <div class="actions_inner">
                                            <ul class="add_to_links">

                                                <li>
                                                <form action="{{ route('client.carts.add') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="book_id" value="{{ $data->id }}">
                                                        <button class="tg-btn tg-btnstyletwo" href="">
                                                            <i class="bi bi-shopping-bag4"></i>
                                                        </button>
                                                    </form>
                                                </li>

                                                <li><a class="wishlist" href="wishlist.html"><i class="bi bi-shopping-cart-full"></i></a></li>
                                                <li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a></li>
                                                <li><a data-bs-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal"><i class="bi bi-search"></i></a>
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
                        </div>
                    </div>
                </div>


                <!-- End Single Tab Content -->
            </div>
        </div>
</section>
<!-- Start BEst Seller Area -->
<!-- Start NEwsletter Area -->
<section class="wn__newsletter__area bg-image--2">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 offset-lg-5 col-md-12 col-12 ptb--150">
                <div class="section__title text-center">
                    <h2>Stay With Us</h2>
                </div>
                <div class="newsletter__block text-center">
                    <p>Subscribe to our newsletters now and stay up-to-date with new collections, the latest
                        lookbooks and exclusive offers.</p>
                    <form action="#">
                        <div class="newsletter__box">
                            <input type="email" placeholder="Enter your e-mail">
                            <button>Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End NEwsletter Area -->
<!-- Start Recent Post Area -->
<section class="wn__recent__post style-two ptb--80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section__title text-center">
                    <h2 class="title__be--2">Our <span class="color--theme">Blog</span></h2>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                        suffered lebmid alteration in some ledmid form</p>
                </div>
            </div>
        </div>
        <div class="row mt--50">
            <div class="col-md-6 col-lg-4 col-sm-12">
                <div class="post__itam">
                    <div class="content">
                        <h3><a href="blog-details.html">International activities of the Frankfurt Book </a></h3>
                        <p>We are proud to announce the very first the edition of the frankfurt news.We are
                            proud to announce the very first of edition of the fault frankfurt news for us.</p>
                        <div class="post__time">
                            <span class="day">Dec 06, 18</span>
                            <div class="post-meta">
                                <ul>
                                    <li><a href="#"><i class="bi bi-love"></i>72</a></li>
                                    <li><a href="#"><i class="bi bi-chat-bubble"></i>27</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-sm-12">
                <div class="post__itam">
                    <div class="content">
                        <h3><a href="blog-details.html">Reading has a signficant info number of benefits</a>
                        </h3>
                        <p>Find all the information you need to ensure your experience.Find all the information
                            you need to ensure your experience . Find all the information you of.</p>
                        <div class="post__time">
                            <span class="day">Mar 08, 18</span>
                            <div class="post-meta">
                                <ul>
                                    <li><a href="#"><i class="bi bi-love"></i>72</a></li>
                                    <li><a href="#"><i class="bi bi-chat-bubble"></i>27</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-sm-12">
                <div class="post__itam">
                    <div class="content">
                        <h3><a href="blog-details.html">The London Book Fair is to be packed with exciting </a>
                        </h3>
                        <p>The London Book Fair is the global area inon marketplace for rights negotiation.The
                            year London Book Fair is the global area inon forg marketplace for rights.</p>
                        <div class="post__time">
                            <span class="day">Nov 11, 18</span>
                            <div class="post-meta">
                                <ul>
                                    <li><a href="#"><i class="bi bi-love"></i>72</a></li>
                                    <li><a href="#"><i class="bi bi-chat-bubble"></i>27</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Recent Post Area -->
@endsection