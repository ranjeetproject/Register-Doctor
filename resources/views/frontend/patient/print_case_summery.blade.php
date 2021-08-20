<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Case Summery</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
        }

    </style>

</head>

<body>
    <div
        style="float: left; max-width: 650px;  width: 100%; padding: 30px; background-color: #ffffff; box-shadow: 0px 0px 3px #cccccc; box-sizing: border-box;">
        <div style="float: left; width: 100%; box-sizing: border-box; text-align: center;"><img src="{{ asset('public/images/frontend/images/logo.jpg') }}" alt=""
                style="max-width: 220px;"><br></div>
        <div style="float: left; box-sizing: border-box; width: 100%; font-size: 16px; ">
            <span style="float: left;">Case Id : <span style="border-bottom: 2px dashed #000;">{{ ($summary)? $summary->patient_case_id : '' }}</span> </span>
            <span style="float: right;">Date : <span style="border-bottom: 2px dashed #000;"></span>{{ ($summary)? date('d-m-Y',strtotime($summary->created_at)) : '' }} </span>
        </div>
        <div style="float: left; box-sizing: border-box; width: 100%; font-size: 16px; margin-bottom: 16px;">
            <p>This patient sought online advice from a doctor.</p>
        </div>
        @php
            $user = Auth::guard('sitePatient')->user();
            $user_profiles = $user->profile()->first();
            $doctor = $case_detail->doctor()->first();
            $doctor_profile = $doctor->profile()->first()
            // dump($user, $user_profiles);
        @endphp
        <div style="float: left; box-sizing: border-box; width: 100%; font-size: 16px; margin-bottom: 16px;">
            <span style="float: left;">Patient name : {{ $user->name }} </span>
            <span style="float: right;">Unique Patient no. <span
                    style="border-bottom: 2px dashed #000;">{{ $user->UPN }}</span></span>
        </div>
        <div style="float: left; box-sizing: border-box; width: 100%; font-size: 16px; ">
            <span style="float: left;">Date of birth (DOB) : {{ $user_profiles->dob }}</span>
            <span style="float: right;">Address : {{ $user_profiles->address }}</span>
        </div>
        <div
            style="float: left; box-sizing: border-box; width: 100%; border-bottom: 1px solid #0051af; padding: 10px; margin-bottom: 10px;">

        </div>
        <div
            style="float: left; box-sizing: border-box; width: 100%; font-size: 16px; margin-bottom: 16px; min-height: 60px;">
            <span style="float: left; width:180px; color: #294876;">Summary Diagnosis :</span> <span
                style="float: left; width: calc(100% - 180px);">
                {{ ($summary)? $summary->summary_diagnose }}
                {{-- But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born
                and I will give you a complete account of the system, and expound the actual teachings of the great
                explorer of the truth, the master-builder of human happiness.  --}}
            </span>
        </div>
        <div style="float: left; box-sizing: border-box; width: 100%; font-size: 16px; margin-bottom: 16px;">
            <span style="float: left; width:180px; color:#294876">Future Reference :</span> <span
                style="float: left; width: calc(100% - 180px);">
                {{ ($summary)? $summary->summary_diagnose }}
                {{-- But I must explain to you how all this mistaken idea of
                denouncing pleasure and praising pain was born and I will give you a complete account of the system, and
                expound the actual teachings of the great explorer of the truth, the master-builder of human
                happiness. --}}
            </span>
        </div>
        <div style="float: left; box-sizing: border-box; width: 100%; font-size: 16px;">
            <span style="float: left; width:180px; color: #000000;">Signed<br> Dr Jhon Smith <br> GMC No. {{  $doctor_profile->dr_gmc_licence }} </span>
            <span
                style="float: left; width: calc(100% - 180px); text-align: right; margin-top: 40px;">Registered-Doctor.com
                No. {{ $doctor_profile->dr_registered_no }}</span>
        </div>
        <div style="float: left; box-sizing: border-box; width: 100%; font-size: 16px; text-align: center; font-weight: 700;">
            <p style="color: #0075c9; margin-bottom: 0px;">Registered-Doctor.com 22 Dean Road, London SW12 2DE</p>
        </div>
    </div>
    <script language='javascript'>
        function happycode(){
        //    alert('helo');
           window.print();
        }
    </script>
    <script>
        //call after page loaded
        window.onload=happycode ;
    </script>
</body>

</html>
