@extends('frontend.patient.afterloginlayout.app')

@section('content')
    <div class="col Post-prescription-right  innerpage  Symptoms-page">
        <div class="row">
            <div class="col-sm-12">
               
                <div class="col Symptoms-right">
                    <h2 class="for-title">Please complete the questions below (or on behalf of your child)</h2>
                     <div class="for-w-100 Incoming-Prescription-Requests-right-table">
                         <form>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="lable-title">Tick if you had any of these conditions now or in the past</label>
                                        <div class="from-g-cont for-check-redio">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="Tick" value="Asthma">
                                                <label class="form-check-label" for="inlineRadio1">Asthma</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="Tick" value="Cancer">
                                                <label class="form-check-label" for="inlineRadio2">Cancer</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="Tick" value="Cardiac Disease">
                                                <label class="form-check-label" for="inlineRadio1">Cardiac Disease </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="Tick" value="Diabetes">
                                                <label class="form-check-label" for="inlineRadio2">Diabetes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="Tick" value="Hypertension">
                                                <label class="form-check-label" for="inlineRadio1">Hypertension</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="Tick" value="Stroke / Mini-Stroke">
                                                <label class="form-check-label" for="inlineRadio2">Stroke / Mini-Stroke</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="Tick" value="Epilepsy">
                                                <label class="form-check-label" for="inlineRadio1">Epilepsy</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="Tick" value="Migraine">
                                                <label class="form-check-label" for="inlineRadio2">Migraine </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="Tick" value="Mental health issues">
                                                <label class="form-check-label" for="inlineRadio2">Mental Health Issues</label>
                                            </div>
                                        </div>
                                    </div>
                                      
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="lable-title">Please list any conditions not covered above </label>
                                        <input class="form-control"  >
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="lable-title">Tick if you had any of these conditions now or in the past</label>
                                        <div class="from-g-cont for-check-box">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" value="chest pain">
                                                <label class="form-check-label" >Chest pain</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox"  value="shortness of breath">
                                                <label class="form-check-label">Shortness of breath</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" value="Weakness and fatigue">
                                                <label class="form-check-label" >Weakness and fatigue</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox"  value="Sore throat">
                                                <label class="form-check-label">Sore throat </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" value="Nasal congestion">
                                                <label class="form-check-label" >Nasal congestion </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox"  value="Fits">
                                                <label class="form-check-label">Fits</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" value="loss of weight">
                                                <label class="form-check-label" >Loss of weight</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox"  value="skin rash">
                                                <label class="form-check-label">Skin rash</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" value="Fainting">
                                                <label class="form-check-label" >Fainting </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox"  value="Diarrhoea">
                                                <label class="form-check-label">Diarrhoea</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" value="headache">
                                                <label class="form-check-label" >Headache</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox"  value="dizzy spells or vertigo">
                                                <label class="form-check-label">Dizzy spells or vertigo</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" value="pain in the abdomen">
                                                <label class="form-check-label" >Pain in the abdomen</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox"  value="bleeding">
                                                <label class="form-check-label">Bleeding</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox"  value="muscle aches">
                                                <label class="form-check-label">Muscle aches</label>
                                            </div>
                                        </div>
                                    </div>
                                      
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="lable-title">Please list any conditions not covered above </label>
                                        <input class="form-control"  >
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="lable-title">Please provide more details as required</label>
                                        <input class="form-control"  >
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group add-btn-on" id="drugs-taken">
                                        <label class="lable-title">If you can please provide details of drugs taken in the past 6 months</label>
                                        <div class="add-drugs-drugs"><i class="fal fa-plus"></i></div>
                                        <div class="form-inline">
                                            <label class="my-1 mr-2" >Drug name</label>
                                            <input type="text" class="form-control my-1 mr-sm-2"  placeholder="e g flucloxacillin">
                                            <label class="my-1 mr-2" >Dose </label>
                                            <input type="text" class="form-control my-1 mr-sm-2"  placeholder="eg 500 milligrams">
                                            <label class="my-1 mr-2" >Frequency</label>
                                            <input type="text" class="form-control my-1 mr-sm-2"  placeholder="frequency 4x a day">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox"  value="dizzy spells or vertigo">
                                                            <label class="form-check-label lable-title">Tick if currently on drug</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="lable-title">Weight</label>
                                        <input class="form-control"  >
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="lable-title">Height</label>
                                        <input class="form-control"  >
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group add-btn-on" id="List-any-drug">
                                        <div class="add-List-any-drug"><i class="fal fa-plus"></i></div>
                                        <div class="row" id="List-any-drug-list">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="lable-title">List any drug allergies<span> (Drug name)</span> </label>
                                                    <input class="form-control"  >
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="lable-title">What happened ?<span> (e.g. - rash)</span> </label>
                                                    <select id="inputState" class="form-control">
                                                        <option selected></option>
                                                        <option>...</option>
                                                      </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="lable-title">Is there anything else you want your online doctor to know? e.g. family history, social issues</label>
                                        <input class="form-control"  >
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="lable-title">Please provide your GP or family doctor’s name and address here</label>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input class="form-control"  placeholder="Doctor name">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input class="form-control"  placeholder="Doctor address">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <p class="UK-GP-address">GP address mandatory if you have a UK GP and additionally want a prescription </p>
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