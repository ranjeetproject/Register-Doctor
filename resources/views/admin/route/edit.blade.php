@extends('layout.admin_layout')

@section('title', 'admin-dashboard')

@section('body')
@section('header', 'Edit Routes')
@section('badge')
    <li class="breadcrumb-item"><a href="{{ route('admin.route') }}">Routes</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.route-edit',$routes->id) }}">Edit Routes</a></li>
@endsection

<div class="card">
    <div class="card-header">
         <h3 class="card-title">Edit Routes</h3>
    </div>
    <div class="card-body">
        <form role="form" action="{{route('admin.route-update', $routes->id)}}" method="POST"
             id="cmsForm">
            {{ csrf_field() }}

            <div class="card-body">

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="route_name">Route Name <span
                            class="text-danger">*</span></label>

                    <div class="col-md-10">
                        <input class="form-control @error('route_name') is-invalid @enderror" type="text" name="route_name"
                            id="route_name" placeholder="Please enter specialty" value="{{ $routes->route_name }}">
                        @error('route_name')
                            <span class="error invalid-feedback" id="error_route_name">{{ $message }}</span>
                        @enderror
                    </div>
                    <!--col-->
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
