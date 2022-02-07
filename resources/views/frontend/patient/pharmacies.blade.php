@extends('frontend.patient.afterloginlayout.app')

@section('content')
    <div class="col Post-prescription-right innerpage  Post-prescription-page select pharmacy Pharmacy-locator">
        <div class="row">
            <div class="col-sm-12">
                <div class="col Post-prescription-right">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb Pharmacist-doc-com">
                            <li class="breadcrumb-item active">How do you want your Prescription sent ? <img
                                    src="{{ asset('public/images/frontend/images/ex-icon.png') }}" alt=""
                                    data-toggle="tooltip" data-placement="top"
                                    title="Info icon to read: You can have your prescription posted to you or sent electronically after choosing a Pharmacy.">
                            </li>
                        </ol>
                    </nav>
                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="nav nav-pills" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#Posted-to-You">
                                        Posted to You <br><small> Up to 2 - 3 working days</small>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab"
                                        href="#Electronic-Direct-to-Pharmacy-Rapid">Electronic Direct to
                                        Pharmacy<br>Rapid</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="Posted-to-You">
                                    <ul>
                                        <li>Prescription will be mailed to you by your Doctor</li>
                                        <li>Takes up to ~2-3 days (usually 1-2 days) depending on postal service</li>
                                        <li>Take the Prescription to any UK Pharmacist <img
                                                src="{{ asset('public/images/frontend/images/ex-icon.png') }}" alt=""
                                                data-toggle="tooltip" data-placement="top" title="One line Definition"
                                                class="max-w-22"></li>
                                        <li>In the event of the Pharmacist having a query you may message the doctor from
                                            your lefthand navigation
                                            menu (<a href="{{ (request()->c_id) ? route('patient.chats', request()->c_id) : "#" }}"> Prescriptions
                                                Issued</a>) e.g. give the Pharmacist's telephone number so they can talk
                                            direct</li>
                                    </ul>
                                    <p class="pmarg-top"><a href="{{ route('patient.profile') }}"
                                            target="_blank">Click</a> to check your delivery address is correct</p>
                                    <form action="" method="post" class="Pharmacy-loc">
                                        @csrf

                                        @if ($data['success'] != '')
                                            <div id="final_sucess" class="alert alert-success" role="alert">
                                                {{ $data['success'] }}
                                            </div>
                                        @elseif($data['error'] !='')
                                            <div id="final_error" class="alert alert-danger" role="alert">
                                                {{ $data['error'] }}
                                            </div>
                                        @endif
                                        <input class="btn blue-button mr-lf-top" type="submit" name="post_sub"
                                            value="Post prescription" />
                                    </form>

                                </div>


                                <div class="tab-pane fade" id="Electronic-Direct-to-Pharmacy-Rapid">
                                    <ul>
                                        <li>In a hurry? Prescription will be sent electronically to one of our Special
                                            Pharmacists</li>
                                        <li> Please check below that the special Pharmacy is local or can deliver to you
                                            (otherwise use postal option above)
                                            <ul class="sub-cont">
                                                <li>
                                                    After selecting a Pharmacy contact them (details below) e.g. is the drug
                                                    in stock, do they deliver?
                                                </li>
                                                <li> Give the Pharmacy your Prescription Number(s) below quoting
                                                    Registered-Doctor.com (located in your Lefthand Navigation Menu under
                                                    Prescriptions Issued).</li>
                                                {{-- <li> Each drug has a prescription number so for 3 drugs provide 3
                                                    prescription numbers</li> --}}
                                                <li> You can also send the Pharmacist your Prescription Number via this
                                                    website</li>
                                            </ul>
                                        </li>
                                        <li>In the event of the Pharmacist having a query you may message the doctor from
                                            your lefthand navigation menu (<a
                                                href="{{ (request()->c_id) ? route('patient.chats', request()->c_id): "#"  }}"
                                                target="_blank">Prescriptions Issued</a>) e.g. give the pharmacist's
                                            telephone number so they can talk direct</li>
                                        {{-- <li><a href="{{ route('patient.chats', request()->c_id) }}" target="_blank"> You can message the doctor from your Lefthand Navigation Menu under
                                            Prescriptions Issued</a></li> --}}
                                        <li>The Pharmacist bills you direct for the cost of the drug or any delivery costs
                                            <img src="http://localhost:82/branium/registered-doctor/public/images/frontend/images/ex-icon.png"
                                                alt="" data-toggle="tooltip" data-placement="top" title=""
                                                class="max-w-22" data-original-title="One line Definition">
                                        </li>
                                    </ul>
                                    <p class="pmarg-top"><strong>FOR URGENT REQUESTS CONTACT PHARMACY FIRST TO ENSURE
                                            DRUG IS IN STOCK </strong></p>
                                    <p><a href="{{ route('patient.profile') }}" target="_blank">Click</a> to check your
                                        delivery address is correct</p>
                                    <div class="row justify-content-end">
                                        <!-- <div class="col-sm-6">
                                                    <form action="" method="post" class="Pharmacy-loc">
                                                        <input type="text" class="form-control" placeholder="Search for Special Pharmacy – Location">
                                                    </form>
                                                </div> -->
                                    </div>

                                    @foreach ($data['pharmacies'] as $pharmaci)

                                        <div class="card pharmacy-details pharmacies-item">
                                            <div class="pharmacies-item-infoleft">
                                            <img src="{{$pharmaci->profile->profile_photo}}"
                                                alt=""/>
                                            </div>
                                            <div class="card-body">
                                                <h2>{{ $pharmaci->profile->pharmacy_name }} </h2>
                                                <p><span>Pharmacy Name : </span> {{ $pharmaci->profile->pharmacy_name }}
                                                </p>
                                                <p><span>Location : </span> {{ $pharmaci->profile->location }}</p>
                                                <p><span>Address : </span> {{ $pharmaci->profile->address }}</p>
                                                <p><span>Contact : </span> {{ $pharmaci->profile->telephone1 }}</p>
                                                <p><span>Email : </span> {{ $pharmaci->email }}</p>
                                                <p><span>Opening hours uk : </span></p>
                                                <form action="">
                                                    @csrf
                                                    <p><span>Delivery options : </span>
                                                        {{ isset($pharmaci->deliveryOption->customer_pick_up) && $pharmaci->deliveryOption->customer_pick_up == 1 ? 'Customer pick up, ' : '' }}
                                                        {{ isset($pharmaci->deliveryOption->local_delivery) && $pharmaci->deliveryOption->local_delivery == 1 ? 'Local Delivery (car/courier), ' : '' }}
                                                        {{ isset($pharmaci->deliveryOption->posts_within_uk) && $pharmaci->deliveryOption->posts_within_uk == 1 ? 'Posts within UK, ' : '' }}
                                                        {{ isset($pharmaci->deliveryOption->sends_international) && $pharmaci->deliveryOption->sends_international == 1 ? 'Sends International' : '' }}
                                                    </p>
                                                    <p><span>Notes : </span> {{ $pharmaci->openingTime->notes }}</p>
                                                    @if (!in_array($pharmaci->id, $data['pharma_ids']))
                                                        <p class="container_pharma{{ $pharmaci->id }}">Contact Pharmacy
                                                            with Prescription No. <a pharma_id="{{ $pharmaci->id }}"
                                                                c_id="{{ $_GET['c_id'] ?? '' }}"
                                                                prisc_id="{{ $_GET['s_id'] ?? '' }}" href=""
                                                                class="pharma_sub btn blue-button">send prescription No.
                                                                electronically</a> <img
                                                                src="{{ asset('public/images/frontend/images/ex-icon.png') }}"
                                                                alt="" data-toggle="modal" data-target="#Pharmacy-popup"
                                                                title='Info icon to state "To use this Pharmacy give them your prescription number and they will find your prescription on this website. You can also send the prescription on this website. You can also send the prescription number electronically to them."'>
                                                        </p>
                                                    @else
                                                    <div class="phar-pas-bx">
                                                        <p>Priscription already send to Pharmassist</p>
                                                    </div>
                                                    @endif
                                                </form>
                                                <div class="AvailabilityBtn">
                                                    <button type="button" class="btn btn-phar-Availability dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Availability</button>
                                                    <div class="dropdown-menu dropdown-menu-right phar-time-table">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        Day
                                                                    </th>
                                                                    <th>
                                                                        Time
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th>
                                                                        Sunday
                                                                    </th>
                                                                    <td>
                                                                        {{ $pharmaci->openingTime->sunday_opening_time ? date('h:i a', strtotime($pharmaci->openingTime->sunday_opening_time)) : '' }}
                                                                        -
                                                                        {{ $pharmaci->openingTime->sunday_closing_time ? date('h:i a', strtotime($pharmaci->openingTime->sunday_closing_time)) : '' }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>
                                                                        Monday
                                                                    </th>
                                                                    <td>
                                                                        {{ $pharmaci->openingTime->monday_opening_time ? date('h:i a', strtotime($pharmaci->openingTime->monday_opening_time)) : '' }}
                                                                        -
                                                                        {{ $pharmaci->openingTime->monday_closing_time ? date('h:i a', strtotime($pharmaci->openingTime->monday_closing_time)) : '' }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>
                                                                        Tuesday
                                                                    </th>
                                                                    <td>
                                                                        {{ $pharmaci->openingTime->tuesday_opening_time ? date('h:i a', strtotime($pharmaci->openingTime->tuesday_opening_time)) : '' }}
                                                                        -
                                                                        {{ $pharmaci->openingTime->tuesday_closing_time ? date('h:i a', strtotime($pharmaci->openingTime->tuesday_closing_time)) : '' }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>
                                                                        Wednesday
                                                                    </th>
                                                                    <td>
                                                                        {{ $pharmaci->openingTime->wednesday_opening_time ? date('h:i a', strtotime($pharmaci->openingTime->wednesday_opening_time)) : '' }}
                                                                        -
                                                                        {{ $pharmaci->openingTime->wednesday_closing_time ? date('h:i a', strtotime($pharmaci->openingTime->wednesday_closing_time)) : '' }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>
                                                                        Thursday
                                                                    </th>
                                                                    <td>
                                                                        {{ $pharmaci->openingTime->thursday_opening_time ? date('h:i a', strtotime($pharmaci->openingTime->thursday_opening_time)) : '' }}
                                                                        -
                                                                        {{ $pharmaci->openingTime->thursday_closing_time ? date('h:i a', strtotime($pharmaci->openingTime->thursday_closing_time)) : '' }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>
                                                                        Friday
                                                                    </th>
                                                                    <td>
                                                                        {{ $pharmaci->openingTime->friday_opening_time ? date('h:i a', strtotime($pharmaci->openingTime->friday_opening_time)) : '' }}
                                                                        -
                                                                        {{ $pharmaci->openingTime->friday_closing_time ? date('h:i a', strtotime($pharmaci->openingTime->friday_closing_time)) : '' }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>
                                                                        Saturday
                                                                    </th>
                                                                    <td>
                                                                        {{ $pharmaci->openingTime->saturday_opening_time ? date('h:i a', strtotime($pharmaci->openingTime->saturday_opening_time)) : '' }}
                                                                        -
                                                                        {{ $pharmaci->openingTime->saturday_closing_time ? date('h:i a', strtotime($pharmaci->openingTime->saturday_closing_time)) : '' }}
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

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
        $('.pharma_sub').on('click', function(event) {
            event.preventDefault();
            var case_id = $(this).attr('c_id');
            var pharma_id = $(this).attr('pharma_id');
            var prisc_id = $(this).attr('prisc_id');
            //alert (c_id+' '+ pharma_id + ' '+ prisc_id);
            var _token = $("input[name=_token]").val();
            $.ajax({
                url: "{{ url('patient/ajaxSend_req_to_Pharma') }}",
                type: 'POST',
                data: {
                    case_id: case_id,
                    pharma_id: pharma_id,
                    prisc_id: prisc_id,
                    _token: _token
                },
                success: function(res) {
                    console.log(res);
                    if (res.sucess == 'y') {
                        $('.container_pharma' + pharma_id).html('Send sucessfully');
                        $('.container_pharma' + pharma_id).css('background', 'green');
                        $('.container_pharma a' + pharma_id).removeClass('pharma_sub');
                    } else if (res.error == 'n') {
                        $('.pharma_sub').html('Please try agani');
                        $('.pharma_sub').css('background', 'red');
                        // $('.pharma_sub').removeClass('.pharma_sub');
                    }
                }
            });
        });
    </script>
@endsection
