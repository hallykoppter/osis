@extends('layouts.admin.main')

@section('container')

<div class="isi">
    <h2>Edit Data Calon</h2>

    <div class="row mt-3">
        <div class="col-lg-7">
            <form action="/calon" autocomplete="off" method="post" enctype="multipart/form-data">
                @csrf
            <div class="mb-3 row">
                <label for="nama1" class="col-sm-3 col-form-label">Calon Ketua</label>
                <div class="col-sm-9">
                    <input type="text" id="nama1" class="form-control @error('nama1') is-invalid @enderror" name="nama1" value="{{ old('nama1', $calon->nama1)}}">
                    @error('nama1')
                        <div class="invalid-feedback">
                        {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama2" class="col-sm-3 col-form-label">Calon Wakil</label>
                <div class="col-sm-9">
                    <input type="text" id="nama2" class="form-control @error('nama2') is-invalid @enderror" name="nama2" value="{{old('nama2', $calon->nama2)}}">
                    @error('nama2')
                        <div class="invalid-feedback">
                        {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputnomor" class="col-sm-3 col-form-label">nomor</label>
                <div class="col-sm-9">
                    <input type="text" name="nomor" class="form-control @error('nomor') is-invalid @enderror" id="inputnomor" value="{{ old('nomor', $calon->nomor)}}">
                    @error('nomor')
                        <div class="invalid-feedback">
                        {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <div for="warna" class="col-sm-3 col-form-label"">Warna</div>
                <div class="col-sm-9">
                    <input type="color" class="form-control @error('warna') is-invalid @enderror" name="warna" id="warna" value="{{ old('warna', $calon->warna)}}">
                    @error('warna')
                        <div class="invalid-feedback">
                        {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
            @error('visi_misi')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
            <div class="row mb-3">
                <div class="col-lg-3">Visi & Misi</div>
                <div class="col-lg-9">
                    <input type="hidden" id="visi" name="visi_misi" value="{{ old('visi_misi', $calon->visi_misi)}}">
                    <trix-editor input="visi"></trix-editor>
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
                <a href="/calon" class="btn btn-danger mx-2">Kembali</a>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
          </form>
        </div>
        <div class="col-lg d-flex justify-content-center border border-5 me-2 p-2">
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
