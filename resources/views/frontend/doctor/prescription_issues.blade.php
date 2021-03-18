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
                                              <td>Issued</td>
                                              <td>Patient’s<br> Name  </td>
                                              <td>Case No.</td>
                                              <td> View <br>Case</td>
                                              <td>View Medical <br>Record</td>
                                              <td> Prescription No.</td>
                                              <td style="min-width: 250px;"> Action</td>
                                              <td >Delete</td>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        <tr >
                                            <td>08-10-2020</td>
                                            <td>06:15 PM </td>
                                            <td>John Doe</td>
                                            <td>C0024852</td>
                                            
                                            <td><a href="#"><i class="fal fa-eye"></i></a></td>
                                            <td><a href="#"><i class="fal fa-eye"></i></a></td> 
                                            <td>984092</td>
                                            <td class="masg-dep-tol">
                                                <button class="btn Decline p-btn"><img src="{{ asset('public/images/frontend/images/P-icon.png')}}" alt=""><span>Open<br>Prescription</span></button> 
                                                <button class="btn Decline p-btn"><img src="{{ asset('public/images/frontend/images/P-icon.png')}}" alt=""><span>Print<br>Prescription</span></button><br>
                                                <a href="#"  target="_blank" class="btn blue-button btn-block Print-GP-Note">Print GP Note</a>
                                             </td>
                                             <td>
                                               <a href="#" style="background: #f2f2f2; color: #f00" target="_blank" class="btn  btn-block Print-GP-Note"><i class="fa fa-trash" aria-hidden="true"></i>
                                               </a>
                                             </td>
                                        </tr>
                                        <tr >
                                            <td>08-10-2020</td>
                                            <td>06:15 PM </td>
                                            <td>John Doe</td>
                                            <td>C0024852</td>
                                            
                                            <td><a href="#"><i class="fal fa-eye"></i></a></td>
                                            <td><a href="#"><i class="fal fa-eye"></i></a></td> 
                                            <td>984092</td>
                                            <td class="masg-dep-tol">
                                                <button class="btn Decline p-btn"><img src="{{ asset('public/images/frontend/images/P-icon.png')}}" alt=""><span>Open<br>Prescription</span></button> 
                                                <button class="btn Decline p-btn"><img src="{{ asset('public/images/frontend/images/P-icon.png')}}" alt=""><span>Print<br>Prescription</span></button><br>
                                                <a href="#"  target="_blank" class="btn blue-button btn-block Print-GP-Note">Print GP Note</a>
                                             </td>
                                             <td>
                                               <a href="#" style="background: #f2f2f2; color: #f00" target="_blank" class="btn  btn-block Print-GP-Note"><i class="fa fa-trash" aria-hidden="true"></i>
                                               </a>
                                             </td>
                                        </tr>
                                        <tr >
                                            <td>08-10-2020</td>
                                            <td>06:15 PM </td>
                                            <td>John Doe</td>
                                            <td>C0024852</td>
                                            
                                            <td><a href="#"><i class="fal fa-eye"></i></a></td>
                                            <td><a href="#"><i class="fal fa-eye"></i></a></td> 
                                            <td>984092</td>
                                            <td class="masg-dep-tol">
                                                <button class="btn Decline p-btn"><img src="{{ asset('public/images/frontend/images/P-icon.png')}}" alt=""><span>Open<br>Prescription</span></button> 
                                                <button class="btn Decline p-btn"><img src="{{ asset('public/images/frontend/images/P-icon.png')}}" alt=""><span>Print<br>Prescription</span></button><br>
                                                <a href="#"  target="_blank" class="btn blue-button btn-block Print-GP-Note">Print GP Note</a>
                                             </td>
                                             <td>
                                               <a href="#" style="background: #f2f2f2; color: #f00" target="_blank" class="btn  btn-block Print-GP-Note"><i class="fa fa-trash" aria-hidden="true"></i>
                                               </a>
                                             </td>
                                        </tr>
                                        <tr >
                                            <td>08-10-2020</td>
                                            <td>06:15 PM </td>
                                            <td>John Doe</td>
                                            <td>C0024852</td>
                                            
                                            <td><a href="#"><i class="fal fa-eye"></i></a></td>
                                            <td><a href="#"><i class="fal fa-eye"></i></a></td> 
                                            <td>984092</td>
                                            <td class="masg-dep-tol">
                                                <button class="btn Decline p-btn"><img src="{{ asset('public/images/frontend/images/P-icon.png')}}" alt=""><span>Open<br>Prescription</span></button> 
                                                <button class="btn Decline p-btn"><img src="{{ asset('public/images/frontend/images/P-icon.png')}}" alt=""><span>Print<br>Prescription</span></button><br>
                                                <a href="#"  target="_blank" class="btn blue-button btn-block Print-GP-Note">Print GP Note</a>
                                             </td>
                                             <td>
                                               <a href="#" style="background: #f2f2f2; color: #f00" target="_blank" class="btn  btn-block Print-GP-Note"><i class="fa fa-trash" aria-hidden="true"></i>
                                               </a>
                                             </td>
                                        </tr>
                                        <tr >
                                            <td>08-10-2020</td>
                                            <td>06:15 PM </td>
                                            <td>John Doe</td>
                                            <td>C0024852</td>
                                            
                                            <td><a href="#"><i class="fal fa-eye"></i></a></td>
                                            <td><a href="#"><i class="fal fa-eye"></i></a></td> 
                                            <td>984092</td>
                                            <td class="masg-dep-tol">
                                                <button class="btn Decline p-btn"><img src="{{ asset('public/images/frontend/images/P-icon.png')}}" alt=""><span>Open<br>Prescription</span></button> 
                                                <button class="btn Decline p-btn"><img src="{{ asset('public/images/frontend/images/P-icon.png')}}" alt=""><span>Print<br>Prescription</span></button><br>
                                                <a href="#"  target="_blank" class="btn blue-button btn-block Print-GP-Note">Print GP Note</a>
                                             </td>
                                             <td>
                                               <a href="#" style="background: #f2f2f2; color: #f00" target="_blank" class="btn  btn-block Print-GP-Note"><i class="fa fa-trash" aria-hidden="true"></i>
                                               </a>
                                             </td>
                                        </tr>
                                        <tr >
                                            <td>08-10-2020</td>
                                            <td>06:15 PM </td>
                                            <td>John Doe</td>
                                            <td>C0024852</td>
                                            
                                            <td><a href="#"><i class="fal fa-eye"></i></a></td>
                                            <td><a href="#"><i class="fal fa-eye"></i></a></td> 
                                            <td>984092</td>
                                            <td class="masg-dep-tol">
                                                <button class="btn Decline p-btn"><img src="{{ asset('public/images/frontend/images/P-icon.png')}}" alt=""><span>Open<br>Prescription</span></button> 
                                                <button class="btn Decline p-btn"><img src="{{ asset('public/images/frontend/images/P-icon.png')}}" alt=""><span>Print<br>Prescription</span></button><br>
                                                <a href="#"  target="_blank" class="btn blue-button btn-block Print-GP-Note">Print GP Note</a>
                                             </td>
                                             <td>
                                               <a href="#" style="background: #f2f2f2; color: #f00" target="_blank" class="btn  btn-block Print-GP-Note"><i class="fa fa-trash" aria-hidden="true"></i>
                                               </a>
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