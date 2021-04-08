@extends('frontend.beforeloginlayout.app')

@section('content')
    <section class="for-w-100 main-content innerpage  login-page">
        <div class="container">
            
            <div class="row d-flax  align-items-center     justify-content-center  Patient-Profile-page">
                <div class="col-sm-10">
                    <form class="for-w-100" method="post" action="{{route('registration-step2',Crypt::encrypt($user->id))}}" enctype="multipart/form-data">
                      @csrf
                        <h1 class="inner-page-title">
                            Create Account
                        </h1>
                        <p>Main Account Holders Must Be Over 18</p>
                        <div class="row main-form-fild input-effect">
                            
                            @if($user->role == 2)
                            <div class="col-sm-12">

                                <div class="for-profile-image">
                                <input type="file" name="dr_gmc_licence" id="imgInp">
                                
                                <img id="blah" src="{{ asset('public/images/frontend/images/step2.png') }}" alt="your image">
                                
                                <br>
                                <span>Upload GMC licence</span>
                                <br>
                                <span class="text-danger">{{$errors->first('dr_gmc_licence')}}</span> 

                            </div>
{{-- 
                                <div class="form-group required">
                                    <input type="file" name="gmc_licence" class="form-control effect-19" placeholder="" value="{{old('gmc_licence')}}">
                                    <label>GMC licence</label>
                                  </div>
                                  <span class="text-danger">{{$errors->first('gmc_licence')}}</span> --}}
                            </div>
                            @endif

                            @if($user->role == 3)
                            <div class="col-sm-12">
                                <div class="form-group required">
                                    <textarea name="pharmacy_name" class="form-control effect-19">{{old('pharmacy_name')}}</textarea>
                                    <label>Pharmacy Name</label>
                                  </div>
                                  <span class="text-danger">{{$errors->first('pharmacy_name')}}</span>
                            </div>
                            
                            <div class="col-sm-12">
                                <div class="form-group required">
                                    <textarea name="location" class="form-control effect-19">{{old('location')}}</textarea>
                                    <label>Location</label>
                                  </div>
                                  <span class="text-danger">{{$errors->first('location')}}</span>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group required">
                                     <input type="text" name="telephone1" class="form-control effect-19" placeholder="" value="{{old('telephone1')}}">
                                    <label>Contact Number</label>
                                  </div>
                                  <span class="text-danger">{{$errors->first('telephone1')}}</span>
                            </div>

                            @endif
                            



                          
                            <div class="col-sm-12 Submit-Medical-Record">
                                <button type="submit" class="btn blue-button smr-btn">Submit</button>
                            </div>
                            <div class="col-sm-12 form-group new-regis ">
                               {{--  <p class="alre-tex-aling">Already having an account? <a href="{{route('login')}}">Login</a>  </p> --}}
                            </div>
                        </div>
                        </form>
                      </div>
            </div>
        </div>
    </section>


@endsection

@push('scripts')
   {{-- <script> --}}
    <script type="text/javascript">
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
    
    </script>
@endpush