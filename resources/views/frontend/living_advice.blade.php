@extends('frontend.beforeloginlayout.app')

@section('banner')
    <section class="home-slider-section Banner news-banner-bx for-w-100">
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                @foreach ($news_banners as $news_banner)
                    <li data-target="#carousel" data-slide-to="{{ $loop->index }}" class="@if ($loop->iteration == 1) active @endif"></li>
                @endforeach
                {{-- <li data-target="#carousel" data-slide-to="1"></li>
                <li data-target="#carousel" data-slide-to="2"></li> --}}
            </ol> <!-- End of Indicators -->

            <!-- Carousel Content -->
            <div class="carousel-inner" role="listbox">
                @forelse ($news_banners as $news_banner)
                    <div class="carousel-item @if ($loop->iteration == 1) active @endif">
                        <div class="news-banner-img">
                            <img src="{{ asset('public/uploads/living_advice/' . $news_banner->image) }}" alt="">
                        </div>
                    </div>
                @empty

                @endforelse
                {{-- <div class="carousel-item active">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="home-banner-left-cont">
                                    <a href="{{ route('patient.my-favorite-doctors') . '?dr_speciality=all' }}"
                                        class="banner-left">
                                        <h1>
                                            <small>Membership is <span>Free</span></small><br>
                                            Click for a Specialist
                                        </h1>
                                        <p>Ask Questions, Upload Photos & Lab Results, Get 2nd Opinions</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="bann-img">
                                    <img src="{{ asset('public/images/frontend/images/homebanner.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End of Carousel Item --> --}}

                {{-- <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="home-banner-left-cont">
                                    <a href="{{ route('patient.my-favorite-doctors') . '?dr_speciality=all' }}"
                                        class="banner-left">
                                        <h1>
                                            <small>Membership is <span>Free</span></small><br>
                                            Click for a Specialist
                                        </h1>
                                        <p>Ask Questions, Upload Photos & Lab Results, Get 2nd Opinions</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="bann-img">
                                    <img src="{{ asset('public/images/frontend/images/homebanner.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End of Carousel Item -->

                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="home-banner-left-cont">
                                    <a href="{{ route('patient.my-favorite-doctors') . '?dr_speciality=all' }}"
                                        class="banner-left">
                                        <h1>
                                            <small>Membership is <span>Free</span></small><br>
                                            Click for a Specialist
                                        </h1>
                                        <p>Ask Questions, Upload Photos & Lab Results, Get 2nd Opinions</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="bann-img">
                                    <img src="{{ asset('public/images/frontend/images/homebanner.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- End of Carousel Item -->
            </div> <!-- End of Carousel Content -->

            <!-- Previous & Next -->
            <a href="#carousel" class="carousel-control-prev" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon fal fa-caret-square-left" aria-hidden="true"></span>
                <span class="sr-only"></span>
            </a>
            <a href="#carousel" class="carousel-control-next" role="button" data-slide="next">
                <span class="carousel-control-next-icon fal fa-caret-square-right" aria-hidden="true"></span>
                <span class="sr-only"></span>
            </a>
        </div> <!-- End of Carousel -->
    </section>

@endsection

@section('content')
    <section class="for-w-100 main-content innerpage news-page">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="inner-page-title">
                        Living Advice
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">

                    @forelse ($newses as $news)

                    <div class="news-listing for-w-100">
                        <div class="news-listing-top">
                            <h2>{{ $news->heading }}</h2>
                            <p>{{ date('M-d-Y H:i A',strtotime($news->created_at)) }} |<span>{{ $news->posted_by }}</span></p>
                        </div>
                        <div class="news-listing-bottom">

                            @if(!empty($news->image))
                            <div class="news-img">
                                <img src="{{asset('public/uploads/living_advice/'.$news->image)}}" alt="">
                            </div>
                            @endif

                            <div class="news-cont">
                                <p>{{ $news->sort_content }}
                                    <a href="{{ route('livingAdviceDetails',$news->slug) }}" class="view-moreilink">View more</a>
                                </p>
                            </div>
                        </div>
                    </div>
                   @empty
                      No News found.
                    @endforelse

                    {{-- <div class="news-listing for-w-100">
                        <div class="news-listing-top for-w-100">
                            <h2>Benefits of Chiropractic Care</h2>
                            <p>Fab 12, 2020 at 4:10 pm |<span>By farhan</span></p>
                        </div>
                        <div class="news-listing-bottom for-w-100">
                            <div class="news-img for-w-100">
                                <img src="{{ asset('public/images/frontend/images/news-listing1.jpg') }}" alt="">
                            </div>
                            <div class="news-cont for-w-100">
                                <p>There’s an old maxim that states, “No fun for the writer, no fun for the reader.” No matter what industry you’re working in, as a blogger, you should live and die by this statement.There’s an old maxim that states, “No fun for the writer, no fun for the reader.” No matter what industry you’re working in, as a blogger, you should live and die by this statement.</p>
                                <p> Before you do any of the following steps, be sure to pick a topic that actually interests you. Noth
                                    ing – and I mean NOTHING – will kill a blog  it’s a little embarrassing
                                    <a href="#">Read more</a></p>
                            </div>
                        </div>
                    </div> --}}




                    <div class="row">
                        <div class="col-sm-12 Page navigation my-4 d-flex justify-content-end">

                           {{ $newses->onEachSide(2)->links() }}


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
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="resent-post for-w-100">
                        <h3>Recent Posts</h3>
                        <form>
                        <select style="margin-bottom: 16px;border-radius: 12px;border: 2px solid #F2F2F3;min-height: 49px; box-shadow: 0px 0px 8px  #f2f2f2; padding: 12px; width: 100%;" name="category" class="form-select" aria-label="Default select example">
                            <option value="">All posts</option>
                             @foreach($news_category as $category)
                             <option value="{{$category->news_type}}">{{$category->news_type}}</option>
                             @endforeach

                        </select>
                            <input style="margin-bottom: 16px;border-radius: 12px;border: 2px solid #F2F2F3;min-height: 49px;box-shadow: 0px 0px 8px  #f2f2f2;" type="text" class="form-control" placeholder="Search..." name="search_value">
                            <button type="submit" class="btn btn-primary btn-block" style="    margin-bottom: 14px;">Search</button>
                      </form>

                        <div class="resent-listing for-w-100">
                            <ul>
                                 @forelse ($latest_news as $news)
                                <li><i class="fal fa-angle-right"></i>
                                    <span class="min-cont"><a href="{{ route('livingAdviceDetails',$news->slug) }}">{{ $news->heading }}</a><span>{{ date('M-d-Y H:i A',strtotime($news->created_at)) }} |<span>{{ $news->posted_by }}</span> </span>
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
