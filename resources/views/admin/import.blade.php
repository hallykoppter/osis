@extends('layouts.admin.main')

@section('container')

<div class="isi">
    <div class="col-lg-7">
    <div class="card">
        <div class="card-header bg-success text-light">
          Import data siswa
        </div>
        <div class="card-body bg-success-subtle">
          <p class="card-text">Silahkan download file import siswa di bawah ini.</p>
          <a href="file/import.xlsx" class="btn btn-primary">Download</a>
        </div>
      </div>
    </div>
    <form action="/import" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row g-3 mt-3">
            <div class="col-5">
                <input class="form-control" type="file" id="formFile" name="file">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-success">Import</button>
            </div>
            <div class="col-auto">
                <a href="/siswa" class="btn btn-primary">Back</a>
            </div>
        </div>
    </form>
</div>

@endsection
