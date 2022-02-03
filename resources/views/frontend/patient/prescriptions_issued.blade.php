@extends('frontend.patient.afterloginlayout.app')

@section('content')
    <div class="col Choose-Your-Doctor-right Doctor-Manage-Account-Profile-page">
        <div class="row">
            <div class="col-sm-12">
                <div class="col Prescription-page-right">

                    <nav aria-label="breadcrumb ">

                        <ol class="breadcrumb Pharmacist-doc-com">

                            <li class="breadcrumb-item active">Prescriptions Issued</li>

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


                                            <div class="form-group">

                                                <label>Case No.</label>

                                                <select name="case_no" id="case_no" class="form-control case_no">

                                                    <option value="">Select Case No.</option>

                                                    @foreach ($cases as $case)
                                                        <option value="{{ $case->case_id }}">{{ $case->case_id }} {{ $case->doctor->name }} @foreach($case->prescription as $prescription)
                                                            
                                                            @if($prescription->prescription_no != '')
                                                                @if($loop->index == 0)
                                                                    {{$prescription->updated_at}}
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        </option>
                                                    @endforeach

                                                </select>

                                            </div>

                                        </div>
                                        <div class="col-sm-12">

                                            <p id="presc_no"><strong>Prescription No.: </strong></p>
                                            <p id="doc_name"><strong>Doctor Name: </strong></p>
                                            <p id="date"><strong>Date: </strong></p>
                                            <p id="issued"><strong>Time: </strong></p>


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
                                <div class="col-sm-12" id="comments">

                                </div>

                                <div class="col-sm-12">

                                    <a id="msg_doc" href="#" target="_blank" class="btn blue-button">Message Doctor</a>
                                    <a id="sub_prisc" href="#" target="_blank" class="btn blue-button">Prescription Sent</a>

                                </div>

                            </div>

                        </form>



                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- modal -->

    <div class="modal fade add-edit-prs" id="finalprisc">

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
                                    <button type="button" id="final_prisc"
                                        class="add-submit btn blue-button Prescription-submit ">Submit</button>

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

            $('tr.only-remv').after().on('click', function() {

                $(this).remove();

            });

        });

        $(window).on('load', function() {
            $(".input-effect input, .input-effect textarea").focusout(function() {
                if ($(this).val() != "") {
                    $(this).addClass("has-content");
                } else {
                    $(this).removeClass("has-content");
                }
            })
        });
        $('#case_no').on('change', function() {
            var case_id = $(this).val();
            var _token = $("input[name=_token]").val();
            $.ajax({
                url: "{{ url('patient/ajaxPatientCasedetails') }}",
                type: 'POST',
                data: {
                    case_id: case_id,
                    _token: _token
                },
                success: function(res) {
                    console.log(res.case_details[0]);
                    var d_name = '<strong>Doctor Name: </strong>';
                    $('#doc_name').html(d_name + res.case_details[0].doctor.name);
                    $('#msg_doc').attr('href', "{{ url('patient/chats') }}/" + res.case_details[0].case_id);



                    //console.log(d_name);
                    //$('#p_name').val(res.case_details[0].doctor.name);sub_prisc

                    var prescription = res.prescription[0].prescription;
                    //prescription[i]['prescription_no']
                    var d_name = '<strong>Prescription No.: </strong>';
                    var date = '<strong>Date: </strong>';
                    var issued = '<strong>Time: </strong>';
                    if (prescription.length > 0) {
                        var presc_no = 0;
                        var date_time = 0;
                        var str = '';
                        for (i = 0; i < prescription.length; i++) {
                            console.log(prescription[i]);
                            if (prescription[i]['prescription_no'] != '') {
                                presc_no = prescription[i]['prescription_no'];
                                date_time = prescription[i]['updated_at'];
                            }
                            str += '<tr class="only-remv"><td>' + prescription[i]['drug'] +
                                '</td><td>' + prescription[i]['dose'] + '</td><td>' + prescription[i][
                                    'frequency'
                                ] + '</td><td>' + prescription[i]['route'] + '</td><td>' + prescription[
                                    i]['duration'] + '</td><td> ' + prescription[i]['comments'] +
                                '</td></tr>';
                            // $('#add-tr tbody').append('<tr class="only-remv"><td>'+prescription[i]['drug']+'</td><td>'+prescription[i]['dose']+'</td><td>'+prescription[i]['frequency']+'</td><td>'+prescription[i]['route']+'</td><td>'+prescription[i]['duration']+'</td><td> '+prescription[i]['comments']+'</td></tr>');
                        }
                        $('#add-tr tbody').html(str);
                        $('#sub_prisc').attr('href', "{{ url('patient/pharmacies') }}/?c_id=" + res
                            .case_details[0].case_id + "&s_id=" + presc_no);
                        $('#presc_no').html(d_name + presc_no);
                        date_time = date_time.split(" ");
                        var my_date = date_time[0];
                        var my_time = date_time[1];
                        $('#date').html(date + my_date);
                        $('#issued').html(issued + my_time); //msg_doc

                    } else {
                        $('#add-tr tbody').html('');
                        $('#sub_prisc').attr('href', "#");
                        $('#presc_no').html(d_name);
                        $('#date').html(date);
                        $('#issued').html(issued); //msg_doc

                    }

                    var comments_corr = '';
                    var comment_all = res.comments;
// console.log('====================================');
// console.log(res.prescription,comment_all);
// console.log('====================================');
                    comment_all.forEach(function (item, index) {
                        console.log('====================================');
                        console.log(index);
                        console.log('====================================');
                        if(index == 0) {
                            comments_corr += '<div class="row mt-2 "><div class="col-sm-12"> Comments Or Corrections</div></div>';
                        }
                        comments_corr += '<div class="row mt-1 "><div class="col-sm-9">'+item.comments+'</div><div class="col-sm-3">'+item.created_at+'</div></div>';
                    });
                    // {

                        // comments_corr += '<div class="row"><div class="col-sm-9">'+val.comments+'</div><div class="col-sm-3">'+val.created_at+'</div></div>';
                    // });
                    console.log('====================================');
                    console.log(comments_corr);
                    console.log('====================================');
                    $('#comments').html(comments_corr);

                }
            })

        });
        $('.case_no').on('change', function() {
            var case_id = $(this).val();
            var _token = $("input[name=_token]").val();
             var baseUrl = '{{route("patient.prescriptions-issued-update")}}';
            $.ajax({
                type: 'POST',
                url: baseUrl,
                data: {
                    case_id: case_id,
                    _token: _token
                },
                success: function (data)
                {
                    console.log(data)
                    var html = `<span>(${data})</span>`;
                    $("#hide").html(html);
                }
               
                
            });
        });
    </script>

@endsection
@section('scripts')
    <script>


    </script>
@endsection
