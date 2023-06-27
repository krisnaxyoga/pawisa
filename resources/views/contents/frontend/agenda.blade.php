@extends('layouts.frontend')
@section('content')
<section>
    <div class="container mt-5">
        <h1 class="text-center">PENGUMUMAN</h1>
        <div class="row">
            @foreach ($agenda as $item)
               <div class="col-lg-4">
                <div class="card">
                    <img src="{{$item->gambar}}" class="card-img-top h-50" style="height: 200px!important; object-fit: cover!important;" alt="...">
                        <div class="card-body">
                            <h5 class="card-title" align="center">{{$item->nama}}</h5>
                            <p class="card-text" align="justify">TANGGAL MULAI: {{$item->tgl_kegiatan}}</p>
                            
                            {{-- <p class="card-text" align="justify">TANGGAL SELESAI: {{$item->selesai_rapat}}</p> --}}
                            <p class="card-text" align="justify">kategori : {{$item->kategori->nama_kategori}}</p>
                            <p class="card-text" align="justify">Jenis kegiatan : {{$item->jenis_kegiatan}}</p>
                            <a href="{{route('home.agendadetail',$item->id)}}" class="btn btn-primary">
                                Lihat
                            </a>
                        </div>
                </div>
                </div> 
            @endforeach
        </div>
    </div>
</section>
@endsection