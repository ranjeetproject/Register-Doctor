{{-- @extends('admin.layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('public/plugins/summernote/summernote-bs4.css')}}">

    <div class="content">


        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $heading }}</h3>
            </div>
            <div class="card-body">
                <form role="form" action="{{ ($po == 'pass')? route('admin.home_page_pass.create') : route('admin.home_page_faq.create') }}" method="POST"
                    enctype="multipart/form-data" id="cmsForm">
                    {{ csrf_field() }}


                    <div class="card-body">

                        <div class="form-group row">
                            @if (Session::has('Success'))
                                <div class="col-12 mt-2" style="margin-bottom: 15px;">

                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ Session::get('Success') }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span class="fa fa-times"></span>
                                        </button>
                                    </div>
                                </div>
                            @endif

                            <label class="col-md-2 form-control-label" for="name">Page name <span
                                    class="text-danger">*</span></label>

                            <div class="col-md-10">
                                <input class="form-control @error('name') is-invalid @enderror" type="text"
                                    name="name" id="name" placeholder="Please enter page name"
                                    value="{{ ($po == 'pass')? 'How Kabou work - passanger':'FAQ' }}" readonly>
                                @error('name')
                                    <span class="error invalid-feedback" id="error_description">{{ $message }}</span>
                                @enderror
                            </div>
                            <!--col-->
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="name">{{ ($po == 'faq')? 'Question' : 'Title' }}<span
                                    class="text-danger">*</span></label>

                            <div class="col-md-10">
                                <textarea class="form-control textarea @error('title') is-invalid @enderror" type="text" name="title"
                                    id="title" placeholder="Please enter title" style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                @error('title')
                                    <span class="error invalid-feedback" id="error_description">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="description">{{ ($po == 'faq')? 'Answer' : 'Content' }}<span
                                    class="text-danger">*</span></label>
                            <div class="col-md-10">
                                <textarea class="form-control textarea @error('content') is-invalid @enderror" type="text"
                                    name="content" id="content" placeholder="content"
                                    style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                                @error('content')
                                    <span class="error invalid-feedback" id="error_description">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col text-right">
                            <a href="{{ url()->previous() }}" class="btn btn-outline-danger"><i
                                    class="far fa-arrow-alt-circle-left"></i> Cancel</a>
                            <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->

            <!-- /.card-footer-->
        </div>

    </div>

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.min.js" defer></script>

    <script>

        // jQuery('#datetimepicker7').datetimepicker({
        //     timepicker:false,
        //     formatDate:'Y/m/d',
        //     minDate:'0',//yesterday is minimum date(for today use 0 or -1970/01/01)
        //     // maxDate:'+1970/01/02'//tomorrow is maximum date calendar
        // });

        jQuery('#timepicker').datetimepicker({
            datepicker: false,
            format: 'H:i',
            mask: true,
            step: 5
        });
        $(function () {
            $('.textarea').summernote();
        })
        // CKEDITOR.replace('content');
    </script>

@endpush --}}

@extends('layout.admin_layout')

@section('title', 'admin-dashboard')

@section('body')

@section('header', 'Add FAQ')
@section('badge')
    <li class="breadcrumb-item"><a href="{{ route('admin.faq') }}">FAQ</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.faq.create') }}">Add FAQ</a></li>
@endsection


<div class="card">
    <div class="card-header">
        <h3 class="card-title">FAQ add</h3>
    </div>
    <div class="card-body">
        <form role="form" action="{{ route('admin.faq.create') }}" method="POST" enctype="multipart/form-data"
            id="cmsForm">
            {{ csrf_field() }}


            <div class="card-body">

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="name">Question <span
                            class="text-danger">*</span></label>

                    <div class="col-md-10">
                        <input class="form-control @error('question') is-invalid @enderror" type="text" name="question"
                            id="question" placeholder="Please enter page name" value="{{ old('question') }}">
                        @error('question')
                            <span class="error invalid-feedback" id="error_description">{{ $message }}</span>
                        @enderror
                    </div>
                    <!--col-->
                </div>


                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="description">Answer<span
                            class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <textarea class="form-control @error('answer') is-invalid @enderror" type="text" name="answer"
                            id="answer" placeholder="answer"
                            style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('answer') }}</textarea>
                        @error('answer')
                            <span class="error invalid-feedback" id="error_description">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <div class="col text-right">
                    <a href="{{ url()->previous() }}" class="btn btn-outline-danger"><i
                            class="far fa-arrow-alt-circle-left"></i> Cancel</a>
                    <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Submit</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.card-body -->

    <!-- /.card-footer-->
</div>

@endsection

@push('scripts')
<script type="text/javascript">
    CKEDITOR.replace('content');
</script>
@endpush
