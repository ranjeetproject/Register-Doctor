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
                                    <select class="form-control" name="role">
                                        <option>Select user type</option>
                                        <option value="1">Patient</option>
                                        <option value="2">Doctor</option>
                                        <option value="3">Pharmacist</option>
                                      </select>
                                  </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group required">
                                    <input type="text" name="forename" class="form-control effect-19" placeholder="" required="">
                                    <label>Forename </label>
                                  </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group required">
                                    <input type="text" name="surname" class="form-control effect-19" placeholder="" required="" autocomplete="off">
                                    <label>Surname </label>
                                  </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group required">
                                    <input type="password" name="password" class="form-control effect-19" placeholder="" required="" autocomplete="off">
                                    <label>Password </label>
                                  </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group required">
                                    <input type="password" name="confirm_password" class="form-control effect-19" placeholder="" required="">
                                    <label>Confirm Password</label>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group required">
                                    <input type="email" name="email" class="form-control effect-19" placeholder="" required="">
                                    <label>Email </label>
                                  </div>
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
   <script>
        $(window).load(function(){
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