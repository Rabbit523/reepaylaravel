@extends('layouts.default')
@section('content')

    @include('includes.dashboard.header')

    <!-- Dashbord start -->
    <div class="dashboard">
        <div class="container-fluid">
            <div class="row">
                @include('includes.dashboard.dashboard')
                <div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                    <div class="content-area5">
                        <div class="dashboard-content">
                            <div class="dashboard-header clearfix">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6"><h4>My Profile</h4></div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="breadcrumb-nav">
                                            <ul>
                                                <li>
                                                    <a href="{{ route('home') }}">Index</a>
                                                </li>
                                                <li>
                                                    <a href="#">Dashboard</a>
                                                </li>
                                                <li class="active">My Profile</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    @if ($errors->any())
                                        <div class="col-lg-12">
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endif

                                    @if(session()->has('message'))
                                        <div class="col-lg-12">
                                            <div class="alert alert-success">
                                                {{ session()->get('message') }}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="dashboard-list">
                                <h3 class="heading">Profile Details</h3>
                                <div class="dashboard-message contact-2 bdr clearfix">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <form action="{{ route('dashboard/profile/save') }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <label>{{ __('Firstname') }}</label>
                                                            <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="{{ __('Your firstname') }}" value="{{ old('first_name') ?? $user->first_name }}">
                                                            @error('first_name')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group email">
                                                            <label>{{ __('Lastname') }}</label>
                                                            <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="{{ __('Your lastname') }}" value="{{ old('last_name') ?? $user->last_name }}">
                                                            @error('last_name')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group subject">
                                                            <label>{{ __('Phone') }}</label>
                                                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="{{ __('Your phone number') }}" value="{{ old('phone') ?? $user->phone }}">
                                                            @error('phone')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group number">
                                                            <label>{{ __('Email') }}</label>
                                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Your email') }}" value="{{ old('email') ?? $user->email }}">
                                                            @error('email')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group number">
                                                            <label>{{ __('Address') }}</label>
                                                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="{{ __('Your address') }}" value="{{ old('address') ?? $user->address }}">
                                                            @error('address')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group number">
                                                            <label>{{ __('Postal Code') }}</label>
                                                            <input type="text" name="postal_code" class="form-control @error('postal_code') is-invalid @enderror" placeholder="{{ __('Your postal code') }}" value="{{ old('postal_code') ?? $user->postal_code }}">
                                                            @error('postal_code')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group number">
                                                            <label>{{ __('City') }}</label>
                                                            <select name="city" class="form-control @error('city') is-invalid @enderror" placeholder="{{ __('Your city') }}">
                                                                @foreach($cities as $city)
                                                                    <option value="{{ $city->id }}"
                                                                            @if($city->id === $user->city)
                                                                                selected
                                                                            @endif
                                                                    >{{ $city->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('city')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="form-group message">
                                                            <label>{{ __('Personal Bio') }}</label>
                                                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="{{ __('Personal Bio') }}">{{ old('description') ?? $user->description }}</textarea>
                                                            @error('description')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="send-btn">
                                                    <button type="submit" class="btn btn-md button-theme">{{ __('Save Profile') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="dashboard-list">
                                        <h3 class="heading">{{ __('Change Password') }}</h3>
                                        <div class="dashboard-message contact-2">
                                            <form action="{{ route('dashboard/password/save') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    @if(!$user->password_autogenerated)
                                                        <div class="col-lg-12">
                                                            <div class="form-group name">
                                                                <label>Current Password</label>
                                                                <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" placeholder="{{ __('Current Password') }}" value="{{ old('current_password') }}">
                                                                @error('current_password')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="col-lg-12">
                                                        <div class="form-group email">
                                                            <label>New Password</label>
                                                            <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" placeholder="{{ __('New Password') }}" value="{{ old('new_password') }}">
                                                            @error('new_password')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group subject">
                                                            <label>Confirm New Password</label>
                                                            <input type="password" name="confirm_new_password" class="form-control @error('confirm_new_password') is-invalid @enderror" placeholder="{{ __('Confirm New Password') }}" value="{{ old('confirm_new_password') }}">
                                                            @error('confirm_new_password')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="send-btn">
                                                            <button type="submit" class="btn btn-md button-theme">{{ __('Change Password') }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
{{--                                <div class="col-md-6">--}}
{{--                                    <div class="dashboard-list">--}}
{{--                                        <h3 class="heading">Socials</h3>--}}
{{--                                        <div class="dashboard-message contact-2">--}}
{{--                                            <form action="#" method="GET" enctype="multipart/form-data">--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-lg-12">--}}
{{--                                                        <div class="form-group name">--}}
{{--                                                            <label>Facebook</label>--}}
{{--                                                            <input type="text" name="facebook" class="form-control" placeholder="https://www.facebook.com">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-lg-12">--}}
{{--                                                        <div class="form-group email">--}}
{{--                                                            <label>Twitter</label>--}}
{{--                                                            <input type="text" name="twitter" class="form-control" placeholder="https://twitter.com">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-lg-12">--}}
{{--                                                        <div class="form-group subject">--}}
{{--                                                            <label>Vkontakte</label>--}}
{{--                                                            <input type="text" name="vkontakte" class="form-control" placeholder="vk.com">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-lg-12">--}}
{{--                                                        <div class="form-group number">--}}
{{--                                                            <label>Whatsapp</label>--}}
{{--                                                            <input type="email" name="whatsapp" class="form-control" placeholder="https://www.whatsapp.com">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-lg-12">--}}
{{--                                                        <div class="send-btn">--}}
{{--                                                            <button type="submit" class="btn btn-md button-theme">Send Changes</button>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                        @include('includes.dashboard.footer')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
