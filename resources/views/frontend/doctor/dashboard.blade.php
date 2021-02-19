@extends('frontend.doctor.afterloginlayout.app')

@section('content')
    <div class="col Prescription-dashboard-right">
        <div class="row">
            <div class="col-sm-12">
                <h3>INCOMING REQUESTS FOR YOU</h3>
                <div class="incoming-request">
                    <a href="#" class="card">
                        <img src="{{ asset('public/images/frontend/images/ex-icon.png') }}" class="for-tool-tip" data-toggle="tooltip" data-placement="right" title="" data-original-title="One line definition" alt="">
                        <div class="card-cont">
                            <img src="{{ asset('public/images/frontend/images/Prescriptions.png') }}" alt="">
                            <h4>Prescriptions<br><span>Waiting</span></h4>
                        </div>
                    </a>
                    <a href="#" class="card">
                        <div class="card-cont">
                            <img src="{{ asset('public/images/frontend/images/Live-Video-Chat.png') }}" alt="">
                            <h4>Live Video Consult<br><span>Waiting</span></h4>
                        </div>
                    </a>
                    <a href="#" class="card">
                        <div class="card-cont">
                            <img src="{{ asset('public/images/frontend/images/Live-Text-Chat.png') }}" alt="">
                            <h4>Live Chat<br><span>Waiting</span></h4>
                        </div>
                    </a>
                    <a href="#" class="card">
                        <div class="card-cont">
                            <img src="{{ asset('public/images/frontend/images/Booked-Question.png') }}" alt="">
                            <h4>Booked Question<br><span>Waiting</span></h4>
                        </div>
                    </a>
                    <a href="#" class="card">
                        <div class="card-cont">
                            <img src="{{ asset('public/images/frontend/images/Quick-Question.png') }}" alt="">
                            <h4>Quick Question<br><span>Waiting</span></h4>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-12 Queries">
                <a href="#">
                    <h2>Queries<br><small><strong>Messages from Patients, Parmacists, Admin</strong></small></h2>
                    <img src="{{ asset('public/images/frontend/images/Hello-icon.png') }}" alt="">
                </a>
            </div>
            
            <div class="col-sm-12">
                <h3>YOUR Accepted CASES</h3>
                <div class="incoming-request">
                    <a href="#" class="card">
                        <img src="{{ asset('public/images/frontend/images/ex-icon.png') }}" class="for-tool-tip" data-toggle="tooltip" data-placement="right" title="" data-original-title="One line definition" alt="">
                    
                        <div class="card-cont">
                            <img src="{{ asset('public/images/frontend/images/Prescriptions.png') }}" alt="">
                            <h4>Prescriptions<br><span>Waiting</span></h4>
                        </div>
                    </a>
                    <a href="#" class="card">
                        
                        <div class="card-cont">
                            <img src="{{ asset('public/images/frontend/images/Live-Video-Chat.png') }}" alt="">
                            <h4>Live Video Consult<br><span>Waiting</span></h4>
                        </div>
                    </a>
                    <a href="#" class="card">
                        <div class="card-cont">
                            <img src="{{ asset('public/images/frontend/images/Live-Text-Chat.png') }}" alt="">
                            <h4>Live Chat<br><span>Waiting</span></h4>
                        </div>
                    </a>
                    <a href="#" class="card">
                        <div class="card-cont">
                            <img src="{{ asset('public/images/frontend/images/Booked-Question.png') }}" alt="">
                            <h4>Booked Question<br><span>Waiting</span></h4>
                        </div>
                    </a>
                    <a href="#" class="card">
                        <div class="card-cont">
                            <img src="{{ asset('public/images/frontend/images/Quick-Question.png') }}" alt="">
                            <h4>Quick Question<br><span>Waiting</span></h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>  
    </div>
@endsection