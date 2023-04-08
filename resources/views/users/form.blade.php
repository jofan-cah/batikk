@extends('layouts.app')

@section('title', 'Form Users')

@section('contents')
<form action="{{ isset($user) ? route('users.tambah.update', $user->id) : route('users.tambah.simpan') }}"
  method="post">
  @csrf
  <div class="row">
    <div class="col-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">{{ isset($user) ? 'Form Edit stock' : 'Form Tambah
            stock' }}</h6>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label for="username">username </label>
            <input type="text" class="form-control" id="username" name="username"
              value="{{ isset($user) ? $user->username : '' }}">
          </div>
          <div class="form-group">
            <label for="password">password </label>
            <input type="password" class="form-control" id="password" name="password"
              value="{{ isset($user) ? $user->password : '' }}">
          </div>

          <div class="form-group">
            <label for="nama">nama </label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ isset($user) ? $user->nama : '' }}">
          </div>
          <div class="form-group">
            <label for="level">Level</label>
            <select class="custom-select 
                      @error('level') is-invalid @enderror" name="level" id="level">
              <option>Pilih</option>
              <option value="Admin" {{old('level')=='Admin' ? 'selected' : '' }}>Admin</option>
              <option value="User" {{old('level')=='User' ? 'selected' : '' }}>Pegawai</option>

            </select>
            @error('level')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
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