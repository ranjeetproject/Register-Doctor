@extends('frontend.doctor.afterloginlayout.app')

@section('content')
    <div class="col Choose-Your-Doctor-right Doctor-Manage-Account-Profile-page">
        <div class="row">
            <div class="col-sm-12">

                <ul class="nav Choose-Your-tab" id="myTab" role="tablist">
                    {{-- <li class="nav-item">
                    <a class="nav-link "   href="Detailed-Doctor-Profile.html">
                        Doctor Profile
                        </a>
                    </li> --}}
                    <li class="nav-item">
                    <a class="nav-link {{($form_name == 'profile') ? 'active':''}}"  data-toggle="tab" href="#Manage-Profile">
                        Manage Profile
                        </a>
                    </li>
                    <li style="font-size: 14px;">
                        {{-- <a data-toggle="tab" href="#Payment-Details"> --}}
                            To Change password <a href="{{route('doctor.change-password')}}" style="padding: 0px; font-size: 14px; display:inline;">Click here</a>
                        {{-- </a> --}}
                        {{-- <div class="col-sm-12 Mandator">
                            <label>Change password to <a href="{{route('doctor.change-password')}}">Click here</a>  </label>
                        </div> --}}
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{($form_name == 'account') ? 'active':''}}"   data-toggle="tab" href="#Payment-Details">
                            Payment Details
                        </a>
                    </li>
                   {{--  <li class="nav-item">
                        <a class="nav-link {{($form_name == 'contact_details') ? 'active':''}}"  data-toggle="tab" href="#Contact-Details">
                            Contact Details
                        </a>
                    </li> --}}
                </ul>
                <div class="tab-content Choose-Your-tab-con" id="myTabContent">
                    <div class="tab-pane fade " id="Doctor-Profile">


                    </div>
                    <div class="tab-pane fade {{($form_name == 'profile') ? 'show active':''}} input-effect" id="Manage-Profile" >
                        <form method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="Doctor-contact main-form-fild">

                                <div class="bg-light-blue cmn-card-box padding-20 margin-bottom-20">
                                    <div class="profile-header-bx mb-4">
                                        <div class="profile-image-bx">
                                            <div class="profile-image-upload">
                                            <img id="blah" src="{{ $user->profile->profile_photo }}">
                                            </div>
                                            <div class="profile-image-upload-btn">
                                                <input type="file" name="profile_photo" id="imgInp">
                                                <span><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                        </div>
                                        <div class="profile-info">
                                            <h2>Manage your Diary in the Calendar Below.</h2>
                                            <a class="btn btn-primary" href="{{route('doctor.available-days')}}">Calender</a>
                                            {{-- <a class="btn add-btn" id="chng_time_zone">Change Timezone</a> --}}
                                            {{-- <a href="{{route('doctor.available-days')}}" class="btn add-btn" >Ad Hoc Timeslots</a> --}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group required has-float-label">
                                                <input name="forename" class="form-control {{!empty($user->forename) ? 'has-content':''}} " type="text" value="{{$user->forename}}" id="forename" placeholder="Enter Forename">
                                                <label for="forename">Forename</label>
                                            </div>
                                            @error('forename')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group required has-float-label">
                                                <input class="form-control {{!empty($user->surname) ? 'has-content':''}}" name="surname" type="text" value="{{$user->surname}}" id="surname" placeholder="Surname">
                                                <label for="surname">Surname</label>

                                            </div>

                                            @error('forename')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group required has-float-label multiOpt-input-field">
                                                {{-- <input class="form-control {{!empty($user->profile->dr_speciality) ? 'has-content':''}}" type="text"  name="dr_speciality" value="{{$user->profile->dr_speciality}}" id="specialityorinterest" placeholder="Speciality or Interest"> --}}
                                                <select class="form-control {{!empty($user->profile->dr_speciality) ? 'has-content':''}}" name="dr_speciality[]" multiple="multiple" id="multiOpt">
                                                    <option value="">Select Speciality or Interest</option>
                                                    @foreach ($speciality as $special)
                                                        <option value="{{ $special->id }}" @if(in_array($special->id,$dr_specialties)) {{'Selected'}} @endIf>{{ $special->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="specialityorinterest">Speciality or Interest <img src="{{ asset('public/images/frontend/images/ex-icon.png') }}" class="info-si-icon" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line definition"></label>
                                            @error('dr_speciality')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-light-blue cmn-card-box padding-20 margin-bottom-20">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group has-float-label">
                                                <textarea class="form-control {{!empty($user->profile->about) ? 'has-content':''}}" name="about" rows="4" id="about" placeholder="About">{{$user->profile->about}}</textarea>
                                                <label for="about">About </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group has-float-label">
                                                <input class="form-control {{!empty($user->profile->dr_experience) ? 'has-content':''}}" name="dr_experience" type="text"  value="{{$user->profile->dr_experience}}" id="experience" placeholder="Experience">
                                                <label for="experience">Experience</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group has-float-label">
                                                <input class="form-control {{!empty($user->profile->dr_qualifications) ? 'has-content':''}}" type="text" name="dr_qualifications" value="{{$user->profile->dr_qualifications}}" id="qualifications" placeholder="Qualifications">
                                                <label for="qualifications">Qualifications</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group required has-float-label">
                                                <input class="form-control {{!empty($user->profile->dr_medical_license_no) ? 'has-content':''}}" type="text" name="dr_medical_license_no" value="{{$user->profile->dr_medical_license_no}}" id="mln" placeholder="Medical License No. (National/State)">
                                                <label for="mln">Medical License No. (National/State)</label>
                                            @error('dr_medical_license_no')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group required has-float-label">
                                                <input class="form-control {{!empty($user->profile->dr_name_of_medical_licencer) ? 'has-content':''}}" type="text" name="dr_name_of_medical_licencer" value="{{$user->profile->dr_name_of_medical_licencer}}" id="nml" placeholder="Name of Medical Licencer">
                                                <label for="nml">Name of Medical Licencer</label>
                                                @error('dr_name_of_medical_licencer')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group has-float-label">
                                                <input class="form-control {{!empty($user->registration_number) ? 'has-content':''}}" type="text" name="dr_registered_no" value="{{$user->registration_number}}" id="rdn" placeholder="Registered-Doctor No." readonly>
                                                <label for="rdn">Registered-Doctor No.</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group Tick-one ">
                                                <div class="form-check form-check-inline">
                                                    <label class="Tick-lab"><sup>*</sup> Tick one or both - Do you see</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="dr_see" id="inlineRadio1" value="adult" {{($user->profile->dr_see == 'adult' || $user->profile->dr_see == '') ? 'checked':'' }}>
                                                <span class="dot"><span></span></span>
                                                <label class="form-check-label" for="inlineRadio1">Adult</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="dr_see" id="inlineRadio2" value="child" {{($user->profile->dr_see == 'child') ? 'checked':'' }} >
                                                    <span class="dot"><span></span></span>
                                                    <label class="form-check-label" for="inlineRadio2">Child</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="dr_see" id="inlineRadio3" value="both" {{($user->profile->dr_see == 'both') ? 'checked':'' }} >
                                                    <span class="dot"><span></span></span>
                                                    <label class="form-check-label" for="inlineRadio3">Both</label>
                                                </div>
                                            @error('dr_see')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="bg-light-blue cmn-card-box padding-20 margin-bottom-20">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <p><sup>*</sup>Mandatory in case you need to be contacted eg by Pharmacist, Admin</p>
                                        </div>
                                        <div class="col-sm-12 mt-2">
                                            <div class="form-group Communication">
                                                <label> <img src="{{ asset('public/images/frontend/images/Communication-icon.png') }}" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line definition"> Contact Details</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 mb-2">
                                            <label>The following details will not be available to patients :</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group required has-float-label">
                                                <input class="form-control {{!empty($user->profile->telephone1) ? 'has-content':''}}" name="telephone1" value="{{$user->profile->telephone1}}" type="tel" id="cpn1" placeholder="Contact Phone No. 1">
                                                <label for="cpn1">Contact Phone No. 1</label>
                                            @error('telephone1')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>

                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group has-float-label">
                                                <input class="form-control {{!empty($user->profile->telephone2) ? 'has-content':''}}"  name="telephone2" value="{{$user->profile->telephone2}}"  type="tel" id="cpn2" placeholder="Contact Phone No. 2">
                                                <label for="cpn2">Contact Phone No. 2 </label>
                                            @error('telephone2')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group required has-float-label">
                                                <textarea class="form-control {{!empty($user->profile->address) ? 'has-content':''}}" name="address" rows="5" id="professionaladdres" placeholder="Professional Address">{{$user->profile->address}}</textarea>
                                                <label for="professionaladdres">Professional Address </label>
                                            @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-light-blue cmn-card-box padding-20 margin-bottom-20">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group Communication">
                                                <label> <img src="{{ asset('public/images/frontend/images/Communication-icon.png') }}" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line definition"> Communication Options</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 mb-2">
                                            <div class="form-group">
                                                <label> <img src="{{ asset('public/images/frontend/images/notification.png') }}" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line definition">Type Quick Question</label>
                                                <div class="row all-question-list">
                                                    <div class="col aql-comm">
                                                        Standard Rate per 15 mins : &nbsp;&nbsp;<i class="fas fa-pound-sign"></i><input class="form-control " type="text"  name="dr_standard_fee" value="{{@$quick_question_cost->set_quick_question_cost}}" readonly>
                                                        {{-- First Doctor to Take Case --}}
                                                        Doctor response time {{ $quick_question_cost->set_quick_question_time_doctor }} Hours
                                                    </div>
                                                </div>
                                                <div class="Notifications-on-of">
                                                    <input type="checkbox" name="dr_standard_fee_notification" class="form-check-input" value="0" {{($user->profile->dr_standard_fee_notification == 0) ? 'checked':''}}>
                                                    <img src="{{ asset('public/images/frontend/images/notification.png') }}" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line definition"> <span>Notifications </span> <div class="on-and-off {{($user->profile->dr_standard_fee_notification == 0) ? 'of':'on'}}"><span></span></div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        <div class="col-sm-12 mb-2">
                                            <div class="form-group">
                                                <label> <img src="{{ asset('public/images/frontend/images/notification.png') }}" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line definition"> Live Video</label>
                                                <div class="row all-question-list">
                                                    <div class="col aql-comm">
                                                        <input type="checkbox" class="" disabled>  Set your own Rate : &nbsp;&nbsp;<i class="fas fa-pound-sign"></i><input class="form-control " type="text" name="dr_live_video_fee"  value="{{$user->profile->dr_live_video_fee}}">  Set availability in Your Calendar above
                                                    </div>
                                                </div>
                                                <div class="Notifications-on-of">
                                                    <input type="checkbox" name="dr_live_video_fee_notification" class="form-check-input" value="0" {{($user->profile->dr_live_video_fee_notification == 0) ? 'checked':''}} >
                                                    <img src="{{ asset('public/images/frontend/images/notification.png') }}" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line definition"> <span>Notifications </span> <div class="on-and-off {{($user->profile->dr_live_video_fee_notification == 0) ? 'of':'on'}}"><span></span></div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        <div class="col-sm-12 mb-2">
                                            <div class="form-group">
                                                <label> <img src="{{ asset('public/images/frontend/images/notification.png') }}" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line definition"> Live Chat</label>
                                                <div class="row all-question-list">
                                                    <div class="col aql-comm">
                                                        <input type="checkbox" name="" class="" disabled>  Set your own Rate : &nbsp;&nbsp;<i class="fas fa-pound-sign"></i><input class="form-control " type="text"  name="dr_live_chat_fee" value="{{$user->profile->dr_live_chat_fee}}">  Set availability in Your Calendar above
                                                    </div>
                                                </div>
                                                <div class="Notifications-on-of">
                                                    <input type="checkbox" name="dr_live_chat_fee_notification" class="form-check-input" value="0" {{($user->profile->dr_live_chat_fee_notification == 0) ? 'checked':''}}>
                                                    <img src="{{ asset('public/images/frontend/images/notification.png') }}" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line definition"> <span>Notifications </span> <div class="on-and-off {{($user->profile->dr_live_chat_fee_notification == 0) ? 'of':'on'}}"><span ></span></div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        <div class="col-sm-12 mb-2">
                                            <div class="form-group">
                                                <label> <img src="{{ asset('public/images/frontend/images/notification.png') }}" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line definition"> Booked Q&A</label>
                                                <div class="row all-question-list">
                                                    <div class="col aql-comm">
                                                        <input type="checkbox" class="" disabled>  <span style="white-space: nowrap;">Set your own Rate :&nbsp;&nbsp;<i class="fas fa-pound-sign"></i></span> <input class="form-control " name="dr_qa_fee" type="text" value="{{$user->profile->dr_qa_fee}}" > Set your max turnaround time
                                                        for response in Hours or Days

                                                        @php
                                                        $get_dr_turnaround_time = explode(' ',$user->profile->dr_turnaround_time);
                                                        // print_r($get_dr_turnaround_time);
                                                        @endphp

                                                        <select class="form-control  form-control -lg" name="dr_turnaround_time">
                                                            @for($i = 1; $i <= 10; $i++)
                                                            <option value="{{$i}}" {{(isset($get_dr_turnaround_time[0]) && $get_dr_turnaround_time[0]==$i) ? 'selected':''}}>{{$i}}</option>
                                                            @endfor
                                                        </select> or <select class="form-control  form-control -lg" name="dr_turnaround_time_type">
                                                            <option value="days" {{( isset($get_dr_turnaround_time[1]) && $get_dr_turnaround_time[1]=='days') ? 'selected':''}}>Days</option>
                                                            <option value="hours" {{(isset($get_dr_turnaround_time[1]) && $get_dr_turnaround_time[1]=='hours') ? 'selected':''}}>Hours</option>

                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="Notifications-on-of">
                                                    <input type="checkbox" class="form-check-input" name="dr_qa_fee_notification" value="0" {{($user->profile->dr_qa_fee_notification == 0) ? 'checked':''}}>
                                                    <img src="{{ asset('public/images/frontend/images/notification.png') }}" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line definition"> <span>Notifications </span> <div class="on-and-off {{($user->profile->dr_qa_fee_notification == 0) ? 'of':'on'}}"><span></span></div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label> <img src="{{ asset('public/images/frontend/images/notification.png') }}" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line definition"> Tick to offer prescription online (only UK Doctors)</label>
                                                <div class="row all-question-list">
                                                    <div class="col aql-comm">
                                                        <input type="checkbox" class="" >
                                                        {{-- Upload Signature <input class="form-control " type="text"  name="dr_signature" value="{{$user->profile->dr_signature}}"> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <p class="Prescriptions-dt">
                                                    <strong>
                                                        Prescriptions are assumed to take up to 15 mins. If more time is needed request the patient to book a longer time slot before you accept the case.
                                                    </strong>
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="bg-light-blue cmn-card-box padding-20">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <h4>Ratings</h4>
                                                <label>Your Current Star Ratings from Patients No. Cumulative Median rating</label><br>
                                                <div class="ratings">
                                                    <div class="empty-stars"></div>
                                                    @php
                                                    $review_array = reviewCalc(Auth::user()->id);
                                                        $rating = $review_array[0];
                                                        $rating_percent = ($rating/5)*100;
                                                    @endphp
                                                    <div class="full-stars" style="width:{{ $rating_percent }}%"></div>
                                                    <div class="ratings-out-txt">{{$rating}} out of {{5}}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <h4>Reviews</h4>
                                                <ul class="dr-reviews-list">
                                            @foreach($twoReviews as $val)
                                                @php
                                                    $user = getUserDetails($val['user_id']);
                                                @endphp
                                                    <li>
                                                        <h4>{{$user->name}}</h4>
                                                        <p>{{$val['review']}}</p>
                                                    </li>
                                            @endforeach
                                                </ul>
                                            <a href="{{ route('doctor.all-dr-review')}}" class="btn btn-sm dr-btn-readmore">Read More</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label> <img src="{{ asset('public/images/frontend/images/notification.png') }}" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line definition"> Comments</label>
                                                <div class="Notifications-on-of">
                                                    <input type="checkbox" name="dr_ratings_comments" class="form-check-input" value="0" {{($user->profile->dr_ratings_comments == 0) ? 'checked':''}}>
                                                    Show Ratings & Comments <div class="on-and-off {{($user->profile->dr_ratings_comments == 0) ? 'of':'on'}}"><span></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group Thumbs-up">
                                                <label> <img src="{{ asset('public/images/frontend/images/notification.png') }}" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line definition"> Your Thumbs Up</label><br>
                                                @php
                                                    $thumbsUP = getThumbsUp($user->id);
                                                    // $thumbsUP = 1;
                                                @endphp
                                                @for ($i = 1; $i <= $thumbsUP; $i++)

                                                    <i class="far fa-thumbs-up"></i>
                                                @endfor

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {{-- <div class="col-sm-12 Mandator">
                                <label>Change password to <a href="{{route('doctor.change-password')}}">Click here</a>  </label>
                            </div> --}}

                                {{-- <div class="col-sm-12">
                                <p><sup>*</sup>Mandatory in case you need to be contacted eg by Pharmacist, Admin</p>
                            </div> --}}


                            <div class="Submit-Medical-Record pm-btn-grp">
                                <button type="submit" name="form_name" value="profile" class="btn blue-button mt-0">Save</button>
                            </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade {{($form_name == 'account') ? 'show active':''}}" id="Payment-Details" >
                       <form method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="row Doctor-contact">
                                <div class="col-sm-12">
                                    <p class="form-title-tab">Paypal Account</p>
                                    <div class="form-group has-float-label">
                                        <input class="form-control {{!empty($user->email) ? 'has-content':''}} col-sm-6" type="email" name="email" value="{{$user->email}}" id="paEmail" placeholder="Email" readonly>
                                        <label for="paEmail">Email</label>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <p class="form-title-tab">Payment to Bank</p>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group has-float-label">
                                        <input class="form-control {{!empty($user->profile->account_number) ? 'has-content':''}}" name="account_number" type="number"  value="{{$user->profile->account_number}}" id="paAccountNo" placeholder="Account No.">
                                        <label for="paAccountNo">Account No.</label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group has-float-label">
                                        <input class="form-control {{!empty($user->profile->sort_code) ? 'has-content':''}}" type="text" name="sort_code" value="{{$user->profile->sort_code}}" id="paSortCode" placeholder="Sort Code">
                                        <label for="paSortCode">Sort Code </label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group has-float-label">
                                        <input class="form-control {{!empty($user->profile->account_name) ? 'has-content':''}}" name="account_name" value="{{$user->profile->account_name}}" type="text"  id="paAccountName" placeholder="Account Name">
                                        <label for="paAccountName">Account Name </label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group has-float-label">
                                        <input class="form-control {{!empty($user->profile->bank_name) ? 'has-content':''}}" name="bank_name" type="text"  value="{{$user->profile->bank_name}}" id="paBankName" placeholder="Bank Name">
                                        <label for="paBankName">Bank Name </label>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group has-float-label">
                                        <input class="form-control {{!empty($user->profile->iban_or_swift_code) ? 'has-content':''}}" name="iban_or_swift_code" type="text" value="{{$user->profile->iban_or_swift_code}}" id="paFbi" placeholder="For non-UK banks IBAN/Swift Code">
                                        <label for="paFbi">For non-UK banks IBAN/Swift Code</label>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" name="form_name" value="account"  class="btn blue-button">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade {{($form_name == 'contact_details') ? 'show active':''}}" id="Contact-Details" >
                          <form method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="row Doctor-contact">
                                {{-- <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input class="form-control effect-19 {{!empty($user->forename) ? 'has-content':''}}" type="text" placeholder="Your Name">
                                    </div>
                                </div> --}}

                                {{-- <div class="col-sm-12">
                                        <label>The following details will not be available to patinents :</label>

                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group required has-float-label">
                                        <input class="form-control {{!empty($user->profile->telephone1) ? 'has-content':''}}" name="telephone1" value="{{$user->profile->telephone1}}" type="tel" id="pacCpn1" placeholder="Contact Phone No. 1">
                                        <label for="pacCpn1">Contact Phone No. 1</label>
                                    @error('telephone1')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group has-float-label">
                                        <input class="form-control {{!empty($user->profile->telephone2) ? 'has-content':''}}"  name="telephone2" value="{{$user->profile->telephone2}}"  type="tel" id="pacCpn2" placeholder="Contact Phone No. 2">
                                        <label for="pacCpn2">Contact Phone No. 2 </label>
                                    @error('telephone2')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group required has-float-label">
                                        <textarea class="form-control {{!empty($user->profile->address) ? 'has-content':''}}" name="address" rows="5" id="pacProfessionalAddress" placeholder="Professional Address">{{$user->profile->address}}</textarea>
                                        <label for="pacProfessionalAddress">Professional Address </label>
                                    @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div> --}}
                                <div class="col-sm-12">
                                    <p><sup>*</sup>Mandatory in case you need to be contacted eg by Pharmacist, Admin</p>
                                </div>
                                <div class="col-sm-12">
                                    {{-- <button type="submit" name="form_name" value="contact_details"  class="btn blue-button">Save</button> --}}
                                    <button type="submit" name="form_name" value="contact_details"  class="btn blue-button">Save</button>
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
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }

            $("#imgInp").change(function() {
                readURL(this);
            });

            $('#multiOpt').select2({
                maximumSelectionLength:5
            });
        });

        $('.Notifications-on-of input[type="checkbox"]').click(function() {
            $(this).parent().find('.on-and-off').toggleClass("on");
            $(this).parent().find('.on-and-off').toggleClass("of");
        });

    $(window).on('load', function(){
    // $(".tab-content #Patient-Profile input, .tab-content #Patient-Profile textarea").val("");

    $(".input-effect input, .input-effect textarea").focusout(function(){
    if($(this).val() != ""){
    $(this).addClass("has-content");
    }else{
    $(this).removeClass("has-content");
    }
    })

  });

  $( document ).ready(function() {
    $('#chng_time_zone').click(function(){

        $('#exampleModal').modal('show');
    });



});


    </script>
@endsection
