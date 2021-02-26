@extends('frontend.beforeloginlayout.app')

@section('content')

<section class="for-w-100 main-content innerpage  login-page">
        <div class="container">
        	<div class="row">
                <div class="col-sm-12">
                    <h1 class="inner-page-title">
                        {{$get_terms_condition->title}}
                    </h1>
                </div>
            </div>
<br>
<div class="row">
 <div class="col-sm-12">
   {!! $get_terms_condition->content !!}
</div>
</div>
</div>
</section>


{{-- <section class="for-w-100 main-content innerpage  login-page">
        <div class="container">
<h3 class="text-center text-dark">{{$get_terms_condition->title}}</h3>
<br>
<div class="text-dark">
{!! $get_terms_condition->content !!}
</div>
</div>
</section> --}}

@endsection