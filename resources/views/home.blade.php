<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OSIS | e-Lection</title>
  <script src="https://kit.fontawesome.com/ed17974c3a.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>

  <div class="container">
    <div class="form-container">
      <div class="login-container">

        <!-- User Form -->
        <form method="post" action="/login" class="user" autocomplete="off">
          @csrf
          <h1 class="judul">Selemat Datang di Aplikasi Pemilihan Ketua OSIS</h1>
          <h2 class="title">Login Pemilih</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="NISN / Username" name="NISN" autofocus>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Password">
          </div>
          <input type="submit" value="Login" class="btn solid">
          <p class="powered-by">Powered By</p>
          <div class="logo">
            <div class="logo-icon"><img src="/img/smp.png" alt="smp" class="img-fluid"></div>
            <div class="logo-icon"><img src="/img/osis.png" alt="osis" class="img-fluid"></div>
          </div>
        </form>

        <!-- Admin Form -->
        <form method="post" action="/admin_login" class="admin" autocomplete="off">
          @csrf
          <h2 class="title">Admin Login</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="username" placeholder="usename" autofocus>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Password">
          </div>
          <input type="submit" value="Login" class="btn solid">
          <p class="powered-by">Powered By</p>
          <div class="logo">
            <div class="logo-icon"><img src="/img/smp.png" alt="smp" class="img-fluid"></div>
            <div class="logo-icon"><img src="/img/osis.png" alt="osis" class="img-fluid"></div>
          </div>
        </form>


      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>Anda Admin?</h3>
          <p>Silakan login jika anda adalah seorang Admin.</p>
          <button class="btn transparent" id="admin-btn">Admin</button>
        </div>
        <div class="container-image">
          <img src="/img/desktop.png" class="image" alt="OSIS | e-Lection">
          <span class="alt-image">Gambar dibuat oleh : Lingga Isnaya</span>
        </div>
      </div>

      <div class="panel right-panel">
        <div class="content">
          <h3>Anda Pemilih?</h3>
          <p>Silakan login sebagai User.</p>
          <button class="btn transparent" id="user-btn">User</button>

        </div>
        <img src="/img/undraw_laravel_and_vue_-59-tp.svg" class="image" alt="">
      </div>
    </div>
  </div>

  <script src="/js/script.js"></script>
</body>
</html>
