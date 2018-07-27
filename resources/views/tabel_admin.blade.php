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
				   					<h1>Tabel Pemesanan</h1>
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
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Tabel Pemesanan</h2></div>
                    <div class="col-sm-4">
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Pemesan</th>
                        <th>Alamat</th>
                        <th>Menu Pesanan</th>
                        <th>Jumlah Pesanan</th>
                        <th>Nomor HP Pemesan</th>
                        <th>Tanggal dan Jam Pesanan</th>
                        <th>Keterangan Pesanan</th>
                        <th>Status</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($pemesanan as $pemesanans)
                  @foreach($menu->where('id', $pemesanans->menu_id) as $menus)
                    <tr>
                        <td>{{$pemesanans->nama_pemesan}}</td>
                        <td>{{$pemesanans->alamat}}</td>
                        <td>{{$menus->nama_menu}}</td>
                        <td>{{$pemesanans->jmlh_pesanan}}</td>
                        <td>{{$pemesanans->no_hp}}</td>
                        <td>{{$pemesanans->tanggal}} {{$pemesanans->pukul}}</td>
                        <td>{{$pemesanans->keterangan_pesanan}}</td>
                        <td>{{$pemesanans->status}}</td>
                        <td>
                        <!-- <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a> -->
                        <a style="font-size:20px" href="/tabel/pemesanan/status/{{$pemesanans->id}}"><i class="fa fa-check"></i></a>
                        <a style="font-size:20px" href="/tabel/pemesanan/delete/{{$pemesanans->id}}"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
		</div>
@endsection
