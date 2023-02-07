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


    @include('/layouts/admin/sidebar')

    <div class="main-content">

      @include('layouts/admin/navbar')


      <!-- Main Content -->
      @yield('container')

    </div>

  </div>


  </div>

  <script src="js/admin_script.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
