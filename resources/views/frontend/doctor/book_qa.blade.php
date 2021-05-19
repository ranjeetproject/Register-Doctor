@extends('frontend.doctor.afterloginlayout.app')

@section('content')
    <div class="col Choose-Your-Doctor-right innerpage  Prescriptions-Dispensed-page">
        <div class="row">
            <div class="col-sm-12">
                <div class="col Prescriptions-Dispensed-right">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb Pharmacist-doc-com">
                            <li class="breadcrumb-item active">Book Q & A</li>
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
                                              
                                             
                                              <td>Patient’s<br> Name  </td>
                                              <td>Case No.</td>
                                              <td> View <br>Case</td>
                                              <td>View Medical <br>Record</td>
                                           
                                              <td style="min-width: 250px;"> Action</td>
                                          </tr>
                                      </thead>
                                      <tbody>

                                      	@if(Auth::guard('siteDoctor')->user()->profile->dr_standard_fee_notification == 0)

                                      	  <tr>
                                            <td colspan="9">You are not able to take Quick Question. Please activate the Quick Question notification.</td>
                                          </tr>

                                      	@else

                                      	@foreach($quick_questions as $quick_question)
                                        <tr >
                                           
                                            <td>{{$quick_question->user->name}}</td>
                                            <td>{{$quick_question->case_id}}</td>
                                            
                                            <td><a href="{{route('doctor.view-case',$quick_question->case_id)}}" target="_blank" ><i class="fal fa-eye"></i></a></td>
                                            <td><a href="#"><i class="fal fa-eye"></i></a></td> 
                                   
                                            <td class="masg-dep-tol">
                                               
                                                <a href="{{route('doctor.chats',$quick_question->case_id)}}" class="btn p-btn "><span>Reply</span></a>
                                                @if(empty($quick_question->accept_status))
                                                <a href="{{route('doctor.doctor-accept-case',$quick_question->id)}}" class="btn blue-button btn-primary">Accept</a>
                                                @else
                                                <b class="text-success">Accepted</b>
                                                @endif

                                             </td>
                                             
                                        </tr>
                                        @endforeach
                                        @endif

                                      </tbody>
                                    </table>
                                  </div>
                                  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <nav aria-label="Page navigation example">
                                    {{ $quick_questions->onEachSide(1)->links() }}
                                  </nav>
                            </div>
                        </div>
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