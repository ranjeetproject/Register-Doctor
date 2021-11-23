@extends('frontend.doctor.afterloginlayout.app')

@section('content')
    <div class="col Choose-Your-Doctor-right innerpage  Doc-Diary-1-Create-Regular-weekly-timetable-page">
        <div class="row">
            <div class="col-sm-12">
                {{-- <h1>available_days page</h1> --}}

                {{-- <ul class="nav Calendar-Regular-tab" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#Regular-Weekly-Timetable">
                            Regular Weekly Timetable
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#Ad-Hoc-Timeslots">
                            Ad Hoc Timeslots
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="tips"><img src="{{ asset('public/images/frontend/images/ex-icon.png') }}" alt=""
                                data-toggle="tooltip" data-placement="right" title=""
                                data-original-title="One line definition"> How It Works</a>
                    </li>
                </ul> --}}
                @php
                    // $time_zone = Auth::user()->profile->time_zone;
                    $time_zone = d_timezone();
                @endphp
                <div class="tab-content Calendar-Regular-tab-con" id="myTabContent">
                    <div class="tab-pane fade show active" id="Regular-Weekly-Timetable">
                        <div class="calanderilest">
                            <div class="row for-box-sad">
                                <div class="col-lg-4 col-md-4 col-sm-12 calend_status">
                                    <h2 class="show_date">{!! date('l', strtotime(now())) . '  ' . date('F d Y', strtotime(now())) !!}</h2>
                                    <h3>Your Availability :<br>
                                        <span class="show_time">
                                            @foreach ($get_current_day as $current_day)
                                                {{-- @if ($time_zone != 1) --}}
                                                {{ date('H:i a', strtotime(timezoneAdjustmentFetch($time_zone,date('Y-m-d'),$current_day->from_time))) }} -
                                                {{ date('H:i a', strtotime(timezoneAdjustmentFetch($time_zone,date('Y-m-d'),$current_day->to_time))) }}
                                                {{-- @else
                                                {{ date('H:i a', strtotime($current_day->from_time)) }} -
                                                {{ date('H:i a', strtotime($current_day->to_time)) }}
                                                @endif --}}

                                            @endforeach
                                        </span>
                                    </h3>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <div class="responsive-calendar">
                                        <div class="controls">
                                            <a class="pull-left" data-go="prev"><i class="fas fa-caret-left"></i></a>
                                            <h4><span data-head-month></span> <span data-head-year></span> </h4>
                                            <a class="pull-right" data-go="next"><i class="fas fa-caret-right"></i></a>
                                        </div>
                                        <div class="day-headers">
                                            <div class="day header">Mon</div>
                                            <div class="day header">Tue</div>
                                            <div class="day header">Wed</div>
                                            <div class="day header">Thu</div>
                                            <div class="day header">Fri</div>
                                            <div class="day header">Sat</div>
                                            <div class="day header">Sun</div>
                                        </div>
                                        <div class="days" data-group="days">

                                        </div>
                                    </div>
                                    <div class="Available-days"><span>Available days for patient</span></div>
                                </div>
                            </div>
                            <div class="row Available-table-details">
                                <div class="col-sm-12">

                                </div>

                                <div class="col-sm-6 regular-weekly-timeslots">
                                    <h5 class="Available-Time">Add or Delete Regular Weekly Timeslots</h5>

                                    <div class="d-block text-right">
                                        <button type="button" class="btn btn-primary" onclick="addweeklyday()">Add</button>
                                    </div>
                                    {{-- <a href="#"></a> --}}
                                    <div class="accordion my-2 re-ah-titme" id="accordionExample">


                                        @foreach ($weekly_available_days as $day)
                                            <div class="card">
                                                <div class="card-header" id="headingOne">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                                            data-target="#collapseOne" aria-expanded="false"
                                                            aria-controls="collapseOne">
                                                            {{ ucfirst($day->day) }} -
                                                            {{-- @dump($day->day) --}}
                                                            {{-- @if ($time_zone !=1) --}}

                                                            <span>{{ date('H:i a', strtotime(timezoneAdjustmentFetch($time_zone,$day->day,$day->from_time))) }} -
                                                                {{ date('H:i a', strtotime(timezoneAdjustmentFetch($time_zone,$day->day,$day->to_time))) }}</span>
                                                            {{-- @else
                                                            <span>{{ date('H:i a', strtotime($day->from_time)) }} -
                                                                {{ date('H:i a', strtotime($day->to_time)) }}</span>

                                                            @endif --}}

                                                        </button>
                                                        <span class="accetion"><a href="#"
                                                                onclick="editWeeklyDay('{{ $day->id }}')"><i
                                                                    class="fas fa-pencil-alt"></i></a> | <a
                                                                href="{{ route('doctor.delete-weekly-day', $day->id) }}"
                                                                onclick="return confirm('Are you sure ?');"><i
                                                                    class="far fa-trash-alt"></i></a></span>
                                                    </h2>
                                                </div>

                                                {{-- <div id="collapseOnee" class="collapse" aria-labelledby="headingOne"
                                                    data-parent="#accordionExample">
                                                    <div class="card-body p-2">
                                                        <div class="table-responsive">
                                                            <table border="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Day</th>
                                                                        <th>From</th>
                                                                        <th>Till</th>
                                                                        <th style="text-align: center;">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($weekly_available_days as $day)
                                                                        <tr>
                                                                            <td>{{ ucfirst($day->day) }}</td>
                                                                            <td>{{ date('H:i a', strtotime($day->from_time)) }}
                                                                            </td>
                                                                            <td>{{ date('H:i a', strtotime($day->to_time)) }}
                                                                            </td>
                                                                            <td style="text-align: center;"><a href="#"
                                                                                    onclick="editWeeklyDay('{{ $day->id }}')"><i
                                                                                        class="fas fa-pencil-alt"></i></a> |
                                                                                <a href="{{ route('doctor.delete-weekly-day', $day->id) }}"
                                                                                    onclick="return confirm('Are you sure ?');"><i
                                                                                        class="far fa-trash-alt"></i></a>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        @endforeach




                                    </div>


                                </div>
                                <div class="col-sm-6 regular-weekly-timeslots">
                                    <h5 class="Available-Time">Add or Delete Ad Hoc Timeslots</h5>
                                    <div class="d-block">

                                        <form class="form-inline filter-buy d-flex">
                                            <div class="form-group mb-2 mr-1">
                                                <input type="text" name="from_date" onfocus="(this.type='date')"
                                                    onblur="(this.type='text')" class="form-control"
                                                    placeholder="Form Date">
                                            </div>
                                            <div class="form-group mb-2 mr-1">
                                                <input type="text" name="to_date" onfocus="(this.type='date')"
                                                    onblur="(this.type='text')" class="form-control" placeholder="To Date">
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-block mb-2">Search</button>
                                        </form>
                                    </div>
                                    <div class="d-block text-right mt-2">
                                        <button type="button" class="btn btn-primary"
                                            onclick="$('#myModal2').modal('show');">Add</button>
                                    </div>
                                    {{-- <a href="#"></a> --}}
                                    <div class="accordion my-2 re-ah-titme" id="accordionExample2">


                                        @forelse($available_days_for_month as $available_day)

                                            <div class="card">
                                                <div class="card-header" id="headingOne">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                                            data-target="#acone_{{ $available_day->id }}"
                                                            aria-expanded="false" aria-controls="acone">
                                                            {{ ucfirst(date('l', strtotime($available_day->date))) }} -
                                                            {{ date('F d Y', strtotime($available_day->date)) }}
                                                            {{-- @if($time_zone ==2) --}}

                                                            <span>{{ date('H:i a', strtotime(timezoneAdjustmentFetch($time_zone,$available_day->date,$available_day->from_time))) }}
                                                                -
                                                                {{ date('H:i a', strtotime(timezoneAdjustmentFetch($time_zone,$available_day->date,$available_day->to_time))) }}</span>
                                                            {{-- @else
                                                            <span>{{ date('H:i a', strtotime($available_day->from_time)) }}
                                                                -
                                                                {{ date('H:i a', strtotime($available_day->to_time)) }}</span>
                                                            @endif --}}
                                                        </button>
                                                        <span class="accetion"><a href="#"
                                                                onclick="editAvailableDay('{{ $available_day->id }}');"><i
                                                                    class="fas fa-pencil-alt"></i></a> | <a
                                                                href="{{ route('doctor.delete-available-day', $available_day->id) }}"
                                                                onclick="return confirm('Are you sure ?');"><i
                                                                    class="far fa-trash-alt"></i></a></span>
                                                    </h2>
                                                </div>


                                                <div id="acone_{{ $available_day->id }}" class="collapse"
                                                    aria-labelledby="headingOne" data-parent="#accordionExample2">
                                                    <div class="card-body p-2">
                                                        <div class="table-responsive">
                                                            <table border="0">
                                                                <thead>
                                                                    <tr>
                                                                        {{-- <th>Day</th> --}}
                                                                        <th>From</th>
                                                                        <th>Till</th>
                                                                        <th style="text-align: center;">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($available_day->getSlot as $day)
                                                                        <tr>
                                                                            {{-- <td>{{ucfirst($day->day)}}</td> --}}
                                                                            <td>{{ date('H:i a', strtotime($day->start_time)) }}
                                                                            </td>
                                                                            <td>{{ date('H:i a', strtotime($day->end_time)) }}
                                                                            </td>
                                                                            <td style="text-align: center;"><a href="#"
                                                                                    onclick="return confirm('Are you sure ?');"><i
                                                                                        class="far fa-trash-alt"></i></a>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach





                                    </div>

                                </div>
                                <!-- <div class="col-sm-6 tile-pick">
                                                        <div class="form-group Timeslot">
                                                            <label>Add Regular Timeslot in your Diary</label>
                                                            <input  class="form-control" type="text" placeholder="Sunday">
                                                         </div>
                                                    </div>
                                                    <div class="col-sm-6 tile-pick">
                                                        <div class="form-group">
                                                             <label>From</label>
                                                             <input id="From-date" class="form-control" type="time" value="09:00">
                                                          </div>
                                                          <div class="form-group">
                                                            <label>Till</label>
                                                            <input id="Till-date" class="form-control" type="time" value="09:15">
                                                          </div>
                                                    </div> -->
                                {{-- <div class="submit-btn col-sm-12">
                                                    <button type="submit" class="btn blue-button">Submit</button>
                                                </div> --}}
                            </div>
                        </div>
                    </div>
                    {{-- <div class="tab-pane fade" id="Ad-Hoc-Timeslots">
                        <form class="calanderilest">
                            <div class="row mb-10">
                                <p>Add or Delete Specific Timeslots by Clicking on the Calendar Date</p>
                            </div>

                            <div class="row for-box-sad">
                                <div class="col-lg-4 col-md-4 col-sm-12 calend_status">
                                    <h2 class="show_date">{!! date('l', strtotime(now())) . '  ' . date('F d Y', strtotime(now())) !!}</h2>
                                    <h3>Your Availability :<br>
                                        <span class="show_time">
                                            @foreach ($get_current_day as $current_day)
                                                {{ date('H:i a', strtotime($current_day->from_time)) }} -
                                                {{ date('H:i a', strtotime($current_day->to_time)) }}
                                            @endforeach
                                        </span>
                                    </h3>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <div class="responsive-calendar">
                                        <div class="controls">
                                            <a class="pull-left" data-go="prev"><i class="fas fa-caret-left"></i></a>
                                            <h4><span data-head-month></span> <span data-head-year></span> </h4>
                                            <a class="pull-right" data-go="next"><i class="fas fa-caret-right"></i></a>
                                        </div>
                                        <div class="day-headers">
                                            <div class="day header">Mon</div>
                                            <div class="day header">Tue</div>
                                            <div class="day header">Wed</div>
                                            <div class="day header">Thu</div>
                                            <div class="day header">Fri</div>
                                            <div class="day header">Sat</div>
                                            <div class="day header">Sun</div>
                                        </div>
                                        <div class="days" data-group="days">

                                        </div>
                                    </div>
                                    <div class="Available-days"><span>Available days</span></div>
                                </div>
                            </div>
                            <div class="row Available-table-details">
                                <div class="col-sm-12">
                                    <h4 class="Available-Time">Add or Delete Ad Hoc Timeslots</h4>
                                    <div class="d-block">

                                        <form class="form-inline filter-buy d-flex">
                                            <div class="form-group mb-2 mr-1">
                                                <input type="text" name="from_date" onfocus="(this.type='date')"
                                                    onblur="(this.type='text')" class="form-control"
                                                    placeholder="Form Date">
                                            </div>
                                            <div class="form-group mb-2 mr-1">
                                                <input type="text" name="to_date" onfocus="(this.type='date')"
                                                    onblur="(this.type='text')" class="form-control" placeholder="To Date">
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-block mb-2">Search</button>
                                        </form>
                                    </div>
                                    <div class="d-block text-right mt-2">
                                        <button type="button" class="btn btn-primary"
                                            onclick="$('#myModal2').modal('show');">Add</button>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <table border="0">
                                        <thead>
                                            <tr>
                                                <th>Day</th>
                                                <th>From</th>
                                                <th>Till</th>
                                                <th style="text-align: center;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($available_days as $available_day)
                                                <tr>
                                                    <td>{{ date('l', strtotime($available_day->date)) . ' - ' . date('M d Y', strtotime($available_day->date)) }}
                                                    </td>
                                                    <td>{{ date('H:i a', strtotime($available_day->from_time)) }}</td>
                                                    <td>{{ date('H:i a', strtotime($available_day->to_time)) }}</td>
                                                    <td style="text-align: center;"><a href="#"
                                                            onclick="editAvailableDay('{{ $available_day->id }}');"><i
                                                                class="fas fa-pencil-alt"></i></a> | <a
                                                            href="{{ route('doctor.delete-available-day', $available_day->id) }}"
                                                            onclick="return confirm('Are you sure ?');"><i
                                                                class="far fa-trash-alt"></i></a></td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center">No data found.</td>
                                                </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                                <!-- <div class="col-sm-6 tile-pick">
                                                        <div class="form-group Timeslot">
                                                            <label>Add Regular Timeslot in your Diary</label>
                                                            <input  class="form-control" type="text" placeholder="Sunday">
                                                         </div>
                                                    </div>
                                                    <div class="col-sm-6 tile-pick">
                                                        <div class="form-group">
                                                             <label>From</label>
                                                             <input id="From-date" class="form-control" type="time" value="09:00">
                                                          </div>
                                                          <div class="form-group">
                                                            <label>Till</label>
                                                            <input id="Till-date" class="form-control" type="time" value="09:15">
                                                          </div>
                                                    </div> -->
                                <div class="submit-btn col-sm-12">
                                    <button type="submit" class="btn blue-button">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade bd-example-modal-lg how-it-works" tabindex="-1" id="myModal" role="dialog"
        aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fal fa-times-circle"></i>
                </button>
                <p>Under Regular Weekly Timetable input or delete any regular slots you offer - This will show as your
                    weekly timetable indefinitely e.g. Sundays 09:00 AM to 10:00 AM and Mondays 06:00 PM to 07:15 PM.</p>
                <p>Under Ad Hoc Timeslots add non-regular Timeslots or delete specific dates.
                    e.g. add next Tuesday 09-10 PM as you will be available, or cancel all slots in May as you are away. If
                    you use only Ad Hoc Timeslots remember to keep updating your availability.</p>
            </div>
        </div>
    </div>



    <div class="modal fade bd-example-modal-lg how-it-works" tabindex="-1" id="myModal2" role="dialog"
        aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fal fa-times-circle"></i>
                </button>
                <form method="POST" action="">

                    @csrf

                    <div class="form-group">
                        <label>Date</label>
                        <input type="text" onfocus="(this.type='date')" name="date" id="date" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Form Time</label>

                        <input type="text" name="from_time" id="from_time" class="form-control jsdatetimepicker"
                            autocomplete="off" required>
                    </div>


                    <div class="form-group">
                        <label>To Time</label>

                        <input type="text" name="to_time" id="to_time" class="form-control jsdatetimepicker"
                            autocomplete="off" required>
                    </div>

                    <button class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>
    </div>


    <div class="modal fade bd-example-modal-lg how-it-works" tabindex="-1" id="myModal3" role="dialog"
        aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fal fa-times-circle"></i>
                </button>
                <form method="POST" action="{{ route('doctor.edit-available-day') }}">

                    @csrf
                    <input type="hidden" name="available_day_id" id="available_day_id">

                    <div class="form-group">
                        <input type="text" onfocus="(this.type='date')" name="date" id="edit_date" class="form-control"
                            required>
                    </div>

                    <div class="form-group">
                        <input type="text" name="from_time" id="edit_from_time" class="form-control jsdatetimepicker"
                            autocomplete="off" required>
                    </div>


                    <div class="form-group">
                        <input type="text" name="to_time" id="edit_to_time" class="form-control jsdatetimepicker"
                            autocomplete="off" required>
                    </div>

                    <button class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg how-it-works" tabindex="-1" id="myModal4" role="dialog"
        aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fal fa-times-circle"></i>
                </button>
                <form method="POST" action="{{ route('doctor.add-weekly-day') }}">

                    @csrf
                    {{-- <input type="hidden" name="available_day_id" id="available_day_id"> --}}

                    <div class="form-group">
                        <label>Day</label>
                        <select class="form-control" name="day">
                            <option value="monday">Monday</option>
                            <option value="tuesday">Tuesday</option>
                            <option value="wednesday">Wednesday</option>
                            <option value="thursday">Thursday</option>
                            <option value="friday">Friday</option>
                            <option value="saturday">Saturday</option>
                            <option value="sunday">Sunday</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>From</label>
                        <input type="text" name="from_time" id="edit_from_time" class="form-control jsdatetimepicker"
                            autocomplete="off" required>
                    </div>


                    <div class="form-group">
                        <label>Till</label>
                        <input type="text" name="to_time" id="edit_to_time" class="form-control jsdatetimepicker"
                            autocomplete="off" required>
                    </div>

                    <button class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>
    </div>


    <div class="modal fade bd-example-modal-lg how-it-works" tabindex="-1" id="myModal5" role="dialog"
        aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fal fa-times-circle"></i>
                </button>
                <form method="POST" action="{{ route('doctor.edit-weekly-day') }}">

                    @csrf
                    <input type="hidden" name="weekly_day_id" id="weekly_day_id">

                    <div class="form-group">
                        <label>Day</label>
                        <select class="form-control" name="day" id="weekly_day">
                            <option value="monday">Monday</option>
                            <option value="tuesday">Tuesday</option>
                            <option value="wednesday">Wednesday</option>
                            <option value="thursday">Thursday</option>
                            <option value="friday">Friday</option>
                            <option value="saturday">Saturday</option>
                            <option value="sunday">Sunday</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>From</label>
                        <input type="text" name="from_time" id="weekly_from_time" class="form-control jsdatetimepicker"
                            autocomplete="off" required>
                    </div>


                    <div class="form-group">
                        <label>Till</label>
                        <input type="text" name="to_time" id="weekly_to_time" class="form-control jsdatetimepicker"
                            autocomplete="off" required>
                    </div>

                    <button class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>
    </div>



@endsection
@section('scripts')
<script type="text/javascript">
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
    $('#myModal').modal('show')

    $(document).ready(function() {


        $(".responsive-calendar").responsiveCalendar({
            time: '{{ date('Y-m') }}',
            // time: '2021-04',
            events: {

                @foreach ($available_days as $available_day)
                    "{{ $available_day->date }}":{},
                @endforeach
                // "2020-03-02":{
                //     "class": "day wed past active book",
                // },
                // "2020-03-04":{},
                // "2020-03-06":{},
                // "2020-03-09":{},
                // "2020-03-10":{},
                // "2020-03-12":{},
                // "2020-03-14":{},
                // "2020-03-15":{},
                // "2020-03-18":{},
                // "2020-03-20":{},
                // "2020-03-24":{},
                // "2020-03-26":{},
                // "2020-03-28":{},
                // "2020-03-29":{},
                // "2020-03-30":{},
                // "2020-05-30": {},
                // "2020-04-26": {},

                // "2020-05-12": {}
            },
            onDayClick: function(events) {
                // alert('Day was clicked');
                console.log('====================================');
                console.log(events,$(this).data('day'));
                var day = $(this).data('day');
            var year = $(this).data('year');
            var month = $(this).data('month');
            day = (day <= 9) ? '0' + day : day;
            month = (month <= 9) ? '0' + month : month;
            var date = day + '/' + month + '/' + year;
            // $('#myModal2').modal('show');
            // $('#date').val(date);
            var fromDate = new Date(year + '-' + month + '-' + day);
            var formatedDate = new Date(fromDate).toDateString();
            //alert(formatedDate);

            $.ajax({
                url: "{{ route('doctor.edit-available-day') }}",
                type: 'get',
                dataType: "json",
                // data:{state:state,type:type,_token:token}
                data: {
                    date: date
                }
            }).done(function(response) {
                if (typeof response != "undefined" && response.success) {
                    $('.show_date').html(formatedDate);
                    var available_time = '';
                    $.each(response.data, function(index, value) {
                        console.log(value.date);
                        available_time += value.from_time + '-' + value.to_time;
                        available_time += '<br>';
                    });
                    $('.show_time').html(available_time);


                }
            });
                console.log('====================================');
            }
        });

    });
    // $(window).on('load', function() {

        // alert('fjjdf');

        //       $('.responsive-calendar').responsiveCalendar({
        //   onDayClick: function(events) { alert('Day was clicked') }
        // });
        // window.location.reload(true)
        // setTimeout(function(){
        // $(".day a").click(function() {
            // alert('fjjdf');
            // var day = $(this).data('day');
            // var year = $(this).data('year');
            // var month = $(this).data('month');
            // day = (day <= 9) ? '0' + day : day;
            // month = (month <= 9) ? '0' + month : month;
            // var date = day + '/' + month + '/' + year;
            // // $('#myModal2').modal('show');
            // // $('#date').val(date);
            // var fromDate = new Date(year + '-' + month + '-' + day);
            // var formatedDate = new Date(fromDate).toDateString();
            // //alert(formatedDate);

            // $.ajax({
            //     url: "{{ route('doctor.edit-available-day') }}",
            //     type: 'get',
            //     dataType: "json",
            //     // data:{state:state,type:type,_token:token}
            //     data: {
            //         date: date
            //     }
            // }).done(function(response) {
            //     if (typeof response != "undefined" && response.success) {
            //         $('.show_date').html(formatedDate);
            //         var available_time = '';
            //         $.each(response.data, function(index, value) {
            //             console.log(value.date);
            //             available_time += value.from_time + '-' + value.to_time;
            //             available_time += '<br>';
            //         });
            //         $('.show_time').html(available_time);


            //     }
            // });
    //     });
    // }, 2000);

    // });

    function editAvailableDay(available_day_id) {


        $.ajax({
            url: "{{ route('doctor.edit-available-day') }}",
            type: 'get',
            dataType: "json",
            // data:{state:state,type:type,_token:token}
            data: {
                available_day_id: available_day_id
            }
        }).done(function(response) {
            if (typeof response != "undefined" && response.success) {
                $('#myModal3').modal('show');
                $('#available_day_id').val(response.data.id);
                $('#edit_date').val(response.data.date);
                $('#edit_from_time').val(response.data.from_time);
                $('#edit_to_time').val(response.data.to_time);
                // if(response.data == '1'){
                //  $('#doctor_'+doctorId).addClass('marks');
                // }else if(response.data == '2'){
                //  $('#doctor_'+doctorId).removeClass('marks');
                // }

                // toastr.success(response.message);
            }
        });
    }

    function addweeklyday() {
        $('#myModal4').modal('show');
    }

    function editWeeklyDay(weekly_day_id) {


        $.ajax({
            url: "{{ route('doctor.edit-weekly-day') }}",
            type: 'get',
            dataType: "json",
            // data:{state:state,type:type,_token:token}
            data: {
                weekly_day_id: weekly_day_id
            }
        }).done(function(response) {
            if (typeof response != "undefined" && response.success) {
                $('#myModal5').modal('show');
                $('#weekly_day_id').val(response.data.id);
                $('#weekly_day').val(response.data.day);
                $('#weekly_from_time').val(response.data.from_time);
                $('#weekly_to_time').val(response.data.to_time);
                // if(response.data == '1'){
                //  $('#doctor_'+doctorId).addClass('marks');
                // }else if(response.data == '2'){
                //  $('#doctor_'+doctorId).removeClass('marks');
                // }

                // toastr.success(response.message);
            }
        });
    }

</script>
@endsection
