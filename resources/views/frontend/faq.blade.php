@extends('frontend.beforeloginlayout.app')

@section('content')
<section class="for-w-100 main-content innerpage  login-page">
        <div class="container">
<h3 class="text-center text-dark">{{$get_faq->title}}</h3>
<br>
<div class="text-dark">
{!! $get_faq->content !!}
</div>
</div>
</section>
@endsection