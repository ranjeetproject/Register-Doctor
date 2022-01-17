@extends('frontend.pharmacist.afterloginlayout.app')

@section('content')
    <div class="col Choose-Your-Doctor-right innerpage  Handy-Documents-page">
        <div class="row">
            <div class="col-sm-12">
                <div class="col Incoming-Prescription-Requests-right">
                    <h2>Handy Documents</h2>
                    <div class="for-w-100 Incoming-Prescription-Requests-right-table">
                        <h3>Documents</h3>
                        <div class="row">
                            {{-- <div class="col-sm-8">
                                <form class="form-inline">
                                    <div class="form-group">
                                      <label>Show</label>
                                      <select class="form-control">
                                        <option>10</option>
                                      </select>
                                      <span>entries</span>
                                    </div>
                                  </form>
                            </div>
                            <div class="col-sm-4">
                                <form action="">
                                    <input type="text"  class="form-control"  placeholder="Search...">
                                </form>
                            </div> --}}

                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table class="table">
                                      <thead>
                                          <tr>
                                              <td>Topic Name </td>
                                              <td>Date</td>
                                              <td>Action</td>
                                          </tr>
                                      </thead>
                                      <tbody>



                                          @forelse($handy_docs as $handy_doc)
                                            <tr>
                                                <td>{{ $handy_doc->topic_name }}</td>
                                                <td>{{ date('d M Y', strtotime($handy_doc->created_at)) }}</td>
                                                <td class="for-divider">
                                                    @if ($handy_doc->file_name)
                                                        <a href="{{ route('pharmacist.view-handy-document',['id'=>$handy_doc->id]) }}"><i class="fal fa-eye"></i></a>
                                                        <a href="{{ route('download.handy_doc',['id'=>encrypt($handy_doc->id)]) }}"><i class="fal fa-cloud-download"></i></a>
                                                    @else
                                                        <a href="{{ $handy_doc->website }}" target="_blank"><i class="fal fa-eye"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="3">No data found</td>

                                            </tr>

                                          @endforelse


                                      </tbody>
                                    </table>
                                  </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                {{-- <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-end">
                                      <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                      </li>
                                      <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                                      <li class="page-item clickabled">
                                        <a class="page-link" href="#">Next</a>
                                      </li>
                                    </ul>
                                </nav> --}}
                                {{ $handy_docs->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>

    </script>
@endsection
