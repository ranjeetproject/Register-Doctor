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
            Receive form Get in touch
        </div>
        <div style="float: left; box-sizing: border-box; width: 100%; border-bottom: 1px solid #0051af; padding: 10px; margin-bottom: 10px;">

        </div>
        <div style="float: left; box-sizing: border-box; width: 100%; font-size: 16px; margin-bottom: 16px;">
            <span style="float: left; width: 100%;"><strong>Name</strong> : Jon doe</span>
        </div>
        <div style="float: left; box-sizing: border-box; width: 100%; font-size: 16px; margin-bottom: 16px;">
            <span style="float: left; width: 100%;"><strong>Contact No</strong> : +91 8698895986</span>
        </div>
        <div style="float: left; box-sizing: border-box; width: 100%; font-size: 16px; margin-bottom: 16px;">
            <span style="float: left; width: 100%;"><strong>Email Address</strong> : jondoe@gmail.com</span>
        </div>
        <div style="float: left; box-sizing: border-box; width: 100%; font-size: 16px; margin-bottom: 16px;">
            <p>
                At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.
            </p>
        </div>
    </div>
</body>
</html>
