@extends('layout.admin_layout')

@section('title', 'admin-dashboard')

@section('body')
@section('header', 'Edit Handy document')
@section('badge')
    <li class="breadcrumb-item"><a href="{{ route('admin.h_doc') }}">Handy document</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.h_doc.edit', $h_doc->id) }}">Edit Handy document</a></li>
@endsection

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Handy document edit</h3>
    </div>
    <div class="card-body">
        <form role="form" action="{{ route('admin.h_doc.edit', $h_doc->id) }}" method="POST"
            enctype="multipart/form-data" id="cmsForm">
            {{ csrf_field() }}

            <div class="card-body">

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="name">Heading <span
                            class="text-danger">*</span></label>

                    <div class="col-md-10">
                        <input class="form-control @error('topic_name') is-invalid @enderror" type="text" name="topic_name"
                            id="topic_name" placeholder="Please enter news topic name" value="{{ $h_doc->topic_name }}">
                        @error('topic_name')
                            <span class="error invalid-feedback" id="error_description">{{ $message }}</span>
                        @enderror
                    </div>
                    <!--col-->
                </div>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="name">User Type <span
                        class="text-danger">*</span></label>

                    <div class="col-md-10">
                        {{-- <input class="form-control @error('user_type') is-invalid @enderror" type="text"
                            name="user_type" id="user_type" placeholder="Please enter user type"
                            value="{{ $h_doc->user_role }}"> --}}
                        <select name="user_type" id="user_type"
                            class="form-control @error('user_type') is-invalid @enderror" required>
                            <option value="">Select user type</option>
                            <option value="1" {{ ($h_doc->user_role==1)? "selected":'' }}>Patients</option>
                            <option value="2" {{ ($h_doc->user_role==2)? "selected":'' }}>Doctor</option>
                            <option value="3" {{ ($h_doc->user_role==3)? "selected":'' }}>Pharmacy</option>
                        </select>

                        @error('user_type')
                            <span class="error invalid-feedback" id="error_description">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                {{-- <div class="form-group row">
<label class="col-md-2 form-control-label" for="name">Posted By </label>

<div class="col-md-10">
   <input class="form-control @error('posted_by') is-invalid @enderror"
       type="text" name="posted_by" id="posted_by"
       placeholder="Posted by"
       maxlength="191" value="{{$news->posted_by}}">
@error('posted_by')
<span class="error invalid-feedback" id="error_description">{{ $message }}</span>
@enderror
</div>
</div> --}}



                <div class="form-group row">


                    <label class="col-md-2 form-control-label" for="name">Document </label>
                    @if (!empty($h_doc->file_name))
                        {{-- <img width="100px" height="100px" src="{{ asset('public/uploads/news/' . $h_doc->file_name) }}"> --}}
                        <embed src="{{ asset('public/uploads/handydoc/' . $h_doc->file_name) }}" width="600px" height="100px" />
                        <br>
                    @endif

                    <div class="col-md-10">
                        <input class="form-control @error('document') is-invalid @enderror" type="file" name="document"
                            id="document" accept="application/pdf">
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
                            style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $news->content }}</textarea>

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
                    <button type="submit" class="btn btn-outline-primary"><i class="far fa-save"></i> Update</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.card-body -->

    <!-- /.card-footer-->
</div>

@endsection
