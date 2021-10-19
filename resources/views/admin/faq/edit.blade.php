@extends('layout.admin_layout')

@section('title', 'admin-dashboard')

@section('body')
@section('header', 'Edit FAQ')
@section('badge')
    <li class="breadcrumb-item"><a href="{{ route('admin.faq') }}">FAQ</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.faq.edit', $faq->id) }}">Edit FAQ</a></li>
@endsection

<div class="card">
    <div class="card-header">
        <h3 class="card-title">FAQ edit</h3>
    </div>
    <div class="card-body">
        <form role="form" action="{{ route('admin.faq.edit', $faq->id) }}" method="POST" enctype="multipart/form-data"
            id="cmsForm">
            {{ csrf_field() }}

            <div class="card-body">

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="name">Question <span
                            class="text-danger">*</span></label>

                    <div class="col-md-10">
                        <input class="form-control @error('question') is-invalid @enderror" type="text"
                            name="question" id="question" placeholder="Please enter question"
                            value="{{ $faq->question }}" readonly>
                        @error('question')
                            <span class="error invalid-feedback" id="error_description">{{ $message }}</span>
                        @enderror
                    </div>
                    <!--col-->
                </div>

                {{-- <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="name">Title<span
                            class="text-danger">*</span></label>

                    <div class="col-md-10">
                        <input class="form-control @error('title') is-invalid @enderror" type="text" name="title"
                            id="title" placeholder="Please enter title" value="{{ $page->title }}">
                        @error('title')
                            <span class="error invalid-feedback" id="error_description">{{ $message }}</span>
                        @enderror
                    </div>
                </div> --}}


                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="description">Answer<span
                            class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <textarea class="form-control @error('answer') is-invalid @enderror" type="text" name="answer"
                            id="answer" placeholder="answer"
                            style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $faq->answer }}</textarea>

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
                    <button type="submit" class="btn btn-outline-primary"><i class="far fa-save"></i> Update</button>
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
