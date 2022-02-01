<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Expired page</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background: url('{{ asset('public/images/frontend/images/expired-bg.jpg') }}') no-repeat;
                background-size: cover;
                background-position: center;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .code {
                border-right: 2px solid;
                font-size: 26px;
                padding: 0 15px 0 15px;
                text-align: center;
            }

            .message {
                font-size: 18px;
                text-align: center;
            }
            .flex-direction-column{
                flex-direction: column;

            }
            .flex-direction-column h2{
                color:#141924;
                font-size: 34px;
            }
            .btn.gh-button {
                padding: 12px 24px;
                border-radius: 50px;
                background: #0351d2;
                background: -moz-linear-gradient(right, #0351d2 0%, #25b5ff 100%);
                background: -webkit-linear-gradient(right, #0351d2 0%, #25b5ff 100%);
                background: linear-gradient(right, #0351d2 0%, #25b5ff 100%);
                border: 0px;
                color: #fff;
                font-size: 18px;
                text-decoration:none;
                font-weight:600;
            }
            .btn.gh-button:hover{
                color: #fff;
                background: #fc490d;
                background: -moz-linear-gradient(left, #fc490d 0%, #e92b02 100%);
                background: -webkit-linear-gradient(left, #fc490d 0%, #e92b02 100%);
                background: linear-gradient(left, #fc490d 0%, #e92b02 100%);
            }
            .btn.gh-button img{
                vertical-align: text-top;
            }
        </style>
    </head>
    <body>
        <div class="flex-center flex-direction-column position-ref full-height">
            <img src="{{ asset('public/images/frontend/images/logo.jpg') }}" alt="">
            <h2>Oops! your page has expired.</h2>
            <a href="{{ route('home') }}" class="btn gh-button"><img src="{{ asset('public/images/frontend/images/home-icon.png') }}" alt=""> Back to home</a>
        </div>
    </body>
</html>
