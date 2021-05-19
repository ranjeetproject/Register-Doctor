@extends('frontend.doctor.afterloginlayout.app')

@section('content')
    <div class="col Choose-Your-Doctor-right Medical-Record-page">
        <div class="row">
            <div class="col-sm-12">
               
                <div class="col Choose-Your-Doctor-right">
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
                                <div class="comm-title-details">
                                    <h4>Recorded Past Medical History <i class="fas fa-caret-down"></i></h4>
                                    <div class="add-and-edite"><a href="#"><i class="fal fa-plus"></i></a> <a href="#"><i class="fas fa-pencil-alt"></i></a></div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                      <p><label>Asthma </label>  Entry Dated :  28.3.2020</p>
                                      <p><label>Cancer </label>  Entry Dated :  28.3.2020</p>
                                      <p><label>Cardica Disease </label>  Entry Dated :  28.3.2020</p>
                                      <p><label>Skin Rashes </label>  Entry Dated :  28.3.2020</p>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="comm-title-details">
                                    <h4>Recorded Past Medical History</h4>
                                    <div class="add-and-edite"><a href="#"><i class="fal fa-plus"></i></a> <a href="#"><i class="fas fa-pencil-alt"></i></a></div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                      <p><label>Sore Throat </label>  Entry Dated :  28.3.2020</p>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="comm-title-details">
                                    <h4>Doctor's Diagnosis Details</h4>
                                </div>
                                <div class="card">
                                    <div class="card-body p-0">
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
                                                <tr>
                                                    <td>C00012345</td>
                                                    <td>Allergy</td>
                                                    <td>Dr. Shubha Agarwal</td>
                                                    <td><a href="#" class="btn">View Case</a><a href="#" class="btn">Print Case Summary</a></td>
                                                    <td>08.10.2019</td>
                                                </tr>
                                                <tr>
                                                    <td>C00012345</td>
                                                    <td>Allergy</td>
                                                    <td>Dr. Shubha Agarwal</td>
                                                    <td><a href="#" class="btn">View Case</a><a href="#" class="btn">Print Case Summary</a></td>
                                                    <td>08.10.2019</td>
                                                </tr>
                                                <tr>
                                                    <td>C00012345</td>
                                                    <td>Allergy</td>
                                                    <td>Dr. Shubha Agarwal</td>
                                                    <td><a href="#" class="btn">View Case</a><a href="#" class="btn">Print Case Summary</a></td>
                                                    <td>08.10.2019</td>
                                                </tr>
                                            </tbody>
                                          </table>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="comm-title-details">
                                    <h4>Recorded Drug and Allergy Histories <i class="fas fa-caret-down"></i></h4>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="comm-title-details">
                                            <h4>If you can please provide details of drugs taken in the past 6 months</h4>
                                            <div class="add-and-edite"><a href="#"><i class="fal fa-plus"></i></a> <a href="#"><i class="fas fa-pencil-alt"></i></a></div>
                                        </div>
                                        <div class="card-body p-0">
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
                                                    <tr>
                                                        <td>Flucloxacillin </td>
                                                        <td>500 mg</td>
                                                        <td>4x a day </td>
                                                        <td>Yes</td>
                                                        <td>08.10.2019</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Erythromycin </td>
                                                        <td>150 mg</td>
                                                        <td>qid</td>
                                                        <td>No </td>
                                                        <td>08.10.2019</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Maxidex </td>
                                                        <td>700 mg  </td>
                                                        <td>bd</td>
                                                        <td>No</td>
                                                        <td>08.10.2019</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                          <div class="bottom-cont">
                                            <p><label><strong>Weight</strong> : 85kg  </label>  Entry Dated :  28.3.2020</p>
                                            <p><label><strong>Height</strong> : 186 cm  </label>  Entry Dated :  28.3.2020</p>
                                          </div>
                                          <div class="comm-title-details">
                                            <h4>List any drug allergies. What happened </h4>
                                            <div class="add-and-edite"><a href="#"><i class="fal fa-plus"></i></a> <a href="#"><i class="fas fa-pencil-alt"></i></a></div>
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
                                                <tr>
                                                    <td>Flucloxacillin </td>
                                                    <td>Rash, breathing difficulty</td>
                                                    <td>28.3.2020 </td>
                                                </tr>
                                                <tr>
                                                    <td>Aspirin </td>
                                                    <td>Stomach upset  </td>
                                                    <td>28.3.2020 </td>
                                                </tr>
                                            </tbody>
                                          </table>
                                          <div class="comm-title-details">
                                            <h4>Drugs prescribed on this website</h4>
                                        </div>
                                        <div class="card-under-table">
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
                                    <div class="comm-title-details">
                                        <h4>Recorded Past Medical History <i class="fas fa-caret-down"></i></h4>
                                        <div class="add-and-edite"><a href="#"><i class="fal fa-plus"></i></a> <a href="#"><i class="fas fa-pencil-alt"></i></a></div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body Medical-History">
                                          <p><label>Family history cataracts :  squint eye, poor vision, diabetes </label>  Entry Dated :  28.3.2020</p>
                                          <p><label>History of alcoholism</label>  Entry Dated :  28.3.2020</p>                     
                                      </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="comm-title-details">
                                        <h4>Please provide your Family Doctor or GP Details <i class="fas fa-caret-down"></i></h4>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                          <p>Doctor name : jony jon</p>
                                          <p>Doctor address :  3a, Ho Chi Minh Sarani, Little Russel</p>
                                          <p>Email :  jony_demo@gmail.com</p>
                                          <p>Phone No :  +91 8670235469</p>
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