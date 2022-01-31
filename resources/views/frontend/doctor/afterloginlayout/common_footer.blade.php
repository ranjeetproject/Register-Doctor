<footer class="footer Banner for-w-100">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <a href="{{ route('home') }}" class="footer-ligo"><img src="{{ asset('public/images/frontend/images/footer-logo.png') }}" alt=""></a>
                <div class="socil-media">
                    <a href="http://" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook-f social"></i></a>
                    <a href="http://" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter social"></i></a>
                    <a href="http://" target="_blank" rel="noopener noreferrer"><i class="fab fa-linkedin-in social"></i></a>
                    <a href="http://" target="_blank" rel="noopener noreferrer"><i class="fab fa-youtube social"></i></a>
                </div>
            </div>
            <div class="col-sm-6">
                <h3 class="title">Menu</h3>
                <ul class="footer-menu">
                    <li><a href="{{ route('home') }}">Home </a></li>
                    <li><a href="{{ route('aboutUs')}}">About</a></li>
                    <li><a href="{{ route('news') }}">News</a></li>
                    <li><a href="{{ route('userFaq')}}">FAQs</a></li>
                    <li><a href="{{ route('contactUs')}}">Contact Us</a></li>
                    @guest
                        <li><a href="{{route('login')}}">Login</a></li>
                        <li><a href="{{route('registration')}}">Registration</a></li>
                    @endguest
                    <li><a href="{{route('termsCondition','doctor')}}">Terms & Conditions</a></li>
                    <li><a href="{{route('privacyPolicy')}}">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="col-sm-3 cont-details">
                <h3 title="title">Contact Us</h3>
                <p>Peter Lane 1st Block 1st Cross,
                    Scott Lane, London-560016</p>
                <p><span>Email : </span> <a href="mailto:info@registered_doctor.com"> info@registered_doctor.com</a><br>
                    <span>Phone : </span> <a href="tel:258-5562">258-5562</a>
                   </p>
            </div>
        </div>
    </div>
    <div class="for-w-100 copywright">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 tex-center">
                    &copy; {{date('Y')}} Registered-Doctor.com, All Right Reserved.
                </div>
            </div>
        </div>
    </div>
</footer>
