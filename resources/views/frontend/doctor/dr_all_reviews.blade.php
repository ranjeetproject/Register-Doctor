@extends('frontend.doctor.afterloginlayout.app')

@section('content')
<div class="col all-reviews-page">
    <ul class="all-reviews-list">
    @foreach ($allDoctorReview as  $review)
        @php
            $user = getUserDetails($review['user_id']);
        @endphp
        <li>
            <h4>{{$user->name}}</h4>
            <p class="card-text">{{$review['review']}}</p>
        </li>
    @endforeach
    </ul>
</div>
@endsection
@section('scripts')
    <script>

    </script>
@endsection