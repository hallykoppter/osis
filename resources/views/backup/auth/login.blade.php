<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>{{ $title }}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">


    <link href="/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="/fontawesome/css/solid.css">
    <link rel="stylesheet" href="/fontawesome/css/brands.css">
    <!-- Custom styles for this template -->
    <link href="sign-in.css" rel="stylesheet">

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

        .dasar {
            background-color: #ffcac4;
        }
    </style>
</head>

<body class="text-center">

    {{-- @section('container') --}}
    <div class="container">
        <div class="row text-center mt-4 align-items-center">
            <div class="col-lg border-new py-2 text-start" style="background-color: #ffcac4;">
                OSIS | ELECTION ONLINE
            </div>
            <div class="col-lg-1 border-new py-2" style="background-color: #ffcac4;"><i class="fa-solid fa-xmark"></i>
            </div>
        </div>

        <div class="row bg-light border-new" style="height: 435px;">
            <div class="row mt-4">
                <div class="col-md-8">
                    <figure class="figure">
                        <img src="/img/desktop.png" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                        <figcaption class="figure-caption text-start">Image created by Lingga Isnaya</figcaption>
                      </figure>
                    {{-- <img class="img-fluid mx-2" src="/img/desktop.jpeg" alt="Created by Lingga Isnaya"> --}}
                </div>
                <div class="col-md mt-4">
                    @if (session()->has('LoginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('LoginError') }}
                        <button type="button" class="btn-close" data-bs-dissmis="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <img src="/img/smp.png" alt="smp" class="img-fluid mx-2" width="50px">
                    <img src="/img/osis.png" alt="osis" class="img-fluid mx-2" width="40px">
                <main class="form-signin w-100 m-auto">
                    <form method="POST" action='/login'>
                        @csrf
                        <h1 class="h3 my-3 fw-normal">Silahkan Login!</h1>
                        <div class="form-floating my-2">
                            <input type="NISN" class="form-control border-new @error('NISN') is-invalid @enderror"
                                name="NISN" id="NISN" placeholder="name@example.com" required
                                value="{{ old('NISN') }}" autofocus>
                            <label for="NISN">NISN / Kode Unik</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror border-new" id="password" placeholder="Password">
                            <label for="password">Password</label>
                        </div>
                        <hr>
                        <button class="w-100 btn btn-lg dasar" type="submit">Login</button>
                    </form>
                </main>
                </div>
            </div>
        </div>
        


        
    </div>
    {{-- @endsection --}}

    <script src="/fontawesome/js/fontawesome.min.js"></script>
    <script src="/dist/js/bootstrap.bundle.js"></script>

</body>

</html>
