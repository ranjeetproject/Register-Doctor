@extends('layout.admin_layout')

@section('title', 'admin-dashboard')

@section('body')
@section('header', 'Commission')
@section('badge')
    <li class="breadcrumb-item"><a href="{{ route('admin.commission') }}">Commission</a></li>
@endsection

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Commission</h3>
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col-md-4 offset-4">
                <form method="post" action="{{ route('admin.commission') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Commission(%)</label>
                        <input type="text" name="commission" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>

            </div>
        </div>

    </div>
    <!-- /.card-body -->

    <!-- /.card-footer-->
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Commission history</h3>
    </div>
    <div class="cart-body">
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Commission (%)</th>
                            <th>Start date</th>
                            <th>End Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($commissions as $commission)
                            <tr>
                                <td>{{ $commission->commission }}</td>
                                <td>{{ $commission->start_date }}</td>
                                <td>{{ $commission->end_date }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">No record found</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection
