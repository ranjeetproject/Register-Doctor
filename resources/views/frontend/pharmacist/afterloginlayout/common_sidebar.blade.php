<div class="col-sm-3 max-nav-width">
    <button class="btn sider-bar-toggle"><i class="fas fa-bars"></i> Open Sidebar Menu </button>
    <ul class="left-nav">
        <li class="active"><a href="{{ route('pharmacist.dashboard') }}"><img
                    src="{{ asset('public/images/frontend/images/icon1.png') }}" alt="">Dashboard</a></li>
        <li><a href="{{ route('pharmacist.profile') }}"><img
                    src="{{ asset('public/images/frontend/images/icon2.png') }}" alt="">Manage Profile </a></li>
        <li><a href="{{ route('pharmacist.handy-document') }}"><img
                    src="{{ asset('public/images/frontend/images/icon13.png') }}" alt="">Handy document </a></li>
        <li><a href="{{ route('pharmacist.accepted-priscription') }}"><img
                    src="{{ asset('public/images/frontend/images/icon3.png') }}" alt="">Accepted Prescriptions</a>
        </li>
        <li><a href="{{ route('pharmacist.opening-hours') }}"><img
                    src="{{ asset('public/images/frontend/images/icon3.png') }}" alt="">Opening Hours</a></li>
        <li><a href="{{ route('pharmacist.dispensed-prescriptions') }}"><img
                    src="{{ asset('public/images/frontend/images/icon4.png') }}" alt="">Dispensed Prescriptions</a>
        </li>
        <li><a href="#"><img src="{{ asset('public/images/frontend/images/icon5.png') }}" alt="">Message
                Patient/Doctor</a></li>
    </ul>
    @if (request()->fullUrl() == route('pharmacist.opening-hours'))
        <div class="availability-card-box">
            <h4>Availability</h4>
            <form action="{{ route('pharmacist.special-availability') }}" method="post">
                @csrf
                <div class="form-group">
                    <div class="datePicker-input-field">
                        <input class="form-control" id="availabilityDatepicker" type="text" name="available_dt"
                            placeholder="Select Date" readonly />
                    </div>
                </div>
                <div class="form-group a-check-field">
                    <span class="switch">
                        <input type="checkbox" class="switch" id="availability-switch-id" name="available">
                        <label for="availability-switch-id">Availability</label>
                    </span>
                </div>
                <div class="availabilityContent">
                    <div class="form-group availability-input-field">
                        <label for="">Start time</label>
                        <input class="form-control" type="time" name="from_time" value="09:00" placeholder="Start time" />
                    </div>
                    <div class="form-group availability-input-field">
                        <label for="">Start time</label>
                        <input class="form-control" type="time" name="to_time" value="09:00" placeholder="Start time" />
                    </div>
                </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary btn-add-Availability">Add</button>
                    </div>

            </form>
            <div class="availablelistcard-box">
                <h4>Available list</h4>
                <ul>
                    @forelse ($specialAvailabilities as $sas)
                        <li>
                            {{-- <span class="title">New Year's Day</span> --}}
                            <span>{{ date("d-m-Y", strtotime($sas->available_at)) }}</span>
                            <span>{{ date("H:i", strtotime($sas->available_at)).' to '.date("H:i", strtotime($sas->available_to)) }}</span>
                        </li>
                    @empty
                    <li>
                        <span>Not Found</span>

                    </li>
                    @endforelse
                </ul>
            </div>
            <div class="availablelistcard-box">
                <h4>Unavailable list</h4>
                <ul>
                    @forelse ($specialUnAvailabilities as $sans)
                        <li>
                            {{-- <span class="title">New Year's Day</span> --}}
                            <span>{{ date("d-m-Y", strtotime($sans->available_at)) }}</span>
                        </li>
                    @empty
                    <li>
                        <span>Not Found</span>

                    </li>
                    @endforelse
                </ul>
            </div>
        </div>
    @endif
</div>
