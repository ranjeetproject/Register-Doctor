@extends('frontend.doctor.afterloginlayout.app')

@section('content')
    <div class="col-lg-9 Choose-Your-Doctor-right innerpage  Prescriptions-Dispensed-page">
        <div class="row">
            <div class="col-sm-12">
                <div class="col Prescriptions-Dispensed-right">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb Pharmacist-doc-com">

                            {{-- @if (Request::segment(3) == 'live-chat')
         <li class="breadcrumb-item active">Live Chat</li>
      @endif

       @if (Request::segment(3) == 'live-video')
         <li class="breadcrumb-item active">Live Video</li>
       @endif

       @if (Request::segment(3) == 'quick-questions')
         <li class="breadcrumb-item active">Quick Questions</li>
       @endif

       @if (Request::segment(3) == 'book-qa')
           <li class="breadcrumb-item active">Book Q & A</li>
       @endif --}}
                            @if (Request::segment(4) && Request::segment(4) == 'accepted')
                                <li class="breadcrumb-item active">Accepted Request</li>
                            @else
                                <li class="breadcrumb-item active">Booking Request</li>
                            @endif


                        </ol>
                    </nav>

                    <div class="for-w-100 Prescriptions-Dispensed-right-table">
                        <div class="row">
                            <div class="col-sm-12">
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
                        </div>
                        @php
                            $time_zone = d_timezone();
                        @endphp
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table class="table Prescriptions-Dispensed-table">
                                        <thead>
                                            <tr>
                                                <td>Patient’s<br> Name </td>
                                                {{-- <td>Date </td> --}}
                                                <td style="text-align: center; min-width: 100px;">Appintment date & Time
                                                </td>
                                                <td>Case No.</td>
                                                <td>Communication</td>

                                                <td> View <br>Case</td>
                                                {{-- @if (Request::segment(3) == 'live-chat' || Request::segment(3) == 'live-video') --}}
                                                <td>View Medical <br>Record</td>
                                                {{-- @endif --}}

                                                <td style="min-width: 150px;"> Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if (Auth::guard('siteDoctor')->user()->profile->dr_standard_fee_notification == 0)

                                                <tr>
                                                    <td colspan="9">You are not able to take Quick Question. Please activate
                                                        the Quick Question notification.</td>
                                                </tr>

                                            @else

                                                @foreach ($cases as $case)
                                                    <tr>

                                                        <td>{{ $case->user->name }}</td>
                                                        {{-- <td></td> --}}
                                                        <td style="text-align: center;">
                                                        @if($case->booking_date==null)
                                                            {{''}}<br>
                                                        @else
                                                            {{ date('dS M Y', strtotime($case->booking_date)) }}<br>
                                                        @endif

                                                            @forelse($case->getBookingSlot as $time_slot)
                                                                @if ($time_slot->getSlot)
                                                                    {{-- {{ date('h:i a', strtotime($time_slot->getSlot->start_time)) }} --}}
                                                                    {{ date('H:i a', strtotime(timezoneAdjustmentFetch($time_zone, $case->booking_date, $time_slot->getSlot->start_time))) }}
                                                                    -

                                                                    <br>
                                                                    to <br>
                                                                    {{ date('H:i a', strtotime(timezoneAdjustmentFetch($time_zone, $case->booking_date, $time_slot->getSlot->end_time))) }}
                                                                    {{-- {{ date('h:i a', strtotime($time_slot->getSlot->end_time)) }} --}}
                                                                    <br>
                                                                @endif
                                                            @empty

                                                            @endforelse

                                                        </td>
                                                        <td>{{ $case->case_id }}</td>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                @if ($case->questions_type == 1)
                                                                    Live Chat
                                                                @endif

                                                                @if ($case->questions_type == 2)
                                                                    Live Video
                                                                @endif

                                                                @if ($case->questions_type == 3)
                                                                    Quick Questions
                                                                @endif

                                                                @if ($case->questions_type == 4)
                                                                    Typed Q&A
                                                                @endif
                                                            </a>
                                                        </td>

                                                        <td><a href="{{ route('doctor.view-case', $case->case_id) }}"
                                                                target="_blank"><img src="{{ asset('public/images/frontend/images/view-icon.png')}}" width="26" alt=""></a></td>
                                                        {{-- @if (Request::segment(3) == 'live-chat' || Request::segment(3) == 'live-video') --}}
                                                        <td><a href="{{ route('doctor.view-medical-recorde', $case->case_id) }}"
                                                                target="_blank"><img src="{{ asset('public/images/frontend/images/view-icon.png')}}" width="26" alt=""></a></td>
                                                        {{-- @endif --}}

                                                        <td class="masg-dep-tol">

                                                            @if ($case->accept_status == null)
                                                                <a href="{{ route('doctor.doctor-accept-case', $case->id) }}"
                                                                    target="_blank"
                                                                    class="btn blue-button Finish-Exchange">Accept</a>

                                                                {{-- <a href="{{route('doctor.doctor-accept-case',$case->id)}}" class="btn blue-button btn-primary">Accept</a> --}}
                                                            @endif
                                                            {{-- <button class="btn Decline">Decline</button><br> --}}
                                                            <a href="{{ route('doctor.cancel-booking', $case->case_id) }}"
                                                                class="btn Decline">Decline</a><br>
                                                            {{-- @if ($case->questions_type == 2)
                                                 <a href="{{route('doctor.chats',$case->case_id)}}" target="_blank" class="btn blue-button Finish-Exchange">Live Video</a>

                                                 @else --}}
                                                            <a href="{{ route('doctor.chats', $case->case_id) }}"
                                                                target="_blank"
                                                                class="btn blue-button Finish-Exchange">Message</a>
                                                            {{-- @endif --}}

                                                        </td>

                                                    </tr>
                                                @endforeach
                                            @endif

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <nav class="mt-3" aria-label="Page navigation example">
                                    {{ $cases->onEachSide(1)->links() }}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>

    </script>
@endsection
