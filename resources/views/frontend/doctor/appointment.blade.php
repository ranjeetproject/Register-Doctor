@extends('frontend.doctor.afterloginlayout.app')

@section('content')
    <div class="col Choose-Your-Doctor-right innerpage  Prescriptions-Dispensed-page">
        <div class="row">
            <div class="col-sm-12">
                <div class="col Prescriptions-Dispensed-right">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb Pharmacist-doc-com">
                            <li class="breadcrumb-item active">Appointment</li>
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
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table class="table Prescriptions-Dispensed-table">
                                      <thead>
                                          <tr>

                                              <td>Date</td>
                                              <td>Time</td>
                                              <td>Communication</td>
                                              <td>type</td>
                                              <td>Patient’s<br> Name  </td>
                                              <td>Case No.</td>
                                              <td> View <br>Case</td>
                                              <td>View Medical <br>Record</td>
                                              <td style="min-width: 250px;"> Action</td>

                                          </tr>
                                      </thead>
                                      <tbody>
                                         @foreach ($cases as $case)

                                         <tr >
                                            <td>{{date('m-d-Y', strtotime($case->booking_date))}}</td>

                                            <td>
                                              @forelse($case->getBookingSlot as $time_slot)
                                                @if($time_slot->getSlot) {{ date('h:i a', strtotime($time_slot->getSlot->start_time)) }} -- @endif @if($time_slot->getSlot) {{ date('h:i a', strtotime($time_slot->getSlot->end_time)) }} @endif
                                              <br>

                                              @empty

                                              @endforelse
                                             </td>

                                            <td>
                                                @if($case->questions_type == 2)
                                                    @if($case->booking_date==date('Y-m-d'))
                                                    <a href="{{route('doctor.video-call',$case->case_id)}}" target="_blank">
                                                        Live Video
                                                        <br><img src="{{ asset('public/images/frontend/images/Live-Video-Chat.png')}}" alt="">
                                                        <img src="{{ asset('public/images/frontend/images/Prescriptions.png')}}" alt="">
                                                    </a>
                                                    @elseif($case->booking_date < date('Y-m-d') )
                                                        Your appointment date was {{ $case->booking_date }}
                                                    @else
                                                        Your appointment date is {{ $case->booking_date }}
                                                    @endif
                                                @else

                                                    <a href="{{route('doctor.chats',$case->case_id)}}">
                                                    @if($case->questions_type == 1)
                                                    Live Chat
                                                    <br><img src="{{ asset('public/images/frontend/images/Live-Text-Chat.png')}}" alt="">
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
                                              @endif
                                            </td>

                                            <td>
                                                 @if($case->case_type == 2)
                                                Prescriptions

                                                @endif

                                             </td>
                                           <td>{{$case->user->name}}</td>
                                            <td>{{$case->case_id}}</td>

                                            <td><a href="{{route('doctor.view-case',$case->case_id)}}"><i class="fal fa-eye"></i></a></td>
                                            <td><a href="{{route('doctor.view-medical-recorde',$case->case_id)}}"><i class="fal fa-eye"></i></a></td>

                                            <td class="masg-dep-tol">

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
                                <nav aria-label="Page navigation example">
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
