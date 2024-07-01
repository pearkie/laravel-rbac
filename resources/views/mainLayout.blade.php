<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page-title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        * {
            font-family: calibri;
            font-size: 1.3rem;
        }

        .auth-labels {
              display:inline-block;
              width: 8em;
        }

        .auth-textbox {
            /* display: inline-block; */
            margin-bottom: .5em;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col text-end">
                <div class="fs-6">
                    @if(Auth::check())
                       {{ Auth::user()->userInfo->user_firstname.' '.Auth::user()->userInfo->user_lastname }}
                       <span class="fs-6" style="font-weight: bold;">
                       @if(Auth::user()->hasRole('admin'))
                          : Admin User
                       @else
                          : User
                       @endif
                       </span>
                       @include('slugs.logout')
                    @endif
                 </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                @if(!Auth::check())
                    @yield('auth-content')
                @else
                    @yield('page-content')
                @endif
            </div>
        </div>
    </div>
</body>
</html>
