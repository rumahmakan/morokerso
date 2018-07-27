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
				   					<h1>Ubah Menu</h1>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		@if (session('roles_id') == 1)
		<div id="colorlib-contact">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="contact-wrap">
							<h3>Form Ubah Menu</h3>
              @foreach( $menu as $menus )
							<div class="row form-group">
								<div class="col-md-12">
									<div class="show-image-menu">
									<img id="imagePreviewMenu" src = "{{$menus->gambar_menu}}">
									<a href="/menu/edit/{{$menus->id}}/gambar"><button class="btn btn-primary">Ubah</button></a>
									</div>
								</div>
							</div>
							<form action="/menu/edit/{{$menus->id}}" method="post"> {{ csrf_field() }}
								<input type="hidden" name="gambar_menu" class="form-control" value="{{$menus->gambar_menu}}">
								<div class="row form-group">
									<div class="col-md-12">
										<label>Nama Menu</label>
										<input type="text" name="nama_menu" class="form-control" value="{{ $menus->nama_menu}}" required>
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-12">
										<label>Harga</label>
										<input type="text" name="harga" class="form-control" value="{{ $menus->harga}}" required>
									</div>
								</div>
                <div class="row form-group">
									<div class="col-md-12">
										<label>Pemesanan</label>
                    <select name="pesan" class="form-control">
                       @if ( $menus -> pesan == 1 )
											    <option value="1" selected>Ya</option>
                          <option value="0">Tidak</option>
                       @else
                          <option value="1">Ya</option>
                          <option value="0" selected>Tidak</option>
                       @endif
									  </select>
									</div>
								</div>

								<div class="row form-group">
									<div class="col-md-12">
										<label>Jenis Menu</label>
                    <select name="jenis" class="form-control">
												@if ( $menus -> jenis == 1 )
											  <option value="1" selected>Makanan</option>
                        <option value="3">Tambahan</option>
												<option value="2">Paketan</option>
												@elseif ( $menus -> jenis == 3 )
											  <option value="1">Makanan</option>
                        <option value="3" selected>Tambahan</option>
												<option value="2">Paketan</option>
												@elseif ( $menus -> jenis == 2 )
											  <option value="1">Makanan</option>
                        <option value="3">Tambahan</option>
												<option value="2" selected>Paketan</option>
												@endif
									  </select>
									</div>
								</div>

                <div class="row form-group">
									<div class="col-md-12">
										<label>Deskripsi Menu</label>
										<input type="text" name="deskripsi" class="form-control" value="{{ $menus->deskripsi_menu}}" required>
									</div>
								</div>
                @endforeach

                @if (session('status'))
                    <div class="alert alert-danger">
                        <p style="text-align: center">{{ session('status') }}</p>
                    </div>
                @endif
								<div class="form-group text-center">
									<input type="submit" name="login-submit" value="Ubah" class="btn btn-primary">
					  		</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		@else
		<br>
		<div class="col-md-10 col-md-offset-1 alert alert-danger">
			<h3 style="text-align: center">Error</h3>
		</div>
		@endif
@endsection
