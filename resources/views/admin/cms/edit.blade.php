@extends('layout.admin_layout')

@section('title', 'admin-dashboard')

@section('body')
          @section('header', 'Edit Page')
         @section('badge')
           <li class="breadcrumb-item"><a href="{{ route('admin.cms') }}">CMS</a></li>
           <li class="breadcrumb-item"><a href="{{ route('admin.cms.edit',$page->id) }}">Edit page</a></li>
          @endsection

    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Page edit</h3>
        </div>
        <div class="card-body">
<form role="form" action="{{ route('admin.cms.edit',$page->id) }}" method="POST" enctype="multipart/form-data" id="cmsForm">
        {{csrf_field()}}

        <div class="card-body">

            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="name">Page name <span class="text-danger">*</span></label>

                <div class="col-md-10">
                       <input class="form-control @error('page_name') is-invalid @enderror"
                           type="text" name="page_name" id="page_name"
                           placeholder="Please enter page name"
                            value="{{$page->page_name}}" readonly>
@error('page_name')
    <span class="error invalid-feedback" id="error_description">{{ $message }}</span>
@enderror
                </div><!--col-->
            </div>

<div class="form-group row">
<label class="col-md-2 form-control-label" for="name">Title<span class="text-danger">*</span></label>

<div class="col-md-10">
   <input class="form-control @error('title') is-invalid @enderror"
       type="text" name="title" id="title"
       placeholder="Please enter title"
      value="{{$page->title}}">
@error('title')
<span class="error invalid-feedback" id="error_description">{{ $message }}</span>
@enderror
</div>
</div>


<div class="form-group row">
  <label class="col-md-2 form-control-label" for="description">Content<span class="text-danger">*</span></label>
  <div class="col-md-10">
    <textarea class="form-control @error('content') is-invalid @enderror"
    type="text" name="content" id="content" placeholder="content"  style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
    >{{$page->content}}</textarea>

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
@push('scripts')
<script type="text/javascript">


CKEDITOR.editorConfig = function( config ) {
	// config.toolbarGroups = [
	// 	{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
	// 	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
	// 	{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
	// 	{ name: 'forms', groups: [ 'forms' ] },
	// 	'/',
	// 	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
	// 	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
	// 	{ name: 'links', groups: [ 'links' ] },
	// 	{ name: 'insert', groups: [ 'insert' ] },
	// 	'/',
	// 	{ name: 'styles', groups: [ 'styles' ] },
	// 	{ name: 'colors', groups: [ 'colors' ] },
	// 	{ name: 'tools', groups: [ 'tools' ] },
	// 	{ name: 'others', groups: [ 'others' ] },
	// 	{ name: 'about', groups: [ 'about' ] }
	// ];

	// config.removeButtons = 'Styles,Save,NewPage,ExportPdf,Preview,Print,Templates,Find,Replace,SelectAll,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,BidiLtr,BidiRtl,Language,Flash,PageBreak,ShowBlocks';
};
CKEDITOR.replace('content');
</script>
 @endpush
