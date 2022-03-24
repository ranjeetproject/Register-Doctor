@extends('frontend.beforeloginlayout.app')

@section('content')
    <section class="for-w-100 main-content innerpage news-page news-details-page">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="inner-page-title">
                        Latest on Coronavirus Details
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    {{-- @dd($news) --}}
                    <div class="news-listing for-w-100">
                        <div class="news-listing-top for-w-100">
                            <h2>{{ $news->heading }}</h2>
                            <p>{{ date('M-d-Y H:i A', strtotime($news->created_at)) }}
                                |<span>{{ $news->posted_by }}</span></p>
                        </div>
                        <div class="news-listing-bottom for-w-100">

                            @if (!empty($news->image))
                                <div class="news-img for-w-100">
                                    <img src="{{ asset('public/uploads/corona/' . $news->image) }}" alt="">
                                </div>
                            @endif

                            <div class="news-cont for-w-100">
                                <p>{!! $news->content !!}</p>
                            </div>
                        </div>
                    </div>

                </div>
                {{-- <div class="col-md-4">
                    <div class="resent-post for-w-100">
                        <h3>Recent Posts</h3>
                        <div class="resent-listing for-w-100">

                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-4">
                    <div class="resent-post for-w-100">
                        <h3>Recent Posts</h3>
                        <form method="get" action="{{ route('latestOnCoronavirus') }}">
                            <select
                                style="margin-bottom: 16px;border-radius: 12px;border: 2px solid #F2F2F3;min-height: 49px; box-shadow: 0px 0px 8px  #f2f2f2; padding: 12px; width: 100%;"
                                name="category" class="form-select" aria-label="Default select example">
                                <option value="">All posts</option>
                                @foreach ($news_category as $category)
                                    <option value="{{ $category->news_type }}">{{ $category->news_type }}</option>
                                @endforeach

                            </select>
                            <input
                                style="margin-bottom: 16px;border-radius: 12px;border: 2px solid #F2F2F3;min-height: 49px;box-shadow: 0px 0px 8px  #f2f2f2;"
                                type="text" class="form-control" placeholder="Search..." name="search_value">
                            <button type="submit" class="btn btn-primary btn-block"
                                style="    margin-bottom: 14px;">Search</button>
                        </form>

                        <div class="resent-listing for-w-100">
                            <ul>
                                @forelse ($latest_news as $news)
                                    <li><i class="fal fa-angle-right"></i>
                                        <span class="min-cont"><a
                                                href="{{ route('latestOnCoronavirusDetails', $news->slug) }}">{{ $news->heading }}</a><span>{{ date('M-d-Y H:i A', strtotime($news->created_at)) }}
                                                |<span>{{ $news->posted_by }}</span> </span>
                                    </li>
                                @empty
                                    <li><i class="fal fa-angle-right"></i>
                                        <span class="min-cont"><a href="#">No data found.</a> </span>
                                    </li>
                                @endforelse
                            </ul>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
