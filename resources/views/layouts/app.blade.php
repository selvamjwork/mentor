<!DOCTYPE html>
<html lang="{!!  app()->getLocale()  !!}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{!!  csrf_token()  !!}">

    <title>Mentor</title>

    <!-- Styles -->
    <!-- <link href="{!!  asset('css/app.css')  !!}" rel="stylesheet"> -->
    <link id="callCss" rel="stylesheet" href="/themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="/themes/css/base.css" rel="stylesheet" media="screen"/>
    <!-- Bootstrap style responsive -->	
    <link href="/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
    <link href="/themes/css/font-awesome.css" rel="stylesheet" type="text/css">
    <!-- Google-code-prettify -->	
    <link href="/themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
    <!-- fav and touch icons -->
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/themes/images/ico/apple-touch-icon-57-precomposed.png">
    <style type="text/css" id="enject"></style>
</head>
<body>
    <div id="header">
        <div id="id1" class="hidden">
            <nav class="navbar navbar-default">
                <div class="container">
                    <center>
                        <a href="{!!  url('/admin/login')  !!}">
                            Go to Admin page
                        </a>
                    </center>
                </div>
            </nav>
        </div>
        <div class="container">
            <div id="welcomeLine" class="row">
            @guest
            <br>
            @else
                <div class="span6">Welcome!<strong> {!! Auth::user()->name !!}</strong></div>
            @endguest
            </div>
            <!-- Navbar ================================================== -->
            <div id="logoArea" class="navbar">
                <a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-inner">
                    <a class="brand" href="{!!  url('/')  !!}"><img src="/img/logo-copy1.jpg" alt="Bootsshop"/></a>
                    <ul id="topMenu" class="nav pull-right">
                        @guest
                            <li class=""><a href="{!!  route('login')  !!}">Login</a></li>
                            <li class=""><a href="{!!  route('register')  !!}">Register</a></li>
                            <li class=""><a href="#">Contact</a></li>
                        @else`
                            <li class=""><a href="#">Contact</a></li>
                            <li>
                                <a href="{!!  route('logout')  !!}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{!!  route('logout')  !!}" method="POST" style="display: none;">{!!  csrf_field()  !!}</form>
                            </li>
                        @endguest 
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="span12">
                @if (session('status'))
                    <div class="alert alert-success">
                        {!!  session('status')  !!}
                    </div>
                @endif
                @if (session('msg'))
                    <div class="alert alert-success">
                        {!!  session('msg')  !!}
                    </div>
                @endif
                @yield('content')
            </div>
        </div>
    </div>

    <div class="container">
        <div  id="footerSection">
            <div class="row">
                <p style="margin: 0 50px 0px" class="pull-left">&copy; All Rights Reserved <a href="/privacy">Privacy Policy</a> <a href="/terms">Terms and Conditions</a> <a href="/payment">Payment Policy</a></p>
                <p style="margin: 0 50px 0px" class="pull-right">Developed By <a href="http://www.ickonsystems.in">Ickon</a></p>
            </div>            
        </div>
    </div>

    <!-- Scripts -->
    <!-- <script src="{!!  asset('js/app.js')  !!}"></script> -->
    <!-- Placed at the end of the document so the pages load faster ============================================= -->
    <script src="/themes/js/jquery.js" type="text/javascript"></script>
    <script src="/themes/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/themes/js/google-code-prettify/prettify.js"></script>
    <script src="/themes/js/bootshop.js"></script>
    <script src="/themes/js/jquery.lightbox-0.5.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
    <script src="/js/jquery.jkey.js"></script>
    <script type="text/javascript">
        $(document).jkey('alt+a',function(){
            var hasClass = document.getElementById("id1").classList.contains('hidden');
            if (hasClass === true) {
                document.getElementById("id1").classList.remove("hidden");
            } else {
                document.getElementById("id1").classList.add("hidden");
            }
        });
    </script>
</body>
</html>
