@extends('layouts.app')

@section('title', 'Data Barang')

@section('contents')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
  </div>
  <div class="card-body">
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    @if (auth()->user()->level == 'Admin')
    <a href="{{ route('barang.tambah') }}" class="btn btn-primary mb-3">Tambah Barang</a>
    @endif
    <form action="{{ route('barang.cari') }}" method="post">
      @csrf
      <div class="row filter-row">
        <div class="col-sm-6 col-md-3">
          <div class="form-group form-focus">
            <label class="focus-label">SKU</label>
            <input type="text" class="form-control floating" id="name" name="sku">
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="form-group form-focus">
            <label class="focus-label">produk</label>
            <input type="text" class="form-control floating" id="produk" name="produk">
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="form-group form-focus">
            <label class="focus-label">Motif</label>
            <input type="text" class="form-control floating" id="name" name="motif">
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="form-group form-focus">
            <label class="focus-label">Brand</label>
            <input type="text" class="form-control floating" id="name" name="brand">
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="form-group form-focus">
            <label class="focus-label">Warna</label>
            <input type="text" class="form-control floating" id="name" value="{{old('warna')}}" name="warna">
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="form-group form-focus">
            <label class="focus-label">Size</label>
            <input type="text" class="form-control floating" id="size" name="size">
          </div>
        </div>

        <div class="col-sm-6 col-md-6">
          <div class="form-group form-focus">
            <label class="focus-label"></label>
            <button type="sumit" class="btn btn-success btn-block"> Search </button>
          </div>


        </div>
      </div>


    </form>


    <div class="table-responsive">

      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>NO</th>
            <th>SKU</th>
            <th>KORNER</th>
            <th>PRODUK</th>
            <th>MODEL</th>
            <th>MOTIF</th>
            <th>PROSES</th>
            <th>MATERIAL</th>
            <th>WARNA</th>
            <th>RASA</th>
            <th>BRAND</th>
            <th>SIZE</th>
            <th>SATUAN</th>
            <th>STATUS</th>
            <th>SUP</th>
            <th>ASAL</th>
            <th>PT</th>
            <th>Harga</th>
            <th>CREATED</th>
            <th>UPDATED</th>
            <th>UPDAT BY</th>


            <th>Aksi</th>

          </tr>
        </thead>
        <tbody>
          @php($no = 1)
          {{-- @dd($result); --}}
          @foreach ($result as $row)
          <tr>
            {{-- <td>{{$row->id}}</td> --}}
            <td>{{$loop->iteration}}</td>
            <td>{{$row->sku}}</td>
            <td>{{$row->korner}}</td>
            <td>{{$row->produk}}</td>
            <td>{{$row->model}}</td>
            <td>{{$row->motif}}</td>
            <td>{{$row->proses}}</td>
            <td>{{$row->material}}</td>
            <td>{{$row->warna}}</td>
            <td>{{$row->rasa}}</td>
            <td>{{$row->brand}}</td>
            <td>{{$row->size}}</td>
            <td>{{$row->satuan}}</td>
            <td>{{$row->status}}</td>
            <td>{{$row->sup}}</td>
            <td>{{$row->asal}}</td>
            <td>{{$row->pt}}</td>
            <td>{{$row->harga}}</td>
            <td>{{$row->updated_at}}</td>
            <td>{{$row->created_at}}</td>
            <td>{{$row->username}}</td>

            <td>
              <a href="{{ route('barang.edit', $row->id_barang) }}" class="btn btn-warning">Edit</a>
              <a href="{{ route('barang.hapus', $row->id_barang) }}" class="btn btn-danger">Hapus</a>
              </form>
            </td>


          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection