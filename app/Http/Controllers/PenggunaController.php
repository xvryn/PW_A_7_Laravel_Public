<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Pengguna;
use App\Models\PesananJasa;
use App\Models\PembelianBarang;

class PenggunaController extends Controller
{
    public function index()
    {
        $penggunas = Pengguna::all();
        return view('admin.userAdmin', compact('penggunas'));
    }

    public function indexPesanan()
    {
        $userId = Auth::id();

        $jumlahPesananJasa = PesananJasa::where('id_pengguna', $userId)->count();
        $jumlahPembelianBarang = PembelianBarang::where('id_pengguna', $userId)->count();

        $pesananJasas = PesananJasa::where('id_pengguna', $userId)->get();
        $pembelianBarangs = PembelianBarang::where('id_pengguna', $userId)->get();

        return view('user.dashUser', compact('jumlahPesananJasa', 'jumlahPembelianBarang', 'pesananJasas', 'pembelianBarangs'));
    }

    public function indexPesananAdmin()
    {
        $jumlahPesananJasa = PesananJasa::count();
        $jumlahPembelianBarang = PembelianBarang::count();

        $pesananJasas = PesananJasa::all();
        $pembelianBarangs = PembelianBarang::all();

        return view('admin.dashAdmin', compact('jumlahPesananJasa', 'jumlahPembelianBarang', 'pesananJasas', 'pembelianBarangs'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'telepon' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
        ]);

        $pengguna = Pengguna::findOrFail($id);
        $pengguna->update($validatedData);

        return redirect()->route('admin.userAdmin')->with('success', 'Data pengguna berhasil diperbarui!');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function showDashboardUser()
    {
        if (Auth::check()) {
            return view('dashboardUser');
        }
        return redirect()->route('login')->withErrors(['access_denied' => 'Silakan login terlebih dahulu.']);
    }

    public function showDashboardAdmin()
    {
        if (Auth::check()) {
            return view('dashboardAdmin');
        }
        return redirect()->route('login')->withErrors(['access_denied' => 'Silakan login terlebih dahulu.']);
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        try {
            $pengguna = Pengguna::where('username', $request->username)->first();

            if ($pengguna && Hash::check($request->password, $pengguna->password)) {
                Auth::login($pengguna);
                if($pengguna->username == "AdminAdmin"){
                    return redirect()->intended('admin/dashAdmin'); 
                }
                return redirect()->intended('user/dashUser'); 
            }

            return back()->withErrors(['login' => 'Username atau password salah.'])->withInput();
        } catch (\Exception $e) {
            \Log::error('Login error: ' . $e->getMessage());
            return back()->withErrors(['login' => 'Terjadi kesalahan saat mencoba login.'])->withInput();
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'telepon' => 'required|string',
            'username' => 'required|string|unique:penggunas,username',
            'password' => 'required|string|min:6',
        ]);

        try {
            Pengguna::create([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'telepon' => $request->telepon,
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('login')->with('success', 'Pendaftaran berhasil! Silakan login.');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function editProfile()
    {
        $pengguna = Auth::user(); 
        return view('user.profileUser', compact('pengguna'));
    }

    public function updateProfile(Request $request)
    {
        $pengguna = Auth::user(); 

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'telepon' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:penggunas,username,' . $pengguna->id, 
        ]);

        $pengguna->update($validatedData);

        return redirect()->route('user.profileUser')->with('success', 'Profil berhasil diperbarui!');
    }

}