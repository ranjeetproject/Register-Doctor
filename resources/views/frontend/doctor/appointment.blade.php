@extends('frontend.doctor.afterloginlayout.app')

@section('content')
    <div class="col-lg-9 Choose-Your-Doctor-right innerpage  Prescriptions-Dispensed-page">
        <div class="row">
            <div class="col-sm-12">
                <div class="Prescriptions-Dispensed-right">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb Pharmacist-doc-com">
                            <li class="breadcrumb-item active">Appointment</li>
                        </ol>
                      </nav>
                      @php
                    //   $time_zone = Auth::user()->profile->time_zone;
                      $time_zone = d_timezone();
                  @endphp
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
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table class="table Prescriptions-Dispensed-table">
                                      <thead>
                                          <tr>

                                              <td>Date</td>
                                              <td>Time</td>
                                              <td>Appointment</td>
                                              <td>type</td>
                                              <td>Patient’s<br> Name  </td>
                                              <td>Case No.</td>
                                              <td> View <br>Case</td>
                                              <td>View Medical <br>Record</td>
                                              <td style="min-width: 130px;"> Action</td>

                                          </tr>
                                      </thead>
                                      <tbody>

                                         @foreach ($cases as $case)

                                         <tr >
                                            <td>{{date('dS M Y', strtotime($case->booking_date))}}</td>

                                            <td>
                                              @forelse($case->getBookingSlot as $time_slot)
                                                @if($time_slot->getSlot)
                                                @php
                                                    $start_time = $time_slot->getSlot->start_time;
                                                @endphp
                                                {{-- @if ($time_zone == 2) --}}
                                                {{ date('H:i a', strtotime(timezoneAdjustmentFetch($time_zone,$case->booking_date,$time_slot->getSlot->start_time))) }} -

                                                {{-- @else
                                                {{ date('h:i a', strtotime($time_slot->getSlot->start_time)) }} --
                                                @endif --}}
                                                @endif
                                                @if($time_slot->getSlot)
                                                {{-- @if ($time_zone == 2) --}}
                                                {{ date('H:i a', strtotime(timezoneAdjustmentFetch($time_zone,$case->booking_date,$time_slot->getSlot->end_time))) }}

                                                {{-- @else
                                                {{ date('h:i a', strtotime($time_slot->getSlot->end_time)) }}
                                                @endif --}}


                                                @endif
                                              <br>

                                              @empty

                                              @endforelse
                                             </td>

                                            <td>
                                                @if($case->questions_type == 2)
                                                    @if($case->booking_date==date('Y-m-d'))
                                                    <a href="{{route('doctor.video-call',$case->case_id)}}" target="_blank">
                                                        Start Live Video Calling
                                                        <br><img src="{{ asset('public/images/frontend/images/live-video-icon.png')}}" alt="">
                                                        {{-- <img src="{{ asset('public/images/frontend/images/Prescriptions.png')}}" alt=""> --}}
                                                    </a>
                                                    @elseif($case->booking_date < date('Y-m-d') )
                                                         {{ date('dS M Y', strtotime($case->booking_date)) }}
                                                    @else
                                                         {{ date('dS M Y', strtotime($case->booking_date)) }}
                                                    @endif
                                                @else

                                                    <a href="{{route('doctor.chats',$case->case_id)}}">
                                                    @if($case->questions_type == 1)
                                                    Start Live Chat
                                                    <br><img src="{{ asset('public/images/frontend/images/live-g-chat-icon.png')}}" alt="">
                                                    @endif



                                                    @if($case->questions_type == 3)
                                                    Typed Quick Questions
                                                    <br>
                                                    <p>Max 3 Exchanges</p><br>
                                                    <img src="{{ asset('public/images/frontend/images/QQ-icon.png')}}" width="32" alt="">
                                                    @endif

                                                    @if($case->questions_type == 4)
                                                    Booked Q&A
                                                    <br>
                                                    <p>Max 3 Exchanges</p><br>
                                                    <img src="{{ asset('public/images/frontend/images/QA-icon.png')}}"  width="32" alt="">
                                                    @endif
                                                </a>
                                              @endif
                                            </td>

                                            <td>
                                                 @if($case->case_type == 2)
                                                Prescriptions

                                                @endif

                                             </td>
                                           <td>{{$case->user->name}}</td>
                                            <td>{{$case->case_id}}</td>

                                            <td><a href="{{route('doctor.view-case',$case->case_id)}}"><img src="{{ asset('public/images/frontend/images/view-icon.png')}}" width="26" alt=""></a></td>
                                            <td><a href="{{route('doctor.view-medical-recorde',$case->case_id)}}"><img src="{{ asset('public/images/frontend/images/view-icon.png')}}" width="26" alt=""></a></td>

                                            <td class="masg-dep-tol apt-btn-group">
                                                @if(!empty($start_time))
                                                @if (getDiffOfTwoDateInMinute($case->booking_date . ' ' . $start_time) < 0)
                                                <a href="{{ route('doctor.sick-note',$case->case_id) }}" class="btn btn-sm btn-primary">Sick note</a>
                                                <a  href="{{ route('doctor.create-prescription',$case->case_id) }}"><img src="{{ asset('public/images/frontend/images/Prescription-icon.png')}}" alt="" width="20"/></a>

                                                @endif
                                                @else
                                                @endif
                                             </td>

                                        </tr>

                                         @endforeach




                                      </tbody>
                                    </table>
                                  </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <nav class="mt-3" aria-label="Page navigation example">
                                     {{ $cases->links() }}
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
