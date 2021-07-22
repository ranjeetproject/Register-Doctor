@extends('layout.admin_layout')

@section('title', 'admin-dashboard')

@section('body')
@section('header', 'Contact Us')
@section('badge')
    <li class="breadcrumb-item"><a href="{{ route('admin.c_us') }}">Contact Us</a></li>
@endsection

<!-- /.col -->

<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">Contact Us list</h3>

        <div class="card-tools">
            <form action="" method="GET">
                <div class="input-group input-group-sm">
                    <input type="text" name="search" class="form-control" placeholder="Search">
                    <div class="input-group-append">
                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>

                    </div>
                </div>
            </form>

        </div>
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <form action="{{ route('admin.c_us.delete') }}" method="post">
            @csrf

            <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" data-toggle="tooltip" title="Select All"
                    class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
                <div class="btn-group">
                    <button type="submit" onclick="return confirm('Are you sure want to delete?');"
                        class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete"><i
                            class="far fa-trash-alt"></i></button>
                    {{-- <a href="" class="btn btn-default btn-sm"><i class="fas fa-eye"></i></a>
                  <a href="" class="btn btn-default btn-sm"><i class="fas fa-edit"></i></a> --}}
                    <a href="" data-toggle="tooltip" title="Refresh" class="btn btn-default btn-sm"><i
                            class="fas fa-sync-alt"></i></a>
                </div>
                {{-- <a href="{{ route('admin.h_doc.create') }}" data-toggle="tooltip" title="Add new user"
                    class="btn btn-primary btn-sm"><i class="fas fa-plus-square"></i> New</a> --}}
                <!-- /.btn-group -->


                <!-- /.float-right -->
            </div>
            <div class="table-responsive mailbox-messages">
                <table id="example2" class="table table-hover table-striped">

                    <thead>
                        <tr>
                            <th># No</th>
                            <th>Name</th>
                            <th>Contact No</th>
                            <th>Email id</th>
                            <th>Comment</th>
                            <th>Created date</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody id="search_result">
                        @forelse ($con_ts as $con_t)
                            <tr>
                            <tr onmouseover="showActionBtn('{{ $loop->iteration }}');"
                                onmouseout="hideActionBtn('{{ $loop->iteration }}')">

                                <td>
                                    <div class="icheck-primary">
                                        <input type="checkbox" name="con_t_id[]" value="{{ $con_t->id }}"
                                            id="check{{ $loop->iteration }}">
                                        <label for="check{{ $loop->iteration }}">#{{ $loop->iteration }}</label>
                                    </div>
                                </td>
                                <td>{{ $con_t->name }}</td>
                                <td>
                                    {{ $con_t->contact_no }}
                                </td>
                                <td>
                                    {{ $con_t->email_id }}
                                </td>
                                <td>
                                    {{ $con_t->comment }}
                                </td>
                                <td>{{ date('M-d-Y H:i:s', strtotime($con_t->created_at)) }}</td>
                                <td>
                                    {{-- <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.con_t', $con_t->id) }}"> <i class="fas fa-eye"></i> View</a> --}}
                                    {{-- <a class="btn btn-sm btn-outline-warning"
                                        href="{{ route('admin.con_t.edit', $con_t->id) }}"> <i
                                            class="fas fa-edit"></i> Edit</a> --}}
                                    <a class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Are you sure want to delete?');"
                                        href="{{ route('admin.c_us.delete', $con_t->id) }}"> <i
                                            class="fas fa-trash-alt"></i> Delete</a>

                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No data found.</td>
                                </tr>
                            @endforelse

                        </tbody>


                    </table>
                    <!-- /.table -->
                </div>
                <!-- /.mail-box-messages -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer p-0">
            <div class="mailbox-controls">

                <div class="float-right">

                    <div class="btn-group">
                        {{-- {{ $users->onEachSide(1)->links() }} --}}
                    </div>
                    <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
            </div>
        </div>
        </form>
    </div>
    <!-- /.card -->

    <!-- /.col -->


@endsection
@push('scripts')

@endpush
