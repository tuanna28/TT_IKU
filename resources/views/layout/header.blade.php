<!-- Header -->
<header id="wn__header" class=" header__area header__absolute sticky__header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-6 col-lg-2">
                <div class="logo">
                    <a href="/">
                        <img src="{{ asset('storage/images/logo.png') }}" style="width:130px; height:auto" alt="logo images">
                    </a>
                </div>
            </div>
            <div class="col-lg-8 d-none d-lg-block">
                <nav class="mainmenu__nav" >
                    <ul class="meninmenu d-flex justify-content-start">
                        <li class="drop with--one--item"><a href="{{ route('home') }}">Home</a>
                            
                        </li>
                        <!-- <li class="drop"><a href="#">Shop</a>
                            <div class="megamenu mega03">
                                <ul class="item item03">
                                    <li class="title">Shop Layout</li>
                                    <li><a href="shop-grid.html">Shop Grid</a></li>
                                    <li><a href="shop-list.html">Shop List</a></li>
                                    <li><a href="shop-left-sidebar.html">Shop Left Sidebar</a></li>
                                    <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                    <li><a href="shop-no-sidebar.html">Shop No sidebar</a></li>
                                    <li><a href="single-product.html">Single Product</a></li>
                                </ul>
                                <ul class="item item03">
                                    <li class="title">Shop Page</li>
                                    <li><a href="my-account.html">My Account</a></li>
                                    <li><a href="{{ route('cart.index') }}">Cart Page</a></li>
                                    <li><a href="checkout.html">Checkout Page</a></li>
                                    <li><a href="wishlist.html">Wishlist Page</a></li>
                                    <li><a href="error404.html">404 Page</a></li>
                                    <li><a href="faq.html">Faq Page</a></li>
                                </ul>
                                <ul class="item item03">
                                    <li class="title">Bargain Books</li>
                                    <li><a href="shop-grid.html">Bargain Bestsellers</a></li>
                                    <li><a href="shop-grid.html">Activity Kits</a></li>
                                    <li><a href="shop-grid.html">B&N Classics</a></li>
                                    <li><a href="shop-grid.html">Books Under $5</a></li>
                                    <li><a href="shop-grid.html">Bargain Books</a></li>
                                </ul>
                            </div>
                        </li> -->
                        <li class="drop"><a href="{{ route('books.show') }}">Books</a>
                            <div class="megamenu mega03">
                                <ul class="item item03">
                                    <li class="title">Categories</li>
                                    <li><a href="shop-grid.html">Biography </a></li>
                                    <li><a href="shop-grid.html">Business </a></li>
                                    <li><a href="shop-grid.html">Cookbooks </a></li>
                                    <li><a href="shop-grid.html">Health & Fitness </a></li>
                                    <li><a href="shop-grid.html">History </a></li>
                                </ul>
                                <ul class="item item03">
                                    <li class="title">Customer Favourite</li>
                                    <li><a href="shop-grid.html">Mystery</a></li>
                                    <li><a href="shop-grid.html">Religion & Inspiration</a></li>
                                    <li><a href="shop-grid.html">Romance</a></li>
                                    <li><a href="shop-grid.html">Fiction/Fantasy</a></li>
                                    <li><a href="shop-grid.html">Sleeveless</a></li>
                                </ul>
                                <ul class="item item03">
                                    <li class="title">Collections</li>
                                    <li><a href="shop-grid.html">Science </a></li>
                                    <li><a href="shop-grid.html">Fiction/Fantasy</a></li>
                                    <li><a href="shop-grid.html">Self-Improvemen</a></li>
                                    <li><a href="shop-grid.html">Home & Garden</a></li>
                                    <li><a href="shop-grid.html">Humor Books</a></li>
                                </ul>
                            </div>
                        </li>
                    
                        <li class="drop"><a href="#">Pages</a>
                            <div class="megamenu dropdown">
                                <ul class="item item01">
                                    <li><a href="about.html">About Page</a></li>
                                    <li class="label2"><a href="portfolio.html">Portfolio</a>
                                        <ul>
                                            <li><a href="portfolio.html">Portfolio</a></li>
                                            <li><a href="portfolio-three-column.html">Portfolio 3 Column</a>
                                            </li>
                                            <li><a href="portfolio-details.html">Portfolio Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="my-account.html">My Account</a></li>
                                    <li><a href="{{ route('cart.index') }}">Cart Page</a></li>
                                    <li><a href="checkout.html">Checkout Page</a></li>
                                    <li><a href="wishlist.html">Wishlist Page</a></li>
                                    <li><a href="error404.html">404 Page</a></li>
                                    <li><a href="faq.html">Faq Page</a></li>
                                    <li><a href="team.html">Team Page</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="drop"><a href="{{route('blog')}}">Blog</a>
                            <div class="megamenu dropdown">
                                <ul class="item item01">
                                    <li><a href="blog.html">Blog Page</a></li>
                                    <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                                    <li><a href="blog-no-sidebar.html">Blog No Sidebar</a></li>
                                    <li><a href="blog-details.html">Blog Details</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="{{route('contact')}}">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-6 col-sm-6 col-6 col-lg-2">
                <ul class="header__sidebar__right d-flex justify-content-end align-items-center">
                    <li class="shop_search me-4"><a class="search__active" href="#"></a></li>
                    <li class="shopcart"><a class="cartbox_active" href="#"><span
                                class="product_qun">
                                @php
                                $carts = null;
                                $cart_total = 0;
                                            if (Auth::check()) {
                                                $carts = DB::table('carts')
                    ->select('carts.quantity', 'carts.money', 'books.title_book', 'books.book_image', 'carts.id', 'carts.book_id')
                    ->join('books', 'books.id', '=', 'carts.book_id')
                    ->where('carts.user_id', '=',  Auth::user()->id)
                    ->get();
                                               
                                                echo $carts->count();
                                            } else {
                                                echo 0;
                                            }
                                        
                                 @endphp
                                 @foreach ($carts as $cart)
                                    @php
                                        $cart_total += $cart->money * $cart->quantity;
                                    @endphp
                                    @endforeach
                            
                            </span></a>
                        <!-- Start Shopping Cart -->
                        <div class="block-minicart minicart__active">
                            <div class="minicart-content-wrapper">
                                <div class="micart__close">
                                    <span>close</span>
                                </div>
                              
                                <div class="items-total d-flex justify-content-between">
                                    <span> items</span>
                                    <span>Cart Subtotal</span>
                                </div>
                                <div class="total_amount text-end">
                           
                                    <span>${{$cart_total}}</span>
                              
                                </div>
                                <div class="mini_action checkout">
                                    <a class="checkout__btn" href="{{ route('cart.index') }}">Go to Checkout</a>
                                </div>
                                <div class="single__items">
                                    <div class="miniproduct">
                                    
                                   
                                        @foreach ($carts as $cart )
                                        
                            
                                        <div class="item01 d-flex mt--10">
                                            <div class="thumb">
                                                <a href="{{ route('book.detail', $cart->book_id) }}"><img
                                                        src="{{ asset('storage/images/'.$cart->book_image) }}"
                                                        alt="product images" style="width:80px"></a>
                                            </div>
                                            <div class="content">
                                                <h6><a href="{{ route('book.detail', $cart->book_id) }}">{{$cart->title_book}}</a></h6>
                                                <span class="price">${{$cart->money}}</span>
                                                <div class="product_price d-flex justify-content-between">
                                                    <span class="qun">Qty: {{$cart->quantity}}</span>
                                                    <ul class="d-flex justify-content-end">
                                                        <li><a href="#"><i class="zmdi zmdi-settings"></i></a>
                                                        </li>
                                                        <li><a href="#"><i class="zmdi zmdi-delete"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    
                                    </div>
                                </div>
                                <div class="mini_action cart">
                                    <a class="cart__btn" href="{{ route('client.order.index') }}">View and edit Order</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Shopping Cart -->
                    </li>
                    @if (Auth::check())
                        <li class="setting__bar__icon">
                            <a class="setting__active" href="#"></a>
                            <div class="searchbar__content setting__block">
                                <div class="content-inner">
                                    <div class="switcher-currency" style="font-size: 16px">
                                        <span class="d-flex justify-content-start">Xin chào</span>
                                        <strong class="label switcher-label">
                                            <span style="font-size: 20px">{{ Auth::user()->name }}</span>
                                        </strong>
                                        <div class="switcher-options">
                                            <div class="switcher-currency-trigger">
                                                <span class="currency-trigger"><a
                                                        href="{{ route('my.account.detail') }}">View
                                                        profile</a></span>
                                                <span class="currency-trigger"><a
                                                        href="{{ route('logout') }}">Logout</a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @else
                        <li><a href="{{ route('signin') }}">Login</a></li>
                    @endif
                </ul>
            </div>
        </div>
        <!-- Start Mobile Menu -->
        <div class="row d-none">
            <div class="col-lg-12 d-none">
                <nav class="mobilemenu__nav">
                    <ul class="meninmenu">
                        <li><a href="index.html">Home</a>
                            <ul>
                                <li><a href="index.html">Home Style Default</a></li>
                                <li><a href="index-2.html">Home Style Two</a></li>
                                <li><a href="index-3.html">Home Style Three</a></li>
                                <li><a href="index-box.html">Home Box Style</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Pages</a>
                            <ul>
                                <li><a href="about.html">About Page</a></li>
                                <li><a href="portfolio.html">Portfolio</a>
                                    <ul>
                                        <li><a href="portfolio.html">Portfolio</a></li>
                                        <li><a href="portfolio-three-column.html">Portfolio 3 Column</a></li>
                                        <li><a href="portfolio-details.html">Portfolio Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="my-account.html">My Account</a></li>
                                <li><a href="{{ route('cart.index') }}">Cart Page</a></li>
                                <li><a href="checkout.html">Checkout Page</a></li>
                                <li><a href="wishlist.html">Wishlist Page</a></li>
                                <li><a href="error404.html">404 Page</a></li>
                                <li><a href="faq.html">Faq Page</a></li>
                                <li><a href="team.html">Team Page</a></li>
                            </ul>
                        </li>
                        <li><a href="shop-grid.html">Shop</a>
                            <ul>
                                <li><a href="shop-grid.html">Shop Grid</a></li>
                                <li><a href="shop-list.html">Shop List</a></li>
                                <li><a href="shop-left-sidebar.html">Shop Left Sidebar</a></li>
                                <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                <li><a href="shop-no-sidebar.html">Shop No sidebar</a></li>
                                <li><a href="single-product.html">Single Product</a></li>
                            </ul>
                        </li>
                        <li><a href="blog.html">Blog</a>
                            <ul>
                                <li><a href="blog.html">Blog Page</a></li>
                                <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                                <li><a href="blog-no-sidebar.html">Blog No Sidebar</a></li>
                                <li><a href="blog-details.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- End Mobile Menu -->
        <div class="mobile-menu d-block d-lg-none">
        </div>
        <!-- Mobile Menu -->
    </div>
</header>
<!-- //Header -->
<!-- Start Search Popup -->
<div class="box-search-content search_active block-bg close__top">
    <form id="search_mini_form" class="minisearch" action="search">
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
