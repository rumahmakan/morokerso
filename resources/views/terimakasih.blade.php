@extends ('layouts.penulisan')

@section ('content')
  <br>
  <div class="container">
    <div class="col-md-12">
      <div class="contact-wrap">
        <form action="/" method="get"> {{ csrf_field() }}
          <div class="form-group text-center">
            <h3>Pemesanan Berhasil !</h3>
            <h3>Terima Kasih Telah Memesan!</h3>
          </div>
          <div class="form-group text-center">
            <input type="submit" class="btn btn-primary" value="Beranda">
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
