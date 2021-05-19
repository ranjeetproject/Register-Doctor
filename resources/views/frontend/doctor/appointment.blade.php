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
                                              <td>Issued</td>
                                              <td>Patient’s<br> Name  </td>
                                              <td>Case No.</td>
                                              <td> View <br>Case</td>
                                              <td>View Medical <br>Record</td>
                                              <td> Prescription No.</td>
                                              <td style="min-width: 250px;"> Action</td>
                                              <td >Delete</td>
                                          </tr>
                                      </thead>
                                      <tbody>

                                         @foreach ($cases as $case)

                                         <tr >
                                            <td>{{date('m-d-Y', strtotime($case->booking_date))}}</td>
                                            <td>
                                              @forelse($case->getBookingSlot as $time_slot)

                                              {{ date('h:i a', strtotime($time_slot->getSlot->start_time)) }} -- {{ date('h:i a', strtotime($time_slot->getSlot->start_time)) }} <br>

                                              @empty

                                              @endforelse
                                             </td>
                                           <td>{{$case->user->name}}</td>
                                            <td>{{$case->case_id}}</td>
                                            
                                            <td><a href="{{route('doctor.view-case',$case->case_id)}}"><i class="fal fa-eye"></i></a></td>
                                            <td><a href="{{route('doctor.view-medical-recorde',$case->case_id)}}"><i class="fal fa-eye"></i></a></td> 
                                            <td></td>
                                            <td class="masg-dep-tol">
                                                <button class="btn Decline p-btn"><img src="{{ asset('public/images/frontend/images/P-icon.png')}}" alt=""><span>Open<br>Prescription</span></button> 
                                                <button class="btn Decline p-btn"><img src="{{ asset('public/images/frontend/images/P-icon.png')}}" alt=""><span>Print<br>Prescription</span></button><br>
                                                <a href="#"  target="_blank" class="btn blue-button btn-block Print-GP-Note">Print GP Note</a>
                                             </td>
                                             <td>
                                               <a href="#" style="background: #f2f2f2; color: #f00" target="_blank" class="btn  btn-block Print-GP-Note"><i class="fa fa-trash" aria-hidden="true"></i>
                                               </a>
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