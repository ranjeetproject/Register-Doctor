@extends('frontend.doctor.afterloginlayout.app')

@section('content')
    <div class="col Prescription-dashboard-right">
        <div class="row">

            <div class="col-sm-12">
                <h3 class="text-center mb-3">INCOMING REQUESTS</h3>
                <div class="row incoming-request">

                    <a href="{{route('doctor.cases','quick-questions')}}" class="card new-crd col-12 col-md-6">
                        <img src="{{ asset('public/images/frontend/images/ex-icon.png') }}" class="for-tool-tip" data-toggle="tooltip" data-placement="right" title="" data-original-title="One line definition" alt="">
                        <div class="card-cont">
                            <div class="dash-icons-bx">
                                <div class="dash-icon-badge">
                                    <img src="{{ asset('public/images/frontend/images/live-txtchat-icon.png') }}" alt="">
                                    <span>4</span>
                                </div>
                                <div class="dash-icon-badge">
                                    <img src="{{ asset('public/images/frontend/images/live-d-video-icon.png') }}" alt="">
                                    <span>1</span>
                                </div>
                                <div class="dash-icon-badge">
                                    <img src="{{ asset('public/images/frontend/images/QA-icon.png') }}" alt="">
                                    <span>5</span>
                                </div>
                                <div class="dash-icon-badge">
                                    <img src="{{ asset('public/images/frontend/images/Prescription-icon.png') }}" width="25" alt="">
                                    <span>0</span>
                                </div>
                            </div>
                            <h4>Booking Requests <br><span>Patient Chose You - Accept or Decline</span></h4>
                        </div>
                    </a>

                    <a href="{{route('doctor.prescriptions')}}" class="card new-crd col-sm-6">
                        <div class="card-cont">
                            <div class="dash-icons-bx">
                                <div class="dash-icon-badge">
                                    <img src="{{ asset('public/images/frontend/images/Prescription-icon.png') }}" width="25" alt="">
                                    <span>3</span>
                                </div>
                                <div class="dash-icon-badge">
                                    <img src="{{ asset('public/images/frontend/images/QQ-icon.png') }}" alt="">
                                    <span>2</span>
                                </div>
                            </div>
                            <h4>Quick Questions + General Prescriptions<br><span>Any Doctor to Take</span></h4>
                        </div>
                    </a>

                </div>
            </div>


            <div class="col">
                {{-- <h3>DON'T FORGET!</h3> --}}
                <div class="incoming-request row">
                    {{-- <a href="#" class="card">
                        <img src="{{ asset('public/images/frontend/images/ex-icon.png') }}" class="for-tool-tip" data-toggle="tooltip" data-placement="right" title="" data-original-title="One line definition" alt="">

                        <div class="card-cont">
                            <img src="{{ asset('public/images/frontend/images/Prescriptions.png') }}" alt="">
                            <h4>Accepted Cases</h4>
                        </div>
                    </a> --}}
                    <a href="{{route('doctor.cases',['quick-questions','accepted'])}}" class="card new-crd col-sm-6">
                        <h3 style="top: 20;
                        position: absolute;
                    ">DON'T FORGET!</h3>
                        <div class="card-cont">
                            <div class="dash-icons-bx">
                                <div class="dash-icon-badge">
                                    <img src="{{ asset('public/images/frontend/images/live-txtchat-icon.png') }}" alt="">
                                    <span>1</span>
                                </div>
                                <div class="dash-icon-badge">
                                    <img src="{{ asset('public/images/frontend/images/live-d-video-icon.png') }}" alt="">
                                    <span>4</span>
                                </div>
                                <div class="dash-icon-badge">
                                    <img src="{{ asset('public/images/frontend/images/QA-icon.png') }}" alt="">
                                    <span>0</span>
                                </div>
                                <div class="dash-icon-badge">
                                    <img src="{{ asset('public/images/frontend/images/QQ-icon.png') }}" alt="">
                                    <span>1</span>
                                </div>
                                <div class="dash-icon-badge">
                                    <img src="{{ asset('public/images/frontend/images/Prescription-icon.png') }}" width="25" alt="">
                                    <span>2</span>
                                </div>
                            </div>
                            <h4>Your Accepted Cases</h4>
                        </div>
                    </a>
                    <div class="col-sm-6 Queries">
                <a href="#">
                    <h2><span style="font-size: 22px;">Messages</span><br><small><strong> from Patients, Pharmacists, Admin</strong></small></h2>
                    <img src="{{ asset('public/images/frontend/images/Hello-icon.png') }}" alt="">
                </a>
            </div>
                </div>
            </div>


</div>
        <!-- <div class="row">
            <div class="col-sm-12 Queries">
                <a href="#">
                    <h2>Queries<br><small><strong>Messages from Patients, Parmacists, Admin</strong></small></h2>
                    <img src="{{ asset('public/images/frontend/images/Hello-icon.png') }}" alt="">
                </a>
            </div>
        </div>   -->
    </div>
@endsection
