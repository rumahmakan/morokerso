@extends ('layouts.penulisan')

@section('content')
		<aside id="colorlib-hero" class="breadcrumbs">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url({{env('APP_URL')}}/images/title.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>Tentang Kami</h1>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<div id="colorlib-about">
			<div class="container">
				<div class="row">
					<div class="about-flex">
						<div class="col-two-forth">
							<div class="row">
								<div class="col-md-6">
									<h2>Sejarah</h2>
									 <p>Pada tahun 2006 pemilik rumah makan mencoba merintis usaha ayam bakar. Saat itu pemilik rumah makan mencoba dengan dua atau tiga menu seperti ayam bakar, nasi, dan teh manis. Dengan berjalannya waktu pemilik rumah makan menambah menu yang ada seperti ayam goreng, tahu, tempe, sate usus, sate telur puyuh, dan sate ati. </p>

									 <p>Hingga saat ini menu tersebut masih disediakan. Untuk pemesanan pemilik rumah makan menyediakan paket box yang berisi ayam bakar dada atau paha satu potong. Kemudian ada juga nasi yang telah dibungkus dengan daun pisang, lalap dan sambal sebagai tambahan pada paketan tersebut.</p>
								</div>
								<div class="col-md-6">
									<h2>Informasi Kontak</h2>
								<div class="col-md-12">
									<p style="text-align: left"><span><i class="icon-location"></i></span>Jl. Kalisari 2, RT.12/RW.11, Kalisari, Ps. Rebo, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13790</p>
								</div>
								<div class="col-md-6">
									<p style="text-align: left"><span><i class="icon-phone3"></i></span>+62 852 1880 7906</p>
								</div>
						   </div>
						  </div>
						 </div>
						</div>
						<h2>Peta Lokasi Rumah Makan</h2>
					<div id="map" class="colorlib-map"></div>
					</br>

				</div>
			</div>
		</div>


@endsection
