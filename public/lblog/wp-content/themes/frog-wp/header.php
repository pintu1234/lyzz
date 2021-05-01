<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
<?php
    // Options from admin panel
    global $smof_data;
    
    $favicon = $smof_data['custom_favicon'];
    if (empty($favicon)) { $favicon = get_template_directory_uri().'/images/web-icon.png'; }
    
    $site_logo = $smof_data['site_logo'];
    if (empty($site_logo)) { $site_logo = get_template_directory_uri().'/images/logo.png'; }
?>
	<!-- Meta Tags -->
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	
    <!-- Mobile Device Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=12.0, minimum-scale=.25, user-scalable=yes"/>
    
    <!-- The HTML5 Shim for older browsers (mostly older versions of IE). -->
	<!--[if IE]> <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->

	<!-- Favicons and rss / pingback -->
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link rel="shortcut icon" type="image/png" href="<?php echo $favicon ?>"/>  

    <!-- Custom style -->

    <!-- Theme output -->
        <style>
 /* @import  url('../css/blog.css'); */
@import  url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display&display=swap');
/* font-family: 'Playfair Display', serif; */
.fadeInUp{animation: fadeInUp 2s ease-in-out 0s forwards;}
@keyframes  fadeInUp {from{opacity: 0;transform: translate3d(0, 40px, 0);}to {opacity: 1;transform: translate3d(0,0,0);}}
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
	height: 100% !important;
	font-family: 'Montserrat', sans-serif !important;
	font-weight: 400 !important;
	overflow-x: hidden !important;
	background: #f5f7f9 !important;
	background-color: white !important;
}

a,
button,
label {
	text-decoration: none !important;
	outline: none !important;
	cursor: pointer !important;
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


body::-webkit-scrollbar-track {background-color:#E2E4F6}
body::-webkit-scrollbar {width:6px;}
body::-webkit-scrollbar-thumb {background-color:#9ea0e1; border-radius:25px; -webkit-border-radius:25px}
.navigation::-webkit-scrollbar-track {background-color:#000}
.navigation::-webkit-scrollbar {width:6px;}
.navigation::-webkit-scrollbar-thumb {background-color:#000; border-radius:25px; -webkit-border-radius:25px}
.scrollbar2{height: 650px;}
/* .scrollbar{margin:0;height:150px;width:100%;background:none;overflow:hidden;overflow-y:scroll} */
.full-width {
	float: left !important;
	width: 100% !important;
	position: relative !important;
}

.text-center {
	text-align: center !important;
}
.flex_p{display: flex;flex-wrap: wrap;flex-direction: column;}
.anim {
	-webkit-transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-ms-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	transition: all 0.5s ease;
}

header {
	position: fixed !important;
	top: 0 !important;
	left: 0 !important;
	width: 100% !important;
	z-index: 9999 !important;
	background: #fff !important;
	min-height: 60px;
	display: flex !important;
    justify-content: space-between;animation: 2s ease-in-out 1 normal both running bounceInLeft;    align-items: center;
}

header .logo {
	float: left !important;
	width: 80px !important;
	padding: 15px !important;
	margin-top: 0px !important;
}

header .logo img {
	display: block !important;
	width: 100% !important;
	height: auto !important;
}
head-navigation{display: flex !important;
    justify-content: space-between !important;
    align-items: center !important;
    width: 900px !important;}
header .menu {
	display:none !important;
	float: right !important;
}

header .menu .menu-icon {
	display: block !important;
	width: 36px !important;
	padding: 9px !important;
	margin: 15px !important;
	background: #FFF !important;
	border-radius: 5px !important;
	border: 1px solid #eee !important;
}

header .menu .menu-icon:hover {
	-webkit-box-shadow: 3px 3px 5px 0 rgba(0, 0, 0, 0.2) !important;
	box-shadow: 3px 3px 5px 0 rgba(0, 0, 0, 0.2) !important;
}

header .menu .menu-icon img {
	display: block !important;
	width: 100% !important;
	height: auto !important;
}

.navigation {
	position: fixed !important;
	top: 0 !important;
	width: 350px !important;
	right: -360px !important;
	z-index: 99999 !important;
	background: #111 !important;
	color: #fff !important; 
	min-height: 100vh !important;
	-webkit-transition: all 0.8s ease;
	-moz-transition: all 0.8s ease;
	-ms-transition: all 0.8s ease;
	-o-transition: all 0.8s ease;
	transition: all 0.8s ease;
}

.navigation .right-align {
	text-align: right !important;
}


.navigation .nav-close {
	position: absolute !important;
	top: 30px !important;
	right: 35px !important;
	display: inline-block !important;
	width: 25px !important;
}

.navigation .nav-close:hover {
	-moz-transform: rotate(180deg) !important;
	-webkit-transform: rotate(180deg) !important;
	-o-transform: rotate(180deg) !important;
	-ms-transform: rotate(180deg) !important;
	transform: rotate(180deg) !important;
}

.navigation ul {
	display: block !important;
	width: 100% !important;
	padding: 50px 30px 0 30px !important;
}

.navigation ul li {
	display: block !important;
	padding: 25px !important;
}

.navigation ul li a,
.navigation ul li a:visited {
	font-family: 'Montserrat', sans-serif !important;
	font-weight: 400 !important;
	font-size: 24px !important;
	color: #FFF !important;
	text-transform: uppercase;
	-webkit-transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-ms-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	transition: all 0.5s ease;
}

.navigation ul li a:hover {
	font-weight: 500 !important;
	background: -webkit-linear-gradient(0deg, #2368ea, #e84b78) !important;
	background: -webkit-gradient(linear, left top, right top, from(#2368ea), to(#e84b78)) !important;
	background: linear-gradient(to right, #2368ea 0%, #e84b78 100%) !important;
	-webkit-background-clip: text !important;
	-webkit-text-fill-color: transparent !important;
}
.navigation ul li.active a{font-weight: 500;background: -webkit-linear-gradient(0deg, #2368ea, #e84b78) !important;
    background: -webkit-gradient(linear, left top, right top, from(#2368ea), to(#e84b78)) !important;
    background: linear-gradient(to right, #2368ea 0%, #e84b78 100%) !important;
    -webkit-background-clip: text !important;
    -webkit-text-fill-color: transparent !important;}
.banner {
	height: 100vh;
	background: url(../images/banner-pic-2.jpg) no-repeat top left !important;
	background-size: cover !important;
	background-position: center !important;
	position: relative !important;
}
.food {
	opacity: 0.5;
	height: 100vh;
	background: url(../images/food.jpg) no-repeat top left;
	background-size: cover;
	background-position: center;
	position: relative;
}
.life {
	opacity: 0.5;
	height: 100vh;
	background: url(../images/life.jpg) no-repeat top left;
	background-size: cover;
	background-position: center;
	position: relative;
}
.love {
	opacity: 0.5;
	height: 100vh;
	background: url(../images/love.jpg) no-repeat top left;
	background-size: cover;
	background-position: center;
	position: relative;
}
.travel {
	opacity: 0.5;
	height: 100vh;
	background: url(../images/Travel1.jpeg) no-repeat top left;
	background-size: cover;
	background-position: center;
	position: relative;
}
.wellness {
	opacity: 0.5;
	height: 100vh;
	background: url(../images/well1.jpg) no-repeat top left;
	background-size: cover;
	background-position: center;
	position: relative;
}
.silverlinings {
	opacity: 0.5;
	height: 100vh;
	background: url(../images/silverlinings.jpg) no-repeat top left;
	background-size: cover;
	background-position: center;
	position: relative;
}
.life_bg{background: #FAC987!important;}
.love_bg{background: #dab1be!important;}
.travel_bg{background: #a8c19c!important;}
.wellness_bg{background: #f7aab9!important;}
.silverlinings_bg{background: #9c9e91!important;}
.food_bg{background: #4e5154!important;}
.profile {
	padding: 250px 60px;
	background: url(../images/profile-bg.jpg) no-repeat;
	background-position: 20% top;
}

 .profile-content {
	position: absolute;
    z-index: 1;
    left: 0;
    right: 0;
    bottom: -92px;
    margin: auto;
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

 .profile-content span {
	font-family: 'Playfair Display', serif;
	font-size: 16px;
}
.bg_white{background: #fff !important;}
.img_100{width:100% !important}
 .profile-content1 span {
		font-family: 'Playfair Display', serif;
		font-size: 11px;
	}
	 .profile-content1 {
		padding: 15px;
		background: #E2E4F6;
		padding: 30px;
		color: #000;
		line-height: 35px;
		font-size: 18px;
		font-weight: 500;
		letter-spacing: 1px;
		text-align: center;
		font-style: italic;border-radius: 15px;box-shadow: 0 0 6px 0 rgb(0 0 0 / 24%);border: 1px solid #d0d0d0;margin: 50px;
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
	height: 100vh !important;
	background: rgba(0, 0, 0, 0.7) !important;
	padding: 150px 0 !important;
	text-align: center !important;
}

.contact-container h1 {
	text-align: center !important;
	font-size: 30px !important;
	padding-bottom: 50px !important;
	font-family: 'Playfair Display', serif !important;
	color: #FFF !important;
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
	border-bottom: 1px solid #FF0000 !important;
}

.contact-container ul li textarea {
	font-size: 18px;
	min-height: 200px;
	resize: vertical !important;
}

.contact-container ul li a {
	display: block;
	width: 200px !important;
	height: 50px !important;
	line-height: 50px !important; 
	border-radius: 30px !important;
	border: 0;
	margin: 50px auto 20px !important;
	font-size: 16px;
	color: #FFF !important;
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
	letter-spacing: 2px !important;
}

/* Footer CSS */

footer {
	background: #f1f1f1 !important;
}

footer .links-map {
	background: #2a313d !important;
	color: #FFF !important;
	padding: 50px 20px !important;
}

footer .container {
	display: grid !important;
	grid-gap: 20px !important;
	grid-template-columns: 1fr 1fr 1fr 1fr !important;
	width: 100% !important;
	max-width: 1200px !important;
	padding: 20px !important;
	margin: 0 auto !important;
}


footer p {
	font-size: 14px !important;
	color: #FFF !important;
	padding: 20px 10px 0 0 !important;
	line-height: 20px !important;
}

footer .title2 {
	font-family: 'Playfair Display', serif !important;
	color: #FFF !important;
	font-size: 24px !important;
	padding-bottom: 15px !important;
	margin-bottom: 15px !important;
}

footer .title2:after {
	content: "" !important;
	position: absolute !important;
	bottom: 0 !important;
	left: 0 !important;
	width: 50px !important;
	height: 2px !important;
	/* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#2368ea+0,e84b78+100 */
	background: #2368ea !important;
	/* Old browsers */
	background: -moz-linear-gradient(left, #2368ea 0%, #e84b78 100% !important);
	/* FF3.6-15 */
	background: -webkit-linear-gradient(left, #2368ea 0%, #e84b78 100% !important);
	/* Chrome10-25,Safari5.1-6 */
	background: linear-gradient(to right, #2368ea 0%, #e84b78 100% !important));
	/* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#2368ea !important)', endColorstr='#e84b78 !important)', GradientType=1 !important));
	/* IE6-9 */
}

footer ul li a {
	display: inline-block !important;
	color: #fff !important;
	margin-bottom: 10px !important;
	-webkit-transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-ms-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	transition: all 0.5s ease;
	position: relative !important;
	font-size: 14px !important;
}

footer ul li a:before {
	content: '' !important;
	position: absolute !important;
	top: 5px !important;
	left: -10px !important;
	width: 8px !important;
	height: 8px !important;
	border-top: 1px solid #2368ea !important;
	border-right: 1px solid #e84b78 !important;
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
	opacity: 0 !important;
}

footer ul li a:hover {
	padding-left: 12px !important;
	color: #fff !important;
}

footer ul li a:hover:before {
	left: -5px !important;
	opacity: 1 !important;
}

footer .address a {
	color: #FFF !important;
}

footer .address a:hover {
	text-decoration: underline !important;
}

footer .address .tel {
	font-size: 20px !important;
	font-weight: 500 !important;
}

footer .address p {
	padding: 10px 0 !important;
}

footer .copyright {
	float: left !important;
	font-size: 12px !important;
	line-height: 25px !important;
	padding: 15px !important;
	width:auto !important;
	color: black !important;
	border-top: auto !important;
}

.social-icons {
	float: right !important;
	padding: 15px !important;
}

.social-icons a {
	display: inline-block !important;
	width: 27px !important;
	height: 26px !important;
	border: 1px solid #c2c1c1 !important;
	border-radius: 100% !important;
	-webkit-border-radius: 100% !important;
	text-align: center !important;
	line-height: 24px !important;
	margin-left: 5px !important;
	padding: 3px !important;
	-webkit-transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-ms-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	transition: all 0.5s ease;
}

.social-icons a i {
	color: rgb(135, 131, 131) !important;
	-webkit-transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-ms-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	transition: all 0.5s ease;
}

.social-icons a:hover {
	border: 1px solid #e84b78 !important;
	background: #e84b78 !important;
}

.social-icons a:hover i {
	color: #FFF !important;
}
ul.submenu{padding:10px 36px !important;}
ul.submenu li{padding: 12px !important;}
ul.submenu li a{font-size: 18px !important;}
.flexpro{display: flex;align-items: center !important;justify-content: center !important;}
.signature{width: 100px !important;}
.mt-20{margin-top: 20px !important;}
.mt-130{padding: 50px !important;animation: 2s ease-in-out 1 normal both running fadeInUp}
.contain{margin: 0 auto !important;display: flex !important;justify-content: center !important;align-items: center;animation: 2s ease-in-out 1 normal both running bounceInLeft;}
.bg-white{background-color: #fff !important; margin-top: 25px !important;;padding:20px 0px 50px 0 !important;;}
.head-nav{text-align: center !important;display: flex !important;justify-content: center !important;;}
.head-nav ul{text-align: center;display: flex;justify-content: space-around;}
.head-nav ul li a{float: left !important;text-align: center !important;padding: 0 15px !important;color: #878383;font-size: 14px !important;letter-spacing: 2px !important;text-transform: uppercase !important;}
.head-nav ul li:hover a{color:#e84b78 !important}
.head-nav ul li.active a{color: #e84b78; !important}
.head-navigation{display: flex;align-items: center !important;animation: 2s ease-in-out 1 normal both running fadeInUp;}
.head-navigation ul li a{font-weight: 600 !important;line-height: 30px !important;cursor:pointer;}
.head-navigation ul li a.active{font-weight: 600 !important;color: #e84b78;}
.head-navigation ul li a.btn-pink{background-color: #e84b78 !important;color: #fff !important;border: 1px solid #fff !important;border-radius: 5px !important;line-height: 30px !important;}
.head-navigation ul li a.btn-pink:hover{background-color: #fff !important;border: 1px solid #e84b78 !important; color: #e84b78 !important;}
.head-navigation ul li:hover a{font-weight: 600 !important;color: #e84b78 !important;pointer-events: visible !important;}
.font ul li a{font-size: 13px !important;}
.border-1{border-bottom: 1px solid #cfcccc !important;width: 33.5% !important;}
.head-title{color: #878383 !important;letter-spacing: 10px !important;font-size: 12px !important;text-align: center !important;padding: 20px !important;}

/* Media Query*/
@media    screen and (max-width: 1919px) {
	header .menu {
	display:none !important;
	float: right !important;
}
	.border-1 {
    width: 29.5% !important;}
	.mt-130 {
    padding-top: 630px !important;
	}
}
@media    screen and (max-width: 1510px) {
    .border-1 {
    width: 27.5% !important;
}
	.mt-130 {
    padding-top: 740px !important;
}
}
@media    screen and (max-width: 1380px) {
	.border-1 {
    width: 24.5% !important;
}

@media  screen and (max-width: 1220px) {
	.latest-blogs .blogs-listing {
		width: 100 !important%;
	}
	::-webkit-scrollbar-track {background-color:#E2E4F6 !important}
::-webkit-scrollbar {width:6px;}
::-webkit-scrollbar-thumb {background-color:#9ea0e1 !important; border-radius:25px !important; -webkit-border-radius:25px !important}
.scrollbar{margin:0;overflow:hidden !important;overflow-y:scroll !important}
	.scrollbar1{height: 303px !important;}
	
	.mt-130 {
    padding-top: 130px !important;
	}
	.border-1 {
    width: 10.5% !important;
	}
	.profile-content1{    padding: 15px !important;
    margin: 20px 40px 50px 40px !important}
}

@media  screen and (max-width: 768px) {
	.profile {
		padding: 450px 60px 50px !important;
		background-position: 35% top !important;
	}
	 .profile-content {
		left: 0 !important;
    right: 0 !important;
    bottom: -9px !important;
    margin: auto !important;
    width: 320px !important;
	}
::-webkit-scrollbar-track {background-color:#E2E4F6}
::-webkit-scrollbar {width:6px;}
::-webkit-scrollbar-thumb {background-color:#9ea0e1; border-radius:25px; -webkit-border-radius:25px}
.scrollbar{margin:0;background:none;overflow:hidden;overflow-y:scroll}
	.scrollbar1{height: 303px;}

	footer .container {
		grid-template-columns: 1fr 1fr !important;
		grid-row-gap: 20px !important;
	}
	.head-navigation{display: none !important;}
	.contain{display: none !important;}
	.bg-white{    margin-top: 0px !important;}
	.profile-content1 { margin: 20px 15px 50px 15px !important;
    padding: 15px !important;
	}
	
	
}
@media  screen and (max-width: 375px) {
.social-icons {
		float: left;padding: 0 15px 30px 15px !important;}
}
@media  screen and (max-width: 767px) {
	header .menu {
	display:block !important;
	float: right !important;
}
	/* .navigation{right: -487px!important;} */
	.latest-blogs h1 {
    font-size: 24px !important;}

::-webkit-scrollbar-track {background-color:#E2E4F6}
::-webkit-scrollbar {width:6px;}
::-webkit-scrollbar-thumb {background-color:#9ea0e1; border-radius:25px; -webkit-border-radius:25px}
.scrollbar{margin:0;background:none;overflow:hidden;overflow-y:scroll}
.scrollbar1{height: 253px;}
	/* .navigation{right: -768px;} */
	footer .links-map {
		background: #2a313d !important;
		color: #FFF !important;
		padding: 20px 0px !important;
	}
	.w_100{width: 100% !important;}
	.social-icons {
		float: right !important;    
	}
	footer .copyright{padding: 20px 15px 0 15px !important; color: black !important;}
	/* .navigation {
		width: 100%;
	} */
	
	.mt-30 {
		padding: 50px 0 50px 0 !important;
	}
	.signature {
		width: 75px !important;
	}
	.banner {
    height: 33vh;}
	.profile-content1 span {
		font-size: 18px !important;
		font-family: 'Playfair Display', serif !important;
	}
	.profile-content1 {
		margin: 20px 15px 40px 15px;
		background: #E2E4F6;
		color: #000;
		padding: 15px;
		line-height: 19px;
		font-size: 13px;
		font-weight: 500;
		letter-spacing: 1px;
		text-align: center;
		font-style: italic;
		border-radius: 15px;
		box-shadow: 0 0 6px 0 rgb(0 0 0 / 24%);
		border: 1px solid #d0d0d0;
	}
	
	 .profile-content span {
		font-family: 'Playfair Display', serif;
		font-size: 12px;
	}
	.profile-content {
		left: 0;
		bottom: -3%;
		font-size: 15px;
	}
	.mt-130 {
		padding:40px 0 20px 0 !important;
	}
	.contact-container {
		padding: 110px 0 50px !important;
		height: auto !important;
	}

	.contact-container h1 {
		padding-bottom: 10px !important;
	}

	.contact-container ul {
		width: calc(100% - 60px !important);
		margin: 0px 30px 20px !important;
	}
	.contact-container ul li textarea {
		min-height: 150px !important;
	}
	footer .container {
		grid-template-columns: 1fr !important;
		grid-row-gap: 26px !important;
	}
	}	
}
</style>
    <link type="text/css" href="https://lyzz.doralhealthconnect.com/css/font-awesome.min.css" rel="stylesheet">

<?php wp_head(); ?> 
</head>
<body <?php body_class(); ?>>

<!-- Begin Header -->

<header>
    <div class="logo">
        <a href="https://lyzz.doralhealthconnect.com"><img src="https://lyzz.doralhealthconnect.com/images/Logo.png"></a>
	</div>
	<div class="head-nav head-navigation">
            <ul>
                <li><a class="active" href="https://lyzz.doralhealthconnect.com">Home</a></li>
                <li><a href="https://lyzz.doralhealthconnect.com/blogs">Blog</a></li>
                <li><a href="https://lyzz.doralhealthconnect.com/contact-us">Contact</a></li>
                <li><a href="https://lyzz.doralhealthconnect.com/login" class="btn-pink">Login</a></li>
            </ul>	
        </div>
        <div class="social-icons">
            <a href="" target="_blank"><i class="icon-facebook"></i></a>
            <a href="https://www.linkedin.com/company/whateverlyzz" target="_blank"><i class="icon-linkedin"></i></a>
            <a href="https://twitter.com/WhateverLyzz" target="_blank"><i class="icon-twitter"></i></a>
			<a href="https://www.instagram.com/whateverlyzz/" target="_blank"><i class="icon-instagram"></i></a>
        </div>
    <div class="menu">
        <a class="menu-icon anim" onclick="openNav()"><img src="https://lyzz.doralhealthconnect.com/images/menu-icon.svg"></a>
    </div>
</header><!-- end #header -->
<div class="full-width bg-white">
    <div class="contain">
        <div class="border-1"></div>
        <div class="head-nav">  
            <ul class="abc">
                <li><a href="https://lyzz.hcbspro.com/food" style="cursor: pointer!important;">FOOD</a></li>
                <li><a href="https://lyzz.hcbspro.com/life" style="cursor: pointer!important;">LIFE</a></li>
                <li><a href="https://lyzz.hcbspro.com/love" style="cursor: pointer!important;">LOVE</a></li>
                <li><a href="https://lyzz.hcbspro.com/travel" style="cursor: pointer!important;">TRAVEL</a></li>
                <li><a href="https://lyzz.hcbspro.com/wellness" style="cursor: pointer!important;">WELLNESS</a></li>
                <li><a href="https://lyzz.hcbspro.com/silver-linings" style="cursor: pointer!important;">SILVER LININGS</a></li>
            </ul>
        </div>
        <div class="border-1"></div>
    </div>
</div>
