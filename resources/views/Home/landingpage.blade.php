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
<link href=" {{ asset('img/faviconnew.png') }}" rel="icon">

<link rel="stylesheet" href="{{ asset('landingpage/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('landingpage/css/animate.css') }}">
<link rel="stylesheet" href="{{ asset('landingpage/css/font-awesome.min.css') }}">

<link rel="stylesheet" href="{{ asset('landingpage/css/magnific-popup.css') }}">

<link rel="stylesheet" href="{{ asset('landingpage/css/owl.theme.css') }}">
<link rel="stylesheet" href="{{ asset('landingpage/css/owl.carousel.css') }}">

<!-- Toastr -->
<link href="{{ asset('lib/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="{{ asset('lib/magnific-popup/dist/magnific-popup.css') }}"/>

<!-- Main css -->
<link rel="stylesheet" href="{{ asset('landingpage/css/style.css') }}">
<style>
  img.photo{
      display:block; width:auto; height:200px;
  }
</style>
</head>
<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">


<!-- PRE LOADER -->
<div class="preloader">
     <div class="sk-spinner sk-spinner-pulse"></div>
</div>

<!-- Navigation Section -->
<div class="navbar navbar-default navbar-fixed-top black-bg">
	<div class="container">

		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
			</button>
			<a href="{{ route('getHome') }}" class="navbar-brand">Green<span>House</span></a>
		</div>

		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#home" class="smoothScroll">Home</a></li>
				<li><a href="#screenshot" class="smoothScroll">Gallery</a></li>
        <li><a href="#footer" class="smoothScroll">Connect with Us</a></li>
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
            <h1 class="wow fadeInUp" data-wow-delay="0.6s">{{ $greenhouse->welcome }}</h1>
            <p class="wow fadeInUp" data-wow-delay="0.8s">{{ $greenhouse->welcome_desc }}</p>
            {{-- <a href="#pricing" class="wow fadeInUp section-btn btn btn-success smoothScroll" data-wow-delay="1s">Login</a> --}}
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
          <h1>Galeri GreenHouse</h1>
          <p class="wow fadeInUp" data-wow-delay="0.8s">{{ $greenhouse->galeri_desc }}</p>
        </div>
      </div>
      <!-- Screenshot Owl Carousel -->
      <div id="screenshot-carousel" class="owl-carousel">
        @foreach($galeri as $gal)
          <div class="item col-md-3 col-sm-3 wow fadeInUp" data-wow-delay="0.9s">
            <a href="{{ asset('landingpage/gallery/'.$gal->image) }}" class="photo image-popup" title="{{ $gal->title }}">
              <center><img src="{{ asset('landingpage/gallery/'.$gal->image) }}" class="photo img-responsive" alt="screenshot" title="{{ $gal->title }}"></center>
            </a>
            <h3 style="color: #4ECDC4;"><center>{{ $gal->title }}</center></h3>
            <h5><center>{{ $gal->description }}</center></h5>
            {{-- <label style="color: #ffffff">{{ $gal->title }}</label>
            <label style="color: #ffffff">{{ $gal->description }}</label> --}}
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

{{--
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
</section> --}}

<!-- Footer Section -->
<footer id="footer">
	<div class="container">
		<div class="row">
      <div class="col-md-6 col-sm-6">
           <div class="wow fadeInUp footer-fixed" data-wow-delay="0.4s">
                <h1>Connect with Us </h1>
           </div>
      </div>
			<div class="col-md-6 col-sm-6">
				<ul class="wow fadeInUp" data-wow-delay="0.8s">
          <h4>{{ $greenhouse->alamat }}</h4>
          <h4>{{ $greenhouse->kota }}</h4>
          <h5>Call/Whatsapp : {{ $greenhouse->noHP }}</h5>
          <h5>Email : {{ $greenhouse->email }}</h5>
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
        <input name="username" type="text" class="form-control" id="username" style="background: #ffffff; color: #527751;" placeholder="Username" required autofocus>
        <input name="password" type="password" class="form-control" id="password" style="background: #ffffff; color: #527751;" placeholder="Password" required>
        {{-- <input name="submit" type="submit" class="form-control" id="submit" value="Login"> --}}
        <button class="btn btn-block btn-lg" style="background: #527751; color: #ffffff;" type="submit">Log In</button>
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
<!-- Toastr js -->
<script src="{{ asset('lib/toastr/toastr.min.js') }}"></script>
<!-- Magnific popup -->
<script type="text/javascript" src="{{ asset('lib/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>
<script>
  $(document).ready(function () {
    $('.image-popup').magnificPopup({
      type: 'image',
    });
  });
</script>
@if (session('status'))
  <script>
      var status = "{{session('status')}}";
      // Display a success toast, with a title
      toastr.success(status, 'Success')
  </script>
  @elseif (session('warning'))
  <script>
      var status = "{{session('warning')}}";
      // Display a success toast, with a title
      toastr.warning(status, 'Warning!')
  </script>
  @elseif (session('failed'))
  <script>
    var status = "{{session('failed')}}";
    // Display a success toast, with a title
    toastr.error(status, 'Failed!')
  </script>
  @endif
  @if ($errors->any())
  @php
      $er="";
  @endphp
  @foreach ($errors->all() as $error)
      @php
      $er .= "<li>".$error."</li>";
      @endphp
  @endforeach
  <script>
      var error = "<?=$er?>";
      // Display an error toast, with a title
      toastr.error(error, 'Error!!!')
  </script>
  @endif

</body>

</html>
