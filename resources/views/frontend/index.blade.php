@extends('frontend.beforeloginlayout.app')

@section('banner')
    <section class="home-slider-section Banner for-w-100">
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                @foreach ($home_banners as $home_banner)
                    <li data-target="#carousel" data-slide-to="{{ $loop->index }}" class="@if ($loop->iteration == 1) active @endif"></li>
                @endforeach
                {{-- <li data-target="#carousel" data-slide-to="1"></li>
                <li data-target="#carousel" data-slide-to="2"></li> --}}
            </ol> <!-- End of Indicators -->

            <!-- Carousel Content -->
            <div class="carousel-inner" role="listbox">
                @forelse ($home_banners as $home_banner)
                    <div class="carousel-item @if ($loop->iteration == 1) active @endif">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="home-banner-left-cont">
                                        <a href="{{ route('patient.my-favorite-doctors') . '?dr_speciality=all' }}"
                                            class="banner-left">
                                            {{-- <h1>
                                            <small>Membership is <span>Free</span></small><br>
                                            Click for a Specialist
                                        </h1>
                                        <p>Ask Questions, Upload Photos & Lab Results, Get 2nd Opinions</p> --}}
                                            {!! $home_banner->content !!}
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="bann-img">
                                        <img src="{{ asset('public/uploads/banner/' . $home_banner->image) }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty

                @endforelse
                {{-- <div class="carousel-item active">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="home-banner-left-cont">
                                    <a href="{{ route('patient.my-favorite-doctors') . '?dr_speciality=all' }}"
                                        class="banner-left">
                                        <h1>
                                            <small>Membership is <span>Free</span></small><br>
                                            Click for a Specialist
                                        </h1>
                                        <p>Ask Questions, Upload Photos & Lab Results, Get 2nd Opinions</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="bann-img">
                                    <img src="{{ asset('public/images/frontend/images/homebanner.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End of Carousel Item --> --}}

                {{-- <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="home-banner-left-cont">
                                    <a href="{{ route('patient.my-favorite-doctors') . '?dr_speciality=all' }}"
                                        class="banner-left">
                                        <h1>
                                            <small>Membership is <span>Free</span></small><br>
                                            Click for a Specialist
                                        </h1>
                                        <p>Ask Questions, Upload Photos & Lab Results, Get 2nd Opinions</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="bann-img">
                                    <img src="{{ asset('public/images/frontend/images/homebanner.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End of Carousel Item -->

                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="home-banner-left-cont">
                                    <a href="{{ route('patient.my-favorite-doctors') . '?dr_speciality=all' }}"
                                        class="banner-left">
                                        <h1>
                                            <small>Membership is <span>Free</span></small><br>
                                            Click for a Specialist
                                        </h1>
                                        <p>Ask Questions, Upload Photos & Lab Results, Get 2nd Opinions</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="bann-img">
                                    <img src="{{ asset('public/images/frontend/images/homebanner.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- End of Carousel Item -->
            </div> <!-- End of Carousel Content -->

            <!-- Previous & Next -->
            <a href="#carousel" class="carousel-control-prev" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon fal fa-caret-square-left" aria-hidden="true"></span>
                <span class="sr-only"></span>
            </a>
            <a href="#carousel" class="carousel-control-next" role="button" data-slide="next">
                <span class="carousel-control-next-icon fal fa-caret-square-right" aria-hidden="true"></span>
                <span class="sr-only"></span>
            </a>
        </div> <!-- End of Carousel -->
    </section>

@endsection

@section('content')
    <section class="for-w-100 main-content homepage">
        <div class="container">
            <div class="row">
                <div class="col-md">
                    <h2>Option 1</h2>
                    <h3>Choose & Book <small class="blue">Pick a Doctor</small></h3>
                    <div class="opction-one">
                        <div class="opction-one-top-image">
                            <img src="{{ asset('public/images/frontend/images/opction-one-top-image3.png') }}" alt="">
                        </div>
                        <div class="opction-one-bottom">
                            <div class="opction-one-bottom-left">
                                <h4>Option 1</h4>
                                <div id="opction1carousel" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    <!-- <ol class="carousel-indicators">
                                        <li data-target="#opction1carousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#opction1carousel" data-slide-to="1"></li>
                                        <li data-target="#opction1carousel" data-slide-to="2"></li>
                                    </ol>  -->
                                    <!-- End of Indicators -->
                                    <!-- Carousel Content -->
                                    <div class="carousel-inner" role="listbox">
                                        @forelse ($doctor_slides as $doctor_slide)

                                            <div class="carousel-item @if ($loop->index == 0) active @endif">
                                                @if ($doctor_slide->profile->profile_photo)
                                                    <img src="{{ asset($doctor_slide->profile->profile_photo) }}"
                                                        class="d-block" alt="...">
                                                @else
                                                    <img src="{{ asset('public/images/frontend/images/doc-pic.jpg') }}"
                                                        class="d-block" alt="...">
                                                @endif

                                                <div class="doctor-ratings">
                                                    @php
                                                        $review_array = reviewCalc($doctor_slide->id);
                                                    @endphp
                                                    @for ($i = 1; $i <= $review_array[0]; $i++)

                                                        <i class="fas fa-star" aria-hidden="true"></i>
                                                    @endfor

                                                    <span class="reviews-count">
                                                        ({{ $review_array[1] }} Reviews)
                                                    </span>
                                                </div>
                                            </div>
                                        @empty

                                            <div class="carousel-item active">
                                                <img src="{{ asset('public/images/frontend/images/doc-pic.jpg') }}"
                                                    class="d-block" alt="...">
                                                <div class="doctor-ratings">
                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                    <span class="reviews-count">
                                                        (98 Reviews)
                                                    </span>
                                                </div>
                                            </div> <!-- End of Carousel Item -->

                                            <div class="carousel-item">
                                                <img src="{{ asset('public/images/frontend/images/doc-pic.jpg') }}"
                                                    class="d-block" alt="...">
                                                <div class="doctor-ratings">
                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                    <span class="reviews-count">
                                                        (120 Reviews)
                                                    </span>
                                                </div>
                                            </div>

                                        @endforelse
                                        {{-- <div class="carousel-item active">
                                            <img src="{{ asset('public/images/frontend/images/doc-pic.jpg') }}"
                                                class="d-block" alt="...">
                                            <div class="doctor-ratings">
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <span class="reviews-count">
                                                    (98 Reviews)
                                                </span>
                                            </div>
                                        </div> <!-- End of Carousel Item --> --}}

                                        {{-- <div class="carousel-item">
                                            <img src="{{ asset('public/images/frontend/images/doc-pic.jpg') }}"
                                                class="d-block" alt="...">
                                            <div class="doctor-ratings">
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <span class="reviews-count">
                                                    (120 Reviews)
                                                </span>
                                            </div>
                                        </div> <!-- End of Carousel Item -->

                                        <div class="carousel-item">
                                            <img src="{{ asset('public/images/frontend/images/doc-pic.jpg') }}"
                                                class="d-block" alt="...">
                                            <div class="doctor-ratings">
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <span class="reviews-count">
                                                    (98 Reviews)
                                                </span>
                                            </div>
                                        </div> --}}
                                        <!-- End of Carousel Item -->
                                    </div> <!-- End of Carousel Content -->
                                    <div class="doctor-slide-buttons">
                                        <a href="#opction1carousel" class="carousel-control-prev" role="button"
                                            data-slide="prev">
                                            <span class="carousel-control-prev-icon fas fa-caret-square-left"
                                                aria-hidden="true"></span>
                                            <span class="sr-only"></span>
                                        </a>
                                        <a href="#opction1carousel" class="carousel-control-next doctor-option-slide"
                                            role="button" data-slide="next">
                                            <span class="carousel-control-next-icon fas fa-caret-square-right"
                                                aria-hidden="true"></span>
                                            <span class="sr-only"></span>
                                        </a>
                                    </div>
                                </div> <!-- End of Carousel -->
                            </div>
                            <div class="opction-one-bottom-right">
                                <ul>
                                    <li>You Choose Your Doctor</li>
                                    <li>Check out Qualifications, Ratings</li>
                                    <li>Filter by fees</li>
                                    <li>Specialists & GPs available</li>
                                    <li>Choose Live Video,<br> Live Chat
                                        or Typed Q&A</li>
                                </ul>
                                <div class="Book-Appointment">
                                    <span>BOOK APPOINTMENT</span><a
                                        href="{{ route('patient.my-favorite-doctors') . '?dr_speciality=all' }}"
                                        rel="noopener noreferrer"><i class="fal fa-share"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="Prescriptions">
                        <img src="{{ asset('public/images/frontend/images/pr-top.png') }}" alt="">
                        <div class="Prescriptions-top">
                            <h3>Prescriptions<br><small>In 3 Easy Steps</small></h3>
                            <img src="{{ asset('public/images/frontend/images/m-pr-pic1.jpg') }}" alt="">
                            <a href="{{ route('patient.show-prescriptions-rules') }}" class="btn blue-button">Find Out
                                More</a>
                        </div>
                        <div class="Prescriptions-bottom">
                            <h4>Children</h4>
                            <img src="{{ asset('public/images/frontend/images/m-pr-pic2.png') }}" alt="">
                            <a href="{{ route('patient.view-childs') }}" class="btn blue-button">Find Out More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md mrt-sm-15">
                    <h2>Option 2</h2>
                    <h3>Quick Question <small class="orange">Ask a Doctor</small></h3>
                    <div class="opction-two">
                        {{-- <form>
                        <div class="form-group">
                           <textarea placeholder="Type your health query here " class="form-control" rows="9"></textarea>
                        </div>
                        <div class="form-group">
                           <input type="file" class="form-control-file" id="exampleFormControlFile1">
                           <span>Upload Attachments <i class="far fa-paperclip"></i></span>
                        </div>
                        <button type="submit" class="btn orange-button">Submit Your query</button>
                     </form> --}}
                        <form method="post" id="upload_form" action="{{ route('patient.create-case') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="questions_type" value="3">



                            <div class="form-group">
                                <textarea placeholder="Type your health query here " class="form-control"
                                    name="health_problem" rows="6" required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="file" name="case_file[]" class="form-control-file" id="exampleFormControlFile1"
                                    onchange="preview_image();" multiple>
                                <span>Upload Attachments <i class="far fa-paperclip"></i></span>
                                <div id="preview_attachment"></div>
                            </div>
                            <button type="submit" class="btn orange-button">Submit Your query</button>
                        </form>
                        <h4>Option 2</h4>
                        <ul>
                            <li>
                                Your query is sent to a panel of Doctors free
                            </li>
                            <li>
                                Standard Fee <spna><i class="fas fa-pound-sign"></i>14.99</spna> charged only if Doctor
                                takes case
                            </li>
                            <li>
                                Includes up to 3 exchanges with doctor
                            </li>
                            <li>
                                Rate your Doctor
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        // $(document).ready(function () {
        // 	var fileTypes = ['jpg', 'jpeg', 'png'];  //acceptable file types
        // 	$("input:file").change(function (evt) {
        //       // <div id=""></div>
        // 	    var parentEl = $('#preview_attachment');
        // 	    var tgt = evt.target || window.event.srcElement,
        // 	                    files = tgt.files;

        // 	    // FileReader support
        //        var str = '';
        // 	    if (FileReader && files && files.length) {
        //          console.log(files);
        // 	        var fr = new FileReader();
        //            console.log('====================================');
        //            console.log(extension);
        //            console.log('====================================');
        // 	        var extension = files[0].name.split('.').pop().toLowerCase();

        // 	        fr.onload = function (e) {
        // 	        	success = fileTypes.indexOf(extension) > -1;
        // 	        	if(success)
        // 		        	// $(parentEl).append('<img src="' + fr.result + '" class="preview"/>');
        // 		        	str +='<img src="' + fr.result + '" class="preview"/>';
        //                  console.log('====================================');
        //                  console.log(fr.result);
        //                  console.log('====================================');
        // 	        }
        // 	        fr.onloadend = function(e){
        // 	            console.debug("Load End");
        // 	        }
        // 	        fr.readAsDataURL(files[0]);
        // 	    }
        // 	});
        // });

        function preview_image() {
            var total_file = document.getElementById("exampleFormControlFile1").files.length;
            var str = '';
            str += '<ul>';
            for (var i = 0; i < total_file; i++) {
                console.log('====================================');
                console.log(event.target.files[i], URL.createObjectURL(event.target.files[i]));
                console.log('====================================');
                str += "<li>" + event.target.files[i].name + "</li>";
                // if(event.target.files[i].type.split('/')[0] === 'image') {
                //     str +=  "<img src='"+URL.createObjectURL(event.target.files[i])+"'><br>";
                // //   $('#preview_attachment').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'><br>");
                // } else {
                //     str +=  "<embed src='"+URL.createObjectURL(event.target.files[i])+"' width='100%'><br>";
                //     // $('#preview_attachment').append("<embed src='"+URL.createObjectURL(event.target.files[i])+"' width='100%'><br>");
                // }
            }
            str += '</ul>';
            $('#preview_attachment').html(str);
        }
    </script>
@endpush
