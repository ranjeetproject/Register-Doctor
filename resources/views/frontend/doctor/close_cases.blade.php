@extends('frontend.doctor.afterloginlayout.app')

@section('content')
    <div class="col Choose-Your-Doctor-right innerpage  Incoming-Live-Chat-Doctor-End-page">
        <div class="row">
            <div class="col-sm-12">
                <div class="col Incoming-Prescription-Requests-right">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb Pharmacist-doc-com">
                            <li class="breadcrumb-item active">Closed Cases</li>
                        </ol>
                    </nav>
                    <div class="for-w-100 Incoming-Prescription-Requests-right-table">
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
                                                <td>Date Closed </td>
                                                <td>Case ID </td>
                                                <td>Patient’s Name </td>
                                                <td>View case</td>
                                                <td>View Medical Record</td>
                                                <td>Option</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($close_cases as $close_case)
                                                <tr>
                                                    <td>{{ date('dS M Y', strtotime($close_case->closed_at)) }}</td>
                                                    <td>{{ $close_case->case_id }}</td>
                                                    <td>{{ $close_case->user->name }}</td>
                                                    <td><a href="{{route('doctor.view-case',$close_case->case_id)}}"><button class="btn blue-button">View details</button></a> </td>
                                                    <td><a href="{{route('doctor.view-medical-recorde',$close_case->case_id)}}"><button class="btn Decline">View details</button></a></td>
                                                    <td><button class="btn blue-button">Print GP Note</button></td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6">No record found</td>
                                                </tr>
                                            @endforelse

                                            {{-- <tr >
                                            <td>08-10-2020</td>
                                            <td>000012345</td>
                                            <td>Joy Smith</td>
                                            <td><button class="btn blue-button">View details</button> </td>
                                            <td><button class="btn Decline">View details</button></td>
                                            <td><button class="btn blue-button">Print GP Note</button></td>
                                        </tr>
                                        <tr >
                                            <td>08-10-2020</td>
                                            <td>000012345</td>
                                            <td>Joy Smith</td>
                                            <td><button class="btn blue-button">View details</button> </td>
                                            <td><button class="btn Decline">View details</button></td>
                                            <td><button class="btn blue-button">Print GP Note</button></td>
                                        </tr>
                                        <tr >
                                            <td>08-10-2020</td>
                                            <td>000012345</td>
                                            <td>Joy Smith</td>
                                            <td><button class="btn blue-button">View details</button> </td>
                                            <td><button class="btn Decline">View details</button></td>
                                            <td><button class="btn blue-button">Print GP Note</button></td>
                                        </tr>
                                        <tr >
                                            <td>08-10-2020</td>
                                            <td>000012345</td>
                                            <td>Joy Smith</td>
                                            <td><button class="btn blue-button">View details</button> </td>
                                            <td><button class="btn Decline">View details</button></td>
                                            <td><button class="btn blue-button">Print GP Note</button></td>
                                        </tr>
                                        <tr >
                                            <td>08-10-2020</td>
                                            <td>000012345</td>
                                            <td>Joy Smith</td>
                                            <td><button class="btn blue-button">View details</button> </td>
                                            <td><button class="btn Decline">View details</button></td>
                                            <td><button class="btn blue-button">Print GP Note</button></td>
                                        </tr>
                                        <tr >
                                            <td>08-10-2020</td>
                                            <td>000012345</td>
                                            <td>Joy Smith</td>
                                            <td><button class="btn blue-button">View details</button> </td>
                                            <td><button class="btn Decline">View details</button></td>
                                            <td><button class="btn blue-button">Print GP Note</button></td>
                                        </tr>
                                        <tr >
                                            <td>08-10-2020</td>
                                            <td>000012345</td>
                                            <td>Joy Smith</td>
                                            <td><button class="btn blue-button">View details</button> </td>
                                            <td><button class="btn Decline">View details</button></td>
                                            <td><button class="btn blue-button">Print GP Note</button></td>
                                        </tr> --}}
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                {{-- <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-end">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1"
                                                aria-disabled="true">Previous</a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item clickabled">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav> --}}
                                {{ $close_cases->links() }}
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
