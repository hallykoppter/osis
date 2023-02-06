<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OSIS | Election</title>

  <!-- <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
  <link rel="stylesheet" href="/fontawesome/css/fontawesome.css">
  <link rel="stylesheet" href="/fontawesome/css/solid.css">
  <link rel="stylesheet" href="/fontawesome/css/brands.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

  <style>
    body {
      /* background-image: url(/img/bg.jpg); */
      background-color: antiquewhite;
      background-repeat: no-repeat;
      background-size: cover;
    }

    .kosong {
      color: transparent;
    }

    .border-new {
      border: solid;
      border-width: 3px;
      border-color: #8677bc;
    }

    .card:hover {
      transform: scale(1.1);
    }

    .tn {
      font-family: bree serif;
    }

    .typing-demo {
      display: flex;
      width: 37ch;
      animation: typing 2s steps(22), blink .5s step-end infinite alternate;
      white-space: nowrap;
      overflow: hidden;
      border-right: 3px solid;
      font-family: bebas neue;
      font-size: 40px;
    }

    @keyframes typing {
      from {
        width: 0;
      }
    }

    @keyframes blink {
      50% {
        border-color: transparent;
      }
    }

  </style>
</head>

<body>
  <div class="container">
    <div class="row text-center mt-4 align-items-center">
      <div class="col-lg border-new py-2 kosong" style="background-color: #ffcac4;">
        OSIS | ELECTION ONLINE
      </div>
      <div class="col-lg-1 border-new py-2" style="background-color: #ffcac4;"><i class="fa-solid fa-xmark"></i>
      </div>
    </div>

    <div class="row bg-light" style="height: 500px;">
      <div class="col-lg border-new text-center pt-3">
        <div class="row">
          <div class="col-lg d-flex justify-content-center">
            <div class="typing-demo d-flex d-inline-flex">
              Silahkan pilih salah satu calon di bawah ini!
            </div>
          </div>
        </div>


        <div class="row col-lg mx-1 mt-5 justify-content-between">
          @foreach( $calon as $c)
          <div class="card border border-dark mb-3" style="width: 30%">
            <img src="/img/{{ $c->foto }}" class="card-img-top pt-2 img-fluid" alt="...">
            <div class="card-body">
              <h5 class="card-title">Nomor {{ $c->nomor }}</h5>
              <ul class="list-group list-group-flush">
                <li class="list-group-item ">{{ $c->nama1 }}</li>
              </ul>

              <form action="/pilih" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="pilihan" value="{{ $c->nomor }}">
                <input type="hidden" name="NISN" value="{{ auth()->guard('user')->user()->NISN }}">
                <button type="submit" class="btn btn-primary mt-3">pilih</button>
              </form>

            </div>
          </div>
          @endforeach
        </div>
      </div>
      <div class="col-lg-3 border-new mx-auto">
        <img class='d-flex mx-auto my-4' width="100" height="100" src='https://cdn-icons-png.flaticon.com/512/3135/3135715.png' alt='Profile' />
        <div class="form-floating">
          <input type="text" name="nama" class="form-control mb-1" id="nama" value="{{ auth()->guard('user')->user()->nama }}" disabled readonly>
          <label for="nama">Nama</label>
        </div>
        <div class="form-floating">
          <input type="text" name="kelas" class="form-control mb-1" id="kelas" value="{{ auth()->guard('user')->user()->kelas }}" disabled readonly>
          <label for="kelas">Kelas</label>
        </div>
        <div class="form-floating">
          <input type="text" name="NISN" class="form-control mb-1" id="NISN" value="{{ auth()->guard('user')->user()->NISN }}" disabled readonly>
          <label for="NISN">NISN</label>
        </div>
      </div>
    </div>
  </div>
  <div class="row fixed-bottom">
    <div class="col bg-light text-center">
      <p class="typewriter" id="typewriter">
        copyright © Kurnia Sandi {{ date('Y') }}. All right reserved
      </p>
    </div>
  </div>
  </div>

  <!-- <script src="/bootstrap/js/bootstrap.min.js"></script> -->
  <script src="/fontawesome/js/fontawesome.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
  </script>
</body>

</html>
