@extends('frontend.beforeloginlayout.app')

@section('content')
   <section class="for-w-100 main-content homepage">
      <div class="container">
         <div class="row">
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
                                    <h4>Option 1</h4>
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
                           <textarea placeholder="Type your health query here " class="form-control" rows="9"></textarea>
                        </div>
                        <div class="form-group">
                           <input type="file" class="form-control-file" id="exampleFormControlFile1">
                           <span>Upload Attachments <i class="far fa-paperclip"></i></span>
                        </div>
                        <button type="submit" class="btn orange-button">Submit Your query</button>
                     </form> 
                     <h4>Option 2</h4>
                     <ul>
                        <li>
                           Your query is sent to a panel of Doctors free
                        </li>
                        <li>
                           Standard Fee     <spna><i class="fas fa-pound-sign"></i>14.99</spna> charged only if Doctor takes case 
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
      </div>
   </section>
@endsection