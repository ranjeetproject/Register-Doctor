@extends('layout.admin_layout')

@section('title', 'admin-dashboard')

@section('body')

@section('header', 'Add Home page Banner')
@section('badge')
    <li class="breadcrumb-item"><a href="{{ route('admin.home_page_banner') }}">Home page Banner</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.home_page_banner.create') }}">Add Home page Banner</a></li>
@endsection


<div class="card">
    <div class="card-header">
        <h3 class="card-title">Home page Banner add</h3>
    </div>
    <div class="card-body">
        <form role="form" action="{{ route('admin.home_page_banner.create') }}" method="POST"
            enctype="multipart/form-data" id="cmsForm">
            {{ csrf_field() }}


            <div class="card-body">

                {{-- <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="name">Page name <span
                            class="text-danger">*</span></label>

                    <div class="col-md-10">
                        <input class="form-control @error('page_name') is-invalid @enderror" type="text"
                            name="page_name" id="page_name" placeholder="Please enter page name"
                            value="{{ old('page_name') }}">
                        @error('page_name')
                            <span class="error invalid-feedback" id="error_description">{{ $message }}</span>
                        @enderror
                    </div>
                    <!--col-->
                </div> --}}

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="name">Image<span
                            class="text-danger">*</span></label>

                    <div class="col-md-10">
                        <input class="form-control @error('image') is-invalid @enderror" type="file" name="image"
                            id="image" required>
                        @error('image')
                            <span class="error invalid-feedback" id="error_description">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="description">Content<span
                            class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <textarea class="form-control @error('content') is-invalid @enderror" type="text" name="content"
                            id="content" placeholder="content"
                            style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('content') }}</textarea>
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

@endsection

@push('scripts')
<script type="text/javascript">
    CKEDITOR.replace('content');
</script>
@endpush
