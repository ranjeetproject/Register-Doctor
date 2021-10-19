@extends('frontend.beforeloginlayout.app')

@section('content')


<section class="for-w-100 main-content innerpage  login-page">
        <div class="container">
        	<div class="row">
                <div class="col-sm-12">
                    <h1 class="inner-page-title">
                        {{$get_latest_on_coronavirus->title}}
                    </h1>
                </div>
            </div>
<br>
<div class="row">
 <div class="col-sm-12">
   {!! $get_latest_on_coronavirus->content !!}
</div>
</div>
</div>
</section>




@endsection
