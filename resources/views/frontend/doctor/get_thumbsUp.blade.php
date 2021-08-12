@extends('frontend.doctor.afterloginlayout.app')

@section('content')
    <div class="col Choose-Your-Doctor-right innerpage  How-Thumbs-Up-Work-page How-to-Get-Thumbs-comm-form">
        <div class="row">
            <div class="col-sm-12">
                <div class="col How-Thumbs-Up-Work-right">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb Pharmacist-doc-com">
                          <li class="breadcrumb-item"><a href="#">How Thumbs Up <i class="far fa-thumbs-up"></i>  Work <i class="fal fa-long-arrow-right"></i></a></li>
                          <li class="breadcrumb-item active">Every 12 names earns a <i class="far fa-thumbs-up"></i></li>
                        </ol>
                      </nav>
                    <h2>Criterion: You would recommend this doctor to family or friends to consult </h2>
                    <button class="btn Next-Name-btn"><i class="fal fa-plus-circle"></i> Next Name</button>
                    <div class="for-w-100 How-Thumbs-Up-Work-cont">
                            <form action="{{ route('doctor.get-thumbs-up') }}" method="post" class="">
                                @csrf
                                <div class="row Doctor-contact">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label><sup>*</sup> Doctor Name </label>
                                            <input class="form-control" type="text" placeholder="" name="doctor_name" required>
                                         </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label><sup>*</sup> Speciality </label>
                                            <input class="form-control" type="tel" placeholder="" name="speciality" required>
                                         </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label><sup>*</sup> Country  </label>
                                            <input class="form-control" type="tel" name="country" placeholder="" required>
                                         </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label><sup>*</sup> City or Location   </label>
                                            <input class="form-control" type="tel" name="city" placeholder="" required>
                                         </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label><sup>*</sup> Email Id   </label>
                                            <input class="form-control" type="tel" placeholder="" name=email_id required>
                                         </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Comments  e.g. Dr. Smith is an expert in children's asthma. Great bedside manner. Parents and kids love her.</label>
                                            <textarea class="form-control" name="comment" rows="4"></textarea>
                                         </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>If this doctor is an Opinion Leader please specify the area below e.g. asthma, pituitary surgery. </label>
                                            <textarea class="form-control" name="opinion_leader" rows="4"></textarea>
                                         </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label><sup>*</sup> Asterisked fields are mandatory </label>

                                         </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn blue-button">Submit</button>
                                    </div>
                                </div>
                               </form>
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
