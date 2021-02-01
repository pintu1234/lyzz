<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="robots" content="Noindex, Nofollow">
    <title>Whatever Lyzz</title>
    <link type="text/css" href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('css/jquery.bxslider.css') }}" rel="stylesheet">
    <!--<link type="text/css" href="{{ asset('css/style.css') }}" rel="stylesheet" />-->
    <style>
 /* @import url('../css/blog.css'); */
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display&display=swap');
/* font-family: 'Playfair Display', serif; */
.fadeInUp{animation: fadeInUp 2s ease-in-out 0s forwards;}
@keyframes fadeInUp {from{opacity: 0;transform: translate3d(0, 40px, 0);}to {opacity: 1;transform: translate3d(0,0,0);}}
@-webkit-keyframes fadeInUp {from{opacity: 0;transform: translate3d(0, 40px, 0);}to {opacity: 1;transform: translate3d(0,0,0);}}
@-webkit-keyframes bounceInLeft {
	0% {
		opacity: 0;
		-webkit-transform: translateX(-2000px);
	}
	60% {
		-webkit-transform: translateX(20px);
	}

	80% {
		-webkit-transform: translateX(-5px);
	}

	100% {
		opacity: 1;
		-webkit-transform: translateX(0);
	}
}

* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	outline: none;
}

html {
	-webkit-text-size-adjust: none;
	width: 100%;
	height: 100%;
}

body {
	height: 100%;
	font-family: 'Montserrat', sans-serif;
	font-weight: 400;
	overflow-x: hidden;
	background: #f5f7f9;
}

a,
button,
label {
	text-decoration: none !important;
	outline: none !important;
	cursor: pointer;
}

h1,
h2,
h3,
h6,
p,
ul,
li,
figure {
	margin: 0;
	padding: 0;
	line-height: normal;
	font-weight: normal;
}

ul,
ol {
	margin: 0;
	padding: 0;
}

ul {
	list-style: none;
}

::-webkit-scrollbar-track {background-color:#fff}
::-webkit-scrollbar {width:6px;}
::-webkit-scrollbar-thumb {background-color:#CACCD1; border-radius:25px; -webkit-border-radius:25px}

.full-width {
	float: left;
	width: 100%;
	position: relative;
}

.text-center {
	text-align: center;
}

.anim {
	-webkit-transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-ms-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	transition: all 0.5s ease;
}

header {
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	z-index: 9999;
	background: #fff;
	min-height: 60px;
	display: flex;
    justify-content: space-between;animation: 2s ease-in-out 1 normal both running bounceInLeft;
}

header .logo {
	float: left;
	width: 80px;
	padding: 15px;
}

header .logo img {
	display: block;
	width: 100%;
	height: auto;
}
head-navigation{display: flex;
    justify-content: space-between;
    align-items: center;
    width: 900px;}
header .menu {
	float: right;
}

header .menu .menu-icon {
	display: block;
	width: 36px;
	padding: 9px;
	margin: 15px;
	background: #FFF;
	border-radius: 5px;
	border: 1px solid #eee;
}

header .menu .menu-icon:hover {
	-webkit-box-shadow: 3px 3px 5px 0 rgba(0, 0, 0, 0.2);
	box-shadow: 3px 3px 5px 0 rgba(0, 0, 0, 0.2);
}

header .menu .menu-icon img {
	display: block;
	width: 100%;
	height: auto;
}

.navigation {
	position: fixed;
	top: 0;
	width: 350px;
	right: -360px;
	z-index: 99999;
	background: #111;
	color: #fff;
	min-height: 100vh;
	-webkit-transition: all 0.8s ease;
	-moz-transition: all 0.8s ease;
	-ms-transition: all 0.8s ease;
	-o-transition: all 0.8s ease;
	transition: all 0.8s ease;
}

.navigation .right-align {
	text-align: right;
}


.navigation .nav-close {
	position: absolute;
	top: 30px;
	right: 35px;
	display: inline-block;
	width: 25px;
}

.navigation .nav-close:hover {
	-moz-transform: rotate(180deg);
	-webkit-transform: rotate(180deg);
	-o-transform: rotate(180deg);
	-ms-transform: rotate(180deg);
	transform: rotate(180deg);
}

.navigation ul {
	display: block;
	width: 100%;
	padding: 50px 30px 30px;
}

.navigation ul li {
	display: block;
	padding: 25px;
}

.navigation ul li a,
.navigation ul li a:visited {
	font-family: 'Montserrat', sans-serif;
	font-weight: 400;
	font-size: 24px;
	color: #FFF;
	text-transform: uppercase;
	-webkit-transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-ms-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	transition: all 0.5s ease;
}

.navigation ul li a:hover {
	font-weight: 500;
	background: -webkit-linear-gradient(0deg, #2368ea, #e84b78);
	background: -webkit-gradient(linear, left top, right top, from(#2368ea), to(#e84b78));
	background: linear-gradient(to right, #2368ea 0%, #e84b78 100%);
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;
}

.banner {
	height: 100vh;
	background: url(../images/banner-pic-1.jpg) no-repeat top left;
	background-size: cover;
	background-position: center;
	position: relative;
}

.profile {
	padding: 250px 60px;
	background: url(../images/profile-bg.jpg) no-repeat;
	background-position: 20% top;
}

.banner .profile-content {
	position: absolute;
    z-index: 1;
    left: 32%;
    top: 75%;
    width: 550px;
    background: #000;
    padding: 30px;
    color: #FFF;
    line-height: 35px;
    font-size: 18px;
    font-weight: 500;
    letter-spacing: 1px;
    text-align: center;
    font-style: italic;animation: 2s ease-in-out 1 normal both running fadeInUp;
}

.banner .profile-content span {
	font-family: 'Playfair Display', serif;
	font-size: 16px;
}

.latest-blogs {
	background: #FFF;
	padding: 235px 20px;
}

.latest-blogs h1 {
	text-align: center;
	font-size: 30px;
	padding-bottom: 50px;
	font-family: 'Playfair Display', serif;
}

.latest-blogs .blogs-listing {
	display: block;
	width: 1300px;
	margin: 0 auto;
}

.latest-blogs .blogs-listing ul li {
	text-align: center;
	padding: 15px;
	border: 1px solid #e1e1e1;
	cursor: pointer;
}

.latest-blogs .blogs-listing ul li a,
.latest-blogs .blogs-listing ul li a:hover,
.latest-blogs .blogs-listing ul li a:active {
	color: #000;
}

.latest-blogs .blogs-listing .img-container {
	display: block;
	width: 100%;
	height: 180px;
	text-align: center;
	overflow: hidden;
	margin-bottom: 20px;
	position: relative;
}

.latest-blogs .blogs-listing .img-container img {
	display: inline-block;
	width: 350px;
	height: 200px;
	object-fit: cover;
	transition: transform 1s, filter 0.5s ease-in-out;
	filter: grayscale(0);
}

.latest-blogs .blogs-listing li:hover img {
	filter: grayscale(100%);
	transform: scale(1.1);
}

.latest-blogs .blogs-listing h2 {
	font-size: 16px;
	line-height: 25px;
	padding: 5px;
}

.latest-blogs .blogs-listing .img-container .date {
	position: absolute;
	top: 15px;
	left: 15px;
	z-index: 999;
	display: inline-block;
	font-size: 10px;
	background: #FFF;
	color: #333;
	border-radius: 3px;
	padding: 3px 5px;
}


.latest-blogs .blogs-listing .bx-wrapper {
	box-shadow: none;
	display: block;
}

.latest-blogs .blogs-listing .bx-wrapper div {
	display: block;
}

.latest-blogs .blogs-listing .bx-wrapper .bx-viewport {
	height: auto !important;
}

.latest-blogs .blogs-listing .bx-wrapper .bx-pager-item {
	display: inline-block;
}

.latest-blogs .blogs-listing .bx-wrapper .bx-pager,
.latest-blogs .blogs-listing .bx-wrapper .bx-controls-auto {
	bottom: -40px;
}

.latest-blogs .blogs-listing .bx-wrapper .bx-controls .bx-controls-direction {
	position: absolute;
	top: 0;
	right: 0;
	width: 70px;
}

.latest-blogs .blogs-listing .bx-wrapper .bx-controls .bx-controls-direction a {
	position: absolute;
	top: 50%;
	margin-top: -50px;
	outline: 0;
	width: 32px;
	height: 32px;
	text-indent: -9999px;
	z-index: 9999;
	border: 1px solid #e1e1e1;
	-webkit-transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-ms-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	transition: all 0.5s ease;
}

.latest-blogs .blogs-listing .bx-wrapper .bx-controls .bx-controls-direction a:hover {
	background-color: #f2f2f2;
}

.latest-blogs .blogs-listing .bx-wrapper .bx-controls .bx-controls-direction .bx-prev {
	left: 0px;
	background: url(../images/prev.svg) no-repeat;
	background-position: center;
	background-size: 10px;
}

.latest-blogs .blogs-listing .bx-wrapper .bx-controls .bx-controls-direction .bx-next {
	right: 0px;
	background: url(../images/next.svg) no-repeat;
	background-position: center;
	background-size: 10px;
}

/* Contact CSS */

.contact-container {
	height: 100vh;
	background: rgba(0, 0, 0, 0.7);
	padding: 150px 0;
	text-align: center;
}

.contact-container h1 {
	text-align: center;
	font-size: 30px;
	padding-bottom: 50px;
	font-family: 'Playfair Display', serif;
	color: #FFF;
}

.contact-container:after {
	content: "";
	width: 100%;
	height: 100%;
	position: absolute;
	display: block;
	top: 0;
	left: 0;
	background: url(../images/contact-bg.jpg) no-repeat;
	background-size: cover;
	background-position: center;
	z-index: -1;
}

.contact-container ul {
	display: block;
	width: 500px;
	margin: 20px auto;
}

.contact-container ul li {
	display: block;
	width: 100%;
	margin-bottom: 10px;
}

.contact-container ul li input {
	height: 60px;
	line-height: 60px;
}

.contact-container ul li input,
.contact-container ul li textarea {
	display: block;
	width: 100%;
	border: 0;
	border-bottom: 1px solid #999;
	background: none;
	padding: 15px;
	font-size: 16px;
	color: #FFF;
}

.contact-container ul li input.error {
	border-bottom: 1px solid #FF0000;
}

.contact-container ul li textarea {
	font-size: 18px;
	min-height: 200px;
	resize: vertical;
}

.contact-container ul li a {
	display: block;
	width: 200px;
	height: 50px;
	line-height: 50px;
	border-radius: 30px;
	border: 0;
	margin: 50px auto 20px;
	font-size: 16px;
	color: #FFF;
	/* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#2368ea+0,e84b78+100 */
	background: #2368ea;
	/* Old browsers */
	background: -moz-linear-gradient(left, #2368ea 0%, #e84b78 100%);
	/* FF3.6-15 */
	background: -webkit-linear-gradient(left, #2368ea 0%, #e84b78 100%);
	/* Chrome10-25,Safari5.1-6 */
	background: linear-gradient(to right, #2368ea 0%, #e84b78 100%);
	/* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#2368ea', endColorstr='#e84b78', GradientType=1);
	/* IE6-9 */
	-webkit-transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-ms-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	transition: all 0.5s ease;
}

.contact-container ul li a:active {
	transform: scale(0.9);
	letter-spacing: 2px;
}

/* Footer CSS */

footer {
	background: #f1f1f1;
}

footer .links-map {
	background: #2a313d;
	color: #FFF;
	padding: 50px 20px;
}

footer .container {
	display: grid;
	grid-gap: 20px;
	grid-template-columns: 1fr 1fr 1fr 1fr;
	width: 100%;
	max-width: 1200px;
	padding: 20px;
	margin: 0 auto;
}


footer p {
	font-size: 14px;
	color: #FFF;
	padding: 20px 10px 0 0;
	line-height: 20px;
}

footer .title2 {
	font-family: 'Playfair Display', serif;
	color: #FFF;
	font-size: 24px;
	padding-bottom: 15px;
	margin-bottom: 15px;
}

footer .title2:after {
	content: "";
	position: absolute;
	bottom: 0;
	left: 0;
	width: 50px;
	height: 2px;
	/* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#2368ea+0,e84b78+100 */
	background: #2368ea;
	/* Old browsers */
	background: -moz-linear-gradient(left, #2368ea 0%, #e84b78 100%);
	/* FF3.6-15 */
	background: -webkit-linear-gradient(left, #2368ea 0%, #e84b78 100%);
	/* Chrome10-25,Safari5.1-6 */
	background: linear-gradient(to right, #2368ea 0%, #e84b78 100%);
	/* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#2368ea', endColorstr='#e84b78', GradientType=1);
	/* IE6-9 */
}

footer ul li a {
	display: inline-block;
	color: #aaa;
	margin-bottom: 10px;
	-webkit-transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-ms-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	transition: all 0.5s ease;
	position: relative;
	font-size: 14px;
}

footer ul li a:before {
	content: '';
	position: absolute;
	top: 5px;
	left: -10px;
	width: 8px;
	height: 8px;
	border-top: 1px solid #2368ea;
	border-right: 1px solid #e84b78;
	-moz-transform: rotate(45deg);
	-webkit-transform: rotate(45deg);
	-o-transform: rotate(45deg);
	-ms-transform: rotate(45deg);
	transform: rotate(45deg);
	-webkit-transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-ms-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	transition: all 0.5s ease;
	opacity: 0;
}

footer ul li a:hover {
	padding-left: 12px;
	color: #fff;
}

footer ul li a:hover:before {
	left: -5px;
	opacity: 1;
}

footer .address a {
	color: #FFF;
}

footer .address a:hover {
	text-decoration: underline !important;
}

footer .address .tel {
	font-size: 20px;
	font-weight: 500;
}

footer .address p {
	padding: 10px 0;
}

footer .copyright {
	float: left;
	font-size: 12px;
	line-height: 25px;
	padding: 15px;
}

.social-icons {
	float: right;
	padding: 15px;
}

.social-icons a {
	display: inline-block;
	width: 27px;
	height: 26px;
	border: 1px solid #c2c1c1;
	border-radius: 100%;
	-webkit-border-radius: 100%;
	text-align: center;
	line-height: 24px;
	margin-left: 5px;
	-webkit-transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-ms-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	transition: all 0.5s ease;
}

.social-icons a i {
	color: rgb(135, 131, 131);
	-webkit-transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-ms-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	transition: all 0.5s ease;
}

.social-icons a:hover {
	border: 1px solid #e84b78;
	background: #e84b78;
}

.social-icons a:hover i {
	color: #FFF;
}
.signature{width: 100px;}
.mt-20{margin-top: 20px;}
.mt-130{padding: 250px 0 100px 0;animation: 2s ease-in-out 1 normal both running fadeInUp}
.contain{margin: 0 auto;display: flex;justify-content: center;align-items: center;animation: 2s ease-in-out 1 normal both running bounceInLeft;}
.bg-white{background-color: #fff; margin-top: 66px;padding:20px 0px 50px 0;}
.head-nav{text-align: center;display: flex;justify-content: center;}
.head-nav ul{text-align: center;display: flex;justify-content: space-around;}
.head-navigation{width: 900px;display: flex;justify-content: space-between;align-items: center;animation: 2s ease-in-out 1 normal both running fadeInUp;}
.head-navigation ul li a{font-weight: 600;line-height: 30px;}
.head-navigation ul li a.active{font-weight: 600;color: #e84b78;}
.head-navigation ul li a.btn-pink{background-color: #e84b78;color: #fff;border: 1px solid #fff;border-radius: 5px;line-height: 30px;}
.head-navigation ul li a.btn-pink:hover{background-color: #fff;border: 1px solid #e84b78; color: #e84b78;}
.head-navigation ul li:hover a{font-weight: 600;color: #e84b78;pointer-events: visible;}
.head-nav ul li a{float: left;text-align: center;padding: 0 15px;color: #878383;pointer-events: none;font-size: 14px;letter-spacing: 2px;    text-transform: uppercase;}
.font ul li a{font-size: 13px;}
.border-1{border-bottom: 1px solid #cfcccc;width: 50%;}
.head-title{color: #878383;letter-spacing: 10px;font-size: 12px;text-align: center;padding: 20px;}

/* Media Query*/

@media screen and (max-width: 1220px) {
	.latest-blogs .blogs-listing {
		width: 100%;
	}
	
}

@media screen and (max-width: 768px) {
	.profile {
		padding: 450px 60px 50px;
		background-position: 35% top;
	}
	.banner  .profile-content {
		width: 100%;
	}

	footer .container {
		grid-template-columns: 1fr 1fr;
		grid-row-gap: 20px;
	}
	.head-navigation{display: none;}
	.contain{display: none;}
	.bg-white{    margin-top: 0px;}
}
@media screen and (max-width: 767px) {
	footer .links-map {
		background: #2a313d;
		color: #FFF;
		padding: 20px 0px;
	}
	.social-icons {
		float: left;
		padding: 0 15px 30px 15px;
	}
	footer .copyright{padding: 30px 15px 15px 15px;}
	.navigation {
		width: 100%;
	}
	
	
	.signature {
		width: 75px;
	}
	.banner .profile-content span {
		font-family: 'Playfair Display', serif;
		font-size: 11px;
	}
	.banner .profile-content {
		padding: 15px;width: 87%;
		position: absolute;
		z-index: 1;
		left: 5%;
		top: 75%;
		width: 322px;
		background: #000;
		padding: 15px;
		color: #FFF;
		line-height: 19px;
		font-size: 11px;
		font-weight: 500;
		letter-spacing: 1px;
		text-align: center;
		font-style: italic;
	}
	.mt-130 {
		padding: 50px 0 50px 0;
	}
	.contact-container {
		padding: 110px 0 50px;
		height: auto;
	}

	.contact-container h1 {
		padding-bottom: 10px;
	}

	.contact-container ul {
		width: calc(100% - 60px);
		margin: 0px 30px 20px;
	}

	.contact-container ul li textarea {
		min-height: 150px;
	}

	footer .container {
		grid-template-columns: 1fr;
		grid-row-gap: 26px;
	}
	
}


    </style>
    @stack('css')
</head>

<body>
<!-- Header -->
<header>
    <div class="logo">
        <a href="{{ route('home') }}"><img src="{{ asset('images/Logo.png') }}" /></a>
	</div>
	<div class="head-navigation">
        <div class="head-nav">
            <ul>
                <li><a @if(Route::current()->getName() == 'home') class="active" @endif href="{{ route('home') }}">Home</a></li>
                <li><a @if(Route::current()->getName() == 'blog.list') class="active" @endif href="{{ route('blog.list') }}">Blog</a></li>
                <li><a @if(Route::current()->getName() == 'blog.contactus') class="active" @endif href="{{ route('blog.contactus') }}">Contact</a></li>
                <li><a href="https://lyzz.hcbspro.com/login" class="btn-pink">Login</a></li>
            </ul>	
        </div>
        <div class="social-icons">
            <a href=""><i class="icon-facebook"></i></a>
            <a href=""><i class="icon-linkedin"></i></a>
            <a href=""><i class="icon-twitter"></i></a>
            <a href=""><i class="icon-google-plus"></i></a>
        </div>
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
        <li><a href="https://lyzz.hcbspro.com/login" style="color: orange;">Login</a></li>
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
