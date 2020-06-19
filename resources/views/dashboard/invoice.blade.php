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
                  <div class="col-sm-12 col-md-6"><h4>{{ __('Detail Invoice') }}</h4></div>
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
              <div id="ajaxInvoices">
                <table class="table">
                  <tr>
                    <td>ID</td>
                    <td>{{$data['invoice_id']}}</td>
                  </tr>
                  <tr>
                    <td>Text</td>
                    <td>{{$data['invoice_text']}}</td>
                  </tr>
                  <tr>
                    <td>Amount</td>
                    <td>{{$data['invoice_amount']}}</td>
                  </tr>
                  <tr>
                    <td>Amount_ex_vat</td>
                    <td>{{$data['invoice_amount_ex_vat']}}</td>
                  </tr>
                  <tr>
                    <td>Amount_vat</td>
                    <td>{{$data['invoice_amount_vat']}}</td>
                  </tr>
                  <tr>
                    <td>Qunatity</td>
                    <td>{{$data['invoice_quantity']}}</td>
                  </tr>
                  <tr>
                    <td>Plan</td>
                    <td>{{$data['invoice_plan_id']}}</td>
                  </tr>
                  <tr>
                    <td>State</td>
                    <td>{{$data['invoice_state']}}</td>
                  </tr>
                </table>
              </div>
            </div>
            @include('includes.dashboard.footer')
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
