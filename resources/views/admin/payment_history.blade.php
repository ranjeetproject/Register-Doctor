@extends('layout.admin_layout')

@section('title', 'admin-dashboard')

@section('body')
@section('header', 'Doctor wise Total Payment')
@section('badge')
    <li class="breadcrumb-item"><a href="{{ route('admin.payment_history') }}">Doctor wise Total Payment</a></li>
@endsection

<!-- /.col -->

<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">Doctor wise Total Payment</h3>

        <div class="card-tools">
            <form action="" method="GET">
                <div class="input-group input-group-sm pyh-input-fields">
                    <select name="doctor_id" id="doctor_id" class="form-control">
                        <option value="">All</option>
                        
                    </select>
                    {{-- <input type="text" name="search" class="form-control" placeholder="Search"> --}}
                    <input type="text" id="date_timepicker_start" class="form-control ml-mrtlf-10" name="start_date" placeholder="Date range" value="{{ request()->start_date }}" readonly>
                    {{-- <input type="text" id="date_timepicker_end" class="form-control ml-mrtlf-10" name="end_date" placeholder="End Date"> --}}
                    <div class="input-group-append">
                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>

                    </div>
                    <a class="btn btn-csv" href="{{ url('/') }}/admin/payment-history?export=export&start_date={{ request()->start_date }}"><i class="fas fa-file-export"></i></a>
                </div>
            </form>

        </div>
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
            <div class="table-responsive mailbox-messages">
                <table id="example2" class="table table-hover table-striped">

                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Admin amount</th>
                            <th>Doctor's amount</th>
                            <th>Total amount</th>
                            {{-- <th></th> --}}
                        </tr>
                    </thead>

                    <tbody id="search_result">
                        @forelse ($payments as $payment)
                            <tr>
                                <td>
                                    {{ date('Y-m-d', strtotime($payment->created_at)) }}
                                    {{-- {{ date('M-d-Y', strtotime($payment->created_at)) }} --}}
                                </td>
                                <td>{{ $payment->admin_amount }}</td>
                                <td>{{ $payment->doctor_amount }}</td>
                                <td>{{ $payment->amount }}</td>
                                {{-- <td></td>
                                <td>


                                </td> --}}
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">No data found.</td>
                            </tr>
                        @endforelse

                    </tbody>


                </table>
                <!-- /.table -->
            </div>
            <!-- /.mail-box-messages -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer p-0">
        <div class="mailbox-controls">

            <div class="float-right">

                <div class="btn-group">
                    {{ $payments->onEachSide(1)->links() }}
                </div>
                <!-- /.btn-group -->
            </div>
            <!-- /.float-right -->
        </div>
    </div>
</div>
<!-- /.card -->

<!-- /.col -->


@endsection
@push('scripts')
<script>
    $(document).ready(function(){
        $('#date_timepicker_start').daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            }
        });
        $('#date_timepicker_start').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });

        $('#date_timepicker_start').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
    });

    // $('#date_timepicker_start').datetimepicker({
    //         format:'Y/m/d',
    //         onShow:function( ct ){
    //             this.setOptions({
    //                 maxDate:jQuery('#date_timepicker_end').val()?jQuery('#date_timepicker_end').val():false
    //             })
    //         },
    //         timepicker:false
    //     });
    //     $('#date_timepicker_end').datetimepicker({
    //         format:'Y/m/d',
    //         onShow:function( ct ){
    //             this.setOptions({
    //                 minDate:jQuery('#date_timepicker_start').val()?jQuery('#date_timepicker_start').val():false
    //             })
    //         },
    //         timepicker:false
    //     });
</script>
@endpush
