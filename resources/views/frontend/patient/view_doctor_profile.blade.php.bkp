@extends('frontend.patient.afterloginlayout.app')

@section('content')
    <div class="col Post-prescription-right innerpage  Detailed-Doctor-Profile-page">
        <div class="row">
            <div class="col-sm-12">
               
                <div class="col Choose-Your-Doctor-right">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb Pharmacist-doc-com">
                          <li class="breadcrumb-item"><a href="javascript:void(0)">Choose a Doctor</a></li>
                        </ol>
                      </nav>
                   
                  <form >
                    <div class="row Doctor-list-details">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-body-img">
                                        <img src="{{$doctor->profile->profile_photo}}" alt="">
                                    </div>
                                    <div class="card-body-cont">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h5 class="card-title">{{$doctor->forename.''.$doctor->surname}}<br><small> {{$doctor->profile->dr_speciality}}</small> </h5>
                                                <p>{{$doctor->profile->about}}</p>
                                            <a href="#" class="heart-sign"><i class="fas fa-heart {{ (getFavDoc($doctor->id)) ? 'marks':''}}"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row books-btn">
                                    <div class="col">
                                        <p><i class="fas fa-pound-sign"></i> {{$doctor->profile->dr_live_chat_fee}} per 15 mins</p>
                                        <button type="submit" class="btn btn-block Book-Live">Book Live Chat</button>
                                    </div>
                                    <div class="col">
                                        <p><i class="fas fa-pound-sign"></i> {{$doctor->profile->dr_live_video_fee}} per 15 mins</p>
                                        <button type="submit" class="btn btn-block Book-Live">Book Live Video</button>
                                    </div>
                                    <div class="col-sm-5">
                                        <p><i class="fas fa-pound-sign"></i> {{$doctor->profile->dr_qa_fee}} per 15 mins</p>
                                        <button type="submit" class="btn btn-block Request">Request Q&A <br> <small>Turnaround Time 5 hrs 2 days</small></button>
                                    </div>
                                </div>
                                <ul class="nav nav-tabs doc-details-tab" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-toggle="tab" href="#Working-Hours" role="tab" aria-controls="home" aria-selected="true">Working Hours</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-toggle="tab" href="#Experience" role="tab" aria-controls="profile" aria-selected="false">Experience</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-toggle="tab" href="#Qualifications" role="tab" aria-controls="contact" aria-selected="false">Qualifications</a>
                                    </li>
                                </ul>
                                <div class="tab-content doc-details-cont" id="myTabContent ">
                                    <div class="tab-pane fade show active" id="Working-Hours" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="for-top-cont">
                                            <h3>Schedule of Working Hours</h3>
                                            <p>Areas of clinical interest include women's mental health and neuropsychiatric disorders, including memory problems and elderly issues. She has a number of national and international awards, has contributed chapters to multiple psychiatric books and has more than 50 research</p>
                                        </div>
                                        <table class="table table-striped doc-details-table">
                                            <tbody>
                                              <tr>
                                                <td>Tue  --  Sat :</td>
                                                <td>06:00 PM - 08:00 PM</td>
                                              </tr>
                                              <tr>
                                                <td>mon  :</td>
                                                <td>06:00 PM - 08:00 PM</td>
                                              </tr>
                                              <tr>
                                                <td>sun :</td>
                                                <td>closed</td>
                                              </tr>
                                            </tbody>
                                          </table>
                                          <div class="for-bottom-cont">
                                            <p><strong>This doctor also has ad hoc slots. Please book an appointment above to see all available slots.</strong></p>
                                          </div>
                                    </div>
                                    <div class="tab-pane fade" id="Experience" role="tabpanel" aria-labelledby="profile-tab">{{$doctor->profile->dr_experience}}</div>
                                    <div class="tab-pane fade" id="Qualifications" role="tabpanel" aria-labelledby="contact-tab">{{$doctor->profile->dr_qualifications}}</div>
                                </div>
                                
                                </div>
                        </div>
                    </div>
                  </form>
                  
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