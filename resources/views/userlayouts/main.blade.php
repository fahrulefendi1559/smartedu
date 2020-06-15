<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Smart Education</title>
	<link rel="icon" href="{{asset('user/img/Fevicon.png')}}" type="image/png">

  <link rel="stylesheet" href="{{asset('user/vendors/bootstrap/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('user/vendors/fontawesome/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('user/vendors/themify-icons/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('user/vendors/linericon/style.css')}}">
  <link rel="stylesheet" href="{{asset('user/vendors/owl-carousel/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{asset('user/vendors/owl-carousel/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('user/vendors/flat-icon/font/flaticon.css')}}">
  <link rel="stylesheet" href="{{asset('user/vendors/nice-select/nice-select.css')}}">

  <link rel="stylesheet" href="{{asset('user/css/style.css')}}">
</head>
<body class="bg-shape">

  <!--================ Header Menu Area start =================-->
  @include('userlayouts.menu')
  <!--================Header Menu Area =================-->

  @yield('content')

  <!-- ================ start footer Area ================= -->
  @include('userlayouts.footer')
  <!-- ================ End footer Area ================= -->




  <script src="{{asset('user/vendors/jquery/jquery-3.2.1.min.js')}}"></script>
  <script src="{{asset('user/vendors/bootstrap/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('user/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('user/vendors/nice-select/jquery.nice-select.min.js')}}"></script>
  <script src="{{asset('user/js/jquery.ajaxchimp.min.js')}}"></script>
  <script src="{{asset('user/js/mail-script.js')}}"></script>
  <script src="{{asset('user/js/skrollr.min.js')}}"></script>
  <script src="{{asset('user/js/main.js')}}"></script>
</body>
</html>