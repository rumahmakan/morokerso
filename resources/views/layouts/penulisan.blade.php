<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Morokerso</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

	<!--Time Picker-->
	<link href="{{env('APP_URL')}}/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{env('APP_URL')}}/css/bootstrap-timepicker.min.css" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="{{env('APP_URL')}}/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{env('APP_URL')}}/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{env('APP_URL')}}/css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{env('APP_URL')}}/css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="{{env('APP_URL')}}/css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="{{env('APP_URL')}}/css/owl.carousel.min.css">
	<link rel="stylesheet" href="{{env('APP_URL')}}/css/owl.theme.default.min.css">

	<!-- Date Picker -->
	<link rel="stylesheet" href="{{env('APP_URL')}}/css/bootstrap-datepicker.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="{{env('APP_URL')}}/fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="{{env('APP_URL')}}/css/style.css">

	<!-- Modernizr JS -->
	<script src="{{env('APP_URL')}}/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	<!-- Latest compiled and minified JavaScript -->
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<!-- jQuery -->
	<script src="{{env('APP_URL')}}/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="{{env('APP_URL')}}/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="{{env('APP_URL')}}/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="{{env('APP_URL')}}/js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="{{env('APP_URL')}}/js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="{{env('APP_URL')}}/js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="{{env('APP_URL')}}/js/jquery.magnific-popup.min.js"></script>
	<script src="{{env('APP_URL')}}/js/magnific-popup-options.js"></script>
	<!-- Stellar Parallax -->
	<script src="{{env('APP_URL')}}/js/jquery.stellar.min.js"></script>
	<!-- Google map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmVi24lfhBitc-Mhle7rGSursq9iS8sC4&sensor=false&callback=initMap"></script>
	<script src="{{env('APP_URL')}}/js/google_map.js"></script>
	<!-- Main -->
	<script src="{{env('APP_URL')}}/js/main.js"></script>
	<!-- Date Picker -->
	<script src="{{env('APP_URL')}}/js/bootstrap-datepicker.js"></script>
	<!--Time Picker-->
	<script src="{{env('APP_URL')}}/js/bootstrap.min.js"></script>
  <script src="{{env('APP_URL')}}/js/bootstrap-timepicker.min.js"></script>
	</head>

	<body>

	<div class="colorlib-loader"></div>

	<div id="page">
		<nav id="line" class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-2 text-left">
							<div id="colorlib-logo"><a href="/"><img id="imageLogo" src = "{{env('APP_URL')}}/images/logo.jpg"></a></div>
							<!--kalau logonya ingin gambar -> <img src = "{{env('APP_URL')}}/images/logo-2.jpg" height="37" width="175">-->
						</div>
						@php
							use App\Users;
							if (session('roles_id') == 1||session('roles_id') == 2){
							$users = Users::all()->where("id", session("id"))->first();
							}
						@endphp
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li><a href="/">Beranda</a></li>
								<li><a href="/menu">Menu Kami</a></li>
								<li><a href="/about">Tentang Kami</a></li>
								@if (session('roles_id') == 1)
								<li class="has-dropdown">
										<a href="/contact">Pemesanan</a>
										<ul class="dropdown">
											<li><a href="/tabel/pemesanan">Tabel Pemesanan</a></li>
										</ul>
									</li>
								@else
								<li><a href="/contact">Pemesanan</a></li>
								@endif
								@if (session('roles_id') == 1||session('roles_id') == 2)
								<li class="has-dropdown">
										<a href="#"><img id="imagePreviewNav" src = "{{$users->avatar}}"> Halo, {{substr($users->name,0,25)}}</img></a>
										<ul class="dropdown">
											<li><a href="/user">Pengaturan</a></li>
											<li><a href="/logout">Keluar</a></li>
										</ul>
									</li>
								@else
								<li class="has-dropdown">
										<a href="#">Akun</a>
										<ul class="dropdown">
										<li><a href="/login">Masuk</a></li>
										<li><a href="/daftar">Daftar</a></li>
										</ul>
									</li>
								@endif
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>

	@yield ('content')

  <div id="colorlib-subscribe">
  </div>
  <footer id="colorlib-footer" role="contentinfo">
    <div class="container">
      <div class="row row-pb-md">
        <div class="col-md-4">
          <h4><b>Rumah Makan Ayam Bakar Morokerso</b></h4>
					<p>Pada tahun 2006 pemilik rumah makan mencoba merintis usaha ayam bakar. Saat itu pemilik rumah makan mencoba dengan dua atau tiga menu seperti ayam bakar, nasi, dan teh manis. Dengan berjalannya waktu pemilik rumah makan menambah menu yang ada seperti ayam goreng, tahu, tempe, sate usus, sate telur puyuh, dan sate ati.</p>
						<p>
        </div>
				<div class = "col-md-4 text-center" style = "border-right: 3px solid black; border-left: 3px solid black; border-width:3px; padding-left: 50px; padding-right : 50px">
					<h4><b>Peta</b></h4>
          <p>
            <ul class="colorlib-footer-links">
              <li><img id="imageMap" src = "{{env('APP_URL')}}/images/map_2.jpg"></li>
            </ul>
          </p>
				</div>
        <div class="col-md-4">
					<h4><b>Informasi Kontak</b></h4>
					<p>
						<ul class="colorlib-footer-links">
							<li><p><b>Alamat : </b></p></li>
							<li><p style="text-align: left"><span><i class="icon-location"></i></span>Jl. Kalisari 2, RT.12/RW.11, Kalisari, Ps. Rebo, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13790</p></li>
							<li><p><b>Nomor Handphone : </b></p>
							<li><p style="text-align: left"><span><i class="icon-phone3"></i></span>+62 852 1880 7906</p></li>
						</ul>
					</p>
        </div>
      </div>
    </div>
    <div class="copy">
      <div class="row">
        <div class="col-md-12 text-center">
          <p>

            <span class="block"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart2" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
            <span class="block">Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a> , <a href="http://pexels.com/" target="_blank">Pexels.com</a></span>
          </p>
        </div>
      </div>
    </div>
  </footer>
</div>



</body>
</html>
