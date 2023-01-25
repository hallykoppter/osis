{{-- {{header('refresh: 10; url="/logout')}} --}}
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OSIS | Election</title>

  <!-- <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="/fontawesome/css/fontawesome.css">
  <link rel="stylesheet" href="/fontawesome/css/solid.css">
  <link rel="stylesheet" href="/fontawesome/css/brands.css">


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

  </style>

  {{-- CSS Countdown --}}
  <style>
    .progress2 {
      border-radius: 30px;
      background-color: #fff;
      width: 70vw;
    }

    .progress-bar2 {
      height: 18px;
      border-radius: 30px;
      transition: 0.4s linear;
      transition-property: width, background-color;
    }

    .progress-moved .progress-bar2 {
      background-color: #f3c623;
      animation: progress 10s;
    }

    @keyframes progress {
      0% {
        width: 0%;
        background: #f9bcca;
      }

      100% {
        width: 100%;
        background: #f3c623;
        box-shadow: 0 0 40px #f3c623;
      }
    }

    .icon {
      color: #f3c623;
      animation: icon 10s infinite;
      background-color: transparent;
      padding-right: 400px;
      padding-bottom: 20px;
    }

    @keyframes icon {
      0% {
        opacity: 0.2;
        text-shadow: 0 0 0 #f3c623;
      }

      100% {
        opacity: 1;
        text-shadow: 0 0 10px #f3c623;
      }
    }


    @keyframes p {

      90%,
      100% {
        --p: 100;
      }
    }

  </style>
</head>

<body>
  <div class="container">
    <div class="row text-center mt-4 align-items-center">
      <div class="col-lg border-new py-2 kosong" style="background-color: #ffcac4;">
        OSIS | ELECTION
      </div>
      <div class="col-lg-1 border-new py-2" style="background-color: #ffcac4;"><i class="fa-solid fa-xmark"></i>
      </div>
    </div>

    <div class="row bg-light border-new" style="height: 70vh; display: flex;">
      <div class="col-lg text-center align-self-center">
        <div class="row">
          <div class="col-lg" style="font-family: bebas neue; font-size: 50px;">
            {{ auth()->guard('user')->user()->nama }} <br> Terima kasih telah menggunakan hak suara anda!
            <br>
          </div>
          <span style="font-size: 2rem;">halaman ini akan otomatis keluar</span>
        </div>
        <div class="col-lg-4">
          <img class="img-fluid" src="/img/vote.png" alt="vote" style="width: 5rem; height: 5rem;">
        </div>

        {{-- Progress Bar --}}
        <div class="progress2 mx-auto progress-moved mt-5">
          <div class="progress-bar2"></div>
        </div>
        {{-- End Progress Bar --}}

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

  {{-- timer script --}}
  <script>
    function formatTimeLeft(time) {
      const minutes = Math.floor(time / 60);
      let seconds = time % 60;
      if (seconds < 10) {
        seconds = `0${seconds}`;
      }
    }

    return `${minutes}:${seconds}`;

  </script>

  <!-- <script src="/bootstrap/js/bootstrap.min.js"></script> -->
  <script src="/fontawesome/js/fontawesome.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
  </script>
</body>

</html>
