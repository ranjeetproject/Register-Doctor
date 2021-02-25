@extends('frontend.beforeloginlayout.app')

@section('content')
<section class="for-w-100 main-content innerpage  login-page">
        <div class="container">
<h3 class="text-center text-dark">{{$get_terms_condition->title}}</h3>
<br>
<div class="text-dark">
{!! $get_terms_condition->content !!}
</div>
</div>
</section>

@endsection