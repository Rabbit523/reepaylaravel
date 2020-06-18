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
                                    <div class="col-sm-12 col-md-6"><h4>{{ __('My Invoices') }}</h4></div>
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
                            @if ($customerSession)
                                <div id="ajaxInvoices"></div>
                            @else
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="alert alert-danger">
                                            {{ __('Your profile seems to be uncompleted. Please fill up the form from the ') }}
                                            <a href="{{ route('dashboard/profile') }}">{{ __('profile') }}</a>
                                            {{ __(' and try again') }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        @include('includes.dashboard.footer')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($customerSession)
    <script src="https://checkout.reepay.com/checkout.js"></script>
    <script type="text/javascript">
        function getInvoices() {
            $.ajax({
                method: 'GET',
                url: '{{ route('ajax/getInvoices/execute') }}',
                success: function (data) {
                    $('#ajaxInvoices').html(data);
                }
            });
        }

        $(document).ready(function () {
            getInvoices();
        });
    </script>
    @endif
@endsection
