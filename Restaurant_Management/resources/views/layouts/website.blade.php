<!DOCTYPE html>
<html lang="en" class=" js cssanimations csstransforms3d csstransitions csstransformspreserve3d">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="HTML5 Template">
	<meta name="description" content="Restaurant Template">
	<meta name="author" content="shineygleam.com">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Restaurant Template</title>
	<!-- Favicon -->
	<link rel="shortcut icon" href="http://themes.potenzaglobalsolutions.com/html/the-zayka/images/favicon.ico">

	<!-- bootstrap -->
	<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Amatic+SC:400,700|Lilita+One" rel="stylesheet">

	<!-- flaticon -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/flaticon.css') }}">

	<!-- font awesome -->
	<!-- <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- mega menu -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/mega_menu.css') }}">

	<!-- carousel -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/owl.carousel.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/owl.theme.default.min.css') }}">

	<!-- datepicker -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap-datetimepicker.min.css') }}">

	<!-- book -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/component.css') }}">

	<!-- revolution slider -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/settings.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/navigation.css') }}">

	<!-- main style -->
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

	<!-- responsive -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/responsive.css') }}">
</head>
<body>

	<!--=================header================ -->
	<header id="header" class="header">
	  	<div class="topbar">
		    <div class="container">
		      	<div class="row">
			        <div class="col-lg-6 col-md-6 col-sm-6">
			          	<div class="topbar-left text-left">
				            <ul>
				              	<li><i class="fa fa-phone"></i> (01) 123 456 7890 </li>
				              	<li><i class="fa fa-envelope-o"></i> support@website.com</li>
				            </ul>
			          	</div>
			        </div>
			        <div class="col-lg-6 col-md-6 col-sm-6">
			          	<div class="topbar-right text-right">
				            <ul>
								  <li><a href="{{ route('cart.index') }}"><i class="fa fa-shopping-cart"></i>					
									@if(Cart::instance('default')->count() > 0)
										</span>{{Cart::instance('default')->count()}}<span></span>
									@endif
								</a></li>
				              	<li><div class="search-1">
					                <a class="search-btn" href="javascript:void(0);"></a>
					                <!-- Overlay Search -->
					                <div class="overlay-search">
					                  	<div class="container">
					                    	<div class="row">
						                      	<div class="form_search-wrap">
													<form action="{{ route('search_menu') }}" method="get" role="search">
							                          	<input class="search-input" name="search" placeholder="Type and hit Enter..." type="text">
							                          	<a href="#" class="search-close">
								                            <span></span>
								                            <span></span>
							                          	</a>
							                        </form>
						                      	</div>
					                    	</div>
					                  	</div>
					                </div>
					                <!-- End Overlay Search -->
					                </div>
				              	</li>
				            </ul>
			          	</div>
			        </div>
		      	</div>
		    </div>
	    </div>
	    <!-- mega menu -->
	    <div class="menu">
	      <!-- menu start -->
	      	<nav id="menu-1" class="mega-menu" style="display: block;">
	        <!-- menu list items container -->
	        	<section class="menu-list-items">
	          		<div class="container">
	            		<div class="row">
	              			<div class="col-lg-12 col-md-12">
				                <!-- menu logo -->
				                <ul class="menu-logo">
				                  	<li class="head-info">
				                    	<a href="/"><img id="logo_img" src="{{ URL::asset('images/logo.png') }}" alt="logo"> </a>
				                    <div class="head-info-content">
				                      <div class="info-left pull-left">
				                        <div class="time">
				                          <h6>MON – SAT</h6>
				                          <p>Lunch: 11:30 – 2:00</p>
				                          <p>Evening: 6:30 – 10:00</p>
				                        </div>
				                        <div class="time mt-20">
				                          <h6>SUNDAY</h6>
				                          <p>Lunch: 11:30 – 2:00</p>
				                          <p>Evening: 6:30 – 10:00</p>
				                        </div>
				                      </div>
				                      <div class="info-right pull-right">
				                        <div class="address">
				                          <p>1234 North Avenue Luke, IN 360001 </p>
				                          <p> (01) 123 456 7890 </p>
				                          <p>support@website.com </p>
				                          <a href="css/index.html"><i class="fa fa-map-o pr-10"></i>  Find us here</a>
				                          <ul class="list-inline mt-15">
				                            <li><a href="#"> <i class="fa fa-facebook"></i> </a> </li>
				                            <li><a href="#"> <i class="fa fa-twitter"></i> </a> </li>
				                            <li><a href="#"> <i class="fa fa-google-plus"></i> </a> </li>
				                            <li><a href="#"> <i class="fa fa-instagram"></i> </a> </li>
				                            <li><a href="#"> <i class="fa fa-tripadvisor"></i> </a> </li>
				                          </ul>
				                        </div>
				                      </div>
				                    </div>
				                  <div class="menu-mobile-collapse-trigger"><span></span></div></li>
				                </ul>
				                <!-- menu links -->
				                <ul class="menu-links" style="display: none; max-height: 400px; overflow: auto;">
				                  <!-- active class -->
				                  	@if (Auth::guest())
					                  	<li class="hoverTrigger">
					                    	<a class="active" href="/">Home</a>
					                  	</li>
				                  	@else
					                  	<li class="hoverTrigger">
					                  		<a href="{{ url('/dashboard') }}">Dashboard</a>
					                  	</li>
				                  	@endif
				                  	<li class="hoverTrigger">
				                    	<a href="javascript:void(0)"> 
				                    		Menu <i class="fa fa-angle-down fa-indicator"></i> 
				                    		<div class="mobileTriggerButton"></div>
				                    	</a>
					                    <!-- drop down multilevel  -->
					                    <ul class="drop-down-multilevel effect-fade" style="transition: all 400ms ease 0s;">
					                    	@foreach ($categories as $key => $category)
						                      	<li><a href="{{ route('menu', $category->category) }}">{{ $category->category }}</a></li>
					                      	@endforeach
					                    </ul>
				                  	</li>
				                	<li class="hoverTrigger">
				                		<a href="#">Blog</a>
				              		</li>
				            		<li>
				            			<a href="#">Contact Us</a>
				            		</li>
				                  	<li>
				                  		<a href="#">About Us</a>
				                  	</li>
				                  	@if (Auth::guest())
				                        <li><a href="{{ url('/login') }}">Login</a></li>
				                        <li><a href="{{ url('/register') }}">Register</a></li>
				                    @else
				                        <li class="dropdown">
				                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				                                {{ Auth::user()->name }} <span class="caret"></span>
				                            </a>
				                            <ul class="dropdown-menu" role="menu">
				                                <li class="dropdown">
						                            <a class="dropdown-item" href="{{ route('logout') }}"
				                                       onclick="event.preventDefault();
				                                                     document.getElementById('logout-form').submit();">
				                                        {{ __('Logout') }}
				                                    </a>
				                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
														{!! csrf_field() !!}
				                                    </form>
						                        </li>
				                            </ul>
				                        </li>
				                    @endif
				          		</ul>
	        				</div>
	       				</div>
	      			</div>
	    		</section>
	   		</nav>
	  	<!-- menu end -->
	  	</div>
	</header>
	<!--================= header end ================-->


	<!--================= Content ================-->

	<div class="content">
        @yield('content')
    </div>

	<!--================= Content end ================-->

	



	<!--==================== footer =============-->

	<footer class="footer" style="background-image: url({{ URL::asset('images/bg/01.jpg') }});">
	  	<div class="object-bottom">
		    <div class="object-left">
		      	<img class="img-responsive bottom" src="{{ URL::asset('images/06(1).png') }}" alt="">
		    </div>
		    <div class="object-right">
		      	<img class="img-responsive bottom" src="{{ URL::asset('images/16(1).png') }}" alt="">
		    </div>
	  	</div>
	  	<div class="container">
		    <div class="row">
		      	<div class="col-lg-12 col-md-12 text-center mt-60">
			        <div class="footer-logo">
			          	<img id="logo-footer" class="img-responive" src="{{ URL::asset('images/logo.png') }}" alt="">
			        </div>
			        <div class="col-lg-8 col-lg-offset-2">
			          	<p class=" text-white mb-60">We provide you with daily self-made bread, sourdough pizza, roasted fish-meat-vegetables and many more. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
			        </div>
		      	</div>
		    </div>
		    <div class="row">
		      	<div class="col-lg-3 col-md-3 col-sm-6">
			        <div class="newsletter">
			          	<h4 class="text-white mb-30">Newsletter</h4>
			          	<p class="text-white">Signing up to our newsletter keeps you up-to-date!</p>
			          	<div class="newsletter-input">
				            <input type="email" placeholder="Your email*" name="email">
				            <a href="#"><i class="fa fa-envelope-o"></i></a>
			          	</div>
			        </div>
		      	</div>
		      	<div class="col-lg-3 col-md-3 col-sm-6">
			        <div class="tweet">
			          	<h4 class="text-white mb-30">Latest tweet</h4>
			          	<div class="tweet-block mb-20">
				            <div class="icon">
				              	<i class="fa fa-twitter text-white"></i>
				            </div>
				            <div class="content">
				              	<p class="text-white">Our brand new has just launched! </p>
				              	<span class="text-orange">03:05 AM Sep 18th</span>
				            </div>
			          	</div>
			          	<div class="tweet-block">
				            <div class="icon">
				              	<i class="fa fa-twitter text-white"></i>
				            </div>
				            <div class="content">
				              	<p class="text-white">Get your photo on win prizes. </p>
				              	<span class="text-orange">03:05 AM Sep 18th</span>
				            </div>
			          	</div>
			        </div>
		      	</div>
		      	<div class="col-lg-3 col-md-3 col-sm-6">
			        <div class="opening-time">
			          	<h4 class="text-white mb-30">Open time</h4>
			          	<ul>
				            <li>Monday<span class="text-right">8am - 2pm </span></li>
				            <li>Tuesday<span>10am - 4pm</span></li>
				            <li>Wednesday<span>11am - 4pm</span></li>
				            <li>Close on public holidays</li>
			          	</ul>
			        </div>
		      	</div>
		      	<div class="col-lg-3 col-md-3 col-sm-6">
			        <div class="contact">
			          	<h4 class="text-white mb-30">Contact</h4>
			          	<p class="text-white">1234 North Avenue Luke, IN 360001</p>
			          	<p class="text-white">(01) 123 456 7890</p>
			          	<p class="text-white">support@website.com</p>
			          	<a class="text-orange" href="#"><i class="fa fa-map-o pr-10"></i> Find us here</a>
			        </div>
		      	</div>
		    </div>
	  	</div>
	  	<div class="footer-bottom">
		    <div class="container">
		      	<div class="row">
			        <div class="co-lg-12 co-md-12 col-sm-12 col-xs-12 text-center">
			          	<div class="footer-social">
				            <ul class="list-inline">
				              	<li>
				              		<a href="#" data-tooltip="facebook"> <i class="fa fa-facebook"></i> </a> 
				              	</li>
				              	<li>
				              		<a href="#" data-tooltip="twitter"> <i class="fa fa-twitter"></i> </a> 
				              	</li>
				              	<li>
				              		<a href="#" data-tooltip="google-plus"> <i class="fa fa-google-plus"></i> </a> 
				              	</li>
				              	<li>
				              		<a href="#" data-tooltip="instagram"> <i class="fa fa-instagram"></i> </a> 
				              	</li>
				              	<li>
				              		<a href="#" data-tooltip="tripadvisor"> <i class="fa fa-tripadvisor"></i> </a>
			              		</li>
				            </ul>
			          	</div>
			          	<p class="text-white mt-30"> ©Copyright <span id="copyright"> <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span> All right reserved by The Zayka. Designed by <a href="http://shinygleam.com"> Shineygleam</a></p>
			        </div>
		      	</div>
		    </div>
	  	</div>
	</footer>

	<!--=================== footer end ==============-->

	<!--==================== back to top =============-->

	<div id="back-to-top" style="display: block;">
	  	<a class="top arrow" href="#top"><i class="fa fa-long-arrow-up"></i></a>
	</div>

	<!--==================== back to top end =============-->



	<!-- jquery  -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<!-- mega menu -->
	<script type="text/javascript" src="{{ URL::asset('js/mega_menu.js') }}"></script>

	<!-- owl carousel -->
	<script type="text/javascript" src="{{ URL::asset('js/owl.carousel.min.js') }}"></script>

	<!-- appear -->
	<script type="text/javascript" src="{{ URL::asset('js/jquery.appear.js') }}"></script>

	<!-- counter -->
	<script type="text/javascript" src="{{ URL::asset('js/jquery.countTo.js') }}"></script>

	<!-- datepicker -->
	<script type="text/javascript" src="{{ URL::asset('js/bootstrap-datetimepicker.min.js') }}"></script>

	<!-- open menu -->
	<script type="text/javascript" src="{{ URL::asset('js/modernizr.custom.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/bookblock.min.js') }}"></script>
	<script type="text/javascript" id="">!function(b,e,f,g,a,c,d){b.fbq||(a=b.fbq=function(){a.callMethod?a.callMethod.apply(a,arguments):a.queue.push(arguments)},b._fbq||(b._fbq=a),a.push=a,a.loaded=!0,a.version="2.0",a.queue=[],c=e.createElement(f),c.async=!0,c.src=g,d=e.getElementsByTagName(f)[0],d.parentNode.insertBefore(c,d))}(window,document,"script","https://connect.facebook.net/en_US/fbevents.js");fbq("init","319674328552704");fbq("track","PageView");</script>
	<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=319674328552704&amp;ev=PageView&amp;noscript=1"></noscript>



	<!-- nicescroll -->
	<script type="text/javascript" src="{{ URL::asset('js/jquery.nicescroll.min.js') }}"></script>

	<!-- select -->
	<script type="text/javascript" src="{{ URL::asset('js/jquery-select.js') }}"></script>

	<!-- REVOLUTION JS FILES -->
	<script type="text/javascript" src="{{ URL::asset('js/jquery.themepunch.tools.min.js') }}"></script>>

	<!-- style customizer  -->
	<script type="text/javascript" src="{{ URL::asset('js/style-customizer.js') }}"></script>

	<!-- custom -->
	<script type="text/javascript" src="{{ URL::asset('js/custom.js') }}"></script>
</body>