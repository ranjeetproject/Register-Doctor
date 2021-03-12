@extends('frontend.patient.afterloginlayout.app')

@section('content')
    <div class="col Post-prescription-right Incoming-Prescription-Requests-page">
        <div class="row">
            <div class="col-sm-12">
               
                <div class="col Incoming-Prescription-Requests-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb Pharmacist-doc-com">
                            
                          <li class="breadcrumb-item active">Requested Consultations</li>
                        </ol>
                      </nav>
                    <div class="for-w-100 Incoming-Prescription-Requests-right-table mt-0">
                        <div class="row">
                            <div class="col-sm-8">
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
                            <div class="col-sm-4">
                                <form action="">
                                    <input type="text" class="form-control" placeholder="Search...">
                                </form>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table class="table">
                                      <thead>
                                        <tr>
                                            <td>Date</td>
                                            <td>Time</td>
                                            <td> Doctor Name </td>
                                            <td> Case ID</td>
                                            <td>Communication</td>
                                            <td>Status</td>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                            <td>08-10-2020</td>
                                            <td>06:15 pm</td>
                                            <td>Dr John Smith</td>
                                            <td>52595</td>
                                            <td><a href="#">Live Chat</a></td>
                                            <td>Pending </td>
                                        </tr>
                                        <tr>
                                            <td>08-10-2020</td>
                                            <td>06:15 pm</td>
                                            <td>Dr John Smith</td>
                                            <td>52595</td>
                                            <td><a href="#">Live Video</a></td>
                                            <td>Pending </td>
                                        </tr>
                                        <tr>
                                            <td>08-10-2020</td>
                                            <td>06:15 pm</td>
                                            <td>Dr John Smith</td>
                                            <td>52595</td>
                                            <td>Prescription<br><a href="#">Max 3 Exchanges</a></td>
                                            <td>Pending </td>
                                        </tr>
                                        <tr>
                                            <td>08-10-2020</td>
                                            <td>06:15 pm</td>
                                            <td>Dr John Smith</td>
                                            <td>52595</td>
                                            <td>Prescription<br><a href="#">Live Chat</a><br> </td>
                                            <td>Pending </td>
                                        </tr>
                                        <tr>
                                            <td>08-10-2020</td>
                                            <td>06:15 pm</td>
                                            <td>Dr John Smith</td>
                                            <td>52595</td>
                                            <td>Prescription<br><a href="#">Live Video</a><br> </td>
                                            <td>Pending </td>
                                        </tr>
                                        <tr>
                                            <td>08-10-2020</td>
                                            <td>06:15 pm</td>
                                            <td>Dr John Smith</td>
                                            <td>52595</td>
                                            <td>Prescription<br><a href="#">Live Chat</a><br> </td>
                                            <td>Pending </td>
                                        </tr>
                                        <tr>
                                            <td>08-10-2020</td>
                                            <td>06:15 pm</td>
                                            <td>Dr John Smith</td>
                                            <td>52595</td>
                                            <td>Prescription<br> Typed Q & A <br><a href="#">Max 3 Exchanges</a><br> </td>
                                            <td>Pending </td>
                                        </tr>
                                        <tr>
                                            <td>08-10-2020</td>
                                            <td>06:15 pm</td>
                                            <td>Dr John Smith</td>
                                            <td>52595</td>
                                            <td>Prescription<br> Typed Q & A <br><a href="#">Max 3 Exchanges</a><br> </td>
                                            <td>Pending </td>
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