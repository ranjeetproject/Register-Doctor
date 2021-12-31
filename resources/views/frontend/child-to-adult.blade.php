@extends('frontend.beforeloginlayout.app')

@section('content')
    <section class="for-w-100 main-content innerpage  login-page">
        <div class="container">

            <div class="row d-flax  align-items-center     justify-content-center  Patient-Profile-page">
                <div class="col-sm-10">
                    <form class="for-w-100" method="post" action="{{ route('child-to-adult') }}">
                        @csrf
                        <h1 class="inner-page-title">
                            Link Account
                        </h1>
                        <p>Your child ( child name) Account marge with this email</p>
                        <div class="row main-form-fild">
                            {{-- <div class="col-sm-12 reg-mrb-24">
                                <div class="form-group select">
                                    <select class="form-control" name="user_type">
                                        <option value="">Select user type</option>
                                        <option value="1" {{ old('user_type') == 1 ? 'selected' : '' }}>Patient</option>
                                        <option value="2" {{ old('user_type') == 2 ? 'selected' : '' }}>Doctor</option>
                                        <option value="3" {{ old('user_type') == 3 ? 'selected' : '' }}>Pharmacist</option>
                                    </select>
                                </div>
                                <span class="text-danger">{{ $errors->first('user_type') }}</span>
                            </div> --}}
                            {{-- <div class="col-sm-12 reg-mrb-24">
                                <div class="form-group required has-float-label">
                                    <input type="text" name="forename"
                                        class="form-control {{ old('forename') ? 'has-content' : '' }}"
                                        value="{{ old('forename') }}" id="forename" placeholder="Enter Forename">
                                    <label for="forename">Forename </label>
                                </div>
                                <span class="text-danger">{{ $errors->first('forename') }}</span>
                            </div>
                            <div class="col-sm-12 reg-mrb-24">
                                <div class="form-group required has-float-label">
                                    <input type="text" name="surname"
                                        class="form-control {{ old('surname') ? 'has-content' : '' }}"
                                        autocomplete="off" value="{{ old('surname') }}" id="surname" placeholder="Enter Surname">
                                    <label for="surname">Surname</label>
                                </div>
                                <span class="text-danger">{{ $errors->first('surname') }}</span>
                            </div> --}}
                            <input type="hidden" name="user_id" value="{{ $id }}">
                            <div class="col-sm-12 reg-mrb-24">
                                <div class="form-group required has-float-label">
                                    <input type="email" name="email" class="form-control" autocomplete="off"
                                        value="{{ old('email') }}" id="email" placeholder="Enter Email">
                                    <label for="email">Email </label>
                                </div>
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                            <div class="col-sm-12 reg-mrb-24">
                                <div class="form-group required has-float-label">
                                    <input type="password" name="password" class="form-control"
                                        autocomplete="off" id="password" placeholder="Enter Password">
                                    <label for="password">Password </label>
                                </div>
                                <span class="text-danger">{{ $errors->first('password') }}</span>

                            </div>

                            <div class="col-sm-12 reg-mrb-24">
                                <div class="form-group required has-float-label">
                                    <input type="password" name="confirm_password" class="form-control" id="confirmpassword" placeholder="Enter Confirm Password">
                                    <label for="confirmpassword">Confirm Password</label>
                                </div>
                                <span class="text-danger">{{ $errors->first('confirm_password') }}</span>

                            </div>


                            {{-- <div class="col-sm-12">
                                <div class="">
                                    <input type="checkbox" name="terms_conditions" class="" required>
                                    <a href="{{route('termsCondition')}}" style="color: #01105c; font-weight: 600;">Terms & Conditions </a>
                                  </div>
                            <span class="text-danger">{{$errors->first('terms_conditions')}}</span>
                            </div> --}}

                            {{-- <div class="col-sm-12">
                                <div class="">
                                    <input type="checkbox" name="privacy_policy" class="" required>
                                    <a data-target="#exampleModal" data-toggle="modal" style="color: #01105c; font-weight: 600;">Private Policy</a>
                                </div>
                                <span class="text-danger">{{ $errors->first('privacy_policy') }}</span>
                            </div> --}}




                            <div class="col-sm-12 Submit-Medical-Record">
                                <button type="submit" class="btn blue-button smr-btn">Submit</button>
                            </div>
                            {{-- <div class="col-sm-12 form-group new-regis ">
                                <p class="alre-tex-aling">Already have an account? <a
                                        href="{{ route('login') }}">Login</a> </p>
                            </div> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script src="{{ asset('public/js/frontend/js/bootstrap.min.js') }}"></script>
    {{-- <script> --}}
@endpush
