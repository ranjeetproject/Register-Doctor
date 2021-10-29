@extends('layout.admin_layout')

@section('title', 'admin-dashboard')

@section('body')

         @section('header', 'User View')
          @section('badge')
           <li class="breadcrumb-item"><a href="{{ route('admin.users', $user->role) }}">Users</a></li>
           <li class="breadcrumb-item"><a href="{{ route('admin.user.view', $user->id) }}">User view</a></li>
          @endsection

    <div class="row">
          <div class="col-md-12">

<!-- Widget: user widget style 1 -->
<div class="card card-widget widget-user">
  <!-- Add the bg color to the header using any of the bg-* classes -->
  <div class="widget-user-header text-white"
    style="background: url('{{ asset('dist/img/photo1.png')}}') center center;">
    {{-- <h3 class="widget-user-username text-right">Elizabeth Pierce</h3> --}}
    <h3 class="widget-user-desc text-right">{{ $user->name}}</h3>
  </div>
  <div class="widget-user-image">
    <img class="img-circle" src="{{ $user->profile->profile_photo }}" alt="User Avatar">
  </div>

  <div class="card-footer">
    <div class="row">

      <div class="col-sm-4 border-right">
        <div class="description-block">
        {{--   <h5 class="description-header"> </h5>
          <span class="description-text">PINGS</span> --}}
        </div>
      </div>


      <div class="col-sm-4 border-right">
        <div class="description-block">
         <span class="description-text"> {{ $user->name}}</span>
        </div>
      </div>


      <div class="col-sm-4">
        <div class="description-block">
         <span class="btn btn-group">
            <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-sm btn-info mt-2">
              <i class="fas fa-edit"></i>  Edit
            </a>
            <a onclick="return confirm('Are you sure want to delete?');" href="{{ route('admin.user.delete', $user->id) }}" class="btn btn-sm btn-danger mt-2 ml-1">
              <i class="fas fa-trash"></i>  Delete
            </a>
            @if ($user->role == 2)
            @if ($user->slide_status == 1)
            <a onclick="return confirm('Are you sure remove this doctor form slide?');" href="{{ route('admin.user.remove_slide', $user->id) }}" class="btn btn-sm btn-warning mt-2 ml-1">
                <i class="fas fa-times"></i> Remove For Slide
              </a>
              @else
              <a onclick="return confirm('Are you sure add this doctor for slide?');" href="{{ route('admin.user.set_slide', $user->id) }}" class="btn btn-sm btn-success mt-2 ml-1">
                <i class="fas fa-plus"></i>  Add For Slide
                {{-- <i class="fas fa-plus"></i> --}}
              </a>
            @endif


            @endif
          </span>
        </div>
      </div>


    </div>
    <!-- /.row -->


    <div class="card-footer p-0">
      <ul class="nav flex-column">

        <li class="nav-item">
          <a href="mailto:{{$user->email}}" class="nav-link">
            <strong><i class="fas fa-envelope mr-1"></i> Email : {{ $user->email}}</strong>
          </a>
        </li>

        <li class="nav-item">
          <a href="tel:{{ $user->profile->mobile}}" class="nav-link">
            <strong><i class="fas fa-mobile mr-1"></i> Telephone : {{ $user->profile->mobile}}</strong>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <strong><i class="fas fa-calendar mr-1"></i> DOB : {{ $user->profile->dob}}</strong>
          </a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <strong><i class="far fa-file-alt mr-1"></i> Sex : {{ $user->profile->gender}}</strong>
            {{-- <p class="text-muted">{{ $user->profile->gender}}</p> --}}
          </a>
        </li>

        <li class="nav-item">
          <a href="https://www.google.com/maps/place/{{ $user->profile->address}}" class="nav-link" target="_blank">
            <strong><i class="fas fa-book mr-1"></i> Address : {{ $user->profile->address}}  </strong>
          </a>
        </li>


      </ul>

    </div>
  </div>
</div>

<div class="card">
  <div class="card-header">
    Other information
  </div>
  <div class="card-body">

    <div class="row">
      <div class="col">
        <label>Location: {{ $user->profile->location}}</label>
      </div>
       <div class="col">
        <label>Contact number: {{ $user->profile->telephone1}}</label>
      </div>
      <div class="col">
        <label>GMC licence: </label> <br><img src="{{ asset('public/uploads/users/dr_gmc_licence/'.$user->profile->dr_gmc_licence)}}" width="100px" height="100px">
      </div>
    </div>


  </div>
</div>

<!-- /.widget-user -->

        </div>
      </div>

@endsection
