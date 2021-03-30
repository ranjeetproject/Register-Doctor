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

    <div style="width:600px;margin:0 auto;padding:0;border:2px solid #f42a6c;padding:10px; border-radius: 13px;">
    <table width="600" border="0" cellspacing="0">
        <tbody>
            {{-- <tr bgcolor="#f42a6c"> --}}
            <tr>
                <td align="center" valign="top" style="font-weight:bold;font-size:13px;padding:10px; border-bottom: 2px solid #f42a6c;">

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

<p>Your medical licence has been successfully verified.  To complete registration please read the following and tick if you agree: </p>

<p>1. <a href="{{route('termsCondition')}}">Ts and Cs </a></p>
<p>2. <a href="{{route('privacyPolicy')}}">Privacy policy </a></p>
<p>3. I will read the relevant guidelines from the Handy Documents section of my account before accepting any patient </p>

<p>Please  confirm:</p>

<p>1. I have appropriate professional indemnity in place</p>
<p>2. For doctors planing to consult adult patients (aged 18 or above) -  I have up to date adult safeguarding training (UK level 3 or equivalent)*</p>
<p>3. For doctors planning to take consults on children (aged less than 18) - I have up to date child safeguarding training (UK level 3 or equivalent)*</p>
<br>

<b>* If you are employed as a clinician in the UK (eg by the NHS or a private clinic) you will ordinarily have done these safeguarding courses depending on whether you see adults and/or child patients - if unsure check with your employer. Online Safeguarding guidance will also be found in the Handy Documents section.</b>
<br>

<p>When you click the submit button below you will be given access to your personal account where you fill in the mandatory fields. An administrator will then give you practicing rights on the website. You can obtain also obtain advice from the Handy Documents section in your menu.</p>

<br>
<center>
  <a class="btn btn-primary"  href="{{ route('accept-term-and-conditions', Crypt::encrypt($user->id)) }}">SUBMIT</a>
</center>

@endif

@if($user->role == 3)
<p>Your  pharmacy licence has been successfully verified.  To complete registration please read the following and click if you agree: </p>

<p>1. <a href="{{route('termsCondition')}}">Ts and Cs </a></p>
<p>2. <a href="{{route('privacyPolicy')}}">Privacy policy </a></p>


<p>When you click the submit button below you will be given access to your personal account where you fill in the mandatory fields. An administrator will then give you pharmacy rights on the website.</p>

<br>
<br>
<center>
  <a class="btn btn-primary"  href="{{ route('accept-term-and-conditions', Crypt::encrypt($user->id)) }}">SUBMIT</a>
</center>

@endif



 

</td>
            </tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td style="font-weight:bold;font-size:12px;padding-left:12px"><p>Thanks & Regards,<br />{{env('APP_NAME')}}</p></td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr bgcolor="#f42a6c">
                <td style="font-weight:bold;font-size:12px;padding-left:12px">    
                    <p style="background:#f42a6c;font-size:12px;text-align:center;padding:10px;border-top:1px solid #000;color:#FFFFFF;">Please do not reply to this email, as this is an unmonitored email address. You can contact to <span style="color: #FFFFFF;">{{env('SITE_EMAIL')}}</span> for any related query.<br />&copy; {{ env('APP_NAME') }} @php
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