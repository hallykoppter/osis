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
                Halaman ini akan otomatis keluar dalam ..
            </div>
        </div>

  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
