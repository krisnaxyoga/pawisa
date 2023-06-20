@extends('layouts.app')
@section('title','agenda kegiatan')
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
                        <form action="@if($model->exists) {{ route('agenda.update', $model->id) }} @else {{ route('agenda.store') }} @endif" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method($model->exists ? 'PUT' : 'POST')
                            <div class="form-group mb-3">
                                <label for="">kategori</label>
                                <select name="id_kategori" id="" class="form-control">
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label class="small mb-1">Nama kegiatan <span class="text-danger">*</span></label>
                                <input class="form-control form-control-solid" name="namakegiatan" type="text" placeholder="Name" value="{{ old('nama', $model->nama) }}" />
                            </div>
                            <div class="form-group mb-3">
                                <label class="small mb-1">Jenis Kegiatan <span class="text-danger">*</span></label>
                                <input class="form-control form-control-solid" name="jeniskegiatan" type="text" placeholder="jenis kegiatan" value="{{ old('jenis_kegiatan', $model->jenis_kegiatan) }}" />
                            </div>
                            <div class="form-group mb-3">
                                <label class="small mb-1">tanggal kegiatan <span class="text-danger">*</span></label>
                                <input class="form-control form-control-solid" name="tanggalkegiatan" type="date" placeholder="Name" value="{{ old('tgl_kegiatan', $model->tgl_kegiatan) }}" />
                            </div>
                            <div class="form-group mb-3">
                                <label class="small mb-1">gambar</label>
                                <input class="form-control form-control-solid" name="gambar" type="file" placeholder="Name" value="{{ old('gambar', $model->gambar) }}" />
                            </div>
                            <div class="form-group mb-3">
                                <label class="small mb-1">Deskripsi</label>
                                <textarea class="form-control form-control-solid" name="deskripsi" rows="5" placeholder="deskripsi" value="{{ old('deskripsi', $model->deskripsi) }}">{{ old('deskripsi', $model->deskripsi) }} </textarea>
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

@endsection
