@extends('layout.admin_layout')

@section('title', 'admin-dashboard')

@section('body')

@section('header', 'Add Set Quick Question Cost')
@section('badge')
    <li class="breadcrumb-item"><a href="{{ route('admin.create-set_quick_question_cost') }}">Add Set Quick Question Cost</a></li>
@endsection


<div class="card">
    <div class="card-header">
        <h3 class="card-title">Set Quick Question Cost Add</h3>
    </div>
    <div class="card-body">
    @if(@$quick_question_cost->id)
        <form role="form" action="{{route('admin.set_quick_question_cost-update',$quick_question_cost->id)}}" method="POST" enctype="multipart/form-data"
            id="cmsForm">
            {{ csrf_field() }}
    @else
        <form role="form" action="{{route('admin.save-set_quick_question_cost')}}" method="POST" enctype="multipart/form-data"
            id="cmsForm">
            {{ csrf_field() }}
    @endif

            <div class="card-body">

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="set_quick_question_cost">Set Quick Question Cost <span
                            class="text-danger">*</span></label>

                    <div class="col-md-10">
                        <input class="form-control @error('set_quick_question_cost') is-invalid @enderror" type="text" name="set_quick_question_cost"
                            id="set_quick_question_cost" placeholder="Please enter set quick question cost"
                            value="{{ @$quick_question_cost->set_quick_question_cost }}">
                        @error('set_quick_question_cost')
                            <span class="error invalid-feedback" id="error_set_quick_question_cost">{{ $message }}</span>
                        @enderror
                    </div>
                    <!--col-->
                </div>

            </div>
            <div class="card-footer">
                <div class="col text-right">
                    {{-- <a href="{{ url()->previous() }}" class="btn btn-outline-danger"><i
                            class="far fa-arrow-alt-circle-left"></i> Cancel</a> --}}
                    @if(@$quick_question_cost->id)
                    <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Update</button>
                    @else
                    <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Submit</button>
                    @endif

                </div>
            </div>
        </form>
    </div>
    <!-- /.card-body -->

    <!-- /.card-footer-->
</div>

@endsection
