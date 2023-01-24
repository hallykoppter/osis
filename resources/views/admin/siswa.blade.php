@extends('layout.main')

@section('container')

<h1 class="h3 mb-4 text-gray-800">Siswa</h1>
<?php $a = 1 ?>

<div class="col-lg-9">
<table class="table table-bordered">
  <thead>
    <tr>
      <th class="text-center" scope="col">No</th>
      <th class="text-center" scope="col">Nama</th>
      <th class="text-center" scope="col">Kelas</th>
      <th class="text-center" scope="col">Vote</th>
    </tr>
  </thead>
  <tbody>
    @foreach($siswa as $c) 
    <tr>
      <th class="text-center" scope="row">{{ $a++ }}</th>
      <td>{{$c->nama}}</td>
      <td class="text-center">{{$c->kelas}}</td>
      <td class="text-center"><div class="form-check form-switch"><input disabled class="form-check-input" type="checkbox" role="switch" id="vote" @if($c->sudah_memilih == 1) checked
      @endif></div></td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $siswa->links() }}
</div>

@endsection()