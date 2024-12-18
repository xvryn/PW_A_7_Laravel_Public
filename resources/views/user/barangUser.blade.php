@extends('dashboardUser')

@section('content')

<style>
    table {
        display: flex;
        justify-content: center;
        border-collapse: collapse;
    }

    td {
        padding: 20px;
    }

    h5 {
        padding-right: 100px;
        color: #000;
    }

    .formTable {
        margin: 0;
    }

    .formTable input, .formTable textarea {
        width: 600px;
    }

    .form-check {
        color: #000;
    }

    .col100 {
        font-size: .5em;
        font-weight: 300;
        display: grid;
        grid-template-columns: 1fr;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        position: relative;
        width: 100%;
        height: 100%;
        background: #000;
        transition: .5s;
        padding-right: 10px;
        padding-left: 10px;
        transform: translateX(-2.5%);
    }

    .select select {
        width: 100%;
        padding: 10px;
        text-align: center;
        background: #f5f5f5;
        color: #000;
        box-shadow: none;
        font-size: 14px;
        margin: 8px;
        letter-spacing: 1px;
        font-weight: 300;
        width: 100%;
        border: none;
    }

    @media (max-width: 768px) {
        .formTable {
            margin: 0;
        }

        .formTable input {
            width: 400px;
        }

        h5 {
            padding-right: 50px;
        }

        #keterangan {
            display: flex;
            justify-content: center;
        }

        .textarea {
            width: 400px;
        }
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
    <h1 class="p-5" style="font-weight: bold; text-align: right; color: #000;">Pesanan Barang</h1>
    <h2 id="keterangan" style="text-align: left; color: #000; margin-bottom: 40px; margin-top: 25px; margin-left: 60px;">Tambahkan Pesanan Anda</h2>

    <form method="POST" action="{{ route('user.pembelianBarangUser.store') }}" enctype="multipart/form-data">
        @csrf
        <table>
            <tr>
                <td><h5>Barang</h5></td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="id_barang" value="{{ $barangs[0]->id }}" id="barang{{ $barangs[0]->id }}" data-harga="{{ $barangs[0]->harga_barang }}">
                        <label class="form-check-label" for="barang{{ $barangs[0]->id }}">{{ $barangs[0]->nama_barang }}</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="id_barang" value="{{ $barangs[1]->id }}" id="barang{{ $barangs[1]->id }}" data-harga="{{ $barangs[1]->harga_barang }}">
                        <label class="form-check-label" for="barang{{ $barangs[1]->id }}">{{ $barangs[1]->nama_barang }}</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="id_barang" value="{{ $barangs[2]->id }}" id="barang{{ $barangs[2]->id }}" data-harga="{{ $barangs[2]->harga_barang }}">
                        <label class="form-check-label" for="barang{{ $barangs[2]->id }}">{{ $barangs[2]->nama_barang }}</label>
                    </div>
                </td>
            </tr>

            <tr>
                <td><h5>Jumlah</h5></td>
                <td><input type="number" id="jumlah_barang" class="form-control" name="jumlah_barang" placeholder="Jumlah Barang" required></td>
            </tr>

            <tr>
                <td><h5>Total (Rp)</h5></td>
                <td><input type="number" id="total_harga" class="form-control" name="total_harga" placeholder="Rp 0" readonly></td>
            </tr>

            <tr>
                <td><h5>Metode Pembayaran</h5></td>
                <td>
                    <select class="form-select" name="metode_pembayaran" required>
                        <option selected disabled>Pilih Metode Pembayaran</option>
                        <option value="DANA">DANA</option>
                        <option value="GoPay">GoPay</option>
                        <option value="OVO">OVO</option>
                        <option value="ShopeePay">ShopeePay</option>
                        <option value="Transfer Bank">Transfer Bank</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><h5>Bukti Bayar</h5></td>
                <td><input type="file" class="form-control" name="bukti_bayar" required></td>
            </tr>
        </table>

        <div class="d-flex justify-content-end" style="margin-right: 50px;">
            <button type="submit" class="btn mt-5 mb-5" style="background-color: #000; color: white;">Pesan</button>
        </div>
    </form>

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
        const radioButtons = document.querySelectorAll('.form-check-input[name="id_barang"]');
        const jumlahInput = document.querySelector('input[name="jumlah_barang"]');
        const totalHargaField = document.getElementById('total_harga');

        let hargaBarang = 0;

        radioButtons.forEach(button => {
            button.addEventListener('change', function () {
                const harga = this.getAttribute('data-harga');
                hargaBarang = parseInt(harga) || 0;
                updateTotalHarga();
            });
        });

        jumlahInput.addEventListener('input', updateTotalHarga);

        function updateTotalHarga() {
            const jumlah = parseInt(jumlahInput.value) || 0;
            let totalHarga = jumlah * hargaBarang;
            totalHargaField.value = totalHarga;
        }
    });
</script>

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
