@extends ('layouts.penulisan')

@section ('content')
  <br>
  <div class="container">
    <div class="col-md-12">
      <div class="contact-wrap">
        <form action="/menu/delete/{{$id}}" method="post"> {{ csrf_field() }}
          <div class="form-group text-center">
            <h3>Apakah anda yakin ingin menghapus menu?</h3>
          </div>
          <div class="form-group text-center">
            <input type="submit" class="btn btn-primary" value="Hapus Menu">
          </div>
        </form>
          <div class="form-group text-center">
              <a href="/menu"><button class="btn btn-primary">Tidak</button></a></td>
          </div>
      </div>
    </div>
  </div>

@endsection
