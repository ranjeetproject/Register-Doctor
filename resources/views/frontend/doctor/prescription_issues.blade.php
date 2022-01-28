@extends('frontend.doctor.afterloginlayout.app')

@section('content')
    <div class="col Choose-Your-Doctor-right innerpage  Prescriptions-Dispensed-page">
        <div class="row">
            <div class="col-sm-12">
                <div class="col Prescriptions-Dispensed-right">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb Pharmacist-doc-com">
                            <li class="breadcrumb-item active">Prescriptions Issued</li>
                        </ol>
                      </nav>

                    <div class="for-w-100 Prescriptions-Dispensed-right-table">
                        <div class="row">
                            <div class="col-sm-12">
                                <form class="form-inline">
                                    <div class="form-group">
                                      <label>Show</label>
                                      <select class="form-control">
                                        <option>8</option>
                                      </select>
                                      <span>entries</span>
                                    </div>
                                  </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table class="table Prescriptions-Dispensed-table">
                                      <thead>
                                          <tr>
                                              <td>Date</td>
                                              <td>Patient’s<br> Name  </td>
                                              <td>Case No.</td>
                                              <td> View <br>Case</td>
                                              <td>View Medical <br>Record</td>
                                              <td> Prescription No.</td>
                                              <td style="min-width: 150px;"> Action</td>
                                              <td> Comments/Corrections <br>if any</td>

                                          </tr>
                                      </thead>
                                      <tbody>
                                      @foreach($cases as $case)
                                      {{-- @dd($case->getPrescriptionComents, $case->getPrescriptionComents[0]->coments) --}}
                                        <tr >
                                            <td>{{date('dS M Y', strtotime($case->updated_at)) }}</td>

                                            <td>{{$case->user->name}}</td>
                                            <td>{{$case->case_id}}</td>

                                            <td><a target="_blank" href="{{url('doctor/view-case')}}/{{$case->case_id}}"><i class="fal fa-eye"></i></a></td>
                                            <td><a target="_blank" href="{{url('doctor/view-medical-recorde')}}/{{$case->case_id}}"><i class="fal fa-eye"></i></a></td>
                                            <td>{{$case->prescription[0]->prescription_no}}</td>
                                            <td class="masg-dep-tol">
                                                <!-- <button class="btn Decline p-btn"><img src="{{ asset('public/images/frontend/images/P-icon.png')}}" alt=""><span>Open<br>Prescription</span></button>
                                                <button class="btn Decline p-btn"><img src="{{ asset('public/images/frontend/images/P-icon.png')}}" alt=""><span>Print<br>Prescription</span></button><br> -->
                                                <a href="{{url('doctor/viewPrescription')}}/{{$case->case_id}}"  target="_blank" class="btn blue-button btn-block Print-GP-Note"><img src="{{ asset('public/images/frontend/images/P-icon.png')}}" alt=""> Prescription</a>
                                             </td>
                                             <td>


                                                 @if (!empty($case->getPrescriptionComents) && !empty($case->getPrescriptionComents[0]->comments))
                                                    <p>{{ $case->getPrescriptionComents[0]->comments }} <a class="btn btn-sm btn-link" onclick="openModal('{{ $case->case_id }}')">
                                                        View more
                                                    </a></p>
                                                 @else
                                                 <p>No comment or correction found</p>
                                                 @endif

                                                <form method="POST" action="{{ route('doctor.prescription_comment') }}" class="text-center">
                                                    @csrf
                                                    <input type="hidden" name="case_id" value="{{$case->case_id}}">
                                                    <textarea name="comments" id="" cols="30" rows="1" class="form-control" required></textarea>
                                                    <button type="submit" class="btn btn-sm btn-primary mt-1">save</button>
                                                </form>
                                             </td>

                                        </tr>

                                        @endforeach


                                      </tbody>
                                    </table>
                                  </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-end">
                                      <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                      </li>
                                      <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                                      <li class="page-item clickabled">
                                        <a class="page-link" href="#">Next</a>
                                      </li>
                                    </ul>
                                  </nav> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    <div class="modal modal-big" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Comments or Corrections</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" id="modal_body">
              Modal body..
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
      </div>
@endsection
@section('scripts')
    <script>
         function openModal(case_id) {

            // edit-weekly-day
            $.ajax({
                url: "{{ route('doctor.prescription_comment_list') }}",
                type: 'get',
                dataType: "json",
                // data:{state:state,type:type,_token:token}
                data: {
                    case_id: case_id
                }
            }).done(function(response) {
                console.log(response);
                // if (typeof response != "undefined") {
                    var str = '';
                    response.forEach(function (item, index) {
                    console.log(item, index);
                    str += '<div class="row"><div class="col-10">'+ item.comments +'</div><div class="col-2">'+item.created_at+'</div></div>';
                    });
                    for (var obj  in response) {
                        console.log('====================================');
                        console.log(obj);
                        console.log('====================================');

                        // // skip loop if the property is from prototype
                        // if (!obj.hasOwnProperty(prop)) continue;

                        // // your code
                        // alert(prop + " = " + obj[prop]);
                    }
                    $("#modal_body").html(str);
                    $('#myModal').modal('show');
                // }
            });
        }
    </script>
@endsection
