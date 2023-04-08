@extends('layouts.app')

@section('title', 'Data users')

@section('contents')


<div class="card">
  <div class="card-header">
    <h3 class="card-title">
      <a href="{{ route('users.tambah') }}" class="btn btn-primary mb-3">Tambah Kategori</a>
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
          <th>username</th>
          <th>name</th>
          <th>level</th>
          <th>created</th>
          <th>updated</th>
          <th>aksi</th>
        </tr>
      </thead>
      <tbody>
        @php($no = 1)
        @foreach ($user as $row)
        <tr>
          <th>{{ $no++ }}</th>
          <td>{{ $row->username }}</td>
          <td>{{ $row->nama }}</td>
          <td>{{ $row->level }}</td>
          <td>{{ $row->created_at }}</td>
          <td>{{ $row->updated_at }}</td>
          <td>
            <a href="{{ route('users.edit', $row->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('users.hapus', $row->id) }}" class="btn btn-danger">Hapus</a>
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