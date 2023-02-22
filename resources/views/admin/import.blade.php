@extends('layouts.admin.main')

@section('container')

<div class="isi">
    <div class="row mb-3 justify-content-between">
        <div class="col-lg-auto">
            <h3>Import Data Siswa</h3>
        </div>
        <div class="col-auto justify-content-end">
            <a href="/siswa" class="btn btn-info">Back</a>
        </div>
    </div>
    <div class="row justify-content-around">
        <div class="col-lg-7">
            <div class="col-lg">
                <div class="card">
                    <div class="card-header bg-success text-light">
                    Import data siswa
                    </div>
                    <div class="card-body bg-success-subtle">
                    <p class="card-text">Silahkan download file import siswa di bawah ini.</p>
                    <a href="file/import_siswa.xlsx" class="btn btn-primary">Download</a>
                    </div>
                </div>
                </div>
                <form action="/import" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-2 mt-3 justify-content-between">
                        <div class="col-10">
                            <input class="form-control" type="file" id="formFile" name="file">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-success">Import</button>
                        </div>
                    </div>
                </form>
            </div>
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header bg-primary text-light">
                    Upload Semua Foto
                </div>
                <div class="card-body bg-primary-subtle">
                    <p class="card-text">
                        Silahkan upload file dengan extensi <b>*.Zip</b>
                    <br>
                        Pastikan nama file foto sesuai dengan <b>NISN</b>
                    <br>
                        Ukuran maksimal adalah <b>10 MB</b>
                    </p>
                </div>
            </div>
            <form action="/batch_upload" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row g-2 mt-4 justify-content-between">
                    <div class="col-lg-9">
                        <input class="form-control" type="file" id="formFile" name="batch_image">
                    </div>
                    <div class="col-lg-2 me-3">
                        <button type="submit" class="btn btn-success">Import</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
