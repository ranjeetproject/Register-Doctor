@extends('layout.admin_layout')

@section('title', 'admin-dashboard')

@section('body')
          @section('header', 'Living advice')
          @section('badge')
           <li class="breadcrumb-item"><a href="{{ route('admin.living_advice') }}">Living advice</a></li>
          @endsection

    <!-- /.col -->

          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Living advice list</h3>

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
                <form action="{{ route('admin.living_advice.delete') }}" method="post">
                          @csrf

              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" data-toggle="tooltip" title="Select All" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
                <div class="btn-group">
                  <button type="submit" onclick="return confirm('Are you sure want to delete?');" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete"><i class="far fa-trash-alt"></i></button>
               {{--    <a href="" class="btn btn-default btn-sm"><i class="fas fa-eye"></i></a>
                  <a href="" class="btn btn-default btn-sm"><i class="fas fa-edit"></i></a> --}}
                  <a href="" data-toggle="tooltip" title="Refresh" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></a>
                </div>
                  <a href="{{ route('admin.living_advice.create') }}" data-toggle="tooltip" title="Add new living advice" class="btn btn-primary btn-sm"><i class="fas fa-plus-square"></i> New</a>
                <!-- /.btn-group -->


                <!-- /.float-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table id="example2" class="table table-hover table-striped">

                  <thead>
                  <tr>
                    <th># No</th>
                    <th>Heading</th>
                    <th>Content</th>
                    <th>Created date</th>
                    <th></th>
                  </tr>
                  </thead>

                  <tbody id="search_result">
                    @forelse ($news as $news)
                      <tr>
                         <tr onmouseover="showActionBtn('{{ $loop->iteration }}');" onmouseout="hideActionBtn('{{ $loop->iteration }}')">

                        <td>
                      <div class="icheck-primary">
                        <input type="checkbox" name="news_id[]" value="{{ $news->id }}" id="check{{ $loop->iteration }}">
                        <label for="check{{ $loop->iteration }}">#{{ $loop->iteration }}</label>
                      </div>
                    </td>
                        <td>{{ $news->heading }}</td>
                        <td>{!! $news->content !!}</td>
                        <td>{{ date('M-d-Y H:i:s',strtotime($news->created_at)) }}</td>
                        <td>
                        {{-- <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.news', $news->id) }}"> <i class="fas fa-eye"></i> View</a> --}}
                        <a class="btn btn-sm btn-outline-warning" href="{{ route('admin.living_advice.edit', $news->id) }}"> <i class="fas fa-edit"></i> Edit</a>
                        <a class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure want to delete?');" href="{{ route('admin.living_advice.delete', $news->id) }}"> <i class="fas fa-trash-alt"></i> Delete</a>

                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="4" class="text-center">No data found.</td>
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
