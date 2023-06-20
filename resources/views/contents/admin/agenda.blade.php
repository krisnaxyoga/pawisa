@extends('layouts.app')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
               <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">

                        <div class="card-title"><h2>Data Agenda</h2></div>
                        <div>
                            <a href="{{ route('agenda.create') }}" class="btn btn-primary">+ Add Agenda</a>

                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive mt-1">
                        <table class="table table-striped table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Kategori</th>
                                    <th>Nama Agenda</th>
                                    <th>jumlahview</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key=>$item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td><img src="{{ $item->gambar }}" alt="" style="width: 200px;height:200px"></td>
                                        <td>{{ $item->kategori->nama_kategori }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->jumlahview }}</td>
                                        <td>{{ $item->tgl_kegiatan }}</td>
                                        <td>
                                            <a href="javascript:void(0)" data-id="{{ $item->id }}"
                                                class="btn btn-success btn-sm ubah" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{route('agenda.destroy',$item->id)}}"
                                                class="btn btn-danger btn-sm"
                                                onclick="javascript:return confirm(`Data ingin dihapus ?`);" title="Delete">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                {{-- @php $no =1;@endphp
                                @forelse($produk as $r)
                                <tr>
                                    <td>{{$no}}</td>
                                    <td><img src="{{url_images('gambar', $r->gambar)}}" class="img-fluid" style="width:80px;"></td>
                                    <td>{{$r->nama_kategori}}</td>
                                    <td>{{$r->nama}}</td>
                                    <td>Rp{{number_format($r->jumlahview)}},-</td>
                                    <td>{{$r->created_at}}</td>
                                    <td>
                                        <a href="javascript:void(0)" data-id="{{ $r->id }}"
                                            class="btn btn-success btn-sm ubah" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{url("admin/produk/delete/$r->id")}}"
                                            class="btn btn-danger btn-sm"
                                            onclick="javascript:return confirm(`Data ingin dihapus ?`);" title="Delete">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                                @php $no++;@endphp
                                @empty
                                <tr>
                                    <td colspan="7"> Tidak Ada Data</td>
                                </tr>
                                @endforelse --}}
                            </tbody>
                        </table>
                    </div>
                </div>
               </div>
            </div>
        </div>
    </div>
</section>
@endsection
