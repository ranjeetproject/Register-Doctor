<nav class="navbar navbar-expand-lg navbar-light  men-menu">
  <a class="navbar-brand" href="{{ route('home')}}"><img src="{{ asset('public/images/frontend/images/logo.jpg') }}" alt=""></a>
  <div class="log-user-details">
      <form>
          <label>choose profile : </label> <select onchange="changeAccount(this.value)">
              <option value="{{Session::get('parent_id')}}">Myself</option>
              @foreach(getChild() as $child)
              <option value="{{$child->childDetails->id}}" {{(Auth::guard('sitePatient')->user()->id == $child->childDetails->id) ? 'selected':''}}>{{$child->childDetails->name}}</option>
              @endforeach

            </select>
      </form>
      <a href="#" class="for-email">{{Auth::user()->email}}</a>
      <div class="profile-nav-img"><img src="{{ asset('public/images/frontend/images/profile-pic.jpg') }}" alt="" ><span>{{Auth::user()->name}}</span></div>
      <div class="ser-log">
        {{-- <a class="ser-log-list" href="#"><i class="fal fa-search"></i></a> --}}
        <a class="ser-log-list" data-toggle="tooltip" title="Logout" href="{{ route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><img src="{{ asset('public/images/frontend/images/prof-logout.png') }}" alt=""></a>
        <form id="logout-form" action="{{route('logout')}}" method="POST"style="display: none;">
          @csrf
        </form>
        <a class="ser-log-list h-notifications-btn" data-toggle="tooltip" title="Notifications" href="#"><img src="{{ asset('public/images/frontend/images/notification-icon.png') }}" alt=""><span>2</span></a>
      </div>
  </div>
</nav>