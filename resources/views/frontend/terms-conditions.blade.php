@extends('frontend.beforeloginlayout.app')

@section('content')


<section class="for-w-100 main-content innerpage  login-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="inner-page-title">
                    Terms & Conditions
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 mb-3 mt-2">
                <ul class="nav nav-pills t-c-page">
                    <li class="nav-item">
                    <a class="nav-link btn {{(Request::segment(2)=='') ? 'Active':''}}"  href="{{route('termsCondition')}}">
                        Patient
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link btn {{(Request::segment(2)=='doctor') ? 'Active':''}}" href="{{route('termsCondition','doctor')}}">Doctor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn {{(Request::segment(2)=='pharmacist') ? 'Active':''}}"  href="{{route('termsCondition','pharmacist')}}">Pharmacist</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <p> {!! $get_terms_condition->content !!}</p>
            </div>
        </div>
</div>
</section>



@endsection