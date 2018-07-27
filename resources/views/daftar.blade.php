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
				   					<h1>Daftar</h1>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<div id="colorlib-contact">
			<div class="container">
				<div class="row">
          <div class="col-md-10 col-md-offset-1">
						<div class="contact-wrap">
							<h3>Form Daftar</h3>
							<form action="/daftar" method="post"> {{ csrf_field() }}
								<div class="row form-group">
									<div class="col-md-6 padding-bottom">
										<label for="nama">Nama</label>
										<input type="text" id="name" name="name" class="form-control" placeholder="Nama Anda" required>
									</div>
									<div class="col-md-6">
										<label for="email">E-mail</label>
										<input type="E-mail" id="email" name="email" class="form-control" placeholder="E-mail Anda" value="{{ old('email') }}" required>
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-12">
										<label for="password">Password</label>
										<input type="password" id="password" name="password" class="form-control" placeholder="Password Anda" required>
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-12">
										<label for="password">Ketik Ulang Password</label>
										<input type="password" id="password-2" name="confirm-password" class="form-control" placeholder="Ketik Ulang Password Anda" required>
									</div>
								</div>
								@if (session('status'))
										<div class="alert alert-danger">
												<p style="text-align: center">{{ session('status') }}</p>
										</div>
								@endif
								<div class="form-group text-center">
									<input type="submit" value="Daftar" name="register-submit" class="btn btn-primary">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

@endsection
