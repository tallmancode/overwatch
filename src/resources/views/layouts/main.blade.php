<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="none" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="admin login">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}
        @if(View::hasSection('page-title'))
         - @yield('page-title')
        @endif
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ overwatch_asset("css/fonts.css")}}">
    <link rel="stylesheet" href="{{ overwatch_asset("css/app.css")}}">
    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">

    @yield('styles')
</head>
<body>
    <div class="main">
        <div class="sidebar-wrap">
            <div class="logo-container">
                <img src="{{ overwatch_asset("images/overwatch-logo.png")}}">
            </div>
            <div class="links-wrap">
                <ul class="side-nav">
                    {!! $OverWatchNav->asLi() !!}
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="icon-cog-outline"></i>
                            <span class="title">Settings</span>
                        </a>
                    </li>

                </ul>
            </div>
            <div class="footer-wrap">
                    <ul class="side-nav">
                        <li id="user-nav" class="dropdown">
                            <div class="dropdown-element">
                                <ul class="slide-out">
                                    <li>
                                        <a class="nav-link" href="{{ route('overwatch.logout') }}">
                                            <i class="icon-export"></i>Log Out
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link">
                                            <i class="icon-news"></i>Profile
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <a target="_self" data-toggle="expand" class=" nav-link toggle">
                                <img src="{{ overwatch_asset("images/defualt-avatar.jpg")}}" alt="{{ ucwords(app('OverWatchAuth')->user()->name) }} Avatar">
                                <h4>{{ ucwords(app('OverWatchAuth')->user()->name) }}</h4>
                            </a>

                        </li>
                    </ul>
            </div>

        </div>
        <div class="main-panel">
            @include('OverWatch::breadcrumbs.index')
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ overwatch_asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="{{ overwatch_asset('js/overwatch-scripts.js') }}"></script>
    @yield('scripts')
    <script type="text/javascript">
        $('.side-nav a').on('click', function(){
            if($(this).data('toggle')){

                let dropdownElement =  $(this).siblings('.dropdown-element');
                let slideOutHeight = dropdownElement.children('.slide-out').height();

                if($(this).data('toggle') == 'expand'){

                    dropdownElement.css({height : slideOutHeight});
                    $(this).data('toggle', 'collapse');

                }else if($(this).data('toggle') == 'collapse'){

                    dropdownElement.css({height : 0});
                    $(this).data('toggle', 'expand');

                }

            }
        });

       /* $('.btn-link').on('click',function(){
            $(this).toggleClass('is-active');
        });*/
    </script>
</body>
</html>
