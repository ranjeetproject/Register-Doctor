@extends('frontend.patient.afterloginlayout.app')

@section('content')
    <div class="col Post-prescription-right Incoming-Prescription-Requests-page">
        <div class="row">
            <div class="col-sm-12">

                <div class="col Incoming-Prescription-Requests-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb Pharmacist-doc-com">

                          <li class="breadcrumb-item active">Payment Detail</li>
                        </ol>
                      </nav>
                    <div class="for-w-100 Incoming-Prescription-Requests-right-table mt-0">
                        <div class="row">
                            <div class="col-sm-8">
                                <form class="form-inline">
                                    <div class="form-group">
                                      <label>Show</label>
                                      <select class="form-control">
                                        <option>8</option>
                                      </select>
                                      <span>entries</span>
                                    </div>
                                  </form>
                            </div>
                            <div class="col-sm-4">
                                {{-- <form action="">
                                    <input type="text" class="form-control" placeholder="Search...">
                                </form> --}}
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table class="table">
                                      <thead>
                                        <tr>
                                            <td>Case ID</td>
                                            <td>Amount</td>
                                            <td> payment_date </td>
                                            <td> Status</td>
                                        </tr>
                                      </thead>

                                      <tbody>
                                         @forelse ($payments as $payment)
                                        <tr>
                                            <td>{{ $payment->case_id }}</td>
                                            <td style="text-align: center;">
                                                {{ $payment->amount }}
                                            </td>
                                            <td>{{ $payment->payment_date }}</td>

                                            <td>
                                                @if($payment->status == 4)
                                                Canceled
                                                @elseif ($payment->status == 1)
                                                Success
                                                @else
                                                Failed
                                                @endif
                                            </td>
                                        </tr>
                                         @empty
                                         <tr>
                                           <td colspan="4">No data found</td>
                                         </tr>
                                         @endforelse

                                      </tbody>
                                    </table>
                                  </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <nav aria-label="Page navigation example">
                                     {{ $payments->onEachSide(1)->links() }}
                                  </nav>
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


    </script>
@endsection
