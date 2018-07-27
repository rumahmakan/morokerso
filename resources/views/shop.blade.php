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
				   					<h1>Menu Kami</h1>
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
					<div class="col-md-4 col-md-push-2 text-left"><h2>Makanan</h2></div>
					<div class="col-md-10 col-md-push-2">
						<div class="row row-pb-lg">
							@foreach( $menu ->where('jenis', 1) as $menum )
							<div class="col-md-4 text-center">
								<div class="product-entry">
									<div class="product-img">
										<a href="/menu/{{ $menum->id }}"><img class="product-img" src="{{ $menum->gambar_menu}}"></a></img>
										@if (session('roles_id') == 1)
										<div class="cart">
											<p>
												<span><a href="/menu/edit/{{$menum->id}}"><i class="icon-edit"></i></a></span>
												<span><a href="/menu/delete/{{$menum->id}}"><i class="icon-trash"></i></a></span>
											</p>
										</div>
										@endif
									</div>
									<div class="desc">
										<h3>{{ $menum->nama_menu}}</h3>
										<p class="price">Rp. 	{{ $menum->harga}}</p>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>

					<div class="col-md-2 col-md-pull-10">
						<div class="sidebar">
								@if (session('roles_id') == 1)
								<div class="side text-center">
									<span class="center-block">Tambah Menu<a href="/add/menu"><button class="btn btn-default">&plus;</button></a></span>
								</div>
								@endif
								</div
							</div>
						</div>

						<div class="col-md-4 col-md-push-2 text-left"><h2>Tambahan</h2></div>
						<div class="col-md-10 col-md-push-2">
							<div class="row row-pb-lg">
								@foreach( $menu ->where('jenis', 3) as $menut )
								<div class="col-md-4 text-center">
									<div class="product-entry">
										<div class="product-img">
											<a href="/menu/{{ $menut->id }}"><img class="product-img" src="{{ $menut->gambar_menu}}"></a></img>
											@if (session('roles_id') == 1)
											<div class="cart">
												<p>
													<span><a href="/menu/edit/{{$menut->id}}"><i class="icon-edit"></i></a></span>
													<span><a href="/menu/delete/{{$menut->id}}"><i class="icon-trash"></i></a></span>
												</p>
											</div>
											@endif
										</div>
										<div class="desc">
											<h3><a href="/menu/{{ $menut->id }}">{{ $menut->nama_menu}}</a></h3>
											<p class="price">Rp. 	{{ $menut->harga}}</p>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>

						<div class="col-md-4 col-md-push-2 text-left"><h2>Paketan</h2></div>
						<div class="col-md-10 col-md-push-2">
							<div class="row row-pb-lg">
								@foreach( $menu ->where('jenis', 2) as $menup )
								<div class="col-md-4 text-center">
									<div class="product-entry">
										<div class="product-img">
											<a href="/menu/{{ $menup->id }}"><img class="product-img" src="{{ $menup->gambar_menu}}"></a></img>
											@if (session('roles_id') == 1)
											<div class="cart">
												<p>
													<span><a href="/menu/edit/{{$menup->id}}"><i class="icon-edit"></i></a></span>
													<span><a href="/menu/delete/{{$menup->id}}"><i class="icon-trash"></i></a></span>
												</p>
											</div>
											@endif
										</div>
										<div class="desc">
											<h3><a href="/menu/{{ $menup->id }}">{{ $menup->nama_menu}}</a></h3>
											<p class="price">Rp. 	{{ $menup->harga}}</p>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection
