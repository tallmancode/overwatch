<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="none" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="admin login">
    <title>OverWatch - Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ overwatch_asset("css/fonts.css")}}">
    <link rel="stylesheet" href="{{ overwatch_asset("css/app.css")}}">
    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">

    <style>
        .login-button{
            display: block;
            text-align: center;
            text-decoration: none;
            color: #eee;
            width:40%;
            font-family: Open Sans,sans-serif;
            font-weight: 100;
            padding: 12px 20px;
            border-radius: 1px;
            outline: none!important;
            border: 0;
            border-radius: 2px;
            font-size: 13px;
            font-weight: 400;
            text-transform: uppercase;
            transition: 0.6s;
            background: #3b70de; /* Old browsers */
            background: -moz-linear-gradient(-45deg, #3b70de 0%, #409ced 40%, #88cffc 100%); /* FF3.6-15 */
            background: -webkit-linear-gradient(-45deg, #3b70de 0%,#409ced 40%,#88cffc 100%); /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(135deg, #3b70de 0%,#409ced 40%,#88cffc 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3b70de', endColorstr='#88cffc',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
            background-size: 200% auto;
        }
        .login-button:hover{
            background-position: right center;
            color:#fff;
        }
        .hidden {
            display: none!important;
        }
        .login-container input{
            border-top:0;
            border-right:0;
            border-left:0;
            border-radius: 0;
        }
        .login-sidebar{
            background-color: #fff;
        }
        .main-panel{
            background-image: url('{{ overwatch_asset("images/bg.jpg")}}');
            min-height: 100vh;
            margin: 0;
            padding: 0;
            font-family: Open Sans,sans-serif;
            background-size: cover;
            -moz-background-size: cover;
            -ms-background-size: cover;
            -webkit-background-size: cover;
            background-position: 50%;
            background-repeat: no-repeat;
            overflow: hidden;
        }
        .logo-wrap{
            position: absolute;
            bottom: 5%;
            left: 5%;
            max-width:150px;
        }
        .start-bg{
            height: 0vh;
        }
        .start-logo-wrap{
            display:none;
        }

        .logo-shimmer{
            position: absolute;
            top: 0;
            height:100%;
            width:450%;
            background-size: 30% 100%;
            background: linear-gradient(120deg, rgba(0,0,0,1) 45%, rgba(0,0,0,0.5) 50%, rgba(0,0,0,1) 55%);
            animation: animate-shimmer 5s linear ;
            opacity: 0;
        }
        .animate-logo-wrap img, .logo-wrap img{
            width:100%;
        }

        @keyframes animate-shimmer {
            0% {
                left: -350%;
                opacity: 1;
            }
            70% {
                left: 0;
                opacity: 1;
            }
            80%{
                opacity:0.6;
            }
            100% {
                opacity: 0;
            }
        }
        @keyframes animate-fade {
            0%{
                opacity: 1;
                height:100vh;
            }
            99%{
                opacity: 0;
                height:100vh;
            }
            100%{
                opacity: 0;
                height:0vh;
            }
        }
        @keyframes animate-logo {
            0%{
                bottom: 45%;
                left: 36%;
                max-width:400px;

            }
            30%{
                bottom: 5%;
                left: 5%;
                max-width:150px;

            }
            95%{
                bottom: 5%;
                left: 5%;
                max-width:150px;

            }
            100%{
                bottom: 5%;
                left: 5%;
                max-width:150px;
            }
        }
    </style>

    @if($errors->isEmpty())
        <style>
            .animate-bg{
                height: 100vh;
                position: absolute;
                top:0;
                bottom:0;
                width: 100%;
                background-color: #000;
                opacity:1;
                animation: animate-fade 2s forwards;
                -webkit-animation-delay: 6.5s; /* Chrome, Safari, Opera */
                animation-delay: 6.5s;
                z-index: 3;
            }
            .animate-logo-wrap{
                display: block;
                max-width:400px;
                position: absolute;
                bottom:45%;
                left: 36%;
                overflow: hidden;
                animation: animate-logo 5s forwards ;
                -webkit-animation-delay: 5s; /* Chrome, Safari, Opera */
                animation-delay: 5s;
            }
        </style>
    @endif

</head>
<body>
    <div class="start-bg animate-bg">
        <div class="start-logo-wrap animate-logo-wrap">
            <img src="{{ overwatch_asset("images/overwatch-logo.png")}}">
            <div class="logo-shimmer"></div>
        </div>
    </div>
    <div class="container-fluid main-panel d-flex  justify-content-end">
        <div class="col-xs-12 col-sm-5 col-md-4 login-sidebar d-flex align-items-center">
            <div class="login-container w-100 p-3">
                <p>Sign In Below:</p>
                <form action="{{ route('overwatch.login') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="controls">
                            <input id="email" name="email" type="text" class="form-control" placeholder="Email">

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="controls">
                            <input name="password" type="password" class="form-control" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group" id="rememberMeGroup">
                        <div class="controls">
                        <input type="checkbox" name="remember" value="1"><span class="remember-me-text">Remember me</span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-block login-button">
                        <span class="signingin hidden"><span class="voyager-refresh"></span> Logging in...</span>
                        <span class="signin">Login</span>
                    </button>
                </form>
                @if(!$errors->isEmpty())
                <div class="alert alert-red">
                  <ul class="list-unstyled">
                      @foreach($errors->all() as $err)
                      <li>{{ $err }}</li>
                      @endforeach
                  </ul>
                </div>
                @endif

            </div>
        </div>
        <div class="logo-wrap">
            <img src="{{ overwatch_asset("images/overwatch-logo.png")}}">
        </div>
    </div>

    <script src="{{ overwatch_asset('js/jquery-3.2.1.min.js') }}"></script>

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
    </script>
</body>
</html>

