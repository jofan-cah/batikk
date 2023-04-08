@extends('layouts.app')

@section('title', 'Form Stock')

@section('contents')

<?php  
$sku = old('sku');
$qty = old('qty');
$kat = old('kat');
$sat = old('sat');

?>
<form action="{{ isset($stock) ? route('stock.tambah.update', $stock->id) : route('stock.tambah.simpan') }}"
  method="post">
  @csrf
  <div class="row">
    <div class="col-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">{{ isset($stock) ? 'Form Edit stock' : 'Form Tambah
            stock' }}</h6>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label for="sku">SKU stock</label>
            <input type="text" class="form-control @error('sku')
                   is-invalid
                  @enderror" id="sku" name="sku" value="{{ isset($stock) ? $stock->sku : $sku }}">
            @error('sku')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="qty">Qty </label>
            <input type="text" class="form-control @error('qty')
                   is-invalid
                  @enderror" id="qty" name="qty" value="{{ isset($stock) ? $stock->qty : $qty }}">
            @error('qty')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="kat">Kategori </label>
            <input type="text" class="form-control @error('kat')
                   is-invalid
                  @enderror" id="kat" name="kat" value="{{ isset($stock) ? $stock->kat : $kat }}">
            @error('kat')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="sat">Satuan </label>
            <input type="text" class="form-control @error('sat')
                   is-invalid
                  @enderror" id="sat" name="sat" value="{{ isset($stock) ? $stock->sat : $sat }}">
            @error('kat')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="updat">Updated BY </label>
            <input type="text" class="form-control" id="updat" name="updat"
              value="{{ isset($stock) ? $stock->updat : auth()->user()->id }}">

          </div>

        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</form>
@endsection