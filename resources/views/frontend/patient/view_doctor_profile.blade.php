@extends('frontend.patient.afterloginlayout.app')

@section('content')
    <div class="col Post-prescription-right innerpage  Doctor-Profile-what-patient-views-page">
        <div class="row">
            <div class="col-sm-12">
               
                


                <div class="col Choose-Your-Doctor-right">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb Pharmacist-doc-com">
                          <li class="breadcrumb-item"><a href="javascript:void(0)">Doctor Profile</a></li>
                        </ol>
                    </nav>


                    <form action="{{route('patient.create-case')}}" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="profile-image">
                                    <img src="{{$doctor->profile->profile_photo}}" alt="">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                      <p><span>Name : </span>{{$doctor->forename.' '.$doctor->surname}}</p>
                                      <p><span>Speciality or Interest : </span> {{$doctor->profile->dr_speciality}}</p>
                                      <p><span>About : </span> {{$doctor->profile->about}}</p>
                                      <p><span>Experience : </span>  {{ $doctor->profile->dr_experience }}</p>
                                      <p><span>Qualifications : </span> DM - Neurology, MD - General Medicine, MBBS</p>
                                      <p><span>Prescribes Online : </span> {{ (!empty($doctor->admin_verified_at)) ? 'Yes':'No'}}</p>
                                      <p><span>Sees : </span> {{ $doctor->profile->dr_see }}</p>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="blank-card">
                                    <h4>Select Communication Options</h4>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="questions_type" onclick="$('#book_slot').show();" id="exampleRadios1" value="2">
                                        <label class="form-check-label" for="exampleRadios1">
                                            Live Video: Price : {{$doctor->profile->dr_live_video_fee}}  per 15 mins Check availability in Calendar below
                                        </label>
                                    </div>
                                     <div class="form-check">
                                        <input class="form-check-input" type="radio" name="questions_type" onclick="$('#book_slot').show();" id="exampleRadios2" value="1">
                                        <label class="form-check-label" for="exampleRadios2">
                                            Live Chat : Price : {{$doctor->profile->dr_live_chat_fee}}  per 15 mins  Check availability in Calendar below
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="questions_type" onclick="$('#book_slot').hide(); $('#case_details').show();" id="exampleRadios2" value="4">
                                        <label class="form-check-label" for="exampleRadios2">
                                            Typed Q & A: Price: {{$doctor->profile->dr_qa_fee}}  per 15 mins This doctor's turnaround time : 8 days 
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="blank-card">
                                    <h4>Ratings</h4>
                                    <div class="reting-and-other-info">
                                        <div class="rating-list">
                                            <i class="fas fa-star-half-alt reting"></i> 
                                            <i class="fas fa-star reting"></i>
                                             <i class="fas fa-star reting"></i>
                                              <i class="fas fa-star"></i>
                                              <i class="fas fa-star"></i>
                                              <span>0.4</span>
                                              <i class="fas fa-heart {{ (getFavDoc($doctor->id)) ? 'marks':''}}"></i>
                                        </div>
                                        <div class="rating-list-bottom">
                                            <i class="far fa-thumbs-up reting"></i>
                                            <i class="far fa-thumbs-up reting"></i>
                                        </div>
                                        <p>Comments:</p>
                                    </div>
                                </div>
                            </div>






                            <div id="book_slot">

                            <div class="col-sm-12">
                                <div class="blank-card">
                                    <h4>Check Doctor's Availability <img src="images/ex-icon.png" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line Definition"></h4>
                                </div>
                            </div>


                            <div class="col-sm-12 Timezone-cl-top">
                                    <label>Confirm your Timezone <sup>*</sup></label>
                                    <select class="custom-select my-1 mr-sm-2"  required>
                                        <option selected>GMT</option>
                                        <option value="1">France GTM -1</option>
                                        <option value="2">Turkay GTM -3</option>
                                      </select>
                                      <span><sup>*</sup>Mandatory</span>
                            </div>


                            <div class="calanderilest">
                                <div class="row for-box-sad">



                                    <div class="col-lg-4 col-md-4 col-sm-12 calend_status">
                                   <h2 class="show_date">{!!date('l',strtotime(now())) .'  '. date('F d Y',strtotime(now()))!!}</h2>
                                                <h3>Doctor Availability :<br>
                                                <span class="show_time">
                                                  @foreach($get_current_day as $current_day)
                                                  {{date('H:i a', strtotime($current_day->from_time))}} - {{date('H:i a', strtotime($current_day->to_time))}}
                                                  @endforeach
                                                </span></h3>
                                    </div>


                                    <div class="col-lg-8 col-md-8 col-sm-12">
                                          <div class="responsive-calendar">
                                            <div class="controls">
                                                <a class="pull-left" data-go="prev"><i class="fas fa-caret-left"></i></a>
                                                <h4><span data-head-month></span> <span data-head-year></span> </h4>
                                                <a class="pull-right" data-go="next"><i class="fas fa-caret-right"></i></a>
                                            </div>
                                            <div class="day-headers">
                                              <div class="day header">Mon</div>
                                              <div class="day header">Tue</div>
                                              <div class="day header">Wed</div>
                                              <div class="day header">Thu</div>
                                              <div class="day header">Fri</div>
                                              <div class="day header">Sat</div>
                                              <div class="day header">Sun</div>
                                            </div>
                                            <div class="days" data-group="days">
                                              
                                            </div>
                                          </div>
                                          <div class="Available-days"><span>Available days</span></div>
                                    </div>


                                </div>
                                <div class="row Available-table-details">
                                    <div class="col-sm-12">
                                        <h4 class="Available-Time">Available Timesolots</h4>
                                    </div>
                                    <div class="col-sm-12">
                                        <table border="0"> 
                                            <thead>
                                                <tr>
                                                    <th>Day</th>
                                                    <th>From</th>
                                                    <th>Till</th>
                                                    <th style="text-align: center;">Select <img src="images/ex-icon.png" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line Definition"></th>
                                                </tr>
                                            </thead>
                                            <tbody id="time_slot">

                                              @foreach($get_current_day as $current_day)
                                              @foreach($current_day->getSlot as $slot)

                                                <tr>
                                                    <td>{!!date('l',strtotime($current_day->date)) .'  '. date('F d Y',strtotime($current_day->date))!!}
                                                      </td>
                                                    <td>{{date('h:i a', strtotime($slot->start_time))}}</td>
                                                    <td>{{date('h:i a', strtotime($slot->end_time))}}</td>
                                                    <td style="text-align: center;"><input type="checkbox" name="time_slot[]" onclick="caseDetails()" value="Bike"></td>
                                                </tr>
                                                @endforeach
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div>

                                    
                                    
                                </div>
                            </div>
                          </div>



                          <div class="col-sm-12 mt-3">
                                    <div id="case_details" style="display: none;">

                                      @csrf

                                      <input type="hidden" name="booking_date" id="booking_date" value="{{date('Y-m-d')}}">
                                      <input type="hidden" name="doctor_id" value=" {{ Crypt::decryptString(Request::segment(3)) }}">

                                      <div class="form-group">
                                        <textarea placeholder="Type your health query here " class="form-control" name="health_problem" rows="6" required></textarea>
                                      </div>

                                      <div class="form-group">
                            <label for="exampleFormControlFile1">Upload Attachments <i class="fal fa-paperclip"></i></label>
                            <input type="file" name="case_file" class="form-control-file" id="exampleFormControlFile1" style="opacity: 0;"><br> <img  data-toggle="tooltip" data-placement="right" title="" data-original-title="One line definition" src="images/ex-icon.png" alt="">
                          </div>
                                    </div>
                                    </div>



                                    <div class="submit-btn col-sm-12">
                                        <button type="submit" class="btn blue-button">Book Now</button>
                                    </div>





                        </div>
                    </form>
                </div>
                </div>




            </div>
            </div>
        </div>
    </div>
   
@endsection
@push('scripts')

<script type="text/javascript">
      $(document).ready(function () {
       
         
        $(".responsive-calendar").responsiveCalendar({
          time: '{{date('Y-m')}}',
          events: {
            @foreach($available_days as $available_day)
        "{{$available_day->date}}":{ },
        @endforeach
        }
        });
       
      });
       $(window).on('load', function() {
         $(".day a").click(function (){
        var day = $(this).data('day');
        var year = $(this).data('year');
        var month = $(this).data('month');
        day = (day<=9) ? '0'+day : day;
        month = (month<=9) ? '0'+month : month;
        var date = day+'/'+month+'/'+year;
        $('#myModal2').modal('show');
        $('#date').val(date);
        var fromDate = new Date(year+'-'+month+'-'+day);
        var formatedDate = new Date(fromDate).toDateString();
        // alert(formatedDate);
                    $('#booking_date').val(date);


        $.ajax({
                url: "{{route('patient.doctor-available-day')}}",
                type:'get',
                dataType: "json",
                // data:{state:state,type:type,_token:token}
                data:{ date:date, doctor_id: '{{ Crypt::decryptString(Request::segment(3)) }}'}
                }).done(function(response) {
                    if(typeof response != "undefined" && response.success){
                    $('.show_date').html(formatedDate);
                      var available_time = '';
                      $.each(response.data, function(index, value) {
                      console.log(value.date);
                      available_time += value.from_time+'-'+value.to_time;
                      available_time +='<br>';
                      });
                    $('.show_time').html(available_time);
                    $('#time_slot').html(response.time_slot);


                    }
                });
         });
      
         
});


       function caseDetails() {
         $('#case_details').show();
       }
    </script>
    
@endpush