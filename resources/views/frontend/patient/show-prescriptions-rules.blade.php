@extends('frontend.beforeloginlayout.app')

@section('content')
    <section class="for-w-100 main-content innerpage Prescriptions-page">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 page-top">
                    <h1 class="inner-page-title">
                        Prescriptions
                    </h1>
                    <p>In 3 Easy steps <img src="{{ asset('public/images/frontend/images/ex-icon.png')}}" alt="" data-toggle="tooltip" data-placement="top" title="One line definition" ></p>
                    <img src="{{ asset('public/images/frontend/images/m-pr-pic1.jpg')}}" alt="">
                </div>
            </div>
            <div class="row flax align-items-center Prescriptions-step">
                <div class="col-md-3">
                    <img src="{{ asset('public/images/frontend/images/step1.png')}}" alt="">
                </div>
                <div class="col-md-9">
                    <h3>Step 1 Consult Doctor </h3>
                    <p>You will be guided through the following options</p>
                    <div class="follow-opction for-w-100 table-responsive">
                        <table class="table" border="0">
                            <thead>
                                <tr>
                                    <td></td>
                                    <td>Video </td>
                                    <td> LiveChat </td>
                                    <td>Typed Request</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Adult  <img src="{{ asset('public/images/frontend/images/ex-icon.png') }}" alt="" data-toggle="tooltip" data-placement="top" title="One line definition">      First time user</td>
                                    <td><i class="fal fa-check-circle"></i></td>
                                    <td><i class="fal fa-times-circle"></i></td>
                                    <td><i class="fal fa-times-circle"></i></td>
                                    
                                </tr>
                                <tr>
                                    <td>Adult     <img src="{{ asset('public/images/frontend/images/ex-icon.png')}}" alt="" data-toggle="tooltip" data-placement="top" title="One line definition">      Repeat user</td>
                                    <td><i class="fal fa-check-circle"></i></td>
                                    <td><i class="fal fa-check-circle"></i></td>
                                    <td><i class="fal fa-check-circle"></i></td>
                                </tr>
                                <tr>
                                    <td>Child (under 18)</td>
                                    <td><i class="fal fa-check-circle"></i></td>
                                    <td><i class="fal fa-times-circle"></i></td>
                                    <td><i class="fal fa-times-circle"></i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row flax align-items-center Prescriptions-step">
                <div class="col-md-3">
                <img src="{{ asset('public/images/frontend/images/step2.png')}}" alt="">
                </div>
                <div class="col-md-9">
                    <h3>Step 2 Doctor writes prescription </h3>
                </div>
            </div>
            <div class="row flax align-items-top Prescriptions-step">
                <div class="col-md-3">
                    <img src="{{ asset('public/images/frontend/images/step3.png')}}" alt="">
                </div>
                <div class="col-md-9">
                    <h3>Step 3 Choose Pharmacy</h3>
                    <p>
                        Option A. Prescription is posted to you (takes 2-3 working days) then take it to your local Pharmacy to collect drug. <span>Limited to UK Pharmacies & UK delivery addresses.</span>
                    </p>
                    <p>OR</p>
                    <p>Option B. In a hurry? Have the Prescription sent electronically to one of our
                        special Pharmacies (immediate). Before using OPTION B it is important you check
                        the special Pharmacy is local or can deliver to you
                        To check List of Pharmacies <a href="{{route('patient.search-pharmacies')}}">click here</a> </p>
                        
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 tex-center">
                    <a href="{{route('patient.search-doctors')}}" class="btn blue-button">Click to Start</a>
                </div>
            </div>
        </div>
    </section>
   
@endsection
@section('scripts')
    <script>
        

    </script>
@endsection