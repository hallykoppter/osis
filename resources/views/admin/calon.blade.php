@extends('layouts.admin.main')

@section('container')

<div class="isi">
    <div class="row justify-content-between" style="vertical-align: middle">
        <div class="col-lg-auto align-items-center">
            <h2>Daftar Calon</h2>
        </div>
        <div class="col-lg-auto d-flex justify-content-end align-items-center">
            <a href="/calon/create" class="btn btn-sm btn-primary ms-1">Tambah Calon</a>
            <form action="/calon/truncate" method="post">
                @csrf
                <button onclick="return confirm('yakin menghapus semua data?')" type="submit" class="btn btn-danger btn-sm ms-1">Hapus Semua</button>
            </form>
            <a href="/export-calon" class="btn btn-sm btn-success ms-1">Download</a>
        </div>
    </div>

    <div class="col-lg-10 mt-4">
    <table class="table table-bordered">
        <thead>
          <tr>
            <th class="text-center" scope="col">No</th>
            <th class="text-center" scope="col" colspan="2">Nama</th>
            <th class="text-center" scope="col">Nomor</th>
            <th class="text-center" scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php $i = 1 ?>
        @foreach ($calon as $c)
          <tr style="vertical-align: middle;" class="align-items-center">
            <td class="text-center" scope="row">{{ $i++ }}</th>
            <td>{{$c->nama1}}</td>
            <td>{{$c->nama2}}</td>
            <td class="text-center">{{$c->nomor}}</td>
            <td class="text-center">
                <a href="#{{$c->id}}" class="btn btn-sm btn-success">Edit</a>
                <a href="#{{$c->id}}" class="btn btn-sm btn-danger">Delete</a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
</div>

@endsection
