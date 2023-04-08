@extends('layouts.app')

@section('title', 'Form Barang')

@section('contents')
<form action="{{ isset($barang) ? route('barang.tambah.update', $barang->id) : route('barang.tambah.simpan') }}"
  method="post">
  @csrf
  <div class="row">
    <div class="col-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">{{ isset($barang) ? 'Form Edit Barang' : 'Form Tambah Barang' }}
          </h6>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label for="sku">SKU </label>
                <input type="text" autofocus placeholder="Masukan sku" class="form-control  @error('sku')
                is-invalid
                @enderror" name="sku" value="{{ isset($barang) ? $barang->sku : '' }}" id="sku">
                @error('sku')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="korner">Korner </label>
                <input type="text" value="{{ isset($barang) ? $barang->korner : '' }}" class="form-control  @error('korner')
                             is-invalid @enderror" name="korner" id="korner" placeholder="Masukan Korner">
                @error('korner')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="produk">Produk </label>
                <input type="text" value="{{ isset($barang) ? $barang->produk : '' }}"
                  class=" form-control @error('produk') is-invalid @enderror" name="produk" id="produk"
                  placeholder="Masukan Produk">
                @error('produk')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="model">Model </label>
                <input type="text" value="{{ isset($barang) ? $barang->model : '' }}" class="form-control  @error('model')
                                                                is-invalid
                                                            @enderror" name="model" id="model"
                  placeholder="Masukan Model">
                @error('model')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="motif">Motif </label>
                <input type="text" value="{{ isset($barang) ? $barang->motif : '' }}" class="form-control  @error('motif')
                                                                is-invalid
                                                            @enderror" name="motif" id="motif"
                  placeholder="Masukan Motif">
                @error('motif')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="proses">Proses </label>
                <input type="text" value="{{ isset($barang) ? $barang->proses : '' }}" class="form-control  @error('proses')
                                                                is-invalid
                                                            @enderror" name="proses" id="proses"
                  placeholder="Masukan Proses">
                @error('proses')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>


            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="material">Material </label>
                <input type="text" autofocus placeholder="Masukan Material"
                  value="{{ isset($barang) ? $barang->material : '' }}" class="form-control  @error('material')
                      is-invalid
                    @enderror" name="material" value="{{old('material')}}" id="material">
                @error('material')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="warna">Warna </label>
                <input type="text" value="{{ isset($barang) ? $barang->warna : '' }}" class="form-control  @error('warna')
                                                  is-invalid
                                              @enderror" name="warna" id="warna" placeholder="Masukan Warna">
                @error('warna')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="rasa">Rasa </label>
                <input type="text" value="{{ isset($barang) ? $barang->rasa : '' }}" class="form-control  @error('rasa')
                                                  is-invalid
                                              @enderror" name="rasa" id="rasa" placeholder="Masukan Rasa">
                @error('rasa')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="brand">Brand </label>
                <input type="text" value="{{ isset($barang) ? $barang->brand : '' }}" class="form-control  @error('brand')
                                                  is-invalid
                                              @enderror" name="brand" id="brand" placeholder="Masukan Brand">
                @error('brand')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="size">Size </label>
                <input type="text" value="{{ isset($barang) ? $barang->size : '' }}" class="form-control  @error('size')
                                                                is-invalid
                                                            @enderror" name="size" id="size"
                  placeholder="Masukan Size">
                @error('size')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="satuan">Satuan </label>
                <input type="text" value="{{ isset($barang) ? $barang->satuan : '' }}" class="form-control  @error('satuan')
                                                                                is-invalid
                                                                            @enderror" name="satuan" id="satuan"
                  placeholder="Masukan Satuan">
                @error('satuan')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>




            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="status">Status</label>
                <select class="custom-select 
                  @error('status')
                   is-invalid
                  @enderror" name="status" id="status">
                  <option value="">Pilih</option>
                  <option value="A" {{ isset($barang) ? ($barang->status == 'A' ? 'selected' : '') : '' }}
                    {{old('status')=='A' ? 'selected' : '' }} >A</option>
                  <option value="B" {{ isset($barang) ? ($barang->status == 'B' ? 'selected' : '') : '' }}
                    {{old('status')=='B' ? 'selected' : '' }}>B</option>
                  <option value="C" {{ isset($barang) ? ($barang->status == 'C' ? 'selected' : '') : '' }}
                    {{old('status')=='C' ? 'selected' : '' }}>C</option>
                  <option value="D" {{ isset($barang) ? ($barang->status == 'D' ? 'selected' : '') : '' }}
                    {{old('status')=='D' ? 'selected' : '' }}>D</option>

                </select>
                @error('status')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="sup">sup </label>
                <input type="text" autofocus placeholder="Masukan sup" class="form-control  @error('sup')
                is-invalid
                @enderror" name="sup" value="{{ isset($barang) ? $barang->satuan : '' }}" id="sup">
                @error('sup')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="asal">Asal </label>
                <input type="text" value="{{ isset($barang) ? $barang->asal : '' }}" class="form-control  @error('asal')
                            
                is-invalid
                @enderror" name="asal" id="asal" placeholder="Masukan Asal">
                @error('asal')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="pt">PT </label>
                <input type="text" value="{{ isset($barang) ? $barang->pt : '' }}" class="form-control  @error('pt')
                  is-invalid
                @enderror" name="pt" id="pt" placeholder="Masukan Nama">
                @error('pt')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="updat">Updated By </label>
                <input type="text" readonly class="form-control  @error('updat')
               is-invalid
                @enderror" name="updat" id="updat" value=" {{ isset($barang) ? $barang->updat : auth()->user()->id }}"
                  placeholder="Masukan Nama">
                @error('updat')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>


            </div>
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