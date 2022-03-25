@extends('layout.admin_layout')

@section('title', 'admin-dashboard')

@section('body')

@section('header', 'Id Verify Difference Day')
@section('badge')
    <li class="breadcrumb-item"><a href="{{ route('admin.setIdVerifyDifference') }}"> Id Verify Difference Day</a></li>
@endsection


<div class="card">
    <div class="card-header">
        <h3 class="card-title">Id Verify Difference Day</h3>
    </div>
    <div class="card-body">
        <form role="form" action="{{route('admin.setIdVerifyDifference')}}" method="POST" id="cmsForm">
            {{ csrf_field() }}
            <div class="card-body">

                <div class="form-group row">
                    <label class="col-md-3 form-control-label" for="set_quick_question_cost">Difference Day ( Days )<span
                            class="text-danger">*</span></label>

                    <div class="col-md-9">
                        <input class="form-control @error('diff_day') is-invalid @enderror" type="text" name="diff_day"
                            placeholder="Please enter id vrification day" value="{{ $genPres ? $genPres->diff_day:'' }}">
                        @error('diff_day')
                            <span class="error invalid-feedback" id="error_set_quick_question_cost">{{ $message }}</span>
                        @enderror
                    </div>

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

@endsection
