@extends('frontend.pharmacist.afterloginlayout.app')

@section('content')
    <div class="col Manage-Profile">
                    <h2 class="page-title">Manage Profile</h2>
                    <form class="for-w-100" method="post" enctype="multipart/form-data">

                        @csrf

                        <div class="for-profile-image">
                            <input type='file' name="profile_photo" id="imgInp" />
                            <img id="blah" src="{{ $user->profile->profile_photo }}" alt="your image" /><br>
                            <span>Update Profile Image</span>
                        </div>

                        <div class="Notifications-on-of">
                            <input type="checkbox" class="form-check-input" checked>
                            <img src="{{ asset('public/images/frontend/images/notification.png')}}" alt="" data-toggle="tooltip" data-placement="top" title="One line definition"> <span>Notifications </span> <div class="on-and-off"><span class="on"></span></div>
                        </div>

                        <div class="row main-form-fild">
                            <div class="col-md-6">
                                <div class="form-group required">
                                     <input type="text" name="forename" class="form-control effect-19 {{!empty($user->forename) ? 'has-content':''}}" value="{{$user->forename}}">
                                     <label >Forename</label>
                                    @error('forename')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                  </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group required">
                                     <input type="text" name="surname" class="form-control effect-19 {{!empty($user->surname) ? 'has-content':''}}" value="{{$user->surname}}">
                                     <label >Surname</label>
                                    @error('surname')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                  </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group required">
                                    <input type="text" name="location" class="form-control effect-19 {{!empty($user->profile->location) ? 'has-content':''}}" value="{{$user->profile->location}}">
                                    <label >Location</label>
                                     @error('location')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                  </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group required">
                                    <input type="text" name="pharmacy_numbar" class="form-control effect-19 {{!empty($user->registration_number) ? 'has-content':''}}" value="{{$user->registration_number}}" readonly>
                                    <label >Registered-Doctor Pharmacy No</label>
                                     @error('pharmacy_numbar')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                  </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group required">
                                    <input type="text" name="pharmacy_name" class="form-control effect-19 {{!empty($user->profile->pharmacy_name) ? 'has-content':''}}" value="{{$user->profile->pharmacy_name}}">
                                    <label >Pharmacy Name</label>
                                     @error('pharmacy_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                  </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group required">
                                    <input type="text" name="address" class="form-control effect-19 {{!empty($user->profile->address) ? 'has-content':''}}" value="{{$user->profile->address}}">
                                    <label >Address</label>
                                     @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                  </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group required">
                                    <input type="tel" name="telephone1" class="form-control effect-19 {{!empty($user->profile->telephone1) ? 'has-content':''}}"  value="{{$user->profile->telephone1}}">
                                    <label >Telephone Number 1</label>
                                    @error('telephone1')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                  </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="tel" name="telephone2" class="form-control effect-19 {{!empty($user->profile->telephone2) ? 'has-content':''}}"  value="{{$user->profile->telephone2}}">
                                    <label >Telephone Number 2</label>
                                  </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="tel" name="telephone3" class="form-control effect-19 {{!empty($user->profile->telephone3) ? 'has-content':''}}"  value="{{$user->profile->telephone3}}">
                                    <label >Telephone Number 3</label>
                                  </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control effect-19 {{!empty($user->email) ? 'has-content':''}}" value="{{$user->email}}" readonly>
                                    <label >Email</label>
                                  </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="url" name="website" class="form-control effect-19 {{!empty($user->profile->website) ? 'has-content':''}}" required  value="{{$user->profile->website}}">
                                    <label >Link to Website</label>
                                  </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control effect-19 {{!empty($user->profile->about) ? 'has-content':''}}" name="about" rows="3">{{$user->profile->about}}</textarea>
                                    <label >About <span>e.g. 24 hours, extended opening hours, can deliver anywhere in Glasgow, within M25 etc.</span></label>
                                  </div>
                            </div>



<a href="{{ route('pharmacist.opening-hours')}}" class="Set-Opening-Hours"><img src="{{ asset('public/images/frontend/images/icon3.png') }}" alt="">Set Opening Hours</a>
                            {{-- <div class="col-md-12">
                                     
                                <div class="form-group Opening-Hours">


                                    <label >Opening Hours</label>
                                    
                                    <div class="form-check form-check-inline {{(isset($user->openingTime->monday) && $user->openingTime->monday == 1) ? 'active':''}}" >
                                        <input class="form-check-input" type="checkbox" name="monday" {{(isset($user->openingTime->monday) && $user->openingTime->monday == 1) ? 'checked':''}}>
                                        <span>MON</span>
                                    </div>

                                    <div class="form-check form-check-inline {{(isset($user->openingTime->tuesday) &&  $user->openingTime->tuesday == 1) ? 'active':''}}">
                                        <input class="form-check-input" type="checkbox" name="tuesday" {{(isset($user->openingTime->tuesday) &&  $user->openingTime->tuesday == 1) ? 'checked':''}}>
                                        <span>TUE</span>
                                    </div>
                                    <div class="form-check form-check-inline {{(isset($user->openingTime->wednesday) &&  $user->openingTime->wednesday == 1) ? 'active':''}}">
                                        <input class="form-check-input" type="checkbox" name="wednesday" {{(isset($user->openingTime->wednesday) &&  $user->openingTime->wednesday == 1) ? 'checked':''}}>
                                        <span>WED</span>
                                    </div>
                                    <div class="form-check form-check-inline {{(isset($user->openingTime->thursday) &&  $user->openingTime->thursday == 1) ? 'active':''}}">
                                        <input class="form-check-input" type="checkbox" name="thursday" {{(isset($user->openingTime->thursday) &&  $user->openingTime->thursday == 1) ? 'checked':''}}>
                                        <span>THU</span>
                                    </div>
                                    <div class="form-check form-check-inline {{(isset($user->openingTime->friday) &&  $user->openingTime->friday == 1) ? 'active':''}}">
                                        <input class="form-check-input" type="checkbox" name="friday" {{(isset($user->openingTime->friday) &&  $user->openingTime->friday == 1) ? 'checked':''}}>
                                        <span>FRI</span>
                                    </div>
                                    <div class="form-check form-check-inline {{(isset($user->openingTime->saturday) &&  $user->openingTime->saturday == 1) ? 'active':''}}">
                                        <input class="form-check-input" type="checkbox" name="saturday" {{(isset($user->openingTime->saturday) &&  $user->openingTime->saturday == 1) ? 'checked':''}}>
                                        <span>SAT</span>
                                    </div>
                                    <div class="form-check form-check-inline {{(isset($user->openingTime->sunday) &&  $user->openingTime->sunday == 1) ? 'active':''}}">
                                        <input class="form-check-input" type="checkbox" name="sunday" {{(isset($user->openingTime->sunday) &&  $user->openingTime->sunday == 1) ? 'checked':''}}>
                                        <span>SUN</span>
                                    </div>
                                  </div>
                            </div>


                            <div class="col-md-12 tile-pick">
                                <div class="form-group">
                                     <label >From</label>
                                     <input id="From-date" name="opening_time" class="form-control" type="time" value="{{ $user->openingTime->monday_opening_time  ?? '09:00' }}"/>
                                  </div>

                                  <div class="form-group">
                                    <label >Till</label>
                                    <input id="Till-date" name="closing_time" class="form-control " type="time" value="{{ $user->openingTime->monday_closing_time  ?? '22:00' }}"/>
                                  </div>

                            </div> --}}

                            <div class="col-md-12 Customer-Pick-up">
                                <label >Delivery Options</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="customer_pick_up" id="Customer-Pick-up" value="1" {{(isset($user->deliveryOption->customer_pick_up) && $user->deliveryOption->customer_pick_up == 1) ? 'checked':''}}>
                                    <label class="form-check-label" for="Customer-Pick-up">
                                        Customer Pick up
                                    </label>
                                  </div>
                                  
                            </div>

                            <div class="col-md-4 Customer-Pick-up">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="local_delivery" id="Local-Delivery" value="1" {{(isset($user->deliveryOption->local_delivery) && $user->deliveryOption->local_delivery == 1) ? 'checked':''}}>
                                    <label class="form-check-label" for="Local-Delivery">
                                        Local Delivery (car/courier)
                                    </label>
                                  </div>
                                  
                            </div>

                            <div class="col-md-8">
                                <div class="form-group-deliver-details">
                                    <label class="">
                                        Details e.g. We deliver anywhere in London, We deliver up to 5 miles from Glasgow
                                    </label>
                                    <input class="form-control" name="notes" type="text" value="{{$user->deliveryOption->notes}}"/>
                                  </div> 
                            </div>
                            

                            <div class="col-md-12 Customer-Pick-up">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="posts_within_uk" id="Posts-within-UK" value="1" {{(isset($user->deliveryOption->posts_within_uk) && $user->deliveryOption->posts_within_uk == 1) ? 'checked':''}}>
                                    <label class="form-check-label" for="Posts-within-UK">
                                        Posts within UK
                                    </label>
                                  </div>
                            </div>
                            <div class="col-md-12 Customer-Pick-up">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="sends_international" id="Sends-International" value="1" {{(isset($user->deliveryOption->sends_international) && $user->deliveryOption->sends_international == 1) ? 'checked':''}}>
                                    <label class="form-check-label" for="Sends-International">
                                        Sends International
                                    </label>
                                  </div>
                            </div>


                             <div class="col-md-12 Mandator">
                                    <label>Change password to <a href="{{route('pharmacist.change-password')}}">Click here</a>  </label>
                                </div>
                            
                            <div class="col-md-12">
                                <button type="submit" class="btn blue-button mgp-btn">Save</button>
                            </div>
                            
                        </div>
                
                    </form>
                </div>
@endsection
@section('scripts')
    <script>


         $('#From-date').timepicker({
            format: 'HH:mm',
            'showDuration': true,
        });
        $('#Till-date').timepicker({
            format: 'HH:mm',
            'showDuration': true
        });
        


     function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#imgInp").change(function() {
  readURL(this);
});
$('.Manage-Profile .Notifications-on-of input[type="checkbox"]').click(function() {
  $('.Manage-Profile .Notifications-on-of .on-and-off span').toggleClass("on");
  $('.Manage-Profile .Notifications-on-of .on-and-off span').toggleClass("of");
});
$('.Manage-Profile .main-form-fild .form-group.Opening-Hours .form-check input').click(function() {
    $('.Manage-Profile .main-form-fild .form-group.Opening-Hours .form-check input').parent().removeClass("active");
  $(this).parent().addClass("active");
});

    </script>
@endsection