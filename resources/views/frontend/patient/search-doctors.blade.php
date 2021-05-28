@extends('frontend.patient.afterloginlayout.app')

@section('content')
    <div class="col Post-prescription-right innerpage  Choose-Your-Doctor-page">
        <div class="row">
            <div class="col-sm-12">


                <div class="col Choose-Your-Doctor-right">

                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb Pharmacist-doc-com">
                          <!-- <li class="breadcrumb-item"><a href="#">Dashboard <i class="fal fa-long-arrow-right"></i></a></li> -->
                          <li class="breadcrumb-item active">Choose Your Doctor</li>
                        </ol>
                      </nav>


                      <div class="row">
                          <div class="col-sm-12 prescription-fees text-center">
                            <h2>
                                All prescription fees are inclusive of multiple drugs if clinically indicated
                            </h2>
                            <p>
                                Doctors will only provide a prescription if clinically indicated and will not issue a refund if they decide not prescride a drug Controlled drugs cannot be prescribed. 
                                <a href="#"> Click to see examples</a>
                            </p>    
                          </div>
                      </div>
                      <div class="row my-3 pick-a-prescriber">
                        <div class="col-sm-12">
                            <div class="ask-all-doc">
                                <h3 class="text-center">WE ADVISE THIS OPTION UNLESS YOU HAVE A SPECIFIC DOCTOR IN MIND <img src="images/ex-icon.png" alt="" data-toggle="tooltip" data-placement="top" title="One line Definition"></h3>
                                <div class="d-block ask-all-d">
                                    <div class="ask-a-d">
                                        <span>
                                            ASK ALL DOCTORS
                                        </span>  <img src="images/Hello-icon.png" alt="">
                                    </div>
                                </div>
                                <ul>
                                    <li>
                                        Prescription Request sent to eligible doctors FREE
                                    </li>
                                    <li>
                                        Doctors respond with availability - select one that suits you - standard fee <i class="fas fa-pound-sign"></i> 29.99
                                    </li>
                                    <li>
                                        After consultation prescription is posted to you (take to Pharmacist) or electronically to participating pharmacist.
                                    </li>
                                    <li>
                                        You pay pharmacist for drug <button type="button" onclick="quickQuestions()" class="btn btn-primary Send-Requests">Send Requests</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                      <div class="row my-3 pick-a-prescriber">
                          <div class="col-sm-12 text-center">
                            <h3 class="">PICK A PRESCRIBER <sup><img src="images/ex-icon.png" alt="" data-toggle="tooltip" data-placement="top" title="One line Definition"></sup></h3>
                            <img src="images/Waiting-icon.png" alt="">
                          </div>
                          <div class="col-sm-12">
                              <ul>
                                  <li>
                                    Choose and Book a Doctor
                                  </li>
                                  <li>
                                    Filter by Fees & Specialty e.g. skin specialist, general practitoner
                                  </li>
                                  <li>
                                    After consultation prescription is posted to you(take to any Pharmacist) or electronically to participating pharmacist
                                  </li>
                                  <li>
                                    You pay pharmacist for drug 
                                  </li>
                              </ul>
                          </div>
                      </div>
                   <div class="row tex-center gp-Specialists">
                       <div class="col  d-flex gp-s-det">
                        <p>Most common prescriptions can be given by GOs <br> Specialists might only prescribe in a small field <img src="images/ex-icon.png" alt="" data-toggle="tooltip" data-placement="top" title="One line Definition"> </p>
                        <button type="submit" class="btn btn-primary Send-Requests">Book next online Gp</button>
                       </div>
                   </div>

                  {{--  <div class="row">
                       <div class="col-sm-12">
                        <p>We will send your prescription request to all eligible doctors. <img src="images/ex-icon.png" alt="" data-toggle="tooltip" data-placement="top" title="One line Definition"> <button type="button" onclick="quickQuestions()" class="btn btn-primary Send-Requests">Send Requests</button></p>
                        <p>You can also choose a doctor below.</p>
                       </div>
                   </div> --}}


                   <form>
                    <div class="form-group row Speciality-form">
                      <label class="col col-form-label">Speciality :</label>
                      <div class="col-sm-7">
                        <select class="custom-select mr-sm-2" name="dr_speciality" id="inlineFormCustomSelect">
                            <option value="">Select Speciality </option>
                            <option value="all">All</option>
                            @foreach($doctors_speciality as $doctor_speciality)
                            <option value="{{$doctor_speciality['dr_speciality']}}" {{(isset($_GET['dr_speciality']) && ($_GET['dr_speciality'] == $doctor_speciality['dr_speciality'])) ? 'selected':''}}>{{$doctor_speciality['dr_speciality']}}</option>

                            @endforeach
                          </select>
                      </div>
                      <div class="col">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                      </div>
                      <div class="col-sm-12">
                        <p><img src="images/ex-icon.png" alt="" data-toggle="tooltip" data-placement="top" title="One line Definition"> Do you need a prescription ?</p>
                      </div>

                    </div>

                  </form>

                    <form>
                  <div class="row Short-Filter">
                      <div class="col-sm-12">
                          <hr>
                      </div>

                      @if(isset($_GET['dr_speciality']) && !empty($_GET['dr_speciality']))
                      <input type="hidden" name="dr_speciality" value="{{$_GET['dr_speciality']}}">
                      @endif

                      <div class="col-sm-5">
                        <label class="mr-sm-2">Sort By :</label>
                        <select class="custom-select">
                            <option selected>Ratings</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                          <select class="custom-select" name="price">
                            <option value="">Price</option>
                            <option value="desc">High-Low</option>
                            <option value="asc">Low-High</option>
                          </select>
                      </div>
                      <div class="col-sm-7 pl-md-1">
                        <label class="mr-sm-2">Filter :</label>
                        <select class="custom-select" name="video_consult">
                            <option value="" >Video Consult </option>
                            <option value="live_chat">Live Chat</option>
                            <option value="live_video">Live Video</option>
                            <option value="qa">Q&A</option>
                          </select>
                          <select class="custom-select" name="dr_see">
                            <option value="">adult/kids/both</option>
                            <option value="1">adult</option>
                            <option value="child">kids</option>
                            <option value="both">both</option>
                          </select>
                          <select class="custom-select" name="prescribers">
                            <option value="">Prescribers</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>

                          </select>
                      </div>


                  </div>

                <div class="row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary btn-lg px-5 mb-2">Apply</button>
                    </div>

                </div>

                    </form>

                  <div class="row Doctor-list-details">
                      <div class="col-sm-12">


@if(isset($_GET['dr_speciality']) && !empty($_GET['dr_speciality']))
@forelse ($search_doctors as $doctor)

                        <div class="card">
                            <div class="card-body">
                                <div class="card-body-img">
                                    <img src="{{ $doctor->profile->profile_photo }}" alt="">
                                </div>
                                <div class="card-body-cont">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="reting-and-other-info">
                                                <div class="rating-list">
                                                    <i class="fas fa-star reting"></i>
                                                     <i class="fas fa-star reting"></i>
                                                    <i class="fas fa-star-half-alt reting"></i>
                                                      <i class="fas fa-star"></i>
                                                      <i class="fas fa-star"></i>
                                                      <span>0.4</span>

                                                      <i id='doctor_{{$doctor->id}}' class="fas fa-heart {{ (getFavDoc($doctor->id)) ? 'marks':''}}" style="cursor: pointer;" onclick="addToFavorite({{$doctor->id}});" data-toggle="tooltip" title="Add To Favorite"></i>
                                                </div>
                                                <div class="rating-list-bottom">
                                                    <i class="far fa-thumbs-up reting"></i>
                                                    <i class="far fa-thumbs-up reting"></i>

                                                </div>

                                                <a href="{{route('patient.view-doctor-profile',Crypt::encryptString($doctor->id))}}" class="btn blue-button rating-list-profile">Full Profile</a>
                                            </div>
                                            <h5 class="card-title">{{ $doctor->forename.' '.$doctor->surname }}<br><small> {{ $doctor->profile->dr_speciality }}</small> </h5>
                                            <p>{{ $doctor->profile->dr_qualifications }}</p>
                                            <p>Location  : {{ $doctor->profile->address }}</p>
                                            <p>Language    : English,hindi </p>
                                            <p>Communication : {{ ($doctor->profile->dr_live_chat_fee_notification == 1) ? 'Live Chat,':'' }} {{ ($doctor->profile->dr_live_video_fee_notification == 1) ? ' Live Video,':'' }}{{ ($doctor->profile->dr_qa_fee_notification == 1) ? ' Typed Q&A,':'' }}</p>
                                            <p>Sees : {{ $doctor->profile->dr_see }}</p>
                                            <p>Prescriber online : {{ (!empty($doctor->admin_verified_at)) ? 'Yes':'No'}} </p>

                                        </div>

                                    </div>
                                    <div class="row books-btn">
                                        <div class="col">
                                            <p><i class="fas fa-pound-sign"></i> {{ $doctor->profile->dr_live_chat_fee }} per 15 mins</p>
                                            <a href="{{route('patient.view-doctor-profile',Crypt::encryptString($doctor->id))}}" class="btn btn-block Book-Live">Book Live Chat</a>
                                        </div>
                                        <div class="col">
                                            <p><i class="fas fa-pound-sign"></i> {{ $doctor->profile->dr_live_video_fee }} per 15 mins</p>

                                            <a href="{{route('patient.view-doctor-profile',Crypt::encryptString($doctor->id))}}" class="btn btn-block Book-Live">Book Live Video</a>
                                            {{-- <button type="submit" class="btn btn-block Book-Live">Book Live Video</button> --}}
                                        </div>
                                        <div class="col-sm-5">
                                            <p><i class="fas fa-pound-sign"></i> {{ $doctor->profile->dr_qa_fee }} per 15 mins</p>
                                            <button type="button"  onclick="bookLiveChats('{{$doctor->id}}')" class="btn btn-block Request">Request Q&A <br> <small>Turnaround Time 5 hrs 2 days</small></button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                          </div>

@empty
    <p>No Doctor Found</p>
@endforelse

@else



{{-- ******************************* --}}
                   @forelse ($doctors as $doctor)
                        <div class="card">
                            <div class="card-body">
                                <div class="card-body-img">
                                    <img src="{{ $doctor->profile->profile_photo }}" alt="">
                                </div>
                                <div class="card-body-cont">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="reting-and-other-info">
                                                <div class="rating-list">
                                                    <i class="fas fa-star reting"></i>
                                                     <i class="fas fa-star reting"></i>
                                                    <i class="fas fa-star-half-alt reting"></i>
                                                      <i class="fas fa-star"></i>
                                                      <i class="fas fa-star"></i>
                                                      <span>0.4</span>
                                                      <i id='doctor_{{$doctor->id}}' class="fas fa-heart marks" style="cursor: pointer;" onclick="addToFavorite({{$doctor->id}});" data-toggle="tooltip" title="Add To Favorite"></i>
                                                </div>
                                                <div class="rating-list-bottom">
                                                    <i class="far fa-thumbs-up reting"></i>
                                                    <i class="far fa-thumbs-up reting"></i>

                                                </div>
                                                 <a href="{{route('patient.view-doctor-profile',Crypt::encryptString($doctor->id))}}" class="btn blue-button rating-list-profile">Full Profile</a>
                                            </div>
                                            <h5 class="card-title">{{ $doctor->forename.' '.$doctor->surname }}<br><small> {{ $doctor->profile->dr_speciality }}</small> </h5>
                                            <p>{{ $doctor->profile->dr_qualifications }}</p>
                                            <p>Location  : {{ $doctor->profile->address }}</p>
                                            <p>Language    : English,hindi </p>
                                            <p>Communication : {{ ($doctor->profile->dr_live_chat_fee_notification == 1) ? 'Live Chat,':'' }} {{ ($doctor->profile->dr_live_video_fee_notification == 1) ? ' Live Video,':'' }}{{ ($doctor->profile->dr_qa_fee_notification == 1) ? ' Typed Q&A,':'' }}</p>
                                            <p>Sees : {{ $doctor->profile->dr_see }}</p>
                                            <p>Prescriber online : {{ (!empty($doctor->admin_verified_at)) ? 'Yes':'No'}} </p>

                                        </div>

                                    </div>
                                    <div class="row books-btn">
                                        <div class="col">
                                            <p><i class="fas fa-pound-sign"></i> {{ $doctor->profile->dr_live_chat_fee }} per 15 mins</p>
                                            <a href="{{route('patient.view-doctor-profile',Crypt::encryptString($doctor->id))}}" class="btn btn-block Book-Live">Book Live Chat</a>
                                        </div>
                                        <div class="col">
                                            <p><i class="fas fa-pound-sign"></i> {{ $doctor->profile->dr_live_video_fee }} per 15 mins</p>
                                            <a href="{{route('patient.view-doctor-profile',Crypt::encryptString($doctor->id))}}" class="btn btn-block Book-Live">Book Live Video</a>
                                        </div>
                                        <div class="col-sm-5">
                                            <p><i class="fas fa-pound-sign"></i> {{ $doctor->profile->dr_qa_fee }} per 15 mins</p>
                                            <button type="button" onclick="bookLiveChats('{{$doctor->id}}')" class="btn btn-block Request">Request Q&A <br> <small>Turnaround Time 5 hrs 2 days</small></button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                          </div>

@empty
    <p>No Doctor Found</p>
@endforelse

@endif




                    <div class="col-sm-12">
                        @if(isset($_GET['dr_speciality']) && !empty($_GET['dr_speciality']))
                        {{-- {{$search_doctors->links()}} --}}
                        {{$search_doctors->links()}}
                        @else
                        {{$doctors->links()}}

                        {{-- {{$doctors->links()}} --}}

                        @endif
                    </div>


                  </div>
                </div>
            </div>



        </div>
    </div>




    {{-- model --}}

    {{-- <div class="modal fade bd-example-modal-lg how-it-works" tabindex="-1" id="myModal3" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="fal fa-times-circle"></i>
              </button>
            <form method="POST" action="{{route('patient.create-case')}}" enctype="multipart/form-data">

                @csrf
                <input type="hidden" name="questions_type" value="4">
                <input type="hidden" name="doctor_id" id="doctor_id">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <textarea class="form-control" name="health_problem" id="exampleFormControlTextarea1" rows="5" placeholder="Type your helth query here..."></textarea>
                          </div>                        
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Upload Attachments <i class="fal fa-paperclip"></i></label>
                            <input type="file" name="case_file" class="form-control-file" id="exampleFormControlFile1" ><br> <img  data-toggle="tooltip" data-placement="right" title="" data-original-title="One line definition" src="images/ex-icon.png" alt="">
                          </div>
                         
                    </div>
                    <div class="col-sm-12 ask-submit">
                        <button type="submit" class="btn orange-button">Submit Your Query</button>
                    </div>
                </div>

            </form>
        </div>
        </div>
      </div> --}}


      <div class="modal fade Ask-Question2" id="Ask-Question" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Request for Prescription</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        {{-- <form class="modal-body"> --}}


          <form class="modal-body" method="POST" action="{{route('patient.create-case')}}" enctype="multipart/form-data">

                @csrf
                <input type="hidden" name="questions_type" value="3">
                <input type="hidden" name="doctor_id" id="doctor_id">
                <input type="hidden" name="case_type" value="2">

                

                <div class="row">
                  <div class="col-sm-12 mb-2">
                    <h5>
                      Type your prescription request here
                    </h5>
                    <p>
                      e.g I think I have a tooth abscess (photo attached),<br>
No fever, usually gets better on antibiotics, Quite painful, What should take?
                    </p>
                  </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <textarea class="form-control"  name="health_problem" id="exampleFormControlTextarea1" rows="5" placeholder="Type your helth query here..."></textarea>
                          </div>                        
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Upload Attachments <i class="fal fa-paperclip"></i></label>
                            <input type="file" name="case_file" class="form-control-file" id="exampleFormControlFile1"><br> <img  data-toggle="tooltip" data-placement="right" title="" data-original-title="One line definition" src="images/ex-icon.png" alt="">
                          </div>
                         
                    </div>
                    <div class="col-sm-12 mb-2">
                      <p>If there is any specific medicine you have in mind you may mention it here.</p>
                    </div>
                      <div class="col-sm-12">
                          <div class="form-group">
                              <textarea class="form-control" name="medicine_name" id="exampleFormControlTextarea1" rows="5" placeholder="Type here..."></textarea>
                            </div>                        
                      </div>
                      <div class="col-sm-12 mb-2">
                        <p>The doctor will prescribe what he feels is the most appropriate medicine</p>
                      </div>
                    <div class="col-sm-12 ask-submit">
                        <button type="submit" class="btn orange-button">Submit Your Query</button>
                    </div>
                </div>
        </form>
      </div>
        </div>
      </div>


<div class="modal fade Ask-Question" id="Ask-Question" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Request for Prescription</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        {{-- <form class="modal-body"> --}}


          <form class="modal-body" method="POST" action="{{route('patient.create-case')}}" enctype="multipart/form-data">

                @csrf
                <input type="hidden" name="questions_type" value="4">
                <input type="hidden" name="case_type" value="2">

                <div class="row">
                  <div class="col-sm-12 mb-2">
                    <h5>
                      Type your prescription request here
                    </h5>
                    <p>
                      e.g I think I have a tooth abscess (photo attached),<br>
No fever, usually gets better on antibiotics, Quite painful, What should take?
                    </p>
                  </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <textarea class="form-control"  name="health_problem" id="exampleFormControlTextarea1" rows="5" placeholder="Type your helth query here..."></textarea>
                          </div>                        
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Upload Attachments <i class="fal fa-paperclip"></i></label>
                            <input type="file" name="case_file" class="form-control-file" id="exampleFormControlFile1"><br> <img  data-toggle="tooltip" data-placement="right" title="" data-original-title="One line definition" src="images/ex-icon.png" alt="">
                          </div>
                         
                    </div>
                    <div class="col-sm-12 mb-2">
                      <p>If there is any specific medicine you have in mind you may mention it here.</p>
                    </div>
                      <div class="col-sm-12">
                          <div class="form-group">
                              <textarea class="form-control" name="medicine_name" id="exampleFormControlTextarea1" rows="5" placeholder="Type here..."></textarea>
                            </div>                        
                      </div>
                      <div class="col-sm-12 mb-2">
                        <p>The doctor will prescribe what he feels is the most appropriate medicine</p>
                      </div>
                    <div class="col-sm-12 ask-submit">
                        <button type="submit" class="btn orange-button">Submit Your Query</button>
                    </div>
                </div>
        </form>
      </div>
        </div>
      </div>

      {{-- <div class="modal fade bd-example-modal-lg how-it-works" tabindex="-1" id="myModal4" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="fal fa-times-circle"></i>
              </button>
            <form method="POST" action="{{route('patient.create-case')}}" enctype="multipart/form-data">

                @csrf
                <input type="hidden" name="questions_type" value="3">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <textarea class="form-control" name="health_problem" id="exampleFormControlTextarea1" rows="5" placeholder="Type your helth query here..."></textarea>
                          </div>                        
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Upload Attachments <i class="fal fa-paperclip"></i></label>
                            <input type="file" name="case_file" class="form-control-file" id="exampleFormControlFile1" ><br> <img  data-toggle="tooltip" data-placement="right" title="" data-original-title="One line definition" src="images/ex-icon.png" alt="">
                          </div>
                         
                    </div>
                    <div class="col-sm-12 ask-submit">
                        <button type="submit" class="btn orange-button">Submit Your Query</button>
                    </div>
                </div>

            </form>
        </div>
        </div>
      </div>
 --}}

@endsection
@section('scripts')
    <script>
            function addToFavorite(doctorId) {
                 // var _token = $('input[name="_token"]').val();
             $.ajax({
                url: "{{route('patient.add-to-favorite')}}",
                type:'get',
                dataType: "json",
                // data:{state:state,type:type,_token:token}
                data:{ doctor_id:doctorId}
                }).done(function(response) {
                    if(typeof response != "undefined" && response.success){
                     if(response.data == '1'){
                      $('#doctor_'+doctorId).addClass('marks');
                     }else if(response.data == '2'){
                      $('#doctor_'+doctorId).removeClass('marks');
                     }

                     toastr.success(response.message);
                    }
                });
            }


            function bookLiveChats(doctor_id) {
               $('.Ask-Question2').modal('show');
               $('#doctor_id').val(doctor_id);
            }

            function quickQuestions() {
               $('.Ask-Question').modal('show');
            }

    </script>
@endsection