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
				   					<h1>Tambah Menu</h1>
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
							<h3>Form Tambah Menu</h3>
							<form action="/add/menu" method="post" enctype="multipart/form-data"> {{ csrf_field() }}
								<div class="row form-group">
									<div class="col-md-12">

										<label>Nama Menu</label>
										<input type="text" name="nama_menu" class="form-control" placeholder = "nama menu" required>
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-12">
										<label>Harga</label>
										<input type="text" name="harga" class="form-control" placeholder = "harga menu" required>
									</div>
								</div>
                <div class="row form-group">
									<div class="col-md-12">
										<label>Pemesanan</label>
                    <select name="pesan" class="form-control">
											  <option value="1">Ya</option>
                        <option value="0">Tidak</option>
									  </select>
									</div>
								</div>

								<div class="row form-group">
									<div class="col-md-12">
										<label>Jenis Menu</label>
                    <select name="jenis" class="form-control">
											  <option value="1">Makanan</option>
                        <option value="3">Tambahan</option>
												<option value="2">Paketan</option>
									  </select>
									</div>
								</div>

                <div class="row form-group">
									<div class="col-md-12">
										<label>Deskripsi</label>
										<input type="text" name="deskripsi" class="form-control" placeholder = "deskripsi menu" required>
									</div>
								</div>

                <div class="row form-group">
									<div class="col-md-12">
										<label>Gambar Menu</label>
										  <input id="uploadFile" type="file" name="gambar_menu" accept="image/*" required>
                      <div id="imagePreviewMenu">

                      <!--JS for Image Preview  -->
                        <script type="text/javascript">
                        $(function() {
                            $("#uploadFile").on("change", function()
                            {
                                var files = !!this.files ? this.files : [];
                                if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

                                if (/^image/.test( files[0].type)){ // only image file
                                    var reader = new FileReader(); // instance of the FileReader
                                    reader.readAsDataURL(files[0]); // read the local file

                                    reader.onloadend = function(){ // set image data as background of div
                                        $("#imagePreviewMenu").css("background-image", "url("+this.result+")");
                                    }
                                }
                            });
                        });
                        </script>
                        <!--JS for Image Preview  -->

                    </div>
								  </div>
								</div>
                @if (session('status'))
                    <div class="alert alert-danger">
                        <p style="text-align: center">{{ session('status') }}</p>
                    </div>
                @endif
								<div class="form-group text-center">
									<input type="submit" name="login-submit" value="Tambah" class="btn btn-primary">
					  		</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

@endsection
