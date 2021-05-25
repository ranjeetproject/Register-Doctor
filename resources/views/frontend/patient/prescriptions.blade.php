@extends('frontend.patient.afterloginlayout.app')

@section('content')
    <div class="col Post-prescription-right Incoming-Prescription-Requests-page">
        <div class="row">
            <div class="col-sm-12">
               
               <div class="col Your-Prescriptions-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb Pharmacist-doc-com">
                          <!-- <li class="breadcrumb-item"><a href="#">Dashboard <i class="fal fa-long-arrow-right"></i></a></li> -->
                          <li class="breadcrumb-item active">Prescriptions</li>
                        </ol>
                      </nav>
                     <div class="for-w-100 Incoming-Prescription-Requests-right-table">
                        <nav class="nav nav-pills flex-column flex-sm-row" role="tablist">
                            <a class="flex-sm-fill text-sm-center nav-link active" data-toggle="tab" href="#Requests">Requests<img src="images/ex-icon.png" alt=""></a>
                            <a class="flex-sm-fill text-sm-center nav-link"  data-toggle="tab" href="#Accepted-Upcoming">Accepted - Upcoming<img src="images/ex-icon.png" alt=""></a>
                            <a class="flex-sm-fill text-sm-center nav-link" data-toggle="tab" href="#Prescriptions-Ready">Prescriptions Ready<img src="images/ex-icon.png" alt=""></a>
                        </nav>
                        <div class="tab-content">
                            <div class="tab-pane fade show active " id="Requests" >
                                <div class="row">
                                    <div class="col-sm-8">
                                        <form class="form-inline">
                                            <div class="form-group">
                                              <label>Show</label>
                                              <select class="form-control">
                                                <option>6</option>
                                              </select>
                                              <span>entries</span>
                                            </div>
                                          </form>
                                    </div>
                                    <div class="col-sm-4">
                                        <form action="">
                                            <input type="text"  class="form-control"  placeholder="Search...">
                                        </form>
                                    </div>
        
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table">
                                              <thead>
                                                  <tr>
                                                      <td>Date </td>
                                                      <td style="text-align: center;">Deadline</td>
                                                      <td>Doctor’s Name </td>
                                                      <td>Case No.</td>
                                                      <td>Communication</td>
                                                      <td> View</td>
                                                      <td>Reply</td>
                                                  </tr>
                                              </thead>
                                              <tbody>

                                                 @forelse ($cases as $case)
                                                <tr>
                                                    <td>{{date('m-d-Y', strtotime($case->booking_date))}}</td>
                                                    <td style="text-align: center;">
                                                      @forelse($case->getBookingSlot as $time_slot)

                                              {{ date('h:i a', strtotime($time_slot->getSlot->start_time)) }} <br>to<br> {{ date('h:i a', strtotime($time_slot->getSlot->start_time)) }} <br>

                                              @empty

                                              @endforelse
                                                      </td>
                                                  <td>{{$case->doctor->name}}</td>
                                            <td>{{$case->case_id}}</td>
                                                    <td>
                                                        Prescription<br>
                                                       <a href="{{route('patient.chats',$case->case_id)}}">@if($case->questions_type == 1)
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
                                              </a><br>
                                                        
                                                    </td>
                                                    <td>
                                                        <a href="#"><i class="fal fa-eye"></i></a>
                                                    </td>
                                              
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
                                            <ul class="pagination justify-content-end">
                                              <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                              </li>
                                              <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                                              <li class="page-item clickabled">
                                                <a class="page-link" href="#">Next</a>
                                              </li>
                                            </ul>
                                          </nav>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="Accepted-Upcoming">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <form class="form-inline">
                                            <div class="form-group">
                                              <label>Show</label>
                                              <select class="form-control">
                                                <option>6</option>
                                              </select>
                                              <span>entries</span>
                                            </div>
                                          </form>
                                    </div>
                                    <div class="col-sm-4">
                                        <form action="">
                                            <input type="text"  class="form-control"  placeholder="Search...">
                                        </form>
                                    </div>
        
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table">
                                              <thead>
                                                  <tr>
                                                      <td>Date </td>
                                                      <td style="text-align: center;">Deadline</td>
                                                      <td>Doctor’s Name </td>
                                                      <td>Case No.</td>
                                                      <td>Communication</td>
                                                      <td> View</td>
                                                      <td>Reply</td>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                 @forelse ($accepted_cases as $case)
                                                <tr>
                                                    <td>{{date('m-d-Y', strtotime($case->booking_date))}}</td>
                                                    <td style="text-align: center;">
                                                      @forelse($case->getBookingSlot as $time_slot)

                                              {{ date('h:i a', strtotime($time_slot->getSlot->start_time)) }} <br>to<br> {{ date('h:i a', strtotime($time_slot->getSlot->start_time)) }} <br>

                                              @empty

                                              @endforelse
                                                      </td>
                                                  <td>{{$case->doctor->name}}</td>
                                            <td>{{$case->case_id}}</td>
                                                    <td>
                                                        Prescription<br>
                                                       <a href="{{route('patient.chats',$case->case_id)}}">@if($case->questions_type == 1)
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
                                              </a><br>
                                                        
                                                    </td>
                                                    <td>
                                                        <a href="#"><i class="fal fa-eye"></i></a>
                                                    </td>
                                              
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
                                            <ul class="pagination justify-content-end">
                                              <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                              </li>
                                              <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                                              <li class="page-item clickabled">
                                                <a class="page-link" href="#">Next</a>
                                              </li>
                                            </ul>
                                          </nav>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Prescriptions-Ready">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <form class="form-inline">
                                            <div class="form-group">
                                              <label>Show</label>
                                              <select class="form-control">
                                                <option>6</option>
                                              </select>
                                              <span>entries</span>
                                            </div>
                                          </form>
                                    </div>
                                    <div class="col-sm-4">
                                        <form action="">
                                            <input type="text"  class="form-control"  placeholder="Search...">
                                        </form>
                                    </div>
        
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table">
                                              <thead>
                                                  <tr>
                                                      <td>Date </td>
                                                      <td >Time <br>Written</td>
                                                      <td>Doctor<br>Name & Details</td>
                                                      <td>Patient’s<br>Name</td>
                                                      <td> Case No.  </td>
                                                      <td>Prescription<br>No</td>
                                                      
                                                      <td> View<br>Prescription </td>
                                                      <td>Action<br>Click to Send Prescription</td>
                                                  </tr>
                                                  
                                              </thead>
                                              <tbody>
                                                 @forelse ($accepted_cases as $case)
                                                <tr>
                                                    <td>{{date('m-d-Y', strtotime($case->booking_date))}}</td>
                                                    <td style="text-align: center;">
                                                      @forelse($case->getBookingSlot as $time_slot)

                                              {{ date('h:i a', strtotime($time_slot->getSlot->start_time)) }} <br>to<br> {{ date('h:i a', strtotime($time_slot->getSlot->start_time)) }} <br>

                                              @empty

                                              @endforelse
                                                      </td>
                                                  <td>{{$case->doctor->name}}</td>
                                            <td>{{$case->case_id}}</td>
                                                    <td>
                                                        Prescription<br>
                                                       <a href="{{route('patient.chats',$case->case_id)}}">@if($case->questions_type == 1)
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
                                              </a><br>
                                                        
                                                    </td>
                                                    <td>
                                                        <a href="#"><i class="fal fa-eye"></i></a>
                                                    </td>
                                              
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
                                            <ul class="pagination justify-content-end">
                                              <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                              </li>
                                              <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                                              <li class="page-item clickabled">
                                                <a class="page-link" href="#">Next</a>
                                              </li>
                                            </ul>
                                          </nav>
                                    </div>
                                </div>
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