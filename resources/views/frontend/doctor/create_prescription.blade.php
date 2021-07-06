@extends('frontend.doctor.afterloginlayout.app')

@section('content')
    <div class="col Choose-Your-Doctor-right Doctor-Manage-Account-Profile-page">
        <div class="row">
            <div class="col-sm-12">
                <div class="col Prescription-page-right">

                    <nav aria-label="breadcrumb ">

                        <ol class="breadcrumb Pharmacist-doc-com">

                            <li class="breadcrumb-item active">Prescription Page</li>

                        </ol>

                        <p style="margin-top: -16px; margin-bottom: 12px;">The prescription form will take you through the key points below which you should read</p>

                      </nav>

                    <div class="for-w-100">

                        <form action="#">

                            <div class="row">

                                <div class="col-sm-12">

                                    <div class="card">

                                        <div class="card-body">

                                            <ul>

                                                <li>

                                                    You agree to have read the Ts and Cs for online prescribing. This is in your Handy Documents. A copy is here <a href="#" style="color: #000000;"><i class="fas fa-file-import"></i></a>.

                                                </li>

                                                <li>

                                                    All Child Prescriptions require live video consultation.

                                                </li>

                                                <li>

                                                    For Adults if this is the first prescription being issued on this website they require live video consultation. However if the adult has previously been issued a prescription (for any drug) you may use any from of communication including accepting typed requests, as per your professional judgment.

                                                </li>

                                                <li>

                                                    ANY FIRST TIME PRESCRIPTION REQUIRES YOU TO CONFIRM THE PATIENT’S FACE WITH PHOTO ID  THEY HOLD UP ON THE WEBCAM. If the patient previously had a prescription on this site issued for ANY drug you do not need to check ID.

                                                </li>

                                                <li>

                                                    Prescriptions should not usually be for more than 28 days unless for special reasons e.g. patient going on holiday for 2 months.

                                                </li>

                                                <li>

                                                    In the form below you can check for allergies etc. Patients resident in the UK must have entered their GP’s address.

                                                </li>

                                                <li>

                                                    You can message the patient for clarification.

                                                </li>

                                            </ul>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-12">

                                    <p class="Creat-Prescription-title">Create Prescription</p>

                                </div>

                                <div class="col-sm-12 Prescription-form-fild">

                                    <div class="row">

                                        <div class="col-sm-6">

                                            <div class="form-group">

                                                <label >Case No.</label>

                                                <select class="form-control">

                                                    <option value="">Select Case No.</option>

                                                   @foreach($cases as $case)
                                                   <option value="{{$case->case_id}}">{{$case->case_id}}</option>
                                                   @endforeach

                                                  </select>

                                              </div>

                                        </div>

                                        <div class="col-sm-6">

                                            <div class="form-group">

                                                <label >Patient Name</label>

                                                <input type="text" class="form-control"  placeholder="">

                                              </div>

                                        </div>

                                        <div class="col-sm-6">

                                            <div class="form-group">

                                                <label >Guardian Name (Optional)</label>

                                                <input type="text" class="form-control"  placeholder="">

                                              </div>

                                        </div>

                                        <div class="col-sm-6">

                                            <div class="form-group">

                                                <label >Unique Patient No. (UPN)</label>

                                                <input type="text" class="form-control"  placeholder="">

                                              </div>

                                        </div>

                                        <div class="col-sm-12">

                                            <p>For this prescription [you must use webcam and check ID OR you must use webcam but do not need to check ID OR you do not need to use webcam or check ID]</p>

                                            <p><a href="#">Click</a> to see patient medical record including allergies and for UK patients their GP details</p>

                                            <p><a href="#">Click</a> to contact patient before issuing prescription</p>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-sm-12 Drug-Prescribed-list mt-3">

                                    <!-- <p>Drug Prescribed</p> -->

                                    <!-- <p><strong style="color: #000000;">Example :</strong> Do not stop without medical advice, see your GP for monitoring weight every 2 weeks, prednisolone 10mg po od then 5mg po od then stop. </p> -->

                                    <div class="table-responsive">

                                        <div class="add-and-edit">

                                            <a data-toggle="modal" data-target="#add-pop"><i class="fas fa-plus"></i></a>
                                        </div>

                                        <table class="table Live-Chat add-edt-table-details" id="add-tr"> 

                                          <thead>

                                              <tr>

                                                <td>Prescription No. </td>

                                                  <td>Drug </td>

                                                  <td>Dose</td>

                                                  <td>Frequency</td>

                                                  <td>Route</td>

                                                  <td>Duration</td>

                                                  <td>Comments</td>
                                                  <td style="min-width:120px;"></td>
                                              </tr>

                                            </thead>

                                            <tbody>

                                                <tr class="only-remv">

                                                    <td>e.g. 12345</td>

                                                    <td>Flucloxacillin</td>

                                                    <td>500 milligrams</td>

                                                    <td>4x per day</td>

                                                    <td>Oral tablets</td>

                                                    <td>One Week</td>

                                                    <td>
                                                        <strong>See GP</strong> for weekly weight check <br>Reduce prednisolone by 10mg a day</td>
                                                    <td>
                                                        <a data-toggle="modal" data-target="#edit-pop"><i class="fas fa-pencil-alt"></i></a> 
                                                        <a class="delt"><i class="far fa-trash-alt"></i></a> 
                                                    </td>
                                                </tr>

                                                <!-- <tr >

                                                    <td><input type="text"></td>

                                                    <td><input type="text"></td>

                                                    <td><input type="text"></td>

                                                    <td><input type="text"></td>

                                                    <td><input type="text"></td>

                                                    <td><input type="text"></td>

                                                    <td><input type="text"></td>

                                                </tr> -->

                                                <!--<tr >

                                                    <td>Flucloxacillin</td>

                                                    <td>500 milligrams</td>

                                                    <td>4x per day</td>

                                                    <td>Oral tablets</td>

                                                    <td>One Week</td>

                                                    <td>Contact doctor if not improving</td>

                                                </tr> -->

                                            </tbody>

                                        </table>

                                    </div>

                                </div>

                                <div class="col-sm-12 Additional-Information">

                                    <!-- <div class="form-group">

                                        <label >Additional Information</label>

                                        <textarea class="form-control"  rows="5" placeholder="Do not stop without medical advice, see your GP for monitoring weight every 2 weeks, prednisolone 10mg po od then 5mg po od then stop."></textarea>

                                    </div> -->

                                    <p>

                                        Once submited you cannot change the prescription. You can however delete it or write a new one. To delete go to the Prescriptons Issued option in your menu. To write a new prescription use the <strong>Create Prescription</strong> option in your menu.

                                    </p>

                                </div>

                                <div class="col-sm-12">

                                    <div class="btn blue-button Prescription-submit ">Submit</div>

                                </div>

                            </div>

                        </form>

                        

                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- modal -->
    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-pop">
       Add
      </button>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-pop">
        Edit
       </button> --}}
    <div class="modal fade Prescribed-Modal" id="Prescribed-Modal" >

        <div class="modal-dialog modal-dialog-centered" role="document">

          <div class="modal-content">

            <div class="modal-body">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                  </button>

                <p>

                    The prescription is now available to the patient who will decide whether to have the Prescription posted to them or sent electronically to a Pharmacist of their choice. CHECK YOUR MESSAGES AS YOU WILL BE REQUIRED TO DOWNLOAD AND POST THE SIGNED PRESCRIPTION TO EITHER THE PATIENT OR A PHARMACIST. Pharmacists may seek clarification on prescriptions before dispensing them. They may also ring you. If going abroad please ensure you are contactable or make appropriate cover. <b>Issued Prescriptions show in your Menu in the Iefthand navigation.</b>

                </p>

            </div>

          </div>

        </div>

      </div>



      <!-- add and edit -->
      <div class="modal fade add-edit-prs" id="add-pop" >

        <div class="modal-dialog modal-dialog-centered" role="document">

          <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                  </button>
                <div class="col-sm-12 Prescription-form-fild">
                    <h1 class="inner-page-title text-center mb-4">
                        Add Drug Prescribed
                    </h1>
                    <form class="row">
                        <div class="col-sm-12 input-effect">
                            
                            <div class="form-group">
                                
                                <input type="text" class="form-control effect-19" >
                                <label>Drug</label>
                            </div>
                            <div class="form-group">
                                
                                <input type="text" class="form-control effect-19" >
                                <label>Dose</label>
                            </div>
                            <div class="form-group">
                                
                                <input type="text" class="form-control effect-19">
                                <label>Frequency</label>
                            </div>
                            <div class="form-group">
                                
                                <input type="text" class="form-control effect-19">
                                <label>Duration</label>
                            </div>
                            <div class="form-group">
                                
                                <textarea name="" id="" class="form-control effect-19" rows="4"></textarea>
                                <label>Comments</label>
                            </div>
                            <div class="form-group text-center">
                                <button class="add-submit btn blue-button Prescription-submit ">Submit</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
          </div>

        </div>

      </div>

      <div class="modal fade add-edit-prs" id="edit-pop" >

        <div class="modal-dialog modal-dialog-centered" role="document">

          <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                  </button>
                <div class="col-sm-12 Prescription-form-fild">
                    <h1 class="inner-page-title text-center mb-4">
                        Edit Drug Prescribed
                    </h1>
                    <form class="row">
                        <div class="col-sm-12 input-effect">
                            
                            <div class="form-group">
                                
                                <input type="text" class="form-control effect-19 has-content" value="Flucloxacillin " >
                                <label>Drug</label>
                            </div>
                            <div class="form-group">
                                
                                <input type="text" class="form-control effect-19 has-content" value="500 milligrams">
                                <label>Dose</label>
                            </div>
                            <div class="form-group">
                                
                                <input type="text" class="form-control effect-19 has-content" value="4x per day ">
                                <label>Frequency</label>
                            </div>
                            <div class="form-group">
                                
                                <input type="text" class="form-control effect-19 has-content" value="Oral tablets">
                                <label>Route</label>
                            </div>
                            <div class="form-group">
                                
                                <input type="text" class="form-control effect-19 has-content" value="One Week">
                                <label>Duration</label>
                            </div>
                            <div class="form-group">
                                
                                <textarea name="" id="" type="text" placeholder="See GP for weekly weight check reduce prednisolone by 10mg a day" class="form-control effect-19 has-content"  rows="4">
                                    
                                </textarea>
                                <label>Comments</label>
                            </div>
                            <div class="form-group text-center">
                                <button class="add-submit btn blue-button Prescription-submit ">Submit</button>
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
         $('#Prescribed-Modal').modal('show');

    //      $(".add-and-edit").click(function(){

    //     $("#add-tr").append('<tr class="only-remv"><td>e.g. 12345</td><td>Flucloxacillin</td><td>500 milligrams</td><td>4x per day</td><td>Oral tablets</td><td>One Week</td><td><strong>See GP</strong> for weekly weight check <br>Reduce prednisolone by 10mg a day</td></tr>');

    //     $("#add-tr").load();

    // });

    $("#add-tr").load(function() {

        $('tr.only-remv').after().on('click',function(){

             $(this).remove();

        });

});

 $(window).on('load', function(){
  $(".input-effect input, .input-effect textarea").focusout(function(){
  if($(this).val() != ""){
  $(this).addClass("has-content");
  }else{
  $(this).removeClass("has-content");
  }
  })
});

</script>
@endsection