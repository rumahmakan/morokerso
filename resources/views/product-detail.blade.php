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
				   					<h1>Detail Menu</h1>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		@foreach( $menu as $menus )
		<div class="colorlib-shop">
			<div class="container">
				<div class="row row-pb-lg">
					<div class="col-md-10 col-md-offset-1">
						<div class="product-detail-wrap">
							<div class="row">
								<div class="col-md-8">
									<div class="product-entry">
										<div class="product-img" style="background-image: url({{ $menus->gambar_menu}});">
										</div>
									</div>
								</div>
								<div class="col-md-4 text-left">
									<div class="desc">
										<h3>{{$menus->nama_menu}}</h3>
										<p class="price">
											<span>Rp. {{$menus->harga}}</span>
										</p>
										<p>{{$menus->deskripsi_menu}}</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="row">
							<div class="col-md-12 tabulation">
								<ul class="nav nav-tabs">
									<li class="active"><a data-toggle="tab" href="#review">Review Menu</a></li>
								</ul>
								<div class="tab-content">
								   <div id="review" class="active">
								   	<div class="row">
								   		<div class="col-md-12">

										<div class="contact-wrap">
											<form action="/menu/{{$menus->id}}" method="post"> {{ csrf_field() }}
												@if (session('roles_id') == 1 ||session('roles_id') == 2)
												<div class="row form-group">
													<div class="col-md-12">
														<textarea name="isi_review" id="review" cols="30" rows="2" class="form-control" placeholder="Review mengenai menu yang ada diatas" required></textarea>
													</div>
												</div>
												<div class="col-md-6">
													<input type="hidden" name="menu_id" class="form-control" value="{{$menus->id}}">
												</div>
												<div class="form-group text-right">
													<input type="submit" name="login-submit" value="Masukkan Review" class="btn btn-primary">
									  		</div>
												@else
												<div class="row form-group">
													<div class="col-md-12">
														<textarea name="alert" id="alert" cols="30" rows="2" class="form-control" placeholder="Silahkan masuk untuk melakukan review" readonly></textarea>
													</div>
												</div>
												<div class="form-group text-right">
													<input type="button" name="login-submit" value="Masukkan Review" class="btn btn-primary">
									  		</div>
												@endif
											</form>
											</div>

											@foreach($review ->where('menu_id', $menus->id) as $reviews)
											@php
												$user = $users->where('id', $reviews->user_id)->first();
											@endphp
												<div class="review">
													<div class="user-img" style="background-image: url({{$user->avatar}})"></div>
													<div class="desc">
														<h4>
															<span class="text-left">{{$user->name}}</span>
															<span class="text-right">{{$reviews->tanggal}}</span>
														</h4>
														<p>
															<span class="text-left">{{$reviews->isi_review}}</span>
															@if(session('id') == $reviews->user_id)
															<span class="pull-right"><a href="/menu/review/delete/{{$reviews->id}}"><button class="btn btn-default">&times;</button></a></span>
															@endif
														</p>
													</div>
												</div>
												@endforeach

									 		 </div>
								   	  </div>
									   </div>
						        </div>
					         </div>
								  </div>
						  	 </div>
						    </div>
							 </div>
							</div>
					   </div>
				    </div>
				  	@endforeach


@endsection
