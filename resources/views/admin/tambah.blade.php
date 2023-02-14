@extends('layouts.admin.main')

@section('container')

<div class="isi">
    <h2>Tambah Data Siswa</h2>

    <div class="row mt-3">
        <div class="col-lg-7">
            <form action="/siswa" autocomplete="off" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
            <div class="mb-3 row">
                <label for="inputEmail" class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                    <input type="text" id="inputEmail" class="form-control" name="nama">
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
                    <input type="text" class="form-control" id="inputNISN">
                </div>
            </div>
            <div class="mb-3 row">
                <div for="inputNISN" class="col-sm-3 col-form-label"">Password</div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="password" id="file">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-sm-3"></div>
                <div class="col-sm-9">
                    <input type="file" class="form-control" name="file" id="file">
                </div>
            </div>
            <div class="col-sm d-flex justify-content-end">
                <a href="/siswa" class="btn btn-danger mx-2">Kembali</a>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
        </div>
        <div class="col-lg-auto">
            <div class="preview-image text-center">Preview</div>
        </div>
    </div>
</div>

@endsection
