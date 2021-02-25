@extends('frontend.beforeloginlayout.app')

@section('content')
    <section class="for-w-100 main-content innerpage  Contact-Us-page">
        <div class="container">
            
            <div class="row">
                <div class="col-sm-8 cont-in-left">
                    <h1 class="inner-page-title">
                        Get in touch
                    </h1>
                    <form>
                        <div class="row">
                            <div class="col">
                            <label for="formGroupExampleInput">Name</label>
                            <input type="text" class="form-control">
                            </div>
                            <div class="col">
                            <label for="formGroupExampleInput">Contact No</label>
                            <input type="tel" class="form-control">
                            </div>
                            <div class="col-sm-12">
                            <label for="formGroupExampleInput">Email Address</label>
                            <input type="email" class="form-control" >
                            </div>
                            <div class="col-sm-12">
                            <label for="formGroupExampleInput">Comment</label>
                            <textarea class="form-control"  rows="4"></textarea>
                            </div>
                            <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary blue-button">Submit</button>
                            </div>
                        </div>
                        </form>
                </div>
                <div class="col-sm-4 cont-in-right">
                    <h1 class="inner-page-title">
                        Contact Us
                    </h1>
                    <div class="contact-infodetails">
                        <p>{!! $contact_us->content !!}</p>

                        <ul>
                            <li><a href="{{ route('termsCondition')}}">Terms of Acceptable Use </a></li>
                            <li><a href="{{ route('privacyPolicy')}}">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection