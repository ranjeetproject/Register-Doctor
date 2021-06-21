@extends('frontend.patient.afterloginlayout.app')

@section('content')
    <div class="col Post-prescription-right Incoming-Prescription-Requests-page">
        <div class="row">
            <div class="col-sm-12">
               
                <div class="col Incoming-Prescription-Requests-right">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb Pharmacist-doc-com">
                          <!-- <li class="breadcrumb-item"><a href="#">Dashboard <i class="fal fa-long-arrow-right"></i></a></li> -->
                          <li class="breadcrumb-item active">Requested Consultations - Case ID - {{ $case->case_id }}</li>
                        </ol>
                      </nav>
                    <div class="for-w-100 Incoming-Prescription-Requests-right-table">
                        <div class="row">
                            <div class="col-sm-8">
                                <form class="form-inline">
                                    <div class="form-group">
                                      <label>Show</label>
                                      <select class="form-control">
                                        <option>6</option>
                                        <option>12</option>
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
                                    <table class="table but-pading">
                                      <thead>
                                          <tr>
                                              <td>Date</td>
                                              <td style="text-align: center;">Timing</td>
                                              <td>Doctor<br>Name</td>
                                              <td style="text-align: center;">Communication</td>
                                              <td>View</td>
                                              <td>Status</td>
                                              <td>Action</td>
                                          </tr>
                                      </thead>
                                      <tbody>
 @forelse ($case->getAccepedDoctor as $doctor)

@php
$table_row = 0;
if($doctor->doctor->profile->dr_live_chat_fee_notification == 1){
    $table_row++;
}
if($doctor->doctor->profile->dr_live_video_fee_notification == 1){
    $table_row++;
}
if($doctor->doctor->profile->dr_qa_fee_notification == 1){
    $table_row++;
}
@endphp


                            @if($doctor->doctor->profile->dr_live_chat_fee_notification == 1)
                                        <tr>
                                            <td rowspan="{{$table_row}}">{{($case->booking_date) ? date('m-d-Y', strtotime($case->booking_date)) : ''}}</td>
                                            <td style="text-align: center;" rowspan="{{$table_row}}">
                                                @forelse($case->getBookingSlot as $time_slot)

                                              {{ date('h:i a', strtotime($time_slot->getSlot->start_time)) }} <br>to<br> {{ date('h:i a', strtotime($time_slot->getSlot->end_time)) }} <br>

                                              @empty

                                              @endforelse </td>
                                            <td rowspan="{{$table_row}}">{{$doctor->doctor->name}}</td>
                                            <td style="text-align: center;">Prescriptin <br><a href="#">Live Chat</a><br><img src="images/Live-Text-Chat.png" alt=""><img src="images/Prescriptions.png" alt=""></td>
                                            
                                            <td><a href="{{route('patient.view-case',$case->case_id)}}"><i class="fal fa-eye"></i></a></td>
                                      
                                            <td class="masg-dep-tol"> <strong style="display: block;font-size: 20px;color: blue;text-align: center;width: 100%;">Prescription request Acepted <br>Pick this Doctor</strong><br>
                                                <font style="font-size: 18px;">Take Time Slot: 

                                                    @php 
                                                    $nearest_day = getNearestSlot($doctor->doctor->id);
                                                      if(isset($nearest_day->start_time) && isset($nearest_day->availableDays->date)){
  $date_time = date('d M Y', strtotime($nearest_day->availableDays->date)).' '.date('h:i a', strtotime($nearest_day->start_time)).' to '.date('h:i a', strtotime($nearest_day->end_time));
}else{
   $date_time = 'No date found';
}
                                                    @endphp

                                                    {{$date_time}}<br>
                                                    or Book Slot in Doctor Calender <img src="images/calander.png" alt=""></font> </td>
                                        <td>
                                            @if(isset($nearest_day->id))
                                            <form action="{{route('patient.accept-doctor')}}" method="post">
                                             <input type="hidden" name="doctor_id" value="{{$doctor->doctor->id}}"> 
                                              <input type="hidden" name="case_id" value="{{$case->id}}">
                                                <input type="hidden" name="slot_id" value="{{$nearest_day->id ?? ''}}">
                                                <input type="hidden" name="booking_date" value="{{$nearest_day->availableDays->date ?? ''}}">
                                                <input type="hidden" name="comu_type" value="1">
                                                <button type="submit" class="btn btn-primary">Accept</button>
                                                
                                            </form>
                                            @endif
                                        </td>
                                        </tr>
                                        @endif

                        @if($doctor->doctor->profile->dr_live_video_fee_notification == 1)

                                        <tr >
                                           
                                            <td style="text-align: center;">Prescriptin <br><a href="#">Live Video</a><br><img src="images/Live-Video-Chat.png" alt=""><img src="images/Prescriptions.png" alt=""></td>
                                            
                                            <td><a href="{{route('patient.view-case',$case->case_id)}}"><i class="fal fa-eye"></i></a></td>
                                      
                                            <td class="masg-dep-tol"> <strong style="display: block;font-size: 20px;color: blue;text-align: center;width: 100%;">Prescription request Acepted <br>Pick this Doctor</strong><br>
                                                <font style="font-size: 18px;">Take Time Slot: {{$date_time}}<br>
                                                    or Book Slot in Doctor Calender <img src="images/calander.png" alt=""></font> </td>
                                        </tr>
                                        @endif
                        @if($doctor->doctor->profile->dr_qa_fee_notification == 1)
                                        <tr >
                                            
                                           <td style="text-align: center;">Prescriptin <br>Typed Q & A<br>
                                            <a href="#">Max 3 Exchanges</a><br>
                                            <img src="images/Booked-Question.png" alt=""><img src="images/Prescriptions.png" alt=""></td>
                                            
                                            <td><a href="{{route('patient.view-case',$case->case_id)}}"><i class="fal fa-eye"></i></a></td>
                                      
                                            <td class="masg-dep-tol">
                                                <strong style="display: block;font-size: 20px;color: blue;text-align: center;width: 100%;">Prescription request Acepted <br>Pick this Doctor</strong><br>
                                                <font style="font-size: 18px;">TMaximum Turnaround Time: 36 hrs</font> 
                                            </td>
                                        </tr>
                                @endif


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
   
@endsection
@section('scripts')
    <script>
        

    </script>
@endsection