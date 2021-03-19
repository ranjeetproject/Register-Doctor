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
                       <div class="col-sm-12">
                        <div class="card Choose-Your-Doctor-card-cont">
                            <div class="card-body">
                              <h5 class="card-title">You have 3 options to consult a doctor:</h5>
                                <p><strong>Live Video -</strong> book 15 min live time slots with a doctor</p> 
                                <p><strong>Live Chat -</strong> book 15 min live time slots with a doctor</p> 
                                <p><strong>Typed Q&A -</strong> not live - Send Question, Get Answer. Book 15 min time slots of doctor's time for him
                                to answer question. View turnaround times of doctors. Max 3 exchanges.</p>
                            </div>
                          </div>
                       </div>
                   </div>
                   <form>
                    <div class="form-group row Speciality-form">
                      <label class="col col-form-label">Speciality :</label>
                      <div class="col-sm-7">
                        <select class="custom-select mr-sm-2" name="dr_speciality" id="inlineFormCustomSelect">
                            <option value="">Select Speciality </option>
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
                        <label class="mr-sm-2">Short By :</label>
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
                      <div class="col-sm-7">
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
                  <button type="submit" class="btn btn-primary btn-sm float-right">Apply</button>
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
                                            <button type="submit" class="btn btn-block Book-Live">Book Live Chat</button>
                                        </div>
                                        <div class="col">
                                            <p><i class="fas fa-pound-sign"></i> {{ $doctor->profile->dr_live_video_fee }} per 15 mins</p>
                                            <button type="submit" class="btn btn-block Book-Live">Book Live Video</button>
                                        </div>
                                        <div class="col-sm-5">
                                            <p><i class="fas fa-pound-sign"></i> {{ $doctor->profile->dr_qa_fee }} per 15 mins</p>
                                            <button type="submit" class="btn btn-block Request">Request Q&A <br> <small>Turnaround Time 5 hrs 2 days</small></button>
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
                                    <img src="{{ $doctor->doctor->profile->profile_photo }}" alt="">
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
                                                      <i id='doctor_{{$doctor->doctor->id}}' class="fas fa-heart marks" style="cursor: pointer;" onclick="addToFavorite({{$doctor->doctor->id}});" data-toggle="tooltip" title="Add To Favorite"></i>
                                                </div>
                                                <div class="rating-list-bottom">
                                                    <i class="far fa-thumbs-up reting"></i>
                                                    <i class="far fa-thumbs-up reting"></i>
                                                    
                                                </div>
                                                 <a href="{{route('patient.view-doctor-profile',Crypt::encryptString($doctor->doctor->id))}}" class="btn blue-button rating-list-profile">Full Profile</a>
                                            </div>
                                            <h5 class="card-title">{{ $doctor->forename.' '.$doctor->surname }}<br><small> {{ $doctor->doctor->profile->dr_speciality }}</small> </h5>
                                            <p>{{ $doctor->doctor->profile->dr_qualifications }}</p>
                                            <p>Location  : {{ $doctor->doctor->profile->address }}</p>
                                            <p>Language    : English,hindi </p>
                                            <p>Communication : {{ ($doctor->doctor->profile->dr_live_chat_fee_notification == 1) ? 'Live Chat,':'' }} {{ ($doctor->doctor->profile->dr_live_video_fee_notification == 1) ? ' Live Video,':'' }}{{ ($doctor->doctor->profile->dr_qa_fee_notification == 1) ? ' Typed Q&A,':'' }}</p>
                                            <p>Sees : {{ $doctor->doctor->profile->dr_see }}</p>
                                            <p>Prescriber online : {{ (!empty($doctor->admin_verified_at)) ? 'Yes':'No'}} </p>
                                            
                                        </div>

                                    </div>
                                    <div class="row books-btn">
                                        <div class="col">
                                            <p><i class="fas fa-pound-sign"></i> {{ $doctor->doctor->profile->dr_live_chat_fee }} per 15 mins</p>
                                            <button type="submit" class="btn btn-block Book-Live">Book Live Chat</button>
                                        </div>
                                        <div class="col">
                                            <p><i class="fas fa-pound-sign"></i> {{ $doctor->doctor->profile->dr_live_video_fee }} per 15 mins</p>
                                            <button type="submit" class="btn btn-block Book-Live">Book Live Video</button>
                                        </div>
                                        <div class="col-sm-5">
                                            <p><i class="fas fa-pound-sign"></i> {{ $doctor->doctor->profile->dr_qa_fee }} per 15 mins</p>
                                            <button type="submit" class="btn btn-block Request">Request Q&A <br> <small>Turnaround Time 5 hrs 2 days</small></button>
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

    </script>
@endsection