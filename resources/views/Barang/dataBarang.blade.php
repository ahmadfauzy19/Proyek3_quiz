@extends('layout')

@section('konten')
    
    <div style="margin: 2rem;">
        <h1>Data Barang</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Harga Satuan</th>
                    <th scope="col">Stok</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barang as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->satuan }}</td>
                        <td>{{ $item->harga_satuan }}</td>
                        <td>{{ $item->stok }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
