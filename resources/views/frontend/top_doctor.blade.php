@extends('frontend.beforeloginlayout.app')

@section('content')

    <section class="for-w-100 main-content innerpage  top-doctor-page">
        <div class="container">
            <h1 class="inner-page-title">Top Doctors</h1>
            <ul class="top-doctor-warning-info">
                <li>We asked doctors which specialist they would recommend to friends or family</li>
                <li>The list is not limited to great internet doctors - included also are those with good face-to-face &
                    surgical skills</li>
                <li>We also consider popularity & availability including Region & City finding you the best specialists <i
                        data-toggle="tooltip" title="Tooltip on top" class="fas fa-info-circle"></i></li>
            </ul>
            <form action="{{ route('topDoctor') }}" method="get" id="filterSearch">

                <div class="td-search-control-bx">
                    <div class="td-select-control">
                        <label>Filter :</label>
                        <div class="select">
                            <select class="form-control" name="location" id="location">
                                <option value="">Location</option>
                                @foreach ($locations as $location)
                                    <option value="{{ $location->location }}"
                                        {{ request()->get('location') == $location->location ? 'selected' : '' }}>
                                        {{ $location->location }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="select">
                            <select class="form-control" name="speciality" id="speciality">
                                <option value="">Speciality</option>
                                @foreach ($specialities as $speciality)
                                    <option value="{{ $speciality->dr_speciality }}"
                                        {{ request()->get('speciality') == $speciality->dr_speciality ? 'selected' : '' }}>
                                        {{ $speciality->dr_speciality }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label>Sort By :</label>
                        <div class="select">
                            <select class="form-control" name="sort" id="sort">
                                <option value="latest" {{ request()->get('sort') == 'latest' ? 'selected' : '' }}>Most recent
                                </option>

                                <option value="popular" {{ request()->get('sort') == 'popular' ? 'selected' : '' }}>Most popular
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="td-search-right-bx">
                        <input type="search" placeholder="Search.." class="form-control" />
                    </div>
                </div>
            </form>
            <div class="table-responsive td-table-bx">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Doctor Name</th>
                            <th scope="col">Speciality</th>
                            <th scope="col">Location</th>
                            <th scope="col">Comments</th>
                            <th scope="col">Practice</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telephone</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($doctors as $doctor)

                                <tr>
                                    <td>
                                        <a href="{{ route('patient.view-doctor-profile', Crypt::encryptString($doctor->id)) }}">
                                        {{ $doctor->name }}</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('patient.view-doctor-profile', Crypt::encryptString($doctor->id)) }}">
                                        {{ $doctor->dr_speciality }}</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('patient.view-doctor-profile', Crypt::encryptString($doctor->id)) }}">
                                        {{ $doctor->location }}</a>
                                    </td>
                                    <td><a href="{{ route('patient.view-doctor-profile', Crypt::encryptString($doctor->id)) }}"></a></td>
                                    <td>
                                        <a href="{{ route('patient.view-doctor-profile', Crypt::encryptString($doctor->id)) }}">
                                            {{ $doctor->address }}</a>
                                        </td>
                                    <td><a href="{{ route('patient.view-doctor-profile', Crypt::encryptString($doctor->id)) }}">
                                        {{ $doctor->email }}</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('patient.view-doctor-profile', Crypt::encryptString($doctor->id)) }}">
                                        {{ $doctor->telephone1 }}</a>
                                    </td>
                                </tr>
                            </a>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                {{ $doctors->links() }}
            </div>
        </div>
    </section>

@endsection
@push('scripts')
    <script>
        $('#location').change(function(e) {
            $("#filterSearch").submit();
        });

        $('#speciality').change(function(e) {
            $("#filterSearch").submit();
        });

        $("#sort").change(function() {
            $("#filterSearch").submit();
        });
    </script>

@endpush
