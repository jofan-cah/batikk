@extends('layouts.app')

@section('title', 'Dashboard')

@section('contents')

<div class="row">
  <div class="col sm-4">

  </div>
  <div class="col sm-4">
    <!-- Illustrations -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Dashboard</h6>
      </div>
      <div class="card-body">
        <div class="text-center">
          <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg"
            alt="...">
          <h3>Selamat Datang {{auth()->user()->nama}}</h3>
        </div>
        <p>Selamat Datang Di Applikasi Pencarian,
          Batik Keris !</p>
      </div>
    </div>
  </div>
  <div class="col sm-4">

  </div>

</div>

@endsection