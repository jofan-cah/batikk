@extends('layouts.app')

@section('title', 'Data Stock')

@section('contents')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Stock</h6>
  </div>
  <div class="card-body">
    @if (auth()->user()->level == 'Admin')
    <a href="{{ route('stock.tambah') }}" class="btn btn-primary mb-3">Tambah Barang</a>
    @endif
    <div class="table-responsive">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>NO</th>
            <th>SKU</th>
            <th>QTY</th>
            <th>KAT</th>
            <th>SATUAN</th>
            <th>CREATED</th>
            <th>UPDATED</th>
            <th>UPDAT BY</th>
            @if (auth()->user()->level == 'Admin')
            <th>Aksi</th>
            @endif
          </tr>
        </thead>
        <tbody>
          @php($no = 1)
          @foreach ($stock as $row)
          <tr>
            <th>{{ $no++ }}</th>
            <td>{{ $row->sku }}</td>
            <td>{{ $row->qty }}</td>
            <td>{{ $row->kat }}</td>
            <td>{{ $row->sat }}</td>
            <td>{{ $row->updat }}</td>
            <td>{{ $row->created_at }}</td>
            <td>{{ $row->updated_at }}</td>
            <td>
              <a href="{{ route('stock.edit', $row->id) }}" class="btn btn-warning">Edit</a>
              <a href="{{ route('stock.hapus', $row->id) }}" class="btn btn-danger">Hapus</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection