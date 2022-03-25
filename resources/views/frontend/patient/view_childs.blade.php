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
                                                    <input type="text" class="form-control" name="" required>
                                                    <label>Unique Patient Number (UPN)</label>
                                                  </div> --}}
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group has-float-label">
                                                    <input type="text" id="Forename" class="form-control" placeholder="Forename" name="forename" value="{{old('forename')}}">
                                                    <label for="Forename">Forename <span class="fc-star">*</span></label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group has-float-label">
                                                    <input type="text" class="form-control" id="Surname" placeholder="Surname" name="surname" value="{{old('surname')}}">
                                                    <label for="Surname">Surname <span class="fc-star">*</span></label>
                                                  </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group has-float-label">
                                                    <input type="email" class="form-control" id="Email1" placeholder="Email" name="email" value="{{old('email')}}">
                                                    <label for="Email1">Email <span class="fc-star">*</span></label>
                                                  </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group has-float-label">
                                                   <select name="sex" class="form-control" >
                                                        <option value="">Sex</option>
                                                        <option value="male" {{(old('gender') == 'male') ? 'Selected':''}}>Male</option>
                                                        <option value="female" {{( old('gender')== 'female') ? 'Selected':''}} >Female</option>
                                                        <option value="other" {{( old('gender')== 'other') ? 'Selected':''}} >Others</option>
                                                    </select>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group has-float-label">
                                                    <input onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" id="DateofBirth" placeholder="Date of Birth" name="dob" value="{{old('dob')}}">
                                                    <label for="DateofBirth">Date of Birth <span class="fc-star">*</span></label>
                                                  </div>
                                            </div>
                                            <!-- <div class="col-sm-12">
                                                <div class="form-group required  for-address">
                                                    <textarea styel="padding-top: 14px;" type="text" rows="4"class="form-control" name="" required></textarea>
                                                    <label>Address</label>
                                                     
                                                  </div>
                                            </div> -->
                                            <div class="col-sm-6">
                                                <div class="form-group has-float-label">
                                                    <input type="text" class="form-control" id="HouseNoName" placeholder="House No/Name" name="house_no_or_name" value="{{old('house_no_or_name')}}">
                                                    <label for="HouseNoName">House No/Name <span class="fc-star">*</span></label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group has-float-label">
                                                    <input type="text" class="form-control" id="Street1" placeholder="Street" name="street" value="{{old('street')}}">
                                                    <label for="Street1">Street <span class="fc-star">*</span></label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group has-float-label">
                                                    <input type="text" class="form-control" placeholder="Area" id="Area1" name="area" value="{{old('area')}}">
                                                    <label for="Area1">Area </label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group has-float-label">
                                                    <input type="text" class="form-control" placeholder="Town/City" id="TownCity1" name="city" value="{{old('city')}}">
                                                    <label for="TownCity1">Town/City <span class="fc-star">*</span></label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group has-float-label">
                                                    <input type="text" class="form-control" id="StateCounty1" placeholder="State/County" name="state" value="{{old('state')}}">
                                                    <label for="StateCounty1">State/County <span class="fc-star">*</span></label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group has-float-label">
                                                    <input type="num" class="form-control" id="Postcode1" placeholder="Postcode" name="pincode" value="{{old('pincode')}}">
                                                    <label for="Postcode1">Postcode <span class="fc-star">*</span></label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group has-float-label">
                                                    <input type="num" class="form-control" id="Country2" placeholder="Country" name="country" value="{{old('country')}}">
                                                    <label for="Country2">Country <span class="fc-star">*</span></label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <label>Address for delivery of drugs if different to above</label>
                                            </div>
                                            <div class="col-sm-6 ">
                                                <div class="form-group has-float-label account-holder">
                                                    <input type="text" class="form-control" id="FirstAccountHolder" placeholder="First account holder" name="first_account_holder" value="{{old('first_account_holder',$user->name)}}">
                                                    <label for="FirstAccountHolder">First account holder <span class="fc-star">*</span></label>
                                                    <img src="images/ex-icon.png" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line definition">
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group has-float-label">
                                                    <input type="text" class="form-control" id="Relationshiptochild1" placeholder="Relationship to child" name="relationship_fch" value="{{old('relationship_fch')}}">
                                                    <label for="Relationshiptochild1">Relationship to child <span class="fc-star">*</span></label>
                                                  </div>
                                            </div>
                                            <!-- <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="" required>
                                                    <label>Address</label>
                                                  </div>
                                            </div> -->
                                            <div class="col-sm-6">
                                                <div class="form-group has-float-label">
                                                    <input type="text" class="form-control" id="HouseNoName2" placeholder="House No/Name" name="house_no_or_name_fch" value="">
                                                    <label for="HouseNoName2">House No/Name <span class="fc-star">*</span></label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group has-float-label">
                                                    <input type="text" class="form-control" id="Street2" placeholder="Street" name="street_fch" value="">
                                                    <label for="Street2">Street <span class="fc-star">*</span></label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group has-float-label">
                                                    <input type="text" class="form-control" id="Area2" placeholder="Area" name="area_fch" value="">
                                                    <label for="Area2">Area</label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group has-float-label">
                                                    <input type="text" class="form-control" id="TownCity2" placeholder="Town/City" name="city_fch" value="">
                                                    <label for="TownCity2">Town/City <span class="fc-star">*</span></label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group has-float-label">
                                                    <input type="text" class="form-control" id="StateCounty2" placeholder="State/County" name="state_fch" value="">
                                                    <label for="StateCounty2">State/County </label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group has-float-label">
                                                    <input type="num" class="form-control" id="Postcode3" placeholder="Postcode" name="pincode_fch" value="">
                                                    <label for="Postcode3">Postcode <span class="fc-star">*</span></label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group has-float-label">
                                                    <input type="num" class="form-control" id="Country3" placeholder="Country" name="country_fch" value="">
                                                    <label for="Country3">Country <span class="fc-star">*</span></label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group has-float-label">
                                                    <input type="email" class="form-control" id="Email3" placeholder="Email" name="email_fch" value="{{old('email_fch',$user->email)}}">
                                                    <label for="Email3">Email <span class="fc-star">*</span></label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6 ">
                                                <div class="form-group has-float-label">
                                                    <input type="tel" class="form-control" id="Telephone10" placeholder="Telephone 1" name="telephone1_fch" value="{{old('telephone1_fch',$user->telephone1)}}">
                                                    <label for="Telephone10">Telephone 1 <span class="fc-star">*</span></label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group has-float-label">
                                                    <input type="tel" class="form-control" id="Telephone20" placeholder="Telephone 2" name="telephone2_fch" value="{{old('telephone2_fch',$user->telephone2)}}">
                                                    <label for="Telephone20">Telephone 2</label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6 ">
                                                <div class="form-group has-float-label account-holder">
                                                    <input type="text" class="form-control" id="Secondaccountholder2" placeholder="Second account holder (if applicable)" name="second_account_holder" value="{{old('second_account_holder')}}">
                                                    <label for="Secondaccountholder2">Second account holder (if applicable)</label>
                                                  <img src="images/ex-icon.png" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line definition">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group has-float-label">
                                                    <input type="tel" class="form-control" id="Relationshiptochild3" placeholder="Relationship to child" name="relationship_sch" value="{{old('relationship_sch')}}">
                                                    <label for="Relationshiptochild3">Relationship to child</label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group has-float-label">
                                                    <input type="text" class="form-control" id="Address4" placeholder="Address" name="address_sch" value="{{old('address_sch',$user->address_sch)}}">
                                                    <label for="Address4">Address</label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group has-float-label">
                                                    <input type="email" class="form-control" id="Email4" placeholder="Email" name="email_sch" value="{{old('email_sch',$user->email_sch)}}">
                                                    <label for="Email4">Email</label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6 ">
                                                <div class="form-group has-float-label">
                                                    <input type="tel" class="form-control" id="Telephone11" placeholder="Telephone 1" name="telephone1_sch" value="{{old('telephone1_sch')}}">
                                                    <label for="Telephone11">Telephone 1</label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group has-float-label">
                                                    <input type="tel" class="form-control" id="Telephone22" placeholder="Telephone 2" name="telephone2_sch" value="{{old('telephone2_sch')}}">
                                                    <label for="Telephone22">Telephone 2</label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <label><strong>GP or Family Doctor</strong><img src="images/ex-icon.png" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line definition"> GP address mandatory if you want a prescription via this website and have a UK GP</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group has-float-label">
                                                    <input type="text" class="form-control" id="Name2" placeholder="Name" name="">
                                                    <label for="Name2">Name</label>
                                                  </div>
                                            </div>
                                            <!-- <div class="col-sm-6">
                                                <div class="form-group">
                                                    
                                                    <input type="text" class="form-control" name="">
                                                    <label>Address</label>
                                                  </div>
                                            </div> -->
                                            <div class="col-sm-6">
                                                <div class="form-group has-float-label">
                                                    <input type="text" class="form-control" id="HouseNoName4" placeholder="House No/Name" name="house_no_or_name_sch" value="">
                                                    <label for="HouseNoName4">House No/Name </label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group has-float-label">
                                                    <input type="text" class="form-control" id="Street4" placeholder="Street" name="street_sch" value="">
                                                    <label for="Street4">Street <span class="fc-star">*</span></label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group has-float-label">
                                                    <input type="text" class="form-control" id="Area4" placeholder="Area" name="area_sch" value="">
                                                    <label for="Area4">Area </label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group has-float-label">
                                                    <input type="text" class="form-control" id="TownCity4" placeholder="Town/City" name="city_sch" value="">
                                                    <label for="TownCity4">Town/City <span class="fc-star">*</span></label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group has-float-label">
                                                    <input type="text" class="form-control" id="StateCounty4" placeholder="State/County" name="state_sch" value="">
                                                    <label for="StateCounty4">State/County </label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group has-float-label">
                                                    <input type="num" class="form-control" id="Postcode5" placeholder="Postcode" name="" value="">
                                                    <label for="Postcode5">Postcode <span class="fc-star">*</span></label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group has-float-label">
                                                    <input type="num" class="form-control" id="Country5" placeholder="Country" name="" value="">
                                                    <label for="Country5">Country <span class="fc-star">*</span></label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group has-float-label">
                                                    <input type="email" class="form-control" id="Email5" placeholder="Email" name="">
                                                    <label for="Email5">Email</label>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group has-float-label">
                                                    <input type="text" class="form-control" id="PhoneNo5" placeholder="Phone No." name="">
                                                    <label for="PhoneNo5">Phone No.</label>
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