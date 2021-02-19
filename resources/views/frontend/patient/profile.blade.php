@extends('frontend.patient.afterloginlayout.app')

@section('content')
    <div class="col Post-prescription-right Patient-Profile-page">
        <div class="row">
            <div class="col-sm-12">
                <ul class="nav nav-pills" id="myTab" role="tablist">
                    <li class="nav-item">
                    <a class="nav-link active btn " data-toggle="tab" href="#Patient-Profile">
                        Patient Profile
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link btn"   href="Patient-Payment-Details.html">Payment Details</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="Patient-Profile">
                        <form class="for-w-100">
                            <div class="for-profile-image">
                                <input type="file" id="imgInp">
                                <img id="blah" src="{{ asset('public/images/frontend/images/msg-pic3.png') }}" alt="your image"><br>
                                <span>Update Profile Image</span>
                            </div>
                            <div class="row main-form-fild">
                                <div class="col-sm-12">
                                    <div class="form-group required">
                                        <input type="text" class="form-control" placeholder="Unique Patient Number (UPN)" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group required">
                                        <input type="text" class="form-control" placeholder="Forename" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group required">
                                        <input type="text" class="form-control" placeholder="Surname" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group required">
                                        <input type="text" class="form-control" placeholder="Sex" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group required">
                                        <input onfocus="(this.type='date')" class="form-control" placeholder="Date of Birth" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group required">
                                        <input type="text" class="form-control" placeholder="Address" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group required">
                                        <input type="email" class="form-control" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label>Address for delivery of drugs if different to above</label>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="form-group required">
                                        <input type="tel" class="form-control" placeholder="Telephone 1" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="tel" class="form-control" placeholder="Telephone 2">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label><strong>GP or Family Doctor</strong><img src="{{ asset('public/images/frontend/images/ex-icon.png') }}" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="One line definition"> GP address mandatory if you want a prescription via this website and have a UK GP</label>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Address">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="tel" class="form-control" placeholder="Telephone ">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label>Next of Kin (recommended)</label>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name ">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Address">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Relationship">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Phone No.">
                                    </div>
                                </div>
                                <div class="col-sm-12 Mandator">
                                    <label>To change password to <a href="#">Click here</a>  <span><sup>*</sup>Mandatory</span> </label>
                                </div>
                                <div class="col-sm-12 Submit-Medical-Record">
                                    <button type="submit" class="btn blue-button smr-btn">Submit</button>
                                    <button type="submit" class="btn smr-btn mr">Medical Record</button>
                                </div>
                            </div>
                        </form>
                    </div>
                        
                    <div class="tab-pane fade " id="Payment-Details">
                    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Prescriptions Issued Modal start -->
    <div class="modal fade" id="Pharmacy-popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <p>Your Doctor has been messaged to post the Prescription to you.</p>
                    <p>For queries you may message the Doctor using the 'Prescriptions Issued' option 
                        [Lefthand Navigation Menu]</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Prescriptions Issued Modal end -->
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