@extends('layout.admin_layout')

@section('title', 'admin-dashboard')

@section('body')
   
          @section('header', 'Add News')
          @section('badge')
           <li class="breadcrumb-item"><a href="{{ route('admin.news') }}">News</a></li>
           <li class="breadcrumb-item"><a href="{{ route('admin.news.create') }}">Add news</a></li>
          @endsection


    <div class="card">
        <div class="card-header">
          <h3 class="card-title">news add</h3>
        </div>
        <div class="card-body">
<form role="form" action="{{ route('admin.news.create') }}" method="POST" enctype="multipart/form-data" id="cmsForm">
        {{csrf_field()}}
        
       
        <div class="card-body">

            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="name">Heading <span class="text-danger">*</span></label>

                <div class="col-md-10">
                       <input class="form-control @error('heading') is-invalid @enderror"
                           type="text" name="heading" id="heading"
                           placeholder="Please enter news heading"
                           maxlength="191" value="{{old('heading')}}">
@error('heading')
    <span class="error invalid-feedback" id="error_description">{{ $message }}</span>
@enderror
                </div><!--col-->
            </div>

<div class="form-group row">
<label class="col-md-2 form-control-label" for="name">News Type <span class="text-danger">*</span></label>

<div class="col-md-10">
   <input class="form-control @error('news_type') is-invalid @enderror"
       type="text" name="news_type" id="news_type"
       placeholder="Please enter news news type"
       maxlength="191" value="{{old('news_type')}}">
@error('news_type')
<span class="error invalid-feedback" id="error_description">{{ $message }}</span>
@enderror
</div>
</div>


<div class="form-group row">
  <label class="col-md-2 form-control-label" for="description">Content<span class="text-danger">*</span></label>
  <div class="col-md-10">
    <textarea class="form-control textarea @error('content') is-invalid @enderror"
    type="text" name="content" id="content" placeholder="content"  style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" 
    >{{old('content')}}</textarea>
    @error('content')
    <span class="error invalid-feedback" id="error_description">{{ $message }}</span>
    @enderror
  </div>
</div>
            
        </div>
        <div class="card-footer">
            <div class="col text-right">
               <a href="{{ url()->previous()}}" class="btn btn-outline-danger"><i class="far fa-arrow-alt-circle-left"></i> Cancel</a>
                <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Submit</button>
            </div>
        </div>
    </form>
        </div>
        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>

@endsection