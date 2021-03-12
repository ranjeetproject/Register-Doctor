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

                    <div class="for-w-100 Incoming-Prescription-Requests-right-table">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table class="table">
                                      <thead>
                                          <tr>
                                              <td>Date Created</td>
                                              <td>Case ID</td>
                                              <td>View </td>
                                              <td>Action</td>
                                          </tr>
                                      </thead>
                                      <tbody>
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
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <nav aria-label="Page navigation example">
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
                                  </nav>
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