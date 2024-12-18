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

        input, textarea {
            width: 700px;
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

    @media (max-width: 768px) {
        .formTable {
            margin: 0;

            input, textarea {
                width: 400px;
            }
        }

        h5 {
            padding-right: 50px;
        }

        #keterangan {
            display: flex;
            justify-content: center;
        }

        textarea {
            width: 400px;
        }
    }
</style>

<div class="content">
    <h1 class="p-5" style="font-weight: bold; text-align: right; color: #000;">Profile</h1>
    <h2 id="keterangan" style="text-align: left; color: #000; margin-bottom: 40px; margin-top: 25px; margin-left: 60px;">Edit Profile Anda</h2>
    
    <form method="POST" action="{{ route('user.updateProfile') }}" enctype="multipart/form-data" style="color: black;">
        @csrf
        @method('PUT') <!-- Gunakan PUT untuk update -->
        <table>
            <tr>
                <td>
                    <h5>Nama Lengkap</h5>
                </td>
                <td>
                    <div class="formTable" style="display: inline-block;">
                        <input type="text" class="form-control" name="nama" value="{{ old('nama', $pengguna->nama) }}" placeholder="Nama Lengkap" />
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <h5>Nomor Telepon</h5>
                </td>
                <td>
                    <div class="formTable" style="display: inline-block;">
                        <input type="text" class="form-control" name="telepon" value="{{ old('telepon', $pengguna->telepon) }}" placeholder="Nomor Telepon" />
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <h5>Alamat</h5>
                </td>
                <td>
                    <div class="formTable" style="display: inline-block;">
                        <textarea class="form-control" name="alamat" placeholder="Alamat">{{ old('alamat', $pengguna->alamat) }}</textarea>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <h5>Username</h5>
                </td>
                <td>
                    <div class="formTable" style="display: inline-block;">
                        <input type="text" class="form-control" name="username" value="{{ old('username', $pengguna->username) }}" placeholder="Username" />
                    </div>
                </td>
            </tr>
        </table>

        <div class="d-flex justify-content-end" style="margin-right: 50px;">
            <button type="submit" class="btn mt-5 mb-5" style="background-color: #000; color: white;">
                Simpan
            </button>
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
