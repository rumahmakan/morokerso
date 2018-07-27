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
				   					<h1>Ubah Password</h1>
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
							<h3>Form Ubah Password</h3>
							<form action="/user/edit/password" method="post"> {{ csrf_field() }}
								<div class="row form-group">
									<div class="col-md-12">
										<label for="nama">Password Lama</label>
										<input type="password" name="oldpassword" class="form-control" placeholder="Password Lama" required>
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-12">
										<label for="email">Password Baru</label>
										<input type="password" name="password" class="form-control" placeholder="Password Baru" required>
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-12">
										<label for="password">Ketik Ulang Password Baru</label>
										<input type="password" name="confirm-password" class="form-control" placeholder="Konfirmasi Password Baru" required>
									</div>
								</div>
                @if (session('status'))
										<div class="alert alert-danger">
												<p style="text-align: center">{{ session('status') }}</p>
										</div>
								@endif
								<div class="form-group text-center">
									<input type="submit" value="Ubah" name="register-submit" class="btn btn-primary">
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
			<h3 style="text-align: center">Silahkan login terlebih dahulu</h3>
		</div>
		@endif
@endsection
