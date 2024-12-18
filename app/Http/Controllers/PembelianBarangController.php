<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Models\PembelianBarang;
use App\Models\Pengguna;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PembelianBarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        $pembelianBarangs = PembelianBarang::all(); 
        return view('user.barangUser', compact('pembelianBarangs', 'barangs'));
    }


    public function store(Request $request)
    {
        $barang = Barang::find($request->id_barang);

        $request->validate([
            'id_barang' => 'required|exists:barangs,id',
            'jumlah_barang' => 'required|integer|min:1',
            'metode_pembayaran' => 'required|string|max:255',
            'bukti_bayar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($barang->stok < $request->jumlah_barang) {
            return redirect()->back()->withErrors(['jumlah_barang' => 'Stok tidak mencukupi.']);
        }

        $totalHarga = $barang->harga_barang * $request->jumlah_barang;

        $imagePath = null; 
        if ($request->hasFile('bukti_bayar')) {
            $image = $request->file('bukti_bayar');
            $imagePath = $image->store('storage/bukti_bayar', 'public'); 
        }

        PembelianBarang::create([
            'id_pengguna' => auth()->id(),
            'id_barang' => $request->id_barang,
            'jumlah_barang' => $request->jumlah_barang,
            'tanggal_pembelian' => now(),
            'total_harga' => $totalHarga,
            'metode_pembayaran' => $request->metode_pembayaran,
            'bukti_bayar' => $imagePath,
            'status_pembayaran' => null,
            'tanggal_pembayaran' => null,
        ]);

        $barang->stok -= $request->jumlah_barang;
        $barang->save();

        return redirect()->route('user.pembelianBarangUser')->with('success', 'Pesanan berhasil dibuat!');
    }

    public function updateStatusBarang(Request $request, $id)
    {
        $request->validate([
            'status_pembayaran' => 'required|in:Lunas,Pending',
        ]);

        $pembelianBarang = PembelianBarang::findOrFail($id);

        $pembelianBarang->status_pembayaran = $request->status_pembayaran;

        if ($request->status_pembayaran === 'Lunas') {
            $pembelianBarang->tanggal_pembayaran = Carbon::now();
        }

        $pembelianBarang->save();

        return redirect()->route('admin.dashAdmin', ['section' => 'barang'])->with('success', 'Status pembayaran berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pembelianBarang = PembelianBarang::findOrFail($id);

        if ($pembelianBarang->bukti_bayar) {
            Storage::disk('public')->delete($pembelianBarang->bukti_bayar);
        }

        $pembelianBarang->delete();

        return redirect()->back()->with('success', 'Pesanan berhasil dihapus!');
    }
}