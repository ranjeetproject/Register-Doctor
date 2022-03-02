@extends('layout.admin_layout')

@section('title', 'admin-dashboard')

@section('body')

@section('header', 'Type Quick Question Cost And Time')
@section('badge')
    <li class="breadcrumb-item"><a href="{{ route('admin.create-set_quick_question_cost') }}"> Type Quick Question Cost And Time</a></li>
@endsection


<div class="card">
    <div class="card-header">
        <h3 class="card-title">Type Quick Question Cost And Time</h3>
    </div>
    <div class="card-body">
        <form role="form" action="{{route('admin.save-set_quick_question_cost')}}" method="POST" enctype="multipart/form-data"
            id="cmsForm">
            {{ csrf_field() }}

    {{-- <input class="form-control" type="hidden" name="id"
                            value="{{ @$quick_question_cost->id }}"> --}}
            <div class="card-body">

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="set_quick_question_cost">Type Quick Question Cost ($)<span
                            class="text-danger">*</span></label>

                    <div class="col-md-10">
                        <input class="form-control @error('set_quick_question_cost') is-invalid @enderror" type="text" name="set_quick_question_cost"
                            placeholder="Please enter set quick question cost" value="{{ $quick_question_cost->set_quick_question_cost }}">
                        @error('set_quick_question_cost')
                            <span class="error invalid-feedback" id="error_set_quick_question_cost">{{ $message }}</span>
                        @enderror
                    </div>
                    <!--col-->
                </div>
                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="set_quick_question_time">Type Quick Question Active Time (HRS) <span
                            class="text-danger">*</span></label>

                    <div class="col-md-10">
                        <input class="form-control @error('set_quick_question_time') is-invalid @enderror" type="text" name="set_quick_question_time"
                            id="set_quick_question_time" placeholder="Please enter set quick question time in hours"  value="{{ $quick_question_cost->set_quick_question_time }}">
                        @error('set_quick_question_time')
                            <span class="error invalid-feedback" id="error_set_quick_question_time">{{ $message }}</span>
                        @enderror
                    </div>
                    <!--col-->
                </div>
                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="set_quick_question_time_doctor">Type Quick Question Response Time For Doctor (HRS) <span
                            class="text-danger">*</span></label>

                    <div class="col-md-10">
                        <input class="form-control @error('set_quick_question_time_doctor') is-invalid @enderror" type="text" name="set_quick_question_time_doctor"
                            id="set_quick_question_time_doctor" placeholder="Please enter set quick question response time in hours" value="{{ $quick_question_cost->set_quick_question_time_doctor }}">
                        @error('set_quick_question_time_doctor')
                            <span class="error invalid-feedback" id="error_set_quick_question_time_doctor">{{ $message }}</span>
                        @enderror
                    </div>
                    <!--col-->
                </div>

            </div>
            <div class="card-footer">
                <div class="col text-right">
                    {{-- <a href="{{ url()->previous() }}" class="btn btn-outline-danger"><i
                            class="far fa-arrow-alt-circle-left"></i> Cancel</a> --}}

                    <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Submit</button>


                </div>
            </div>
        </form>
    </div>
    <!-- /.card-body -->

    <!-- /.card-footer-->
</div>
<h4 >Type Quick Question Cost History</h4>
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Start Date</th>
                <th>QQ cost ($)</th>
                <th>End Date</th>
                {{-- <th>Time Duration</th> --}}
            </tr>
        </thead>
        <tbody>
        @foreach ($quick_question_cost_history as $quick_question_cost_hist)

            <tr>
                <td>{{$quick_question_cost_hist->start_date_time}}</td>
                <td>{{$quick_question_cost_hist->costs}}</td>
                <td>{{$quick_question_cost_hist->end_date_time}}</td>
            </tr>
        @endforeach


        </tbody>
    </table>
</div>
<hr />
<h4 >Type Quick Question Accept Time History</h4>
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Start Date</th>
                <th>QQ Question Accept Time (HRs)</th>
                <th>End Date</th>
                {{-- <th>Time Duration</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($accept_time_history as $accept_data)
            <tr>
                <td>{{ $accept_data->start_date_time }}</td>
                <td>{{ $accept_data->accept_time }}</td>
                <td>{{ $accept_data->end_date_time }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<hr />
<h4 >Type Quick Question Response Time History</h4>
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Start Date</th>
                <th>QQ Question Response Time (HRs)</th>
                <th>End Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($response_time_history as $response_data)
                <tr>
                    <td>{{ $response_data->start_date_time }}</td>
                    <td>{{ $response_data->response_time }}</td>
                    <td>{{ $response_data->end_date_time }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
