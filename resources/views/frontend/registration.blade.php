@extends('frontend.beforeloginlayout.app')

@section('content')
    <section class="for-w-100 main-content innerpage  login-page">
        <div class="container">
            
            <div class="row d-flax  align-items-center     justify-content-center  Patient-Profile-page">
                <div class="col-sm-10">
                    <form class="for-w-100" method="post" action="{{route('create-user')}}">
                      @csrf
                        <h1 class="inner-page-title">
                            Create Account
                        </h1>
                        <p>Main Account Holders Must Be Over 18</p>
                        <div class="row main-form-fild input-effect">
                            <div class="col-sm-12">
                                <div class="form-group select">
                                    <select class="form-control" name="user_type">
                                        <option value="">Select user type</option>
                                        <option value="1">Patient</option>
                                        <option value="2">Doctor</option>
                                        <option value="3">Pharmacist</option>
                                      </select>
                                  </div>
                                     <span class="text-danger">{{$errors->first('user_type')}}</span>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group required">
                                    <input type="text" name="forename" class="form-control effect-19" placeholder="" >
                                    <label>Forename </label>
                                  </div>
                                  <span class="text-danger">{{$errors->first('forename')}}</span>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group required">
                                    <input type="text" name="surname" class="form-control effect-19" placeholder=""  autocomplete="off">
                                    <label>Surname </label>
                                  </div>
                                   <span class="text-danger">{{$errors->first('surname')}}</span>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group required">
                                    <input type="password" name="password" class="form-control effect-19" placeholder=""  autocomplete="off">
                                    <label>Password </label>
                                  </div>
                            <span class="text-danger">{{$errors->first('password')}}</span>

                            </div>

                            <div class="col-sm-12">
                                <div class="form-group required">
                                    <input type="password" name="confirm_password" class="form-control effect-19" placeholder="" >
                                    <label>Confirm Password</label>
                                </div>
                            <span class="text-danger">{{$errors->first('confirm_password')}}</span>

                            </div>


                            <div class="col-sm-12">
                                <div class="form-group required">
                                    <input type="email" name="email" class="form-control effect-19" placeholder="" autocomplete="off">
                                    <label>Email </label>
                                  </div>
                            <span class="text-danger">{{$errors->first('email')}}</span>
                            </div>
                          
                            <div class="col-sm-12 Submit-Medical-Record">
                                <button type="submit" class="btn blue-button smr-btn">Submit</button>
                            </div>
                            <div class="col-sm-12 form-group new-regis ">
                                <p class="alre-tex-aling">Already having an account? <a href="{{route('login')}}">Login</a>  </p>
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
    
    </script>
@endpush