@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('DAFTAR ANGGOTA PAWISA') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('register.anggota.store')}}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat">

                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="telp" class="col-md-4 col-form-label text-md-right">{{ __('Telepon') }}</label>

                            <div class="col-md-6">
                                <input id="telp" type="text" class="form-control @error('telp') is-invalid @enderror" name="telp" value="{{ old('telp') }}" required autocomplete="telp">

                                @error('telp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="jurusan" class="col-md-4 col-form-label text-md-right">{{ __('jurusan') }}</label>

                            <div class="col-md-6">
                                <select required class="form-control @error('jurusan') is-invalid @enderror" name="jurusan" value="{{ old('jurusan') }}" name="jurusan" id="">
                                   <option value="">-pilih jurusan-</option>
                                    <option value="elektro">elektro</option>
                                    <option value="sipil">sipil</option>
                                    <option value="mesin">mesin</option>
                                    <option value="akuntansi">akuntansi</option>
                                    <option value="niaga">niaga</option>
                                    <option value="pariwisata">pariwisata</option>
                                </select>
                               
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="telp" class="col-md-4 col-form-label text-md-right">{{ __('prodi') }}</label>

                            <div class="col-md-6">
                                <input id="prodi" type="text" class="form-control @error('prodi') is-invalid @enderror" name="prodi" value="{{ old('prodi') }}" required autocomplete="prodi">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="prodi" class="col-md-4 col-form-label text-md-right">{{ __('jenis kelamin') }}</label>

                            <div class="col-md-6">
                                <select required class="form-control @error('jeniskelamin') is-invalid @enderror" name="jeniskelamin" value="{{ old('jeniskelamin') }}" name="jeniskelamin" id="">
                                    <option value="">-pilih-</option>
                                    <option value="laki-laki">laki-laki</option>
                                    <option value="perempuan">perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="gambar" class="col-md-4 col-form-label text-md-right">{{ __('gambar') }}</label>

                            <div class="col-md-6">
                                <input id="gambar" type="file" class="form-control mb-2 @error('gambar') is-invalid @enderror" name="gambar" value="{{ old('gambar') }}" required autocomplete="gambar">

                                @error('gambar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <img style="width: 200px; height: auto;" id="preview" src="#" alt="Preview Gambar">
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var fileInput = document.getElementById('gambar');
    var previewImg = document.getElementById('preview');

    fileInput.addEventListener('change', function(e) {
      var file = fileInput.files[0];
      var reader = new FileReader();

      reader.onload = function(e) {
        previewImg.src = e.target.result;
      }

      reader.readAsDataURL(file);
    })
  </script>
@endsection

