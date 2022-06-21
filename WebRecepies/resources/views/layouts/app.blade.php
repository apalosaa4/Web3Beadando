<?php
use App\User;
use Illuminate\Http\Request;use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="pragma" content="no-cache">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--THIS DISABLES BROWSER CACHE! ONLY USE IN DEVELOPMENT! REMOVE IN PRODUCTION!!!-->
        <meta http-equiv="cache-control" content="max-age=604800">
        <!--Mostly the same, but this needed for Opera. ONLY USE IN DEVELOPMENT! REMOVE IN PRODUCTION!!!-->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--IExplorer-CSS compatibility-->
    
        <title>FreeFromForum</title>
    
        <!-- jQuery, JS framework for easy frontend development, we don't want to learn Vue.js now -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
        <!-- Bootstrap files, so we don't have to write @media tags in css-->
    {{--    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>--}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
        <!-- Font awesome, small icon-like things, google for it -->
        <script src="https://kit.fontawesome.com/07049bce1e.js" crossorigin="anonymous"></script>
    
        <!-- custom css -->
        <link href="{{ URL::asset('css/ui.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('css/responsive.css') }}" rel="stylesheet" media="only screen and (max-width: 1200px)">
    
        <!-- custom javascript -->
        <script src="{{ URL::asset('js/global.js') }}" type="text/javascript"></script>
    
        <script type="text/javascript">
            //This is here mostly for IExplorer-jQuery compatibility, useful if we need some js BEFORE the site loads
            $(document).ready(function() {
                // jQuery code if needed (pretty sure this will stay empty)
            });
        </script>
    </head>
</head>

<body data-gr-c-s-loaded="true">
<!--Header starts here, this will be the same for every page-->
<header class="section-header">
    <section class="header-main border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-4">
                    <a href="{{ route('welcome') }}" class="brand-wrap" style="color: rgba(53, 137, 206, 0.687)">
                        <h1 class="text-nowrap">FreeFromForum</h1>
                    </a>
                    <!-- brand-wrap END -->
                </div>
                <div class="col-lg-8 col-sm-8 col-12">
                    <div class="widgets-wrap float-md-right">
                        <div class="widget-header icontext">
                            <a href="{{ Auth::check() ? route('profile') : route('login') }}" class="icon icon-sm rounded-circle border"><i class="fas fa-user"></i></a>
                            <div class="text">
                                <span class="text-muted">Welcome <!--, { { Auth::check() ? Auth::id()->name : 'guest' }}-->!</span>
                                <div>
                                    @auth()
                                        <a href="{{ route('signout') }}" style="color: rgba(140, 63, 187, 0.892)"> Logout</a>
                                    @else
                                        <a href="{{ route('login') }}" style="color: rgba(140, 63, 187, 0.892)">Sign in</a> |
                                        <a href="{{ route('register')}}" style="color: rgba(140, 63, 187, 0.892)"> Register</a>
                                    @endauth
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- widgets-wrap END -->
                </div>
                <!-- col END -->
            </div>
            <!-- row END -->
        </div>
        <!-- container END -->
    </section>
    <!-- header-main  END -->
</header>
<!-- section-header END -->

<!-- Navbar starts here. This is same too -->
<nav class="navbar navbar-main navbar-expand-lg navbar-light border-bottom">
    <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
<?php //$routes = collect(\Route::getRoutes())->map(function ($route) { return $route->uri(); }); dd($routes); ?>
        <div class="collapse navbar-collapse" id="main_nav">
            <ul class="navbar-nav">
                <li class="nav-item  {{ strpos(\Route::currentRouteName(), "welcome") === false ? '' : 'active' }}">
                    <a class="nav-link" href="{{ route("welcome") }}">{{ strpos(\Route::currentRouteName(), "welcome") === false ? '' : '> ' }} Home</a>
                </li>
                <li class="nav-item nav-link"> | </li>
                <li class="nav-item {{ strpos(\Route::currentRouteName(), "recepie") === false ? '' : 'active' }}">
                    <a class="nav-link" href="{{ route("recepie") }}">{{ strpos(\Route::currentRouteName(), "recepie") === false ? '' : '> ' }} Recepies</a>
                </li>
                <li class="nav-item nav-link"> | </li>
                <li class="nav-item {{ strpos(\Route::currentRouteName(), "forum") === false ? '' : 'active' }}">
                    <a class="nav-link" href="{{ route("forum") }}">{{ strpos(\Route::currentRouteName(), "forum") === false ? '' : '> ' }} Forum</a>
                </li>
                <li class="nav-item nav-link"> | </li>
                <li class="nav-item {{ strpos(\Route::currentRouteName(), "add") === false ? '' : 'active' }}">
                    <a class="nav-link" href="{{ route("add") }}">{{ strpos(\Route::currentRouteName(), "add") === false ? '' : '> ' }} New Recipe</a>
                </li>
            </ul>
        </div>
        <!-- collapse  END -->
    </div>
    <!-- container  END -->
</nav>

<!-- navbar END -->

<!-- ========================= ACTUAL CONTENT STARTS HERE ========================= -->

@yield('content')

<!-- ========================= END CONTENT ========================= -->

<!-- FOOTER STARTS HERE THIS WILL BE THE SAME ON ALL PAGES! -->
<!-- ========================= FOOTER ========================= -->
<footer class="section-footer border-top">
    <div class="container">
        <section class="footer-top padding-y"><br>
            <div class="row">
                <aside class="col-md col-6">
                    <h6 class="title" style="color: rgba(53, 137, 206, 0.687)">Shops</h6>
                    <ul class="list-unstyled">
                        <li style="color: rgba(140, 63, 187, 0.892)">Eger</li>
                        <li style="color: rgba(140, 63, 187, 0.892)">Budapest</li>
                        <li style="color: rgba(140, 63, 187, 0.892)">Opening Soon</li>
                    </ul>
                </aside>
                <aside class="col-md col-6">
                    <h6 class="title" style="color: rgba(53, 137, 206, 0.687)">Company</h6>
                    <ul class="list-unstyled">
                        <li style="color: rgba(140, 63, 187, 0.892)">About us</li>
                        <li style="color: rgba(140, 63, 187, 0.892)">Rules and terms</li>
                    </ul>
                </aside>
                <aside class="col-md col-6">
                    <h6 class="title" style="color: rgba(53, 137, 206, 0.687)">Help</h6>
                    <ul class="list-unstyled">
                        <li style="color: rgba(140, 63, 187, 0.892)">Contact us</li>
                        <li style="color: rgba(140, 63, 187, 0.892)">Policies</li>
                    </ul>
                </aside>
                <aside class="col-md col-6">
                    <h6 class="title" style="color: rgba(53, 137, 206, 0.687)">Account</h6>
                    <ul class="list-unstyled">
                        <li style="color: rgba(140, 63, 187, 0.892)"><a href="{{ route('login') }}" style="color: rgba(140, 63, 187, 0.892)"> User Login </a></li>
                        <li style="color: rgba(140, 63, 187, 0.892)"><a href="{{ route('register') }}" style="color: rgba(140, 63, 187, 0.892)"> User register </a></li>
                        <li style="color: rgba(140, 63, 187, 0.892)"> Account Setting </li>
                    </ul>
                </aside>
                <aside class="col-md">
                    <h6 class="title" style="color: rgba(53, 137, 206, 0.687)">Social</h6>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#" style="color: rgba(140, 63, 187, 0.892)"> <i class="fab fa-facebook" style="color: rgba(140, 63, 187, 0.892)"></i> Facebook </a>
                        </li>
                        <li>
                            <a href="#" style="color: rgba(140, 63, 187, 0.892)"> <i class="fab fa-twitter" style="color: rgba(140, 63, 187, 0.892)"></i> Twitter </a>
                        </li>
                        <li>
                            <a href="#" style="color: rgba(140, 63, 187, 0.892)"> <i class="fab fa-instagram" style="color: rgba(140, 63, 187, 0.892)"></i> Instagram </a>
                        </li>
                        <li>
                            <a href="#" style="color: rgba(140, 63, 187, 0.892)"> <i class="fab fa-youtube" style="color: rgba(140, 63, 187, 0.892)"></i> Youtube </a>
                        </li>
                    </ul>
                </aside>
            </div>
            <!-- row END -->
        </section>
        <!-- footer-top END -->

        <section class="footer-bottom border-top row">
            <div class="col-md-12 text-md-center">
                <span class="px-2">info@freefromforum-example.com</span>
                <span class="px-2">+36 1 123 456</span>
                <span class="px-2">Street name 123, City</span>
            </div>
        </section>
        <section class="footer-bottom border-bottom row">
            <div class="col-md-12 text-md-center">
                <p class="text-muted">© 2022 FreeFromForum</p>
            </div>
        </section>
    </div>
    <!-- //container -->
</footer>
<!-- ========================= FOOTER END  ========================= -->

</body>

@yield('page_script')

</html>
