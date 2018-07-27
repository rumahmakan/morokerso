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
				   					<h1>Ubah Gambar Menu</h1>
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
							<h3>Form Ubah Gambar Menu</h3>
							<form action="/menu/edit/{{$id}}/gambar" method="post" enctype="multipart/form-data"> {{ csrf_field() }}
	              <div class="row form-group">
									<div class="col-md-12">
										 <input id="uploadFile" type="file" name="gambar_menu" accept="image/*" required>
										 <div><h1> </h1></div>
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
			<h3 style="text-align: center">Error</h3>
		</div>
		@endif
@endsection
