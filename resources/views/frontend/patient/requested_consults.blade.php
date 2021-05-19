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
                                        </tr>
                                      </thead>
                                      <tbody>
                                         @forelse ($cases as $case)
                                        <tr>
                                            <td>{{date('m-d-Y', strtotime($case->booking_date))}}</td>
                                            <td>
                                              {{-- @if($case->getSlot) --}}
                                              @forelse($case->getBookingSlot as $time_slot)

                                              {{ date('h:i a', strtotime($time_slot->getSlot->start_time)) }} -- {{ date('h:i a', strtotime($time_slot->getSlot->start_time)) }} <br>

                                              @empty

                                              @endforelse
                                              {{-- @endif --}}
                                            </td>
                                            <td>{{$case->doctor->name}}</td>
                                            <td>{{$case->case_id}}</td>
                                            <td><a href="{{route('patient.chats',$case->case_id)}}">@if($case->questions_type == 1)
                                                Live Chat
                                                @endif

                                                @if($case->questions_type == 2)
                                                Live Video
                                                @endif

                                                 @if($case->questions_type == 3)
                                                Quick Questions
                                                @endif

                                                @if($case->questions_type == 4)
                                                Typed Q&A
                                                @endif
                                              </a></td>
                                            <td>
                                              @if($case->accept_status == 1)
                                              Accepted
                                              @else
                                               Pending 
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