<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>@yield('title')</title>
<style type="text/css">
  .btn {
    display: inline-block;
    font-weight: 400;
    color: #212529;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-color: transparent;
    border: 1px solid transparent;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: .25rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    text-decoration: none;
}

.btn-primary {
    color: #fff !important;
    background-color: #007bff;
    border-color: #007bff;
    box-shadow: none;
}

</style>

</head>
<body>

    <div style="width:600px;margin:0 auto;padding:0;border:2px solid #25b5ff;padding:10px; border-radius: 13px;">
    <table width="600" border="0" cellspacing="0">
        <tbody>
            {{-- <tr bgcolor="#25b5ff"> --}}
            <tr>
                <td align="center" valign="top" style="font-weight:bold;font-size:13px;padding:10px; border-bottom: 2px solid #25b5ff;">

                <img src="{{ (!empty(getSetting('logo'))) ? asset('public/common_img/'.getSetting('logo')) : asset('public/common_img/logo.png') }}" alt="{{ env('APP_NAME') }}" border="0" height="75px" width="180px" />

                </td>
            </tr>
            <tr><td colspan="2" valign="top">&nbsp;</td></tr>
            <tr>
                <td style="font-size:14px;padding-left:12px">
                  {{-- <center><h1>Welcome to Registered-Doctor.com</h1></center> --}}
<br>

@if($user->role == 2)
<p>Dear Doctor</p>

<p> To complete prescription verify your id please click below button</p>

{{-- <p>1. <a href="{{route('termsCondition','doctor')}}">Terms & Conditions</a></p>
<p>2. You have appropriate professional indemnity in place whenever you advise a patient
<p>3. You will read the relevant guidelines from the Handy Documents section of your account before accepting any patient - as a minimum all doctors must read general guidance and safeguarding, prescribers must read the prescribing guide.  It is your responsibility to regularly re-read these every few months to stay up-to-date.
<p>4. When you advise an adult patient (aged 18 or above) you must have up-to-date adult safeguarding training (UK level 3 or equivalent)*</p>
<p>5. When you advise a child (aged less than 18) you must have up-to-date child safeguarding training (UK level 3 or equivalent)*</p>

<b>* If you are employed as a clinician in the UK (eg by the NHS or a private clinic) you will ordinarily have done these safeguarding courses depending on whether you see adults and/or child patients - if unsure check with your employer. Online Safeguarding guidance will also be found in the Handy Documents section.</b>

<p>When you click below you will be given access to your personal account where you are required to complete as a minimum the mandatory fields under your profile - shortly thereafter you will given practicing rights on the website and receive a confirmatory email.<p>

<p>Click here to accept the above</p> --}}

<br>
<center>
  <a class="btn btn-primary"  href="{{ route('doctor.video-call-pres', 'invite'.$case_id) }}">Video Verify</a>
</center>
@else
<p>Dear Patient</p>

<p> To complete prescription verify your id please click below button</p>

{{-- <p><a href="{{route('termsCondition','pharmacist')}}">Terms & Conditions</a></p> --}}
{{-- <p>2. <a href="{{route('privacyPolicy')}}">Privacy policy </a></p> --}}


{{-- <p>When you click the submit button below you will be given access to your personal account where you fill in the mandatory fields. An administrator will then give you pharmacy rights on the website.</p> --}}

<br>
<br>
<center>
  <a class="btn btn-primary"  href="{{ route('patient.video-call-pres', $case_id) }}">Video Verify</a>
</center>


@endif







</td>
            </tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td style="font-weight:bold;font-size:12px;padding-left:12px"><p>Thanks & Regards,<br />{{env('APP_NAME')}}</p></td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr bgcolor="#25b5ff">
                <td style="font-weight:bold;font-size:12px;padding-left:12px">
                    <p style="background:#25b5ff;font-size:12px;text-align:center;padding:10px;border-top:1px solid #000;color:#FFFFFF;">Please do not reply to this email, as this is an unmonitored email address. You can contact to <span style="color: #FFFFFF;">{{env('SITE_EMAIL')}}</span> for any related query.<br />&copy; {{ env('APP_NAME') }} @php
                        echo date('Y');
                    @endphp</p>
                </td>
            </tr>
        </tbody>
    </table>
</div>


</body>

</html>

@php
// exit;
@endphp
