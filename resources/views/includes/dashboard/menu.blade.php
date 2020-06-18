<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto d-lg-none d-xl-none">
{{--        <li class="nav-item dropdown">--}}
{{--            <a href="dashboard.html" class="nav-link">Dashboard</a>--}}
{{--        </li>--}}
{{--        <li class="nav-item dropdown">--}}
{{--            <a href="messages.html" class="nav-link">Messages</a>--}}
{{--        </li>--}}
{{--        <li class="nav-item dropdown">--}}
{{--            <a href="bookings.html" class="nav-link">Bookings</a>--}}
{{--        </li>--}}
{{--        <li class="nav-item dropdown">--}}
{{--            <a href="my-properties.html" class="nav-link">My Properties</a>--}}
{{--        </li>--}}
{{--        <li class="nav-item dropdown">--}}
{{--            <a href="my-invoices.html" class="nav-link">My Invoices</a>--}}
{{--        </li>--}}
{{--        <li class="nav-item dropdown">--}}
{{--            <a href="favorited-properties.html" class="nav-link">Favorited Properties</a>--}}
{{--        </li>--}}
{{--        <li class="nav-item dropdown">--}}
{{--            <a href="submit-property.html" class="nav-link">Submit Property</a>--}}
{{--        </li>--}}
        <li class="nav-item dropdown active">
            <a href="{{ route('dashboard/profile') }}" class="nav-link">My Profile</a>
        </li>
        <li class="nav-item dropdown">
            <a href="index.html" class="nav-link">Logout</a>
        </li>
    </ul>
    <div class="navbar-buttons ml-auto d-none d-xl-block d-lg-block">
        <ul>
            <li>
                <div class="dropdown btns">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        @if(Auth::user()->getMedia('profile')->first())
                            <img src="{{ URL::asset($user->getMedia('profile')->first()->getUrl('dashboard')) }}" alt="avatar">
                        @else
                            <img src="https://secure.gravatar.com/avatar/{{ md5(Auth::user()->email) }}?size=512" alt="avatar">
                        @endif
                        {{ Auth::user()->first_name }}

                    </a>
                    <div class="dropdown-menu">
{{--                        <a class="dropdown-item" href="dashboard.html">Dashboard</a>--}}
{{--                        <a class="dropdown-item" href="messages.html">Messages</a>--}}
{{--                        <a class="dropdown-item" href="bookings.html">Bookings</a>--}}
                        <a class="dropdown-item" href="{{ route('dashboard/profile') }}">My profile</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </li>
            <li>
                <a class="btn btn-theme btn-md" href="submit-property.html">Submit property</a>
            </li>
        </ul>
    </div>
</div>
