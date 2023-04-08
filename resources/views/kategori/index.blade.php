@extends('layouts.app')

@section('title', 'Data Kategori')

@section('contents')


<div class="card">
  <div class="card-header">
    <h3 class="card-title">
      <a href="{{ route('kategori.tambah') }}" class="btn btn-primary mb-3">Tambah Kategori</a>
    </h3>

    <div class="card-tools">

    </div>
  </div>
  <div class="card-body">
    @if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
    @endif


    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>sku</th>
          <th>harga</th>
          <th>diskon</th>
          <th>tanggal berlaku</th>
          <th>kode cp</th>
          <th>tanggal delete</th>
          <th>diskon</th>
          <th>aksi</th>
        </tr>
      </thead>
      <tbody>
        @php($no = 1)
        @foreach ($kategori as $row)
        <tr>
          <th>{{ $no++ }}</th>
          <td>{{ $row->sku }}</td>
          <td>{{ $row->harga }}</td>
          <td>{{ $row->diskon }}</td>
          <td>{{ $row->tgl_berlaku }}</td>
          <td>{{ $row->kode_cp }}</td>
          <td>{{ $row->tgl_del }}</td>
          <td>{{ $row->diskon_psn }}</td>
          <td>
            <a href="{{ route('kategori.edit', $row->id_harga) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('kategori.hapus', $row->id_harga) }}" class="btn btn-danger">Hapus</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </center>


  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    Footer
  </div>
  <!-- /.card-footer-->
</div>
@endsection