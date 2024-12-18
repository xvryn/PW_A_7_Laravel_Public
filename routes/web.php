
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\KeluhanController;
use App\Http\Controllers\PembelianBarangController;
use App\Http\Controllers\PesananJasaController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\JasaController;

Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/login', [PenggunaController::class, 'showLogin'])->name('login');
Route::post('/login', [PenggunaController::class, 'login']);
Route::get('/register', [PenggunaController::class, 'showRegister'])->name('register');
Route::post('/register', [PenggunaController::class, 'register']);
Route::post('/home', [KeluhanController::class, 'store']);

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [PenggunaController::class, 'logout'])->name('logout');

    Route::get('/dashboardUser', [PenggunaController::class, 'showDashboardUser'])->name('dashboardUser');
    Route::get('/dashboardAdmin', [PenggunaController::class, 'showDashboardAdmin'])->name('dashboardAdmin');

    Route::get('/user/dashUser', [PenggunaController::class, 'indexPesanan'])->name('user.dashUser');
    Route::get('/admin/dashAdmin', [PenggunaController::class, 'indexPesananAdmin'])->name('admin.dashAdmin');

    Route::get('/user/profileUser', [PenggunaController::class, 'editProfile'])->name('user.profileUser');
    Route::put('/user/profileUser', [PenggunaController::class, 'updateProfile'])->name('user.updateProfile');

    Route::get('/user/jasaUser', [PesananJasaController::class, 'indexPesanan'])->name('user.pesananJasaUser');
    Route::get('/user/barangUser', [PembelianBarangController::class, 'indexPesanan'])->name('user.pembelianBarangUser');

    Route::get('/user/jasaUser', [JasaController::class, 'index'])->name('user.jasaUser');
    Route::post('/user/jasaUser', [JasaController::class, 'store'])->name('user.jasaUser.store');

    Route::get('/user/jasaUser', [PesananJasaController::class, 'index'])->name('user.pesananJasaUser');
    Route::post('/user/jasaUser', [PesananJasaController::class, 'store'])->name('user.pesananJasaUser.store');

    Route::get('/user/barangUser', [BarangController::class, 'index'])->name('user.barangUser');
    Route::post('/user/barangUser', [BarangController::class, 'store'])->name('user.barangUser.store');

    Route::get('/user/barangUser', [PembelianBarangController::class, 'index'])->name('user.pembelianBarangUser');
    Route::post('/user/barangUser', [PembelianBarangController::class, 'store'])->name('user.pembelianBarangUser.store');

    Route::get('/admin/reviewAdmin', [KeluhanController::class, 'index'])->name('admin.reviewAdmin');
    Route::get('/admin/userAdmin', [PenggunaController::class, 'index'])->name('admin.userAdmin');


    Route::get('/pesanan', [BarangController::class, 'pesanan'])->name('pesananAdmin.index');

    Route::get('/pesananJasa', [PesananJasaController::class, 'showPesananAdmin']);

    //Pesanan
    Route::put('/pesanan/jasa/{id}', [PesananJasaController::class, 'updateStatusJasa'])->name('updateStatusPesananJasa');
    Route::put('/pesanan/barang/{id}', [PembelianBarangController::class, 'updateStatusBarang'])->name('updateStatusPesananBarang');
    Route::delete('/delete-pesanan-jasa/{id}', [PesananJasaController::class, 'destroy'])->name('deletePesananJasa');
    Route::delete('/delete-pembelian-barang/{id}', [PembelianBarangController::class, 'destroy'])->name('deletePembelianBarang');
    //Pesanan

    //Barang
    Route::get('/barang', [BarangController::class, 'index']);
    Route::get('/admin/barang', [BarangController::class, 'index'])->name('admin.barangAdmin');
    Route::put('/barang/{id}', [BarangController::class, 'update'])->name('barangAdmin.update');
    //Barang

    //Pesanan
    Route::get('/pesanan', [BarangController::class, 'pesanan'])->name('pesananAdmin.index');
    Route::get('/pesananJasa', [PesananJasaController::class, 'showPesananAdmin']);
    //Pesanan

    //Jasa
    Route::get('/jasa', [JasaController::class, 'show']);
    Route::get('/admin/jasa', [JasaController::class, 'show'])->name('admin.jasaAdmin');
    Route::put('/jasa/{id}', [JasaController::class, 'update'])->name('jasaAdmin.update');
    //Jasa

    //UserAdmin
    Route::put('/pengguna/{id}', [PenggunaController::class, 'update'])->name('users.update');
    //UserAdmin
});
