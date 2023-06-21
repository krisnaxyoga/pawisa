@extends('layouts.app')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
               <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">

                        <div class="card-title"><h2>Data anggota</h2></div>
                        <div>
                            <a href="{{ route('admin.anggota.create') }}" class="btn btn-primary">+ Add anggota</a>

                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive mt-1">
                        <table class="table table-striped table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>foto</th>
                                    <th>nama</th>
                                    <th>telepon</th>
                                    <th>alamat</th>
                                    <th>jenis kelamin</th>
                                    <th>jurusan</th>
                                    <th>prodi</th>
                                    <th>baga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key=>$item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td><img src="{{ $item->gambar }}" alt="" style="width: 200px;height:200px"></td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->telp }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->jenis_kelamin }}</td>
                                        <td>{{ $item->jurusan }}</td>
                                        <td>{{ $item->prodi }}</td>
                                        <td>{{ $item->baga }}</td>
                                        <td>
                                            <a href="{{route('admin.anggota.edit',$item->id)}}" data-id="{{ $item->id }}"
                                                class="btn btn-success btn-sm ubah" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{route('admin.anggota.destroy',$item->id)}}"
                                                class="btn btn-danger btn-sm"
                                                onclick="javascript:return confirm(`Data ingin dihapus ?`);" title="Delete">
                                                <i class="fa fa-times"></i>
                                            </a>
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
