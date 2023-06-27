@extends('layouts.frontend')
@section('content')
<section>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <img src="{{$agenda->gambar}}" class="card-img-top h-50" style="height: 200px!important; object-fit: cover!important;" alt="...">
                    <div class="card-body">
                        <h5 class="card-title" align="center">{{$agenda->nama}}</h5>
                        <p class="card-text" align="justify">TANGGAL MULAI: {{$agenda->tgl_kegiatan}}</p>
                        
                        {{-- <p class="card-text" align="justify">TANGGAL SELESAI: {{$agenda->selesai_rapat}}</p> --}}
                        <p class="card-text" align="justify">kategori : {{$agenda->kategori->nama_kategori}}</p>
                        <p class="card-text" align="justify">Jenis kegiatan : {{$agenda->jenis_kegiatan}}</p>
                        <p>
                            {{$agenda->deskripsi}}
                        </p>
                        <a href="/" class="btn btn-warning"> kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection