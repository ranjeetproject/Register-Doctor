@extends('frontend.layout.app')

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
                    <div class="news-listing for-w-100">
                        <div class="news-listing-top for-w-100">
                            <h2>Benefits of Chiropractic Care</h2>
                            <p>Fab 12, 2020 at 4:10 pm |<span>By farhan</span></p>
                        </div>
                        <div class="news-listing-bottom for-w-100">
                            <div class="news-img for-w-100">
                                <img src="images/news-listing2.jpg" alt="">
                            </div>
                            <div class="news-cont for-w-100">
                                <p>There’s an old maxim that states, “No fun for the writer, no fun for the reader.” No matter what industry you’re working in, as a blogger, you should live and die by this statement.There’s an old maxim that states, “No fun for the writer, no fun for the reader.” No matter what industry you’re working in, as a blogger, you should live and die by this statement.</p>
                                <p> Before you do any of the following steps, be sure to pick a topic that actually interests you. Noth
                                    ing – and I mean NOTHING – will kill a blog  it’s a little embarrassing 
                                    <a href="#">Read more</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="news-listing for-w-100">
                        <div class="news-listing-top for-w-100">
                            <h2>Benefits of Chiropractic Care</h2>
                            <p>Fab 12, 2020 at 4:10 pm |<span>By farhan</span></p>
                        </div>
                        <div class="news-listing-bottom for-w-100">
                            <div class="news-img for-w-100">
                                <img src="images/news-listing1.jpg" alt="">
                            </div>
                            <div class="news-cont for-w-100">
                                <p>There’s an old maxim that states, “No fun for the writer, no fun for the reader.” No matter what industry you’re working in, as a blogger, you should live and die by this statement.There’s an old maxim that states, “No fun for the writer, no fun for the reader.” No matter what industry you’re working in, as a blogger, you should live and die by this statement.</p>
                                <p> Before you do any of the following steps, be sure to pick a topic that actually interests you. Noth
                                    ing – and I mean NOTHING – will kill a blog  it’s a little embarrassing 
                                    <a href="#">Read more</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <nav aria-label="Page navigation example">
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
                            </nav>
                        </div>
                    </div>
                    
                </div>
                <div class="col-sm-4">
                    <div class="resent-post for-w-100">
                        <h3>Recent Posts</h3>
                        <select style="margin-bottom: 16px;border-radius: 12px;border: 2px solid #F2F2F3;min-height: 49px; box-shadow: 0px 0px 8px  #f2f2f2; padding: 12px; width: 100%;" class="form-select" aria-label="Default select example">
                            <option selected>All posts</option>
                            <option value="1">Heart</option>
                            <option value="2">Cancer</option>
                            <option value="3"> Allergies</option>
                        </select>
                            <input style="margin-bottom: 16px;border-radius: 12px;border: 2px solid #F2F2F3;min-height: 49px;box-shadow: 0px 0px 8px  #f2f2f2;" type="text" class="form-control" placeholder="Search...">
                            <button type="submit" class="btn btn-primary btn-block" style="    margin-bottom: 14px;">Search</button>
                        <div class="resent-listing for-w-100">
                            <ul>
                                <li><i class="fal fa-angle-right"></i>
                                    <span class="min-cont"><a href="#">Heart Health - the 3 stage of stress</a><span>Fab 12, 2020 at 8:12 pm</span> </span>
                                </li>
                                <li><i class="fal fa-angle-right"></i>
                                    <span class="min-cont"><a href="#">What's with these pesky symptoms ?</a><span>Fab 12, 2020 at 8:12 pm</span</span>></li>
                                <li><i class="fal fa-angle-right"></i>
                                    <span class="min-cont"><a href="#">The cost of headaches</a><span>Fab 08, 2020 at 8:12 pm</span></span></li>
                                <li><i class="fal fa-angle-right"></i>
                                    <span class="min-cont"><a href="#">Heart Health - the 3 stage of stress</a><span>Fab 22, 2020 at 8:12 pm</span></span></li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection