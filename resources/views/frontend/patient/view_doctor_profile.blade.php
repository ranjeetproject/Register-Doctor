@extends('frontend.patient.afterloginlayout.app')

@section('content')
    <div class="col Post-prescription-right innerpage  Doctor-Profile-what-patient-views-page">
        <div class="row">
            <div class="col-sm-12">

                @php
                    $age = \Carbon\Carbon::parse(auth()->user()->profile->dob)->diff(\Carbon\Carbon::now());
                    $sd = $age->format('%y years, %m months and %d days');
                    $d_years = $age->format('%y');
                    $d_months = $age->format('%m');
                    $d_days = $age->format('%d');
                    // dump($age, $sd, $d_years,$d_months,$d_days);
                @endphp


                <div class="col Choose-Your-Doctor-right">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb Pharmacist-doc-com">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Doctor Profile</a></li>
                        </ol>
                    </nav>

                    @php
                        // $time_zone = Auth::user()->profile->time_zone;
                        $time_zone = d_timezone();
                    @endphp
                    <form action="{{ route('patient.create-case') }}" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="profile-image">
                                    <img src="{{ $doctor->profile->profile_photo }}" alt="">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <p><span>Name : </span>{{ $doctor->forename . ' ' . $doctor->surname }}</p>
                                        <p><span>Speciality or Interest : </span> {{ $doctor->profile->speciality->name }}
                                        </p>
                                        <p><span>About : </span> {{ $doctor->profile->about }}</p>
                                        <p><span>Experience : </span> {{ $doctor->profile->dr_experience }}</p>
                                        <p><span>Qualifications : </span> DM - Neurology, MD - General Medicine, MBBS</p>
                                        <p><span>Prescribes Online : </span>
                                            {{ !empty($doctor->admin_verified_at) ? 'Yes' : 'No' }}</p>
                                        <p><span>Sees : </span> {{ $doctor->profile->dr_see }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="blank-card">
                                    <h4>Select Communication Options</h4>
                                    @if ($doctor->profile->dr_live_video_fee_notification == 1)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="questions_type"
                                                onclick="$('#book_slot').show();" id="exampleRadios1" value="2"
                                                {{ request()->questions_type == 'live-video' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="exampleRadios1">
                                                Live Video: Price : <i class="fas fa-pound-sign"></i>
                                                {{ $doctor->profile->dr_live_video_fee ? $doctor->profile->dr_live_video_fee + ($doctor->profile->dr_live_video_fee*($doctor->profile->commission/100)) : $doctor->profile->dr_live_video_fee }} per 15 mins
                                                Check availability in Calendar below
                                            </label>
                                        </div>
                                    @endif
                                    @if ($doctor->profile->dr_live_chat_fee_notification == 1)
                                    @if(18 < $d_years || $d_years < 11)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="questions_type"
                                                onclick="$('#book_slot').show();" id="exampleRadios2" value="1"
                                                {{ request()->questions_type == 'live-chat' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="exampleRadios2">
                                                Live Chat : Price : <i class="fas fa-pound-sign"></i>
                                                {{ $doctor->profile->dr_live_chat_fee? $doctor->profile->dr_live_chat_fee + ($doctor->profile->dr_live_chat_fee*($doctor->profile->commission/100)) : $doctor->profile->dr_live_chat_fee }} per 15 mins
                                                Check availability in Calendar below
                                            </label>
                                        </div>
                                        @endif
                                    @endif
                                    @if(18 < $d_years || $d_years < 11)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="questions_type"
                                            onclick="$('#book_slot').hide(); $('#case_details').show();" id="exampleRadios2"
                                            value="4">
                                        <label class="form-check-label" for="exampleRadios2">
                                            Typed Q & A: Price: <i class="fas fa-pound-sign"></i>
                                            {{ $doctor->profile->dr_qa_fee? $doctor->profile->dr_qa_fee+($doctor->profile->dr_qa_fee*($doctor->profile->commission/100)) : $doctor->profile->dr_qa_fee }} per 15 mins This doctor's
                                            turnaround time : 8 days
                                        </label>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="blank-card">
                                    <h4>Ratings</h4>
                                    <div class="reting-and-other-info">
                                        <div class="rating-list">
                                            <i class="fas fa-star-half-alt reting"></i>
                                            <i class="fas fa-star reting"></i>
                                            <i class="fas fa-star reting"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <span>0.4</span>
                                            <i class="fas fa-heart {{ getFavDoc($doctor->id) ? 'marks' : '' }}"></i>
                                        </div>
                                        <div class="rating-list-bottom">
                                            @php
                                                $thumbsUpCount = getThumbsUp($doctor->id);
                                            @endphp
                                            @for ($i = 0; $i < $thumbsUpCount; $i++)

                                                <i class="far fa-thumbs-up reting"></i>
                                            @endfor
                                            {{-- <i class="far fa-thumbs-up reting"></i> --}}
                                        </div>
                                        <p>Comments:</p>
                                    </div>
                                </div>
                            </div>






                            <div id="book_slot">

                                <div class="col-sm-12">
                                    <div class="blank-card">
                                        <h4>Check Doctor's Availability <img
                                                src="{{ asset('public/images/frontend/images/ex-icon.png') }}" alt=""
                                                data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="One line Definition"></h4>
                                    </div>
                                </div>


                                {{-- <div class="col-sm-12 Timezone-cl-top">
                                    <label>Confirm your Timezone <sup>*</sup></label>
                                    <select class="custom-select my-1 mr-sm-2" required>
                                        <option selected>GMT</option>
                                        <option value="1">France GTM -1</option>
                                        <option value="2">Turkay GTM -3</option>
                                    </select>
                                    <span><sup>*</sup>Mandatory</span>
                                </div> --}}


                                <div class="calanderilest">
                                    <div class="row for-box-sad">



                                        <div class="col-lg-4 col-md-4 col-sm-12 calend_status">
                                            <h2 class="show_date">{!! date('l', strtotime(now())) . '  ' . date('F d Y', strtotime(now())) !!}</h2>
                                            <h3>Doctor Availability :<br>
                                                <span class="show_time">
                                                    @foreach ($get_current_day as $current_day)
                                                        {{-- @if ($time_zone != 1) --}}
                                                            {{ date('H:i a', strtotime(timezoneAdjustmentFetch($time_zone, date('Y-m-d'), $current_day->from_time))) }}
                                                            -
                                                            {{ date('H:i a', strtotime(timezoneAdjustmentFetch($time_zone, date('Y-m-d'), $current_day->to_time))) }}
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
                                                    <a class="pull-left" data-go="prev"><i
                                                            class="fas fa-caret-left"></i></a>
                                                    <h4><span data-head-month></span> <span data-head-year></span> </h4>
                                                    <a class="pull-right" data-go="next"><i
                                                            class="fas fa-caret-right"></i></a>
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
                                            <h4 class="Available-Time">Available Timeslots</h4>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="table-responsive">

                                                <table border="0" style=" box-shadow: 0px 0px 32px #ccc;">
                                                    <thead>
                                                        <tr>
                                                            <th>Day</th>
                                                            <th></th>
                                                            <th>From</th>
                                                            <th>Till</th>
                                                            <th style="text-align: center;">Select <img
                                                                    src="{{ asset('public/images/frontend/images/ex-icon.png') }}"
                                                                    alt="" data-toggle="tooltip" data-placement="top"
                                                                    title=""
                                                                    data-original-title='"Live consultations are booked for a minimum of 15 minute time slots e.g. 30 mins, 45 mins etc. You may cancel up to 48 hours before an appointment (subject to 3% admin fee) or rebook with the same doctor (no extra fee). Cancellations less than 48 hours are not reimbursable. If a doctor does not atttend you may either rebook or be fully reimbursed. You can rate the doctor." The 3% is under admin control.'>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="time_slot">
                                                        @php
                                                            $count_h_s = 0;
                                                            $hdlst = '26';
                                                        @endphp
                                                        @foreach ($get_current_day as $current_day)
                                                            @php
                                                                $time_slots = $current_day
                                                                    ->getSlot()
                                                                    ->whereDoesntHave('bookedSlot', function ($query) use ($getBookedSlot) {
                                                                        $query->whereIn('time_slot_id', $getBookedSlot);
                                                                    })
                                                                    ->get();
                                                                $h = 13;
                                                            @endphp
                                                            @foreach ($time_slots as $slot)
                                                                {{-- @if ($time_zone == 1)
                                                                    @if (date('H', strtotime($slot->start_time)) == $hdlst)

                                                                        <tr>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td>{{ date('H:i a', strtotime($slot->start_time)) }}
                                                                            </td>
                                                                            <td>{{ date('H:i a', strtotime($slot->end_time)) }}
                                                                            </td>
                                                                            <td style="text-align: center;">
                                                                                <input type="checkbox" name="time_slot[]"
                                                                                    value="'.$slot->id.'"
                                                                                    onclick="caseDetails()">
                                                                            </td>
                                                                        </tr>
                                                                    @else
                                                                        @php
                                                                            $count_h_s++;
                                                                        @endphp

                                                                        @if ($count_h_s > 1)
                                                                                </tbody>
                                                                            </table>
                                                                            </td>
                                                                            </tr>
                                                                        @endif
                                                                        <tr class="ts-collapse-icon" data-toggle="collapse"
                                                                            data-target="#time_slot_row_{{ $count_h_s }}">
                                                                            <td>
                                                                                @if ($count_h_s == 1)

                                                                                {{ date('l', strtotime($current_day->date)) . '  ' . date('F d Y', strtotime($current_day->date)) }}
                                                                                @endif
                                                                            </td>
                                                                            <td>{{ date('H:i a', strtotime($slot->start_time)) }}</td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td style="text-align: center;">
                                                                            </td>
                                                                        </tr>
                                                                        <tr id="time_slot_row_{{ $count_h_s }}" class="collapse">
                                                                            <td colspan="5" class="time-slot-td">
                                                                                <table>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td>{{ date('H:i a', strtotime($slot->start_time)) }}
                                                                                            </td>
                                                                                            <td>{{ date('H:i a', strtotime($slot->end_time)) }}
                                                                                            </td>
                                                                                            <td style="text-align: center;">
                                                                                                <input type="checkbox" name="time_slot[]"
                                                                                                    value="{{ $slot->id }}"
                                                                                                    onclick="caseDetails()">
                                                                                            </td>
                                                                                        </tr>
                                                                    @endif
                                                                    @php
                                                                        $hdlst = date('H', strtotime($slot->start_time));
                                                                    @endphp
                                                            @else --}}

                                                                @if(date('H',
                                                                strtotime(timezoneAdjustmentFetch($time_zone,$current_day->date,$slot->start_time)))
                                                                == $hdlst)

                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td>{{ date('H:i a', strtotime(timezoneAdjustmentFetch($time_zone, $current_day->date, $slot->start_time))) }}
                                                                        </td>
                                                                        <td>{{ date('H:i a', strtotime(timezoneAdjustmentFetch($time_zone, $current_day->date, $slot->end_time))) }}
                                                                        </td>
                                                                        <td style="text-align: center;"><input type="checkbox"
                                                                                name="time_slot[]" value="{{ $slot->id }}"
                                                                                onclick="caseDetails()"></td>
                                                                    </tr>
                                                                @else
                                                                    @php

                                                                        $count_h_s++;
                                                                    @endphp

                                                                    @if ($count_h_s > 1)
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>

                                                                    @endif
                                                                    <tr class="ts-collapse-icon" data-toggle="collapse"
                                                                        data-target="#time_slot_row_{{ $count_h_s }}">
                                                                        <td>
                                                                            @if ($count_h_s == 1)

                                                                            {{ date('l', strtotime($current_day->date)) . '  ' . date('F d Y', strtotime($current_day->date)) }}
                                                                            @endif
                                                                        </td>
                                                                        <td>{{ date('H:i a', strtotime(timezoneAdjustmentFetch($time_zone, $current_day->date, $slot->start_time))) }}
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td style="text-align: center;"></td>
                                                                    </tr>

                                                                    <tr id="time_slot_row_{{ $count_h_s }}" class="collapse">
                                                                        <td colspan="5" class="time-slot-td">
                                                                            <table>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        <td>{{ date('H:i a', strtotime(timezoneAdjustmentFetch($time_zone, $current_day->date, $slot->start_time))) }}
                                                                                        </td>
                                                                                        <td>{{ date('H:i a', strtotime(timezoneAdjustmentFetch($time_zone, $current_day->date, $slot->end_time))) }}
                                                                                        </td>
                                                                                        <td style="text-align: center;"><input type="checkbox"
                                                                                                name="time_slot[]" value="{{ $slot->id }}"
                                                                                                onclick="caseDetails()"></td>
                                                                                    </tr>
                                                                @endif
                                                                @php
                                                                    $hdlst = date('H', strtotime(timezoneAdjustmentFetch($time_zone, $current_day->date, $slot->start_time)));
                                                                @endphp


                                                            {{-- @endif --}}

                                                        @endforeach
                                                    @endforeach

                                                    </tbody></table></td></tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>



                            <div class="col-sm-12 mt-3">
                                <div id="case_details" style="display: none;">

                                    @csrf

                                    <input type="hidden" name="booking_date" id="booking_date"
                                        value="{{ date('Y-m-d') }}">
                                    <input type="hidden" name="doctor_id"
                                        value=" {{ Crypt::decryptString(Request::segment(3)) }}">

                                    <div class="form-group">
                                        <textarea placeholder="Type your health query here " class="form-control"
                                            name="health_problem" rows="6" required></textarea>
                                    </div>

                                    <div class="form-group m-0">
                                        <label for="exampleFormControlFile1">Upload Attachments <i
                                                class="fal fa-paperclip"></i></label><p>You Can Upload Max 5 File PDF & JPEG</p>
                                        <input type="file" name="case_file[]" class="form-control-file"
                                            id="exampleFormControlFile1" style="opacity: 0; margin-top: -35px;" multiple
                                            accept="image/*,.pdf"><br> <img data-toggle="tooltip" data-placement="right"
                                            title="" data-original-title="One line definition"
                                            src="{{ asset('public/images/frontend/images/ex-icon.png') }}" alt="">

                                    </div>
                                    <!-- <div class="form-group">
                                        <div class="file-count">
                                            <span id="count_up_attach">0</span>
                                            <i class="fas fa-file-medical-alt"></i>
                                        </div>
                                    </div> -->
                                    <ul class="nav vdp-tabs">

                                    </ul>
                                    <!-- <div class="tab-content">
                                        <div class="tab-pane fade" id="vdp-pdf" role="tabpanel">
                                            <ul class="vdp-upload-gallery">
                                                <li>
                                                    <a href="#">
                                                        <i class="fas fa-file-pdf"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fas fa-file-pdf"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane fade" id="vdp-image" role="tabpanel">
                                            <ul class="vdp-upload-gallery">
                                                <li>
                                                    <a href="#">
                                                        <img src="{{ asset('public/images/frontend/images/opction-one-top-image.png')}}" alt="">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <img src="{{ asset('public/images/frontend/images/opction-one-top-image.png')}}" alt="">
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div> -->
                                </div>
                            </div>



                            <div class="submit-btn col-sm-12">
                                <button type="submit" class="btn blue-button">Book Now</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

@endsection
@push('scripts')

    <script type="text/javascript">
        $(document).ready(function() {
            // $(".day a").click(function() {
            //     alert('hi');
            // });

            $(".responsive-calendar").responsiveCalendar({
                time: '{{ date('Y-m') }}',
                events: {
                    @foreach ($available_days as $available_day)
                        "{{ $available_day->date }}":{ },
                    @endforeach
                },
                onDayClick: function(events) {
                    // alert('Day was clicked');
                    // console.log('====================================');
                    // console.log(events,$(this).data('day'));
                    // console.log('====================================');
                    var day = $(this).data('day');
                    var year = $(this).data('year');
                    var month = $(this).data('month');
                    day = (day <= 9) ? '0' + day : day;
                    month = (month <= 9) ? '0' + month : month;
                    var date = day + '/' + month + '/' + year;
                    $('#myModal2').modal('show');
                    $('#date').val(date);
                    var fromDate = new Date(year + '-' + month + '-' + day);
                    var formatedDate = new Date(fromDate).toDateString();
                    // alert(formatedDate);
                    $('#booking_date').val(date);


                    $.ajax({
                        url: "{{ route('patient.doctor-available-day') }}",
                        type: 'get',
                        dataType: "json",
                        // data:{state:state,type:type,_token:token}
                        data: {
                            date: date,
                            doctor_id: '{{ Crypt::decryptString(Request::segment(3)) }}'
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
                            console.log('====================================');
                            console.log(response.time_slot);
                            console.log('====================================');
                            $('.show_time').html(available_time);
                            $('tbody#time_slot').html(response.time_slot);
                            // $('#time_slot').html('<tr><td>hi</td></tr><tbody><tr><td>hi</td></tr><tr><td>hi</td></tr></tbody><tbody><tr><td>hi</td></tr><tr><td>hi</td></tr></tbody>');


                        }
                    });
                }
            });

            $('input#exampleFormControlFile1').change(function() {
                var files = $(this)[0].files;
               // $('#count_up_attach').html(files.length);
                // if(files.length > 10){
                //     alert("you can select max 10 files.");
                // }else{
                //     alert("correct, you have selected less than 10 files");
                // }

                for (var i = 0; i < files.length; i++)
                {
                    var file_name = files[i].name;
                    var ext = file_name.substring(file_name.lastIndexOf('.') + 1).toLowerCase();
                    if(ext == 'pdf'){
                        //console.log('this is pdf');
                        $(`<li class="nav-item">
                                            <a class="nav-link" target="_blank" href="${URL.createObjectURL(files[i])}">
                                            <i class="fas fa-file-pdf"></i>
                                            <span>${file_name}</span>
                                            </a>
                                        </li>${i}`).appendTo('ul.vdp-tabs')
                    }else{
                        //console.log('this is jpg');
                        $(`<li class="nav-item">
                                            <a class="nav-link" target="_blank" href="${URL.createObjectURL(files[i])}">
                                                <i class="fas fa-file-image"></i>
                                                <span>${file_name}</span>
                                            </a>
                                        </li>${i}`).appendTo('ul.vdp-tabs')
                    }

                }

            });

        });
        // $(window).on('load', function() {
        //     setTimeout(function(){
        //         $(".day a").click(function() {

        //         });
        //     }, 5000);

        // });


        function caseDetails() {
            $('#case_details').show();
        }


    </script>

@endpush
