<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all(); 

        return view('admin.barangAdmin', compact('barangs')); 
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $validatedData = $request->validate([
            'harga_barang' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        $barang->harga_barang = $request->harga_barang;
        $barang->stok = $request->stok;

        $barang->save();

        return redirect()->route('admin.barangAdmin')->with('success', 'Barang berhasil diedit.');
    }
}