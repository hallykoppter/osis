<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OSIS | e-Lection</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/admin_syle.css">

  <!-- Fontawesome -->
  <script src="https://kit.fontawesome.com/ed17974c3a.js" crossorigin="anonymous"></script>

</head>
<body>
<div class="cont">


  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <div class="header">
      <div class="list-item">
        <a href="#">
          <i class="fa-solid fa-check-to-slot"></i>
          <span class="title">e-Lection</span>
        </a>
      </div>
    </div>
    <hr class="border border-light border-1 opacity-50 mt-3">
    <div class="main">
      <a href="#">
        <div class="list-item">
          <i class="fa-solid fa-house-user"></i>
            <span class="title">Dashboard</span>
        </div>
      </a>
      <a href="#">
        <div class="list-item">
          <i class="fa-solid fa-user"></i>
            <span class="title">Pemilih</span>
        </div>
      </a>
      <a href="#">
        <div class="list-item">
          <i class="fa-solid fa-users"></i>
            <span class="title">Calon</span>
        </div>
      </a>
    </div>
  </div>
  <!-- End Sidebar -->

  <div class="main-content">

    <!-- Navbar -->
    <nav class="navbar">
    <button class="nav-item btn btn-transparent" id="sidebar-toggle">
      <i class="fa-solid fa-bars"></i>
    </button>
    <div class="dropdown">
      <i class="fa-solid fa-id-card"></i>
      <div class="drop-menu btn-group">
        <button type="button" class="drop-menu btn dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
          Kurnia Sandi
        </button>
        <ul class="dropdown-menu dropdown-menu-lg-end">
          <li><button class="dropdown-item" type="button">Profile</button></li>
          <hr>
          <li><a href="/admin_logout" class="dropdown-item" type="button">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->

  <!-- Main Content -->
  <div class="content">
    <div class="container">

    <div class="row">
      <div class="col-lg-2 me-5">
        <div class="info">
          <div class="head-info">
            <i class="fa-solid fa-users-rectangle"></i>
          </div>
          <div class="title">
            Jumlah Pemilih
          </div>
          <div class="value">
            100
          </div>
        </div>
      </div>
      <div class="col-lg-2 me-5">
        <div class="info">
          <div class="head-info">
            <i class="fa-solid fa-users-rectangle"></i>
          </div>
          <div class="title">
            Jumlah Calon
          </div>
          <div class="value">
            3
          </div>
        </div>
      </div>
      <div class="col-lg-2 me-5">
        <div class="info">
          <div class="head-info">
            <i class="fa-solid fa-users-rectangle"></i>
          </div>
          <div class="title">
            Suara digunakan
          </div>
          <div class="value">
            80%
          </div>
        </div>
      </div>
      <div class="col-lg-2 me-5">
        <div class="info">
          <div class="head-info">
            <i class="fa-solid fa-users-rectangle"></i>
          </div>
          <div class="title">
            Suara tidak digunakan
          </div>
          <div class="value">
            20%
          </div>
        </div>
      </div>
    </div>

    </div>
  </div>
  </div>

</div>


</div>

<script src="js/admin_script.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
