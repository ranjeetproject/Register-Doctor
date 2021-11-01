@extends('frontend.beforeloginlayout.app')

@section('content')

<section class="for-w-100 main-content innerpage  top-doctor-details-page">
    <div class="container">
        <h1 class="inner-page-title">Top Doctors</h1>
        <ul class="top-doctor-warning-info">
            <li>We asked doctors which specialist they would recommend to friends or family</li>
            <li>The list is not limited to great internet doctors - included also are those with good face-to-face & surgical skills</li>
            <li>We also consider popularity & availability including Region & City finding you the best specialists <i data-toggle="tooltip" title="Tooltip on top" class="fas fa-info-circle"></i></li>
        </ul>
        <div class="top-doctor-details-info">
            <div class="doctor-img-left">
                <img src="{{ asset('public/images/frontend/images/doc-pic.jpg') }}" alt="">
            </div>
            <div class="doctor-info-right">
                <h3>Dr. Natasha Kate Kothari</h3>
                <h5>Psychiatrist</h5>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum. </p>
                <p>Phone number: 25992369/+911234569871</p>
                <p>Practice: London bridge road WC</p>
                <p>Email: dr@gmail.com</p>
                <p>Location: United State</p>
                <p>Comments: "Very good surgeon"</p>
                <p class="tdd-text-warning">This Doctor consults via this Website. Olease login and choose Option 1. There Registered-Doctor.com Unique Number is xxx346132</p>
            </div>
        </div>
    </div>
</section>

@endsection
