@extends('frontend.doctor.afterloginlayout.app')

@section('content')
    <div class="col Choose-Your-Doctor-right Message-Doctor-to-Patient-via-Left-Hand-Navigation-page">
        <div class="row">
            <div class="col-sm-12">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb Pharmacist-doc-com">
                            <!-- <li class="breadcrumb-item"><a href="#">Dashboard <i class="fal fa-long-arrow-right"></i></a></li> -->
                            <li class="breadcrumb-item"><a href="#"><img src="images/icon5.png" alt=""> Send Patient Message
                                    <i class="fal fa-long-arrow-right"></i></a></li>
                            <li class="breadcrumb-item active">Message Patient</li>
                        </ol>
                    </nav>
                    <div class="row send-patient-message-details-search" style="margin-bottom: 12px;">
                        <div class="col-sm-5"></div>
                        <div class="col-sm-7 send-patient-message-details-search">
                            <form class="form-inline for-chat-search">
                                <select name='key_v' class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                    <option value="1" {{ request()->key_v == 1 ? 'selected' : '' }}>Patient Name</option>
                                    <option value="2" {{ request()->key_v == 2 ? 'selected' : '' }}>Patient ID</option>
                                    <option value="3" {{ request()->key_v == 3 ? 'selected' : '' }}>Prescription No
                                    </option>
                                </select>
                                <input type="text" class="form-control" id="inlineFormInputGroupUsername2" name="search"
                                    placeholder="Search.." value="{{ request()->search }}">
                                <button type="submit" class="btn btn-primary blue-button">Submit</button>
                            </form>
                        </div>
                    </div>
                    {{-- <div class="row mb-3">
                        @foreach ($users as $user)
                        <div class="col-sm-5"></div>
                        <div class="col-sm-7">
                            {{ $user->name }} <a href="" type="_blank" class="btn btn-sm btn-primary" style="float: right;">Sick note</a>
                        </div>
                        @endforeach


                    </div> --}}
                    <div class="row send-patient-message-details">
                        <div class="col-sm-4">
                            <div class="contacts-details">
                                <div class="contacts-title">
                                    <span>Contacts</span>
                                </div>
                                <div class="contacts-bottom">
                                    <a href="#" class="contacts-bottom-details">
                                        <div class="profile-img active">
                                            <img src="{{ asset('public/images/frontend/images/msg-pic2.png') }}" alt="">
                                        </div>
                                        <div class="profile-colnt">
                                            <div class="profile-colnt-det">
                                                <h3>Michel Doe <small>11:20 am</small></h3>
                                                <p>Prescription No. 892546 </p>
                                            </div>

                                        </div>
                                    </a>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="chat-body">
                                <div class="chat-body-you">
                                    <div class="chat-body-left">
                                        <img src="{{ asset('public/images/frontend/images/msg-pic2.png') }}" alt="">
                                    </div>
                                    <div class="chat-body-right">
                                        <h3>Michel <small>10:01 p.m</small></h3>
                                        <p>Hi MIchel, What are you doing?</p>
                                    </div>
                                </div>
                                <div class="chat-body-me">
                                    <div class="chat-body-left">
                                        <img src="{{ asset('public/images/frontend/images/msg-pic1.png') }}" alt="">
                                    </div>
                                    <div class="chat-body-right">
                                        <h3>You <small>10:01 p.m</small></h3>
                                        <p>Hi Phill, What are you doing?</p>
                                    </div>
                                </div>

                                <div class="chat-body-you">
                                    <div class="chat-body-left">
                                        <img src="{{ asset('public/images/frontend/images/msg-pic2.png') }}" alt="">
                                    </div>
                                    <div class="chat-body-right">
                                        <h3>Michel <small>10:01 p.m</small></h3>
                                        <p>Hi MIchel, What are you doing?</p>
                                    </div>
                                </div>
                                <div class="chat-body-me">
                                    <div class="chat-body-left">
                                        <img src="{{ asset('public/images/frontend/images/msg-pic1.png') }}" alt="">
                                    </div>
                                    <div class="chat-body-right">
                                        <h3>You <small>10:01 p.m</small></h3>
                                        <p>Hi Phill, What are you doing?</p>
                                    </div>
                                </div>
                                <div class="chat-body-you tip">
                                    <div class="chat-body-left">
                                        <img src="{{ asset('public/images/frontend/images/msg-pic2.png') }}" alt="">
                                    </div>
                                    <div class="chat-body-right">
                                        <img src="images/chat-dot.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <form>
                                <input type="text" placeholder="Type a new message..." class="chat-input">
                                <button type="submit"><img src="images/chat-icon.png" alt=""></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('scripts')
    <script>

    </script>
@endsection
