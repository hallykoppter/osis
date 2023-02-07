@extends('layouts/admin/main')

@section('container')
<div class="content">
  <div class="container">

    <div class="row">
      <div class="col-lg-2 me-5">
        <div class="info">
          <div class="head-info">
            <i class="fa-solid fa-users-rectangle"></i>
          </div>
          <div class="title">
            Jumlah Pemilih
          </div>
          <div class="value">
            100
          </div>
        </div>
      </div>
      <div class="col-lg-2 me-5">
        <div class="info">
          <div class="head-info">
            <i class="fa-solid fa-users-rectangle"></i>
          </div>
          <div class="title">
            Jumlah Calon
          </div>
          <div class="value">
            3
          </div>
        </div>
      </div>
      <div class="col-lg-2 me-5">
        <div class="info">
          <div class="head-info">
            <i class="fa-solid fa-users-rectangle"></i>
          </div>
          <div class="title">
            Suara digunakan
          </div>
          <div class="value">
            80%
          </div>
        </div>
      </div>
      <div class="col-lg-2 me-5">
        <div class="info">
          <div class="head-info">
            <i class="fa-solid fa-users-rectangle"></i>
          </div>
          <div class="title">
            Suara tidak digunakan
          </div>
          <div class="value">
            20%
          </div>
        </div>
      </div>
    </div>
    @endsection
