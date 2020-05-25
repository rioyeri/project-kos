<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Green House | @yield('page')</title>

  @yield('css')
  <!-- Favicons -->
  <link href=" {{ asset('img/faviconnew.png') }}" rel="icon">
  <link href=" {{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Notification css (Toastr) -->
  <link href="{{ asset('lib/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />

  <!-- Bootstrap core CSS -->
  <link href= "{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!--external css-->
  <link href= "{{ asset('lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href= "{{ asset('lib/gritter/css/jquery.gritter.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('lib/bootstrap-datepicker/css/datepicker.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('lib/bootstrap-fileupload/bootstrap-fileupload.css')}}" />
  <!-- Custom styles for this template -->
  <link href= "{{ asset('css/style.css')}}" rel="stylesheet">
  <link href= "{{ asset('css/style-responsive.css')}}" rel="stylesheet">

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>
