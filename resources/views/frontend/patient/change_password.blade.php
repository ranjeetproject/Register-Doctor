@extends('frontend.patient.afterloginlayout.app')

@section('content')
    <div class="col Post-prescription-right">
                    <div class="row">
                        <form class="for-w-100 input-effect" method="post">

                            @csrf

                            <div class="row Manage-Account-title">
                                <div class="col-sm-12">
                                    <h2>Change Password </h2>
                                </div>
                            </div>
                            <div class="row main-form-fild">
                                <div class="col-sm-12">
                                    <div class="form-group required">
                                        <input type="password" name="old_password" class="form-control effect-19" placeholder="">
                                        <label>Old Password </label>
                                      </div>
                                    @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group required">
                                        
                                        <input type="password" name="new_password" class="form-control effect-19" placeholder="">
                                        <label>New Password</label>
                                      </div>
                                      @error('new_password')
                                      <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group required">
                                        
                                        <input type="password" class="form-control effect-19" placeholder="" name="confirm_password">
                                        <label>Confirm Password</label>
                                      </div>
                                      @error('confirm_password')
                                      <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                </div>
                                <div class="col-sm-12 Submit-Medical-Record">
                                    <button type="submit" class="btn blue-button smr-btn">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
@endsection
@section('scripts')
    <script>
         $(window).on('load', function(){
        $(".tab-content #Patient-Profile input, .tab-content #Patient-Profile textarea").val("");
        
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