@extends('layouts.app')
@section('title','anggota')
@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header">@if($model->exists) Edit @else Tambah @endif  @yield('title')</div>
                    <div class="card-body">
                        @if (count($errors) > 0)
                            <div class="alert with-close alert-danger mb-4">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
                        <form action="@if($model->exists) {{ route('admin.anggota.update', $model->id) }} @else {{ route('admin.anggota.store') }} @endif" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method($model->exists ? 'PUT' : 'POST')
                            <div class="form-group mb-3">
                                <label class="small mb-1">Nama <span class="text-danger">*</span></label>
                                <input class="form-control form-control-solid" name="name" type="text" placeholder="Name" value="{{ old('nama', $model->nama) }}" />
                            </div>
                            <div class="form-group mb-3">
                                <label class="small mb-1">alamat  <span class="text-danger">*</span></label>
                                <input class="form-control form-control-solid" name="alamat" type="text" placeholder="alamat " value="{{ old('alamat', $model->alamat) }}" />
                            </div>
                            <div class="form-group mb-3">
                                <label class="small mb-1">telepon <span class="text-danger">*</span></label>
                                <input class="form-control form-control-solid" name="telp" type="text" placeholder="Name" value="{{ old('telp', $model->telp) }}" />
                            </div>
                            <div class="form-group mb-3">
                                <label class="small mb-1">prodi<span class="text-danger">*</span></label>
                                <input class="form-control form-control-solid" name="prodi" type="text" placeholder="Name" value="{{ old('prodi', $model->prodi) }}" />
                            </div>
                            <div class="form-group mb-3">
                                <img style="width: 200px; height: auto;" id="preview" src="#" alt="Preview Gambar">
                                <label class="small mb-1">gambar<span class="text-danger">*</span></label>
                                <input id="gambar" class="form-control form-control-solid" name="gambar" type="file" placeholder="Name" value="{{ old('gambar', $model->gambar) }}" />
                            </div><input class="form-control form-control-solid" hidden name="gambarw" type="text" placeholder="Name" value="{{ old('gambar', $model->gambar) }}" />
                          
                            <div class="form-group mb-3">
                                <label class="small mb-1">Jurusan</label>
                                <select required class="form-control @error('jurusan') is-invalid @enderror" name="jurusan" value="{{ old('jurusan') }}" name="jurusan" id="">
                                    <option value="">-pilih jurusan-</option>
                                     <option value="elektro" {{ $model->jurusan == 'elektro' ? 'selected' : '' }}>elektro</option>
                                     <option value="sipil" {{ $model->jurusan == 'sipil' ? 'selected' : '' }}>sipil</option>
                                     <option value="mesin" {{ $model->jurusan == 'menis' ? 'selected' : '' }}>mesin</option>
                                     <option value="akuntansi" {{ $model->jurusan == 'akuntansi' ? 'selected' : '' }}>akuntansi</option>
                                     <option value="niaga" {{ $model->jurusan == 'niaga' ? 'selected' : '' }}>niaga</option>
                                     <option value="pariwisata" {{ $model->jurusan == 'pariwisata' ? 'selected' : '' }}>pariwisata</option>
                                 </select>
                                
                            </div>
                            <div class="form-group mb-3">
                                <label class="small mb-1">Jenis Kelamin</label>
                                <select required class="form-control @error('jeniskelamin') is-invalid @enderror" name="jeniskelamin" value="{{ old('jeniskelamin') }}" name="jeniskelamin" id="">
                                    <option value="">-pilih-</option>
                                    <option value="laki-laki" {{ $model->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>laki-laki</option>
                                    <option value="perempuan" {{ $model->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>perempuan</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label class="small mb-1">Baga</label>
                                <select required class="form-control @error('baga') is-invalid @enderror" name="baga" value="{{ old('baga') }}" id="">
                                    <option value="">-pilih-</option>
                                    <option value="parahyangan" {{ $model->baga == 'parahyangan' ? 'selected' : '' }}>parahyangan</option>
                                    <option value="palemahan" {{ $model->baga == 'palemahan' ? 'selected' : '' }}>palemahan</option>
                                    <option value="pawongan" {{ $model->baga == 'pawongan' ? 'selected' : '' }}>pawongan</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <button class="btn btn-primary float-right" type="submit"><i class="far fa-save mr-1"></i> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
