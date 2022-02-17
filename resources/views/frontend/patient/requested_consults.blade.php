@extends('frontend.patient.afterloginlayout.app')

@section('content')
    @php
    $time_zone = Auth::user()->profile->time_zone;
    $time_zone = d_timezone();
    // dd($time_zone,$time_zone->timezone->name);
    @endphp
    <div class="col Post-prescription-right Incoming-Prescription-Requests-page">
        <div class="row">
            <div class="col-sm-12">

                <div class="col Incoming-Prescription-Requests-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb Pharmacist-doc-com">

                            <li class="breadcrumb-item active">Requested Consultations</li>
                        </ol>
                    </nav>
                    <div class="for-w-100 Incoming-Prescription-Requests-right-table mt-0">
                        <div class="row">
                            <div class="col-sm-8">
                                <form class="form-inline">
                                    <div class="form-group">
                                        <label>Show</label>
                                        <select class="form-control">
                                            <option>8</option>
                                        </select>
                                        <span>entries</span>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-4">
                                {{-- <form action="">
                                    <input type="text" class="form-control" placeholder="Search...">
                                </form> --}}
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td>Date</td>
                                                <td>Time</td>
                                                <td> Doctor Name </td>
                                                <td> Case ID</td>
                                                <td>Communication</td>
                                                <td>Status</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($cases as $case)
                                                {{-- @dump($case) --}}

                                                <tr>
                                                    <td>{{ $case->booking_date ? date('dS M Y', strtotime($case->booking_date)) : '' }}
                                                    </td>
                                                    <td style="text-align: center;">
                                                        {{-- @if ($case->getSlot) --}}
                                                        @forelse($case->getBookingSlot as $time_slot)
                                                            {{-- @dump($time_slot) --}}

                                                            @if ($time_slot->getSlot)
                                                                {{-- @if ($time_zone == 2) --}}
                                                                    {{ date('h:i a', strtotime(timezoneAdjustmentFetch($time_zone, $case->booking_date, $time_slot->getSlot->start_time))) }}
                                                                    <br>to<br>
                                                                    {{ date('h:i a', strtotime(timezoneAdjustmentFetch($time_zone, $case->booking_date, $time_slot->getSlot->end_time))) }}
                                                                    <br>
                                                                {{-- @else
                                                                    {{ date('h:i a', strtotime($time_slot->getSlot->start_time)) }}
                                                                    <br>to<br>
                                                                    {{ date('h:i a', strtotime($time_slot->getSlot->end_time)) }}
                                                                    <br>
                                                                @endif --}}


                                                            @endif
                                                        @empty
                                                        @php

                                                            $time_slot = '';
                                                        @endphp
                                                        @endforelse
                                                        {{-- @endif --}}
                                                    </td>
                                                    <td><a
                                                            href="{{ route('patient.view-doctor-profile', Crypt::encryptString($case->doctor->id)) }}">{{ $case->doctor->name }}</a>
                                                    </td>
                                                    <td><a
                                                            href="{{ route('patient.view-case', $case->case_id) }}">{{ $case->case_id }}</a>
                                                    </td>
                                                    <td>
                                                        @if ($case->questions_type == 2)
                                                            @if ($case->accept_status == 1)
                                                                <a href="{{ route('patient.video-call', $case->case_id) }}"
                                                                    target="_blank">
                                                                    Live Video
                                                                    <br><img
                                                                        src="{{ asset('public/images/frontend/images/live-video-icon.png') }}"
                                                                        alt="">
                                                                    {{-- <img src="{{ asset('public/images/frontend/images/Prescriptions.png') }}"
                                                                        alt=""> --}}
                                                                </a>
                                                            @else
                                                                Live video
                                                            @endif
                                                        @else
                                                            @if ($case->accept_status == 1)
                                                                <a href="{{ route('patient.chats', $case->case_id) }}">
                                                                    @if ($case->questions_type == 1)
                                                                        Live Chat
                                                                        <br><img
                                                                            src="{{ asset('public/images/frontend/images/live-g-chat-icon.png') }}"
                                                                            alt="">
                                                                    @endif

                                                                    @if ($case->questions_type == 2)

                                                                    @endif

                                                                    @if ($case->questions_type == 3)
                                                                        Quick Questions
                                                                        <br>
                                                                        <p>Max 3 Exchanges</p><br>
                                                                        <img src="{{ asset('public/images/frontend/images/QQ-icon.png') }}"
                                                                            alt="" width="34">
                                                                    @endif

                                                                    @if ($case->questions_type == 4)
                                                                        Typed Q&A
                                                                        <br>
                                                                        <p>Max 3 Exchanges</p><br>
                                                                        <img src="{{ asset('public/images/frontend/images/QA-icon.png') }}"
                                                                            alt="" width="34">
                                                                    @endif
                                                                </a>
                                                            @else
                                                                @if ($case->questions_type == 1)
                                                                    Live Chat
                                                                    <br>
                                                                    <p>Max 3 Exchanges</p>
                                                                @endif

                                                                @if ($case->questions_type == 2)

                                                                @endif

                                                                @if ($case->questions_type == 3)
                                                                    Quick Questions
                                                                    <br>
                                                                    <p>Max 3 Exchanges</p>
                                                                @endif

                                                                @if ($case->questions_type == 4)
                                                                    Typed Q&A
                                                                    <br>
                                                                    <p>Max 3 Exchanges</p>
                                                                @endif
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($case->accept_status == 1)
                                                            <font style="font-size: 13px;">Confirmed</font> <br>
                                                            <strong
                                                                style="font-size: 14px;">{{ date('d F Y', strtotime($case->booking_date)) }}


                                                            @else
                                                                @if ($case->status == 3)
                                                                    Canceled
                                                                @else
                                                                    Pending
                                                                @endif
                                                        @endif

                                                    </td>

                                                    <td>
                                                        @if ($case->case_type == 2 && $case->questions_type == 3)
                                                            <a href="{{ route('patient.accepted-consults', $case->case_id) }}"
                                                                class="btn btn-sm btn-primary"> Doctors</a>
                                                        @endif
                                                        @if ($case->questions_type == 2 || $case->questions_type == 1)
                                                            @if ($case->status < 3)
                                                            @if ($time_slot)
                                                                @if ($time_slot->getSlot)
                                                                    @php
                                                                        $start_time = $time_slot->getSlot->start_time;
                                                                        $end_time = $time_slot->getSlot->end_time;
                                                                    @endphp
                                                                    @if (getDiffOfTwoDateInMinute($case->booking_date . ' ' . $start_time) > 4320)
                                                                        <a href="{{ route('patient.cancel-booking', $case->case_id) }}"
                                                                            class="btn btn-sm btn-primary"> Cancel
                                                                            booking</a>
                                                                    @endif

                                                                @endif
                                                                @endif
                                                            @endif
                                                        @endif
                                                        @if ($case->accept_status == 1)
                                                            {{-- @dump('hi',$case->status) --}}
                                                            @if ($case->status < 3)
                                                                {{-- @dump($time_slot) --}}
                                                                @if ($time_slot)
                                                                    @if ($time_slot->getSlot)
                                                                        @php
                                                                            $end_time = $time_slot->getSlot->end_time;
                                                                        @endphp
                                                                        @if (getDiffOfTwoDateInMinute($case->booking_date . ' ' . $end_time) < 0)
                                                                            <button type="button"
                                                                                onclick="doctorRating('{{ $case->case_id }}','{{ $case->doctor->id }}')"
                                                                                class="btn btn-sm btn-primary">Rating
                                                                                review</button>


                                                                        @endif
                                                                    @endif
                                                                @endempty
                                                            @endif

                                                        @endif
                                                        @if (!empty($case->sickNote->user_id))

                                                            <a href="{{ route('patient.sick-note', $case->case_id) }}"
                                                                class="btn btn-sm btn-primary mt-1"> Sick Note</a>
                                                        @endif

                                                    </td>

                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6">No data found</td>
                                                </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <nav aria-label="Page navigation example">
                                    {{ $cases->onEachSide(1)->links() }}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>

    <div class="modal fade" id="doct-review" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="modal-body" method="POST" action="{{ route('patient.doctor-review') }}">

                    @csrf
                    <input type="hidden" name="review_doctor_id" id="review_doctor_id" value="">
                    <input type="hidden" name="case_id" id="case_id" value="">
                    <div class="row">
                        <div class="col-sm-12 mb-2">
                            <h5>
                                Please rate your experience with doctor from 1 to 5 star
                            </h5>

                        </div>
                        <div class="col-sm-12 py-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="rating" id="1star" value="5" required>
                                <span>
                                    Good
                                </span>
                                <label class="form-check-label" for="1star">
                                    <i class="fas fa-star active"></i> <i class="fas fa-star active"></i> <i
                                        class="fas fa-star active"></i> <i class="fas fa-star active"></i> <i
                                        class="fas fa-star active"></i>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="rating" id="2star" value="4">
                                <span>
                                    Satisfactory
                                </span>
                                <label class="form-check-label" for="2star">
                                    <i class="fas fa-star active"></i> <i class="fas fa-star active"></i> <i
                                        class="fas fa-star active"></i> <i class="fas fa-star active"></i> <i
                                        class="fas fa-star "></i>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="rating" id="3star" value="3">
                                <span>
                                    Room for improvement
                                </span>
                                <label class="form-check-label" for="3star">
                                    <i class="fas fa-star active"></i> <i class="fas fa-star active"></i> <i
                                        class="fas fa-star active"></i> <i class="fas fa-star"></i> <i
                                        class="fas fa-star "></i>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="rating" id="4star" value="2">
                                <span>
                                    Cloud be a lot better
                                </span>
                                <label class="form-check-label" for="4star">
                                    <i class="fas fa-star active"></i> <i class="fas fa-star active"></i> <i
                                        class="fas fa-star"></i> <i class="fas fa-star"></i> <i
                                        class="fas fa-star"></i>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="rating" id="5star" value="1">
                                <span>
                                    Poor
                                </span>
                                <label class="form-check-label" for="5star">
                                    <i class="fas fa-star active"></i> <i class="fas fa-star"></i> <i
                                        class="fas fa-star"></i> <i class="fas fa-star"></i> <i
                                        class="fas fa-star"></i>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-2">
                            <p>You may add comments:</p>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                    placeholder="Type here..." name="review" required></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-2">
                            <p id="addRemoveFavourite" style="cursor: pointer;">To bookmark this doctor in case you want to consult them again click here</p>
                        </div>
                        <div class="col-sm-12 ask-submit">
                            <button type="submit" class="btn orange-button">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function doctorRating(case_id,doctor_id) {
            $('#doct-review').modal('show');
            $('#review_doctor_id').val(doctor_id);
            $('#case_id').val(case_id);

        }
        $( document ).ready(function() {
            $('#addRemoveFavourite').click(function(){
                var doctorId = $('#review_doctor_id').val();
                addToFavorite(doctorId);
            });
            console.log( "ready!" );
        });

        function addToFavorite(doctorId) {
            // var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ route('patient.add-to-favorite') }}",
                type: 'get',
                dataType: "json",
                // data:{state:state,type:type,_token:token}
                data: {
                    doctor_id: doctorId
                }
            }).done(function(response) {
                if (typeof response != "undefined" && response.success) {
                    // if (response.data == '1') {
                    //     $('#doctor_' + doctorId).addClass('marks');
                    // } else if (response.data == '2') {
                    //     $('#doctor_' + doctorId).removeClass('marks');
                    // }

                    toastr.success(response.message);
                }
            });
        }
    </script>
@endsection
