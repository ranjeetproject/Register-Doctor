<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Doctor</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500&display=swap');
        body{
            font-family: 'Roboto', sans-serif;
        }
        </style>

</head>
<body>
    <div style="float: left; max-width: 650px;  width: 100%; padding: 30px; background-color: #ffffff; box-shadow: 0px 0px 3px #cccccc; box-sizing: border-box;">
        <div style="float: left; width: 100%; box-sizing: border-box; text-align: center;">
            <img src="{{ (!empty(getSetting('logo'))) ? asset('public/common_img/'.getSetting('logo')) : asset('public/common_img/logo.png') }}" alt="{{ env('APP_NAME') }}" style="max-width: 220px;">
            <br></div>
        <div style="float: left; box-sizing: border-box; width: 100%; font-size: 20px; margin-bottom: 16px; text-transform: uppercase; text-align: center;">
            Thank you for contact
        </div>
        <div style="float: left; box-sizing: border-box; width: 100%; border-bottom: 1px solid #0051af; padding: 10px; margin-bottom: 10px;">

        </div>
        <div style="float: left; box-sizing: border-box; width: 100%; font-size: 16px; margin-bottom: 16px;">
            <span style="float: left; width: 100%;"><strong>Name</strong> : {{ $contact_us->name }}</span>
        </div>
        <div style="float: left; box-sizing: border-box; width: 100%; font-size: 16px; margin-bottom: 16px;">
            <span style="float: left; width: 100%;"><strong>Contact No</strong> : {{ $contact_us->contact_no }}</span>
        </div>
        <div style="float: left; box-sizing: border-box; width: 100%; font-size: 16px; margin-bottom: 16px;">
            <span style="float: left; width: 100%;"><strong>Email Address</strong> : {{ $contact_us->email_id }}</span>
        </div>
        <div style="float: left; box-sizing: border-box; width: 100%; font-size: 16px; margin-bottom: 16px;">
            <p>
                <strong>
                    We will receive your details and we will respond soon
                </strong>
            </p>
        </div>
        <div style="float: left; box-sizing: border-box; width: 100%; font-size: 16px; text-align: center; font-weight: 700;">
            <p style="color: #0075c9; margin-bottom: 0px;">Registered-Doctor.com 22 Dean Road, London SW12 2DE</p>
        </div>
    </div>
</body>
</html>
