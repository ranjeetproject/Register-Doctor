@extends('layout.admin_layout')

@section('title', 'admin-dashboard')

@section('body')
@section('header', 'Edit Page')
@section('badge')
    <li class="breadcrumb-item"><a href="{{ route('admin.home_page_banner') }}">CMS</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.home_page_banner.edit', $page->id) }}">Edit page</a></li>
@endsection

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Page edit</h3>
    </div>
    <div class="card-body">
        <form role="form" action="{{ route('admin.home_page_banner.edit', $page->id) }}" method="POST"
            enctype="multipart/form-data" id="cmsForm">
            {{ csrf_field() }}

            <div class="card-body">
                @if($page->image != '')
                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="name"></label>

                    <div class="col-md-10">
                       <img src="{{ asset('public/uploads/banner/'.$page->image) }}" alt="">
                    </div>
                </div>
                @endif

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="name">Image<span
                            class="text-danger">*</span></label>

                    <div class="col-md-10">
                        <input class="form-control @error('image') is-invalid @enderror" type="text" name="image"
                            id="image" placeholder="Please enter image" value="{{ $page->image }}">
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
                            style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $page->content }}</textarea>

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
