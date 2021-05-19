@extends('frontend.patient.afterloginlayout.app')

@section('content')
    <div class="col Post-prescription-right Incoming-Prescription-Requests-page">
        <div class="row">
            <div class="col-sm-12">
               
                <div class="col Incoming-Prescription-Requests-right Saved-Cases-page">
                    <h2 class="for-title">Saved Cases</h2> 
                        <p>You have not chosen a Doctor to send the Cases below to<br>
                            Please click the Resume tab below to advance the Case to a doctor<br>
                            Saved cases will be deleted after 4 weeks</p>

<a href="{{route('patient.create-case')}}" class="btn blue-button lineheight">Create new case</a>

                    <div class="for-w-100 Incoming-Prescription-Requests-right-table">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table class="table">
                                      <thead>
                                          <tr>
                                              <td>Date Created</td>
                                              <td>Case ID</td>
                                              <td>Type</td>
                                              {{-- <td>View </td> --}}
                                              <td>Action</td>
                                          </tr>
                                      </thead>
                                      <tbody>

                                        @forelse ($cases as $case)
                                        <tr>
                                            <td>{{$case->created_at}}</td>
                                            <td>{{$case->case_id}}</td>
                                            <td>
                                                @if($case->questions_type == 1)
                                                Live Chat
                                                @endif
                                                 @if($case->questions_type == 3)
                                                Quick Questions
                                                @endif
                                            </td>
                                            {{-- <td><a href="#" class="btn blue-button lineheight">View details</a></td> --}}
                                            <td>
                                                <a href="{{route('patient.chats',$case->case_id)}}" target="_blank" class="btn blue-button lineheight">Reply</a>

                                                <a href="#" class="btn blue-button lineheight">View details</a>
                                                
                                                <a href="#" class="btn blue-button lineheight">Resume - send to Doctor</a></td>
                                        </tr>
                                        @empty
                                  <p>No data found</p>
                              @endforelse
                                        {{-- <tr>
                                            <td>08-10-2020</td>
                                            <td>C00012345</td>
                                            <td><a href="#" class="btn blue-button lineheight">View details</a></td>
                                            <td><a href="#" class="btn blue-button lineheight">Resume - send to Doctor</a></td>
                                        </tr>
                                        <tr>
                                            <td>08-10-2020</td>
                                            <td>C00012345</td>
                                            <td><a href="#" class="btn blue-button lineheight">View details</a></td>
                                            <td><a href="#" class="btn blue-button lineheight">Resume - send to Doctor</a></td>
                                        </tr>
                                        <tr>
                                            <td>08-10-2020</td>
                                            <td>C00012345</td>
                                            <td><a href="#" class="btn blue-button lineheight">View details</a></td>
                                            <td><a href="#" class="btn blue-button lineheight">Resume - send to Doctor</a></td>
                                        </tr> --}}
                                      </tbody>
                                    </table>
                                  </div>
                                  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                {{$cases->links()}}
                            </div>
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