<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>JIRA Notifications</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #5d6771;
                color: #ed7800;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                font-size: 80px;
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

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            @media (max-width: 768px) {
                html, body {
                    font-size: 1rem;
                }
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div id="root" class="content">

                <h1>JIRA Tasks Completed Today</h1>

                <h1 id="counter">{{ $count }}</h1>

                <audio id="audio" src="" type="audio/mp3"></audio>

            </div>
        </div>
    </body>
</html>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
