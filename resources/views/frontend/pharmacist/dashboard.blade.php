@extends('frontend.pharmacist.afterloginlayout.app')

@section('content')
    <div class="col Prescription-dashboard-right">
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="card find-p">
                    <div class="card-cont">
                        <img src="{{ asset('public/images/frontend/images/find-p.png') }}" alt="">
                        <h4>Find Prescription</h4>
                    </div>
                </a>
            </div>
            <div class="col-md-6 Queries">
                <a href="#">
                    <h2>Queries<br><small>Messages from Patients and Doctors</small></h2>
                    <img src="{{ asset('public/images/frontend/images/Hello-icon.png') }}" alt="">
                </a>
            </div>
            <div class="col-md-6">
                <h3>INCOMING Prescriptions</h3>
                <a href="#" class="card">
                    <div class="card-cont">
                        <img src="{{ asset('public/images/frontend/images/Waiting-icon.png') }}" alt="">
                        <h4>Prescriptions<br><span>4 Your Pharmacy</span> Waiting</h4>
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <h3>Accepted - to be Dispensed</h3>
                <a href="#" class="card">
                    <div class="card-cont">
                        <img src="{{ asset('public/images/frontend/images/Waiting-icon.png') }}" alt="">
                        <h4>Waiting</h4>
                    </div>
                </a>
            </div>
        </div>  
    </div>
@endsection