@extends('frontend.doctor.afterloginlayout.app')

@section('content')
    <div class="col Choose-Your-Doctor-right innerpage  case-page">
        <div class="row">
            <div class="col-sm-12">



               <div class="container">
            <div class="row">
            <div class="col Case-Conclusion-live-Video-and-live-Chat-right">

                    <span class="cash-id">Case ID : {{$case->case_id}}</span> <button class="btn cash-consol-btn">Case Conclusion</button>

                </div>
                <div class="col-sm-12">
                    <div class="view-case-details">
                        <ul>
                            <li><label>Name </label><span class="cont"> <span>:</span>   {{$case->user->name}}</span></li>
                            <li><label>Sex </label><span class="cont"> <span>:</span>    {{$case->user->profile->gender}}</span></li>
                            <li><label>Date of Birth </label><span class="cont"> <span>:</span>    {{date('d F Y',strtotime($case->user->profile->dob))}}</span></li>
                            <li><label>Address </label><span class="cont"> <span>:</span>  {{$case->user->profile->address}}</span></li>
                            <li><label>Unique Patient Number (UPN) </label><span class="cont"> <span>:</span>   {{$case->user->registration_number}}</span></li>
                        </ul>
                    </div>

                    <form method="post">
                        @csrf

                    <div class="row">

                            <div class="col-sm-12">

                                <div class="form-group">

                                    <p>Summary Diagnosis</p>

                                    <label for="exampleInputEmail1">Please input the Summary Diagnosis <sup>*</sup> <span><sup>*</sup> Mandatory fields</span></label>

                                    <textarea name="summary_diagnose" id="summary_diagnose" class="form-control"  rows="6">{{$case->getSummaryDiagnosis->summary_diagnose ?? ''}}</textarea>

                                  </div>

                            </div>

                        </div>



                        <div class="row">

                            <div class="col-sm-12">

                                <div class="form-group">

                                    <label for="exampleInputEmail1">Record your findings in case of future reference.</label>

                                    <textarea name="future_reference" id="future_reference" class="form-control"  rows="6">{{$case->getSummaryDiagnosis->future_reference ?? ''}}</textarea>

                                  </div>

                            </div>

                        </div>

                        <div class="row update-text">

                            <div class="col-sm-12">

                                <p>To update the Patient Medical Record  <a href="#">Click here</a>  e.g. Update allergies, comments for colleagues</p>

                                <p>To Print Prescriptions & Notes to GPs use 'Prescriptions Issued' and 'Closed Cases' [Lefthand Navigation Menu]</p>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-sm-12">

                                <button class="btn blue-button sd_btn">submit</button>

                            </div>

                        </div>

                        </form>



                </div>
            </div>
            {{-- <div class="row Doctor Replies">
                <div class="col-sm-2 " style="padding-left: 0px;">
                    <h2>Doctor Replies <i class="fas fa-caret-down"></i></h2>
                </div>
                <div class="col-sm-4">
                    <p>
                        Quick Question / Q&A Recorded Exchanges. Live Consults Recorded Notes.
                    </p>
                </div>
                <div class="col-sm-6 dared">
                    <p>Entry dated : 28.08.2020</p>
                    <p>Entry dated : 28.08.2020</p>
                </div>
            </div>
            <div class="row">
                <div class="Summary" style="padding-left: 15px;">
                    <h2>Summary Diagnoses  <i class="fas fa-caret-down"></i></h2>
                </div>
                <div class="col">
                    <p>Entry dated : 28.08.2020</p>
                </div>
            </div> --}}

        </div>



            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>

    </script>
@endsection
