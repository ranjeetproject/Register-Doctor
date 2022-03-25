<div class="col-lg-3 max-nav-width">
  <button class="btn sider-bar-toggle"><i class="fas fa-bars"></i> Open Sidebar Menu </button>
  <ul class="left-nav">
    <li class="active"><a href="{{ route('doctor.dashboard')}}"><img src="{{ asset('public/images/frontend/images/icon1.png') }}" alt="">Dashboard</a></li>

    <li><a href="{{ route('doctor.profile')}}"><img src="{{ asset('public/images/frontend/images/icon2.png') }}" alt="">Manage Profile </a></li>

    <li><a href="{{ route('doctor.handy-document')}}"><img src="{{ asset('public/images/frontend/images/icon12.png') }}" alt="">Handy Documents</a></li>

    <li><a href="{{ route('doctor.get-thumbs-up')}}"><img src="{{ asset('public/images/frontend/images/icon13.png') }}" alt="">How to Get Thumbs Up</a></li>

    <li><a href="{{ route('doctor.appointment')}}"><img src="{{ asset('public/images/frontend/images/icon11.png') }}" alt="">Appointments ({{($doctorAppointmentNotification)?$doctorAppointmentNotification:0}})</a></li>

    <li><a href="{{ route('doctor.send-patient-message')}}"><img src="{{ asset('public/images/frontend/images/icon5.png') }}" alt="">Send Patient Message</a></li>

    <li><a href="{{ route('doctor.create-prescription')}}"><img src="{{ asset('public/images/frontend/images/icon3.png') }}" alt="">Create Prescription ({{($doctorCreatePrescriptionNotification)?$doctorCreatePrescriptionNotification:0}})</a></li>

    <li><a href="{{ route('doctor.prescription-issues')}}"><img src="{{ asset('public/images/frontend/images/icon4.png') }}" alt="">Prescriptions Issued</a></li>

    <li><a href="{{ route('doctor.close-cases')}}"><img src="{{ asset('public/images/frontend/images/icon8.png') }}" alt="">Closed Cases</a></li>
    
    <li><a href="{{ route('doctor.payment-history')}}"><i class="fas fa-history"></i> Payment History</a></li>
  </ul>
  <div class="sidebar-menu-overlay"></div>
</div>

