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
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
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
                    <td align="center" valign="top"
                        style="font-weight:bold;font-size:13px;padding:10px; border-bottom: 2px solid #25b5ff;">

                        <img src="{{ !empty(getSetting('logo')) ? asset('public/common_img/' . getSetting('logo')) : asset('public/common_img/logo.png') }}"
                            alt="{{ env('APP_NAME') }}" border="0" height="75px" width="180px" />

                    </td>
                </tr>
                <tr>
                    <td colspan="2" valign="top">&nbsp;</td>
                </tr>
                <tr>
                    <td style="font-size:14px;padding-left:12px">
                        {{-- <center><h1>Welcome to Registered-Doctor.com</h1></center> --}}
                        <br>

                        <p>Dear {{ $doctor->name }}</p>

                        <p> Happy New year, you availability remaining as earlier such as
                            @foreach ($doctor->weeklyAvailableDays as $weekly_availity)
                            {{ $weekly_availity->day .' '. $weekly_availity->from_time .' to '.$weekly_availity->to_time }}
                            @endforeach
                            you can maintain same time frame or you can change as per your wish</p>

                        {{-- <br>
                        <center>
                            <a class="btn btn-primary"
                                href="{{ route('doctor.video-call-pres', [$case_id, $patient_id]) }}">Video
                                Verify</a>
                        </center> --}}
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td style="font-weight:bold;font-size:12px;padding-left:12px">
                        <p>Thanks & Regards,<br />{{ env('APP_NAME') }}</p>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr bgcolor="#25b5ff">
                    <td style="font-weight:bold;font-size:12px;padding-left:12px">
                        <p
                            style="background:#25b5ff;font-size:12px;text-align:center;padding:10px;border-top:1px solid #000;color:#FFFFFF;">
                            Please do not reply to this email, as this is an unmonitored email address. You can contact
                            to <span style="color: #FFFFFF;">{{ env('SITE_EMAIL') }}</span> for any related
                            query.<br />&copy; {{ env('APP_NAME') }} @php
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
