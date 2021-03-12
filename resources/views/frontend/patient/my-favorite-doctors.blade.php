@extends('frontend.patient.afterloginlayout.app')

@section('content')
    <div class="col Post-prescription-right Choose-Your-Doctor-page My-favourite-doctors">
        <div class="row">
            <div class="col-sm-12">
               
                <div class="col Choose-Your-Doctor-right">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb Pharmacist-doc-com"> <li class="breadcrumb-item active">Favorite Doctors list</li>
                        </ol>
                      </nav>
                   
                  <div class="row Doctor-list-details">
                      <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-body-img">
                                    <img src="{{ asset('public/images/frontend/images/Doctor-pic.jpg')}}" alt="">
                                </div>
                                <div class="card-body-cont">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="reting-and-other-info">
                                                <div class="rating-list">
                                                    <i class="fas fa-star-half-alt reting"></i> 
                                                    <i class="fas fa-star reting"></i>
                                                     <i class="fas fa-star reting"></i>
                                                      <i class="fas fa-star"></i>
                                                      <i class="fas fa-star"></i>
                                                      <span>0.4</span>
                                                      <i class="fas fa-heart marks"></i>
                                                </div>
                                                <div class="rating-list-bottom">
                                                    <i class="far fa-thumbs-up reting"></i>
                                                    <i class="far fa-thumbs-up reting"></i>
                                                    
                                                </div>
                                                <button type="submit" class="btn blue-button rating-list-profile">Full Profile</button>
                                            </div>
                                            <h5 class="card-title">Dr. Natasha Kate Kothari<br><small> Interest or Specialty</small> </h5>
                                            <p>MBBS, M.D. (Psychiatry), DNB - Psychiatry</p>
                                            <p>Location  : Salt Lake</p>
                                            <p>Language    : English,hindi </p>
                                            <p>Communication : Live Chat, Live Video, Typed Q&A</p>
                                            <p>Sees : Adults</p>
                                            <p>Prescriber online : Yes or No </p>
                                            
                                        </div>

                                    </div>
                                    <div class="row books-btn">
                                        <div class="col">
                                            <p><i class="fas fa-pound-sign"></i> 21.50 per 15 mins</p>
                                            <button type="submit" class="btn btn-block Book-Live">Book Live Chat</button>
                                        </div>
                                        <div class="col">
                                            <p><i class="fas fa-pound-sign"></i> 21.50 per 15 mins</p>
                                            <button type="submit" class="btn btn-block Book-Live">Book Live Video</button>
                                        </div>
                                        <div class="col-sm-5">
                                            <p><i class="fas fa-pound-sign"></i> 21.50 per 15 mins</p>
                                            <button type="submit" class="btn btn-block Request">Request Q&A <br> <small>Turnaround Time 5 hrs 2 days</small></button>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                          </div>

                          <div class="card">
                            <div class="card-body">
                                <div class="card-body-img">
                                    <img src="{{ asset('public/images/frontend/images/Doctor-pic.jpg')}}" alt="">
                                </div>
                                <div class="card-body-cont">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="reting-and-other-info">
                                                <div class="rating-list">
                                                    <i class="fas fa-star-half-alt reting"></i> 
                                                    <i class="fas fa-star reting"></i>
                                                     <i class="fas fa-star reting"></i>
                                                      <i class="fas fa-star"></i>
                                                      <i class="fas fa-star"></i>
                                                      <span>0.4</span>
                                                      <i class="fas fa-heart marks"></i>
                                                </div>
                                                <div class="rating-list-bottom">
                                                    <i class="far fa-thumbs-up reting"></i>
                                                    <i class="far fa-thumbs-up reting"></i>
                                                    
                                                </div>
                                                <button type="submit" class="btn blue-button rating-list-profile">Full Profile</button>
                                            </div>
                                            <h5 class="card-title">Dr. Natasha Kate Kothari<br><small> Interest or Specialty</small> </h5>
                                            <p>MBBS, M.D. (Psychiatry), DNB - Psychiatry</p>
                                            <p>Location  : Salt Lake</p>
                                            <p>Language    : English,hindi </p>
                                            <p>Communication : Live Chat, Live Video, Typed Q&A</p>
                                            <p>Sees : Adults</p>
                                            <p>Prescriber online : Yes or No </p>
                                            
                                        </div>

                                    </div>
                                    <div class="row books-btn">
                                        <div class="col">
                                            <p><i class="fas fa-pound-sign"></i> 21.50 per 15 mins</p>
                                            <button type="submit" class="btn btn-block Book-Live">Book Live Chat</button>
                                        </div>
                                        <div class="col">
                                            <p><i class="fas fa-pound-sign"></i> 21.50 per 15 mins</p>
                                            <button type="submit" class="btn btn-block Book-Live">Book Live Video</button>
                                        </div>
                                        <div class="col-sm-5">
                                            <p><i class="fas fa-pound-sign"></i> 21.50 per 15 mins</p>
                                            <button type="submit" class="btn btn-block Request">Request Q&A <br> <small>Turnaround Time 5 hrs 2 days</small></button>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                          </div>
                          <div class="card">
                            <div class="card-body">
                                <div class="card-body-img">
                                    <img src="{{ asset('public/images/frontend/images/Doctor-pic.jpg')}}" alt="">
                                </div>
                                <div class="card-body-cont">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="reting-and-other-info">
                                                <div class="rating-list">
                                                    <i class="fas fa-star-half-alt reting"></i> 
                                                    <i class="fas fa-star reting"></i>
                                                     <i class="fas fa-star reting"></i>
                                                      <i class="fas fa-star"></i>
                                                      <i class="fas fa-star"></i>
                                                      <span>0.4</span>
                                                      <i class="fas fa-heart marks"></i>
                                                </div>
                                                <div class="rating-list-bottom">
                                                    <i class="far fa-thumbs-up reting"></i>
                                                    <i class="far fa-thumbs-up reting"></i>
                                                    
                                                </div>
                                                <button type="submit" class="btn blue-button rating-list-profile">Full Profile</button>
                                            </div>
                                            <h5 class="card-title">Dr. Natasha Kate Kothari<br><small> Interest or Specialty</small> </h5>
                                            <p>MBBS, M.D. (Psychiatry), DNB - Psychiatry</p>
                                            <p>Location  : Salt Lake</p>
                                            <p>Language    : English,hindi </p>
                                            <p>Communication : Live Chat, Live Video, Typed Q&A</p>
                                            <p>Sees : Adults</p>
                                            <p>Prescriber online : Yes or No </p>
                                            
                                        </div>

                                    </div>
                                    <div class="row books-btn">
                                        <div class="col">
                                            <p><i class="fas fa-pound-sign"></i> 21.50 per 15 mins</p>
                                            <button type="submit" class="btn btn-block Book-Live">Book Live Chat</button>
                                        </div>
                                        <div class="col">
                                            <p><i class="fas fa-pound-sign"></i> 21.50 per 15 mins</p>
                                            <button type="submit" class="btn btn-block Book-Live">Book Live Video</button>
                                        </div>
                                        <div class="col-sm-5">
                                            <p><i class="fas fa-pound-sign"></i> 21.50 per 15 mins</p>
                                            <button type="submit" class="btn btn-block Request">Request Q&A <br> <small>Turnaround Time 5 hrs 2 days</small></button>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                          </div>
                        </div>
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
            </div>
            </div>
        </div>
    </div>
   
@endsection
@section('scripts')
    <script>
        

    </script>
@endsection