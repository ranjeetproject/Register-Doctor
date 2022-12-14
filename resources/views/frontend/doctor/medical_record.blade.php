@extends('frontend.doctor.afterloginlayout.app')

@section('content')
    <div class="col-lg-9 Choose-Your-Doctor-right Medical-Record-page">
        <div class="row">
            <div class="col-sm-12">

                <div class="Choose-Your-Doctor-right">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb Pharmacist-doc-com">
                          <li class="breadcrumb-item"><a href="javascript:void(0)">Medical Record</a></li>
                        </ol>
                    </nav>
                    <form action="#">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                      <p><span>Name : </span> {{$case->user->name}}</p>
                                      <p><span>Sex :  </span> {{$case->user->profile->gender}}</p>
                                      <p><span>Date of Birth  : </span>{{date('d F Y',strtotime($case->user->profile->dob))}} </p>
                                      <p><span>Address : </span>  {{$case->user->profile->address}}</p>
                                      <p><span>Unique Patient Number (UPN) : </span>  {{$case->user->registration_number}}</p>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="comm-title-details mt-3">
                                    <h4>Recorded Past Medical History</h4>
                                   {{--  <div class="add-and-edite"><a href="#"><i class="fal fa-plus"></i></a> <a href="#"><i class="fas fa-pencil-alt"></i></a></div> --}}
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        @forelse($past_symptoms as $past_symptom)
                                         <p><label>{{$past_symptom->symptom}} </label>  Entry Dated :  {{ date('d.m.Y', strtotime($past_symptom->created_at))}}</p>
                                        @empty
                                         <p> No record found.</p>
                                        @endforelse

                                    </div>
                                  </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="comm-title-details mt-3">
                                    <h4>Recorded Past Medical History</h4>
                                    {{-- <div class="add-and-edite"><a href="#"><i class="fal fa-plus"></i></a> <a href="#"><i class="fas fa-pencil-alt"></i></a></div> --}}
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        @forelse($past_symptoms2 as $past_symptom2)
                                         <p><label>{{$past_symptom2->symptom}} </label>  Entry Dated :  {{ date('d.m.Y', strtotime($past_symptom2->created_at))}}</p>
                                        @empty
                                         <p> No record found.</p>
                                        @endforelse
                                    </div>
                                  </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="comm-title-details mt-3">
                                    <h4>Doctor's Diagnosis Details</h4>
                                </div>
                                <div class="card">
                                    <div class="card-body p-0 table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                              <tr>
                                                <th scope="col">Case ID</th>
                                                <th scope="col">Summary Diagnosis</th>
                                                <th scope="col">Doctor Name</th>
                                                <th style="width: 260px;"> View & Print Case Summary</th>
                                                <th>Date</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($cases as $case)
                                                <tr>
                                                    <td>{{$case->case_id}}</td>
                                                    <td>Allergy</td>
                                                    <td>{{$case->doctor->name}}</td>
                                                    <td><a href="{{route('doctor.view-case',$case->case_id)}}" class="btn">View Case</a><a href="{{route('doctor.print-case-summery',$case->case_id)}}" class="btn">Print Case Summary</a></td>
                                                    <td>{{ date('d.m.Y', strtotime($case->created_at))}}</td>
                                                </tr>
                                            @endforeach


                                            </tbody>
                                          </table>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="comm-title-details mt-3">
                                    <h4>Recorded Drug and Allergy Histories </h4>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="comm-title-details">
                                            <h4>If you can please provide details of drugs taken in the past 6 months</h4>
                                           {{--  <div class="add-and-edite"><a href="#"><i class="fal fa-plus"></i></a> <a href="#"><i class="fas fa-pencil-alt"></i></a></div> --}}
                                        </div>
                                        <div class="card-body p-0 table-responsive">
                                            <table class="table border-0" border="0">
                                                <thead>
                                                  <tr>
                                                    <th scope="col">Drug Name  </th>
                                                    <th scope="col">Dose</th>
                                                    <th scope="col">Frequency</th>
                                                    <th > Currently Taking   </th>
                                                    <th>Entry Dated </th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                       @foreach($drugs_details as $drug)

                                                    <tr>
                                                        <td>{{$drug->drug_name}} </td>
                                                        <td>{{$drug->dose}} </td>
                                                        <td>{{$drug->frequency}}  </td>
                                                        <td>{{($drug->currently_taking == 1)?'Yes':'No'}}</td>
                                                        <td>{{date('d.m.Y', strtotime($drug->created_at))}} </td>
                                                    </tr>
                                            @endforeach

                                                </tbody>
                                            </table>
                                        </div>

                                          <div class="bottom-cont">
                                            <p><label><strong>Weight</strong> : {{$last_symptroms_details->weight ?? ''}}  </label>  Entry Dated :  @if(isset($last_symptroms_details->created_at)) {{date('d.m.Y', strtotime($last_symptroms_details->created_at))}}</p>
                                            <p><label><strong>Height</strong> : {{$last_symptroms_details->height ?? ''}}  </label>  Entry Dated :                                              @endif</p>
                                          </div>
                                          <div class="comm-title-details">
                                            <h4>List any drug allergies. What happened </h4>
                                            {{-- <div class="add-and-edite"><a href="#"><i class="fal fa-plus"></i></a> <a href="#"><i class="fas fa-pencil-alt"></i></a></div> --}}
                                          </div>
                                          <table class="table border-0" border="0">
                                            <thead>
                                              <tr>
                                                <th scope="col">Drug Name  </th>
                                                <th scope="col">What Happened</th>
                                                <th scope="col">Frequency</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                       @foreach($drugs_problem as $drug)
                                                <tr>
                                                    <td>{{$drug->drug_name}} </td>
                                                    <td>{{$drug->what_happened}}</td>
                                                    <td>{{date('d.m.Y', strtotime($drug->created_at))}} </td>
                                                </tr>
                                       @endforeach

                                            </tbody>
                                          </table>
                                          <div class="comm-title-details mt-3">
                                            <h4>Drugs prescribed on this website</h4>
                                        </div>
                                        <div class="card-under-table table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                  <tr>
                                                    <th scope="col">Case ID</th>
                                                    <th scope="col">Summary Diagnosis</th>
                                                    <th scope="col">Doctor Name</th>
                                                    <th scope="col">Drug Name  </th>
                                                    <th> View</th>
                                                    <th>Date</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>C00012345</td>
                                                        <td>Allergy</td>
                                                        <td>Dr. Shubha Agarwal</td>
                                                        <td>Flucloxacillin </td>
                                                        <td><a href="#" class="btn">View<br> Prescription</a></td>
                                                        <td>08.10.2019</td>
                                                    </tr>
                                                </tbody>
                                              </table>
                                        </div>

                                    </div>
                                  </div>
                                  <div class="col-sm-12">
                                    <div class="comm-title-details mt-3">
                                        <h4>Recorded Past Medical History</h4>
                                        {{-- <div class="add-and-edite"><a href="#"><i class="fal fa-plus"></i></a> <a href="#"><i class="fas fa-pencil-alt"></i></a></div> --}}
                                    </div>
                                    <div class="card">
                                        <div class="card-body Medical-History">
                                          <p><label>Family history cataracts :  squint eye, poor vision, diabetes </label>  Entry Dated :  28.3.2020</p>
                                          <p><label>History of alcoholism</label>  Entry Dated :  28.3.2020</p>
                                      </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="comm-title-details mt-3">
                                        <h4>Please provide your Family Doctor or GP Details</h4>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                          <p>Doctor name : {{$case->user->profile->gp_name}}</p>
                                          <p>Doctor address :  {{$case->user->profile->gp_address}}</p>
                                          <p>Email :  {{$case->user->profile->gp_email}}</p>
                                          <p>Phone No :  {{$case->user->profile->gp_telephone}}</p>
                                        </div>
                                      </div>
                                </div>
                                <div class="col-sm-12">
                                    <p class="GP-cont">GP name and address mandatory if you have a UK GP and additionally want a prescription</p>
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" class="btn blue-button">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                </div>


            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>


    </script>
@endsection
