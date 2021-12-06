@extends('frontend.doctor.afterloginlayout.app')

@section('content')
    <section class="col sick-note-wrap">
        <div class="sick-note-header">
            <h2>STATEMENT OF LICENSED MEDICAL DOCTOR</h2>
            <p>Fitness for Work Statement - Certificate Number</p>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="To Mr. Jhone Doe">
        </div>
        <div class="sick-note-info">
            <p>I assessed your case on [DATE]. I advise that:</p>
            <ul class="sick-note-list">
                <li>- you are unfit for work</li>
                <li>OR</li>
                <li>- you may be fit for work if your employer agrees to take into account the following advice:................</li>
            </ul>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Medical condition:">
        </div>
        <div class="form-group">
        <textarea rows="5" class="form-control" placeholder="Doctors’ remarks where applicable e.g. functional effects of condition"></textarea>
        </div>
     
        <table class="table sick-note-info-details">
            <tbody>
                <tr>
                    <td>Doctor John Smith</td>
                    <td>Date:</td>
                </tr>
                <tr>
                    <td>Medical licence no.</td>
                    <td>Medical Licenser:  GMC</td>
                </tr>
                <tr>
                    <td>Registered-Doctor.com I.D. Number</td>
                </tr>
            </tbody>
        </table>
    
        <p class="sick-note-info-bottom">
        To verify this statement is authentic log onto <a href="#">www.Registered-Doctor.com</a>. Click on the icon for verifying medical statements and input the Certificate Number at the top of this statement.
        </p>
        <div class="sick-note-footer-info">
            <p><a href="#">www.Registered-Doctor.com</a><p>
            <p>1 Germaine Street, London WC1V</p>
        </div>
        <!-- <div class="row">
            <div class="col Case-Conclusion-live-Video-and-live-Chat-right">
                <span class="cash-id">chandan Case ID : 12346</span> <button class="btn cash-consol-btn">Case Conclusion</button>
            </div>
            <div class="col-sm-12">
                <div class="view-case-details">
                    <ul>
                        <li><label>Name </label><span class="cont"> <span>:</span>   </span></li>
                        <li><label>Sex </label><span class="cont"> <span>:</span>    </span></li>
                        <li><label>Date of Birth </label><span class="cont"> <span>:</span>   </span></li>
                        <li><label>Address </label><span class="cont"> <span>:</span>  </span></li>
                        <li><label>Unique Patient Number (UPN) </label><span class="cont"> <span>:</span>   </span></li>
                    </ul>
                </div>
            </div>
        </div> -->
        
    </section>
@endsection
@section('scripts')
    <script>

    </script>
@endsection
