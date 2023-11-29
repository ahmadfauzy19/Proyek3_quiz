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
            <h3>Beli Barang</h3>
            <form action="/pembelian" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="Pembelian" class="form-label">Pembelian</label>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID barang</th>
                                <th>kuantitas</th>
                            </tr>
                        </thead>
                        <tbody id="Pembelian">
                            <tr>
                                <td><input type="text" class="form-control" name="riwayatPendidikan[0][id_barang]" placeholder="ID barang" required></td>
                                <td><input type="text" class="form-control" name="riwayatPendidikan[0][kuantitas]" placeholder="kuantitas" required></td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-secondary" id="tambahPembelian">Tambah Pembelian</button>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Tenan</label>
                        <input type="text" class="form-control form-control sm" name="nama_tenan" id="nama_tenan" aria-describedby="helpId" placeholder="Nama Tenan">
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Nama Kasir</label>
                        <input type="text" class="form-control form-control sm" name="nama_kasir" id="nama_kasir" aria-describedby="helpId" placeholder="Nama Kasir">
                    </div>
                </div>

                <button class="btn btn-primary" name="simpan" type="submit">Beli</button>
            </form>
        
        </div>
    </div>

    <script>

        let riwayatPendidikanIndex = 1;

        document.getElementById('tambahPembelian').addEventListener('click', function() {
            let newRow = document.createElement('tr');
            newRow.innerHTML = `
            <td><input type="text" class="form-control" name="riwayatPendidikan[riwayatPendidikanIndex][id_barang]" placeholder="ID barang" required></td>
            <td><input type="text" class="form-control" name="riwayatPendidikan[riwayatPendidikanIndex][kuantitas]" placeholder="kuantitas" required></td>
            `;
            document.getElementById('Pembelian').appendChild(newRow);
            riwayatPekerjaanIndex++;
        });

    </script>
</div>

@endsection
