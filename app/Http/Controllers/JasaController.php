<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use Illuminate\Http\Request;

class JasaController extends Controller
{
    public function index()
    {
        $jasas = Jasa::take(3)->get();

        return view('user.jasaUser', compact('jasas'));
    }

    public function show()
    {
        $jasas = Jasa::all();

        return view('admin.jasaAdmin', compact('jasas'));
    }
    
    public function update(Request $request, $id)
    {
        $jasa = Jasa::findOrFail($id);

        $validatedData = $request->validate([
            'harga_jasa' => 'required|numeric|min:0',
            'lama_jasa' => 'required|integer|min:0',
        ]);

        $jasa->harga_jasa = $request->harga_jasa;
        $jasa->lama_jasa = $request->lama_jasa;

        $jasa->save();

        return redirect()->route('admin.jasaAdmin')->with('success', 'Jasa berhasil diedit.');
    }
}