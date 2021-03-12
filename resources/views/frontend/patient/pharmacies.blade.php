@extends('frontend.patient.afterloginlayout.app')

@section('content')
    <div class="col Post-prescription-right innerpage  Post-prescription-page select pharmacy Pharmacy-locator">
        <div class="row">
            <div class="col-sm-12">
               
               <div class="col Post-prescription-right">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb Pharmacist-doc-com">
                            <li class="breadcrumb-item active">Select Pharmacy</li>
                        </ol>
                    </nav>
                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="nav nav-pills" id="myTab" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" data-toggle="tab" href="#Choose-Pharmacist">
                                    Choose Pharmacist
                                  </a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link"  data-toggle="tab" href="#Send-to-all-Pharmacist">Send to all Pharmacist</a>
                                </li>
                              </ul>
                              <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="Choose-Pharmacist">
                                    <ul>
                                        <li>Filter for location opening hours delivery options </li>
                                        <li>We advise you telephone or email the pharmacist before requesting a prescription to ensure the drug
                                            is in stock - especially urgent or uncommon drugs </li>
                                        <li>you will receive a message or call from the pharmacist or you can call them</li>
                                        <li>Payment is direct to pharmacist</li>
                                    </ul>
                                    <div class="row Short-Filter">
                                        <div class="col-sm-5">
                                          <label class="mr-sm-2">Short By :</label>
                                          <select class="custom-select">
                                              <option selected="">Ratings</option>
                                              <option value="1">One</option>
                                              <option value="2">Two</option>
                                              <option value="3">Three</option>
                                            </select>
                                            <select class="custom-select">
                                              <option selected="">Price</option>
                                              <option value="1">One</option>
                                              <option value="2">Two</option>
                                              <option value="3">Three</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                          <label class="mr-sm-2">Filter :</label>
                                          <select class="custom-select">
                                              <option selected=""></option>
                                            </select>
                                            
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="search..">
                                        </div>
                                    </div>
                                    <div class="card pharmacy-details">
                                        <div class="card-header">
                                          <img src="{{ asset('public/images/frontend/images/pharmacy-icon.png')}}" alt=""> H Pharmacy
                                        </div>
                                        <div class="card-body">
                                         <p><span>pharmacy Name : </span> h pharmacy, Sw chemists</p>
                                         <p><span>Location : </span> Eastern Europe ,earls court london, marble arch london, chelsea london</p>
                                         <p><span>address : </span> aberdeen, birmingham, cardiff</p>
                                         <p><span>contact : </span> 2699335563</p>
                                         <p><span>email : </span>  h@gmail.com</p>
                                         <p><span>opening hours uk : </span> 10:00 AM -12:00 pm</p>
                                         <p><span>delivery options : </span>  customer pick up</p>
                                         <p><span>local delivery : </span> Car/courier</p>
                                         <p><span>address : </span> max distance for delivery e.g. within london</p>
                                         <p><a href="" class="btn blue-button">Send Prescription</a></p>
                                        </div>
                                      </div>
                                      <div class="card pharmacy-details">
                                        <div class="card-header">
                                          <img src="{{ asset('public/images/frontend/images/pharmacy-icon.png')}}" alt=""> H Pharmacy
                                        </div>
                                        <div class="card-body">
                                         <p><span>pharmacy Name : </span> h pharmacy, Sw chemists</p>
                                         <p><span>Location : </span> Eastern Europe ,earls court london, marble arch london, chelsea london</p>
                                         <p><span>address : </span> aberdeen, birmingham, cardiff</p>
                                         <p><span>contact : </span> 2699335563</p>
                                         <p><span>email : </span>  h@gmail.com</p>
                                         <p><span>opening hours uk : </span> 10:00 AM -12:00 pm</p>
                                         <p><span>delivery options : </span>  customer pick up</p>
                                         <p><span>local delivery : </span> Car/courier</p>
                                         <p><span>address : </span> max distance for delivery e.g. within london</p>
                                         <p><a href="" class="btn blue-button">Send Prescription</a></p>
                                        </div>
                                      </div>
                                </div>
                                <div class="tab-pane fade" id="Send-to-all-Pharmacist">
                                   ...
                                </div>
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