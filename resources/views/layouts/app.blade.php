<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>KSG - Performance Recognition Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Clean responsive bootstrap website template">
    <meta name="author" content="">
    <!-- styles -->
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap-responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/docs.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/prettyPhoto.css"') }} " rel="stylesheet">
    <link href="{{asset('assets/js/google-code-prettify/prettify.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/flexslider.css')}}" rel="stylesheet">
    <link href="{{(asset('assets/css/refineslide.css'))}}" rel="stylesheet">
    <link href="{{(asset('assets/css/font-awesome.css'))}}" rel="stylesheet">
    <link href="{{(asset('assets/css/animate.css'))}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700" rel="stylesheet">

    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/color/default.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">

    <!-- fav and touch icons -->
    <link rel="shortcut icon" href="{{ asset('assets/ico/logo.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}">

    <link href="http://allfont.net/allfont.css?fonts=book-antiqua" rel="stylesheet" type="text/css"/>
    <style>
        body {
            font-family: 'Book Antiqua', arial;
            font-size: 16px;
        }

        .vl {
            border-left: 6px solid green;
            height: 500px;
        }
    </style>
    @stack('styles')
</head>

<body>
<header>
    <div class="cbp-af-header">
        <div class=" cbp-af-inner">
            <div class="container">
                <div class="row">

                    <div class="span4">
                        <!-- logo -->
                        <div class="logo">
                            <h1>
                                <a href="{{ route('index') }}">
                                    <img src="{{ asset('assets/img/KSG.png') }}" alt="logo" width="140px">
                                </a>
                            </h1>
                            <!--<img src="assets/img/logo.png" alt="" />-->
                        </div>
                        <!-- end logo -->
                    </div>

                    <div class="span8">
                        <!-- top menu -->
                        <div class="navbar">
                            <div class="navbar-inner">
                                <nav>
                                    <ul class="nav topnav">
                                        @guest
                                            <li class="dropdown active">
                                                <a href="{{ route('index') }}">Home</a>
                                            </li>
                                        @else
                                            <li class="dropdown active">
                                                <a href="{{ route('home') }}">Home</a>
                                            </li>
                                           <!-- <li>
                                                <a href="{{ route('nominations', 'most-improved-employee-award') }}"
                                                   style="color:black">Individual Awards</a>
                                            </li> -->
                                           <!-- <li>
                                                <a href="{{ route('team-awards') }}"
                                                   style="color:black">Team Awards</a>
                                            </li>-->

                                            @if(auth()->user()->is_admin)
                                                <li>
                                                    <a href="{{ route('update-user-password') }}"
                                                       style="color:black">Update User Password</a>
                                                </li>
                                            @endif

                                        @endguest

                                        <li>
                                            <a href="{{ route('faqs') }}" style="color:black">FAQs</a>
                                        </li>
                                        @guest
                                            <li>
                                                <a href="{{ route('register') }}"
                                                   style="color:black"><strong>Register</strong></a>
                                            </li>
                                            <!-- <li>
                                                <a href="{{ route('login') }}"
                                                   style="color:black"><strong>Login</strong></a>
                                            </li> -->
                                        @else
                                            <li>
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();"
                                                   style="color:black"><strong>Logout</strong></a>
                                            </li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- end menu -->
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>
{{--Logout form--}}
<form id="logout-form" action="{{ route('logout') }}" method="POST"
      style="display: none;">
    @csrf
</form>
@yield('content')

<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/modernizr.js') }}"></script>
<script src="{{ asset('assets/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('assets/js/google-code-prettify/prettify.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/js/jquery.prettyPhoto.js') }}"></script>
<script src="{{ asset('assets/js/portfolio/jquery.quicksand.js') }}"></script>
<script src="{{ asset('assets/js/portfolio/setting.js') }}"></script>
<script src="{{ asset('assets/js/hover/jquery-hover-effect.js') }}"></script>
<script src="{{ asset('assets/js/jquery.flexslider.js') }}"></script>
<script src="{{ asset('assets/js/classie.js') }}"></script>
<script src="{{ asset('assets/js/cbpAnimatedHeader.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.refineslide.js') }}"></script>
<script src="{{ asset('assets/js/jquery.ui.totop.js') }}"></script>

<!-- Template Custom Javascript File -->
<script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>
