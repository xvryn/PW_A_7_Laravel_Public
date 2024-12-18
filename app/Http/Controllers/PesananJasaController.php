<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Models\PesananJasa;
use App\Models\Pengguna;
use App\Models\Jasa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PesananJasaController extends Controller
{
    public function index()
    {
        $jasas = Jasa::all();
        $pesananJasas = PesananJasa::all(); 
        return view('user.jasaUser', compact('pesananJasas', 'jasas'));
    }


    public function store(Request $request)
    {
        $jasa = Jasa::find($request->id_jasa);

        $request->validate([
            'id_jasa' => 'required|exists:jasas,id',
            'berat' => 'required|integer|min:1',
            'tipe' => 'required|in:Reguler,Express',
            'metode_pembayaran' => 'required|string|max:255',
            'bukti_bayar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tipe' => 'required|in:Reguler,Express',
        ]);

        $totalHarga = $jasa->harga_jasa * $request->berat;
        if ($request->tipe === 'Express') {
            $totalHarga += 4000; 
        }        

        $tanggalSelesai = Carbon::now()->addDays($jasa->lama_jasa);

        $imagePath = null; 
        if ($request->hasFile('bukti_bayar')) {
            $image = $request->file('bukti_bayar');
            $imagePath = $image->store('storage/bukti_bayar', 'public'); 
        }

        PesananJasa::create([
            'id_pengguna' => auth()->id(),
            'id_jasa' => $request->id_jasa,
            'berat' => $request->berat,
            'tanggal_pesanan' => now(),
            'tanggal_selesai' => $tanggalSelesai,
            'total_harga' => $totalHarga,
            'metode_pembayaran' => $request->metode_pembayaran,
            'bukti_bayar' => $imagePath,
            'status_pembayaran' => null,
            'tanggal_pembayaran' => null,
        ]);

        return redirect()->route('user.pesananJasaUser')->with('success', 'Pesanan berhasil dibuat!');
    }

    public function updateStatusJasa(Request $request, $id)
    {
        $request->validate([
            'status_pembayaran' => 'required|in:Lunas,Pending',
        ]);

        $pesananJasa = PesananJasa::findOrFail($id);

        $pesananJasa->status_pembayaran = $request->status_pembayaran;

        if ($request->status_pembayaran === 'Lunas') {
            $pesananJasa->tanggal_pembayaran = Carbon::now();
        }

        $pesananJasa->save();

        return redirect()->route('admin.dashAdmin', ['section' => 'jasa'])->with('success', 'Status pembayaran berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pesananJasa = PesananJasa::findOrFail($id);

        if ($pesananJasa->bukti_bayar) {
            Storage::disk('public')->delete($pesananJasa->bukti_bayar);
        }

        $pesananJasa->delete();

        return redirect()->back()->with('success', 'Pesanan berhasil dihapus!');
    }
}