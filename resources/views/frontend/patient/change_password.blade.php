@extends('frontend.patient.afterloginlayout.app')

@section('content')
    <div class="col Post-prescription-right Patient-Profile-page">
        <div class="row">
            <div class="col-sm-12">

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active input-effect" id="Patient-Profile">
                        <form class="for-w-100" action="{{ route('patient.change-password') }}" method="POST">
                            {{-- <input name="_token" type="hidden" value="{{ $token }}" SameSite="none" Secure/> --}}
                            @csrf
                            {{-- @dump($token) --}}
                            <div class="row Manage-Account-title">
                                <div class="col-sm-12">
                                    <h2>Change Password </h2>
                                </div>
                            </div>
                            <div class="row main-form-fild">
                                <div class="col-sm-12">
                                    <div class="form-group required">
                                        <input type="password" name="old_password" class="form-control effect-19" placeholder="" autocomplete="cc-old_password">
                                        <label>Old Password </label>
                                      </div>
                                    @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group required">

                                        <input type="password" name="new_password" class="form-control effect-19" placeholder="" autocomplete="cc-new_password">
                                        <label>New Password</label>
                                      </div>
                                      @error('new_password')
                                      <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group required">

                                        <input type="password" class="form-control effect-19" placeholder="" name="confirm_password" autocomplete="cc-confirm_password">
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

                    <div class="tab-pane fade " id="Payment-Details">

                    </div>
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
