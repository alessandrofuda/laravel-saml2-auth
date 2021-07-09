<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel Saml 2.0
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>

                <div class="my-4">
                    use socialite pckg<br><br>
                    (https://docs.microsoft.com/it-it/graph/tutorials/php?WT.mc_id=Portal-Microsoft_AAD_RegisteredApps&tutorial-step=1<br>
                    https://docs.microsoft.com/it-it/azure/active-directory/develop/v2-app-types)<br>
                </div>
                <a class="btn btn-outline-success mt-4" href="{{route('login.azure')}}">Login with MS Azure</a>
                <ul class="text-left mt-5 pt-5">
                    <li>paperino@alessandrofudagmailcom.onmicrosoft.com</li>
                    <li>pluto@alessandrofudagmailcom.onmicrosoft.com</li>
                    <li>pippo@alessandrofudagmailcom.onmicrosoft.com</li>
                    <li class="mt-4">{{env('PASSWORD_PER_TEST_USERS')}}</li>
                </ul>

                @auth
                    <div class="mt-5 pt-5">User logged in:</div>
                    <ul>
                        <li>Name: {{Auth::user()->name}}</li>
                        <li>Email: {{Auth::user()->email}}</li>
                    </ul>
                    <a class="btn btn-secondary" href="{{route('logout.azure')}}">Logout</a>
                @endauth

            </div>
        </div>
    </body>
</html>
