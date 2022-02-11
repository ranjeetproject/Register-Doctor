@extends('frontend.pharmacist.afterloginlayout.app')

@section('content')
    <div class="col Post-prescription-right Patient-Profile-page">
        <div class="row">
            <div class="col-sm-12">

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active input-effect" id="Patient-Profile">
                        <form class="for-w-100" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row Manage-Account-title">
                                <div class="col-sm-12">
                                    <h2>Opening Hours - UK local time</h2>
                                </div>
                            </div>
                            <div class="row main-form-fild">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>MON </label>
                                    <div class="row">
                                        <div class="col">

                                            <input id="From-date" name="monday_opening_time" class="form-control" type="time" value="{{ ($user->openingTime->monday_opening_time != '00:00:00')? $user->openingTime->monday_opening_time:'N/A'  ?? '09:00' }}"/>
                                        </div>
                                        <div class="col">
                                            <input id="Till-date" name="monday_closing_time" class="form-control " type="time" value="{{ ($user->openingTime->monday_closing_time != '00:00:00')?$user->openingTime->monday_closing_time:'N/A'  ?? '22:00' }}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                 {{--    @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror --}}
                                <div class="col-sm-12">
                                <div class="form-group">
                                    <label>TUE </label>
                                    <div class="row">
                                        <div class="col">

                                            <input id="From-date" name="tuesday_opening_time" class="form-control" type="time" value="{{ ($user->openingTime->tuesday_opening_time != '00:00:00')?$user->openingTime->tuesday_opening_time:'N/A'  ?? '09:00' }}"/>
                                        </div>
                                        <div class="col">
                                            <input id="Till-date" name="tuesday_closing_time" class="form-control " type="time" value="{{ ($user->openingTime->tuesday_closing_time != '00:00:00')?$user->openingTime->tuesday_closing_time:'N/A'  ?? '22:00' }}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="col-sm-12">
                                <div class="form-group">
                                    <label>WED </label>
                                    <div class="row">
                                        <div class="col">

                                            <input id="From-date" name="wednesday_opening_time" class="form-control" type="time" value="{{ ($user->openingTime->wednesday_opening_time != '00:00:00')?$user->openingTime->wednesday_opening_time:'N/A' ?? '09:00' }}"/>
                                        </div>
                                        <div class="col">
                                            <input id="Till-date" name="wednesday_closing_time" class="form-control" type="time" value="{{ ($user->openingTime->wednesday_closing_time != '00:00:00')?$user->openingTime->wednesday_closing_time:'N/A' ?? '22:00' }}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>THU </label>
                                    <div class="row">
                                        <div class="col">

                                            <input id="From-date" name="thursday_opening_time" class="form-control" type="time" value="{{ ($user->openingTime->thursday_opening_time != '00:00:00')?$user->openingTime->thursday_opening_time:'N/A'  ?? '09:00' }}"/>
                                        </div>
                                        <div class="col">
                                            <input id="Till-date" name="thursday_closing_time" class="form-control " type="time" value="{{ ($user->openingTime->thursday_closing_time != '00:00:00')?$user->openingTime->thursday_closing_time:'N/A'  ?? '22:00' }}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>FRI </label>
                                    <div class="row">
                                        <div class="col">

                                            <input id="From-date" name="friday_opening_time" class="form-control" type="time" value="{{ ($user->openingTime->friday_opening_time != '00:00:00')?$user->openingTime->friday_opening_time:'N/A'  ?? '09:00' }}" />
                                        </div>
                                        <div class="col">
                                            <input id="Till-date" name="friday_closing_time" class="form-control " type="time" value="{{ ($user->openingTime->friday_closing_time != '00:00:00')?$user->openingTime->friday_closing_time:'N/A'  ?? '22:00' }}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>SAT </label>
                                    <div class="row">
                                        <div class="col">

                                            <input id="From-date" name="saturday_opening_time" class="form-control" type="time" value="{{ ($user->openingTime->saturday_opening_time != '00:00:00')?$user->openingTime->saturday_opening_time:'N/A'  ?? '09:00' }}"/>
                                        </div>
                                        <div class="col">
                                            <input id="Till-date" name="saturday_closing_time" class="form-control " type="time" value="{{ ($user->openingTime->saturday_closing_time != '00:00:00')?$user->openingTime->saturday_closing_time:'N/A'  ?? '22:00' }}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>SUN </label>
                                    <div class="row">
                                        <div class="col">

                                            <input id="From-date" name="sunday_opening_time" class="form-control" type="time" value="{{ ($user->openingTime->sunday_opening_time != '00:00:00')?$user->openingTime->sunday_opening_time:'N/A'  ?? '09:00' }}"/>
                                        </div>
                                        <div class="col">
                                            <input id="Till-date" name="sunday_closing_time" class="form-control " type="time" value="{{ ($user->openingTime->sunday_closing_time != '00:00:00')?$user->openingTime->sunday_closing_time:'N/A' ?? '22:00' }}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Notes e.g. Closed Bank Holodays, Open 365 days</label>
                                    <div class="row">
                                        <div class="col">
                                            <textarea name="notes" class="form-control">{{ $user->openingTime->notes  ?? '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>


                                <div class="col-sm-12 Submit-Medical-Record">
                                    <button type="submit" class="btn blue-button smr-btn">Submit</button>
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


@endsection
@section('scripts')
    {{-- <script>
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

         $(window).on('load', function(){
    $(".tab-content #Patient-Profile input, .tab-content #Patient-Profile textarea").val("");

    $(".input-effect input, .input-effect textarea").focusout(function(){
    if($(this).val() != ""){
    $(this).addClass("has-content");
    }else{
    $(this).removeClass("has-content");
    }
    })
  });

    </script> --}}
@endsection
