@extends('layout.admin_layout')

@section('title', 'admin-dashboard')

@section('body')
          @section('header', 'Edit News')
         @section('badge')
           <li class="breadcrumb-item"><a href="{{ route('admin.news') }}">News</a></li>
           <li class="breadcrumb-item"><a href="{{ route('admin.news.edit',$news->id) }}">Edit news</a></li>
          @endsection
   
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">News edit</h3>
        </div>
        <div class="card-body">
<form role="form" action="{{ route('admin.news.edit',$news->id) }}" method="POST" enctype="multipart/form-data" id="cmsForm">
        {{csrf_field()}}
        
        <div class="card-body">

            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="name">Heading <span class="text-danger">*</span></label>

                <div class="col-md-10">
                       <input class="form-control @error('heading') is-invalid @enderror"
                           type="text" name="heading" id="heading"
                           placeholder="Please enter news heading"
                            value="{{$news->heading}}">
@error('heading')
    <span class="error invalid-feedback" id="error_description">{{ $message }}</span>
@enderror
                </div><!--col-->
            </div>

<div class="form-group row">
<label class="col-md-2 form-control-label" for="name">News Type </label>

<div class="col-md-10">
   <input class="form-control @error('news_type') is-invalid @enderror"
       type="text" name="news_type" id="news_type"
       placeholder="Please enter news news type"
      value="{{$news->news_type}}">
@error('news_type')
<span class="error invalid-feedback" id="error_description">{{ $message }}</span>
@enderror
</div>
</div>


<div class="form-group row">
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
</div>



<div class="form-group row">


<label class="col-md-2 form-control-label" for="name">Image </label>
@if(!empty($news->image))
<img width="100px" height="100px" src="{{asset('public/uploads/news/'.$news->image)}}">
<br>
@endif

<div class="col-md-10">
   <input class="form-control @error('image') is-invalid @enderror"
       type="file" name="image" id="image">
@error('image')
<span class="error invalid-feedback" id="error_description">{{ $message }}</span>
@enderror
</div>
</div>


<div class="form-group row">
  <label class="col-md-2 form-control-label" for="description">Content<span class="text-danger">*</span></label>
  <div class="col-md-10">
    <textarea class="form-control textarea @error('content') is-invalid @enderror"
    type="text" name="content" id="content" placeholder="content"  style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" 
    >{{$news->content}}</textarea>
   
    @error('content')
    <span class="error invalid-feedback" id="error_description">{{ $message }}</span>
    @enderror
  </div>
</div>
            
        </div>

        <div class="card-footer">
            <div class="col text-right">
                <a href="{{ url()->previous()}}" class="btn btn-outline-danger"><i class="far fa-arrow-alt-circle-left"></i> Cancel</a>
                <button type="submit" class="btn btn-outline-primary"><i class="far fa-save"></i> Update</button>
            </div>
        </div>
    </form>
        </div>
        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>

@endsection