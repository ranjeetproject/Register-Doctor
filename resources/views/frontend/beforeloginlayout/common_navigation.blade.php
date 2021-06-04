<nav class="navbar navbar-expand-lg navbar-light  men-menu">
    <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('public/images/frontend/images/logo.jpg') }}" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto justify-content-end">
        <li class="nav-item {{ Request::routeIs('home') ? 'active' : '' }} ">
          <a class="nav-link" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item {{ Request::routeIs('aboutUs') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('aboutUs')}}">About Us</a>
        </li>
        <li class="nav-item {{ Request::routeIs('news') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('news') }}">News</a>
        </li>
        <li class="nav-item {{ Request::routeIs('userFaq') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('userFaq')}}">FAQ </a>
        </li>
        <li class="nav-item {{ Request::routeIs('contactUs') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('contactUs') }}">Contact Us</a>
        </li>

        @auth
          <li class="nav-item">
            @if(Auth::guard('siteDoctor')->check())
            <a class="nav-link" href="{{ route('doctor.dashboard')}}">Dashboard</a>
            @elseif(Auth::guard('sitePatient')->check())
            <a class="nav-link" href="{{ route('patient.dashboard')}}">Dashboard</a>
            @elseif(Auth::guard('sitePharmacist')->check())
            <a class="nav-link" href="{{ route('pharmacist.dashboard')}}">Dashboard</a>
            @endif
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Sign Out
            </a>
          </li>
          <form id="logout-form" action="{{route('logout')}}" method="POST"
                  style="display: none;">
              @csrf
          </form>
        @else
          <li class="nav-item {{ Request::routeIs('login') ? 'active' : '' }}">
            <a href="{{route('login')}}" class="nav-link"> Login</a>
          </li>
          <li class="nav-item {{ Request::routeIs('registration') ? 'active' : '' }}">
            <a href="{{route('registration')}}" class="nav-link">Registration</a>
          </li>
          @endauth
      </ul>
    </div>
</nav>