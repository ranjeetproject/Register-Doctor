@extends('frontend.patient.afterloginlayout.app')

@section('content')
    <div class="col Post-prescription-right Patient-Profile-page">
        <div class="row">
            <div class="col-sm-12">
                <ul class="nav nav-pills" id="myTab" role="tablist">
                    <li class="nav-item">
                    <a class="nav-link active btn " data-toggle="tab" href="#Patient-Profile">
                        Patient Profile
                    </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link btn" href="{{ route('patient.payment-detail') }}">Payment Details</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link btn" id="chng_time_zone">Change Timezone</a>

                    </li>
                    <li class="nav-item">
                        <a href="{{route('patient.medical-record')}}" class="nav-link btn">Medical Record</a>
                        {{-- <a href="{{route('patient.medical-record')}}" class="btn smr-btn mr"></a> --}}

                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active input-effect" id="Patient-Profile">
                        <form class="for-w-100" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="for-profile-image mb-3">
                                <input type="file" name="profile_photo" id="imgInp">

                                <img id="blah" src="{{ $user->profile->profile_photo }}" alt="your image">

                                <br>

                                <span>Update Profile Image</span>

                            </div>
                            <div class="row main-form-fild">
                                {{-- <div class="col-sm-12">
                                    <div class="form-group required">
                                        <input type="text" name="upn" class="form-control effect-19 " >
                                        <label>Unique Patient Number (UPN)</label>
                                    @error('upn')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    </div>
                                </div> --}}
                                <div class="col-sm-6">
                                    <div class="form-group required">
                                        <input type="text" name="forename" class="form-control effect-19 {{!empty($user->forename) ? 'has-content':''}}" value="{{$user->forename}}">
                                        <label>Forename</label>
                                    @error('forename')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group required">
                                        <input type="text" name="surname" class="form-control effect-19 {{!empty($user->surname) ? 'has-content':''}}"  value="{{$user->surname}}">
                                        <label>Surname</label>
                                    @error('surname')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group required">
                                        <select name="gender" class="form-control effect-19 {{!empty($user->profile->gender) ? 'has-content':''}}" >
                                            <option value="">Select</option>
                                            <option value="male" {{($user->profile->gender == 'male') ? 'Selected':''}}>Male</option>
                                            <option value="female" {{($user->profile->gender == 'female') ? 'Selected':''}} >Female</option>
                                            <option value="other" {{($user->profile->gender == 'other') ? 'Selected':''}} >Others</option>
                                        </select>
                                    @error('gender')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group required">
                                        <input type="date" class="form-control effect-19 {{!empty($user->profile->dob) ? 'has-content':''}}" name="dob" value="{{ date("Y-m-d", strtotime($user->profile->dob)) }}">
                                        <label>Date of Birth</label>
                                    @error('dob')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group required">
                                        <input type="text" class="form-control effect-19 {{!empty($user->profile->address) ? 'has-content':''}}" name="address" value="{{$user->profile->address}}">
                                        <label>Address</label>
                                    @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group required">
                                        <input type="email" name="email" class="form-control effect-19 {{!empty($user->email) ? 'has-content':''}}"  value="{{$user->email}}" readonly>
                                    <label>Email</label>
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-1">
                                    <label>Address for delivery of drugs if different to above</label>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="form-group required">
                                        <input type="tel" name="telephone1" class="form-control effect-19 {{!empty($user->profile->telephone1) ? 'has-content':''}}" value="{{$user->profile->telephone1}}">
                                        <label>Telephone 1</label>
                                        @error('telephone1')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="tel" name="telephone2" class="form-control effect-19 {{!empty($user->profile->telephone2) ? 'has-content':''}}" value="{{$user->profile->telephone2}}">
                                        <label>Telephone 2</label>
                                        @error('telephone2')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label><strong>GP or Family Doctor</strong> GP address mandatory if you want a prescription via this website and have a UK GP</label>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="gp_name" class="form-control effect-19 {{!empty($user->profile->gp_name) ? 'has-content':''}}" value="{{$user->profile->gp_name}}">
                                        <label>Name</label>
                                        @error('gp_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="gp_address" class="form-control effect-19 {{!empty($user->profile->gp_address) ? 'has-content':''}}" value="{{$user->profile->gp_address}}">
                                        <label>Address</label>
                                        @error('gp_address')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="tel" name="gp_telephone" value="{{$user->profile->gp_telephone}}" class="form-control effect-19 {{!empty($user->profile->gp_telephone) ? 'has-content':''}}">
                                        <label>Telephone</label>
                                        @error('gp_telephone')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="gp_email" value="{{$user->profile->gp_email}}" class="form-control effect-19 {{!empty($user->profile->gp_email) ? 'has-content':''}}" >
                                        <label>Email</label>
                                        @error('gp_email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-1">
                                    <label>Next of Kin (recommended)</label>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="n_of_kin_name" value="{{$user->profile->n_of_kin_name}}" class="form-control effect-19 {{!empty($user->profile->n_of_kin_name) ? 'has-content':''}}" >
                                        <label>Name</label>
                                        @error('n_of_kin_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text"  name="n_of_kin_address" value="{{$user->profile->n_of_kin_address}}"  class="form-control effect-19 {{!empty($user->profile->n_of_kin_address) ? 'has-content':''}}" >
                                        <label>Address</label>
                                        @error('n_of_kin_address')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="n_of_kin_relationship" value="{{$user->profile->n_of_kin_relationship}}" class="form-control effect-19 {{!empty($user->profile->n_of_kin_relationship) ? 'has-content':''}}" value="{{$user->profile->n_of_kin_relationship}}">
                                        <label>Relationship</label>
                                        @error('n_of_kin_relationship')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="n_of_kin_phone" value="{{$user->profile->n_of_kin_phone}}"  class="form-control effect-19" placeholder="Phone No.">
                                        @error('n_of_kin_phone')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12 Mandator">
                                    <label>  <span><sup>*</sup>Mandatory</span> </label>
                                </div>
                                <div class="col-sm-12 Submit-Medical-Record">
                                    <button type="submit" class="btn blue-button smr-btn">Submit</button>
                                    {{-- <button type="submit" class="btn smr-btn mr">Medical Record</button> --}}
                                    {{-- <a href="{{route('patient.medical-record')}}" class="btn smr-btn mr">Medical Record</a> --}}
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade " id="Payment-Details">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Prescriptions Issued Modal start -->
    <div class="modal fade" id="Pharmacy-popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <p>Your Doctor has been messaged to post the Prescription to you.</p>
                    <p>For queries you may message the Doctor using the 'Prescriptions Issued' option
                        [Lefthand Navigation Menu]</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Prescriptions Issued Modal end -->
@endsection
@section('scripts')

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

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

         $(window).on('load', function(){
    // $(".tab-content #Patient-Profile input, .tab-content #Patient-Profile textarea").val("");

    $(".input-effect input, .input-effect textarea").focusout(function(){
    if($(this).val() != ""){
    $(this).addClass("has-content");
    }else{
    $(this).removeClass("has-content");
    }
    })
  });
    $( document ).ready(function() {
        $('#chng_time_zone').click(function(){

            $('#exampleModal').modal('show');
        });

    });
    </script>
@endsection
