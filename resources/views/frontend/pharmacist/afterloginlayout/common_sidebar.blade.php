<div class="col-sm-3 max-nav-width">
<button class="btn sider-bar-toggle"><i class="fas fa-bars"></i> Open Sidebar Menu </button>
  <ul class="left-nav">
      <li class="active"><a href="{{ route('pharmacist.dashboard')}}"><img src="{{ asset('public/images/frontend/images/icon1.png') }}" alt="">Dashboard</a></li>
      <li><a href="{{ route('pharmacist.profile')}}"><img src="{{ asset('public/images/frontend/images/icon2.png') }}" alt="">Manage Profile </a></li>
      <li><a href="#"><img src="{{ asset('public/images/frontend/images/icon3.png') }}" alt="">Accepted Prescriptions</a></li>
      <li><a href="{{ route('pharmacist.opening-hours')}}"><img src="{{ asset('public/images/frontend/images/icon3.png') }}" alt="">Opening Hours</a></li>
      <li><a href="#"><img src="{{ asset('public/images/frontend/images/icon4.png') }}" alt="">Dispensed Prescriptions</a></li>
      <li><a href="#"><img src="{{ asset('public/images/frontend/images/icon5.png') }}" alt="">Message Patient/Doctor</a></li>
  </ul>
</div>