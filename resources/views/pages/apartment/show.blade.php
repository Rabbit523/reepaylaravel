@extends('layouts.default')
@section('content')

    @include('includes.header')

    <!-- Sub banner start -->
    <div class="sub-banner overview-bgi" style="background: url('{{ URL::asset($apartment->getMedia('main')->first()->getUrl('banner-top')) }}')">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>{{ $apartment->apartmentType->name }}</h1>
                <ul class="breadcrumbs">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Properties Detail</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Properties details page start -->
    <div class="properties-details-page content-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Heading properties 3 start -->
                    <div class="heading-properties-3">
                        <h1>{{ $apartment->title }}</h1>
                        <div class="mb-30"><span class="rent">{{ __('Rent') }}: {{ $apartment->rent }} {{ __('DKK')  }}</span> <span class="property-price">{{ __('Deposit') }}: {{ $apartment->deposit }} {{ __('DKK')  }}</span> <span class="location"><i class="flaticon-pin"></i>{{ $apartment->address }}, {{ $apartment->getCity->name }}</span></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    @php
                        $picturesCollection = $apartment->getMedia('pictures')
                    @endphp

                    @if(count($picturesCollection))
                    <!-- main slider carousel items -->
                    <div id="propertiesDetailsSlider" class="carousel properties-details-sliders slide mb-40">
                        <div class="carousel-inner">
                            @foreach($picturesCollection as $i => $pictures)
                                <div class="
                                    @if ($i === 0)
                                        active
                                    @endif
                                    item carousel-item" data-slide-number="{{ $i }}">
                                    <img src="{{ URL::asset($pictures->getUrl('medium-size')) }}" class="img-fluid" alt="slider-properties">
                                </div>
                            @endforeach

                            <a class="carousel-control left" href="#propertiesDetailsSlider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                            <a class="carousel-control right" href="#propertiesDetailsSlider" data-slide="next"><i class="fa fa-angle-right"></i></a>

                        </div>
                        <!-- main slider carousel nav controls -->
                        <ul class="carousel-indicators smail-properties list-inline nav nav-justified">

                            @foreach($picturesCollection as $i => $pictures)
                                <li class="list-inline-item
                                @if ($i === 0)
                                    active
                                @endif
                                    ">
                                    <a id="carousel-selector-0" class="selected" data-slide-to="{{ $i }}" data-target="#propertiesDetailsSlider">
                                        <img src="{{ URL::asset($pictures->getUrl('thumb-page')) }}" class="img-fluid" alt="properties-small">
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <!-- main slider carousel items -->
                    </div>
                    @endif

                    <!-- Advanced search start -->
                    <div class="widget-2 advanced-search bg-grea-2 d-lg-none d-xl-none">
                        <h3 class="sidebar-title">Advanced Search</h3>
                        <div class="s-border"></div>
                        <form method="GET">
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="all-status">
                                    <option>All Status</option>
                                    <option>For Sale</option>
                                    <option>For Rent</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="all-type">
                                    <option>All Type</option>
                                    <option>Apartments</option>
                                    <option>Shop</option>
                                    <option>Restaurant</option>
                                    <option>Villa</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="commercial">
                                    <option>Commercial</option>
                                    <option>Residential</option>
                                    <option>Commercial</option>
                                    <option>Land</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="location">
                                    <option>location</option>
                                    <option>United States</option>
                                    <option>American Samoa</option>
                                    <option>Belgium</option>
                                    <option>Canada</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
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
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="bathroom">
                                            <option>Bathroom</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="balcony">
                                            <option>Balcony</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="garage">
                                            <option>Garage</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="range-slider">
                                <label>Area</label>
                                <div data-min="0" data-max="10000" data-min-name="min_area" data-max-name="max_area" data-unit="Sq ft" class="range-slider-ui ui-slider" aria-disabled="false"></div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="range-slider">
                                <label>Price</label>
                                <div data-min="0" data-max="150000"  data-min-name="min_price" data-max-name="max_price" data-unit="USD" class="range-slider-ui ui-slider" aria-disabled="false"></div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group mb-0">
                                <button class="search-button">Search</button>
                            </div>
                        </form>
                    </div>
                    <!-- Properties description start -->
                    <div class="properties-description mb-40">
                        <h3 class="heading-2">
                            {{ __('Description') }}
                        </h3>
                        <p>{{ $apartment->description }}</p>
                    </div>
                    <!-- Properties amenities start -->
                    <div class="properties-amenities mb-40">
                        <h3 class="heading-2">
                            Features
                        </h3>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <ul class="amenities">
                                    <li>
                                        <i class="fa fa-check"></i>Air conditioning
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>Balcony
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>Pool
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>Room service
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>Gym
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <ul class="amenities">
                                    <li>
                                        <i class="fa fa-check"></i>Wifi
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>Parking
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>Double Bed
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>Home Theater
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>Electric
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <ul class="amenities">
                                    <li>
                                        <i class="fa fa-check"></i>Telephone
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>Jacuzzi
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>Alarm
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>Garage
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>Security
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Floor plans start -->
                    <div class="floor-plans mb-50">
                        <h3 class="heading-2">Floor Plans</h3>
                        <table>
                            <tbody><tr>
                                <td><strong>Size</strong></td>
                                <td><strong>Rooms</strong></td>
                                <td><strong>Bathrooms</strong></td>
                                <td><strong>Garage</strong></td>
                            </tr>
                            <tr>
                                <td>1600</td>
                                <td>3</td>
                                <td>2</td>
                                <td>1</td>
                            </tr>
                            </tbody>
                        </table>
                        <img src="http://placehold.it/730x379" alt="floor-plans" class="img-fluid">
                    </div>
                    <!-- Location start -->
                    <div class="location mb-50">
                        <div class="map">
                            <h3 class="heading-2">Property Location</h3>
                            <div id="map" class="contact-map"></div>
                        </div>
                    </div>

                    <!-- Similar Properties start -->
                    <h3 class="heading-2">Similar Properties</h3>
                    <div class="row similar-properties">
                        <div class="col-md-6">
                            <div class="property-box">
                                <div class="property-thumbnail">
                                    <a href="properties-details.html" class="property-img">
                                        <div class="listing-badges">
                                            <span class="featured">Featured</span>
                                        </div>
                                        <div class="price-box"><span>$850.00</span> Per Month</div>
                                        <img class="d-block w-100" src="http://placehold.it/330x220" alt="properties">
                                    </a>
                                </div>
                                <div class="detail">
                                    <h1 class="title">
                                        <a href="properties-details.html">Real Luxury Villa</a>
                                    </h1>

                                    <div class="location">
                                        <a href="properties-details.html">
                                            <i class="flaticon-pin"></i>123 Kathal St. Tampa City,
                                        </a>
                                    </div>
                                </div>
                                <ul class="facilities-list clearfix">
                                    <li>
                                        <span>Area</span>3600 Sqft
                                    </li>
                                    <li>
                                        <span>Beds</span> 3
                                    </li>
                                    <li>
                                        <span>Baths</span> 2
                                    </li>
                                    <li>
                                        <span>Garage</span> 1
                                    </li>
                                </ul>
                                <div class="footer">
                                    <a href="#">
                                        <i class="flaticon-people"></i> Jhon Doe
                                    </a>
                                    <span>
                                <i class="flaticon-calendar"></i>5 Days ago
                            </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="property-box">
                                <div class="property-thumbnail">
                                    <a href="properties-details.html" class="property-img">
                                        <div class="listing-badges">
                                            <span class="featured">Featured</span>
                                        </div>
                                        <div class="price-box"><span>$850.00</span> Per Month</div>
                                        <img class="d-block w-100" src="http://placehold.it/330x220" alt="properties">
                                    </a>
                                </div>
                                <div class="detail">
                                    <h1 class="title">
                                        <a href="properties-details.html">Modern Family Home</a>
                                    </h1>

                                    <div class="location">
                                        <a href="properties-details.html">
                                            <i class="flaticon-pin"></i>123 Kathal St. Tampa City,
                                        </a>
                                    </div>
                                </div>
                                <ul class="facilities-list clearfix">
                                    <li>
                                        <span>Area</span>3600 Sqft
                                    </li>
                                    <li>
                                        <span>Beds</span> 3
                                    </li>
                                    <li>
                                        <span>Baths</span> 2
                                    </li>
                                    <li>
                                        <span>Garage</span> 1
                                    </li>
                                </ul>
                                <div class="footer">
                                    <a href="#">
                                        <i class="flaticon-people"></i> Jhon Doe
                                    </a>
                                    <span>
                                <i class="flaticon-calendar"></i>5 Days ago
                            </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="sidebar-right">
                        @include('includes.sidebar.search')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
