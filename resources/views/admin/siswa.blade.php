@extends('layouts.admin.main')

@section('container')

<div class="isi">
    <div class="row justify-content-between" style="vertical-align: middle">
        <div class="col-lg-auto align-items-center">
            <h2>Daftar Calon</h2>
        </div>
        <div class="col-lg-auto d-flex justify-content-end align-items-center">
            <a href="/siswa/create" class="btn btn-md btn-primary mx-1">Tambah Siswa</a>
            <a href="/import-siswa" class="btn btn-md btn-success mx-1">Import Siswa</a>
        </div>
    </div>

    <div class="row">
    <div class="col-lg-8 mt-4">
    <table class="table table-bordered">
        <thead>
          <tr>
            <th class="text-center" scope="col">No</th>
            <th class="text-center" scope="col">Nama</th>
            <th class="text-center" scope="col">Kelas</th>
            <th class="text-center" scope="col">NISN</th>
            <th class="text-center" scope="col">Keterangan</th>
            <th class="text-center" scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php $i = 1 ?>
        @foreach ($siswa as $s)
          <tr style="vertical-align: middle;">
            <td class="text-center" scope="row">{{ $i++ }}</th>
            <td>{{$s->nama}}</td>
            <td class="text-center">{{$s->kelas}}</td>
            <td class="text-center">{{$s->NISN}}</td>
            <td class="text-center">@if ($s->sudah_memilih == 1)
                <span class="badge text-bg-success">Sudah Memilih</span> @else <span class="badge text-bg-danger">Belum Memilih</span>
                @endif
            </td>
            <td class="text-center">
                <a href="{{$s->id}}" class="btn btn-sm text-bg-primary">Edit</a>
                <a href="{{$s->id}}" class="btn btn-sm text-bg-danger">Delete</a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      {{ $siswa->onEachSide(0)->links() }}
    </div>
</div>
</div>

@endsection
