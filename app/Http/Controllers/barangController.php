<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class barangController extends Controller
{
    public function index()
    {
        return view('Barang.addBarang');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required|numeric',
            'nama_barang' => 'required|string|max:255',
            'satuan' => 'required|string|max:255',
            'harga_satuan' => 'required|numeric',
            'stok' => 'required|numeric',
        ], [
            'id_barang.required' => 'ID Barang Wajib Diisi',
            'id_barang.numeric' => 'ID Barang harus berupa angka',
            'nama_barang.required' => 'Nama Barang Wajib Diisi',
            'nama_barang.string' => 'Nama Barang harus berupa teks',
            'nama_barang.max' => 'Nama Barang tidak boleh lebih dari :max karakter',
            'satuan.required' => 'Satuan Wajib Diisi',
            'satuan.string' => 'Satuan harus berupa teks',
            'satuan.max' => 'Satuan tidak boleh lebih dari :max karakter',
            'harga_satuan.required' => 'Harga Satuan Wajib Diisi',
            'harga_satuan.numeric' => 'Harga Satuan harus berupa angka',
            'stok.required' => 'stok Wajib Diisi',
            'stok.numeric' => 'stok harus berupa angka',
        ]);

        // Cek apakah barang sudah ada berdasarkan id_barang yang diberikan
        $existingBarang = Barang::find($request->id_barang);

        if ($existingBarang) {
            // Jika barang sudah ada, update stoknya
            $existingStock = $existingBarang->stok;
            $updatedStock = $existingStock + $request->stok;

            // Update stok barang yang sudah ada
            $existingBarang->update(['kuantitas' => $updatedStock]);

            return redirect('/barang')->with('success', 'Stok barang berhasil diperbarui. Kuantitas: ' . $updatedStock);
        } else {
            // Jika barang belum ada, buat barang baru
            $validatedData = [
                'nama_barang' => $request->nama_barang,
                'satuan' => $request->satuan,
                'harga_satuan' => $request->harga_satuan,
                'stok' => $request->stok,
            ];

            $barang = Barang::create($validatedData);

            return redirect('/barang')->with('success', 'Barang baru berhasil ditambahkan. Kuantitas: ' . $request->kuantitas);
        }
    }

    public function show($id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            return redirect('/barang')->with('error', 'Barang tidak ditemukan.');
        }

        return view('Barang.dataBarang', compact('barang'));
    }


    public function destroy(Barang $barang)
    {
        // Update the stock before deleting the product and get the updated stock
        $updatedStock = $this->updateStock($barang, -1);

        // Delete the product
        $barang->delete();

        return redirect('/barang')->with('success', 'Barang berhasil dihapus. Kuantitas: ' . $updatedStock);
    }

    private function updateStock($data, $quantity)
    {
        $kuantitas = isset($data['stok']) ? $data['stok'] : 0;
        $updatedStock = $kuantitas + $quantity;
        return $updatedStock;
    }
}
