@extends('frontend.beforeloginlayout.app')

@section('banner')
@endsection
@section('content')

{{-- <section class="for-w-100 main-content innerpage  login-page">
        <div class="container">
        	<div class="row">
                <div class="col-sm-12">
                    <h1 class="inner-page-title">

                    </h1>
                </div>
            </div>
<br>
<div class="row">
 <div class="col-sm-12">

</div>
</div>
</div>
</section> --}}

<section class="for-w-100 main-content innerpage child-pathway-page">
    <div class="container">
        <div class="row ">
            <div class="col-md-3 child-pathway-left">
                <h1 class="page-title">Children</h1>
                <img src="{{ asset('public/images/frontend/images/ch-pic.jpg') }}" alt="">
                <p><a href="#">  For CHILD FAQs click here</a></p>
            </div>
            <div class="col-md-9">
                <ul class="child-pathway-right-top">
                    <li>
                        First create an account as the parent/guardian
                    </li>
                    <li>
                        Payment for any consultation is through the payment card of the parent
                    </li>
                    <li>
                        A Second parent can be added. Payment details are not shared between parents
                    </li>
                    <li>
                        A parent must be present with the child during a consultation
                    </li>
                    <li>
                        You will be guided through the following Consult Options
                    </li>
                </ul>
                <div class="follow-opction for-w-100">

                    <div class="follow-opction-left">
                        <div class="follow-opction-top">
                            <h2>Option 1 - Choose Your Doctor</h2>
                        </div>
                        <div class="follow-opction-bottom">
                            <table class="table table-responsiv" border="0">
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
                                        <td>Child <i class="fal fa-angle-left for-16"></i> 11  Consult <img src="{{ asset('public/images/frontend/images/ex-icon.png') }}" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line definition">

                                          </td>
                                          <td><i class="fal fa-check-circle"></i></td>
                                        <td><i class="fal fa-check-circle"></i></td>
                                        <td><i class="fal fa-check-circle"></i></td>


                                    </tr>
                                    <tr>
                                        <td>Child 11 - 18 Consult <img src="{{ asset('public/images/frontend/images/ex-icon.png') }}" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line definition"></td>
                                        <td><i class="fal fa-check-circle"></i></td>
                                        <td><i class="fal fa-times-circle"></i></td>
                                        <td><i class="fal fa-times-circle"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Child Prescription (<i class="fal fa-angle-left for-16"></i> 18)</td>
                                        <td><i class="fal fa-check-circle"></i></td>
                                        <td><i class="fal fa-times-circle"></i></td>
                                        <td><i class="fal fa-times-circle"></i></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="follow-opction-right">
                        <div class="follow-opction-top">
                            <h2>Option 2</h2>
                        </div>
                        <div class="follow-opction-bottom">
                            <table class="table table-responsiv" border="0">
                                <thead>
                                    <tr>
                                        <td>Quick Question</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><i class="fal fa-check-circle"></i></td>

                                    </tr>
                                    <tr>
                                        <td><i class="fal fa-check-circle"></i></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fal fa-times-circle"></i></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 tex-center">
                {{-- <a href="#" class="btn blue-button">Child FAQS</a> --}}
                <a href="{{ route('patient.view-childs') }}" class="btn blue-button">Click to Start </a>
            </div>
        </div>
    </div>
</section>

@endsection
