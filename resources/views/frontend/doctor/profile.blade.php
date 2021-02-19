@extends('frontend.doctor.afterloginlayout.app')

@section('content')
    <div class="col Choose-Your-Doctor-right Doctor-Manage-Account-Profile-page">
        <div class="row">
            <div class="col-sm-12">
                <ul class="nav Choose-Your-tab" id="myTab" role="tablist">
                    <li class="nav-item">
                    <a class="nav-link "   href="Detailed-Doctor-Profile.html">
                        Doctor Profile
                        </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link "  data-toggle="tab" href="#Manage-Profile">
                        Manage Profile
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active"   data-toggle="tab" href="#Payment-Details">
                            Payment Details
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  data-toggle="tab" href="#Contact-Details">
                            Contact Details
                        </a>
                    </li>
                </ul>
                <div class="tab-content Choose-Your-tab-con" id="myTabContent">
                    <div class="tab-pane fade " id="Doctor-Profile">
                        
                        
                    </div>
                    <div class="tab-pane fade " id="Manage-Profile" >
                        <form action="#">
                            <div class="row Doctor-contact">
                                <div class="col-sm-2 pad-lef-0">
                                    <div class="for-profile-image">
                                        <input type="file" id="imgInp">
                                        <img id="blah" src="{{ asset('public/images/frontend/images/Doctor-Profile-pic.jpg') }}">
                                        <span>Update Profile Image</span>
                                    </div>
                                </div>
                                <div class="col-sm-10 profile-info">
                                    <h2>Manage your Diary in the 2 Calendars Below.</h2>
                                    <button class="btn">Regular Weekly Timetable</button><button class="btn add-btn">Ad Hoc Timeslots</button>
                                </div>
                            </div>
                            <div class="row Doctor-contact">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input class="form-control" type="text" placeholder="Your Name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Speciality or Interest <img src="{{ asset('public/images/frontend/images/ex-icon.png') }}" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line definition"></label>
                                        <input class="form-control" type="text" placeholder="">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>About </label>
                                        <textarea class="form-control"  rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Experience</label>
                                        <input class="form-control" type="text" placeholder="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Qualifications</label>
                                        <input class="form-control" type="text" placeholder="">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Medical License No. (National/State)</label>
                                        <input class="form-control" type="text" placeholder="">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Name of Medical Licencer</label>
                                        <input class="form-control" type="text" placeholder="">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Registered-Doctor No.</label>
                                        <input class="form-control" type="text" placeholder="">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group Communication">
                                        <label> <img src="{{ asset('public/images/frontend/images/Communication-icon.png') }}" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line definition"> Communication Options</label>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> <img src="{{ asset('public/images/frontend/images/notification.png') }}" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line definition"> Quick question</label>
                                        <div class="row all-question-list">
                                            <div class="col aql-comm">
                                                <!--<input type="checkbox" class="" >  Set your own fee but--> Standard Fee : <input class="form-control" type="text" placeholder="" value="e.g. £14.99">  First Doctor to Take Case
                                            </div>
                                        </div>
                                        <div class="Notifications-on-of">
                                            <input type="checkbox" class="form-check-input" checked="">
                                            <img src="{{ asset('public/images/frontend/images/notification.png') }}" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line definition"> <span>Notifications </span> <div class="on-and-off"><span class="on"></span></div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> <img src="{{ asset('public/images/frontend/images/notification.png') }}" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line definition"> Live Video</label>
                                        <div class="row all-question-list">
                                            <div class="col aql-comm">
                                                <input type="checkbox" class="" >  Set your own fee : <input class="form-control" type="text" placeholder="" value="">  Set availability in Your Calendar above
                                            </div>
                                        </div>
                                        <div class="Notifications-on-of">
                                            <input type="checkbox" class="form-check-input" checked="">
                                            <img src="{{ asset('public/images/frontend/images/notification.png') }}" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line definition"> <span>Notifications </span> <div class="on-and-off"><span class="on"></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> <img src="{{ asset('public/images/frontend/images/notification.png') }}" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line definition"> Live Chat</label>
                                        <div class="row all-question-list">
                                            <div class="col aql-comm">
                                                <input type="checkbox" class="" >  Set your own fee : <input class="form-control" type="text" placeholder="" value="">  Set availability in Your Calendar above
                                            </div>
                                        </div>
                                        <div class="Notifications-on-of">
                                            <input type="checkbox" class="form-check-input" checked="">
                                            <img src="{{ asset('public/images/frontend/images/notification.png') }}" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line definition"> <span>Notifications </span> <div class="on-and-off"><span class="on"></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> <img src="{{ asset('public/images/frontend/images/notification.png') }}" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line definition"> Booked Q&A</label>
                                        <div class="row all-question-list">
                                            <div class="col aql-comm">
                                                <input type="checkbox" class="" >  <span>Set your own fee :</span> <input class="form-control" type="text" placeholder=""> Set your max turnaround time
                                                for response in Hours or Days <select class="form-control form-control-lg">
                                                    <option>2 Hours</option>
                                                </select> or <select class="form-control form-control-lg">
                                                    <option>5 Days</option>
                                                </select> 
                                            </div>
                                        </div>
                                        <div class="Notifications-on-of">
                                            <input type="checkbox" class="form-check-input" checked="">
                                            <img src="{{ asset('public/images/frontend/images/notification.png') }}" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line definition"> <span>Notifications </span> <div class="on-and-off"><span class="on"></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> <img src="{{ asset('public/images/frontend/images/notification.png') }}" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line definition"> Tick to offer prescription online (only UK Doctors)</label>
                                        <div class="row all-question-list">
                                            <div class="col aql-comm">
                                                <input type="checkbox" class="" >  Upload Signature <input class="form-control" type="text" placeholder="" value="">  
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
                                <div class="col-sm-12">
                                    <div class="form-group Tick-one ">
                                        <div class="form-check form-check-inline">
                                            <label class="Tick-lab"><sup>*</sup> Tick one or both - Do you see</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked="">
                                        <span class="dot"><span></span></span>
                                        <label class="form-check-label" for="inlineRadio1">Adult</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                            <span class="dot"><span></span></span>
                                            <label class="form-check-label" for="inlineRadio2">Child</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                            <span class="dot"><span></span></span>
                                            <label class="form-check-label" for="inlineRadio3">Both</label>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <h4>Ratings</h4>
                                        <label>Your Current Star Ratings from Patients No. Cumulative Median rating</label><br>
                                        <div class="ratings">
                                            <div class="empty-stars"></div>
                                            <div class="full-stars" style="width:88%"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> <img src="{{ asset('public/images/frontend/images/notification.png') }}" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line definition"> Comments</label>
                                        <div class="Notifications-on-of">
                                            <input type="checkbox" class="form-check-input" checked="">
                                            Turn Ratings & Comments <div class="on-and-off"><span class="on"></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group Thumbs-up">
                                        <label> <img src="{{ asset('public/images/frontend/images/notification.png') }}" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line definition"> Your Thumbs Up</label><br> <i class="far fa-thumbs-up"></i>
                                        
                                    </div>
                                </div>
                                <div class="col-sm-12 for-msg">
                                    <button type="submit" class="btn blue-button">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade show active" id="Payment-Details" >
                        <form action="" method="get" class="">
                            <div class="row Doctor-contact">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <p class="form-title-tab">Paypal Account</p>
                                        <label>Email</label>
                                        <input class="form-control col-sm-6" type="email" placeholder="">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <p class="form-title-tab">Payment to Bank</p>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Account No.</label>
                                        <input class="form-control" type="number" placeholder="">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Sort Code </label>
                                        <input class="form-control" type="text" placeholder="">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Account Name </label>
                                        <input class="form-control" type="text" placeholder="">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Bank Name </label>
                                        <input class="form-control" type="text" placeholder="">
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label>For non-UK banks IBAN/Swift Code</label>
                                        <input class="form-control" type="text" placeholder="">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" class="btn blue-button">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="Contact-Details" >
                        <form action="" method="get" class="">
                            <div class="row Doctor-contact">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input class="form-control" type="text" placeholder="Your Name">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                        <label>The following details will not be available to patinents :</label>
                                    
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Contact Phone No. 1<sup>*</sup></label>
                                        <input class="form-control" type="tel" placeholder="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Contact Phone No. 2 </label>
                                        <input class="form-control" type="tel" placeholder="">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Professional Address<sup>*</sup> </label>
                                        <textarea class="form-control"  rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <p><sup>*</sup>Mandatory in case you need to be contacted eg by Pharmacist, Admin</p>
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" class="btn blue-button">Save</button>
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
        });

        $('.Notifications-on-of input[type="checkbox"]').click(function() {
            $(this).parent().find('.on-and-off span').toggleClass("on"); 
            $(this).parent().find('.on-and-off span').toggleClass("of"); 
        });

    
    </script>
@endsection