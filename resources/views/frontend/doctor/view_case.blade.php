@extends('frontend.doctor.afterloginlayout.app')

@section('content')
    <div class="col-lg-9 Choose-Your-Doctor-right innerpage  case-page">
        <div class="row">
            <div class="col-sm-12">



               <div class="container">
            <div class="row">
                <div class="col-sm-12 View-Case-top">
                    <button class="View-Case btn">View Case</button><button class="btn">Case ID : {{$case->case_id}}</button>
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
                    <h2>Patient Query</h2>
                    <div class="view-case-details">
                        <p>{{$case->health_problem}}</p>
                    </div>
                    <h2>Attachments</h2>
                    <div class="view-case-details v-case-view">
                        @foreach($case->casefile as $casefile)
                        @if (strpos($casefile->file_name, '.pdf') !== false)
                         <a class="nav-link" target="_blank" href="{{asset('public/uploads/cases/'.$casefile->file_name)}}">
                            <!-- <p><embed src="{{asset('public/uploads/cases/'.$casefile->file_name)}}" width="500px" height="600px" class="img-thumbnail"/></p> -->
                            <i class="fas fa-file-pdf"></i>
                            <div class="v-case-view-btn"><span>View</span></div>
                        </a>
                        @else
                         <a class="nav-link" target="_blank" href="{{asset('public/uploads/cases/'.$casefile->file_name)}}">
                            <!-- <p><img width="500px" height="300px" class="img-thumbnail" src="{{asset('public/uploads/cases/'.$casefile->file_name)}}"></p> -->
                            <i class="fas fa-file-image"></i>
                            <div class="v-case-view-btn"><span>View</span></div>
                        </a>
                        @endif
                        <br>
                        @endforeach
                    </div>


                    @if(!empty($case->medicine_name))
                    <h4>If there is any specific medicine you have in mind you may mention it here.</h4>
                    <div class="view-case-details">
                        <b>{{$case->medicine_name}}</b>
                    </div>
                    <p>The doctor will prescribe what he feels is the most appropriate medicine</p>
                    @endif

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
