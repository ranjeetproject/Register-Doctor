@extends('frontend.patient.afterloginlayout.app')

@section('content')
    @php
    $time_zone = Auth::user()->profile->time_zone;
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
                                            <td>{{($case->booking_date) ? date('m-d-Y', strtotime($case->booking_date)) : ''}}</td>
                                            <td style="text-align: center;">
                                              {{-- @if($case->getSlot) --}}
                                              @forelse($case->getBookingSlot as $time_slot)
                                              {{-- @dump($time_slot, $time_slot->getSlot, $time_slot->getSlot->start_time) --}}

                                                @if($time_slot->getSlot)
                                                {{-- @dump($time_slot->getSlot->start_time) --}}
                                                    @if ($time_zone ==2)
                                                        {{ date('h:i a', strtotime(timezoneAdjustmentFetch($time_zone, $case->booking_date, $time_slot->getSlot->start_time))) }} <br>to<br> {{ date('h:i a', strtotime(timezoneAdjustmentFetch($time_zone, $case->booking_date, $time_slot->getSlot->end_time))) }} <br>
                                                    @else
                                                    {{ date('h:i a', strtotime($time_slot->getSlot->start_time)) }} <br>to<br> {{ date('h:i a', strtotime($time_slot->getSlot->end_time)) }} <br>
                                                    @endif


                                                @endif
                                              @empty

                                              @endforelse
                                              {{-- @endif --}}
                                            </td>
                                            <td>{{$case->doctor->name}}</td>
                                            <td>{{$case->case_id}}</td>
                                            <td>
                                                @if($case->questions_type == 2)
                                                    @if($case->accept_status == 1)
                                                        <a href="{{route('patient.video-call',$case->case_id)}}" target="_blank">
                                                            Live Video
                                                            <br><img src="{{ asset('public/images/frontend/images/Live-Video-Chat.png')}}" alt="">
                                                            <img src="{{ asset('public/images/frontend/images/Prescriptions.png')}}" alt="">
                                                        </a>
                                                    @else
                                                        Live video
                                                    @endif
                                                @else
                                                    @if($case->accept_status == 1)
                                                    <a href="{{route('patient.chats',$case->case_id)}}">
                                                        @if($case->questions_type == 1)
                                                        Live Chat
                                                        <br><img src="{{ asset('public/images/frontend/images/Live-Text-Chat.png')}}" alt="">
                                                        @endif

                                                        @if($case->questions_type == 2)

                                                        @endif

                                                        @if($case->questions_type == 3)
                                                            Quick Questions
                                                            <br>
                                                            <p>Max 3 Exchanges</p><br>
                                                            <img src="{{ asset('public/images/frontend/images/Quick-Question.png')}}" alt="">
                                                        @endif

                                                        @if($case->questions_type == 4)
                                                        Typed Q&A
                                                        <br>
                                                        <p>Max 3 Exchanges</p><br>
                                                        <img src="{{ asset('public/images/frontend/images/Booked-Question.png')}}" alt="">
                                                        @endif
                                                    </a>
                                                    @else
                                                        @if($case->questions_type == 1)
                                                            Live Chat
                                                            <br>
                                                            <p>Max 3 Exchanges</p>
                                                        @endif

                                                        @if($case->questions_type == 2)

                                                        @endif

                                                        @if($case->questions_type == 3)
                                                            Quick Questions
                                                            <br>
                                                            <p>Max 3 Exchanges</p>
                                                        @endif

                                                        @if($case->questions_type == 4)
                                                            Typed Q&A
                                                            <br>
                                                            <p>Max 3 Exchanges</p>
                                                        @endif
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                              @if($case->accept_status == 1)
                                              <font style="font-size: 18px;">Confirmed</font> <br>
                                                <strong style="font-size: 20px;">{{date('d F Y', strtotime($case->booking_date))}}


                                              @else
                                                @if($case->status == 3)
                                                Canceled
                                                @else
                                                Pending
                                                @endif
                                              @endif

                                          </td>

                                          <td>
                                              @if(($case->case_type == 2) && ($case->questions_type == 3))
                                                <a href="{{route('patient.accepted-consults',$case->case_id)}}" class="btn btn-sm btn-primary"> Doctors</a>
                                            @endif
                                            @if(($case->questions_type == 2) || ($case->questions_type == 1))
                                                @if($case->status < 3)
                                                    @if($time_slot->getSlot)
                                                        @php
                                                        $start_time = $time_slot->getSlot->start_time;
                                                        @endphp
                                                        @if (getDiffOfTwoDateInMinute($case->booking_date.' '.$start_time) > 4320)
                                                            <a href="{{route('patient.cancel-booking',$case->case_id)}}" class="btn btn-sm btn-primary"> Cancel booking</a>
                                                        @endif
                                                    @endif
                                                @endif
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

@endsection
@section('scripts')
    <script>


    </script>
@endsection
