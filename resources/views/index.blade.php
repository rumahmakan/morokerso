@extends ('layouts.penulisan')

@section('content')
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url({{env('APP_URL')}}/images/beranda_1.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
					   					<h1 class="head-1">Ayam</h1>
					   					<h2 class="head-2">Bakar</h2>
					   					<h2 class="head-2">Morokerso</h2>
					   					<p class="category"><span>Buka : 11.00 - 23.00 WIB</span></p>
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url({{env('APP_URL')}}/images/beranda_2.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner">
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	 </li>
					 <li style="background-image: url({{env('APP_URL')}}/images/beranda_3.jpg);">
 			   		<div class="overlay"></div>
 			   		<div class="container-fluid">
 			   			<div class="row">
 				   			<div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
 				   				<div class="slider-text-inner">
 				   				</div>
 				   			</div>
 				   		</div>
 			   		</div>
 			   	 </li>
					 <li style="background-image: url({{env('APP_URL')}}/images/beranda_4.jpg);">
 			   		<div class="overlay"></div>
 			   		<div class="container-fluid">
 			   			<div class="row">
 				   			<div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
 				   				<div class="slider-text-inner">
 				   				</div>
 				   			</div>
 				   		</div>
 			   		</div>
 			   	 </li>
			  	</ul>
		  	</div>
		</aside>

		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span>Menu Terpopuler</span></h2>
						<p>Menu ini adalah menu terpopuler yang banyak dibeli oleh pelanggan yang datang dan pelanggan yang memesan pada rumah makan ayam bakar morokerso</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 text-center">
						<div class="product-entry">
							<div id = "imageBerandaMenu" style="background-image: url(images/1.jpg);">
							</div>
							<div class="desc">
								<br>
								<h2><a href="/menu/1">Ayam Bakar 1 Ekor</a></h2>
								<p>Ayam bakar ini dibuat dengan cita rasa ayam kalasan yang berasal dari Jawa Tengah. Bumbu yang digunakan yaitu bumbu yang terasa manis dan gurih dan dihidangkan dengan sambal yang memiliki rasa pedas dan manis</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="colorlib-intro" class="colorlib-intro" style="background-image: url(images/box.jpg);" data-stellar-background-ratio="0.6">
					<div class="overlay"></div>
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<div class="intro-desc">
									<div class="text-salebox">
										<div class="text-lefts">
											<div class="sale-box">
												<div class="sale-box-top">
													<h2 class="number">Bonus</h2>
												</div>
												<h2 class="text-sale">Box</h2>
											</div>
										</div>
										<div class="text-rights">
											<h3 class="title">Jangan lewatkan kesempatan ini!</h3>
											<p>Setiap pemesanan sebanyak 100 box akan mendapatkan bonus box!</p>
											<p><a href="contact" class="btn btn-primary">Pesan</a></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

@endsection
