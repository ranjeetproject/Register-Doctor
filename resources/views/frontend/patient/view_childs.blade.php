@extends('frontend.patient.afterloginlayout.app')

@section('content')
    <div class="col Post-prescription-right Patient-Profile-page">
        <div class="row">
            <div class="col-sm-12">
               
                <div class="Patient-Registration-child-account-title col-sm-12">
                            {{-- <h1>Patient Registration</h1> --}}
                        </div>
                        <div class="col-sm-12 input-effect">
                            <form class="for-w-100" method="post" action="{{route('patient.add-child')}}">
                            	@csrf
                            	
                                 <div class="row Manage-Account-title">
                                            <div class="col-sm-12">
                                                <h2>Manage Account <img src="images/ex-icon.png" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line definition"></h2>
                                            </div>
                                        </div>
                                        <div class="row main-form-fild">
                                            <div class="col-sm-12">
                                                {{-- <div class="form-group required">
                                                    <input type="text" class="form-control effect-19" name="" required>
                                                    <label>Unique Patient Number (UPN)</label>
                                                  </div> --}}
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group required">
                                                    <input type="text" class="form-control effect-19" name="forename" value="{{old('forename')}}">
                                                    <label>Forename</label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group required">
                                                    <input type="text" class="form-control effect-19" name="surname" value="{{old('surname')}}">
                                                    <label>Surname</label>
                                                  </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group required">
                                                    <input type="email" class="form-control effect-19" name="email" value="{{old('email')}}">
                                                    <label>Email</label>
                                                  </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group required">
                                                   <select name="sex" class="form-control effect-19" >
                                            <option value="">Sex</option>
                                            <option value="male" {{(old('gender') == 'male') ? 'Selected':''}}>Male</option>
                                            <option value="female" {{( old('gender')== 'female') ? 'Selected':''}} >Female</option>
                                            <option value="other" {{( old('gender')== 'other') ? 'Selected':''}} >Others</option>
                                        </select>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group required">
                                                    <input onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control effect-19" name="dob" value="{{old('dob')}}">
                                                    <label>Date of Birth</label>
                                                  </div>
                                            </div>
                                            <!-- <div class="col-sm-12">
                                                <div class="form-group required  for-address">
                                                    <textarea styel="padding-top: 14px;" type="text" rows="4"class="form-control effect-19" name="" required></textarea>
                                                    <label>Address</label>
                                                     
                                                  </div>
                                            </div> -->
                                            <div class="col-sm-6">
                                                <div class="form-group required">
                                                    <input type="text" class="form-control effect-19" name="house_no_or_name" value="{{old('house_no_or_name')}}">
                                                    <label>House No/Name </label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group required">
                                                    <input type="text" class="form-control effect-19" name="street" value="{{old('street')}}">
                                                    <label>Street </label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control effect-19" name="area" value="{{old('area')}}">
                                                    <label>Area </label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group required">
                                                    <input type="text" class="form-control effect-19" name="city" value="{{old('city')}}">
                                                    <label>Town/City</label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control effect-19" name="state" value="{{old('state')}}">
                                                    <label>State/County </label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group required">
                                                    <input type="num" class="form-control effect-19" name="pincode" value="{{old('pincode')}}">
                                                    <label>Postcode </label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group required">
                                                    <input type="num" class="form-control effect-19" name="country" value="{{old('country')}}">
                                                    <label>Country </label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <label>Address for delivery of drugs if different to above</label>
                                            </div>
                                            <div class="col-sm-6 ">
                                                <div class="form-group required account-holder">
                                                    <input type="text" class="form-control effect-19" name="first_account_holder" value="{{old('first_account_holder',$user->name)}}">
                                                    <label>First account holder</label>
                                                    <img src="images/ex-icon.png" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line definition">
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group required">
                                                    <input type="text" class="form-control effect-19" name="relationship_fch" value="{{old('relationship_fch')}}">
                                                    <label>Relationship to child</label>
                                                  </div>
                                            </div>
                                            <!-- <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control effect-19" name="" required>
                                                    <label>Address</label>
                                                  </div>
                                            </div> -->
                                            <div class="col-sm-6">
                                                <div class="form-group required">
                                                    <input type="text" class="form-control effect-19" name="house_no_or_name_fch" value="">
                                                    <label>House No/Name </label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group required">
                                                    <input type="text" class="form-control effect-19" name="street_fch" value="">
                                                    <label>Street </label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control effect-19" name="area_fch" value="">
                                                    <label>Area</label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group required">
                                                    <input type="text" class="form-control effect-19" name="city_fch" value="">
                                                    <label>Town/City</label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control effect-19" name="state_fch" value="">
                                                    <label>State/County </label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group required">
                                                    <input type="num" class="form-control effect-19" name="pincode_fch" value="">
                                                    <label>Postcode </label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group required">
                                                    <input type="num" class="form-control effect-19" name="country_fch" value="">
                                                    <label>Country </label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group required">
                                                    <input type="email" class="form-control effect-19" name="email_fch" value="{{old('email_fch',$user->email)}}">
                                                    <label>Email</label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6 ">
                                                <div class="form-group required">
                                                    <input type="tel" class="form-control effect-19" name="telephone1_fch" value="{{old('telephone1_fch',$user->telephone1)}}">
                                                    <label>Telephone 1</label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="tel" class="form-control effect-19" name="telephone2_fch" value="{{old('telephone2_fch',$user->telephone2)}}">
                                                    <label>Telephone 2</label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6 ">
                                                <div class="form-group  account-holder">
                                                    <input type="text" class="form-control effect-19" name="second_account_holder" value="{{old('second_account_holder')}}">
                                                    <label>Second account holder (if applicable)</label>
                                                  <img src="images/ex-icon.png" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line definition">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group ">
                                                    <input type="tel" class="form-control effect-19" name="relationship_sch" value="{{old('relationship_sch')}}">
                                                    <label>Relationship to child</label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control effect-19" name="address_sch" value="{{old('address_sch',$user->address_sch)}}">
                                                    <label>Address</label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group ">
                                                    <input type="email" class="form-control effect-19" name="email_sch" value="{{old('email_sch',$user->email_sch)}}">
                                                    <label>Email</label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6 ">
                                                <div class="form-group ">
                                                    <input type="tel" class="form-control effect-19" name="telephone1_sch" value="{{old('telephone1_sch')}}">
                                                    <label>Telephone 1</label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="tel" class="form-control effect-19" name="telephone2_sch" value="{{old('telephone2_sch')}}">
                                                    <label>Telephone 2</label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <label><strong>GP or Family Doctor</strong><img src="images/ex-icon.png" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line definition"> GP address mandatory if you want a prescription via this website and have a UK GP</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control effect-19" name="">
                                                    <label>Name</label>
                                                  </div>
                                            </div>
                                            <!-- <div class="col-sm-6">
                                                <div class="form-group">
                                                    
                                                    <input type="text" class="form-control effect-19" name="">
                                                    <label>Address</label>
                                                  </div>
                                            </div> -->
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control effect-19" name="house_no_or_name_sch" value="">
                                                    <label>House No/Name </label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group required">
                                                    <input type="text" class="form-control effect-19" name="street_sch" value="">
                                                    <label>Street </label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control effect-19" name="area_sch" value="">
                                                    <label>Area </label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group required">
                                                    <input type="text" class="form-control effect-19" name="city_sch" value="">
                                                    <label>Town/City</label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control effect-19" name="state_sch" value="">
                                                    <label>State/County </label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group required">
                                                    <input type="num" class="form-control effect-19" name="" value="">
                                                    <label>Postcode </label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group required">
                                                    <input type="num" class="form-control effect-19" name="" value="">
                                                    <label>Country </label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    
                                                    <input type="email" class="form-control effect-19" name="">
                                                    <label>Email</label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    
                                                    <input type="text" class="form-control effect-19" name="">
                                                    <label>Phone No.</label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-12 Mandator">
                                                {{-- To change password to <a href="#">Click here</a>  --}} <label><span><sup>*</sup>Mandatory</span> </label>
                                            </div>
                                            <div class="col-sm-12 Submit-Medical-Record">
                                                <button type="submit" class="btn blue-button smr-btn">Submit</button>
                                            </div>
                                        </div>
                            </form>
                        </div>
            </div>
        </div>
    </div>
   
@endsection
@section('scripts')
    <script>
       
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

        

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



    </script>
@endsection