<?php

namespace App\Http\Controllers;

use App\Models\Keluhan;
use Illuminate\Http\Request;

class KeluhanController extends Controller
{
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'keluhan' => 'required|string',
        ]);
        Keluhan::create($validatedData);

        return redirect('/home#contact')->with('success', 'Keluhan Anda berhasil dikirim!');
    }

    public function index()
    {
        $keluhans = Keluhan::all();
        
        return view('admin.reviewAdmin', compact('keluhans'));
    }
}