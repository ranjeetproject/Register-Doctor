<nav class="navbar navbar-expand-lg navbar-light  men-menu">
  <a class="navbar-brand" href="{{ route('home')}}"><img src="{{ asset('public/images/frontend/images/logo.jpg') }}" alt=""></a>
  <div class="log-user-details">
    <a href="#" class="for-email">{{Auth::user()->email}}</a>
    <div class="profile-nav-img"><img src="{{ asset('public/images/frontend/images/profile-pic.jpg') }}" alt="" ><span>{{Auth::user()->name}}</span></div>
    <div class="ser-log">
      <a class="ser-log-list" href="#"><i class="fal fa-search"></i></a>
      <a class="ser-log-list" href="{{ route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><img src="{{ asset('public/images/frontend/images/prof-logout.png') }}" alt=""></a>
      <form id="logout-form" action="{{route('logout')}}" method="POST"style="display: none;">
        @csrf
      </form>
    </div>
  </div>
</nav>