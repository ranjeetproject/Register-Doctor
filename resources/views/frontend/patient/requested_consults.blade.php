@extends('frontend.patient.afterloginlayout.app')

@section('content')
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
                                <form action="">
                                    <input type="text" class="form-control" placeholder="Search...">
                                </form>
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
                                        <tr>
                                            <td>{{($case->booking_date) ? date('m-d-Y', strtotime($case->booking_date)) : ''}}</td>
                                            <td style="text-align: center;">
                                              {{-- @if($case->getSlot) --}}
                                              @forelse($case->getBookingSlot as $time_slot)

                                              {{ date('h:i a', strtotime($time_slot->getSlot->start_time)) }} <br>to<br> {{ date('h:i a', strtotime($time_slot->getSlot->end_time)) }} <br>

                                              @empty

                                              @endforelse
                                              {{-- @endif --}}
                                            </td>
                                            <td>{{$case->doctor->name}}</td>
                                            <td>{{$case->case_id}}</td>
                                            <td><a href="{{route('patient.chats',$case->case_id)}}">
                                                @if($case->questions_type == 1)
                                                Live Chat
                                                <br><img src="{{ asset('public/images/frontend/images/Live-Text-Chat.png')}}" alt="">
                                                @endif

                                                @if($case->questions_type == 2)
                                                Live Video
                                                <br><img src="{{ asset('public/images/frontend/images/Live-Video-Chat.png')}}" alt=""> <img src="{{ asset('public/images/frontend/images/Prescriptions.png')}}" alt="">
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
                                              </a></td>
                                            <td>
                                              @if($case->accept_status == 1)
                                              <font style="font-size: 18px;">Confirmed</font> <br>
                                                <strong style="font-size: 20px;">{{date('d F Y', strtotime($case->booking_date))}} 

                                                    

                                              @else
                                               Pending 
                                              @endif
                                          </td>

                                          <td>
                                              @if(($case->case_type == 2) && ($case->questions_type == 3))
<a href="{{route('patient.accepted-consults',$case->case_id)}}" class="btn btn-sm btn-primary"> Doctors</a>
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