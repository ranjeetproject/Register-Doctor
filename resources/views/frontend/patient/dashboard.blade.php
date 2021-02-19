@extends('frontend.patient.afterloginlayout.app')

@section('content')
    <div class="col">
        <div class="row pd-mr-top">
            <div class="col-sm">
                <h2>Option 1</h2>
                <h3>Choose & Book  <small class="blue">Pick a Doctor</small></h3>
                <div class="opction-one">
                    <div class="opction-one-top-image">
                        <img src="{{ asset('public/images/frontend/images/opction-one-top-image3.png') }}" alt="">
                    </div>
                    <div class="opction-one-bottom">
                        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                            <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="opction-one-bottom-left">
                                    <h4>In Option 1</h4>
                                    <img src="{{ asset('public/images/frontend/images/doc-pic.jpg') }}" class="d-block" alt="...">
                                    
                                </div>
                                <div class="opction-one-bottom-right">
                                    <ul>
                                        <li>You Choose Your Doctor</li>
                                        <li>Check out Qualifications, Ratings</li>
                                        <li>Filter by FEES</li>
                                        <li>Specialists & GPs available</li>
                                        <li>Choose Live Video,<br> Live Chat
                                            or Typed Q&A</li>
                                    </ul>
                                    <div class="Book-Appointment">
                                        <span>Book Appointment</span><a href="#" target="_blank" rel="noopener noreferrer"><i class="fal fa-share"></i></a>
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="carousel-item ">
                                <div class="opction-one-bottom-left">
                                    <h4>In Option 2</h4>
                                <img src="{{ asset('public/images/frontend/images/doc-pic.jpg') }}" class="d-block" alt="...">
                                <div class="reting-and-other-info" style="color: #ffc107;margin-top: 5px;font-size: 10px;">
                                    <div class="rating-list">
                                    
                                        <i class="fas fa-star reting"></i>
                                        <i class="fas fa-star reting"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt reting"></i> 
                                    </div>
                                    <div class="rating-list-bottom">
                                        <i class="far fa-thumbs-up reting"></i>
                                        <i class="far fa-thumbs-up reting"></i>
                                        
                                    </div>
                                    
                                </div>
                                </div>
                                <div class="opction-one-bottom-right">
                                    <ul>
                                        <li>.2. You Choose Your Doctor</li>
                                        <li>Check out Qualifications, Ratings</li>
                                        <li>Filter by FEES</li>
                                        <li>Specialists & GPs available</li>
                                        <li>Choose Live Video, Live Chat
                                        or Typed Q&A</li>
                                    </ul>
                                    <div class="Book-Appointment">
                                    <span>Book Appointment 2</span><a href="#" target="_blank" rel="noopener noreferrer"><i class="fal fa-share"></i></a>
                                    </div>
                            </div>
                            </div>
                            <div class="carousel-item">
                                <div class="opction-one-bottom-left">
                                    <h4>In Option 3</h4>
                                <img src="{{ asset('public/images/frontend/images/doc-pic.jpg') }}" class="d-block" alt="...">
                                <div class="reting-and-other-info" style="color: #ffc107;margin-top: 5px;font-size: 10px;">
                                    <div class="rating-list">
                                    
                                        <i class="fas fa-star reting"></i>
                                        <i class="fas fa-star reting"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt reting"></i> 
                                    </div>
                                    <div class="rating-list-bottom">
                                        <i class="far fa-thumbs-up reting"></i>
                                        <i class="far fa-thumbs-up reting"></i>
                                        
                                    </div>
                                    
                                </div>
                                </div>
                                <div class="opction-one-bottom-right">
                                    <ul>
                                        <li>3 Choose Your Doctor</li>
                                        <li>3 Check out Qualifications, Ratings</li>
                                        <li>Filter by FEES</li>
                                        <li>Specialists & GPs available</li>
                                        <li>Choose Live Video, Live Chat
                                        or Typed Q&A</li>
                                    </ul>
                                    <div class="Book-Appointment">
                                    <span>Book Appointment 3</span><a href="#" target="_blank" rel="noopener noreferrer"><i class="fal fa-share"></i></a>
                                    </div>
                            </div>
                            </div>
                            </div>
                        
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-sm-3">
                <div class="Prescriptions">
                    <img src="{{ asset('public/images/frontend/images/pr-top.png') }}" alt="">
                    <div class="Prescriptions-top">
                        <h3>Prescriptions<br><small>In 3 Easy Steps</small></h3>
                        <img src="{{ asset('public/images/frontend/images/m-pr-pic1.jpg') }}" alt="">
                        <button type="submit" class="btn blue-button">Find Out More</button>
                    </div>
                    <div class="Prescriptions-bottom">
                        <h4>Children</h4>
                        <img src="{{ asset('public/images/frontend/images/m-pr-pic2.png') }}" alt="">
                        <button type="submit" class="btn blue-button">Find Out More</button>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <h2>Option 2</h2>
                <h3>Quick Question <small class="orange">Ask a Doctor</small></h3>
                <div class="opction-two">
                    <form>
                        <div class="form-group">
                            <textarea placeholder="Type your health query here " class="form-control" rows="6"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                            <span>Upload Attachments <i class="far fa-paperclip"></i></span>
                        </div>
                        <button type="submit" class="btn orange-button">Submit Your query</button>
                    </form> 
                    <h4>In Option 2</h4>
                    <ul>
                        <li>
                            Your query is sent to a panel of Doctors free
                        </li>
                        <li>
                            Standard Fee     <spna>14.99</spna> charged only if Doctor takes case 
                        </li>
                        <li>
                            Includes up to 3 exchanges with doctor
                        </li>
                        <li>
                            Rate your Doctor 
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row pad-apt-details">
            <div class="col-sm-3">
                <div class="pd-btm-details">
                    <div class="pd-btm-details-cont">
                        <p>upcoming appointments</p>
                        <img src="{{ asset('public/images/frontend/images/pd-icon3.png') }}" alt="">
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="pd-btm-details">
                    <div class="pd-btm-details-cont">
                        <p>Messages from Doctor,
                            Pharmacist, Admin</p>
                        <img src="{{ asset('public/images/frontend/images/pd-icon4.png') }}" alt="">
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="pd-btm-details">
                    <div class="pd-btm-details-cont">
                        <p>Your Prescriptions</p>
                        <img src="{{ asset('public/images/frontend/images/pd-icon2.png') }}" alt="">
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="pd-btm-details">
                    <div class="pd-btm-details-cont">
                        <p>Answered Questions</p>
                        <img src="{{ asset('public/images/frontend/images/pd-icon1.png') }}" alt="">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection