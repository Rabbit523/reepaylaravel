<div class="col-lg-3 col-md-12 col-sm-12 col-pad">
    <div class="dashboard-nav d-none d-xl-block d-lg-block">
        <div class="dashboard-inner">
            <h4>Main</h4>
            <ul>
                <li><a href="{{ route('home') }}"><i class="flaticon-apartment-1"></i> Home</a></li>
{{--                <li><a href="dashboard.html"><i class="flaticon-dashboard"></i> Dashboard</a></li>--}}
{{--                <li><a href="messages.html"><i class="flaticon-mail"></i> Messages <span class="nav-tag">6</span></a></li>--}}
{{--                <li><a href="bookings.html"><i class="flaticon-calendar"></i> Bookings</a></li>--}}
{{--            </ul>--}}
{{--            <h4>Listings</h4>--}}
{{--            <ul>--}}
{{--                <li><a href="my-properties.html"><i class="flaticon-apartment-1"></i>My Properties</a></li>--}}
{{--                <li><a href="my-invoices.html"><i class="flaticon-bill"></i>My Invoices</a></li>--}}
{{--                <li><a href="favorited-properties.html"><i class="flaticon-heart"></i>Favorited Properties</a></li>--}}
{{--                <li><a href="submit-property.html"><i class="flaticon-plus"></i>Submit Property</a></li>--}}
            </ul>
            <h4>Account</h4>
            <ul>
                <li class="active"><a href="{{ route('dashboard/profile') }}"><i class="flaticon-people"></i>My Profile</a></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="flaticon-logout"></i> {{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
            </ul>
            <h4>Subscription</h4>
            <ul>
                <li class="active"><a href="{{ route('dashboard/subscription') }}"><i class="flaticon-plus"></i>My Subscription</a></li>
                <li class="active"><a href="{{ route('dashboard/invoices') }}"><i class="flaticon-plus"></i>Invoices</a></li>
            </ul>
            @if(Auth::user()->hasRoleWithPermission('viewNova'))
                <h4>Administrator</h4>
                <ul>
                    <li><a href="{{ URL::to('/admin') }}">Admin panel</a></li>
                </ul>
            @endif
        </div>
    </div>
</div>
