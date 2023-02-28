<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>OSIS | e-Lection</title>
  <link rel="stylesheet" href="/css/main_style.css">
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/ed17974c3a.js" crossorigin="anonymous"></script>
</head>
<body>

<?php
    $rand = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f'];
    $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
?>

<div class="header fixed-top justify-content-between">
    <div class="logo">
        <i class="fa-solid fa-check-to-slot me-2"></i>
        <span class="title"> OSIS | e-Lection</span>
    </div>
    <div class="poweredby">
        <div class="smp rounded-circle">
            <img src="/img/smp.png" class="img-fluidd" alt="smp">
        </div>
        <div class="osis rounded-circle">
            <img src="/img/osis.png" class="img-fluidd" alt="osis">
        </div>
    </div>
</div>

<div class="pembungkus">
    <div class="content">
        <div class="row text-center mb-5">
            <h2>SILAKAN PILIH SALAH SATU CALON DI BAWAH INI!</h2>
        </div>
        <div class="row justify-content-around">
        @foreach ( $calon as $c)
        {{-- <div data-bs-toggle="modal" data-bs-target="#modal{{$c->id}}" id="link"> --}}
            <div class="card text-light" id="card" style="width: 16rem; background-color: {{$c->warna}};" data-bs-toggle="modal" data-bs-target="#modal{{$c->id}}" id="link">
                <img src="/img/calon.jpg" class="card-img-top mt-2" alt="...">
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
        {{-- </div> --}}
        @endforeach
    </div>
    </div>
</div>


<div class="informasi">
    <div class="img mb-4">
        <img src="{{ asset('storage/siswas/'. auth()->guard('user')->user()->foto)}}" class="img-fluid" alt="foto-siswa" onerror="this.onerror=null; this.src='/img/default_profile.png'">
    </div>
    <h5 class="mt-2">{{ auth()->guard('user')->user()->nama }}</h5>
    <h5 class="mt-2">KELAS {{ auth()->guard('user')->user()->kela2 }}</h5>
    <h5 class="mt-2 mb-4">{{ auth()->guard('user')->user()->NISN }}</h5>
</div>


<div class="footer fixed-bottom justify-content-center">
    <p>Copyright &copy; Kurni Sandi {{ date('Y'); }}. <i>All Right Reserved</i></p>
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
            {!! $c->visi_misi !!}
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
