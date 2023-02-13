@extends('layouts/admin/main')

@section('container')
<div class="content">
  <div class="isi">

    <div class="row">
      <div class="col-lg-auto">
        <div class="info">
          <div class="head-info">
            <i class="fa-solid fa-users-rectangle"></i>
          </div>
          <div class="title">
            Jumlah Pemilih
          </div>
          <div class="value">
            {{$jumlah_pemilih}}
          </div>
        </div>
      </div>
      <div class="col-lg-auto">
        <div class="info">
          <div class="head-info">
            <i class="fa-solid fa-users-rectangle"></i>
          </div>
          <div class="title">
            Jumlah Calon
          </div>
          <div class="value">
            {{$jumlah_calon}}
          </div>
        </div>
      </div>
      <div class="col-lg-auto">
        <div class="info">
          <div class="head-info">
            <i class="fa-solid fa-users-rectangle"></i>
          </div>
          <div class="title">
            Suara digunakan
          </div>
          <div class="value">
            {{$suara_digunakan}}
          </div>
        </div>
      </div>
      <div class="col-lg-auto">
        <div class="info">
          <div class="head-info">
            <i class="fa-solid fa-users-rectangle"></i>
          </div>
          <div class="title">
            Suara tidak digunakan
          </div>
          <div class="value">
            {{$suara_tidak_digunakan}}
          </div>
        </div>
      </div>
    </div>
    @endsection
