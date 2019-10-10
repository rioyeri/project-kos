<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<title>Welcome to GreenHouse</title>
<!--
App Starter Template
http://www.templatemo.com/tm-492-app-starter
-->
<link rel="stylesheet" href="{{ asset('landingpage/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('landingpage/css/animate.css') }}">
<link rel="stylesheet" href="{{ asset('landingpage/css/font-awesome.min.css') }}">

<link rel="stylesheet" href="{{ asset('landingpage/css/magnific-popup.css') }}">

<link rel="stylesheet" href="{{ asset('landingpage/css/owl.theme.css') }}">
<link rel="stylesheet" href="{{ asset('landingpage/css/owl.carousel.css') }}">

<!-- Main css -->
<link rel="stylesheet" href="{{ asset('landingpage/css/style.css') }}">

</head>
<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">


<!-- PRE LOADER -->
<div class="preloader">
     <div class="sk-spinner sk-spinner-pulse"></div>
</div>

<!-- Navigation Section -->
<div class="navbar navbar-default navbar-fixed-top">
	<div class="container">

		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
			</button>
			<a href="{{ route('getHome') }}" class="navbar-brand"><span>Green</span>House</a>
		</div>

		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#home" class="smoothScroll">Home</a></li>
				<li><a href="#screenshot" class="smoothScroll">Gallery</a></li>
        <li><a href="#pricing" class="smoothScroll">Pricing</a></li>
        <li><a href="#" data-toggle="modal" data-target="#modal1">Login</a></li>
			</ul>
		</div>
	</div>
</div>

<!-- Home Section -->
<section id="home" class="main">
  <div class="overlay"></div>
  	<div class="container">
	  	<div class="row">
        <div class="wow fadeInUp col-md-6 col-sm-5 col-xs-10 col-xs-offset-1 col-sm-offset-0" data-wow-delay="0.2s">
          <img src="{{ asset('landingpage/images/logo-removebg-preview (3).png') }}" class="img-responsive" alt="Home">
        </div>
        <div class="col-md-6 col-sm-7 col-xs-12">
          <div class="home-thumb">
            <h1 class="wow fadeInUp" data-wow-delay="0.6s">Selamat Datang Di Green House</h1>
            <p class="wow fadeInUp" data-wow-delay="0.8s">Kos yang paling nyaman dan aman, di Cipadung</p>
            <a href="#pricing" class="wow fadeInUp section-btn btn btn-success smoothScroll" data-wow-delay="1s">Login</a>
          </div>
        </div>
		</div>
	</div>
</section>

<!-- Screenshot Section -->
<section id="screenshot">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-2 col-md-8 col-sm-12">
        <div class="section-title">
          <h1>App Screenshots</h1>
          <p class="wow fadeInUp" data-wow-delay="0.8s">Nulla nisi purus, ultrices et scelerisque at, ullamcorper et ex. Phasellus at nisi lobortis, semper tortor sed, gravida neque.</p>
        </div>
      </div>
      <!-- Screenshot Owl Carousel -->
      <div id="screenshot-carousel" class="owl-carousel">
        <div class="item col-md-3 col-sm-3 wow fadeInUp" data-wow-delay="0.9s">
          <a href="{{ asset('landingpage/images/gambar2.jpeg') }}" class="image-popup">
            <img src="{{ asset('landingpage/images/gambar2.jpeg') }}" class="img-responsive" alt="screenshot">
          </a>
        </div>
        <div class="item col-md-3 col-sm-3 wow fadeInUp" data-wow-delay="0.9s">
          <a href="{{ asset('landingpage/images/gambar1.jpeg') }}" class="image-popup">
            <img src="{{ asset('landingpage/images/gambar1.jpeg') }}" class="img-responsive" alt="screenshot">
          </a>
        </div>
        <div class="item col-md-3 col-sm-3 wow fadeInUp" data-wow-delay="0.9s">
          <a href="{{ asset('landingpage/images/gambar3.jpeg') }}" class="image-popup">
            <img src="{{ asset('landingpage/images/gambar3.jpeg') }}" class="img-responsive" alt="screenshot">
          </a>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Pricing Section -->
<section id="pricing">
  <div class="container">
       <div class="row">
             <div class="col-md-12 col-sm-12">
                 <div class="section-title">
                      <h1>App Pricing</h1>
                      <hr>
                 </div>
            </div>
            <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="0.4s">
                 <div class="pricing-plan">
                      <div class="pricing-month">
                           <h2>$60</h2>
                      </div>
                      <div class="pricing-title">
                           <h3>Starter</h3>
                      </div>
                      <p>40 Users</p>
                      <p>10GB per user</p>
                      <p>Unlimited Support</p>
                      <p>1 Year License</p>
                      <button class="btn btn-default section-btn">Register now</button>
                 </div>
                </div>
            <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="0.6s">
                 <div class="pricing-plan">
                      <div class="pricing-month">
                           <h2>$120</h2>
                      </div>
                      <div class="pricing-title">
                           <h3>Business</h3>
                      </div>
                      <p>100 Users</p>
                      <p>20GB per user</p>
                      <p>Unlimited Support</p>
                      <p>2 Years License</p>
                      <button class="btn btn-default section-btn">Register now</button>
                 </div>
            </div>
            <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="0.8s">
                 <div class="pricing-plan">
                      <div class="pricing-month">
                           <h2>$200</h2>
                      </div>
                      <div class="pricing-title">
                           <h3>Advanced</h3>
                      </div>
                      <p>200 Users</p>
                      <p>30GB per user</p>
                      <p>Unlimted Support</p>
                      <p>3 Years License</p>
                      <button class="btn btn-default section-btn">Register now</button>
                 </div>
            </div>
       </div>
  </div>
</section>

<!-- Footer Section -->
<footer>
	<div class="container">
		<div class="row">
      <div class="col-md-8 col-sm-6">
           <div class="wow fadeInUp footer-copyright" data-wow-delay="0.4s">
                <p>Copyright &copy; 2016 Your App Starter
                <span>||</span>
                Design: <a href="https://plus.google.com/+templatemo" title="free css templates" target="_blank">Templatemo</a></p>
           </div>
      </div>
			<div class="col-md-4 col-sm-6">
				<ul class="wow fadeInUp social-icon" data-wow-delay="0.8s">
          <li><a href="#" class="fa fa-facebook"></a></li>
          <li><a href="#" class="fa fa-twitter"></a></li>
          <li><a href="#" class="fa fa-google-plus"></a></li>
          <li><a href="#" class="fa fa-dribbble"></a></li>
          <li><a href="#" class="fa fa-linkedin"></a></li>
        </ul>
      </div>
		</div>
	</div>
</footer>

<!-- Modal Contact -->
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content modal-popup">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title">Login</h2>
      </div>
      <form action="{{ route('login')}}" method="POST" class="form-login">
        @csrf
        <input name="username" type="text" class="form-control" id="username" placeholder="Username" required autofocus>
        <input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
        {{-- <input name="submit" type="submit" class="form-control" id="submit" value="Login"> --}}
        <button class="btn btn-success" type="submit">Log In</button>
      </form>
    </div>
  </div>
</div>


<!-- Back top -->

<a href="#" class="go-top"><i class="fa fa-angle-up"></i></a>


<!-- SCRIPTS -->

<script src="{{ asset('landingpage/js/jquery.js') }}"></script>
<script src="{{ asset('landingpage/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('landingpage/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('landingpage/js/magnific-popup-options.js') }}"></script>
<script src="{{ asset('landingpage/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('landingpage/js/smoothscroll.js') }}"></script>
<script src="{{ asset('landingpage/js/wow.min.js') }}"></script>
<script src="{{ asset('landingpage/js/custom.js') }}"></script>

</body>
</html>
