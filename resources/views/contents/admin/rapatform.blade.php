@extends('layouts.app')
@section('title','Rapat')
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
                        <form action="@if($model->exists) {{ route('rapat.update', $model->id) }} @else {{ route('rapat.store') }} @endif" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method($model->exists ? 'PUT' : 'POST')
                            <div class="form-group mb-3">
                                <label class="small mb-1">Nama Rapat<span class="text-danger">*</span></label>
                                <input class="form-control form-control-solid" name="name" type="text" placeholder="Name" value="{{ old('nama_rapat', $model->nama_rapat) }}" />
                            </div>
                            <div class="form-group mb-3">
                                <label class="small mb-1">url/kode rapat<span class="text-danger">*</span></label>
                                <input class="form-control form-control-solid" name="kode" type="text" placeholder="kode " value="{{ old('kode', $model->kode) }}" />
                            </div>
                            <div class="form-group mb-3">
                                <label class="small mb-1">mulai rapat<span class="text-danger">*</span></label>
                                <input class="form-control form-control-solid" name="mulai_rapat" type="date" placeholder="Name" value="{{ old('mulai_rapat', $model->mulai_rapat) }}" />
                            </div>
                            <div class="form-group mb-3">
                                <label class="small mb-1">selesai rapat</label>
                                <input class="form-control form-control-solid" name="selesai_rapat" type="date" placeholder="Name" value="{{ old('selesai_rapat', $model->selesai_rapat) }}" />
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
