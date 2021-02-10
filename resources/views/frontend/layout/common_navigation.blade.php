<nav class="navbar navbar-expand-lg navbar-light  men-menu">
    <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('public/images/frontend/images/logo.jpg') }}" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto justify-content-end">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('news') }}">News</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">FAQ </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('contactUs') }}">Contact Us</a>
        </li>

        @auth
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Sign Out
            </a>
          </li>
            <form id="logout-form" action="{{route('logout')}}" method="POST"
                    style="display: none;">
                @csrf
            </form>
          <li class="nav-item">
          <a class="nav-link" href="#">Dashboard</a>
          </li>
        @else
          <li class="nav-item">
            <a href="{{route('login')}}"> Login</a>
          </li>
          <li class="nav-item">
            <a href="{{route('registration')}}">Registration</a>
          </li>
          @endauth
      </ul>
    </div>
</nav>