@extends('layout.admin_layout')

@section('title', 'admin-dashboard')

@section('body')

@section('header', 'General Prescription Cost And Commission')
@section('badge')
    <li class="breadcrumb-item"><a href="{{ route('admin.gen_pres_commission') }}"> General Prescription Cost And Commission</a></li>
@endsection


<div class="card">
    <div class="card-header">
        <h3 class="card-title">General Prescription Cost And Commission</h3>
    </div>
    <div class="card-body">
        <form role="form" action="{{route('admin.gen_pres_commission')}}" method="POST" id="cmsForm">
            {{ csrf_field() }}
            <div class="card-body">

                <div class="form-group row">
                    <label class="col-md-3 form-control-label" for="set_quick_question_cost">General Prescription Cost ( <i class="fas fa-pound-sign"></i> )<span
                            class="text-danger">*</span></label>

                    <div class="col-md-9">
                        <input class="form-control @error('cost') is-invalid @enderror" type="text" name="cost"
                            placeholder="Please enter set quick question cost" value="{{ $genPres ? $genPres->cost:'' }}">
                        @error('cost')
                            <span class="error invalid-feedback" id="error_set_quick_question_cost">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label" for="set_quick_question_time">Admin Commission (%) <span
                            class="text-danger">*</span></label>

                    <div class="col-md-9">
                        <input class="form-control @error('commission') is-invalid @enderror" type="text" name="commission"
                            id="commission" placeholder="Please enter set quick question time in hours"  value="{{ $genPres ? $genPres->commission:'' }}">
                        @error('commission')
                            <span class="error invalid-feedback" id="error_set_quick_question_time">{{ $message }}</span>
                        @enderror
                    </div>
                    <!--col-->
                </div>

            </div>
            <div class="card-footer">
                <div class="col text-right">
                    <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Submit</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.card-body -->

    <!-- /.card-footer-->
</div>
{{-- <h4 >Type Quick Question Cost History</h4>
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Start Date</th>
                <th>QQ cost ( <i class="fas fa-pound-sign"></i> )</th>
                <th>End Date</th>
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
</div> --}}

@endsection
