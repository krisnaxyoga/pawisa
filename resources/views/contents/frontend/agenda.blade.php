@extends('layouts.frontend')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.min.js"></script>

<section>
    <div class="container mt-5">
        <h1 class="text-center">PENGUMUMAN</h1>
        <div class="row">
            <div id="agenda-list"></div>
            <div id="pagination-container"></div>
            @foreach ($agenda as $item)
               <div class="col-lg-4">
                <div class="card">
                    <img src="{{$item->gambar}}" class="card-img-top h-50" style="height: 200px!important; object-fit: cover!important;" alt="...">
                        <div class="card-body">
                            <h5 class="card-title" align="center">{{$item->nama}}</h5>
                            <p class="card-text" align="justify">TANGGAL MULAI: {{$item->tgl_kegiatan}}</p>

                            <p class="card-text" align="justify">TANGGAL SELESAI: {{$item->selesai_rapat}}</p>
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
        <div class="mt-3">

            {{ $agenda->links() }}
        </div>
    </div>
</section>
<script>
    // Data agenda yang akan dipaginasi
    fetch('/api/agenda')
    .then(response => response.json())
    .then(data => {
        // Data berhasil diambil
        console.log(data);
        // var agenda = data;
        var options = {
        dataSource: data, // Sumber data yang akan dipaginasi
        pageSize: 10, // Jumlah item per halaman
        callback: function (data, pagination) {
            displayAgenda(data);
        }
    };

    var paginationContainer = $('#pagination-container');
    paginationContainer.pagination(options);

    function displayAgenda(data) {
        var agendaListContainer = $('#agenda-list');
        agendaListContainer.empty(); // Kosongkan kontainer agenda sebelum menambahkan data baru

        // Tampilkan data agenda sesuai halaman yang dipilih
        data.forEach(function (item) {
            console.log(item.nama,">>>NAMA")
            var agendaItem = `
                <div class="col-lg-4">
                    <div class="card">
                        <img src="${item.gambar}" class="card-img-top h-50" style="height: 200px!important; object-fit: cover!important;" alt="...">
                        <div class="card-body">
                            <h5 class="card-title" align="center">${item.nama}</h5>
                            <p class="card-text" align="justify">TANGGAL MULAI: ${item.tgl_kegiatan}</p>
                            <p class="card-text" align="justify">kategori : ${item.kategori.nama_kategori}</p>
                            <p class="card-text" align="justify">Jenis kegiatan : ${item.jenis_kegiatan}</p>
                            <a href="${item.route}" class="btn btn-primary">Lihat</a>
                        </div>
                    </div>
                </div>
            `;
            agendaListContainer.append(agendaItem);
        });
    }
    })
    .catch(error => {
        // Terjadi error saat mengambil data
        console.error(error);
    });

console.log(agenda,"agenda");

</script>
@endsection
