<div class="col-sm-3 max-nav-width">
  <button class="btn sider-bar-toggle"><i class="fas fa-bars"></i> Open Sidebar Menu </button>
  <ul class="left-nav">
      <li class="active"><a href="{{ route('pharmacist.dashboard')}}"><img src="{{ asset('public/images/frontend/images/icon1.png') }}" alt="">Dashboard</a></li>
      <li><a href="{{ route('pharmacist.profile')}}"><img src="{{ asset('public/images/frontend/images/icon2.png') }}" alt="">Manage Profile </a></li>
      <li><a href="{{ route('pharmacist.handy-document')}}"><img src="{{ asset('public/images/frontend/images/icon13.png') }}" alt="">Handy document </a></li>
      <li><a href="{{ route('pharmacist.accepted-priscription')}}"><img src="{{ asset('public/images/frontend/images/icon3.png') }}" alt="">Accepted Prescriptions</a></li>
      <li><a href="{{ route('pharmacist.opening-hours')}}"><img src="{{ asset('public/images/frontend/images/icon3.png') }}" alt="">Opening Hours</a></li>
      <li><a href="{{ route('pharmacist.dispensed-prescriptions')}}"><img src="{{ asset('public/images/frontend/images/icon4.png') }}" alt="">Dispensed Prescriptions</a></li>
      <li><a href="#"><img src="{{ asset('public/images/frontend/images/icon5.png') }}" alt="">Message Patient/Doctor</a></li>
  </ul>
  <div class="availability-card-box">
    <h4>Availability</h4>
    <div class="form-group">
      <div class="datePicker-input-field">
          <input class="form-control" id="availabilityDatepicker" type="text" name="" placeholder="Select Date" readonly/>
      </div>
    </div>
    <div class="form-group a-check-field">
      <span class="switch">
        <input type="checkbox" class="switch" id="availability-switch-id">
        <label for="availability-switch-id">Availability</label>
      </span>
    </div>
    <div class="availabilityContent">
      <div class="form-group availability-input-field">
        <label for="">Start time</label>
        <input class="form-control" type="time" name="" value="09:00" placeholder="Start time"/>
      </div>
      <div class="form-group availability-input-field">
        <label for="">Start time</label>
        <input class="form-control" type="time" name="" value="09:00" placeholder="Start time"/>
      </div>
      <div class="text-right">
        <button type="submit" class="btn btn-primary btn-add-Availability">Add</button>
      </div>
    </div>
    <div class="availablelistcard-box">
      <h4>Available list</h4>
      <ul>
        <li>
          <span class="title">New Year's Day</span>
          <span>01/01/2022</span>
        </tr>
        <li>
          <span class="title">Lohri</span>
          <span>13/01/2022</span>
        </tr>
        <li>
          <span class="title">Easter Sunday</span>
          <span>04/04/2022</span>
        </li>
      </ul>
  </div>

  </div>
</div>
