@extends('layout.layout')
@section('content')

    <!-- Start breadcrumb area -->
    <div class="ht__breadcrumb__area bg-image--6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__inner text-center">
                        <h2 class="breadcrumb-title">Shop Grid</h2>
                        <nav class="breadcrumb-content">
                            <a class="breadcrumb_item" href="index.html">Home</a>
                            <span class="brd-separator">/</span>
                            <span class="breadcrumb_item active">Shop Grid</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End breadcrumb area -->
    <!-- Start Shop Page -->
    <div class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
                    <div class="shop__sidebar">
                        <aside class="widget__categories products--cat">
                            <h3 class="widget__title">Product Categories</h3>
                            <ul>
                                @foreach ($cate as $cate)
                                    <li><a href="{{ url('view-category/'.$cate->slug) }}">{{ $cate->cate_Name }} <span>(3)</span></a></li>
                                @endforeach


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
                <div class="col-lg-9 col-12 order-1 order-lg-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="shop__list__wrapper d-flex flex-wrap flex-md-nowrap justify-content-between">
                                <div class="shop__list nav justify-content-center" role="tablist">
                                    <a class="nav-item nav-link active" data-bs-toggle="tab" href="#nav-grid"
                                        role="tab"><i class="fa fa-th"></i></a>
                                    <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-list" role="tab"><i
                                            class="fa fa-list"></i></a>
                                </div>
                                <p>Showing 1–12 of 40 results</p>
                                <div class="orderby__wrapper">
                                    <span>Sort By</span>
                                    <select class="shot__byselect">
                                        <option>Default sorting</option>
                                        <option>HeadPhone</option>
                                        <option>Furniture</option>
                                        <option>Jewellery</option>
                                        <option>Handmade</option>
                                        <option>Kids</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab__container tab-content">
                        <div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
                            <div class="row">
                                @foreach ($datas as $data)
                                    <!-- Start Single Product -->
                                    <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                                        <div class="product__thumb">
                                            <a class="first__img" href="{{ route('book.detail', $data->id) }}"><img
                                                    style="height: 250px; object-fit: cover"
                                                    src="{{ asset('storage/images/' . $data->book_image) }}"
                                                    alt="product image"></a>
                                            <a class="second__img animation1"
                                                href="{{ route('book.detail', $data->id) }}"><img src="images/books/2.jpg"
                                                    alt="product image"></a>
                                            <div class="hot__box">
                                                <span class="hot-label">BEST SALLER</span>
                                            </div>
                                        </div>
                                        <div class="product__content content--center">
                                            <h4><a href="{{ route('book.detail', $data->id) }}">robin parrish</a></h4>
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
                                                        <li><a class="compare" href="#"><i
                                                                    class="bi bi-heart-beat"></i></a></li>
                                                        <li><a data-bs-toggle="modal" title="Quick View"
                                                                class="quickview modal-view detail-link"
                                                                href="#productmodal"><i class="bi bi-search"></i></a>
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
                                    <!-- End Single Product -->
                                @endforeach
                            </div>


                        <div class="pagination pagination m-0 float-right">
                      {{$datas->appends(request()->all())->links()}}
                        </div>


                        </div>
                        <div class="shop-grid tab-pane fade" id="nav-list" role="tabpanel">
                            <div class="list__view__wrapper">

                                <!-- Start Single Product -->
                                <div class="list__view">
                                    <div class="thumb">
                                        <a class="first__img" href="single-product.html"><img src=""
                                                alt="product images"></a>
                                        <a class="second__img animation1" href="single-product.html"><img
                                                src="images/product/2.jpg" alt="product images"></a>
                                    </div>
                                    <div class="content">
                                        <h2><a href="single-product.html">Ali Smith</a></h2>
                                        <ul class="rating d-flex">
                                            <li class="on"><i class="fa fa-star-o"></i></li>
                                            <li class="on"><i class="fa fa-star-o"></i></li>
                                            <li class="on"><i class="fa fa-star-o"></i></li>
                                            <li class="on"><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                        </ul>
                                        <ul class="price__box">
                                            <li>$111.00</li>
                                            <li class="old__price">$220.00</li>
                                        </ul>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla
                                            augue nec est tristique auctor. Donec non est at libero vulputate
                                            rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi,
                                            vulputate adipiscing cursus eu, suscipit id nulla.</p>
                                        <ul class="cart__action d-flex">
                                            <li class="cart"><a href="cart.html">Add to cart</a></li>
                                            <li class="wishlist"><a href="cart.html"></a></li>
                                            <li class="compare"><a href="cart.html"></a></li>
                                        </ul>

                                    </div>
                                </div>
                                <!-- End Single Product -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->
@endsection
