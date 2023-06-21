@extends('layouts.app')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
               <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">

                        <div class="card-title"><h2>Data rapat</h2></div>
                        <div>
                            <a href="{{ route('rapat.create') }}" class="btn btn-primary">+ Add rapat</a>

                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive mt-1">
                        <table class="table table-striped table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>code/url rapat</th>
                                    <th>nama</th>
                                    <th>mulai rapat</th>
                                    <th>selesai rapat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key=>$item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item->kode }}</td>
                                        <td>{{ $item->nama_rapat }}</td>
                                        <td>{{ $item->mulai_rapat }}</td>
                                        <td>{{ $item->selesai_rapat }}</td>
                                        <td>
                                            <a href="{{route('rapat.edit',$item->id)}}" data-id="{{ $item->id }}"
                                                class="btn btn-success btn-sm ubah" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form class="d-inline" action="{{route('rapat.destroy', $item->id)}}" method="POST" onSubmit="return confirm('Apakah anda yakin akan menghapus data ini?');">
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
