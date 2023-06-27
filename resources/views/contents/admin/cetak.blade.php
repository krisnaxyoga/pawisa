@extends('layouts.app')
@section('title','Report')
@section('content')
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
            </tr>
        @endforeach

    </tbody>
</table>
<script>
    window.print();
</script>
@endsection
