@extends('frontend.patient.afterloginlayout.app')

@section('content')
    <div class="col Choose-Your-Doctor-right innerpage  Message-Doctor-to-Patient-via-Left-Hand-Navigation-page">
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
                    <div class="row" style="margin-bottom: 12px;">
                        <div class="col-sm-5"></div>
                        <div class="col-sm-7">
                            <form class="form-inline for-chat-search" action="{{ route('pharmacist.chat_post') }}"
                                method="post">
                                @csrf
                                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="param">
                                    <option value="1" {{ $key_per == 1 ? "selected":""  }}>Patient Name</option>
                                    <option value="2" {{ $key_per == 2 ? "selected":""  }}>Patient ID</option>
                                    <option value="3" {{ $key_per == 3 ? "selected":""  }}>Doctor Name</option>
                                    <option value="4" {{ $key_per == 4 ? "selected":""  }}>Doctor ID</option>
                                    <option value="5" {{ $key_per == 5 ? "selected":""  }}>Prescription No</option>
                                </select>
                                <input type="text" class="form-control" id="inlineFormInputGroupUsername2"
                                    placeholder="Search.." name="search" value="{{ $val_sur }}">
                                <button type="submit" class="btn btn-primary blue-button">Submit</button>
                            </form>
                        </div>
                    </div>
                    @isset($key_per)
                        @if ($key_per == 5)

                        <div class="row" style="margin-bottom: 12px;">
                            <div class="col-sm-5"></div>
                            <div class="col-sm-7">
                                @if ($p_user)
                                <a href="{{ route('pharmacist.chats',[$p_user->id]) }}" class="btn blue-button">Chat with patient</a> <a href="{{ route('pharmacist.chats',[$d_user->id]) }}" class="btn blue-button"> Chat With doctor</a>
                                @else
                                No Data Found!
                                @endif
                            </div>
                        </div>



                        @else
                        @forelse ($users as $user)
                        <div class="row" style="margin-bottom: 12px;">
                            <div class="col-sm-5"></div>
                            <div class="col-sm-7">
                                <a href="{{ route('pharmacist.chats',[$user->id]) }}" class="btn blue-button">Chat with {{ $user->name }}</a>
                            </div>
                        </div>
                        @empty
                        <div class="row" style="margin-bottom: 12px;">
                            <div class="col-sm-5"></div>
                            <div class="col-sm-7">
                                No Data Found!
                            </div>
                        </div>
                    @endforelse
                        @endif
                    @endisset



                </div>
            </div>



        </div>
    </div>
    </div>
@endsection
@push('scripts')
    <script src="https://www.gstatic.com/firebasejs/8.0.1/firebase-app.js"></script>
    {{-- <script src="https://www.gstatic.com/firebasejs/8.4.2/firebase-app.js"></script> --}}
    <script src="https://www.gstatic.com/firebasejs/8.0.1/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.0.1/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.0.1/firebase-analytics.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.0.1/firebase-firestore.js"></script>


    {{-- <script src="https://www.gstatic.com/firebasejs/8.4.2/firebase-analytics.js"></script> --}}

@endpush
