<!doctype html>
<html class="no-js" lang="zxx">


<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">

   <title>@yield('title')</title> 
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <meta name="csrf-token" content="{{ csrf_token() }}">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   <!-- Place favicon.ico in the root directory -->
   <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/imgs/pharmacy-favicon.png') }}">

   <!-- CSS here -->
   <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-pro.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/spacing.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/pharmecy.css') }}">

   @livewireStyles
</head>

<body>

   <!-- preloader start -->
   <div id="preloader">
      <div class="bd-loader-inner">
         <div class="bd-loader">
            <span class="bd-loader-item"></span>
            <span class="bd-loader-item"></span>
            <span class="bd-loader-item"></span>
            <span class="bd-loader-item"></span>
            <span class="bd-loader-item"></span>
            <span class="bd-loader-item"></span>
            <span class="bd-loader-item"></span>
            <span class="bd-loader-item"></span>
         </div>
      </div>
   </div>
   <!-- preloader start -->

   <!-- Back to top start -->
   <div class="backtotop-wrap cursor-pointer">
      <svg class="backtotop-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
         <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
      </svg>
   </div>
   <!-- Back to top end -->

   <!-- search area start -->
   <div class="df-search-area">
      <div class="container">
         <div class="row">
            <div class="col-xl-12">
               <div class="df-search-form">
                  <div class="df-search-close text-center mb-20">
                     <button class="df-search-close-btn df-search-close-btn"></button>
                  </div>
                  <form action="#">
                     <div class="df-search-input mb-10">
                        <input type="text" placeholder="Search for product...">
                        <button type="submit"><i class="flaticon-search-1"></i></button>
                     </div>
                     <div class="df-search-category">
                        <span>Search by : </span>
                        <a href="#">Healthline, </a>
                        <a href="#">COVID-19, </a>
                        <a href="#">Surgery, </a>
                        <a href="#">Surgeon, </a>
                        <a href="#">Medical research</a>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="body-overlay"></div>
   <!-- search area end -->

   <!-- Offcanvas area start -->
   <div class="fix">
      <div class="offcanvas__info">
         <div class="offcanvas__wrapper">
            <div class="offcanvas__content">
               <div class="offcanvas__top mb-40 d-flex justify-content-between align-items-center">
                  <div class="offcanvas__logo">
                     <a href="pharmacy.html">
                        <img src="{{ asset('assets/imgs/logo/logo-white.svg') }}" alt="logo not found">
                     </a>
                  </div>
                  <div class="offcanvas__close">
                     <button>
                        <i class="fal fa-times"></i>
                     </button>
                  </div>
               </div>
               <div class="offcanvas__search mb-25">
                  <form action="#">
                     <input type="text" placeholder="What are you searching for?">
                     <button type="submit"><i class="far fa-search"></i></button>
                  </form>
               </div>
               <div class="mobile-menu fix mb-40"></div>
               <div class="offcanvas__contact mt-30 mb-20">
                  <h4>Contact Info</h4>
                  <ul>
                     <li class="d-flex align-items-center">
                        <div class="offcanvas__contact-icon mr-15">
                           <i class="fal fa-map-marker-alt"></i>
                        </div>
                        <div class="offcanvas__contact-text">
                           <a target="_blank"
                              href="https://www.google.com/maps/place/Dhaka/@23.7806207,90.3492859,12z/data=!3m1!4b1!4m5!3m4!1s0x3755b8b087026b81:0x8fa563bbdd5904c2!8m2!3d23.8104753!4d90.4119873">12/A,
                              Mirnada City Tower, NYC</a>
                        </div>
                     </li>
                     <li class="d-flex align-items-center">
                        <div class="offcanvas__contact-icon mr-15">
                           <i class="far fa-phone"></i>
                        </div>
                        <div class="offcanvas__contact-text">
                           <a href="tel:+088889797697">+088889797697</a>
                        </div>
                     </li>
                     <li class="d-flex align-items-center">
                        <div class="offcanvas__contact-icon mr-15">
                           <i class="fal fa-envelope"></i>
                        </div>
                        <div class="offcanvas__contact-text">
                           <a href="tel:+012-345-6789"><span class="mailto:support@mail.com">support@mail.com</span></a>
                        </div>
                     </li>
                  </ul>
               </div>
               <div class="offcanvas__social">
                  <ul>
                     <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                     <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                     <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                     <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="offcanvas__overlay"></div>
   <div class="offcanvas__overlay-white"></div>
   <!-- Offcanvas area start -->

   <!-- Add cart modal area start -->
   {{-- <div class="product-modal-sm modal fade" id="producQuickViewModal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="product-modal">
               <div class="product-modal-wrapper p-relative">
                  <button type="button" class="close product-modal-close" data-bs-dismiss="modal" aria-label="Close">
                     <i class="fal fa-times"></i>
                  </button>
                  <div class="modal__inner">
                     <div class="bd__shop-details-inner">
                        <div class="row">
                           <div class="col-xxl-6 col-lg-6">
                              <div class="product__details-thumb-wrapper d-sm-flex align-items-start">
                                 <div class="product__details-thumb-tab mr-20">
                                    <nav>
                                       <div class="nav nav-tabs flex-nowrap flex-sm-column" id="nav-tab" role="tablist">
                                          <button class="nav-link active" id="img-1-tab" data-bs-toggle="tab"
                                             data-bs-target="#img-1" type="button" role="tab" aria-controls="img-1"
                                             aria-selected="true">
                                             <img src="{{ asset('assets/imgs/product/details/details-01.png') }}"
                                                alt="product-sm-thumb">
                                          </button>
                                          <button class="nav-link" id="img-2-tab" data-bs-toggle="tab"
                                             data-bs-target="#img-2" type="button" role="tab" aria-controls="img-3"
                                             aria-selected="false">
                                             <img src="{{ asset('assets/imgs/product/details/details-02.png') }}"
                                                alt="product-sm-thumb">
                                          </button>
                                          <button class="nav-link" id="img-3-tab" data-bs-toggle="tab"
                                             data-bs-target="#img-3" type="button" role="tab" aria-controls="img-3"
                                             aria-selected="false">
                                             <img src="{{ asset('assets/imgs/product/details/details-03.png') }}"
                                                alt="product-sm-thumb">
                                          </button>
                                       </div>
                                    </nav>
                                 </div>
                                 <div class="product__details-thumb-tab-content">
                                    <div class="tab-content" id="productthumbcontent">
                                       <div class="tab-pane fade show active" id="img-1" role="tabpanel"
                                          aria-labelledby="img-1-tab">
                                          <div class="product__details-thumb-big w-img">
                                             <img src="{{ asset('assets/imgs/product/details/details-01.png') }}" alt="">
                                          </div>
                                       </div>
                                       <div class="tab-pane fade" id="img-2" role="tabpanel"
                                          aria-labelledby="img-2-tab">
                                          <div class="product__details-thumb-big w-img">
                                             <img src="{{ asset('assets/imgs/product/details/details-02.png') }}" alt="">
                                          </div>
                                       </div>
                                       <div class="tab-pane fade" id="img-3" role="tabpanel"
                                          aria-labelledby="img-3-tab">
                                          <div class="product__details-thumb-big w-img">
                                             <img src="{{ asset('assets/imgs/product/details/details-03.png') }}" alt="">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-xxl-6 col-lg-6">
                              <div class="product__details-content">
                                 <div class="product__details-top d-flex flex-wrap gap-3 align-items-center mb-15">
                                    <div class="product__details-tag">
                                       <a href="#">Construction</a>
                                    </div>
                                    <div class="product__details-rating">
                                       <a href="#"><i class="fa-solid fa-star"></i></a>
                                       <a href="#"><i class="fa-solid fa-star"></i></a>
                                       <a href="#"><i class="fa-regular fa-star"></i></a>
                                    </div>
                                    <div class="product__details-review-count">
                                       <a href="#">10 Reviews</a>
                                    </div>
                                 </div>
                                 <h3 class="product__details-title">Disposable Surgical Face Mask</h3>
                                 <div class="product__details-price">
                                    <span class="old-price">$30.35</span>
                                    <span class="new-price">$19.25</span>
                                 </div>
                                 <p>Priyoshop has brought to you the Hijab 3 Pieces Combo Pack PS23. It is a completely
                                    modern design and you feel comfortable to put on this hijab. Buy it at the best
                                    price.</p>

                                 <div class="product__details-action mb-35">
                                    <div class="product__quantity">
                                       <div class="product-quantity-wrapper">
                                          <form action="#">
                                             <button class="cart-minus"><i class="fa-light fa-minus"></i></button>
                                             <input class="cart-input" type="text" value="1">
                                             <button class="cart-plus"><i class="fa-light fa-plus"></i></button>
                                          </form>
                                       </div>
                                    </div>
                                    <div class="product__add-cart">
                                       <a href="javascript:void(0)" class="fill-btn cart-btn">
                                          <span class="fill-btn-inner">
                                             <span class="fill-btn-normal">Add To Cart<i
                                                   class="fa-solid fa-basket-shopping"></i></span>
                                             <span class="fill-btn-hover">Add To Cart<i
                                                   class="fa-solid fa-basket-shopping"></i></span>
                                          </span>
                                       </a>
                                    </div>
                                    <div class="product__add-wish">
                                       <a href="#" class="product__add-wish-btn"><i class="fa-solid fa-heart"></i></a>
                                    </div>
                                 </div>
                                 <div class="product__details-meta">
                                    <div class="sku">
                                       <span>SKU:</span>
                                       <a href="#">BO1D0MX8SJ</a>
                                    </div>
                                    <div class="categories">
                                       <span>Categories:</span> <a href="#">Milk,</a> <a href="#">Cream,</a> <a
                                          href="#">Fermented.</a>
                                    </div>
                                    <div class="tag">
                                       <span>Tags:</span> <a href="#"> Cheese,</a> <a href="#">Custard,</a> <a
                                          href="#">Frozen</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div> --}}
   <!-- Add cart modal area end -->

   <!-- Header area start -->
   <header>
      <div class="header">
         <div class="header-top-area">
            <div class="header-layout-4">
               <div class="header-to-main d-none d-sm-flex">
                  <div class="link-text">
                     <span><img src="{{ asset('assets/imgs/icons/call.png') }}" alt=""></span>
                     <a href="tel:+380961381876">+380961381876</a>
                  </div>
                  <div class="header-top-notice d-none d-lg-block">
                     <p>TAKE CARE OF YOUR Health <span class="text-color-2">25% OFF</span> USE CODE “ DOFIX03 ”</p>
                  </div>
                  <div class="tp-header-top-menu d-flex align-items-center justify-content-end">
                     <div class="header-lang-item header-lang">
                        <span class="header-lang-toggle" id="header-lang-toggle">English</span>
                        <ul class="">
                           <li>
                              <a href="#">Spanish</a>
                           </li>
                           <li>
                              <a href="#">Russian</a>
                           </li>
                           <li>
                              <a href="#">Portuguese</a>
                           </li>
                        </ul>
                     </div>
                     <div class="header-lang-item tp-header-currency">
                        <span class="header-currency-toggle" id="header-currency-toggle">USD</span>
                        <ul>
                           <li>
                              <a href="#">EUR</a>
                           </li>
                           <li>
                              <a href="#">CHF</a>
                           </li>
                           <li>
                              <a href="#">GBP</a>
                           </li>
                           <li>
                              <a href="#">KWD</a>
                           </li>
                        </ul>
                     </div>
                     <div class="header-lang-item tp-header-setting">
                        <span class="header-setting-toggle" id="header-setting-toggle">Setting</span>
                        <ul>
                           <li>
                                 @if (Route::has('login'))
                                     <nav class="-mx-3 flex flex-1 justify-end">
                                         @auth
                                             <a
                                                 href="{{ url('/dashboard') }}"
                                                 class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                                             >
                                                 profile
                                             </a>
                                                {{-- <a 
                                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                                                href="{{ route('logout') }}">Logout</a> --}}
                                         @else
                                             <a
                                                 href="{{ route('login') }}"
                                                 class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                                             >
                                                 Log in
                                             </a>
         
                                             @if (Route::has('register'))
                                                 <a
                                                     href="{{ route('register') }}"
                                                     class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                                                 >
                                                     Register
                                                 </a>
                                             @endif
                                         @endauth
                                     </nav>
                                 @endif
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="header-layout-4 header-bottom">
            <div id="header-sticky" class="header-4">
               <div class="mega-menu-wrapper">
                  <div class="header-main-4">
                     <div class="header-left">
                        <div class="header-logo">
                           <a href="pharmacy.html">
                              <img src="{{ asset('assets/imgs/logo/logo.svg') }}" alt="logo not found">
                           </a>
                        </div>
                        <div class="mean__menu-wrapper d-none d-lg-block">
                           <div class="main-menu">
                              <nav id="mobile-menu">
                                 <ul>
                                    <li>
                                        <a href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li>
                                       <a href="{{ route('about') }}">About</a>
                                    </li>
                                    <li >
                                       <a href="{{ route('products.index') }}">Product</a>
                                       {{-- <ul class="submenu">
                                          <li><a href="pharmacy-product.html">Product</a></li>
                                          <li><a href="pharmacy-details.html">Product Details</a></li>
                                          <li><a href="wishlist-pharmacy.html">Wishlist</a></li>
                                          <li><a href="cart-pharmacy.html">Cart</a></li>
                                          <li><a href="checkout-pharmacy.html">Checkout</a></li>
                                       </ul> --}}
                                    </li>
                                    <li class="has-dropdown">
                                       <a href="about.html">Pages</a>
                                       <ul class="submenu">
                                          <li><a href="about.html">About Us</a></li>
                                          <li><a href="store.html">Find a Store</a></li>
                                          <li><a href="portfolio.html">Portfolio</a></li>
                                          <li><a href="portfolio-details.html">Portfolio Details</a></li>
                                          <li><a href="faq.html">Faq</a></li>
                                          <li><a href="coming-soon.html">Coming Soon</a></li>
                                          <li><a href="error.html">404</a></li>
                                       </ul>
                                    </li>
                                    <li class="has-dropdown">
                                       <a href="{{ route('orders.index') }}">orders</a>
                                       <ul class="submenu">
                                          <li><a href="{{ route('orders.index') }}">orders</a></li>
                                          <li><a href="blog-grid.html">Blog Grid</a></li>
                                          <li><a href="blog-details.html">Blog Details</a></li>
                                       </ul>
                                    </li>
                                    <li>
                                       <a href="contact.html">Contact</a>
                                    </li>
                                 </ul>
                              </nav>
                           </div>
                        </div>
                     </div>
                     <div class="header-right d-inline-flex align-items-center justify-content-end">
                        <div class="header-search d-none d-xxl-block">
                           <form action="#">
                              <input type="text" placeholder="Search...">
                              <button type="submit">
                                 <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.4443 13.4445L16.9999 17" stroke="white" stroke-width="2"
                                       stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                       d="M15.2222 8.11111C15.2222 12.0385 12.0385 15.2222 8.11111 15.2222C4.18375 15.2222 1 12.0385 1 8.11111C1 4.18375 4.18375 1 8.11111 1C12.0385 1 15.2222 4.18375 15.2222 8.11111Z"
                                       stroke="white" stroke-width="2" />
                                 </svg>
                              </button>
                           </form>
                        </div>
                        <div class="header-action d-flex align-items-center ml-30">
                           <div class="header-action-item">
                              <a href="{{ route('favorites.index') }}" class="header-action-btn">
                                 <svg width="23" height="21" viewBox="0 0 23 21" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                       d="M21.2743 2.33413C20.6448 1.60193 19.8543 1.01306 18.9596 0.609951C18.0649 0.206838 17.0883 -0.0004864 16.1002 0.00291444C14.4096 -0.0462975 12.7637 0.529279 11.5011 1.61122C10.2385 0.529279 8.59252 -0.0462975 6.90191 0.00291444C5.91383 -0.0004864 4.93727 0.206838 4.04257 0.609951C3.14788 1.01306 2.35732 1.60193 1.72785 2.33413C0.632101 3.61193 -0.514239 5.92547 0.245772 9.69587C1.4588 15.7168 10.5548 20.6578 10.9388 20.8601C11.11 20.9518 11.3028 21 11.4988 21C11.6948 21 11.8875 20.9518 12.0587 20.8601C12.445 20.6534 21.541 15.7124 22.7518 9.69587C23.5164 5.92547 22.37 3.61193 21.2743 2.33413ZM20.4993 9.27583C19.6416 13.5326 13.4074 17.492 11.5011 18.6173C8.81516 17.0587 3.28927 13.1457 2.50856 9.27583C1.91872 6.35103 2.72587 4.65208 3.50773 3.74126C3.9212 3.26166 4.43995 2.87596 5.02678 2.61185C5.6136 2.34774 6.25396 2.21175 6.90191 2.21365C7.59396 2.16375 8.28765 2.2871 8.91534 2.57168C9.54304 2.85626 10.0833 3.29235 10.4835 3.83743C10.5822 4.012 10.7278 4.15794 10.9051 4.26003C11.0824 4.36212 11.2849 4.41662 11.4916 4.41787C11.6983 4.41911 11.9015 4.36704 12.0801 4.26709C12.2587 4.16714 12.4062 4.02296 12.5071 3.84959C12.9065 3.30026 13.448 2.86048 14.0781 2.57361C14.7081 2.28674 15.4051 2.16267 16.1002 2.21365C16.7495 2.21061 17.3915 2.34604 17.9798 2.6102C18.5681 2.87435 19.0881 3.26065 19.5025 3.74126C20.282 4.65208 21.0892 6.35103 20.4993 9.27583Z"
                                       fill="black" />
                                 </svg>
                                 <span class="header-action-badge">{{ $totalFavorites ?? 0 }}</span>
                              </a>
                           </div>
                           <div class="header-action-item">
                              <a href="{{ route('cart.index') }}" class="header-action-btn cartmini-open-btn">
                                 <svg width="21" height="23" viewBox="0 0 21 23" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                       d="M14.0625 10.6C14.0625 12.5883 12.4676 14.2 10.5 14.2C8.53243 14.2 6.9375 12.5883 6.9375 10.6M1 5.8H20M1 5.8V13C1 20.6402 2.33946 22 10.5 22C18.6605 22 20 20.6402 20 13V5.8M1 5.8L2.71856 2.32668C3.12087 1.5136 3.94324 1 4.84283 1H16.1571C17.0568 1 17.8791 1.5136 18.2814 2.32668L20 5.8"
                                       stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                 </svg>
                                 <span class="header-action-badge">
                                    {{ $totalItems ?? 0 }}
                                 </span>
                              </a>
                           </div>
                        </div>
                        <div class="header-humbager ml-30">
                           <a class="sidebar__toggle" href="javascript:void(0)">
                              <div class="bar-icon-2">
                                 <span></span>
                                 <span></span>
                                 <span></span>
                              </div>
                           </a>
                           <!-- for wp -->
                           <div class="header__hamburger ml-50 d-none">
                              <button type="button" class="hamburger-btn offcanvas-open-btn">
                                 <span>01</span>
                                 <span>01</span>
                                 <span>01</span>
                              </button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </header>
   <!-- Header area end -->


   {{-- {{ $slot }} --}}
    @livewireScripts

   @yield('content')

</body>
@extends('layouts.footer')

</html>