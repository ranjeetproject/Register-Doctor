@extends('frontend.beforeloginlayout.app')

@section('content')
    <section class="for-w-100 main-content innerpage news-page news-details-page">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="inner-page-title">
                        News Details
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
{{-- @dd($news) --}}
                    <div class="news-listing for-w-100">
                        <div class="news-listing-top for-w-100">
                            <h2>{{ $news->heading }}</h2>
                            <p>{{ date('M-d-Y H:i A',strtotime($news->created_at)) }} |<span>{{ $news->posted_by }}</span></p>
                        </div>
                        <div class="news-listing-bottom for-w-100">

                            @if(!empty($news->image))
                            <div class="news-img for-w-100">
                                <img src="{{asset('public/uploads/news/'.$news->image)}}" alt="">
                            </div>
                            @endif

                            <div class="news-cont for-w-100">
                                <p>{!! $news->content !!}</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="resent-post for-w-100">
                        <h3>Recent Posts</h3>
                        <div class="resent-listing for-w-100">
                          
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
