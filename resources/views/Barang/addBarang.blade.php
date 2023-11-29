@extends("layout")

@section('konten')

@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show col text-center" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3>Tambahkan Barang</h3>
            <form action="/barang" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="nama" class="form-label">ID Barang</label>
                    <input type="text" class="form-control form-control sm" name="id_barang" id="id_barang" aria-describedby="helpId" placeholder="Id_barang" value="{{ old('id_barang') }}">
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control form-control sm" name="nama_barang" id="nama_barang" aria-describedby="helpId" placeholder="Nama_barang" value="{{ old('nama_barang') }}">
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Satuan</label>
                    <input type="text" class="form-control form-control sm" name="satuan" id="satuan" aria-describedby="helpId" placeholder="satuan" value="{{ old('satuan') }}">
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Harga Satuan</label>
                    <input type="text" class="form-control form-control sm" name="harga_satuan" id="harga_satuan" aria-describedby="helpId" placeholder="harga_satuan" value="{{ old('harga_satuan') }}">
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">kuantitas</label>
                    <input type="text" class="form-control form-control sm" name="stok" id="stok" aria-describedby="helpId" placeholder="stok" value="{{ old('stok') }}">
                </div>


                <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
            </form>
        </div>
    </div>
</div>

@endsection
