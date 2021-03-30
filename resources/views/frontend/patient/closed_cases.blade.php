@extends('frontend.patient.afterloginlayout.app')

@section('content')
    <div class="col Post-prescription-right Incoming-Prescription-Requests-page Closed-Cases">
        <div class="row">
            <div class="col-sm-12">
               
               <div class="col Incoming-Prescription-Requests-right">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb Pharmacist-doc-com">
                          <li class="breadcrumb-item active">Closed Cases</li>
                        </ol>
                      </nav>
                    <div class="for-w-100 Incoming-Prescription-Requests-right-table">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table class="table">
                                      <thead>
                                          <tr>
                                              <td>Date Closed</td>
                                              <td>Case ID  </td>
                                              <td> Doctor Name</td>
                                              <td> View </td>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                            <td>08-10-2020</td>
                                            <td>C00012345</td>
                                            <td>Dr. Shubha Agarwal</td>
                                      
                                            <td>
                                                <button href="#" target="_blank" class="btn blue-button">View Details</button>
                                              </td>
                                        </tr>
                                        <tr>
                                            <td>08-10-2020</td>
                                            <td>C00012345</td>
                                            <td>Dr. Shubha Agarwal</td>
                                      
                                            <td>
                                                <button href="#" target="_blank" class="btn blue-button">View Details</button>
                                              </td>
                                        </tr>
                                        <tr>
                                            <td>08-10-2020</td>
                                            <td>C00012345</td>
                                            <td>Dr. Shubha Agarwal</td>
                                      
                                            <td>
                                                 <button href="#" target="_blank" class="btn blue-button">View Details</button>
                                              </td>
                                        </tr>
                                        <tr>
                                            <td>08-10-2020</td>
                                            <td>C00012345</td>
                                            <td>Dr. Shubha Agarwal</td>
                                      
                                            <td>
                                                <button href="#" target="_blank" class="btn blue-button">View Details</button>
                                              </td>
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