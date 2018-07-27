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
				   					<h1>Pengaturan Akun</h1>
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
							<h3>Form Pengaturan Akun</h3>
							<div class="row form-group">
								<div class="col-md-12">
									<div class="show-image">
									<img id="imagePreviewAvatar" src = "{{$users->avatar}}">
									<a href="/user/edit/avatar"><button class="btn btn-primary">Ubah</button></a>
									</div>
								</div>
							</div>

							<form action="/user" method="post">{{ csrf_field() }}
								<input type="hidden" name="avatar" class="form-control" value="{{$users->avatar}}">
									<div class="row form-group">
										<div class="col-md-12">
											<label for="name">Nama</label>
	                    <input type="text" id="name" name="name" class="form-control" value="{{$users->name}}" required>
	                  </div>
	                </div>

                <div class="row form-group">
                  <div class="col-md-12">
										<label for="email">E-mail</label>
										<input type="E-mail" id="email" name="email" class="form-control" value="{{$users->email}}" readonly>
										<a href="/user/edit/email">Ubah Email</a>
									</div>
								</div>

								<div class="row form-group">
									<div class="col-md-12">
										<label for="password">Password</label>
										<input type="password" id="password" name="password" class="form-control" value="{{$users->password}}" readonly>
                    <a href="/user/edit/password">Ubah Password</a>
									</div>
								</div>

								@if (session('status'))
										<div class="alert alert-success">
												<p style="text-align: center">{{ session('status') }}</p>
										</div>
								@endif
								<div class="form-group text-center">
									<input type="submit" value="Ubah" name="register-submit" class="btn btn-primary">
								</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		@else
		<div class="col-md-10 col-md-offset-1 alert alert-danger">
			<h3 style="text-align: center">Silahkan login terlebih dahulu</h3>
		</div>
		@endif
@endsection
