@extends('frontend.patient.afterloginlayout.app')

@section('content')
    <div class="col Post-prescription-right innerpage  Post-prescription-page select pharmacy Pharmacy-locator">
        <div class="row">
            <div class="col-sm-12">
               
               

<div class="col Post-prescription-right">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb Pharmacist-doc-com">
                            <li class="breadcrumb-item active">Special Pharmacies</li>
                        </ol>
                    </nav>
                    <div class="row">
                        <div class="col-sm-12">
                              <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="Choose-Pharmacist">
                                        <p class="mb-3">Filter below for Location, Delivery Options, and Opening Hours</p>
                                    </ul>
                                    <div class="row Short-Filter">
                                        <div class="col-sm-5">
                                          <label class="mr-sm-2">Short By :</label>
                                          <select class="custom-select">
                                              <option selected="">Location </option>
                                              <option value="1">1</option>
                                              <option value="2">2</option>
                                              <option value="3">3</option>
                                            </select>
                                            <select class="custom-select">
                                              <option selected="">Delivery Option</option>
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
                                    
                                     
                                    @foreach($pharmacies as $pharmaci)
                                    
                                    <div class="card pharmacy-details">
                                        <div class="card-header">
                                          <img src="{{ asset('public/images/frontend/images/pharmacy-icon.png')}}" alt=""> H Pharmacy
                                        </div>
                                        <div class="card-body">
                                         <p><span>Pharmacy Name : </span> {{$pharmaci->profile->pharmacy_name}}</p>
                                         <p><span>Location : </span> {{$pharmaci->profile->location}}</p>
                                         <p><span>Address : </span> {{$pharmaci->profile->address}}</p>
                                         <p><span>Contact : </span> {{$pharmaci->profile->telephone1}}</p>
                                         <p><span>Email : </span>  {{$pharmaci->email}}</p>
                                         <p><span>Opening hours uk : </span></p>
                                         <table class="table table-bordered" style="max-width: 450px;">
                                            <thead>
                                                <tr><th>
                                                   Day
                                                </th>
                                                <th>
                                                   Time
                                                </th>
                                            </tr></thead>
                                            <tbody>
                                               <tr>
                                                   <th>
                                                       Sunday
                                                   </th>
                                                   <td>
                                                       {{ $pharmaci->openingTime->sunday_opening_time ? date('h:i a',strtotime($pharmaci->openingTime->sunday_opening_time)) : '' }} - {{ $pharmaci->openingTime->sunday_closing_time ? date('h:i a',strtotime($pharmaci->openingTime->sunday_closing_time)) : '' }}
                                                   </td>
                                               </tr>
                                               <tr>
                                                   <th>
                                                       Monday
                                                   </th>
                                                   <td>
                                                       {{ $pharmaci->openingTime->monday_opening_time ? date('h:i a',strtotime($pharmaci->openingTime->monday_opening_time)) : '' }} - {{ $pharmaci->openingTime->monday_closing_time ? date('h:i a',strtotime($pharmaci->openingTime->monday_closing_time)) : '' }}
                                                   </td>
                                               </tr>
                                               <tr>
                                                   <th>
                                                       Tuesday
                                                   </th>
                                                   <td>
                                                      {{ $pharmaci->openingTime->tuesday_opening_time ? date('h:i a',strtotime($pharmaci->openingTime->tuesday_opening_time)) : '' }} - {{ $pharmaci->openingTime->tuesday_closing_time ? date('h:i a',strtotime($pharmaci->openingTime->tuesday_closing_time)) : '' }}
                                                   </td>
                                               </tr>
                                               <tr>
                                                   <th>
                                                       Wednesday
                                                   </th>
                                                   <td>
                                                       {{ $pharmaci->openingTime->wednesday_opening_time ? date('h:i a',strtotime($pharmaci->openingTime->wednesday_opening_time)) : '' }} - {{ $pharmaci->openingTime->wednesday_closing_time ? date('h:i a',strtotime($pharmaci->openingTime->wednesday_closing_time)) : '' }}
                                                   </td>
                                               </tr>
                                               <tr>
                                                   <th>
                                                       Thursday
                                                   </th>
                                                   <td>
                                                       {{ $pharmaci->openingTime->thursday_opening_time ? date('h:i a',strtotime($pharmaci->openingTime->thursday_opening_time)) : '' }} - {{ $pharmaci->openingTime->thursday_closing_time ? date('h:i a',strtotime($pharmaci->openingTime->thursday_closing_time)) : '' }}
                                                   </td>
                                               </tr>
                                               <tr>
                                                   <th>
                                                       Friday
                                                   </th>
                                                   <td>
                                                       {{ $pharmaci->openingTime->friday_opening_time ? date('h:i a',strtotime($pharmaci->openingTime->friday_opening_time)) : '' }} - {{ $pharmaci->openingTime->friday_closing_time ? date('h:i a',strtotime($pharmaci->openingTime->friday_closing_time)) : '' }}
                                                   </td>
                                               </tr>
                                               <tr>
                                                   <th>
                                                       Saturday
                                                   </th>
                                                   <td>
                                                       {{ $pharmaci->openingTime->saturday_opening_time ? date('h:i a',strtotime($pharmaci->openingTime->saturday_opening_time)) : '' }} - {{ $pharmaci->openingTime->saturday_closing_time ? date('h:i a',strtotime($pharmaci->openingTime->saturday_closing_time)) : '' }}
                                                   </td>
                                               </tr>
                                            </tbody>
                                        </table>
                                         <p><span>Delivery options : </span>  {{(isset($pharmaci->deliveryOption->customer_pick_up) && $pharmaci->deliveryOption->customer_pick_up == 1) ? 'Customer pick up, ':''}} {{(isset($pharmaci->deliveryOption->local_delivery) && $pharmaci->deliveryOption->local_delivery == 1) ? 'Local Delivery (car/courier), ':''}} {{(isset($pharmaci->deliveryOption->posts_within_uk) && $pharmaci->deliveryOption->posts_within_uk == 1) ? 'Posts within UK, ':''}} {{(isset($pharmaci->deliveryOption->sends_international) && $pharmaci->deliveryOption->sends_international == 1) ? 'Sends International':''}} </p>
                                         <p><span>Notes : </span> {{$pharmaci->openingTime->notes}}</p>
                                         
                                        
                                        </div>
                                      </div>

                                        @endforeach
                                     
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