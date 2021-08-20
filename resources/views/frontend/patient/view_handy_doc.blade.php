@extends('frontend.patient.afterloginlayout.app')

@section('content')
    <div class="col Choose-Your-Doctor-right innerpage  Prescriptions-Dispensed-page">
        <div class="row">
            <div class="col-sm-12">
                <div class="col Prescriptions-Dispensed-right">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb Pharmacist-doc-com">
                            <li class="breadcrumb-item active">Handy Doc</li>
                        </ol>
                      </nav>

                    <div class="for-w-100 Prescriptions-Dispensed-right-table">
                        <div class="row">
                            <div class="col-sm-12" style="height: 300px;">
                                <iframe src="{{ asset('public/uploads/handydoc/'.$handy_doc->file_name) }}" style="width: 100%;height: 100%;border: none;"></iframe>
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
