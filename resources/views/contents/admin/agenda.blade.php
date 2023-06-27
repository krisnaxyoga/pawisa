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
                        <table class="table table-striped table-bordered" id="myTable">
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
                                            <a href="{{route('agenda.edit',$item->id)}}" data-id="{{ $item->id }}"
                                                class="btn btn-success btn-sm ubah" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            {{-- <a href="{{route('agenda.destroy',$item->id)}}"
                                                class="btn btn-danger btn-sm"
                                                onclick="javascript:return confirm(`Data ingin dihapus ?`);" title="Delete">
                                               
                                            </a> --}}
                                            <form class="d-inline" action="{{route('agenda.destroy', $item->id)}}" method="POST" onSubmit="return confirm('Apakah anda yakin akan menghapus data ini?');">
                                                @csrf
                                                @method('delete')
    
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                              
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
