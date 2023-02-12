{{header("Refresh:10; url=/logout");}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>OSIS | e-Lection</title>
  <link rel="stylesheet" href="/css/main_style.css">
  <link rel="stylesheet" href="/css/bootstrap.min.css">

  {{-- Progress Bar --}}
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

  <div class="pembungkus">
    <div class="content">

        <div class="row p-5">
            <div class="col-lg-4 text-center my-2">
                <img src="/img/vote.png" alt="" style="width: 70%;">
            </div>
            <div class="col-lg justify-content-center my-2 d-flex align-items-center">
                <div class="terimakasih">
                    {{auth()->guard('user')->user()->nama}}
                    <br>
                   TERIMA KASIH TELAH MENGGUNAKAN HAK SUARA ANDA
                   <br>
                   HAK PILIHMU, PENENTU MASA DEPAN!
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg text-center">
                Halaman ini akan keluar otomatis
            </div>
        </div>

        {{-- Progress Bar --}}
        <div class="progress2 mx-auto progress-moved mt-5">
          <div class="progress-bar2"></div>
         </div>
        {{-- End Progress Bar --}}

  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
