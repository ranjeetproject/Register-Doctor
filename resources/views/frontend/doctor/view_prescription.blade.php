@extends('frontend.doctor.afterloginlayout.app')

@section('content')
    <div class="col-lg-9 Choose-Your-Doctor-right innerpage  case-page">
        <div class="row">
            <div class="col-sm-12">



                <div class="container">
                    <div class="row">
                        <div class="col Case-Conclusion-live-Video-and-live-Chat-right">

                            <span class="cash-id">Case ID : {{ $return['case_details']->case_id }}</span>

                        </div>
                        <div class="col-sm-12">
                            <div class="view-case-details">
                                <ul>
                                    <li><label>Name </label><span class="cont"> <span>:</span>
                                            {{ $return['case_details']->user->name }}</span></li>
                                    <li><label>Sex </label><span class="cont"> <span>:</span>
                                            {{ $return['case_details']->user->profile->gender }}</span></li>
                                    <li><label>Date of Birth </label><span class="cont"> <span>:</span>
                                            {{ date('d F Y', strtotime($return['case_details']->user->profile->dob)) }}</span>
                                    </li>
                                    <li><label>Address </label><span class="cont"> <span>:</span>
                                            {{ $return['case_details']->user->profile->address }}</span></li>
                                    <li><label>Unique Patient Number (UPN) </label><span class="cont">
                                            <span>:</span> {{ $return['case_details']->user->registration_number }}</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-sm-12 Drug-Prescribed-list mt-3">

                                <!-- <p>Drug Prescribed</p> -->

                                <!-- <p><strong style="color: #000000;">Example :</strong> Do not stop without medical advice, see your GP for monitoring weight every 2 weeks, prednisolone 10mg po od then 5mg po od then stop. </p> -->

                                <div class="table-responsive">



                                    <table class="table Live-Chat add-edt-table-details" id="add-tr">

                                        <thead>

                                            <tr>

                                                <td>Prescription No. </td>

                                                <td>Drug </td>

                                                <td>Dose</td>

                                                <td>Frequency</td>

                                                <td>Route</td>

                                                <td>Duration</td>

                                                <td>Comments</td>

                                            </tr>

                                        </thead>

                                        <tbody>
                                            @foreach ($return['prescription'] as $prisc)
                                                <tr class="only-remv">

                                                    <td>{{ $prisc->case_no }}</td>

                                                    <td>{{ $prisc->drug }}</td>

                                                    <td>{{ $prisc->dose }}</td>

                                                    <td>{{ $prisc->frequency }}</td>

                                                    <td>{{ $prisc->route }}</td>

                                                    <td>{{ $prisc->duration }}</td>

                                                    <td>
                                                        {{ $prisc->comments }}
                                                    </td>
                                                </tr>
                                            @endforeach


                                        </tbody>

                                    </table>

                                </div>

                            </div>
                            {{-- @dump(count($return['comments'])) --}}
                            @if(count($return['comments']))
                            <div class="col-sm-12 my-3">Corrections Or Comments</div>
                            @endif
                            @foreach ($return['comments'] as $item)
                            {{-- @dump($item) --}}
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-9">
                                        {{ $item['comments'] }}
                                    </div>
                                    <div class="col-sm-3">
                                        {{ $item['created_at'] }}
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
@endsection
@section('scripts')
    <script>

    </script>
@endsection
