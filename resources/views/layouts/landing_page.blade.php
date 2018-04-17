<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Blog van Floris</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            /*color: #636b6f;*/
            color: #fff;
            font-family: 'Raleway', sans-serif;
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
            /*color: #636b6f;*/
            color: #fff;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }


        /* ----------------------------------------------
 * Generated by Animista on 2018-3-13 11:13:45
 * w: http://animista.net, t:
        @cssanimista
          * ---------------------------------------------- */

        /**
         * ----------------------------------------
         * animation color-change-2x
         * ----------------------------------------
         */
        .color-change-2x {
            -webkit-animation: color-change-2x 20s linear infinite alternate both;
            animation: color-change-2x 20s linear infinite alternate both;
        }

        @-webkit-keyframes color-change-2x {
            0% {
                background: #b22cff;
            }

            100% {
                background: #19dcea;
            }
        }

        @keyframes color-change-2x {
            0% {
                background: #b22cff;
            }

            100% {
                background: #19dcea;
            }
        }

    </style>
</head>
<body class="color-change-2x">
<a href="https://github.com/Floris/blog" target="_blank" style="color: white; z-index:10; cursor:pointer; position:absolute; margin: 18px 30px;">Github</a>

<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Bezoek Blog</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                {{--<a href="{{ route('register') }}">Register</a>--}}
                @endauth
        </div>
    @endif

    @yield('content')

</div>
</body>
</html>


