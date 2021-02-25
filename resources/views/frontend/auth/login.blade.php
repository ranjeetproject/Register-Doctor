@extends('frontend.beforeloginlayout.app')

@section('content')
    <section class="for-w-100 main-content innerpage  login-page">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <form action="{{ route('login')}}" method="POST">
                        {{csrf_field()}}
                        @error('credentials')
                            <p>{{ $message }}</p>
                        @enderror
                        <h1>Login</h1>
                        <p>Please login to your account</p>
                       {{--  <div class="form-group select">
                            <select name="user_type" class="form-control">
                                <option value="">Select user type</option>
                                <option value="1">Patient</option>
                                <option value="2">Doctor</option>
                                <option value="3">Pharmacist</option>
                            </select>
                        </div> --}}

                        
                        <div class="form-group">
                            <input type="email" name="email" class="@error('email') is-invalid @enderror form-control" placeholder="Username (this will usually be your Email)">
                            @error('email')
                                <span class="invalid-message" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="Password" name="password" class="@error('password') is-invalid @enderror form-control" placeholder="Password">
                            @error('password')
                                <span class="invalid-message" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror 
                        </div>
                        <div class="form-group Forgot">
                            <a href="{{ route('forgot-password') }}" target="_blank" rel="noopener noreferrer">Forgot password ?</a>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary blue-button">Login</button>
                        </div>
                        <div class="form-group new-regis">
                            <p>New user ? <a href="{{route('registration')}}">Click to Register</a></p>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection