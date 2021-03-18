@extends('frontend.patient.afterloginlayout.app')

@section('content')
    <div class="col Post-prescription-right Patient-Profile-page">
        <div class="row">
            <div class="col-sm-12">
               
                   <div class="col Incoming-Prescription-Requests-right Saved-Cases-page">
                    <h2 class="for-title">Create Case</h2> 

                     <form class="for-w-100" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row main-form-fild">
                                <div class="col-sm-12">
                                    <div class="form-group required">
                                        <textarea class="form-control" name="health_problem" placeholder="health problem"></textarea>
                                    @error('health_problem')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    
                                    </div>
                                </div>


                                <div class="for-profile-image">
                                <input type="file" name="case_file" id="imgInp">
                                
                                <img id="blah" src="{{asset('public/common_img/no_image.png')}}" alt="your image">
                                
                                <br>

                                <span>Update Profile Image</span>

                                 <div class="col-sm-12 ">

                                 <button type="submit" class="btn blue-button smr-btn float-right">Submit</button>
                                </div>

                            </div>


                            </div>

                        </form>
                  </div>
            </div>
        </div>
    </div>
   
@endsection
@section('scripts')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

        function readURL(input) {
            if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#imgInp").change(function() {
            readURL(this);
        });

    </script>
@endsection