<div class="col-sm-3 max-nav-width">
<button class="btn sider-bar-toggle"><i class="fas fa-bars"></i> Open Sidebar Menu </button>
  <ul class="left-nav">
      <li class="active"><a href="{{ route('patient.dashboard')}}"><img src="{{ asset('public/images/frontend/images/icon1.png') }}" alt="">Dashboard</a></li>
      <li><a href="{{ route('patient.profile')}}"><img src="{{ asset('public/images/frontend/images/icon2.png') }}" alt="">Manage Profile </a></li>

      <li><a href="{{route('patient.medical-record')}}"><img src="{{ asset('public/images/frontend/images/icon3.png') }}" alt="">Medical Record</a></li>

      {{-- <li><a href="{{route('patient.view-childs')}}"><img src="{{ asset('public/images/frontend/images/icon3.png') }}" alt="">Child Account</a></li> --}}

      {{-- <li><a href="{{route('patient.save-cases')}}"><img src="{{ asset('public/images/frontend/images/icon10.png') }}" alt="">Saved Cases</a></li> --}}
      <li><a href="{{route('patient.handy-document')}}"><img src="{{ asset('public/images/frontend/images/icon13.png') }}" alt="">Handy document</a></li>

      <li><a href="{{route('patient.requested-consults')}}"><img src="{{ asset('public/images/frontend/images/icon9.png') }}" alt="">Requested Consults</a></li>

      <li><a href="{{route('patient.closed-cases')}}"><img src="{{ asset('public/images/frontend/images/icon8.png') }}" alt="">Closed Cases </a></li>

      <li><a href="{{route('patient.prescriptions-issued')}}"><img src="{{ asset('public/images/frontend/images/icon4.png') }}" alt="">Prescriptions Issued</a></li>

      <li><a href="{{route('patient.pharmacies')}}"><img src="{{ asset('public/images/frontend/images/icon7.png') }}" alt="">Pharmacies</a></li>

      <li><a href="{{route('patient.my-favorite-doctors')}}"><img src="{{ asset('public/images/frontend/images/icon6.png') }}" alt="">My Favorite Doctors</a></li>
  </ul>
</div>
