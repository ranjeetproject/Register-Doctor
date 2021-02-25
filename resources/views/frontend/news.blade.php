@extends('frontend.beforeloginlayout.app')

@section('content')
    <section class="for-w-100 main-content innerpage news-page">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="inner-page-title">
                        News
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">

                    @forelse ($newses as $news)

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
                   @empty
                      No data found.
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
                        <div class="col-sm-12">
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
                <div class="col-sm-4">
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
                                    <span class="min-cont"><a href="#">{{ $news->heading }}</a><span>{{ date('M-d-Y H:i A',strtotime($news->created_at)) }} |<span>{{ $news->posted_by }}</span> </span>
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