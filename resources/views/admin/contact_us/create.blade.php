@extends('layout.admin_layout')

@section('title', 'admin-dashboard')

@section('body')

@section('header', 'Add Handy Document')
@section('badge')
    <li class="breadcrumb-item"><a href="{{ route('admin.h_doc') }}">Handy Document</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.h_doc.create') }}">Add Handy Document</a></li>
@endsection


<div class="card">
    <div class="card-header">
        <h3 class="card-title">Handy Document add</h3>
    </div>
    <div class="card-body">
        <form role="form" action="{{ route('admin.h_doc.create') }}" method="POST" enctype="multipart/form-data"
            id="cmsForm">
            {{ csrf_field() }}


            <div class="card-body">

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="topic_name">Topic Name <span
                            class="text-danger">*</span></label>

                    <div class="col-md-10">
                        <input class="form-control @error('topic_name') is-invalid @enderror" type="text" name="topic_name"
                            id="topic_name" placeholder="Please enter topic name" maxlength="191"
                            value="{{ old('topic_name') }}" required>
                        @error('topic_name')
                            <span class="error invalid-feedback" id="error_description">{{ $message }}</span>
                        @enderror
                    </div>
                    <!--col-->
                </div>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="name">user type <span
                        class="text-danger">*</span></label>

                    <div class="col-md-10">
                        {{-- <input class="form-control @error('news_type') is-invalid @enderror"
       type="text" name="news_type" id="news_type"
       placeholder="Please enter news type"
       maxlength="191" value="{{old('news_type')}}"> --}}
                        <select name="user_type" id="user_type"
                            class="form-control @error('user_type') is-invalid @enderror" required>
                            <option value="">Select user type</option>
                            <option value="0">Patients</option>
                            <option value="1">Doctor</option>
                            <option value="2">Pharmacy</option>
                        </select>
                        @error('user_type')
                            <span class="error invalid-feedback" id="error_description">{{ $message }}</span>
                        @enderror
                    </div>
                </div>



                {{-- <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="name">Posted By </label>

                    <div class="col-md-10">
                        <input class="form-control @error('posted_by') is-invalid @enderror" type="text"
                            name="posted_by" id="posted_by" placeholder="Posted by" maxlength="191"
                            value="{{ old('posted_by') }}">
                        @error('posted_by')
                            <span class="error invalid-feedback" id="error_description">{{ $message }}</span>
                        @enderror
                    </div>
                </div> --}}


                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="name">Document <span
                        class="text-danger">*</span> </label>

                    <div class="col-md-10">
                        <input class="form-control @error('document') is-invalid @enderror" type="file" name="document"
                            id="document" accept="application/pdf" required>
                        @error('document')
                            <span class="error invalid-feedback" id="error_description">{{ $message }}</span>
                        @enderror
                    </div>
                </div>




                {{-- <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="description">Content<span
                            class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <textarea class="form-control textarea @error('content') is-invalid @enderror" type="text"
                            name="content" id="content" placeholder="content"
                            style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('content') }}</textarea>
                        @error('content')
                            <span class="error invalid-feedback" id="error_description">{{ $message }}</span>
                        @enderror
                    </div>
                </div> --}}

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
