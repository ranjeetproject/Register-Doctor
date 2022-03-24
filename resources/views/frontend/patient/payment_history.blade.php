@extends('frontend.patient.afterloginlayout.app')

@section('content')
    <div class="col Choose-Your-Doctor-right innerpage  Prescriptions-Dispensed-page">
        <div class="row">
            <div class="col-sm-12">
                <div class="col Prescriptions-Dispensed-right">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb Pharmacist-doc-com">
                            <li class="breadcrumb-item active">Payment History</li>
                        </ol>
                    </nav>
                    @php
                        //   $time_zone = Auth::user()->profile->time_zone;
                        $time_zone = d_timezone();
                    @endphp
                    <div class="for-w-100 Prescriptions-Dispensed-right-table">
                        <div class="row">
                            <div class="col-sm-12">
                                <form class="form-history" id="filterSearch" method="GET">
                                    <div class="form-group form-history-left">
                                        <label>Show</label>
                                        <select class="form-control">
                                            <option>8</option>
                                        </select>
                                        <span>entries</span>
                                    </div>
                                    <div class="form-history-right">
                                        <input type="text" id="date_timepicker_start" class="form-control ml-mrtlf-10" name="start_date" placeholder="Date range" value="{{ request()->start_date }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                        <a class="btn btn-csv" href="{{ url('/') }}/patient/payment-history?export=export&start_date={{ request()->start_date }}">
                                            <i class="fas fa-file-export"></i>
                                        </a>
                                        <div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table class="table Prescriptions-Dispensed-table">
                                        <thead>
                                            <tr>
                                                <td>Date</td>
                                                <td>Case ID</td>
                                                <td>Case type </td>
                                                <td>Amount</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($payments as $payment)
                                                <tr>
                                                    <td>{{ date('dS M Y', strtotime($payment->created_at)) }}</td>
                                                    <td>{{ $payment->case_id }}</td>
                                                    <td>{{ getQuestionTypeNumberToString($payment->case->questions_type) }}
                                                    </td>
                                                    <td>{{ $payment->amount }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <nav aria-label="Page navigation example">
                                    {{ $payments->links() }}
                                </nav>
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
        $(document).ready(function() {
            $('#date_timepicker_start').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                }
            });
            $('#date_timepicker_start').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format(
                    'MM/DD/YYYY'));
            });

            $('#date_timepicker_start').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });
        });

        $('#doctor_id').change(function(e) {
            $("#filterSearch").submit();
        });
    </script>
@endsection
