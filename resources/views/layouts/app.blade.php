<?php
echo '<!--
  *########################################################################################
  * First Open Source Online Treasure Hunt Build On Laravel Framework
  *
  *  Project Details
  *  ===============
  *  Project Creator: Bharath Devasani (Co-Founder of Zoisoft)
  *  Twitter: @BharathDevasani
  *  Facebook: http://www.facebook.com/bharath.devasani
  *  GitHub: https://github.com/bharathdevasani/Treasure-Hunt-Laravel/



  * You\'re free to use this code for any project, but you should follow the license given below.
    If you need any help with the code, or details about how to install it, feel free
    to ping me on Facebook or Twitter. Cheers!
  *
  *########################################################################################

*/ -->';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/curso.css')}}">
    <link rel="stylesheet" href="{{asset('css/trumbowyg.min.css')}}">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Z-Hunt
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="leaderboard">Leaderboard</a></li>
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @elseif(Auth::user()->role > 1)
                        <li><a href={{ url('/leaderboard') }}>Leaderboard</a></li>
                        <li><a href="admin/level/new">Add Level</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @else
                        <li><a href="leaderboard">Leaderboard</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')


    <footer>
        <div class="row-fluid">
            <div class="container">
                <div class="col-md-6">
                    <h2 class="text-center croisant">
                        Z-Hunt <br>
                        <small>By Bharath Devasani</small>
                    </h2>
                    <p class="text-center white">
                        &copy; <?php echo date('Y') ?><a  href="http://www.zoisoft.com" class="white"> Zoisoft Pvt Ltd.</a>
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="col-md-6">
                        <legend class="text-center">Contact</legend>
                        <p class="white text-center"><i class="fa fa-envelope"></i> bharath@zoisoft.com</p>
                        <p class="white text-center"><i class="fa fa-twitter"></i> @BharathDevasani</p>
                    </div>
                    <div class="col-md-6">
                        <legend class="text-center">Important Links</legend>
                        <p class="white text-center"><a href="/about" class="white"target="_blank"> About</a></p>
                        <p class="white text-center"><a href="/leaderboard" class="white"target="_blank"> LeaderBoard</a></p>
                        <p class="white text-center"><a href="/rules" class="white"target="_blank"> Rules</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/animatescroll.min.js')}}"></script>
    <script src="{{asset('js/trumbowyg.min.js')}}"></script>
    <script>
        $(window).scroll(function() {
            /* Act on the event */
            if ($(this).scrollTop() > 500) {
                $('#navi').removeClass('hide');
                $('#navi').addClass('navbar-fixed-top');
            }
            else{
                $('#navi').removeClass('navbar-fixed-top');
                $('#navi').addClass('hide');
            };
        });
    </script>

    <?php echo '<!---'; ?> @yield('html_comment') <?php echo '----->'; ?>
</body>
</html>
