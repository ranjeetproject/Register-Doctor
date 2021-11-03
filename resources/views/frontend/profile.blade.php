@extends('frontend.beforeloginlayout.app')

@section('content')
    {{-- <section class="for-w-100 main-content innerpage  login-page"> --}}
    <div class="container">
        <div class="col Choose-Your-Doctor-right Doctor-Manage-Account-Profile-page">
            <div class="row d-flax  align-items-center justify-content-center  Patient-Profile-page">

                <div class="col-sm-12 pt-4">

                    {{-- <ul class="nav Choose-Your-tab" id="myTab" role="tablist">

                        <li class="nav-item">

                            Manage Profile

                        </li>


                    </ul> --}}
                    <h2 class="text-center">Manage Profile</h2>
                    <div class="tab-content Choose-Your-tab-con" id="myTabContent">

                        <div class="tab-pane fade {{ $form_name == 'profile' ? 'show active' : '' }} input-effect"
                            id="Manage-Profile">
                            <form method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row Doctor-contact main-form-fild">
                                    <div class="col-sm-2 pad-lef-0">
                                        <div class="for-profile-image">
                                            <input type="file" name="profile_photo" id="imgInp">
                                            <img id="blah" src="{{ $user->profile->profile_photo }}">
                                            <span>Update Profile Image</span>
                                        </div>
                                    </div>
                                    {{-- <div class="col-sm-10 profile-info">
                                        <h2>Manage your Diary in the Calendar Below.</h2>
                                        <a class="btn btn-primary" href="{{route('doctor.available-days')}}">Regular Timetable</a>
                                        <a class="btn add-btn" id="chng_time_zone">Change Timezone</a>
                                    </div> --}}
                                </div>
                                <div class="row Doctor-contact main-form-fild">
                                    <div class="col-sm-6">
                                        <div class="form-group required">
                                            <input name="forename"
                                                class="form-control effect-19 {{ !empty($user->forename) ? 'has-content' : '' }} "
                                                type="text" value="{{ $user->forename }}">
                                            <label>Forename</label>
                                        </div>
                                        @error('forename')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group required">
                                            <input
                                                class="form-control effect-19 {{ !empty($user->surname) ? 'has-content' : '' }}"
                                                name="surname" type="text" value="{{ $user->surname }}"
                                                placeholder="Surname">
                                            <label>Surname</label>

                                        </div>

                                        @error('forename')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="col-sm-12">
                                        <div class="form-group required">
                                            <input
                                                class="form-control effect-19 {{ !empty($user->profile->dr_speciality) ? 'has-content' : '' }}"
                                                type="text" name="dr_speciality"
                                                value="{{ $user->profile->dr_speciality }}">
                                            <label>Speciality or Interest <img
                                                    src="{{ asset('public/images/frontend/images/ex-icon.png') }}" alt=""
                                                    data-toggle="tooltip" data-placement="top" title=""
                                                    data-original-title="One line definition"></label>
                                            @error('dr_speciality')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea
                                                class="form-control effect-19 {{ !empty($user->profile->about) ? 'has-content' : '' }}"
                                                name="about" rows="4">{{ $user->profile->about }}</textarea>
                                            <label>About </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input
                                                class="form-control effect-19 {{ !empty($user->profile->dr_experience) ? 'has-content' : '' }}"
                                                name="dr_experience" type="text"
                                                value="{{ $user->profile->dr_experience }}">
                                            <label>Experience</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input
                                                class="form-control effect-19 {{ !empty($user->profile->dr_qualifications) ? 'has-content' : '' }}"
                                                type="text" name="dr_qualifications"
                                                value="{{ $user->profile->dr_qualifications }}">
                                            <label>Qualifications</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group required">
                                            <input
                                                class="form-control effect-19 {{ !empty($user->profile->dr_medical_license_no) ? 'has-content' : '' }}"
                                                type="text" name="dr_medical_license_no"
                                                value="{{ $user->profile->dr_medical_license_no }}">
                                            <label>Medical License No. (National/State)</label>
                                            @error('dr_medical_license_no')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group required">
                                            <input
                                                class="form-control effect-19 {{ !empty($user->profile->dr_name_of_medical_licencer) ? 'has-content' : '' }}"
                                                type="text" name="dr_name_of_medical_licencer"
                                                value="{{ $user->profile->dr_name_of_medical_licencer }}">
                                            <label>Name of Medical Licencer</label>
                                            @error('dr_name_of_medical_licencer')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input
                                                class="form-control effect-19 {{ !empty($user->registration_number) ? 'has-content' : '' }}"
                                                type="text" name="dr_registered_no"
                                                value="{{ $user->registration_number }}" readonly>
                                            <label>Registered-Doctor No.</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group Tick-one ">
                                            <div class="form-check form-check-inline">
                                                <label class="Tick-lab"><sup>*</sup> Tick one or both - Do you
                                                    see</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="dr_see" id="inlineRadio1"
                                                    value="adult"
                                                    {{ $user->profile->dr_see == 'adult' || $user->profile->dr_see == '' ? 'checked' : '' }}>
                                                <span class="dot"><span></span></span>
                                                <label class="form-check-label" for="inlineRadio1">Adult</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="dr_see" id="inlineRadio2"
                                                    value="child"
                                                    {{ $user->profile->dr_see == 'child' ? 'checked' : '' }}>
                                                <span class="dot"><span></span></span>
                                                <label class="form-check-label" for="inlineRadio2">Child</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="dr_see" id="inlineRadio3"
                                                    value="both" {{ $user->profile->dr_see == 'both' ? 'checked' : '' }}>
                                                <span class="dot"><span></span></span>
                                                <label class="form-check-label" for="inlineRadio3">Both</label>
                                            </div>
                                            @error('dr_see')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>


                                    <div class="col-sm-12">
                                        <div class="form-group Communication">
                                            <label> <img
                                                    src="{{ asset('public/images/frontend/images/Communication-icon.png') }}"
                                                    alt="" data-toggle="tooltip" data-placement="top" title=""
                                                    data-original-title="One line definition"> Contact Details</label>
                                        </div>
                                    </div>



                                    <div class="col-sm-12">
                                        <label>The following details will not be available to patients :</label>

                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group required">
                                            <input
                                                class="form-control effect-19 {{ !empty($user->profile->telephone1) ? 'has-content' : '' }}"
                                                name="telephone1" value="{{ $user->profile->telephone1 }}" type="tel">
                                            <label>Contact Phone No. 1</label>
                                            @error('telephone1')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input
                                                class="form-control effect-19 {{ !empty($user->profile->telephone2) ? 'has-content' : '' }}"
                                                name="telephone2" value="{{ $user->profile->telephone2 }}" type="tel">
                                            <label>Contact Phone No. 2 </label>
                                            @error('telephone2')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group required">
                                            <input
                                                class="form-control effect-19 {{ !empty($user->profile->location) ? 'has-content' : '' }}"
                                                name="location" value="{{ $user->profile->location }}" type="text" required>
                                            <label>Location</label>
                                            @error('location')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group required">
                                            <input
                                                class="form-control effect-19 {{ !empty($user->profile->pincode) ? 'has-content' : '' }}"
                                                name="pincode" value="{{ $user->profile->pincode }}" type="text" required>
                                            <label>Zip</label>
                                            @error('pincode')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group required">
                                            <textarea
                                                class="form-control effect-19 {{ !empty($user->profile->address) ? 'has-content' : '' }}"
                                                name="address" rows="5">{{ $user->profile->address }}</textarea>
                                            <label>Professional Address </label>
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>





                                    <div class="col-sm-12">
                                        <div class="form-group Communication">
                                            <label> <img
                                                    src="{{ asset('public/images/frontend/images/Communication-icon.png') }}"
                                                    alt="" data-toggle="tooltip" data-placement="top" title=""
                                                    data-original-title="One line definition"> Communication Options</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label> <img
                                                    src="{{ asset('public/images/frontend/images/notification.png') }}"
                                                    alt="" data-toggle="tooltip" data-placement="top" title=""
                                                    data-original-title="One line definition"> Quick question</label>
                                            <div class="row all-question-list">
                                                <div class="col aql-comm">
                                                    <!--<input type="checkbox" class="" >  Set your own fee but-->
                                                    Standard Fee : <input class="form-control " type="text"
                                                        name="dr_standard_fee"
                                                        value="{{ $user->profile->dr_standard_fee }}"> First Doctor to Take
                                                    Case
                                                </div>
                                            </div>
                                            <div class="Notifications-on-of">
                                                <input type="checkbox" name="dr_standard_fee_notification"
                                                    class="form-check-input" value="0"
                                                    {{ $user->profile->dr_standard_fee_notification == 0 ? 'checked' : '' }}>
                                                <img src="{{ asset('public/images/frontend/images/notification.png') }}"
                                                    alt="" data-toggle="tooltip" data-placement="top" title=""
                                                    data-original-title="One line definition"> <span>Notifications </span>
                                                <div class="on-and-off"><span
                                                        class="{{ $user->profile->dr_standard_fee_notification == 0 ? 'of' : 'on' }}"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label> <img
                                                    src="{{ asset('public/images/frontend/images/notification.png') }}"
                                                    alt="" data-toggle="tooltip" data-placement="top" title=""
                                                    data-original-title="One line definition"> Live Video</label>
                                            <div class="row all-question-list">
                                                <div class="col aql-comm">
                                                    <input type="checkbox" class="" disabled> Set your own fee
                                                    : <input class="form-control " type="text" name="dr_live_video_fee"
                                                        value="{{ $user->profile->dr_live_video_fee }}"> Set availability
                                                    in Your Calendar above
                                                </div>
                                            </div>
                                            <div class="Notifications-on-of">
                                                <input type="checkbox" name="dr_live_video_fee_notification"
                                                    class="form-check-input" value="0"
                                                    {{ $user->profile->dr_live_video_fee_notification == 0 ? 'checked' : '' }}>
                                                <img src="{{ asset('public/images/frontend/images/notification.png') }}"
                                                    alt="" data-toggle="tooltip" data-placement="top" title=""
                                                    data-original-title="One line definition"> <span>Notifications </span>
                                                <div class="on-and-off"><span
                                                        class="{{ $user->profile->dr_live_video_fee_notification == 0 ? 'of' : 'on' }}"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label> <img
                                                    src="{{ asset('public/images/frontend/images/notification.png') }}"
                                                    alt="" data-toggle="tooltip" data-placement="top" title=""
                                                    data-original-title="One line definition"> Live Chat</label>
                                            <div class="row all-question-list">
                                                <div class="col aql-comm">
                                                    <input type="checkbox" name="" class="" disabled> Set
                                                    your own fee : <input class="form-control " type="text"
                                                        name="dr_live_chat_fee"
                                                        value="{{ $user->profile->dr_live_chat_fee }}"> Set availability in
                                                    Your Calendar above
                                                </div>
                                            </div>
                                            <div class="Notifications-on-of">
                                                <input type="checkbox" name="dr_live_chat_fee_notification"
                                                    class="form-check-input" value="0"
                                                    {{ $user->profile->dr_live_chat_fee_notification == 0 ? 'checked' : '' }}>
                                                <img src="{{ asset('public/images/frontend/images/notification.png') }}"
                                                    alt="" data-toggle="tooltip" data-placement="top" title=""
                                                    data-original-title="One line definition"> <span>Notifications </span>
                                                <div class="on-and-off"><span
                                                        class="{{ $user->profile->dr_live_chat_fee_notification == 0 ? 'of' : 'on' }}"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label> <img
                                                    src="{{ asset('public/images/frontend/images/notification.png') }}"
                                                    alt="" data-toggle="tooltip" data-placement="top" title=""
                                                    data-original-title="One line definition"> Booked Q&A</label>
                                            <div class="row all-question-list">
                                                <div class="col aql-comm">
                                                    <input type="checkbox" class="" disabled> <span>Set your
                                                        own fee :</span> <input class="form-control " name="dr_qa_fee"
                                                        type="text" value="{{ $user->profile->dr_qa_fee }}"> Set your max
                                                    turnaround time
                                                    for response in Hours or Days

                                                    @php
                                                        $get_dr_turnaround_time = explode(' ', $user->profile->dr_turnaround_time);
                                                        // print_r($get_dr_turnaround_time);
                                                    @endphp

                                                    <select class="form-control  form-control -lg"
                                                        name="dr_turnaround_time">
                                                        @for ($i = 1; $i <= 10; $i++)
                                                            <option value="{{ $i }}"
                                                                {{ isset($get_dr_turnaround_time[0]) && $get_dr_turnaround_time[0] == $i ? 'selected' : '' }}>
                                                                {{ $i }}</option>
                                                        @endfor
                                                    </select> or <select class="form-control  form-control -lg"
                                                        name="dr_turnaround_time_type">
                                                        <option value="days"
                                                            {{ isset($get_dr_turnaround_time[1]) && $get_dr_turnaround_time[1] == 'days' ? 'selected' : '' }}>
                                                            Days</option>
                                                        <option value="hours"
                                                            {{ isset($get_dr_turnaround_time[1]) && $get_dr_turnaround_time[1] == 'hours' ? 'selected' : '' }}>
                                                            Hours</option>

                                                    </select>
                                                </div>
                                            </div>


                                            <div class="Notifications-on-of">
                                                <input type="checkbox" class="form-check-input"
                                                    name="dr_qa_fee_notification" value="0"
                                                    {{ $user->profile->dr_qa_fee_notification == 0 ? 'checked' : '' }}>
                                                <img src="{{ asset('public/images/frontend/images/notification.png') }}"
                                                    alt="" data-toggle="tooltip" data-placement="top" title=""
                                                    data-original-title="One line definition"> <span>Notifications </span>
                                                <div class="on-and-off"><span
                                                        class="{{ $user->profile->dr_qa_fee_notification == 0 ? 'of' : 'on' }}"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label> <img
                                                    src="{{ asset('public/images/frontend/images/notification.png') }}"
                                                    alt="" data-toggle="tooltip" data-placement="top" title=""
                                                    data-original-title="One line definition"> Tick to offer prescription
                                                online (only UK Doctors)</label>
                                            <div class="row all-question-list">
                                                <div class="col aql-comm">
                                                    <input type="checkbox" class="" disabled> Upload
                                                    Signature <input class="form-control " type="text" name="dr_signature"
                                                        value="{{ $user->profile->dr_signature }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <p class="Prescriptions-dt">
                                                <strong>
                                                    Prescriptions are assumed to take up to 15 mins. If more time is needed
                                                    request the patient to book a longer time slot before you accept the
                                                    case.
                                                </strong>
                                            </p>
                                        </div>

                                    </div>

                                    {{-- <div class="col-sm-12">
                                        <div class="form-group">
                                            <h4>Ratings</h4>
                                            <label>Your Current Star Ratings from Patients No. Cumulative Median
                                                rating</label><br>
                                            <div class="ratings">
                                                <div class="empty-stars"></div>
                                                <div class="full-stars" style="width:88%"></div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label> <img
                                                    src="{{ asset('public/images/frontend/images/notification.png') }}"
                                                    alt="" data-toggle="tooltip" data-placement="top" title=""
                                                    data-original-title="One line definition"> Comments</label>
                                            <div class="Notifications-on-of">
                                                <input type="checkbox" name="dr_ratings_comments" class="form-check-input"
                                                    value="0"
                                                    {{ $user->profile->dr_ratings_comments == 0 ? 'checked' : '' }}>
                                                Turn Ratings & Comments <div class="on-and-off"><span
                                                        class="{{ $user->profile->dr_ratings_comments == 0 ? 'of' : 'on' }}"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-sm-12">
                                        <div class="form-group Thumbs-up">
                                            <label> <img
                                                    src="{{ asset('public/images/frontend/images/notification.png') }}"
                                                    alt="" data-toggle="tooltip" data-placement="top" title=""
                                                    data-original-title="One line definition"> Your Thumbs Up</label><br>
                                            @php
                                                $thumbsUP = getThumbsUp($user->id);
                                                // $thumbsUP = 1;
                                            @endphp
                                            @for ($i = 1; $i <= $thumbsUP; $i++)

                                                <i class="far fa-thumbs-up"></i>
                                            @endfor

                                        </div>
                                    </div> --}}

                                    {{-- <div class="col-sm-12 Mandator">
                                        <label>Change password to <a href="{{ route('doctor.change-password') }}">Click
                                                here</a> </label>
                                    </div> --}}

                                    <div class="col-sm-12">
                                        <p><sup>*</sup>Mandatory in case you need to be contacted eg by Pharmacist, Admin
                                        </p>
                                    </div>


                                    <div class="col-sm-12 for-msg">
                                        <button type="submit" name="form_name" value="profile"
                                            class="btn blue-button">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        {{-- <div class="tab-pane fade {{ $form_name == 'account' ? 'show active' : '' }}"
                            id="Payment-Details">
                            <form method="POST" enctype="multipart/form-data">

                                @csrf

                                <div class="row Doctor-contact">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <p class="form-title-tab">Paypal Account</p>
                                            <input
                                                class="form-control effect-19 {{ !empty($user->email) ? 'has-content' : '' }} col-sm-6"
                                                type="email" name="email" value="{{ $user->email }}" readonly>
                                            <label>Email</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <p class="form-title-tab">Payment to Bank</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input
                                                class="form-control effect-19 {{ !empty($user->profile->account_number) ? 'has-content' : '' }}"
                                                name="account_number" type="number"
                                                value="{{ $user->profile->account_number }}">
                                            <label>Account No.</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input
                                                class="form-control effect-19 {{ !empty($user->profile->sort_code) ? 'has-content' : '' }}"
                                                type="text" name="sort_code" value="{{ $user->profile->sort_code }}">
                                            <label>Sort Code </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input
                                                class="form-control effect-19 {{ !empty($user->profile->account_name) ? 'has-content' : '' }}"
                                                name="account_name" value="{{ $user->profile->account_name }}" type="text">
                                            <label>Account Name </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input
                                                class="form-control effect-19 {{ !empty($user->profile->bank_name) ? 'has-content' : '' }}"
                                                name="bank_name" type="text" value="{{ $user->profile->bank_name }}">
                                            <label>Bank Name </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input
                                                class="form-control effect-19 {{ !empty($user->profile->iban_or_swift_code) ? 'has-content' : '' }}"
                                                name="iban_or_swift_code" type="text"
                                                value="{{ $user->profile->iban_or_swift_code }}">
                                            <label>For non-UK banks IBAN/Swift Code</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="submit" name="form_name" value="account"
                                            class="btn blue-button">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- </section> --}}


@endsection

@push('scripts')
    {{-- <script> --}}
    <script type="text/javascript">
        $(window).on('load', function() {
            $(".tab-content #Patient-Profile input, .tab-content #Patient-Profile textarea").val("");

            $(".input-effect input, .input-effect textarea").focusout(function() {
                if ($(this).val() != "") {
                    $(this).addClass("has-content");
                } else {
                    $(this).removeClass("has-content");
                }
            })
        });

        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })

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
        $('.Notifications-on-of input[type="checkbox"]').click(function() {
            $(this).parent().find('.on-and-off span').toggleClass("on");
            $(this).parent().find('.on-and-off span').toggleClass("of");
        });
    </script>
@endpush
