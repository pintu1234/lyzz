<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="robots" content="Noindex, Nofollow">
    <title>Whatever Lyzz</title>
    <link type="text/css" href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('css/jquery.bxslider.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('css/style.css') }}" rel="stylesheet" />
    @stack('css')
</head>

<body>
<!-- Header -->
<header>
    <div class="logo">
        <a href="{{ route('home') }}"><img src="{{ asset('images/Logo.png') }}" /></a>
    </div>
    <div class="menu">
        <a class="menu-icon anim"><img src="{{ asset('images/menu-icon.svg') }}" /></a>
    </div>
</header>

<!-- Navigation -->
<nav class="navigation">
    <a class="nav-close anim"><img src="{{ asset('images/nav-close.svg') }}" /></a>
    <ul>
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('blog.list') }}">Blog</a></li>
        <li><a href="{{ route('blog.contactus') }}">Contact</a></li>
    </ul>
</nav>
    @yield('content')

<!-- Footer -->
<footer class="full-width">
    <div class="full-width links-map">
        <div class="container">
            <div>
                <img src="{{ asset('images/Logo-white.png') }}" width="80" />
                <p class="full-width">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
            <div>
                <h2 class="full-width title2"><span>QUICK LINKS</span></h2>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('blog.list') }}">Blog</a></li>
                    <li><a href="{{ route('blog.contactus') }}">Contact</a></li>
                </ul>
            </div>
            <div>
                <h2 class="full-width title2"><span>CONTACT INFO</span></h2>
                <div class="full-width address">
                    <a href="tel:+18004999963" class="tel">(1800) 499 9456</a>
                    <p>Ahmedabad<br /> Gujarat, India, 380009</p>
                    <p>Email :<br /><a href="mailto:info@gmail.com">info@gmail.com</a></p>
                </div>
            </div>
            <div>
                <img src="{{ asset('images/map.jpg') }}" class="full-width" />
            </div>
        </div>
    </div>
    <div class="copyright">© Copyright 2020 Whatever Lyzz.</div>
    <div class="social-icons">
        <a href=""><i class="icon-facebook"></i></a>
        <a href=""><i class="icon-linkedin"></i></a>
        <a href=""><i class="icon-twitter"></i></a>
        <a href=""><i class="icon-google-plus"></i></a>
    </div>
</footer>

<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.bxslider.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
@stack('scripts')
</body>
</html>
