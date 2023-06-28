@extends('layouts.app')
@section('title','Report')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
               <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">

                        <div class="card-title"><h2>Data rapat</h2></div>
                        <div>
                          <form action="{{ route('admin.cetak') }}">
                            <div class="d-flex">
                                <input type="date" name="date" class="form-control">
                            <select name="type" id="" class="form-control">
                                <option value="parahyangan">Parahyangan</option>
                                <option value="palemahan">Palemahan</option>
                                <option value="pawongan">Pawongan</option>
                            </select>
                            <button class="btn btn-success">
                                <i class="fa fa-file-pdf"></i> cetak
                            </button>
                            </div>

                          </form>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive mt-1">
                        <table class="table table-striped table-bordered" id="myTable">
                            <thead>
                                <tr>

                                    <th>No</th>
                                    <th>nama</th>
                                    <th>telepon</th>
                                    <th>alamat</th>
                                    <th>jenis kelamin</th>
                                    <th>jurusan</th>
                                    <th>prodi</th>
                                    <th>baga</th>
                                    <th>create_at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key=>$item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->telp }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->jenis_kelamin }}</td>
                                        <td>{{ $item->jurusan }}</td>
                                        <td>{{ $item->prodi }}</td>
                                        <td>{{ $item->baga }}</td>
                                        <td>{{ \Carbon\Carbon::create($item->created_at)->format('Y-m-d') }}</td>
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
