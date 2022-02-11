@extends('frontend.pharmacist.afterloginlayout.app')

@section('content')
<div class="col Choose-Your-Doctor-right Doctor-Manage-Account-Profile-page">
        <div class="row">
            <div class="col-sm-12">
                <div class="col Prescription-page-right">

                    <nav aria-label="breadcrumb ">

                        <ol class="breadcrumb Pharmacist-doc-com">

                            <li class="breadcrumb-item active">Prescriptions</li>

                        </ol>

                      </nav>

                    <div class="for-w-100">

                        <form action="#">

                            <div class="row">

                                <div class="col-sm-12">

                                    <p class="Creat-Prescription-title">View Prescription</p>

                                </div>

                                <div class="col-sm-12 Prescription-form-fild">

                                    <div class="row">

                                        <div class="col-sm-6">


                                            {{-- @dump($priscriptions) --}}
                                            <div class="form-group">

                                                <label >Prescription No.</label>

                                                <select name="case_no" id="case_no"  class="form-control select_search">

                                                    <option value="">Select Prescription No.</option>
                                                   @foreach($priscriptions as $prisc)
                                                   <option value="{{$prisc->case_id}}">A{{$prisc->priscription_id}} {{$prisc->patientcase->doctor->name}} {{$prisc->patientcase->user->name}}</option>
                                                   @endforeach

                                                </select>

                                            </div>

                                        </div>
                                        <div class="col-sm-12">

                                            <p id="presc_no"><strong>Prescription No.: </strong></p>
                                            <p id="doc_name"><strong>Paitent Name: </strong></p>
                                            <p id="date"><strong>Date: </strong></p>
                                            <p id="issued"><strong>Issued: </strong></p>


                                        </div>

                                    </div>

                                </div>

                                <div class="col-sm-12 Drug-Prescribed-list mt-3">

                                    <!-- <p>Drug Prescribed</p> -->

                                    <!-- <p><strong style="color: #000000;">Example :</strong> Do not stop without medical advice, see your GP for monitoring weight every 2 weeks, prednisolone 10mg po od then 5mg po od then stop. </p> -->

                                    <div class="table-responsive">



                                        <table class="table Live-Chat add-edt-table-details" id="add-tr">

                                          <thead>

                                              <tr>



                                                  <td>Drug </td>

                                                  <td>Dose</td>

                                                  <td>Frequency</td>

                                                  <td>Route</td>

                                                  <td>Duration</td>

                                                  <td>Comments</td>

                                              </tr>

                                            </thead>

                                            <tbody>


                                            </tbody>

                                        </table>

                                    </div>

                                </div>

                                <div class="col-sm-12">

                                    {{-- <a id="msg_doc" href="#" target="_blank" class="btn blue-button">Message Doctor</a> --}}
                                    <a id="sub_prisc" href="#" data-toggle="modal" data-target="#finalprisc" class="btn blue-button">Submit Priscription</a>

                                </div>

                            </div>

                        </form>



                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- modal -->

<div class="modal fade add-edit-prs" id="finalprisc" >

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>
                <div class="col-sm-12 Prescription-form-fild">
                    <h1 class="inner-page-title text-center mb-4">
                        Please check after theat the prescription will visible for patients
                    </h1>
                    <form class="row" action="">
                        <div class="col-sm-12 input-effect">

                            <div class="form-group text-center">
                                <button type="button" id="final_prisc" class="add-submit btn blue-button Prescription-submit ">Submit</button>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>

</div>


 <!-- Error modal -->
<div class="modal fade add-edit-prs" id="error_finalprisc" >

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>
                <div class="col-sm-12 Prescription-form-fild">
                    <h1 class="inner-page-title text-center mb-4">
                        Please Select Prescriptions No.
                    </h1>
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
$('#case_no').on('change', function(){
    var case_id = $(this).val();
    var _token = $("input[name=_token]").val();
    $('#doc_name').html('<strong>Paitent Name: </strong>');
    $('#presc_no').html('<strong>Prescription No.: </strong>');
    $('#date').html('<strong>Date: </strong>');
    $('#issued').html('<strong>Issued: </strong>');
    $.ajax({
        url: "{{ url('pharmacist/ajaxAcceptPriscriptionDetails')}}",
        type: 'POST',
        data:{
            case_id : case_id,
            _token : _token
        },
        success:function(res){
            console.log(res.case_details[0]);
            var prescription =res.prescription[0].prescription;
            //prescription[i]['prescription_no']
            if(prescription.length > 0){

                $('#msg_doc').attr('href',"{{url('patient/chats')}}/"+res.case_details[0].case_id);
                $('#doc_name').html( '<strong>Paitent Name: </strong>'+res.case_details[0].user.name);
                var presc_no =0;
                var date_time =0;
                for(i=0; i < prescription.length; i++){
                    console.log(prescription[i]);
                    if(prescription[i]['prescription_no'] != ''){
                        presc_no = prescription[i]['prescription_no'];
                        date_time = prescription[i]['updated_at'];
                    }

                    $('#add-tr tbody').html('<tr class="only-remv"><td>'+prescription[i]['drug']+'</td><td>'+prescription[i]['dose']+'</td><td>'+prescription[i]['frequency']+'</td><td>'+prescription[i]['route']+'</td><td>'+prescription[i]['duration']+'</td><td> '+prescription[i]['comments']+'</td></tr>');
                }
               // $('#sub_prisc').attr('href',"{{url('patient/pharmacies')}}/?c_id="+res.case_details[0].case_id+"&s_id="+presc_no);
                //var d_name = $('#presc_no').html();
                $('#presc_no').html( '<strong>Prescription No.: </strong>'+'A'+presc_no);
                date_time =  date_time.split(" ");
                var my_date  = date_time[0];
                var my_time  = date_time[1];
               // var date = $('#date').html();
                $('#date').html('<strong>Date: </strong>'+my_date);
                //var issued = $('#issued').html();
                $('#issued').html('<strong>Issued: </strong>'+my_time);//msg_doc

            }else{
                //
            }
        }
    })

});

$('#final_prisc').on('click', function(){
    var case_id = $('#case_no').val();
    var _token = $("input[name=_token]").val();
    $.ajax({
        url: "{{ url('pharmacist/ajaxAcceptPriscriptionDetailsSendStatus')}}",
        type: 'POST',
        data:{
            case_id : case_id,
            _token : _token
        },
        success:function(res){
            if(res.accepted_priscription == 1){
                $('#finalprisc').modal('hide');
                location.href = "{{url('pharmacist/dispensed-prescriptions')}}";
            }else{  
                $('#finalprisc').modal('hide');
                $('#error_finalprisc').modal('show');
            }
        }
    })
})
$(document).ready(function() {
    $('.select_search').select2();
});

</script>

@endsection
@section('scripts')
    <script>


    </script>
@endsection
