<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>OSIS | e-Lection</title>
  <link rel="stylesheet" href="/css/main_style.css">
  <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>

<?php
    $rand = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f'];
    $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
?>

  <div class="pembungkus">
    <div class="content">
      <div class="title">
        <marquee>SILAKAN PILIH SALAH SATU CALON DI BAWAH INI!</marquee>
      </div>
      <div class="info" id="info" style="background-color: {{ $color }};">
        <div class="row g-3 align-items-center">
          <div class="col-lg ms-2">
            <img src="img/siswa/{{auth()->guard('user')->user()->foto}}" width="110px" onerror="this.onerror=null; this.src='/img/profile.jpg'" class="img-fluid">
          </div>
          <div class="col-lg-8">
            <input type="text" readonly class="form-control-plaintext ms-1 fw-bold text-light" id="staticEmail2" value="{{ auth()->guard('user')->user()->nama }}">
            <input type="text" readonly class="form-control-plaintext ms-1 fw-bold text-light" id="staticEmail2" value="Kelas {{ auth()->guard('user')->user()->kelas }}">
            <input type="text" readonly class="form-control-plaintext ms-1 fw-bold text-light" id="staticEmail2" value="{{ auth()->guard('user')->user()->NISN }}">
          </div>
        </div>
      </div>
      <div class="calon">
        @foreach ( $calon as $c)
        <div data-bs-toggle="modal" data-bs-target="#modal{{$c->id}}" id="link">
        <div class="card text-light" id="card" style="width: 19rem; background-color: {{$c->warna}};">
            <img src="/img/calon.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">
                    <h3>Calon Nomor {{ $c->nomor }}</h3>
                </p>
                <p class="card-text border border-top-1">
                    <h5>{{ $c->nama1 }}</h5>
                    <h5>{{ $c->nama2 }}</h5>
                </p>
            </div>
        </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>


  {{-- Modal --}}
  <!-- Button trigger modal -->
  <!-- Modal -->
  @foreach($calon as $c)
  <div class="modal fade" id="modal{{$c->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">{{$c->nama1}} & {{$c->nama2}}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h5 class="text-center">Visi</h5>
          <p>{{$c->visi}}</p>
          <hr>
          <h5 class="text-center">Misi</h5>
          <p>{{$c->misi}}</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <form action="/pilih" method="post">
                @csrf
                <input type="hidden" name="NISN" value="{{auth()->guard('user')->user()->NISN}}">
                <input type="hidden" name="nomor_calon" value="{{ $c->nomor }}">
            <button type="submit" class="btn btn-primary">Pilih</button>
            </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach

  <script src="js/bootstrap.bundle.min.js"></script>
  <script>
      document.ready( function()  {
        const info = document.querySelector('#info');
        const randomColor = Math.floor(Math.random()*16777215).toString(16);
        document.info.sytle.backgroundColor = "#" + randomColor;
    })
  </script>
</body>
</html>
