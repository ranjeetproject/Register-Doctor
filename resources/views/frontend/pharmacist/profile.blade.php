@extends('frontend.pharmacist.afterloginlayout.app')

@section('content')
    <div class="col Manage-Profile pht-profile">
                    <h2 class="page-title mb-2">Manage Profile</h2>
                    <form class="for-w-100" method="post" enctype="multipart/form-data" id="pharmacistProfile">

                        @csrf
                        <!-- <div class="for-profile-image">
                            <input type='file' name="profile_photo" id="imgInp" />
                            <img id="blah" src="{{ $user->profile->profile_photo }}" alt="your image" /><br>
                            <span>Update Profile Image</span>
                        </div> -->

                        <div class="main-form-fild">
                            <div class="bg-light-blue cmn-card-box margin-bottom-20 padding-20">
                                <div class="profile-header-bx mb-4">
                                    <div class="profile-image-bx">
                                        <div class="profile-image-upload">
                                        <img id="blah" src="{{ $user->profile->profile_photo }}" alt="your image" />
                                        </div>
                                        <div class="profile-image-upload-btn">
                                            <input type='file' name="profile_photo" id="imgInp" />
                                            <span><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                    </div>
                                    <div class="Notifications-on-of pp-mrgn-left-20">
                                        <input type="checkbox" class="form-check-input" checked>
                                        <img src="{{ asset('public/images/frontend/images/notification.png')}}" alt="" data-toggle="tooltip" data-placement="top" title="One line definition"> <span>Notifications </span> <div class="on-and-off on"><span></span></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group required has-float-label">
                                            <input type="text" name="forename" class="form-control {{!empty($user->forename) ? 'has-content':''}}" value="{{$user->forename}}" placeholder="Forename">
                                            <label >Forename</label>
                                            @error('forename')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group required has-float-label">
                                            <input type="text" name="surname" class="form-control {{!empty($user->surname) ? 'has-content':''}}" value="{{$user->surname}}" placeholder="Surname">
                                            <label >Surname</label>
                                            @error('surname')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group required has-float-label">
                                            <input type="text" name="location" class="form-control {{!empty($user->profile->location) ? 'has-content':''}}" value="{{$user->profile->location}}" placeholder="Location">
                                            <label >Location</label>
                                            @error('location')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group required has-float-label">
                                            <input type="text" name="pharmacy_numbar" class="form-control {{!empty($user->registration_number) ? 'has-content':''}}" value="{{$user->registration_number}}" placeholder="Registered-Doctor Pharmacy No" readonly>
                                            <label >Registered-Doctor Pharmacy No</label>
                                            @error('pharmacy_numbar')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group required has-float-label">
                                            <input type="text" name="pharmacy_name" class="form-control {{!empty($user->profile->pharmacy_name) ? 'has-content':''}}" value="{{$user->profile->pharmacy_name}}" placeholder="Pharmacy Name">
                                            <label >Pharmacy Name</label>
                                            @error('pharmacy_name')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-light-blue cmn-card-box margin-bottom-20 padding-20">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group required has-float-label">
                                            <input type="text" name="address" class="form-control {{!empty($user->profile->address) ? 'has-content':''}}" value="{{$user->profile->address}}" placeholder="Address">
                                            <label >Address</label>
                                            @error('address')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group required has-float-label">
                                            <input type="tel" name="telephone1" class="form-control {{!empty($user->profile->telephone1) ? 'has-content':''}}"  value="{{$user->profile->telephone1}}" placeholder="Telephone Number 1">
                                            <label >Telephone Number 1</label>
                                            @error('telephone1')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group has-float-label">
                                            <input type="tel" name="telephone2" class="form-control {{!empty($user->profile->telephone2) ? 'has-content':''}}"  value="{{$user->profile->telephone2}}" placeholder="Telephone Number 2">
                                            <label >Telephone Number 2</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group has-float-label">
                                            <input type="tel" name="telephone3" class="form-control {{!empty($user->profile->telephone3) ? 'has-content':''}}"  value="{{$user->profile->telephone3}}" placeholder="Telephone Number 3">
                                            <label >Telephone Number 3</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group has-float-label">
                                            <input type="email" name="email" class="form-control {{!empty($user->email) ? 'has-content':''}}" value="{{$user->email}}" placeholder="Email" readonly>
                                            <label >Email</label>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group has-float-label">
                                            <input type="url" name="website" class="form-control {{!empty($user->profile->website) ? 'has-content':''}}"  value="{{$user->profile->website}}" placeholder="Link to Website">
                                            <label >Link to Website</label>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group has-float-label">
                                            <textarea class="form-control {{!empty($user->profile->about) ? 'has-content':''}}" name="about" rows="3" placeholder="About">{{$user->profile->about}}</textarea>
                                            <label >About <span>e.g. 24 hours, extended opening hours, can deliver anywhere in Glasgow, within M25 etc.</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-light-blue cmn-card-box padding-20">
                                <a href="{{ route('pharmacist.opening-hours')}}" class="Set-Opening-Hours pp-oh-btn"><img src="{{ asset('public/images/frontend/images/icon3.png') }}" alt="">Set Opening Hours</a>
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="pht-title-do">Delivery Options</h5>
                                    </div>
                                    <div class="col-md-12 Customer-Pick-up">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="customer_pick_up" id="Customer-Pick-up" value="1" {{(isset($user->deliveryOption->customer_pick_up) && $user->deliveryOption->customer_pick_up == 1) ? 'checked':''}}>
                                                    <label class="form-check-label" for="Customer-Pick-up">
                                                        Customer Pick up
                                                    </label>
                                                </div>
                                            </div>
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
                                        <div class="form-group-deliver-details pdt-deliver-eg-bx">
                                            <label class="">
                                                Details e.g. We deliver anywhere in London, We deliver up to 5 miles from Glasgow
                                            </label>
                                            <input class="form-control" name="notes" type="text" value="{{$user->deliveryOption->notes}}"/>
                                        </div> 
                                    </div>

                                    <div class="col-md-12 Customer-Pick-up">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="posts_within_uk" id="Posts-within-UK" value="1" {{(isset($user->deliveryOption->posts_within_uk) && $user->deliveryOption->posts_within_uk == 1) ? 'checked':''}}>
                                                    <label class="form-check-label" for="Posts-within-UK">
                                                        Posts within UK
                                                    </label>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="col-md-12 Customer-Pick-up">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="sends_international" id="Sends-International" value="1" {{(isset($user->deliveryOption->sends_international) && $user->deliveryOption->sends_international == 1) ? 'checked':''}}>
                                                    <label class="form-check-label" for="Sends-International">
                                                        Sends International
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 Mandator form-group">
                                        <label>Change password to <a href="{{route('pharmacist.change-password')}}">Click here</a>  </label>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <button type="submit" class="btn blue-button mgp-btn">Save</button>
                            </div>
                            
                        </div>
                
                    </form>
                </div>
@endsection
@section('scripts')
    <script>


         
        


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
  $('.Manage-Profile .Notifications-on-of .on-and-off').toggleClass("on");
  $('.Manage-Profile .Notifications-on-of .on-and-off').toggleClass("of");
});
$('.Manage-Profile .main-form-fild .form-group.Opening-Hours .form-check input').click(function() {
    $('.Manage-Profile .main-form-fild .form-group.Opening-Hours .form-check input').parent().removeClass("active");
  $(this).parent().addClass("active");
});

$(function () {

        $('#pharmacistProfile').validate({
            
                    rules: {
                        forename: {
                            required: true
                        },
                        surname: {
                            required: true
                        },
                        location: {
                            required: true
                        },
                        pharmacy_numbar: {
                            required: true
                        },
                        pharmacy_name: {
                            required: true
                        },
                        address: {
                            required: true
                        },
                        telephone1: {
                            required: true
                        },
                    },
                    messages: {
                        forename: {
                            required: "This forename field is required.",
                        },
                        surname: {
                            required: "This surname field is required.",
                        },
                        location: {
                            required: "This location field is required.",
                        },
                        pharmacy_numbar: {
                            required: "This pharmacy numbar field is required.",
                        },
                        pharmacy_name: {
                            required: "This pharmacy name field is required.",
                        },
                        address: {
                            required: "This address field is required.",
                        },
                        telephone1: {
                            required: "This telephone number 1 field is required.",
                        },
                    },
                    errorElement: "span",
                    errorClass: "form-text text-danger"
                });


                $('#pharmacistProfile').submit(function(){
                    $('button[type=submit]').attr("disabled", true);
                    setTimeout(function()
                    {
                        $('button[type=submit]').attr("disabled", false);
                    }, 3000);
                });
    })

    $('#From-date').timepicker({
            format: 'HH:mm',
            'showDuration': true,
        });
        $('#Till-date').timepicker({
            format: 'HH:mm',
            'showDuration': true
        });

    </script>
@endsection