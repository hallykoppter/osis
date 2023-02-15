@extends('layouts.admin.main')

@section('container')

<div class="isi">
    <h2>Tambah Data Siswa</h2>

    <div class="row mt-3">
        <div class="col-lg-7">
            <form action="/siswa" autocomplete="off" method="post" enctype="multipart/form-data">
                @csrf
            <div class="mb-3 row">
                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                    <input type="text" id="nama" class="form-control @error('nama') is-invalid @enderror" name="nama">
                    @error('nama')
                        <div class="invalid-feedback">
                        {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputKelas" class="col-sm-3 col-form-label">Kelas</label>
                <div class="col-sm-9">
                    <select class="form-select" id="inputKelas" aria-label="Default select example" name="kelas">
                        <option value="7A">7A</option>
                        <option value="7B">7B</option>
                        <option value="8A">8A</option>
                        <option value="8B">8B</option>
                        <option value="9A">9A</option>
                        <option value="9B">9B</option>
                        <option value="9C">9C</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputNISN" class="col-sm-3 col-form-label">NISN</label>
                <div class="col-sm-9">
                    <input type="text" name="NISN" class="form-control @error('NISN') is-invalid @enderror" id="inputNISN">
                    @error('NISN')
                        <div class="invalid-feedback">
                        {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <div for="password" class="col-sm-3 col-form-label"">Password</div>
                <div class="col-sm-9">
                    <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                    @error('password')
                        <div class="invalid-feedback">
                        {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-sm-3">Foto</div>
                <div class="col-sm-9">
                    <input type="file" class="form-control @error('file') is-invalid @enderror" name="foto" id="image" onchange="previewImage()">
                    @error('file')
                        <div class="invalid-feedback">
                        {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-sm d-flex justify-content-end">
                <a href="/siswa" class="btn btn-danger mx-2">Kembali</a>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
          </form>
        </div>
        <div class="col-lg d-flex justify-content-center">
           <img class="img-preview img-fluid">
        </div>
    </div>
</div>

    <script>
        // Preview Image
    function previewImage() {

    const image = document.querySelector('#image');
    const imgPrev = document.querySelector('.img-preview');

    imgPrev.style.display = 'flex';

    const oFReader = new FileReader();

    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
        imgPrev.src = oFREvent.target.result;
        }
    }
    </script>
@endsection
