@extends('frontend.doctor.afterloginlayout.app')

@section('content')
<div class="col Choose-Your-Doctor-right Doctor-Manage-Account-Profile-page">
    @foreach ($allDoctorReview as  $review)
        @php
            $user = getUserDetails($review['user_id']);
        @endphp
        <div class="card">
            <div class="card-header">
                {{$user->name}}
            </div>
            <div class="card-body">
                <p class="card-text">{{$review['review']}}</p>
            </div>
        </div>
    @endforeach
</div>
@endsection
@section('scripts')
    <script>

    </script>
@endsection