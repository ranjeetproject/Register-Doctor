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
                  <center><h1>Welcome to Registered-Doctor.com</h1></center>
<br>

{{-- Hi, {{$user->name}} --}}

@if($user->role == 1)
Please read and accept:
<br>
<p><a href="{{route('termsCondition')}}"> Terms & Conditions</a></p>

{{-- <p>2. <a href="{{route('privacyPolicy')}}">Privacy policy</a></p> --}}

Click the link below to activate your account 
<center>
  <a class="btn btn-primary"  href="{{ route('email-verification', Crypt::encrypt($user->id)) }}">Click to verify</a>
 </center>
 <br>
 Please watch your email  - also  watch your junk mail and whitelist Registered-Doctor.com 

@endif

@if($user->role == 2)

<b>PLEASE READ CAREFULLY</b>

<p>On clicking the activation link below you will be asked to upload a copy of your GMC licence to practice medicine (or equivalent for non-UK doctors). <p>

<p>You can download a copy from your GMC online account. Attach a screenshot (e.g. JPEG) or the PDF. We will then check your details. Please watch your email and junk mail - whitelist Registered-Doctor.com.</p> 

<p>We usually verify details within 2 working days. Contact admin@registered-doctor.com if you have any queries.</p>

<p>Click the link below to activate your account</p>

<br>
<center>
<a class="btn btn-primary"  href="{{ route('email-verification', Crypt::encrypt($user->id)) }}">Click to verify</a>
</center>
<br>

{{-- <p>Please watch your email as we will email you details on how to register as a healthcare professional   - also  watch your junk mail and whitelist Registered-Doctor.com </p> --}}

@endif

@if($user->role == 3)
<p>Thank you for your interest in registering as one of our linked Pharmacies.</p>

<p>Please send us your pharmacy address and a contact phone number to Admin@Registered-Doctor.com.</p>

<p>We are mainly interested in pharmacies with locations covering areas we have not yet covered or those with extended opening hours and online pharmacists</p>

<p>We will be in touch shortly if you meet one of our current criteria so please watch your email - also  watch your junk mail and whitelist Registered-Doctor.com</p>

<br>
<center>
<a class="btn btn-primary"  href="{{ route('email-verification', Crypt::encrypt($user->id)) }}">Click to verify</a>
</center>

@endif



{{-- <br>
<br>
 Than you for your Registration. Your verification link given below.
<br>
<br> --}}
 {{-- @component('mail::button', ['url' => route('email-verification', Crypt::encrypt($user->id)) ]) --}}
 
 

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
{{-- <script type="text/javascript">
    function myFunction() {
      var x = document.getElementById("tr_con").required;

      document.getElementById("demo").innerHTML = x;
    }
</script> --}}
</html>

{{-- @php
exit;
@endphp --}}