@extends('layouts.app')

@section('title', 'Form Kategori')

@section('contents')
<form
  action="{{ isset($kategori) ? route('kategori.tambah.update', $kategori->id_harga) : route('kategori.tambah.simpan') }}"
  method="post">
  @csrf
  <div class="row">
    <div class="col-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">{{ isset($kategori) ? 'Form Edit Kategori' : 'Form Tambah
            Kategori' }}</h6>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label for="sku">Nama Sku</label>
            <?php $sku = old('sku') ?>
            <input type="text" class="form-control @error('sku')
                   is-invalid
                  @enderror" id="sku" name="sku" value="{{ isset($kategori) ? $kategori->sku : $sku}}">

            @error('sku')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="harga">harga </label>
            <?php $harga = old('harga') ?>
            <input type="text" class="form-control @error('harga')
                   is-invalid
                  @enderror" id="harga" name="harga" value="{{ isset($kategori) ? $kategori->harga : $harga }}">
            @error('harga')
            <div class="invalid-feedback">
              {{$message}}

            </div>
            @enderror
          </div>
          <div class="form-group">
            <?php $diskon = old('diskon') ?>
            <label for="diskon">diskon </label>
            <input type="text" class="form-control @error('diskon')
                   is-invalid
                  @enderror" id="diskon" name="diskon" value="{{ isset($kategori) ? $kategori->diskon : $diskon }}">
            @error('diskon')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <?php $tgl_berlaku = old('tgl_berlaku') ?>
            <label for="tgl_berlaku">tgl_berlaku </label>
            <input type="date" class="form-control @error('tgl_berlaku')
                   is-invalid
                  @enderror" id="tgl_berlaku" name="tgl_berlaku"
              value="{{ isset($kategori) ? $kategori->tgl_berlaku : $tgl_berlaku }}">
            @error('tgl_berlaku')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <?php $kode_cp = old('kode_cp') ?>
            <label for="kode_cp">kode_cp </label>
            <input type="text" class="form-control @error('kode_cp')
                   is-invalid
                  @enderror" id="kode_cp" name="kode_cp"
              value="{{ isset($kategori) ? $kategori->kode_cp : $kode_cp }}">
            @error('kode_cp')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <?php $tgl_del = old('tgl_del') ?>
            <label for="tgl_del">tgl_del Kategori</label>
            <input type="date" class="form-control @error('tgl_del')
                   is-invalid
                  @enderror" id="tgl_del" name="tgl_del"
              value="{{ isset($kategori) ? $kategori->tgl_del : $tgl_del }}">
            @error('tgl_del')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <?php $diskon_psn = old('diskon_psn') ?>
            <label for="diskon_psn">diskon_psn </label>
            <input type="text" class="form-control @error('diskon_psn')
                   is-invalid
                  @enderror" id="diskon_psn" name="diskon_psn"
              value="{{ isset($kategori) ? $kategori->diskon_psn : $diskon_psn }}">
            @error('diskon_psn')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="diskon_psn">update By </label>
            <input readonly type="text" class="form-control" id="diskon_psn" name="updat"
              value="{{auth()->user()->id}}">
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