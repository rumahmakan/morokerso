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
				   					<h1>Pemesanan</h1>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>
		@if (session('roles_id') == 1 ||session('roles_id') == 2)
		<div id="colorlib-contact">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="contact-wrap">
							<h3>Form Pemesanan</h3>
							<p>(Pemesanan hanya bisa dilakukan dengan tujuan wilayah Jakarta Timur dan Depok)</p>
							@if (session('alert'))
									<div class="alert alert-danger">
											<p style="text-align: center">{{ session('alert') }}</p>
									</div>
							@endif
							@if (session('status'))
									<div class="alert alert-success">
											<p style="text-align: center">{{ session('status') }}</p>
									</div>
							@endif
							<form action="/contact" method="post"> {{ csrf_field() }}
								<div class="row form-group">
									<div class="col-md-12">
										<label for="nama">Nama Pemesan</label>
										<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Anda" required>
									</div>
								</div>

								<div class="row form-group">
									<div class="col-md-6 padding-bottom">
										<label for="nama_menu">Menu</label>
									  <select name="nama_menu" class="form-control">
											@foreach( $menu as $data )
											  <option value="{{ $data->id }}">{{ $data->nama_menu}} Harga : Rp. {{ $data->harga}}</option>
											@endforeach
									  </select>
									</div>
									<div class="col-md-6">
										<label for="jmlh">Jumlah Pesanan</label>
										<input type="text" name="jmlh_pesanan" class="form-control" placeholder="Jumlah Pemesanan Minimal adalah 25" required>
									</div>
								</div>

								<div class="row form-group">
									<div class="col-md-12">
										<label for="keterangan">Keterangan Pesanan</label>
										<input type="text" name="ket" class="form-control" placeholder="Keterangan untuk pemesanan, mis : menu tambahan">
									</div>
								</div>

								<div class="row form-group">
									<div class="col-md-12">
										<label for="No.HP">Nomor HP</label>
										<input type="text" name="no_hp" id="No.HP" class="form-control" placeholder="Nomor HP Anda" required>
									</div>
								</div>

								<div class="row form-group">
									<div class="col-md-12">
										<label for="alamat">Alamat</label>
										<textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control" placeholder="Alamat Lengkap Rumah Anda" required></textarea>
									</div>
								</div>

								<div class="row form-group">
									<div class="col-md-6 padding-bottom">
										<label for="nama_menu">Tanggal Pemesanan</label>
										<div class='input-group date'>
				                <input type='text' name="tanggal" class="form-control" placeholder="Bulan/Hari/Tahun" required>
				                <span class="input-group-addon">
				                    <span class="	glyphicon glyphicon-calendar"></span>
				                </span>
				            </div>
									</div>

								<div class="col-md-6">
									<label for="jmlh">Pukul</label>
									<div class="input-group bootstrap-timepicker timepicker">
					            <input id="timepicker1" type="text" name="pukul" class="form-control input-small" required>
					            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
					        </div>
					        <script type="text/javascript">
					            $('#timepicker1').timepicker({defaultTime: '00:00 AM'});
					        </script>
								</div>
							</div>

								<div class="form-group text-center">
									<input type="submit" value="Pesan" class="btn btn-primary">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		@else
		<div class="col-md-10 col-md-offset-1 alert alert-danger">
			<h3 style="text-align: center">Silahkan login untuk melakukan pemesanan</h3>
		</div>
		@endif
@endsection
