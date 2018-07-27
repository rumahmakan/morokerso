@extends ('layouts.penulisan')

@section ('content')
@if (session('roles_id') == 1 ||session('roles_id') == 2)
  <br>
  <div class="container">
    <div class="col-md-12">
      <div class="contact-wrap">
        <form action="/contact/bayar/{{$id}}" method="post"> {{ csrf_field() }}
          @foreach($pemesanan as $pemesanans)
          @foreach($menu as $menus)
          <div class="form-group">
            <h3>Pesanan Rumah Makan Ayam Bakar Morokerso :</h3>
            <li>Nama Pemesan       : <b>{{$pemesanans->nama_pemesan}}</b></li>
            <br>
            <li>Alamat Pemesan     : <b>{{$pemesanans->alamat}}</b></li>
            <br>
            <li>No. HP Pemesan     : <b>{{$pemesanans->no_hp}}</b></li>
            <br>
            <li>Tanggal/Waktu      : <b>{{$pemesanans->tanggal}}</b> / <b>{{$pemesanans->pukul}}</b></li>
            <br>
            <li>Menu Pesanan       : <b>{{$menus->nama_menu}}</b></li>
            <br>
            <li>Harga Satuan       : <b>{{$menus->harga}}</b></li>
            <br>
            <li>Jumlah Pesanan     : <b>{{$pemesanans->jmlh_pesanan}}</b></li>
            <br>
            <li>Keterangan Pesanan : <b>{{$pemesanans->keterangan_pesanan}}</b></li>
            <br>
          </div>
          <div class="form-group text-center" style= "border-top: 3px solid black; border-width:3px; padding-top : 50px">
            <p>(Ongkos kirim pemesanan sebesar Rp.25000)</p>
            <h4 id="result">Total Bayar : <b id="total"></b></h4>
            <input type="hidden" name="total" id="total_input" class="form-control" required>
            <p>(total bayar belum termasuk menu tambahan atau tambahan lain yang ada dalam keterangan jika ada)</p>
          </div>
          <script>
              var total = 0;
              var a1 = {{$menus->harga}};
              var a2 = {{$pemesanans->jmlh_pesanan}};
              total = (a1*a2)+25000;
              $('#total').html(total);
              $('#total_input').val(total);
          </script>
          @endforeach
          @endforeach
          <div class="form-group text-center">
            <input type="submit" class="btn btn-primary" value="Pesan">
          </div>
        </form>
        <form action="/contact/delete/{{$id}}" method="post">{{ csrf_field() }}
          <div class="form-group text-center">
              <input type="submit" class="btn btn-primary" value="Batal">
          </div>
        </form>
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
