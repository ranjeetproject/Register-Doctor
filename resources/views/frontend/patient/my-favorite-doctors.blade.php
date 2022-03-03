@extends('frontend.patient.afterloginlayout.app')

@section('content')
    <div class="col Post-prescription-right innerpage  Choose-Your-Doctor-page">
        <div class="row">
            <div class="col-sm-12">
                @php
                    $age = \Carbon\Carbon::parse(auth()->user()->profile->dob)->diff(\Carbon\Carbon::now());
                    $sd = $age->format('%y years, %m months and %d days');
                    $d_years = $age->format('%y');
                    $d_months = $age->format('%m');
                    $d_days = $age->format('%d');
                    // dump($age, $sd, $d_years,$d_months,$d_days);
                @endphp

                <div class="col Choose-Your-Doctor-right">

                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb Pharmacist-doc-com">
                            <!-- <li class="breadcrumb-item"><a href="#">Dashboard <i class="fal fa-long-arrow-right"></i></a></li> -->
                            <li class="breadcrumb-item active">Choose Your Doctor</li>
                        </ol>
                    </nav>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card Choose-Your-Doctor-card-cont">
                                <div class="card-body">
                                    <h5 class="card-title">You have 3 options to consult a doctor:</h5>
                                    <p><strong>Live Video -</strong> Book 15 min live time slots with a doctor</p>
                                    <p><strong>Live Chat -</strong> Book 15 min live time slots with a doctor</p>
                                    <p><strong>Typed Q&A -</strong> Not live - Send Question, Get Answer. Book 15 min time
                                        slots of doctor's time for him
                                        to answer question. View turnaround times of doctors. Max 3 exchanges.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form>
                        <div class="form-group row Speciality-form">
                            <label class="col col-form-label">Speciality or Interest :</label>
                            <div class="col-sm-7">
                                <select class="custom-select mr-sm-2" name="dr_speciality" id="inlineFormCustomSelect">
                                    <option value="">Select Speciality or Interest </option>
                                    <option value="all" {{ isset($_GET['dr_speciality']) && $_GET['dr_speciality'] == "all" ? 'selected' : '' }}>All</option>
                                    @foreach ($doctors_speciality as $doctor_speciality)
                                        <option value="{{ $doctor_speciality['id'] }}"
                                            {{ isset($_GET['dr_speciality']) && $_GET['dr_speciality'] == $doctor_speciality['id'] ? 'selected' : '' }}>
                                            {{ ucfirst($doctor_speciality['name']) }}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                            <div class="col-sm-12">
                                <p><img src="images/ex-icon.png" alt="" data-toggle="tooltip" data-placement="top"
                                        title="One line Definition"> Do you need a prescription ?</p>
                            </div>

                        </div>

                    </form>

                    <form>
                        <div class="row Short-Filter">
                            <div class="col-sm-12">
                                <hr>
                            </div>

                            @if (isset($_GET['dr_speciality']) && !empty($_GET['dr_speciality']))
                                <input type="hidden" name="dr_speciality" value="{{ $_GET['dr_speciality'] }}">
                            @endif

                            <div class="col-sm-5">
                                <label class="mr-sm-2">Sort By :</label>
                                <select class="custom-select">
                                    <option selected>Ratings</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <select class="custom-select" name="price">
                                    <option value="">Price</option>
                                    <option value="desc">High-Low</option>
                                    <option value="asc">Low-High</option>
                                </select>
                            </div>
                            <div class="col-sm-7 pl-md-1">
                                <label class="mr-sm-2">Filter :</label>
                                <select class="custom-select" name="video_consult">
                                    <option value="">Video Consult </option>
                                    <option value="live_chat">Live Chat</option>
                                    <option value="live_video">Live Video</option>
                                    <option value="qa">Q&A</option>
                                </select>
                                <select class="custom-select" name="dr_see">
                                    <option value="">Adult/Kids/Both</option>
                                    <option value="1">Adult</option>
                                    <option value="child">Kids</option>
                                    <option value="both">Both</option>
                                </select>
                                <select class="custom-select" name="prescribers">
                                    <option value="">Prescribers</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>

                                </select>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary btn-lg px-5 mb-2">Apply</button>
                            </div>

                        </div>

                    </form>

                    <div class="row Doctor-list-details">
                        <div class="col-sm-12">


                            @if (isset($_GET['dr_speciality']) && !empty($_GET['dr_speciality']))
                                @forelse ($search_doctors as $doctor)

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-body-img">

                                                <img src="{{ $doctor->profile->profile_photo }}" alt="">
                                            </div>
                                            <div class="card-body-cont">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="reting-and-other-info">
                                                            <div class="rating-list">
                                                                <span onclick="doctorRating('{{ $doctor->id }}')">
                                                                    {!! getReview($doctor->id) !!}
                                                                </span>
                                                                <span>0.4</span>

                                                                <i id='doctor_{{ $doctor->id }}'
                                                                    class="fas fa-heart {{ getFavDoc($doctor->id) ? 'marks' : '' }}"
                                                                    style="cursor: pointer;"
                                                                    onclick="addToFavorite({{ $doctor->id }});"
                                                                    data-toggle="tooltip" title="Add To Favorite"></i>
                                                            </div>
                                                            <div class="rating-list-bottom">
                                                                <i class="far fa-thumbs-up reting"></i>
                                                                <i class="far fa-thumbs-up reting"></i>

                                                            </div>

                                                            <a href="{{ route('patient.view-doctor-profile', Crypt::encryptString($doctor->id)) }}"
                                                                class="btn blue-button rating-list-profile">View Profile</a>
                                                        </div>
                                                        <div class="mfd-item-linfo">
                                                        <h5 class="card-title">
                                                            {{ ucfirst($doctor->forename . ' ' . $doctor->surname) }}<br>
                                                            <small>
                                                                @foreach (@$doctor->doctorSpeciality as  $speciality)
                                                                    {{ ucfirst($speciality->specialites->name) }}
                                                                @endforeach
                                                            </small>
                                                        </h5>
                                                        <p>{{ $doctor->profile->dr_qualifications }}</p>
                                                        <p>Location : {{ ucfirst($doctor->profile->address) }}</p>
                                                        <p>Language : English,hindi </p>
                                                        <p>Communication :
                                                            {{ $doctor->profile->dr_live_chat_fee_notification == 1 ? 'Live Chat,' : '' }}
                                                            {{ $doctor->profile->dr_live_video_fee_notification == 1 ? ' Live Video,' : '' }}{{ $doctor->profile->dr_qa_fee_notification == 1 ? ' Typed Q&A,' : '' }}
                                                        </p>
                                                        <p>Sees Adults or Kids : {{ ucfirst($doctor->profile->dr_see) }}</p>
                                                        <p>Prescriber online :
                                                            {{ !empty($doctor->admin_verified_at) ? 'Yes' : 'No' }} </p>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row books-btn">
                                                    @if(18 < $d_years || $d_years < 11)
                                                    <div class="col-md-4">
                                                        <p>
                                                            @if ($doctor->profile->dr_live_chat_fee_notification == 1)
                                                             <i class="fas fa-pound-sign"></i>
                                                             {{ ($doctor->profile->dr_live_chat_fee)?$doctor->profile->dr_live_chat_fee + $doctor->profile->commission: $doctor->profile->dr_live_chat_fee}} per 15 mins
                                                             @else
                                                            &nbsp;
                                                             @endif
                                                            {{-- <i class="fas fa-pound-sign"></i>
                                                            {{ ($doctor->profile->dr_live_chat_fee)?$doctor->profile->dr_live_chat_fee + $doctor->profile->commission: $doctor->profile->dr_live_chat_fee}} per 15 mins --}}
                                                        </p>
                                                        {{-- <a href="{{ route('patient.view-doctor-profile', Crypt::encryptString($doctor->id)) }}"
                                                            class="btn btn-block Book-Live">Book Live Chat</a> --}}
                                                        <a href="{{ route('patient.view-doctor-profile', [Crypt::encryptString($doctor->id), 'questions_type'=> 'live-chat']) }}"
                                                            class="btn btn-block patient-book-lc {{ $doctor->profile->dr_live_chat_fee_notification == 1? '':"disabled" }}">Book Live Chat</a>
                                                    </div>
                                                    @endif
                                                    <div class="col-md-4">
                                                        <p>
                                                            @if ($doctor->profile->dr_live_video_fee_notification == 1)
                                                            {{  ($doctor->profile->dr_live_video_fee) ? $doctor->profile->dr_live_video_fee + $doctor->profile->commission : $doctor->profile->dr_live_video_fee  }} per 15 mins
                                                             @else
                                                            &nbsp;
                                                             @endif
                                                            {{-- <i class="fas fa-pound-sign"></i>
                                                            {{ ($doctor->profile->dr_live_video_fee) ? $doctor->profile->dr_live_video_fee + $doctor->profile->commission : $doctor->profile->dr_live_video_fee }} per 15 mins --}}
                                                        </p>

                                                        {{-- <a href="{{ route('patient.view-doctor-profile', Crypt::encryptString($doctor->id)) }}"
                                                            class="btn btn-block Book-Live">Book Live Video</a> --}}
                                                        <a href="{{ route('patient.view-doctor-profile', [Crypt::encryptString($doctor->id), 'questions_type'=> 'live-video']) }}"
                                                            class="btn btn-block patient-book-lc {{ $doctor->profile->dr_live_video_fee_notification == 1? '':"disabled" }}">Book Live Video</a>
                                                    </div>
                                                    @if(18 < $d_years || $d_years < 11)
                                                    <div class="col-md-4">
                                                        <p>
                                                            @if ($doctor->profile->dr_qa_fee_notification == 1)
                                                             <i class="fas fa-pound-sign"></i>
                                                             {{ ($doctor->profile->dr_qa_fee) ? $doctor->profile->dr_qa_fee + $doctor->profile->commission:$doctor->profile->dr_qa_fee }} per 15 mins
                                                             @else
                                                            &nbsp;
                                                             @endif
                                                            {{-- <i class="fas fa-pound-sign"></i>
                                                            {{ ($doctor->profile->dr_qa_fee) ? $doctor->profile->dr_qa_fee + $doctor->profile->commission:$doctor->profile->dr_qa_fee }} per 15 mins --}}
                                                        </p>
                                                        <button type="button" @if ($doctor->profile->dr_qa_fee_notification == 1)

                                                        onclick="bookLiveChats('{{ $doctor->id }}')"
                                                        @endif
                                                            class="btn btn-block Request {{ $doctor->profile->dr_qa_fee_notification == 1? '':'disabled' }}">Request Booked Q&A <br>
                                                            <small>Turnaround
                                                                Time {{ $doctor->profile->dr_turnaround_time }}</small></button>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                @empty
                                    <p>No Doctor Found</p>
                                @endforelse

                            @else



                                {{-- ******************************* --}}
                                @forelse ($doctors as $doctor)
                                {{-- @dump($doctor,$doctor->doctor->profile->speciality) --}}
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-body-img">

                                                <img src="{{ $doctor->doctor->profile->profile_photo }}" alt="">
                                            </div>
                                            <div class="card-body-cont">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="reting-and-other-info">
                                                            <div class="rating-list">
                                                                <span
                                                                    onclick="doctorRating('{{ $doctor->doctor->id }}')">
                                                                    {!! getReview($doctor->doctor->id) !!}
                                                                </span>


                                                                <span>0.4</span>
                                                                <i id='doctor_{{ $doctor->doctor->id }}'
                                                                    class="fas fa-heart marks" style="cursor: pointer;"
                                                                    onclick="addToFavorite({{ $doctor->doctor->id }});"
                                                                    data-toggle="tooltip" title="Add To Favorite"></i>
                                                            </div>
                                                            <div class="rating-list-bottom">
                                                                <i class="far fa-thumbs-up reting"></i>
                                                                <i class="far fa-thumbs-up reting"></i>

                                                            </div>
                                                            <a href="{{ route('patient.view-doctor-profile', Crypt::encryptString($doctor->doctor->id)) }}"
                                                                class="btn blue-button rating-list-profile">View Profile</a>
                                                        </div>
                                                        <div class="mfd-item-linfo">
                                                        <h5 class="card-title">
                                                            {{ ucfirst($doctor->doctor->name) }}<br><small>
                                                                {{ ucfirst($doctor->doctor->profile->speciality->name) }}</small>
                                                        </h5>
                                                        <p>{{ $doctor->doctor->profile->dr_qualifications }}</p>
                                                        <p>Location : {{ ucfirst($doctor->doctor->profile->address) }}
                                                        </p>
                                                        <p>Language : English,hindi </p>
                                                        <p>Communication :
                                                            {{ $doctor->doctor->profile->dr_live_chat_fee_notification == 1 ? 'Live Chat,' : '' }}
                                                            {{ $doctor->doctor->profile->dr_live_video_fee_notification == 1 ? ' Live Video,' : '' }}{{ $doctor->doctor->profile->dr_qa_fee_notification == 1 ? ' Typed Q&A,' : '' }}
                                                        </p>
                                                        <p>Sees Adults or Kids : {{ ucfirst($doctor->doctor->profile->dr_see) }}</p>
                                                        <p>Prescriber online :
                                                            {{ !empty($doctor->admin_verified_at) ? 'Yes' : 'No' }} </p>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row books-btn">
                                                    @if(18 < $d_years || $d_years <11)
                                                    <div class="col-md">
                                                        <p>
                                                            @if ($doctor->doctor->profile->dr_live_chat_fee_notification == 1)
                                                             <i class="fas fa-pound-sign"></i>
                                                             {{ $doctor->doctor->profile->dr_live_chat_fee }} per 15 mins
                                                             @else
                                                            &nbsp;
                                                             @endif
                                                            {{-- <i class="fas fa-pound-sign"></i>
                                                            {{ $doctor->doctor->profile->dr_live_chat_fee }} per 15 mins --}}
                                                        </p>
                                                        {{-- <a href="{{ route('patient.view-doctor-profile', [Crypt::encryptString($doctor->doctor->id), 'questions_type'=> 'live-chat']) }}"
                                                            class="btn btn-block Book-Live">Book Live Chat</a> --}}
                                                        <a href="{{ route('patient.view-doctor-profile', [Crypt::encryptString($doctor->doctor->id), 'questions_type'=> 'live-chat']) }}"
                                                            class="btn btn-block patient-book-lc {{ $doctor->doctor->profile->dr_live_chat_fee_notification == 1? '':"disabled" }}">Book Live Chat</a>
                                                    </div>
                                                    @endif
                                                    <div class="col-md">
                                                        <p>
                                                             @if ($doctor->doctor->profile->dr_live_video_fee_notification == 1)
                                                             <i class="fas fa-pound-sign"></i>
                                                             {{ $doctor->doctor->profile->dr_live_video_fee }} per 15 mins
                                                             @else
                                                            &nbsp;
                                                             @endif
                                                        </p>
                                                        {{-- <a href="{{ route('patient.view-doctor-profile', [Crypt::encryptString($doctor->doctor->id), 'questions_type'=> 'live-video']) }}"
                                                            class="btn btn-block Book-Live">Book Live Video</a> --}}
                                                        <a href="{{ route('patient.view-doctor-profile', [Crypt::encryptString($doctor->doctor->id), 'questions_type'=> 'live-video']) }}"
                                                            class="btn btn-block patient-book-lc {{ $doctor->doctor->profile->dr_live_video_fee_notification == 1? '':"disabled" }}">Book Live Video</a>
                                                    </div>

                                                    @if(18 < $d_years || $d_years < 11)
                                                    <div class="col-md-5">
                                                        <p>
                                                            {{-- <i class="fas fa-pound-sign"></i>
                                                            {{ $doctor->doctor->profile->dr_qa_fee }} per 15 mins --}}
                                                            @if ($doctor->doctor->profile->dr_qa_fee_notification == 1)
                                                             <i class="fas fa-pound-sign"></i>
                                                             {{ $doctor->doctor->profile->dr_qa_fee }} per 15 mins
                                                             @else
                                                            &nbsp;
                                                             @endif
                                                        </p>
                                                        <button type="button"
                                                            @if ($doctor->doctor->profile->dr_qa_fee_notification == 1)

                                                            onclick="bookLiveChats('{{ $doctor->doctor->id }}')"
                                                            @endif
                                                            class="btn btn-block Request {{ $doctor->doctor->profile->dr_qa_fee_notification == 1? '':'disabled' }}">Request Booked Q&A <br> <small>Turnaround
                                                                Time {{ $doctor->doctor->profile->dr_turnaround_time }}</small></button>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                @empty
                                    <p>No Doctor Found</p>
                                @endforelse

                            @endif




                            <div class="col-sm-12">
                                @if (isset($_GET['dr_speciality']) && !empty($_GET['dr_speciality']))
                                    {{-- {{$search_doctors->links()}} --}}
                                    {{ $search_doctors->links() }}
                                @else
                                    {{ $doctors->links() }}

                                    {{-- {{$doctors->links()}} --}}

                                @endif
                            </div>


                        </div>
                    </div>
                </div>



            </div>
        </div>




        {{-- model --}}

        <div class="modal fade bd-example-modal-lg how-it-works" tabindex="-1" id="myModal3" role="dialog"
            aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fal fa-times-circle"></i>
                    </button>
                    <form method="POST" action="{{ route('patient.create-case') }}" enctype="multipart/form-data">

                        @csrf
                        <input type="hidden" name="questions_type" value="4">
                        <input type="hidden" name="doctor_id" id="doctor_id">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="health_problem" id="exampleFormControlTextarea1"
                                        rows="5" placeholder="Type your helth query here..."></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Upload Attachments <i
                                            class="fal fa-paperclip"></i></label>
                                    <input type="file" name="case_file[]" class="form-control-file"
                                        id="exampleFormControlFile1" style="opacity: 0;" multiple><br> <img
                                        data-toggle="tooltip" data-placement="right" title=""
                                        data-original-title="One line definition" src="images/ex-icon.png" alt="">
                                </div>

                            </div>
                            <div class="col-sm-12 ask-submit">
                                <button type="submit" class="btn orange-button">Submit Your Query</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>






        {{-- <div class="modal fade" id="doct-review" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="modal-body" method="POST" action="{{ route('patient.doctor-review') }}">

                        @csrf
                        <input type="hidden" name="review_doctor_id" id="review_doctor_id" value="">
                        <div class="row">
                            <div class="col-sm-12 mb-2">
                                <h5>
                                    Please rate your experience with doctor from 1 to 5 star
                                </h5>

                            </div>
                            <div class="col-sm-12 py-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rating" id="1star" value="5">
                                    <span>
                                        Good
                                    </span>
                                    <label class="form-check-label" for="1star">
                                        <i class="fas fa-star active"></i> <i class="fas fa-star active"></i> <i
                                            class="fas fa-star active"></i> <i class="fas fa-star active"></i> <i
                                            class="fas fa-star active"></i>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rating" id="2star" value="4">
                                    <span>
                                        Satisfactory
                                    </span>
                                    <label class="form-check-label" for="2star">
                                        <i class="fas fa-star active"></i> <i class="fas fa-star active"></i> <i
                                            class="fas fa-star active"></i> <i class="fas fa-star active"></i> <i
                                            class="fas fa-star "></i>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rating" id="3star" value="3">
                                    <span>
                                        Room for improvement
                                    </span>
                                    <label class="form-check-label" for="3star">
                                        <i class="fas fa-star active"></i> <i class="fas fa-star active"></i> <i
                                            class="fas fa-star active"></i> <i class="fas fa-star"></i> <i
                                            class="fas fa-star "></i>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rating" id="4star" value="2">
                                    <span>
                                        Cloud be a lot better
                                    </span>
                                    <label class="form-check-label" for="4star">
                                        <i class="fas fa-star active"></i> <i class="fas fa-star active"></i> <i
                                            class="fas fa-star"></i> <i class="fas fa-star"></i> <i
                                            class="fas fa-star"></i>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rating" id="5star" value="1">
                                    <span>
                                        Poor
                                    </span>
                                    <label class="form-check-label" for="5star">
                                        <i class="fas fa-star active"></i> <i class="fas fa-star"></i> <i
                                            class="fas fa-star"></i> <i class="fas fa-star"></i> <i
                                            class="fas fa-star"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <p>You may add comments:</p>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                        placeholder="Type here..." name="review" required></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <p>To bookmark this doctor in case you want to consult them again click here</p>
                            </div>
                            <div class="col-sm-12 ask-submit">
                                <button type="submit" class="btn orange-button">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
    </div>

@endsection
@section('scripts')
    <script>
        function addToFavorite(doctorId) {
            // var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ route('patient.add-to-favorite') }}",
                type: 'get',
                dataType: "json",
                // data:{state:state,type:type,_token:token}
                data: {
                    doctor_id: doctorId
                }
            }).done(function(response) {
                if (typeof response != "undefined" && response.success) {
                    if (response.data == '1') {
                        $('#doctor_' + doctorId).addClass('marks');
                    } else if (response.data == '2') {
                        $('#doctor_' + doctorId).removeClass('marks');
                    }

                    toastr.success(response.message);
                }
            });
        }


        function bookLiveChats(doctor_id) {
            $('#myModal3').modal('show');
            $('#doctor_id').val(doctor_id);
        }


        function doctorRating(doctor_id) {
            $('#doct-review').modal('show');
            $('#review_doctor_id').val(doctor_id);

        }
    </script>
@endsection
