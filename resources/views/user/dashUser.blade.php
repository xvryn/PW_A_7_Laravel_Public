@extends('dashboardUser')

@section('content')

<style>
    .content {
        padding: 20px;
    }

    h1, h2 {
        color: #000;
    }

    h1 {
        font-size: 2.5rem;
        text-align: left;
        font-weight: 700;
    }

    .card-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin-top: 40px;
    }

    .card {
        background-color: #fff;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
    }

    .card-content {
        display: flex;
        align-items: center;
    }

    .card-content img {
        width: 80px;
        height: 80px;
        margin-right: 20px;
    }

    .card h1 {
        font-size: 2.5rem;
        margin: 0;
        color: #000;
    }

    .card h2 {
        font-size: 1.2rem;
        color: #000;
    }

    .pesanan-title {
        margin-top: 60px;
        font-size: 2rem;
        color: #000;
        text-align: left;
    }

    .table-wrapper {
        background-color: #fff;
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    .table-wrapper table {
        width: 100%;
        margin: auto;
        color: #333;
        border-spacing: 15px;
        text-align: left;
    }

    .table-wrapper td {
        padding: 10px;
        vertical-align: top;
    }

    .table-wrapper img{
        object-fit: cover;
        float: right;
        width: 220px;
        height: 130px;
        border-radius: 20px;
    }

    ul {
        list-style: none;
        padding: 0;
    }

    ul li {
        margin-bottom: 8px;
        font-size: 1.1rem;
    }

    .progress-bar {
        background-color: #ddd;
        border-radius: 20px;
        position: relative;
        height: 20px;
        width: 100%;
        margin-bottom: 15px;
    }

    .progress {
        background-color: lime;
        height: 100%;
        border-radius: 20px;
    }

    .pending .progress {
        background-color: yellow;
    }

    .completed .progress {
        background-color: lime;
    }

    .in-progress .progress {
        background-color: orange;
    }

    .status-text {
        font-size: 1rem;
        font-weight: bold;
    }

    @media (max-width: 768px) {
        .card-content {
            flex-direction: column;
            text-align: center;
        }

        .card-content img {
            display: none;
        }

        .table-wrapper{
            flex-direction: column;
            text-align: center;
        }

        .table-wrapper img{
            display: none;
        }
    }
</style>

<div class="content">

    <h1 class="p-5">Halo, User!</h1>
    
    <div class="card-container">
        <a href="{{ route('user.dashUser', ['section' => 'jasa']) }}" class="card" style="text-decoration: none;">
            <div class="card-content">
                <img id="foto" src="https://img.icons8.com/?size=100&id=IYtCLmTFquBG&format=png&color=000000" alt="Service Icon">
                <div>
                    <h1>{{ $jumlahPesananJasa }}</h1>
                    <h2>Jasa</h2>
                </div>
            </div>
        </a>

        <a href="{{ route('user.dashUser', ['section' => 'barang']) }}" class="card" style="text-decoration: none;">
            <div class="card-content">
                <img id="foto" src="https://img.icons8.com/?size=100&id=10360&format=png&color=000000" alt="Product Icon">
                <div>
                    <h1>{{ $jumlahPembelianBarang }}</h1>
                    <h2>Barang</h2>
                </div>
            </div>
        </a>
    </div>

    <h2 class="pesanan-title">Pesanan Anda</h2>

    @if (request('section') === 'jasa')
    <div class="content">
        <div class="table-wrapper mt-4">
            <table>
                @foreach ($pesananJasas as $pesanan)
                <tr>
                    <td>
                        <ul>
                            <li><strong>{{ $pesanan->jasa->nama_jasa }}</strong></li>
                            <li>Berat: <strong>{{ $pesanan->berat }} kg</strong></li>
                            <li>Selesai: <strong>{{ $pesanan->tanggal_selesai }}</strong></li>
                        </ul>
                        <div class="progress-bar {{ $pesanan->status_pembayaran === 'Lunas' ? 'completed' : 'pending' }}">
                            <div class="progress" style="width: {{ $pesanan->status_pembayaran === 'Lunas' ? '100%' : '50%' }};"></div>
                        </div>
                    </td>
                    <td>
                        <ul>
                            <li>Total: <strong>Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</strong></li>
                            <li>Metode Pembayaran: <strong>{{ ucfirst($pesanan->metode_pembayaran) }}</strong></li>
                            <li>Status: <strong>{{ $pesanan->status_pembayaran ?? 'Pending' }}</strong></li>
                        </ul>
                    </td>
                    <td>
                        <img src="{{ asset('images/jasa.jpg') }}" alt="Jasa Image">
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    @elseif(request('section') === 'barang')
    <div class="content">
        <div class="table-wrapper mt-4">
            <table>
                @foreach ($pembelianBarangs as $pesanan)
                <tr>
                    <td>
                        <ul>
                            <li><strong>{{ $pesanan->barang->nama_barang }}</strong></li>
                            <li>Jumlah: <strong>{{ $pesanan->jumlah_barang }} buah</strong></li>
                            <li>Tanggal: <strong>{{ $pesanan->tanggal_pembelian }}</strong></li>
                        </ul>
                        <div class="progress-bar {{ $pesanan->status_pembayaran === 'Lunas' ? 'completed' : 'pending' }}">
                            <div class="progress" style="width: {{ $pesanan->status_pembayaran === 'Lunas' ? '100%' : '50%' }};"></div>
                        </div>
                    </td>
                    <td>
                        <ul>
                            <li>Total: <strong>Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</strong></li>
                            <li>Metode Pembayaran: <strong>{{ ucfirst($pesanan->metode_pembayaran) }}</strong></li>
                            <li>Status: <strong>{{ $pesanan->status_pembayaran ?? 'Pending' }}</strong></li>
                        </ul>
                    </td>
                    <td>
                        <img src="{{ asset('images/barang.jpg') }}" alt="Jasa Image">
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    @else
    <h5 class="mt-5" style="text-align: center; color: black;">Pilih salah satu jenis pesanan di atas.</h5>
    @endif
</div>

@endsection
