@extends('dashboardAdmin')

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

    .btn {
        background-color: #000;
        color: white;
        border-radius: 5px;
        padding: 8px 20px;
        font-weight: 500;
        border: none;
        transition: all 0.3s ease;
    }

    .btn:hover {
        background-color: #ddd;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .modal-title {
        color: #000;
        font-weight: 600;
    }

    .modal-header,
    .modal-footer {
        border: none;
    }

    .modal-body {
        background-color: #f5f5f5;
        color:black;
        padding: 20px;
    }

    #notif {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 1000;
        background-color: rgba(31, 31, 31, 1);
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
    }
</style>

<div class="content">

    <h1 class="p-5">Halo, Admin!</h1>
    
    <div class="card-container">
        <a href="{{ route('admin.dashAdmin', ['section' => 'jasa']) }}" class="card" style="text-decoration: none;">
            <div class="card-content">
                <img id="foto" src="https://img.icons8.com/?size=100&id=IYtCLmTFquBG&format=png&color=000000" alt="Service Icon">
                <div>
                    <h1>{{ $jumlahPesananJasa }}</h1>
                    <h2>Jasa</h2>
                </div>
            </div>
        </a>

        <a href="{{ route('admin.dashAdmin', ['section' => 'barang']) }}" class="card" style="text-decoration: none;">
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
                        <!-- Button to trigger modal -->
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#detailModalJasa{{ $pesanan->id }}">Detail</button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $pesanan->id }}">Hapus</button>
                    </td>
                </tr>

                <!-- Modal for Jasa Detail -->
                <div class="modal fade" id="detailModalJasa{{ $pesanan->id }}" tabindex="-1" aria-labelledby="detailModalLabelJasa{{ $pesanan->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="detailModalLabelJasa{{ $pesanan->id }}">Detail Pesanan Jasa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('updateStatusPesananJasa', $pesanan->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <ul>
                                        <li><strong>Nama Jasa: </strong>{{ $pesanan->jasa->nama_jasa }}</li>
                                        <li><strong>Berat: </strong>{{ $pesanan->berat }} kg</li>
                                        <li><strong>Selesai: </strong>{{ $pesanan->tanggal_selesai }}</li>
                                        <li><strong>Status Pembayaran: </strong>{{ $pesanan->status_pembayaran }}</li>
                                    </ul>

                                    <div class="mb-3">
                                        <label class="form-label">Ubah Status Pembayaran</label>
                                        <select name="status_pembayaran" class="form-control">
                                            <option value="Pending" {{ $pesanan->status_pembayaran === 'Pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="Lunas" {{ $pesanan->status_pembayaran === 'Lunas' ? 'selected' : '' }}>Lunas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal Konfirmasi Hapus -->
                <div class="modal fade" id="deleteModal{{ $pesanan->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $pesanan->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel{{ $pesanan->id }}">Konfirmasi Penghapusan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah Anda yakin ingin menghapus pesanan ini?</p>
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('deletePesananJasa', $pesanan->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
                            <!-- Button to trigger modal -->
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#detailModalBarang{{ $pesanan->id }}">Detail</button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $pesanan->id }}">Hapus</button>
                        </td>
                    </tr>

                    <!-- Modal for Barang Detail -->
                    <div class="modal fade" id="detailModalBarang{{ $pesanan->id }}" tabindex="-1" aria-labelledby="detailModalLabelBarang{{ $pesanan->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="detailModalLabelBarang{{ $pesanan->id }}">Detail Pesanan Barang</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ route('updateStatusPesananBarang', $pesanan->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <ul>
                                            <li><strong>Nama Barang: </strong>{{ $pesanan->barang->nama_barang }}</li>
                                            <li><strong>Jumlah: </strong>{{ $pesanan->jumlah_barang }} buah</li>
                                            <li><strong>Tanggal Pembelian: </strong>{{ $pesanan->tanggal_pembelian }}</li>
                                            <li><strong>Status Pembayaran: </strong>{{ $pesanan->status_pembayaran }}</li>
                                        </ul>

                                        <div class="mb-3">
                                            <label class="form-label">Ubah Status Pembayaran</label>
                                            <select name="status_pembayaran" class="form-control">
                                                <option value="Pending" {{ $pesanan->status_pembayaran === 'Pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="Lunas" {{ $pesanan->status_pembayaran === 'Lunas' ? 'selected' : '' }}>Lunas</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Konfirmasi Hapus -->
                    <div class="modal fade" id="deleteModal{{ $pesanan->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $pesanan->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel{{ $pesanan->id }}">Konfirmasi Penghapusan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah Anda yakin ingin menghapus pesanan ini?</p>
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('deletePembelianBarang', $pesanan->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </table>
            </div>
        </div>
    @endif

    @if (session('success'))
        <div class="toast align-items-center border-0" id="notif">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="nav-icon bi bi-check"></i>
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="toast align-items-center border-0 mt-3" id="notif">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="nav-icon bi bi-x">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </i>
                </div>
            </div>
        </div>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const notif = document.getElementById('notif');
        if (notif) {
            notif.style.display = 'block';
            setTimeout(() => {
                notif.style.display = 'none';
            }, 3000);
        }
    });
</script>

@endsection
