@extends('layout.admin_layout')

@section('title', 'admin-dashboard')

@section('body')
   @section('header', 'Dashboard')
    {{-- @section('badge', '') --}}
    <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>00</h3>

                <p>Doctor</p>
              </div>
              <div class="icon">
                <i class="nav-icon fa fa-user-md" aria-hidden="true"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>00<sup style="font-size: 20px"></sup></h3>

                <p>Patients</p>
              </div>
              <div class="icon">
              <i class="nav-icon fa fa-male" aria-hidden="true"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>00</h3>

                <p>Pharmacy</p>
              </div>
              <div class="icon">
              <i class="nav-icon fa fa-flask" aria-hidden="true"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          {{-- <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> --}}
          <!-- ./col -->
        </div>

@endsection