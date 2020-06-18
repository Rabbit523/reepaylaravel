@extends('layouts.default')
@section('content')

    @include('includes.header')

    <!-- Banner start -->
    <div class="banner" id="banner">
        <div id="bannerCarousole" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item banner-max-height active">
                    <img class="d-block w-100" src="http://placehold.it/1920x1000" alt="banner">
                    <div class="carousel-caption banner-slider-inner"></div>
                </div>
                <div class="carousel-item banner-max-height">
                    <img class="d-block w-100" src="http://placehold.it/1920x1000" alt="banner">
                    <div class="carousel-caption banner-slider-inner"></div>
                </div>
                <div class="carousel-item banner-max-height">
                    <img class="d-block w-100" src="http://placehold.it/1920x1000" alt="banner">
                    <div class="carousel-caption banner-slider-inner"></div>
                </div>
                <div class="carousel-caption d-flex h-100 banner-slider-inner-2">
                    <div class="carousel-content container">
                        <div class="text-center">
                            <h3 class="text-uppercase">Find Your Property</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            </p>
                            <div class="inline-search-area ml-auto mr-auto d-none d-xl-block d-lg-block">
                                <div class="row">
                                    <div class="col-xl-2 col-lg-2 col-sm-4 col-6 search-col">
                                        <select class="selectpicker search-fields" name="any-status">
                                            <option>Any Status</option>
                                            <option>For Rent</option>
                                            <option>For Sale</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-sm-4 col-6 search-col">
                                        <select class="selectpicker search-fields" name="all-type">
                                            <option>All Type</option>
                                            <option>Apartments</option>
                                            <option>Shop</option>
                                            <option>Restaurant</option>
                                            <option>Villa</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-sm-4 col-6 search-col">
                                        <select class="selectpicker search-fields" name="bedrooms">
                                            <option>Bedrooms</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-sm-4 col-6 search-col">
                                        <select class="selectpicker search-fields" name="bathrooms">
                                            <option>Bathrooms</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-sm-4 col-6 search-col">
                                        <select class="selectpicker search-fields" name="location">
                                            <option>location</option>
                                            <option>United States</option>
                                            <option>American Samoa</option>
                                            <option>Belgium</option>
                                            <option>Canada</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-sm-4 col-6 search-col">
                                        <button class="btn button-theme btn-search btn-block">
                                            <i class="fa fa-search"></i><strong>Find</strong>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#bannerCarousole" role="button" data-slide="prev">
            <span class="slider-mover-left" aria-hidden="true">
                <i class="fa fa-angle-left"></i>
            </span>
            </a>
            <a class="carousel-control-next" href="#bannerCarousole" role="button" data-slide="next">
            <span class="slider-mover-right" aria-hidden="true">
                <i class="fa fa-angle-right"></i>
            </span>
            </a>
        </div>
        <div class="container search-options-btn-area">
            <a class="search-options-btn d-lg-none d-xl-none">
                <div class="search-options d-none d-xl-block d-lg-block">Search Options</div>
                <div class="icon"><i class="fa fa-chevron-up"></i></div>
            </a>
        </div>
    </div>
    <!-- Banner end -->

    <!-- Search Section start -->
    <div class="search-section search-area pb-hediin-12 bg-grea animated fadeInDown" id="search-style-1">
        <div class="container">
            <div class="search-section-area">
                <div class="search-area-inner">
                    <div class="search-contents">
                        <form method="GET">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="any-status">
                                            <option>Any Status</option>
                                            <option>For Rent</option>
                                            <option>For Sale</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="all-type">
                                            <option>All Type</option>
                                            <option>Apartments</option>
                                            <option>Shop</option>
                                            <option>Restaurant</option>
                                            <option>Villa</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="bedrooms">
                                            <option>Bedrooms</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="bathrooms">
                                            <option>Bathrooms</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="location">
                                            <option>location</option>
                                            <option>United States</option>
                                            <option>American Samoa</option>
                                            <option>Belgium</option>
                                            <option>Canada</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <button class="search-button">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Section end -->

    <!-- Featured Properties start -->
    <div class="featured-properties content-area">
        <div class="container">
            <!-- Main title -->
            <div class="main-title">
                <h1>Featured Properties</h1>
                <p>Find your properties in your city</p>
            </div>
            <!-- Slick slider area start -->
            <div class="slick-slider-area">
                <div class="row slick-carousel" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                    @foreach($featured_apartments as $apartment)
                        <div class="slick-slide-item">
                            <div class="property-box">
                                <div class="property-thumbnail">
                                    <a href="{{ route('apartment/show', $apartment->id) }}" class="property-img">
                                        <div class="listing-badges">
                                            <span class="featured">Featured</span>
                                        </div>
                                        <div class="price-box"><span>{{ $apartment->rent }} {{ __('DKK') }}</span> {{ __('Per month') }}</div>
                                        <img class="d-block w-100" src="{{ URL::asset($apartment->getMedia('main')->first()->getUrl('grid-size')) }}" alt="properties">
                                    </a>
                                </div>
                                <div class="detail">
                                    <h1 class="title">
                                        <a href="{{ route('apartment/show', $apartment->id) }}">{{ $apartment->title }}</a>
                                    </h1>

                                    <div class="location">
                                        <a href="properties-details.html">
                                            <i class="flaticon-pin"></i> {{ $apartment->address }} , pcode , {{ $apartment->getCity->name }}
                                        </a>
                                    </div>
                                </div>
                                <ul class="facilities-list clearfix">
                                    <li>
                                        <span>{{ __('Area') }}</span> ?
                                    </li>
                                    <li>
                                        <span>{{ __('Bedrooms') }}</span> ?
                                    </li>
                                    <li>
                                        <span>{{ __('Bathrooms') }}</span> ?
                                    </li>
                                    <li>
                                        <span>{{ __('Garage') }}</span> ?
                                    </li>
                                </ul>
                                <div class="footer">
                                    {{ __('Type') }}: {{ $apartment->apartmentType->name }}
                                    <span>
                                <i class="flaticon-calendar"></i>5 Days ago
                            </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="slick-prev slick-arrow-buton">
                    <i class="fa fa-angle-left"></i>
                </div>
                <div class="slick-next slick-arrow-buton">
                    <i class="fa fa-angle-right"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured Properties end -->

    <!-- Services start -->
    <div class="services content-area bg-grea-3">
        <div class="container">
            <!-- Main title -->
            <div class="main-title text-center">
                <h1>Working with the Reality</h1>
                <p>Who you work with matters</p>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                    <div class="service-info">
                        <div class="icon">
                            <i class="flaticon-user"></i>
                        </div>
                        <h3>Personalized Service</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                    <div class="service-info">
                        <div class="icon">
                            <i class="flaticon-apartment-1"></i>
                        </div>
                        <h3>Luxury Real Estate Experts</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 d-none d-xl-block d-lg-block">
                    <div class="service-info">
                        <div class="icon">
                            <i class="flaticon-discount"></i>
                        </div>
                        <h3>Modern Building For Rent $ Sell</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services end -->

    <!-- Categories strat -->
    <div class="categories content-area-7">
        <div class="container">
            <!-- Main title -->
            <div class="main-title text-center">
                <h1>Most Popular Places</h1>
                <p>Find Your Properties In Your City</p>
            </div>
            <div class="row">
                <div class="col-lg-5 col-md-12 col-sm-12 col-pad">
                    <div class="category">
                        <div class="category_bg_box category_long_bg cat-4-bg">
                            <div class="category-overlay">
                                <div class="category-content">
                                    <h3 class="category-title">
                                        <a href="#">Apartment</a>
                                    </h3>
                                    <h4 class="category-subtitle">12 Properties</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-sm-6 col-pad">
                            <div class="category">
                                <div class="category_bg_box cat-1-bg">
                                    <div class="category-overlay">
                                        <div class="category-content">
                                            <h3 class="category-title">
                                                <a href="properties-list-rightside.html">Form</a>
                                            </h3>
                                            <h4 class="category-subtitle">27 Properties</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-pad">
                            <div class="category">
                                <div class="category_bg_box cat-2-bg">
                                    <div class="category-overlay">
                                        <div class="category-content">
                                            <h3 class="category-title">
                                                <a href="#">House</a>
                                            </h3>
                                            <h4 class="category-subtitle">98 Properties</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-pad">
                            <div class="category">
                                <div class="category_bg_box cat-3-bg">
                                    <div class="category-overlay">
                                        <div class="category-content">
                                            <h3 class="category-title">
                                                <a href="#">Villa</a>
                                            </h3>
                                            <h4 class="category-subtitle">98 Properties</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-pad">
                            <div class="category">
                                <div class="category_bg_box cat-5-bg">
                                    <div class="category-overlay">
                                        <div class="category-content">
                                            <h3 class="category-title">
                                                <a href="#">Restaurant</a>
                                            </h3>
                                            <h4 class="category-subtitle">98 Properties</h4>
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
    <!-- Categories end -->

    <!-- Counters strat -->
    <div class="counters overview-bgi">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="counter-box">
                        <i class="flaticon-sale"></i>
                        <h1 class="counter">967</h1>
                        <p>Listings For Sale</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="counter-box">
                        <i class="flaticon-rent"></i>
                        <h1 class="counter">1276</h1>
                        <p>Listings For Rent</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="counter-box">
                        <i class="flaticon-user"></i>
                        <h1 class="counter">396</h1>
                        <p>Agents</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="counter-box">
                        <i class="flaticon-work"></i>
                        <h1 class="counter">177</h1>
                        <p>Brokers</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Counters end -->

    <!-- Our team start -->
    <div class="our-team content-area">
        <div class="container">
            <!-- Main title -->
            <div class="main-title">
                <h1>Our Agent</h1>
                <p>We have professional agents</p>
            </div>
            <!-- Slick slider area start -->
            <div class="slick-slider-area">
                <div class="row slick-carousel" data-slick='{"slidesToShow": 2, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                    <div class="slick-slide-item">
                        <div class="row team-2">
                            <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-pad">
                                <div class="photo">
                                    <img src="http://placehold.it/225x268" alt="avatar-10" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-pad bg align-self-center">
                                <div class="detail">
                                    <h4>
                                        <a href="agent-detail.html">Karen Paran</a>
                                    </h4>
                                    <h5>Office Manager</h5>
                                    <div class="contact">
                                        <ul>
                                            <li>
                                                <i class="flaticon-pin"></i><a>44 New Design Street,</a>
                                            </li>
                                            <li>
                                                <i class="flaticon-mail"></i><a href="mailto:info@themevessel.com">info@themevessel.com</a>
                                            </li>
                                            <li>
                                                <i class="flaticon-phone"></i><a href="tel:+554XX-634-7071"> +55 4XX-634-7071</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <ul class="social-list clearfix">
                                        <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slick-slide-item">
                        <div class="row team-2">
                            <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-pad">
                                <div class="photo">
                                    <img src="http://placehold.it/225x268" alt="avatar-9" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-pad bg align-self-center">
                                <div class="detail">
                                    <h4>
                                        <a href="agent-detail.html">Eliane Pereira</a>
                                    </h4>
                                    <h5>Creative Director</h5>
                                    <div class="contact">
                                        <ul>
                                            <li>
                                                <i class="flaticon-pin"></i><a>44 New Design Street,</a>
                                            </li>
                                            <li>
                                                <i class="flaticon-mail"></i><a href="mailto:info@themevessel.com">info@themevessel.com</a>
                                            </li>
                                            <li>
                                                <i class="flaticon-phone"></i><a href="tel:+554XX-634-7071"> +55 4XX-634-7071</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <ul class="social-list clearfix">
                                        <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slick-slide-item">
                        <div class="row team-2">
                            <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-pad">
                                <div class="photo">
                                    <img src="http://placehold.it/225x268" alt="avatar-10" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-pad bg align-self-center">
                                <div class="detail">
                                    <h4>
                                        <a href="agent-detail.html">Karen Paran</a>
                                    </h4>
                                    <h5>Office Manager</h5>
                                    <div class="contact">
                                        <ul>
                                            <li>
                                                <i class="flaticon-pin"></i><a>44 New Design Street,</a>
                                            </li>
                                            <li>
                                                <i class="flaticon-mail"></i><a href="mailto:info@themevessel.com">info@themevessel.com</a>
                                            </li>
                                            <li>
                                                <i class="flaticon-phone"></i><a href="tel:+554XX-634-7071"> +55 4XX-634-7071</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <ul class="social-list clearfix">
                                        <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slick-slide-item">
                        <div class="row team-2">
                            <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-pad">
                                <div class="photo">
                                    <img src="http://placehold.it/225x268" alt="avatar-9" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-pad bg align-self-center">
                                <div class="detail">
                                    <h4>
                                        <a href="agent-detail.html">Eliane Pereira</a>
                                    </h4>
                                    <h5>Creative Director</h5>
                                    <div class="contact">
                                        <ul>
                                            <li>
                                                <i class="flaticon-pin"></i><a>44 New Design Street,</a>
                                            </li>
                                            <li>
                                                <i class="flaticon-mail"></i><a href="mailto:info@themevessel.com">info@themevessel.com</a>
                                            </li>
                                            <li>
                                                <i class="flaticon-phone"></i><a href="tel:+554XX-634-7071"> +55 4XX-634-7071</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <ul class="social-list clearfix">
                                        <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-prev slick-arrow-buton">
                    <i class="fa fa-angle-left"></i>
                </div>
                <div class="slick-next slick-arrow-buton">
                    <i class="fa fa-angle-right"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- Our team end -->

    <!-- Blog start -->
    <div class="blog content-area-3">
        <div class="container">
            <!-- Main title -->
            <div class="main-title">
                <h1>Our Blog</h1>
                <p>Check out some recent news posts.</p>
            </div>
            <!-- Slick slider area start -->
            <div class="slick-slider-area">
                <div class="row slick-carousel" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                    <div class="slick-slide-item">
                        <div class="blog-3">
                            <div class="blog-photo">
                                <img src="http://placehold.it/350x218" alt="blog" class="img-fluid">
                                <div class="date-box">
                                    <span>27</span>Feb
                                </div>
                            </div>
                            <div class="detail">
                                <h3>
                                    <a href="blog-single-sidebar-right.html">Find Your Dream Real Estate</a>
                                </h3>
                                <div class="post-meta">
                                    <span><a href="#"><i class="flaticon-people"></i>Amdin</a></span>
                                    <span><a href="#"><i class="flaticon-comment"></i>27</a></span>
                                    <span><a href="#"><i class="fa fa-heart-o"></i>27</a></span>
                                </div>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                            </div>
                        </div>
                    </div>
                    <div class="slick-slide-item">
                        <div class="blog-3">
                            <div class="blog-photo">
                                <img src="http://placehold.it/350x218" alt="blog" class="img-fluid">
                                <div class="date-box">
                                    <span>27</span>Feb
                                </div>
                            </div>
                            <div class="detail">
                                <h3>
                                    <a href="blog-single-sidebar-right.html">Selling Your Real House</a>
                                </h3>
                                <div class="post-meta">
                                    <span><a href="#"><i class="flaticon-people"></i>Amdin</a></span>
                                    <span><a href="#"><i class="flaticon-comment"></i>27</a></span>
                                    <span><a href="#"><i class="fa fa-heart-o"></i>27</a></span>
                                </div>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                            </div>
                        </div>
                    </div>
                    <div class="slick-slide-item">
                        <div class="blog-3">
                            <div class="blog-photo">
                                <img src="http://placehold.it/350x218" alt="blog" class="img-fluid">
                                <div class="date-box">
                                    <span>27</span>Feb
                                </div>
                            </div>
                            <div class="detail">
                                <h3>
                                    <a href="blog-single-sidebar-right.html">Buying a Best House</a>
                                </h3>
                                <div class="post-meta">
                                    <span><a href="#"><i class="flaticon-people"></i>Amdin</a></span>
                                    <span><a href="#"><i class="flaticon-comment"></i>27</a></span>
                                    <span><a href="#"><i class="fa fa-heart-o"></i>27</a></span>
                                </div>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                            </div>
                        </div>
                    </div>
                    <div class="slick-slide-item">
                        <div class="blog-3">
                            <div class="blog-photo">
                                <img src="http://placehold.it/350x218" alt="blog" class="img-fluid">
                                <div class="date-box">
                                    <span>27</span>Feb
                                </div>
                            </div>
                            <div class="detail">
                                <h3>
                                    <a href="blog-single-sidebar-right.html">Buying a Best House</a>
                                </h3>
                                <div class="post-meta">
                                    <span><a href="#"><i class="flaticon-people"></i>Amdin</a></span>
                                    <span><a href="#"><i class="flaticon-comment"></i>27</a></span>
                                    <span><a href="#"><i class="fa fa-heart-o"></i>27</a></span>
                                </div>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-prev slick-arrow-buton">
                    <i class="fa fa-angle-left"></i>
                </div>
                <div class="slick-next slick-arrow-buton">
                    <i class="fa fa-angle-right"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog end -->

    <!-- Partners strat -->
    <div class="partners">
        <div class="container">
            <div class="slick-slider-area">
                <div class="row slick-carousel" data-slick='{"slidesToShow": 5, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 3}}, {"breakpoint": 768,"settings":{"slidesToShow": 2}}]}'>
                    <div class="slick-slide-item"><img src="http://placehold.it/160x80" alt="brand" class="img-fluid"></div>
                    <div class="slick-slide-item"><img src="http://placehold.it/160x80" alt="brand" class="img-fluid"></div>
                    <div class="slick-slide-item"><img src="http://placehold.it/160x80" alt="brand" class="img-fluid"></div>
                    <div class="slick-slide-item"><img src="http://placehold.it/160x80" alt="brand" class="img-fluid"></div>
                    <div class="slick-slide-item"><img src="http://placehold.it/160x80" alt="brand" class="img-fluid"></div>
                    <div class="slick-slide-item"><img src="http://placehold.it/160x80" alt="brand" class="img-fluid"></div>
                    <div class="slick-slide-item"><img src="http://placehold.it/160x80" alt="brand" class="img-fluid"></div>
                    <div class="slick-slide-item"><img src="http://placehold.it/160x80" alt="brand" class="img-fluid"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partners end -->

    <!-- Footer start -->
    <footer class="footer">
        <div class="container footer-inner">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                    <div class="footer-item clearfix">
                        <img src="img/logos/logo.png" alt="logo" class="f-logo">
                        <div class="text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-item">
                        <h4>Contact Us</h4>
                        <div class="f-border"></div>
                        <ul class="contact-info">
                            <li>
                                <i class="flaticon-pin"></i>20/F Green Road, Dhanmondi, Dhaka
                            </li>
                            <li>
                                <i class="flaticon-mail"></i><a href="mailto:sales@hotelempire.com">info@themevessel.com</a>
                            </li>
                            <li>
                                <i class="flaticon-phone"></i><a href="tel:+55-417-634-7071">+0477 85X6 552</a>
                            </li>
                            <li>
                                <i class="flaticon-fax"></i>+0477 85X6 552
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-item">
                        <h4>
                            Useful Links
                        </h4>
                        <div class="f-border"></div>
                        <ul class="links">
                            <li>
                                <a href="#">Home</a>
                            </li>
                            <li>
                                <a href="about.html">About Us</a>
                            </li>
                            <li>
                                <a href="services.html">Services</a>
                            </li>
                            <li>
                                <a href="contact.html">Contact Us</a>
                            </li>
                            <li>
                                <a href="dashboard.html">Dashboard</a>
                            </li>
                            <li>
                                <a href="properties-details.html">Properties Details</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-item clearfix">
                        <h4>Subscribe</h4>
                        <div class="f-border"></div>
                        <div class="Subscribe-box">
                            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
                            <form class="form-inline" action="#" method="GET">
                                <input type="text" class="form-control mb-sm-0" id="inlineFormInputName3" placeholder="Email Address">
                                <button type="submit" class="btn"><i class="fa fa-paper-plane"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer end -->

    <!-- Sub footer start -->
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <p class="copy">© 2018 <a href="#">Theme Vessel.</a> Trademarks and brands are the property of their respective owners.</p>
                </div>
                <div class="col-lg-4 col-md-4">
                    <ul class="social-list clearfix">
                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" class="rss"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Sub footer end -->

    <!-- Full Page Search -->
    <div id="full-page-search">
        <button type="button" class="close">×</button>
        <form action="index.html#">
            <input type="search" value="" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-sm button-theme">Search</button>
        </form>
    </div>
@endsection
